<?php
include "header.php";
include "function.php";
//include "comments.php";
print_r( 'welcome' . $_SESSION['userid']) ;

if(isset($_GET['userid'])){
    $user = $_GET['userid'];
    $profile = $_FILES['img']['name'];
    $sql="update users set img = '$profile' where userid = $user";
    mysqli_query($con,$sql);
    echo"<script>window.open('profile_page.php','_self')</script>";
}