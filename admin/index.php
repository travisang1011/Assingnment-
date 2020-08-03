<?php
require '../config/MainClass.php';
if (empty($_SESSION['admin'])) {
    header("location: login.php");
}
if (isset($_GET['logout'])){
    unset($_SESSION['admin']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Management Partnership</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">

</head>
<body>
<div class="app app-default">

    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="#"><span class="highlight">Management</span> Admin</a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li class="">
                    <a href="./?page=home">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">Dashboard</div>
                    </a>
                </li>
                <li class="">
                    <a href="./?page=bus">
                        <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="title">Bus</div>
                    </a>
                </li>
                <li class="">
                    <a href="./?page=destination">
                        <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="title">Destination</div>
                    </a>
                </li>
                <li class="">
                    <a href="./?page=travel">
                        <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="title">Travel</div>
                    </a>
                </li>
                <li class="">
                    <a href="./?page=transaction">
                        <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="title">Transaction</div>
                    </a>
                </li>
                <li class="">
                    <a href="./?page=users">
                        <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="title">Users</div>
                    </a>
                </li>
                <li class="">
                    <a href="./?logout">
                        <div class="icon" style="color: red">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                        </div>
                        <div class="title">Logout</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <ul class="menu">
                <li>
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </a>
                </li>
                <li><a href="#"><span class="flag-icon flag-icon-id flag-icon-squared"></span></a></li>
            </ul>
        </div>
    </aside>

    <script type="text/ng-template" id="sidebar-dropdown.tpl.html">
        <div class="dropdown-background">
            <div class="bg"></div>
        </div>
        <div class="dropdown-container">
            {{list}}
        </div>
    </script>
    <div class="app-container">
        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-collapse collapse in">
                    <ul class="nav navbar-nav navbar-mobile">
                        <li>
                            <button type="button" class="sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                        <li class="logo">
                            <a class="navbar-brand" href="#"><span class="highlight">Management</span> Admin</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="assets/images/profile.png">
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">

                    </ul>
                </div>
            </div>
        </nav>

        <!--  content will here  -->

        <?php if (empty($_GET['page'])) {
            include "modul/home.php";
        } else {
            if (file_exists("modul/" . $_GET['page'] . ".php")) {
                include "modul/" . $_GET['page'] . ".php";
            } else {
                include "modul/home.php";
            }
        }
        if (isset($_GET['logout'])) {
            unset($_SESSION['admin']);
            echo "<script>location='./'</script>";
        }
        ?>


        <!--  end content  here  -->
        <footer class="app-footer">
            <div class="row">
                <div class="col-xs-12">
                    <div class="footer-copyright">
                        Copyright &copy; <a href="#">Travis</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>


</div>

<script type="text/javascript" src="assets/js/vendor.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>

</body>
</html>

