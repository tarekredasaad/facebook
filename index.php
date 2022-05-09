<?php
include "connect.php";
session_start();

if(isset($_POST['submit'])){
    $Email = mysqli_real_escape_string($con,$_POST["Email"]);
    $password = mysqli_real_escape_string($con,$_POST["pass"]);

    $sql = "select * from users where email ='$Email' and password = '$password'";

    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        $_SESSION['UID'] = $row['id'];
        $_SESSION['userid'] = $row['userid'];
        header('location:profile_page.php');
    }else{
        echo 'please enter correct username or password';
        $_SESSION['Email'] = $row['email'];
    }
}

if(isset($_POST['signup'])){
    $firstname= $_POST['first_user'];
    $lastname= $_POST['last_user'];
    if(is_numeric($firstname) || is_numeric($lastname) ){
        echo "<script>alert('any name can not be number')</script>";
        echo "<script>window.open('index.php')</script>";
 
    }
    
    $email= $_POST['email'];
    $pass= $_POST['pass'];
    $gender = $_POST['gender'];
    echo $gender;
    function userid(){
        $length = rand(4,19);
        $number = "";
        
        for($i=0 ; $i < $length; $i++){
            
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }
    $userid = userid();
    $url_adress = $firstname . " " . $lastname;

    
    $insert = "insert into users (userid,first_name,last_name,gender,email,password,url_adress,date) values('$userid','$firstname','$lastname','$gender','$email','$pass','$url_adress',now())";
    $signUp =mysqli_query($con,$insert);
    $sel = "select * from users";
    $sg = mysqli_query($con,$sel);
    if($signUp){  
        
        echo "<script>alert('New User has been inserted to your admin sucessfully please login')</script>";
        echo "<script>window.open('profile_page.php')</script>";
    }else{
        echo "<script > alert('correct your date and signup again') </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Login Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <style>
            .form{
                width:300px;
                margin:100px auto;
            }
        </style>
    </head>
<body style="font-family: tohoma; background-color:#d0d8e4;">
<div  id="blue_bar">
        <div style="width: 800px; ">
            MyBook &nbsp &nbsp
           
        </div>
    </div>
    <div class="container">
        <form class="form" action="" method="post">
            <div class="form-group">
                <label for="" class="text-info">Email</label>
                <input type="email" name="Email" class="form-control" require>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pass" class="form-control" require>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success btn-block" >
            </div>
        </form>

        <style>
    #blue_bar{
            background-color:#405d9b;
            height:50px;
        }
</style>


<form class="signup form" action="" method="POST">
	<h4 class="text-center"> </h4>
    <div class="form-group">
	<input class="form-control" type="text" name="first_user" placeholder="First name" autocomplete="off" require>
	<input class="form-control" type="text" name="last_user" placeholder="Last name" autocomplete="off" required>
	
    <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password" required>
	<input class="form-control" type="password" name="pass2" placeholder="Password again" autocomplete="new-password" required>
	<input class="form-control" type="email" name="email" placeholder="Email" required>
    <label>Gender</label>
    <select name="gender" id="">
        <option ><?php echo '...' ; ?></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    </div>
	<input class="btn btn-success btn-block" type="submit" name="signup" value="signup">

</form>
    </div>
</body>