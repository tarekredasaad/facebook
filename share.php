<?php
include "header.php";
include "function.php";
print_r( 'welcome' . $_SESSION['userid']) ;

$id = isset($_GET['userid']) ? $_GET['userid'] : $_SESSION['userid'] ;
print_r($id);
$user = $_SESSION['userid'] ;
 $dsds = mysqli_query($con,"select * from users where userid= $id");
 $iii = mysqli_fetch_array($dsds);
 $prof = $iii['img'];
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
if($id == $_SESSION['userid']){
    
   ?> <script>

            $(function() {
                $('.message').css("display", "none");
                
              });
            // $(function() {




            // $('.com').on("click", function() {

            //     $('.message').css("display", "none");

            // });


            // });
    </script><?php
}

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
            position: absolute;
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
        .message{
            background-color:#405d9b;
            float: right;
            
        }
    </style>
</head>
<body style="font-family: tohoma; background-color:#d0d8e4;">
    <br><div  id="blue_bar">
        <div style="width: 800px; margin:auto;">
            MyBook &nbsp &nbsp<input type="text" id="search_box">
            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/<?php echo $prof ; ?>">
            <a href='logout.php' style="float: right;">Logout</a>
        </div>
    </div>
    <div style="width: 800px; margin:auto;background-color:white ;min-height:400px;">
        <div style="text-align:center;">
        <img src="mountain.jpg" style="width:100%;" alt="">
        <img src="imagepost/<?php echo $prof ; ?>" style="border-radius:50%; margin-top: -612px;width: 150px; border:solid 2px white;" alt=""><br>
        <form action="changeprofile.php?userid=<?php echo $user;?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="img" >
            <input type="submit" name="pp" value="change profile">
            </form>
        <span>Timeline</span><span>About</span><span>Friends</span><span>Photos</span><span>Settings</span> 
          <span class="message"><a href='message.php?userid=<?php echo $id; ?>'>Message</a></span>
        </div>
        <div style="display:flex;">
        <!-- friends area -->
            <div id="friend_bar" style="min-height: 400px; flex:1; background-color:white;">
                friends <br>
           
             <?php
                        echo yourFriends() ;
                         ?>
            </div>
           
            <div style="min-height: 400px; flex:2.5; margin-top:20px; margin-left:15px;">
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
                <div class="post_bar">
                   
                   
               </div>
           </div>
       </div>
   </div>
   
</body>
</html>