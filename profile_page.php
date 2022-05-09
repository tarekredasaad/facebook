<?php
include "header.php";
include "function.php";

print_r( 'welcome' . $_SESSION['userid']) ;
 $user = $_SESSION['userid'] ;
 $dsds = mysqli_query($con,"select * from users where userid= $user");
 $iii = mysqli_fetch_array($dsds);
 $prof = $iii['img'];

//  $mm= mysqli_query($con,"SELECT *, friend_request.request_status
//   FROM `users` LEFT JOIN friend_request
//    on friend_request.owner_target = users.userid
//     where users.userid != $user;
//  ");
//  $member = mysqli_fetch_array($mm);
//  $status = $member['request_status'];
 
 
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
           margin-bottom:14px;
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
            position: absolute;
            right:11px;
            
        }
        .post_bar{
            background-color:white;
            margin-top:20px;
            padding:10px;
            position: relative;
        }
        .posts{
            padding:4px;
            font-size:12px;
            display:flex;
            margin-bottom:20px;
            overflow: auto;
            background-color: #405d9b;
            color: white;
            border-radius:15px;
        }
        #post_button{
            cursor: pointer;
        }
        #notif{
            cursor: pointer;
            background-color:red;
             padding: 3px;
             margin:0px;
             border-radius:50%;
            position: relative;
            top: -15px; 
        }  
        .commenticon{
            color:#bdd5ec;
            font-size:25px;
        }
        .likes{
            color:#bdd5ec;
            font-size:25px;
            position: relative;

        } 
        .active{
            color:blue;
        }
        .mm{
            display:none;
        }
        .ss{
            display:block;
        }
    </style>
</head>
<body style="font-family: tohoma; background-color:#d0d8e4;">
    <br><div  id="blue_bar">
        <div style="width: 800px; margin:auto;">
            MyBook &nbsp &nbsp<input type="text" id="search_box">
             <?php  $not = "select * from notification where content_owner = $user and content_type != 'Message' and noti_status = 0 " ;
                $noti = mysqli_query($con,$not);
                $notif_num = mysqli_num_rows($noti);
                $not_m = "select * from notification where content_owner = $user and content_type = 'Message' and noti_status = 0 " ;
                $noti_M = mysqli_query($con,$not_m);
                $notiM_num = mysqli_num_rows($noti_M);

                $f_m = "select * from friends where 
                friend_id = $user && status = 'pending' or
                user_id = $user && status = 'pending'  " ;
                $fi_M = mysqli_query($con,$f_m);
                $ffr_num = mysqli_num_rows($fi_M);
             ?>
            <span ><a href="notification.php"><i class="fa fa-bell" style="color:yellow;"></i></a><span id="notif" ><?php echo $notif_num ; ?></span></span>
            <span ><a href="friends_page.php?userid=<?php echo $user; ?>"><i class="fa fa-users" style="color:black;"></i></a><span id="notif" ><?php echo $ffr_num ; ?></span></span>
            <span ><a href="messenger.php?userid=<?php echo $user; ?>"><i class="fa fa-envelope-o" style="color:#fff;"></i></a><span id="notif" ><?php echo $notiM_num ; ?></span></span>
            
            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/<?php echo $prof ; ?>">
            <a href='logout.php' style="float: right;">Logout</a>
        </div>
    </div>
                        <div class="mm" >
                          <?php echo  Notification();  ?>
                        </div>
    <div style="width: 800px; margin:auto; ;min-height:400px;">
        <div style="text-align:center;">
        <img src="mountain.jpg" style="width:100%;" alt="">
        <img src="imagepost/<?php echo $prof ; ?>" style="border-radius:50%; margin-top: -162px;width: 150px; border:solid 2px white;" alt=""><br>
            
            <a href="profile.php?userid=<?php echo $user;?>" style="float:right;">change profile</a>
        <span>Timeline</span><span>About</span><a href="group.php?userid=<?php echo $user;?>">groups</a><span><a href="friends_list.php?userid=<?php echo $user;?>">Friends</a></span><span>Photos</span><span>Settings</span> 
          
        </div>
        <div class="row" style="">
        
            <div class="col-md-3" id="friend_bar" style="min-height: 400px;  background-color:white;">
                friend suggestions <br>
             
             <?php
                        echo friends() ;
                         ?>
            </div>
      
            <div class="col-md-9" style="min-height: 400px;  margin-top:20px; margin-left:0px;">
                <div style="border: solid thin #aaa; padding:10px; background-color:white; position:relative;">
                <form  action="" method="POST" enctype="multipart/form-data">
	  		
                    <textarea placeholder="what's on your mind" name="post" id="" cols="30" rows="4"></textarea>
                    <label class="btn btn-warning float-right" style="position:relative; top: -64px;">
				  select image <input type="file" name="upload_image" style="display:none;"></label>
                    <div>
                    <input class="post " name="sub" type="submit" id="post_button" value="Post"> </div>
                    <br>
                    <br>
                    </form>
                </div>
                <div class="post_bar">
                   
                    <?php
                        echo getPost() ;
              
                        $stmt2 = mysqli_query($con,"SELECT post.* FROM post 
                        ");
                        $rows2=mysqli_num_rows($stmt2);
                            
                        $limit = 3;
                        $page_number = 1 ;
                        $end_page = ceil($rows2 / 3);
                        $page_number = isset($_GET['page']) ?(int) $_GET['page'] : 1;
                        $page_number = $page_number < 1 ?  1 : $page_number ;
                        $page_number = $page_number > $end_page ?   $end_page : $page_number ;
                        $offset = ($page_number - 1) * $limit ;
                        // echo seeComments();
                        
                         ?>
                         <a href='profile_page.php?page=<?php echo ($page_number +1) ; ?>'>
                          <button    id="post_button" style = "float:right; width:120px;" > Next Page </button>
                          </a>
                          <a href='profile_page.php?page=<?php echo ($page_number -1) ; ?>'>
                          <button    id="post_button" style = "float:left; width:120px;"> Pervious Page </button>
                          </a>
                </div>
            </div>
        </div>
    </div>
    <script>
      $(document).ready(function () {
          $('.like').click(function () {
           // $('.notification').fadeIn(1000);
              jQuery.ajax({
				url:'likes.php',
				success:function(){
                   // $('.notification').show();
					$('.notification').fadeToggle('fast', 'linear');
					//$('#notifications_counter').fadeOut('slow');
				}
			  })
              return false;
          });
          $(document).click(function () {
              $('.notification').hide(); 
          });
      });
   </script>
</body>
</html>