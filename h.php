<?php
include "connect.php";

// $c = [  0 ,       
//       ['userid'] , 1109 ,['date'] 
//  ,'2022-04-10 16:08:24'  ]
//     ;
// //array_pop($c[2]);
// //$tyu = {"userid"=>"1109","date"=>"2022-04-10 16:08:24"};
// //echo type($tyu);
// echo count($c);
// echo " </br> </br>";

// $ff ['userid']= [25];
// $df = array_search(2,$c);
// array_push($c,$df);
// echo count($c);
// echo " </br> </br>";


// for($i = 0; $i < sizeof($c); $i++){
//     if($c[$i] == 1109){
//     unset( $c[$i]); }
// }
// print_r($c);
// // $q = array_push($ff['userid'],222);
// $ff['date'] = 100;
// $s = $ff;
// $d =json_encode($s);
// $e=111;
// echo " </br> </br>";
// print_r($d);
// echo " </br> </br>";
// $t['userid'] = [json_decode($d)];
// //$hh = array_column($t,$t['userid']);

// print_r($t);
// echo "good </br>";
// //print_r($hh);
// echo "good </br>";
// if(!in_array($e,$t)){
//     echo "good";
//     // while($ff){
//     // array_pop($e);
//     // print_r($ff); 
//     // }
//     $g = array_push($t,$e);
//     echo "good </br>";
//     // $ff['userid'] =[...$e];
//     // $d =json_encode($ff);
//     // $ff = $e;
//     print_r($t);
//     // file_put_contents($d,)

// }
// echo "</br> oh no";
// foreach($t as $a =>$v){
//   //  echo $a;
//   if($v == 111){
//       $t[$v]['userid'] = 4568;
//   }
//     echo "</br> oh no";

//     print_r($t);
// }
// echo "</br> ohhhh no";
// print_r($t['userid']);
// echo "</br> ohhhh no";
// foreach($t as $a =>$v){
//     //  echo $a;
//     if($v['userid'] == 4568){
//         unset($v['userid']);
//     }
//       echo "</br> oh no";
  
//       print_r($t);
//   }
// echo "</br> oh no";
// $r=111;
// if(in_array($r,$t,true)){
//     echo "</br> oh no";
    
//         for($i = 0 ;$i <count( $t); $i++){
//             $uu = 25;
//             if($t[$i] == 4568){
//                 echo "</br> oh no";
//                 echo $i;
//                 echo "</br> oh no";
//                 unset($t[$i]);
//                 print_r($t);
//             }
//             //print_r($ff);
//         }
//         echo "</br> oh no";
//     print_r($t);
// }

session_start(); 
// $user  = $_SESSION['user'];
// mysqli_query($con,"update post set likes = likes + 1 where user_name = '$user' ");
//     $userid = 1515;
// $nbn =  ["userid" => $userid];
// array_push($nbn,5555,444);
// print_r($nbn);
// $rrr = $nbn[0] ;
// echo "</br>";
// print_r($rrr);
// list($k , $w) = $nbn['userid'];
// print_r($nbn[0]);
// echo "</br>";
// if($nbn['userid'] === $userid){
//     echo "</br>";
// unset($nbn['userid']);
// }
// echo "</br>";
// print_r($nbn);
// for($i = 0 ;$i <sizeof( $nbn); $i++){
    
//     print_r($nbn);
    
//     } 
//     echo "</br>";
//     print_r($nbn);

//     $ff = json_encode($nbn);
//     echo "</br>";
//     print_r($ff);
//     echo "</br>"; echo "</br>"; echo "</br>";
//     $hh[] = json_decode($ff);
//     echo "</br>";
//     print_r($hh);
//     echo "</br>";
//     $gg['userid'] = $hh;
//     array_push($gg['userid'],array('userid' => 5000));
//     print_r($gg['userid'][0]);
//     $dd = $gg['userid'][0]  ;
//     print_r($dd);
    
//     unset($gg['userid'][0]);
//     $gg['userid'] = $dd;
//     print_r($gg);
//     echo "</br>";
    
//     $www = json_encode($gg);
//     print_r($www);
//     echo "</br>";
//     $zz[] = json_decode($www);
//     echo "</br>";
//     print_r($zz);
    
