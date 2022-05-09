<?php
include "header.php";
include "function.php";

if(isset($_SERVER['HTTP_REFERER'])){
    print_r( 'welcome' . $_SESSION['userid']) ;
}else{
$theMsg = "<div class='alert alert-success'>"  . 'Wait</div>';
	   			redirectHome($theMsg, "back",4);
}	
$id = $_SESSION['userid'];
$userid = isset($_GET['userid']) ? $_GET['userid'] : $_SESSION['userid'] ;
print_r($userid);
   $qq= "update message set seen = 1 where receiver = $id ";
   $readMsg = mysqli_query($con,$qq);
 $dsds = mysqli_query($con,"select * from users where userid= $userid");
 $iii = mysqli_fetch_array($dsds);
 $prof = $iii['img'];
function message(){
    global $con;
    global $userid;
    global $id;
   
    


    ?> <script>
        var limit = 2;
        $(document).ready(function(){
            $('.load').on("click",function(){
                limit+=1;
                console.log(limit);
            })
        });
    </script>
  <?php  $limit = 3; echo "<script>document.writeln(limit);</script>"; ;
  
    $sg = "SELECT users.* , message.* FROM message
    inner join users on users.userid = message.sender
    where (receiver = '$userid' and sender= '$id') || (receiver = '$id' and sender= '$userid') limit  $limit  ;
   
   ";
   
   $go = mysqli_query($con,$sg);
   while($Grow = mysqli_fetch_array($go)){
        if($id == $Grow['receiver']){
            $right = 'margin-left:300px;';
        }else{
        $right="margin-left:0px; ";}
       $msg = $Grow['message'];
       $send = $Grow['url_adress'];
       $pathg = $Grow["img"];
       $path_img = 'imagepost/'."$pathg";
       $date = $Grow['date'];
       $msgid = $Grow['id'];
       echo"
       <div class='row  mes' style='display: block; margin: 10px; margin-right: 10px; $right width: 60%;'>
       <div class='col-xl-12 col-md-offset-6 float-right'>
           <div class='panel panel-info ' style='background-color:#d0d8e4;'>
               <div class=' panel-body messg'>
                  <div class='col-xl-12 d-block'>
                  <img src='$path_img' class='rounded-circle' style='height: 60px; '>
                   <p><a href='profile.php?userid=$id'>$send</a> <i> commented</i> on $date</p>
                   <h3 class='text-primaty' style='margin-left:5px; font-size:17px;'>$msg <a class='float-right' href='mes.php?msgid=$msgid&userid=$userid'>delete</a></h3>
                        <span class='btn btn-info load'>+</span>
                  </div>
               </div>
           </div>
       </div>
    </div>
       ";

     }
       
    
  };
  
   $quer= mysqli_query($con,"select * from users where userid = $userid ");
   $row = mysqli_fetch_array($quer);
   $name = $row['url_adress'];
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
        
                    <div style="min-height: 400px; margin-top:20px; margin-left:15px;">
                        <div style="height: 58px;">
                            <h3>chating with:</h3>
                            <img id="img_profile" class="rounded-circle" style="width: 50px;float: left; height:50px; margin-bottom:20px;" src="imagepost/<?php echo $prof; ?>"> 
                            <span><?php echo $name;?></span>
                        </div>
                        <div class="row ml-2" style="margin-top: 54px;">
                        <?php
                        echo message(); 
                       ?>
                        
                   
                         </div>
                         <div style="border: solid thin #aaa; padding:5px; background-color:white; position:relative;">
                    
                    <form  action="mes.php?userid=<?php echo $userid;?>" method="POST" enctype="multipart/form-data">
	  		
                    <textarea placeholder="write your message here" name="post" id="" cols="30" rows="4"></textarea>
                    <span class=" float-left" style="position:relative; ">
				   <input type="file" name="upload_image" style="display:block;"></span>
                    <div>
                    <input class="post float-right" name="sub" type="submit" id="post_button" value="Send"> </div>
                    <br>
                    <br>
                    </form>
               
                    
                     </div>
                        </div>
                        
                        
                       
                    
                     </div>
                </div>
        
    <script type="text/javascript"> 
    // var more = 0;
        
    //     jQuery(document).ready(function(){
    //         function loadmore(start){
    //     jQuery.ajax({
    //         url:'message.php',
    //         date:'start='+start,
    //         type:'post',
    //         success:function(result){
    //             jQuery('.mes').append(result);
    //             more+=3;
    //         }
    //     })
    // }
    

    //     jQuery(window).scroll(function(){
    //         if(jQuery(window).scrollTop() >= jQuery(document).height() - 
    //         jQuery(window).height()){
    //             loadmore(more);
    //         }
    //     })

    // })
    // loadmore(more);

    $(document).ready(function(){
                $.ajax({
        type: "POST",
        url: "message.php",
        data: {limit : limit}
        })
        .done(function( data ) {
            alert( "Data Saved: " + limit );
            console.log(limit);
        });

        var limit = 2;
        var start = 0;
        var action = 0;
        console.log(44);
        function load(start,limit){
            preventDefault();
            $jQuery.ajax({
                
                url:"message.php",
                type:"GET",
                data:{"limit":limit,"start":start},
                cache:false,
                success:function (data){
                    $('.mes').append(data)
                    if(data == " "){
                        console.log(44);
                        $('.messg').html('<span class=" btn btn-warning">No Data Found</span>');
                    }else{
                        $('.messg').html('<span class=" btn btn-info">please wait</span>');
                        action = 1 ;
                        console.log(44);
                    }
                }
            })
        }
        if(action == 1 ){
            load(start,limit);
        }
        $(window).scroll(function(){
            if($(window).scrollTop() + 
            $(window).height() > $('.mes').height()
             && action == 1){
                 start = start + limit;
                 setTimeout(() => {
                    load(start,limit);
                 }, 1000); 
             }
        })
    });
        
    </script>
    <?php $ll = isset($_GET['limit']) ? $_GET['limit'] : 8;
    echo $ll ;  ?>
</body>
</html>