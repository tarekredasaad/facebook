<?php
session_start();
include 'connect.php';
// $name=$_SESSION['user'];
// $status_back = "update user set status = 0 where name = '$name'";
// mysqli_query($con,$status_back);
session_unset();

session_destroy();

header('location:index.php');

exit();
