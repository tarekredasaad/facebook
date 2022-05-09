<?php
include "connect.php";
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        #blue_bar{
            background-color:#405d9b;
            height:50px;
        }
        #search_box{
            width: 400px;
            height: 20px;
        }
        span{
            margin-right:20px;
        }
        #friend_bar{
            margin-top:20px;
            color:#aaa;
            padding:8px;
        }
        #friends img{
            float:left;
            width:82px;
            margin-bottom:10px;
        }
        #friends{
            clear:both; 
            color:#405d9b;
           
        }
        textarea{
            width:100%;
            font-size:14px;
            border:none;
            height:80px;
        }
        .post{
            
            margin-top:-10px;
            z-index: 2;
            background-color:#405d9b; 
            border-radius:2px;
            padding: 4px;
            /* position: absolute; */
            right:11px;
        }
        .post_bar{
            background-color:white;
            margin-top:20px;
            padding:10px;
        }
        .posts{
            padding:4px;
            font-size:12px;
            display:flex;
            margin-bottom:20px;
        }
        .notifications{
            display:inline-block;
            padding: 10px;
            background-color:#eee;
            color:#666;
            height:30px;
            border: solid #aaa 2px;
        }
    </style>
</head>
<body style="font-family: tohoma; background-color:#d0d8e4;">
    <br><div  id="blue_bar">
        <div style="width: 800px; margin:auto;">
            MyBook &nbsp &nbsp<input type="text" id="search_box">
            
            <img id="img_profile" class=" " style="width: 50px;float: right; height:50px;" src="notification.png">
            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/member3.jpg">
        </div>
    </div>
    <div style="width: 800px; margin:auto;background-color:white ;">
    <div class="col-md-9" style="min-height: 400px;  margin-top:20px; margin-left:0px;">
                <div style="border: solid thin #aaa; padding:10px; background-color:white; position:relative;">
                <form  action="" method="POST" enctype="multipart/form-data">
	  		
                    <textarea placeholder="what's on your mind" name="post" id="" cols="30" rows="4"></textarea>
                    <label class="btn btn-warning float-right" style="position:relative; top: -64px;">
				  select image <input type="file" name="upload_image" style="display:none;"></label>
                    <div>
                    <input class="post " name="share" type="submit" id="post_button" value="Post"> </div>
                    <br>
                    <br>
                    </form>
                </div>
    </div>
    </body>
</html>
<?php

if(isset($_GET['ownerpost'],$_POST['share']) && isset($_GET['postid']) && isset($_GET['userid'])){

    $userid = $_GET['userid'];    
    $post_id = $_GET['postid'];
    $owner = $_GET['ownerpost'];
    $postid = postid();
    // $aa = "select post from post where postid = '$post_id'";
    // $rnn = mysqli_query($con,$aa);
    // $pos = mysqli_fetch_array($rnn);
    $postt = $_POST['post'];
    $sql = "insert into post(postid,userid,post,post_shared,date)
    values('$postid', '$userid','$postt',1,now())";

mysqli_query($con,$sql);
        $stmt4 = mysqli_query($con,"SELECT users.*  FROM users
        where userid = $owner ");


        $rws=mysqli_fetch_array($stmt4);
        $user_po = $rws['url_adress'];
        $img_po = $rws['img'];
        $post_img = 'imagepost/'."$img_po";
        if($rws['img'] !== ""){
            $post_img = 'imagepost/'."$img_po";
        }else{
            $post_img = $rws['gender'] == "female"? "imagepost/user_female.jpg" : "imagepost/user_male.jpg" ;
        }
        $stmt = mysqli_query($con,"SELECT users.*  FROM users
         where userid = $userid ");


    $rows=mysqli_fetch_array($stmt);
    $Nuser = $rows['url_adress'];
    $img_sh = $rows['img'];
    $share_img = 'imagepost/'."$img_sh";
        if($rows['img'] !== ""){
            $share_img = 'imagepost/'."$img_sh";
        }else{
            $share_img = $rows['gender'] == "female"? "imagepost/user_female.jpg" : "imagepost/user_male.jpg" ;
        }
        $insert = "insert into shares (post_id,owner_share,owner_post,content,name_share,name_post,img_share,img_post,date)
        values('$post_id','$userid','$owner','$postt','$Nuser','$user_po','$img_sh','$img_po',now())";
        $run = mysqli_query($con,$insert);
        
        $note = "INSERT INTO notification (userid,activity,contentid,content_owner,content_type,date)
        values ('$userid','shared','$post_id',(select userid from post where postid = '$post_id') ,'Post',now())";
        $noti = mysqli_query($con,$note);
        
        $update_share = "update post set  shares = shares + 1  where postid= $post_id";
        $run_update = mysqli_query($con,$update_share);
        
        echo "<script>window.open('profile_page.php','_self')</script>";
    }