//     class kk {
//        public $userid = [4522] ;
//     }
//     $too = new kk;
//     echo "</br>";
//     print_r($too->userid);
//     echo "</br>";
//     $gg['userid'] = $zz;
//     array_push($too->userid, 5400);
//     echo "</br>";
//     print_r($too->userid);
//     $q = $gg['userid'][0];
//     echo "</br>";
//     // print_r($q['userid']);
//     unset($gg['userid'][0]);
//     // $gg['userid'] = $q;
//     // array_push($gg['userid'], 5400);
//     echo "</br>";
//

if(isset($_GET['postid']  ) ){
    $userid = $_GET['userid'];    
    $update_id = $_GET['postid'];
    
    
    
    $select_like = "select likes from likes where type = 'post' && contentid  = $update_id LIMIT 1 ";
    $res = mysqli_query($con,$select_like);
    $result = mysqli_fetch_array($res);
    if(is_array($result)){
        $likes['userid'] = $result['likes']  ;
        print_r( $likes['userid']);
      //  array_push($likes['userid'],1585);
         
        if($likes[0] == 2){
            $result['likes'] == $userid;
            $likes = $result['likes'];
            $upade_likes = "update  likes set likes = '$likes'  where type = 'post' && contentid  = $update_id limit 1";
            mysqli_query($con,$upade_likes);
            //echo "<script>window.open('profile_page.php','_self')</script>";

        }
        print_r($likes);
        if($likes['userid'][0] == $userid ){
        //     $tu = array_push($likes,$userid);
            print_r( $likes);
        //     $upade_likes = "update  likes set likes = ' ' where type = 'post' && contentid  = $update_id limit 1";
        // mysqli_query($con,$upade_likes);
                for($i = 0 ;$i <sizeof( $likes); $i++){
                    if($likes['userid'][$i] === $userid){
                
                    unset($likes[$i]);
                    }
                    
                    } 
                    //unset($likes[0]);
                    print_r( $likes);
                    echo "</br>";
                    $bb = implode(" ",$likes );
                    print_r($bb);
                    echo "</br>";
                    echo $bb;
                    $upade_likes = "update  likes set likes = '$likes'  where type = 'post' && contentid  = $update_id limit 1";
            mysqli_query($con,$upade_likes);

            $update_post = "update post set likes = likes - 1 where postid=$update_id limit 1";

            $run_update = mysqli_query($con,$update_post);
           echo "<script>window.open('profile_page.php','_self')</script>";


        }
        $likes= [];
        //         if($likes == 3) {
        //             $likes[] = $userid;
        if($likes["userid"] !== $userid){
            $likes= [];
            $hhgg = implode(" ",$likes );
         $likes = $hhgg;
         print_r( $likes);
         echo "</br>";
            $nbn =  ["userid" =>[ $userid]];
            array_push($nbn['userid'],5555);
            print_r($nbn);
            list($k , $w) = $nbn['userid'];
            print_r($nbn['userid']);
         array_push($likes['userid'],1585);
         
          print_r( $likes);
        // print_r($hhgg);
                    echo "</br>";
        //         }else{
        //  $likes[]  =  array_push($likes,$userid);
        //         }
            $upade_likes = "update  likes set likes = '$likes' where type = 'post' && contentid  = $update_id limit 1";
        mysqli_query($con,$upade_likes);
    }  
        //echo "<script>window.open('profile_page.php','_self')</script>";
    
}else{


    $likes =[ "userid" => [$userid]];
    // $hhgg = implode(" ",$likes );
    // $likes = $hhgg;
    // print_r( $likes);
    $x =$likes['userid'] ;
    $aaa = $x[0];
        print_r($x);
        print_r($aaa);
        $insert_likes = "insert into likes (type,contentid,likes) values('post','$update_id','$aaa')";
        mysqli_query($con,$insert_likes);

        $update_post = "update post set likes = likes + 1 where postid=$update_id limit 1";
    
        $run_update = mysqli_query($con,$update_post);

        print_r($likes);
   
      //  echo "<script>window.open('profile_page.php','_self')</script>";
        
    }

}