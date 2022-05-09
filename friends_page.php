<?php
include "header.php";
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
            height:25px;
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
            <img id="img_profile" class="rounded-circle" style="width: 50px;float: right; height:50px;" src="imagepost/<?php echo $prof; ?>">
        </div>
    </div>
    <div style="width: 800px; margin:auto;background-color:white ;">
        
        <div style="">
        
                    <div style="height: auto; margin-top:20px; margin-left:15px;">
                        <div style="height: 58px;">
                            
                            <img id="img_profile" class="rounded-circle" style="width: 50px;float: left; height:50px; margin-bottom:20px;" src="imagepost/<?php echo $prof; ?>"> 
                            
                        </div>
                        <div class="row ml-2" style="margin-top: 54px; height: auto">
                        <?php
                        echo friend_request();
                        ?>
                   
                         </div>
                         <div style="border: solid thin #aaa; padding:5px; background-color:white; position:relative;">
                    
                   
               
                    
                     </div>
                        </div>
                        
                        
                       
                    
                     </div>
                </div>
        
    
</body>
</html>