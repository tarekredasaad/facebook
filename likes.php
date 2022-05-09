<?php
include "connect.php";
//     print_r($gg);


if(isset($_GET['postid']  ) && isset( $_GET['userid']) && isset( $_GET['type']) || isset( $_GET['comid'])){
    $userid = $_GET['userid'];    
    $update_id = $_GET['postid'];
    $type = $_GET['type'];
    $comid = $_GET['comid'];
    print_r($comid . $_GET['comid']);
    $quer = "select * from post where postid = '$update_id'";
    $own = mysqli_query($con,$quer);
    $owner = mysqli_fetch_array($own);
    $owner_content = $owner['userid'];
    
    $select_like = "select likes from likes where type = '$type' && contentid  = $update_id LIMIT 1 ";
    $res = mysqli_query($con,$select_like);
    $result = mysqli_fetch_array($res);
    if(is_array($result)){
//         //$ty = $result['likes'];
        $likes = json_decode($result['likes']  ,true);
//        // $kl = array_column($likes, "userid");
        print_r($likes['user']);
//         echo "</br> gg";
//         print_r($likes);
//         echo "</br> hj";
//         print_r(count($result));
//         //echo $result;
//         echo "</br> kil";
//         $user_id[] = $likes;
//         print_r($user_id);
//         echo "</br> odddh </br> ". $userid ."</br>";
         if(!in_array($userid,$likes['user']) ){
//         //if($ty !== $userid){
             array_push($likes['user'],$userid);
//       / $arr['date'] = date("Y-m-d H:i:s");
//        }
//              }

//        // $user_id[] = $arr;
        $likes_string = json_encode($likes);
        print_r($likes_string);
//         // echo "</br>";
        print_r($likes);

        $upade_likes = "update  likes set likes = '$likes_string' where type = '$type' && contentid  = $update_id limit 1";
        mysqli_query($con,$upade_likes);
        $note = "INSERT INTO notification (userid,activity,contentid,content_owner,content_type,date,noti_status)
        values ('$userid','liked','$update_id','$owner_content','$type',now(),0)";
        $noti = mysqli_query($con,$note);
        if($type == 'post'){
        $update_post = "update post set likes = likes + 1 where postid =$update_id limit 1";
    
        $run_update = mysqli_query($con,$update_post);
        }else {
            $com = "update comments set likes = likes + 1 where com_id = $comid ";
    
            $run_update = mysqli_query($con,$com);
        }
   
        echo "<script>window.open('profile_page.php','_self')</script>";
        }else{
         //     }
            for($i = 0 ;$i <sizeof($likes['user']); $i++){
                if($likes['user'][$i] === $userid){
            unset($likes['user'][$i]);
                }
            }
//             print_r($user_id);

            $likes_string = json_encode($likes);
//             print_r($likes_string);
//             echo $likes_string;

        $upade_likes = "update  likes set likes = '$likes_string'  where type = '$type' && contentid  = $update_id limit 1";
        mysqli_query($con,$upade_likes);

        if($type == 'post'){
            $update_post = "update post set likes = likes - 1 where postid=$update_id limit 1";
        
            $run_update = mysqli_query($con,$update_post);
            }else {
                $com = "update comments set likes = likes - 1 where com_id = $comid ";
        
                $run_update = mysqli_query($con,$com);
            }
        echo "<script>window.open('profile_page.php','_self')</script>";
        
        }
    }else{
        // $arr['userid'] = $userid;
        // $arr['date'] = date("Y-m-d H:i:s");

        // $arr2[] = $arr;
        // $likes = json_encode($arr2);
        
        class user {
            // $userid = $_GET['userid'];
            public $user = [];
        }
        $like = new user ;
        array_push($like->user,$userid);
        $likes = json_encode($like);
        $insert_likes = "insert into likes (type,contentid,likes) values('$type','$update_id','$likes')";
        mysqli_query($con,$insert_likes);

        $note = "INSERT INTO notification (userid,activity,contentid,content_owner,content_type,date,noti_status)
        values ('$userid','liked','$update_id','$owner_content','$type',now(),0)";
        $noti = mysqli_query($con,$note);

        if($type == 'post'){
            $update_post = "update post set likes = likes + 1 where postid=$update_id limit 1";
        
            $run_update = mysqli_query($con,$update_post);
            }else {
                $com = "update comments set likes = likes + 1 where com_id=$comid ";
        
                $run_update = mysqli_query($con,$com);
            }
    
   
        echo "<script>window.open('profile_page.php','_self')</script>";
        
    }

    
}

?>