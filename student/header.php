<?php
if(!isset($_SESSION))
{
    session_start();
}
require_once '../dbcon.php';
$page_ex = explode('/',$_SERVER['PHP_SELF']);
$page = end($page_ex);
if(!isset($_SESSION['student_login']))
{
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student</title>
    <script src="../assect/vendor/pace/pace.min.js"></script>
    <link href="../assect/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assect/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assect/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assect/vendor/animate.css/animate.css">
    <link rel="stylesheet" href="../assect/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="../assect/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="../assect/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assect/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <div class="page-header">
        <div class="leftside-header">
            <div class="logo">
                <a href="index.php" class="on-click">
                    <h3>LMS</h3>
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <div class="rightside-header">
            <div class="header-middle"></div>
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <img alt="profile photo" src="../assect/images/avatar/avatar_user.jpg" />
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <?php
                            $email = $_SESSION['student_login'];
                            $result = mysqli_query($con,"SELECT * FROM `students` WHERE `email`='$email'");
                            $row = mysqli_fetch_array($result);
                            echo ucwords($row['fname']. ' '.$row['lname']);
                            ?>
                        </span>
                        <span class="user-profile">Student</span>
                    </div>
                    <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">
                <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="left-sidebar">
            <div class="left-sidebar-header">
                <div class="left-sidebar-title">Navigation</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>
            <div id="left-nav" class="nano">
                <div class="nano-content">
                    <nav>
                        <ul class="nav nav-left-lines" id="main-nav">
                            <li class="<?= $page == 'index.php' ? 'active-item':'' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                            <li class="<?= $page == 'books.php' ? 'active-item':'' ?>"><a href="books.php"><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content">