<?php
include "connect.php";
include "function.php";
// session_start();
$sender =$_SESSION['userid'];
echo $sender;
if(isset($_POST['sub']) ){

    $userid = $_GET['userid'];    
    $messag = $_POST['post'];
    $upload_image = $_FILES['upload_image']['name'];
    
    if($messag == ""){
        echo "<script>alert('enter your message!')</script>";
        echo "<script>window.open('profile_page.php','_self')</script>";
    }else{

        
        $insert = "insert into message(sender,receiver,file,message,date)
        values('$sender','$userid','$upload_image','$messag',now())";
        $run = mysqli_query($con,$insert);
        
        $note = "INSERT INTO notification (userid,activity,contentid,content_owner,content_type,date)
        values ('$sender','messaged',(select id from message where message = '$messag'),'$userid' ,'Message',now())";
        $noti = mysqli_query($con,$note);
        
        // $update_comment = "update post set  comment = comment + 1 where postid= $post_id";
        // $run_update = mysqli_query($con,$update_comment);
        echo "<script>window.open('message.php?userid=$userid','_self')</script>";
    }
};

if(isset($_GET['msgid']) ){
    $userid = $_GET['userid'];
    $msgid =$_GET['msgid'];
    $sql="delete from message where id = $msgid";
    mysqli_query($con,$sql);
    echo "<script>window.open('message.php?userid=$userid','_self')</script>";
}
if(isset($_POST['limit'] , $_POST['start']) ){
    $limit = 4;
    $start = $_POST['start'];

//     $sg = "SELECT users.* , message.* FROM message
//     inner join users on users.userid = message.sender
//     where (receiver = '$userid' and sender= '$id') || (receiver = '$id' and sender= '$userid') limit $start , $limit ;
   
//    ";
   
//    $go = mysqli_query($con,$sg);
//    while($Grow = mysqli_fetch_array($go)){
//         if($id == $Grow['receiver']){
//             $right = 'margin-left:300px;';
//         }else{
//         $right="margin-left:0px; ";}
//        $msg = $Grow['message'];
//        $send = $Grow['url_adress'];
//        $pathg = $Grow["img"];
//        $path_img = 'imagepost/'."$pathg";
//        $date = $Grow['date'];
//        $msgid = $Grow['id'];
//        echo"
//        <div class='row  mes' style='display: block; margin: 10px; margin-right: 10px; $right width: 60%;'>
//        <div class='col-xl-12 col-md-offset-6 float-right'>
//            <div class='panel panel-info ' style='background-color:#d0d8e4;'>
//                <div class=' panel-body messg'>
//                   <div class='col-xl-12 d-block'>
//                   <img src='$path_img' class='rounded-circle' style='height: 60px;'>
//                    <p><a href='profile.php?userid=$id'>$send</a> <i> commented</i> on $date</p>
//                    <h3 class='text-primaty' style='margin-left:5px; font-size:17px;'>$msg <a class='float-right' href='mes.php?msgid=$msgid&userid=$userid'>delete</a></h3>
//                         <span class='btn btn-info load'>+</span>
//                   </div>
//                </div>
//            </div>
//        </div>
//     </div>
//        ";

//      }
}


// function seemessages(){
//     global $con;
    
//     // $userid =setGetRequest('userid');
//     //  $post_id =$_REQUEST['postid'];
//     $ff = "SELECT post.*  FROM post 
//     ";
//     $Vcomment = mysqli_query($con,$ff);
//     while($rom = mysqli_fetch_array($Vcomment)){
        
//         $postid = $rom['postid'];

//         $sg = "SELECT message.* FROM message
//      where receiver = '$postid';
    
//     ";
//     $go = mysqli_query($con,$sg);
//     while($Grow = mysqli_fetch_array($go)){

//         $com = $Grow['message'];
//         //$com_author = $Grow['comment_author'];
//         $date = $Grow['date'];
//         echo"
//         <div class='row commentt'>
//         <div class='col-md-12 col-md-offset-6'>
//             <div class='panel panel-info'>
//                 <div class=' panel-body'>
//                    <div>
//                     <p>$com_author <i> commented</i> on $date</p>
//                     <h3 class='text-primaty' style='margin-left:5px; font-size:17px;'>$com </h3>
//                    </div>
//                 </div>
//             </div>
//         </div>
//      </div>
//         ";
//      }
//     };
    


// };
