<?php
include "connect.php";
include "function.php";

if(isset($_GET['owner'],$_GET['target']) ){

    $owner = $_GET['owner'];    
    $target = $_GET['target'];

    $ff = "insert into friends (user_id,friend_id,status,date)
    values ('$owner','$target','pending',now())";
    $run = mysqli_query($con,$ff);




    echo "<script>window.open('profile_page.php','_self')</script>";

}


if(isset($_GET['ownerid'],$_GET['targetid']) ){

    $owner = $_GET['ownerid'];    
    $target = $_GET['targetid'];

    $ff = "delete from friends where user_id = $target && friend_id = $owner && status = 'pending'";
    $run = mysqli_query($con,$ff);

    echo "<script>window.open('profile_page.php','_self')</script>";

}

if(isset($_GET['o_req'],$_GET['o_targ'])){
    $owner = $_GET['o_req'];    
    $target = $_GET['o_targ'];
    $ffr = "select users . * from users where userid = '$owner'";
    $friend = mysqli_query($con,$ffr);
    $friend_row = mysqli_fetch_array($friend);
    $name = $friend_row['url_adress'];
    $imgg = $friend_row['img'];
    $usr = "select users . * from users where userid = '$target'";
    $user1 = mysqli_query($con,$usr);
    $user_row = mysqli_fetch_array($user1);
    $usname = $user_row['url_adress'];
    $usimgg = $user_row['img'];
    $ff = "update friends set 
    ,friend_name = '$name',friend_img = '$imgg',
    user_name = '$usname',user_img = '$usimgg' where user_id = '$target' and friend_id = '$owner' ";
    $run = mysqli_query($con,$ff);
    

    // $fe = "delete from friend_request where owner_target = $target && owner_request = $owner";
    // $run2 = mysqli_query($con,$fe);
    echo "<script>window.open('profile_page.php','_self')</script>";
}



// if(isset($_GET['o_req'],$_GET['o_targ'])){

//     $owner = $_GET['o_req'];    
//     $target = $_GET['o_targ'];

//     $select_like = "select likes from likes where type = '$type' && contentid  = $update_id LIMIT 1 ";
//     $res = mysqli_query($con,$select_like);
//     $result = mysqli_fetch_array($res);
//     if(is_array($result)){
// //         //$ty = $result['likes'];
//         $likes = json_decode($result['likes']  ,true);
// //        // $kl = array_column($likes, "userid");
//         print_r($likes['user']);
// //         echo "</br> gg";
// //         print_r($likes);
// //         echo "</br> hj";
// //         print_r(count($result));
// //         //echo $result;
// //         echo "</br> kil";
// //         $user_id[] = $likes;
// //         print_r($user_id);
// //         echo "</br> odddh </br> ". $userid ."</br>";
//          if(!in_array($userid,$likes['user']) ){
// //         //if($ty !== $userid){
//              array_push($likes['user'],$userid);
// //       / $arr['date'] = date("Y-m-d H:i:s");
// //        }
// //              }

// //        // $user_id[] = $arr;
//         $likes_string = json_encode($likes);
//         print_r($likes_string);
// //         // echo "</br>";
//         print_r($likes);

//         $upade_likes = "update  likes set likes = '$likes_string' where type = '$type' && contentid  = $update_id limit 1";
//         mysqli_query($con,$upade_likes);
//         $note = "INSERT INTO notification (userid,activity,contentid,content_owner,content_type,date,noti_status)
//         values ('$userid','liked','$update_id','$owner_content','$type',now(),0)";
//         $noti = mysqli_query($con,$note);
//         if($type == 'post'){
//         $update_post = "update post set likes = likes + 1 where postid =$update_id limit 1";
    
//         $run_update = mysqli_query($con,$update_post);
//         }else {
//             $com = "update comments set likes = likes + 1 where com_id = $comid ";
    
//             $run_update = mysqli_query($con,$com);
//         }
   
//         echo "<script>window.open('profile_page.php','_self')</script>";
//         }else{
//          //     }
//             for($i = 0 ;$i <sizeof($likes['user']); $i++){
//                 if($likes['user'][$i] === $userid){
//             unset($likes['user'][$i]);
//                 }
//             }
// //             print_r($user_id);

//             $likes_string = json_encode($likes);
// //             print_r($likes_string);
// //             echo $likes_string;

//         $upade_likes = "update  likes set likes = '$likes_string'  where type = '$type' && contentid  = $update_id limit 1";
//         mysqli_query($con,$upade_likes);

//         if($type == 'post'){
//             $update_post = "update post set likes = likes - 1 where postid=$update_id limit 1";
        
//             $run_update = mysqli_query($con,$update_post);
//             }else {
//                 $com = "update comments set likes = likes - 1 where com_id = $comid ";
        
//                 $run_update = mysqli_query($con,$com);
//             }
//         echo "<script>window.open('profile_page.php','_self')</script>";
        
//         }
//     }else{
//         // $arr['userid'] = $userid;
//         // $arr['date'] = date("Y-m-d H:i:s");

//         // $arr2[] = $arr;
//         // $likes = json_encode($arr2);
        
//         class user {
//             // $userid = $_GET['userid'];
//             public $user = [];
//         }
//         $like = new user ;
//         array_push($like->user,$userid);
//         $likes = json_encode($like);
//         $insert_likes = "insert into likes (type,contentid,likes) values('$type','$update_id','$likes')";
//         mysqli_query($con,$insert_likes);

//         $note = "INSERT INTO notification (userid,activity,contentid,content_owner,content_type,date,noti_status)
//         values ('$userid','liked','$update_id','$owner_content','$type',now(),0)";
//         $noti = mysqli_query($con,$note);

//         if($type == 'post'){
//             $update_post = "update post set likes = likes + 1 where postid=$update_id limit 1";
        
//             $run_update = mysqli_query($con,$update_post);
//             }else {
//                 $com = "update comments set likes = likes + 1 where com_id=$comid ";
        
//                 $run_update = mysqli_query($con,$com);
//             }
    
   
//         echo "<script>window.open('profile_page.php','_self')</script>";
        
//     }

// }