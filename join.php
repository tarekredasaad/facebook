<?php
include "connect.php";
include "function.php";
// session_start();
$member =$_SESSION['userid'];

if(isset($_GET['userid'],$_GET['groupID']) ){

    $userid = $_GET['userid'];    
    $g_id = $_GET['groupID'];
   
    $ex = mysqli_query($con,"select * from group_members where userid = $member");
    $exist = mysqli_num_rows($ex);
    if($exist == 0 ){

        
        $insert = "insert into group_members(group_ID,userid)
        values('$g_id','$member')";
        $run = mysqli_query($con,$insert);
        
        
        
        
        echo "<script>window.open('group_page.php?userid=$member&groupID=$g_id','_self')</script>";
    }else{

        mysqli_query($con,"Delete from group_members where userid = $member");
        echo "<script>window.open('group.php?userid=$member','_self')</script>";
    }
};
