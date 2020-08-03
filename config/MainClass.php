<?php

session_start();


class MainClass
{

    function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pw = "";
        $db = "assignment_php";
        $this->db = new PDO("mysql:$host", $user, $pw);
        $this->db->exec("CREATE DATABASE IF NOT EXISTS $db");
        $this->db->exec("USE $db");
    }

    function login($u, $pass)
    {

        $to = $this->db->query("SELECT * FROM users where email='$u' AND password='$pass' ");
        if ($to->rowCount() > 0) {
            $_SESSION['member'] = $to->fetch(PDO::FETCH_ASSOC);
            return 1;
        } else {
            return 0;
        }
    }

    function registerMember($username, $email, $password)
    {
        $stmt = $this->db->prepare("INSERT INTO `users`( `username`, `email`, `password`) VALUES (?,?,?)");
        $stmt->execute([$username, $email, $password]);
    }

    // bus

    function getBus($id = null)
    {
        if ($id == null) {
            return $this->db->query("select * from bus order by id_bus desc")->fetchAll();
        } else {
            return $this->db->query("select * from bus where id_bus = '$id' ")->fetch();
        }
    }

    function storeBus($name, $seat)
    {
        $stmt = $this->db->prepare("INSERT INTO `bus`( `name`, `seat`) VALUES (?,?)");
        $stmt->execute([$name, $seat]);
    }


    function destroyBus($id)
    {
        $this->db->query("delete from bus where id_bus = '$id' ");
    }

    // destination
    function getDestinantion($id = null)
    {
        if ($id == null) {
            return $this->db->query("SELECT * FROM `destinations` order by id_destination desc ")->fetchAll();
        } else {
            return $this->db->query("SELECT * FROM `destinations` where id_destination ='$id' ")->fetch();
        }
    }

    function storeDestination($name, $address, $image)
    {
        $n = date('Yhsmid') . $image['name'];
        move_uploaded_file($image['tmp_name'], "../img/travel/" . $n);
        $stmt = $this->db->prepare("INSERT INTO `destinations`( `name`, `address`,image) VALUES (?,?,?)");
        $stmt->execute([$name, $address, $n]);
    }

    function destroyDestination($id)
    {
        $this->db->query("delete from destinations where id_destination = '$id' ");
    }

    // travel
    function storeTravel($startPlace, $destination, $bus, $date, $status, $price)
    {
        $seatAvailable = $this->getBus($bus)['seat'];
        $stmt = $this->db->prepare("INSERT INTO `travels`( `destination_id`, `start`, `bus_id`, `date`, `status`, `price`, `seat_available`) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$destination, $startPlace, $bus, $date, $status, $price, $seatAvailable]);
    }

    function getTravel($id = null)
    {
        if ($id == null) {
            return $this->db->query("SELECT *,d.name as destination_name, b.name as bus_name 
                    FROM travels t 
                    JOIN bus b ON t.bus_id = b.id_bus
                    JOIN destinations d ON t.destination_id = d.id_destination
                    order by t.id_travel desc ")->fetchAll();
        } else {
            return $this->db->query("SELECT *,d.name as destination_name, b.name as bus_name 
                    FROM travels t 
                    JOIN bus b ON t.bus_id = b.id_bus
                    JOIN destinations d ON t.destination_id = d.id_destination
                    where id_travel = '$id' ")->fetch();
        }
    }

    function getTravelByDestination($id)
    {
        return $this->db->query("SELECT *,d.name as destination_name, b.name as bus_name 
                    FROM travels t 
                    JOIN bus b ON t.bus_id = b.id_bus
                    JOIN destinations d ON t.destination_id = d.id_destination
                    where t.destination_id = '$id' 
                    order by t.date desc ")->fetchAll();
    }

    function updateTravel($startPlace, $destination, $bus, $date, $status, $price, $id)
    {
        $stmt = $this->db->prepare("UPDATE `travels` SET destination_id=?,`start`=?,`bus_id`=?,`date`=?,`status`=?,`price`=? WHERE id_travel = ? ");
        $stmt->execute([$destination, $startPlace, $bus, $date, $status, $price, $id]);
    }

    function getLatestTravel()
    {
        return $this->db->query("SELECT *,d.name as destination_name, b.name as bus_name 
                    FROM travels t 
                    JOIN bus b ON t.bus_id = b.id_bus
                    JOIN destinations d ON t.destination_id = d.id_destination
                    order by t.id_travel desc limit 0,5 ")->fetchAll();
    }

    // bag
    function shoppingBag($id, $jml)
    {
        if (!empty($_SESSION['keranjang'])) {
            $f = 0;
            foreach ($_SESSION['keranjang'] as $k => $value) {
                if ($k == $id) {
                    $g = $value + 1;
                    unset($_SESSION['keranjang'][$k]);
                    $_SESSION['keranjang'][$id] = $g;
                    $f = 1;
                }
            }
            if ($f == 0) {
                $_SESSION['keranjang'][$id] = $jml;
            }
        } else {
            $_SESSION['keranjang'][$id] = $jml;
        }
    }

    function deleteShoppingBag($id)
    {
        unset($_SESSION['keranjang'][$id]);
    }

    // checkout
    function checkoutOrder($name, $phone, $address, $pickupAddress)
    {
        $user_id = $_SESSION['member']['id'];
        $stmt = $this->db->prepare("INSERT INTO `transaction`( `name`, `phone`, `address`, `pickup_place`, `status`,user_id) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$name, $phone, $address, $pickupAddress, 0, $user_id]);
        $lastId = $this->db->lastInsertId();
        foreach ($_SESSION['keranjang'] as $key => $value) {
            $travel = $this->getTravel($key);
            $updateSeatAvaliable = $travel['seat_available'] - $value;
            $price = $travel['price'] * $value;
            $this->db->query("update travels set seat_available = '$updateSeatAvaliable' where id_travel = '$key' ");
            $stmt = $this->db->prepare("INSERT INTO `transaction_detail`(`travel_id`, `transaction_id`, `seat`, `price`) VALUES (?,?,?,?)");
            $stmt->execute([$key, $lastId, $value, $price]);
        }
        unset($_SESSION['keranjang']);
    }

    // transaction history
    function getTransactionHistory($userId)
    {
        return $this->db->query("select * from transaction where user_id = '$userId' order by id_trans desc ")->fetchAll();
    }

    function getTransactionDetail($id)
    {
        return $this->db->query("select *, b.name as bus_name, d.name destination_name , td.seat as td_seat
			from transaction_detail td
            JOIN travels t ON td.travel_id = t.id_travel
            JOIN destinations d ON t.destination_id = d.id_destination
            JOIN bus b ON t.bus_id = b.id_bus
            where td.transaction_id = '$id' order by id_td desc ")->fetchAll();
    }

    function getTransaction(){
        return $this->db->query("select * from transaction  order by id_trans desc ")->fetchAll();
    }

    // users
    function getUsers(){
        return $this->db->query("select * from users order by id desc")->fetchAll(PDO::FETCH_ASSOC);
    }

}

$use = new MainClass();

if (isset($_GET['logout'])){
    unset($_SESSION['member']);
}
