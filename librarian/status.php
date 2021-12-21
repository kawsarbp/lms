<?php
require_once '../dbcon.php';

if(isset($_GET['inactive']))
{
    $id = base64_decode($_GET['inactive']);
    mysqli_query($con,"UPDATE `students` SET `status`='0' WHERE `id`='$id'");
    header("location: students.php");
}
if(isset($_GET['active']))
{
    $id = base64_decode($_GET['active']);
    mysqli_query($con,"UPDATE `students` SET `status`='1' WHERE `id`='$id'");
    header("location: students.php");
}
?>