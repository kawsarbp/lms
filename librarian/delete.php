<?php
require_once '../dbcon.php';
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_GET['deletebookid']))
{
    header("location: manage_books.php");
}
else
{
   $bookid = base64_decode($_GET['deletebookid']);
   mysqli_query($con,"DELETE FROM `books` WHERE `id`='$bookid'");
   header("location: manage_books.php");
}
?>