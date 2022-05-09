<?php
    include "connect.php";
    include "function.php";
   // if(isset($_GET()))
   if(isset($_GET['postid'])){
        
    $delete_id = $_GET['postid'];
    
    $delete_post = "delete from post where postid='$delete_id'";
    
    $run_delete = mysqli_query($con,$delete_post);
    
    if($run_delete){
        
        echo "<script>alert('One of your costumer order has been Deleted')</script>";
        
        echo "<script>window.open('profile.php','_self')</script>";
        
    }
    
}

?>
<style>
     #blue_bar{
            background-color:#405d9b;
            height:50px;
        }
        #search_box{
            width: 400px;
            height: 20px;
        }
</style>
<body style="font-family: tohoma; background-color:#d0d8e4;">
    <br><div  id="blue_bar">
        <div style="width: 800px; margin:auto;">
            MyBook &nbsp &nbsp<input type="text" id="search_box">
            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/member3.jpg">
        </div>
    </div>
    <div style="width: 800px; margin:auto;background-color:white ;min-height:400px;">
        Are you sure you want to delete this post.  
        <?php
        print_r( $_GET['postid']);
        ?>
        </div>
