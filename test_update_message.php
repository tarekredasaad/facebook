<?php
include('connect.php');
session_start();
$uid=$_SESSION['UID'];
mysqli_query($con,"update messages set message_status=1 where to_id=$uid");
?>