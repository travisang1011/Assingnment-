<?php include '../config/MainClass.php';

?>
<?php if (isset($_POST['do'])) {
    $pw = "admin";
    if ($_POST['pw'] == $pw) {
        $to = 1;
    } else {
        $to = 0;
    }
    if ($to == 0) {
        ?>
        <script type="text/javascript">alert('Undefined user')</script>
        <meta http-equiv="refresh" content="0; ./login.php">
    <?php } else {
        $_SESSION['admin'] = '1';
        header("Location: ./");
    }
} ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form method="post" action="">
    <div class="kotak">
        <h3>Admin Login</h3>
        <hr>
        <label>Password</label>
        <p><input type="Password" name="pw"></p><br>
        <button type="submit" name="do">Login</button>
        <hr>
    </div>
</form>
</body>
</html>