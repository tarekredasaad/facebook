<?php
include "header.php";
include "function.php";
print_r( 'welcome' . $_SESSION['userid']) ;
$id = $_SESSION['userid'];
   $qq= "update notification set noti_status = 1 where content_owner = $id ";
   $readNoti = mysqli_query($con,$qq);
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
        <!-- <div style="text-align:center;">
        <img src="mountain.jpg" style="width:100%;" alt="">
        <img src="imagepost/member3.jpg" style="border-radius:50%; margin-top: -612px;width: 150px; border:solid 2px white;" alt=""><br>
        <span>Timeline</span><span>About</span><span>Friends</span><span>Photos</span><span>Settings</span> 
          
        </div> -->
        <div style="display:flex;">
        <!-- friends area -->
            <!-- <div id="friend_bar" style="min-height: 400px; flex:1; background-color:white;">
                friends <br>
             <!-- <div  id="friends">
                <img src="imagepost/member2.jpg" alt=""> <br> first user
                 </div> 
             
                    </div> -->
                    <!-- post area -->
                    <div style="min-height: 400px; flex:1.5; margin-top:20px; margin-left:15px;">
                        <!-- <div style="border: solid thin #aaa; padding:10px; background-color:white; position:relative;"> -->
                        <div  >
                        <?php echo  Notification();  ?>
                        </div>
                        
                    <!-- <form  action="" method="POST" enctype="multipart/form-data">
	  		
                    <textarea placeholder="what's on your mind" name="post" id="" cols="30" rows="4"></textarea>
                    <label class="btn btn-warning float-right" style="position:relative; top: -64px;">
				  select image <input type="file" name="upload_image" style="display:none;"></label>
                    <div>
                    <input class="post " name="sub" type="submit" id="post_button" value="Post"> </div>
                    <br>
                    <br>
                    </form> -->
                    </div>
                    <!-- <div class="post_bar">
                    <!-- <div class="posts"> -->
                         <!-- <div>
                            <img src="imagepost/member2.jpg" style="width:75px; height:75px;" alt="">
                         </div> 
                         <div>
                             <div style="color:#405d9b">First User</div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore deserunt beatae quas sint explicabo placeat, amet quam neque iste voluptas recusandae fugiat labore nesciunt iusto odit consectetur cupiditate aut reiciendis!</p> 
                            <br>
                            <br>
                            <a href="">Like</a> <a href="">Comment</a> <span style="color:#aaa;"> April 5 20:45</span>
                         </div> -->
                    <!-- </div> -->
                   
                     </div>
                </div>
        </div>
    
</body>
</html>