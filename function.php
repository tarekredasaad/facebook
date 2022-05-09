<?php
include "connect.php";



session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
} 
    $id = $_SESSION['userid'];
function redirectHome($theMsg,$url = null, $seconds = 3) {
    if ($url === null) {
        $url = 'index.php';
    }else {
        $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : 'index.php' ;
            
        
    }


    echo $theMsg;
    echo "<div class='alert alert-info'> You Will Be Redirected to Homepage After $seconds.</div>";
    header("refresh:$seconds;url=$url");
    exit();
}

function yourpost(){
    global $con;
    $id = $_GET['userid'];
    
    global $username;
 $stmt = mysqli_query($con,"SELECT users.url_adress,
  post.* FROM post 
 INNER JOIN users ON users.userid = post.userid 
 where post.userid = '$id';
");

while($rows=mysqli_fetch_array($stmt)){
  
    $date = $rows['date'];
  
    $content =  $rows['post'];
    $pathg = $rows["image"];
    $path_img = 'imagepost/'."$pathg";
    $postid = $rows['postid'];
    $username = $rows['url_adress'];
    echo "
    <div class='posts'>
        <div>
                            <img src='$path_img' style='width:75px; height:75px;' >
                         </div> 
                         <div>
                             <div style='color:#405d9b'>$username</div>
                            <p> $content Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore deserunt beatae quas sint explicabo placeat, amet quam neque iste voluptas recusandae fugiat labore nesciunt iusto odit consectetur cupiditate aut reiciendis!</p> 
                            <br>
                            <br>
                            <span style='color:#aaa; cursor:pointer;' class='like'>Like</span> <a href='likes.php'>Comment</a> <span style='color:#aaa;'> $date  April 5 20:45</span>  <a href='delete_post.php?postid=" . $postid . "' style='color:#aaa; float:right;'>Delete</a>
                         </div>
                         </div>
    ";
    }
 }

    global $con;

    function Notification() {
        global $con;
        $id = $_SESSION['userid'];
        $noti = "select users.url_adress , notification.* from notification 
            inner join users on users.userid = notification.userid 
            where content_owner = '$id' ";
            $s_noti = mysqli_query($con,$noti);
            while($notific = mysqli_fetch_array($s_noti) ) {
                $fan = $notific['url_adress'];
                $activ = $notific['activity'];
                echo " 
                <div class='notifications' > <h6> $fan  $activ Your post  </h6>
                </div> <br/>
                ";
        };
    };
    function members(){
        global $con;
    $id = $_SESSION['userid'];
    $ffr = "select users . * ,group_members.* from group_members
    inner join users on users.userid = group_members.userid ";
    $friend = mysqli_query($con,$ffr);
  
    while($friend_row = mysqli_fetch_array($friend)) {
        $name = $friend_row['url_adress'];
        $userids = $friend_row['userid'];
        $im = $friend_row['img'];
        if($friend_row['img'] !== ""){
            $img = "imagepost/$im";
        }else{
               $img = $friend_row['gender'] == "female"? "imagepost/user_female.jpg" : "imagepost/user_male.jpg" ;
        }
        
       echo "<div  id='friends'>
        <a href= 'profile.php?userid=$userids'> <img src='$img' alt=''> <br> $name </a>
    </div>";
    }  
    };
  
    function friends(){
        global $con;
    $id = $_SESSION['userid'];
    $ffr = "SELECT * FROM `users`LEFT JOIN friends ON 
    friends.user_id = users.userid GROUP BY url_adress HAVING users.userid
     NOT IN (SELECT user_id FROM`friends` WHERE friend_id = $id
     AND status != 'pending' ) AND users.userid not IN 
      (SELECT friend_id FROM`friends` WHERE  status != 'pending'
      AND user_id = $id)  AND users.userid != $id;
    ;

    ";
    $friend = mysqli_query($con,$ffr);
  
    while($friend_row = mysqli_fetch_array($friend)) {
        $name = $friend_row['url_adress'];
        $userids = $friend_row['userid'];
        $im = $friend_row['img'];
        // $status = $friend_row['request_status'];
        $no = "display:none";
        $status = $friend_row['status'] == 'pending'  ? "<a href='friend.php?ownerid=$id&targetid=$userids' class='btn btn-danger reject ' style='font-size: 10px;'>Reject friend</a><br>" : "<a href='friend.php?owner=$id&target=$userids' class='btn btn-info request' style='font-size: 10px;'>Request friend</a><br>";
        // if($status === 'pending'){
            
        //     echo "<a href='friend.php?owner=$id&target=$userids' class='btn btn-danger reject ' style='font-size: 10px;'>Reject friend</a>";
        // }
        //  if($status == Null){
        
        //     echo "<a href='friend.php?owner=$id&target=$userids' class='btn btn-info request ' style='font-size: 10px;'>Request friend</a>";
        
        //  }
        if($friend_row['img'] !== ""){
            $img = "imagepost/$im";
        }else{
               $img = $friend_row['gender'] == "female"? "imagepost/user_female.jpg" : "imagepost/user_male.jpg" ;
        }
        // if ( $friend_row['request_status'] == 'friend' &&  $friend_row['owner_request'] == $id ||  $friend_row['owner_target'] == $id) {
        //     $ddsd = "<div style='display:none;'>
        //     <a href= 'profile.php?userid=$userids'> <img src='$img' > <br> $name </a>   
        //     </div>";
        // }else{
        //     $ddsd = "<div style='display:block;'>
        //     <a href= 'profile.php?userid=$userids'> <img src='$img' > <br> $name </a>   
        //     </div>";
        // }
        $ddsd = "<div style='display:block;'>
        <a href= 'profile.php?userid=$userids'> <img src='$img' > <br> $name </a>           $status
        </div>";
        
        
       echo "<div  id='friends'>
       $ddsd 
    </div>";
    }  
    };

    function groups(){
        global $con;
    $id = $_SESSION['userid'];
    $ffr = "select groups . * from groups ";
    $friend = mysqli_query($con,$ffr);
    
    while($friend_row = mysqli_fetch_array($friend)) {
        $name = $friend_row['groupName'];
        $groupID = $friend_row['groupID'];
        
       echo "<div  id='friends'> $groupID 
        <a href= 'group_page.php?userid=$id&groupID=$groupID '>   $name </a>
    </div> <br>";
    }  
    };

    function yourFriends(){
        global $con;
    $id = $_GET['userid'];
    $ffr = "SELECT * FROM `users`LEFT JOIN friends ON 
    friends.user_id = users.userid GROUP BY url_adress HAVING users.userid
     NOT IN (SELECT user_id FROM`friends` WHERE friend_id = $id
     AND status != 'pending' ) AND users.userid not IN 
      (SELECT friend_id FROM`friends` WHERE  status != 'pending'
      AND user_id = $id)  AND users.userid != $id";
    $friend = mysqli_query($con,$ffr);
        while($friend_row = mysqli_fetch_array($friend)) {
            $name = $friend_row['url_adress'];
            $userids = $friend_row['userid'];
            $status = $friend_row['status'] == 'pending'? "<a href='friend.php?ownerid=$id&targetid=$userids' class='btn btn-danger reject ' style='font-size: 10px;'>Reject friend</a><br>" : "<a href='friend.php?owner=$id&target=$userids' class='btn btn-info request' style='font-size: 10px;'>Request friend</a><br>";
       
            $im = $friend_row['img'];
            if($friend_row['img'] !== ""){
                $img = "imagepost/$im";
            }else{
                $img = $friend_row['gender'] == "female"? "imagepost/user_female.jpg" : "imagepost/user_male.jpg" ;
            }
        
        echo "<div  id='friends'>
            <a href= 'profile.php?userid=$userids'> <img src='$img' alt=''> <br> $name </a> $status  
        </div>";
        }  
    }
        function friend_request(){
            global $con;
            $target = $_GET['userid'];
            $f_m = "SELECT  friends.*,users.* FROM
             `friends` INNER join users on users.userid =
              friends.user_id
             where friend_id = $target && status = 'pending' 
            ;
            " ;
                $fi_M = mysqli_query($con,$f_m);
                while($ffr_num = mysqli_fetch_array($fi_M)){
                    $name = $ffr_num['url_adress'];
                $o_req = $ffr_num['user_id'];
                $o_tar = $ffr_num['friend_id'];
                 $img = "imagepost/user_male.jpg";
                if($ffr_num['gender'] == "female"){
                    $img = "imagepost/user_female.jpg";
                }
        
                    echo "<div  id='friends' class='col-12'>
                        <a href= 'message.php?userid=$o_req'> <img src='$img' alt=''> </a> <br> $name 
                        <a href='friend.php?o_req=$o_req&o_targ=$o_tar' class='btn btn-info'>Accept</a>
                        <a href='friend.php?ownerid=$o_req&targetid=$o_tar' class='btn btn-danger'>Reject</a>
                    </div>";
                }
        }


        function FriendsList(){
            global $con;
        $id = $_GET['userid'];
        $ffr = "select users.*, friends.* from friends
         INNER JOIN users ON users.userid = friends.user_id
         where friends.user_id = '$id' || friends.friend_id = '$id'";
        $friend = mysqli_query($con,$ffr);
            while($friend_row = mysqli_fetch_array($friend)) {
                $name = $friend_row['friend_name'];
                $F_ids = $friend_row['friend_id'];
                $user_ids = $friend_row['user_id'];
                $iggm = $friend_row['friend_img'];
                $imfg = "";
                
                if($friend_row['friend_img'] !== ""){
                    $imfg = $iggm ;
                }else {
                    $imfg = $friend_row['gender'] == "female"? "user_female.jpg" : "user_male.jpg" ;
                }
                $user_n = $friend_row['user_name'];
                $user_img = $friend_row['user_img'];
                $imug = "";
                if($friend_row['user_img'] !== ""){
                    $imug = $user_img ;
                }else {
                    $imug = $friend_row['gender'] == "female"? "user_female.jpg" : "user_male.jpg" ;
                }
            $img = "imagepost/$iggm";
             $imng = $friend_row['user_id'] == $id ? "imagepost/$imfg" : "imagepost/$imug";
             $p_name = $friend_row['user_id'] == $id ? $friend_row['friend_name'] : $friend_row['user_name'] ;
             $x_id = $friend_row['user_id'] == $id ? $friend_row['friend_id'] : $friend_row['user_id'] ;
                // if($friend_row['gender'] == "female"){
                //     $img = "imagepost/user_female.jpg";
                // }
            
            echo "<div  id='friends' class='col-12'>
                <a href= 'profile.php?userid=$x_id'> <img src='$imng' alt=''> <br> $p_name </a>
            </div>";
            }  
        }



    function MessageyourFriends(){
        global $con;
    $id = $_GET['userid'];
    $ffr = "select users . * from users where userid != '$id'";
    $friend = mysqli_query($con,$ffr);
        while($friend_row = mysqli_fetch_array($friend)) {
            $name = $friend_row['url_adress'];
            $userids = $friend_row['userid'];
        $img = "imagepost/user_male.jpg";
            if($friend_row['gender'] == "female"){
                $img = "imagepost/user_female.jpg";
            }
        
        echo "<div  id='friends' class='col-12'>
            <a href= 'message.php?userid=$userids'> <img src='$img' alt=''> <br> $name </a>
        </div>";
        }  
    }
    
    
    
    $sqlinusers = "SELECT users.url_adress ,post.*  
     FROM post
 INNER JOIN users ON users.userid = post.userid 
  ";
    $sell= mysqli_query($con,$sqlinusers);
    $sr =mysqli_fetch_array($sell);
    $username = $sr['url_adress'];
 

    function groupPost(){
        global $con;
         $isd = $_GET['userid'];
         $groupID = $_GET['groupID'];
        if(isset($_POST['sub'])){
           
            $post  = $_POST['post'];
            $upload_image = $_FILES['upload_image']['name'];
        $image_tmp = $_FILES['upload_image']['tmp_name'];
        $sql = "insert into group_post(userid,post,date,image,group_ID)
        values( '$isd','$post',now(),'$upload_image','$groupID')";
   
        mysqli_query($con,$sql);
        }
        $stmt2 = mysqli_query($con,"SELECT group_post.* FROM group_post 
        ");
        $rows2=mysqli_num_rows($stmt2);
            
        $limit = 3;
        $page_number = 1 ;
        $end_page = ceil($rows2 / 3);
        $page_number = isset($_GET['page']) ?(int) $_GET['page'] : 1;
        $page_number = $page_number < 1 ?  1 : $page_number ;
        $page_number = $page_number > $end_page ?   $end_page : $page_number ;
        $offset = ($page_number - 1) * $limit ;

                $stmt = mysqli_query($con,"SELECT users.* ,group_post.*  
        FROM group_post
        INNER JOIN users ON users.userid = group_post.userid where group_ID = '$groupID'  limit  $limit offset $offset

        ");

        while($rows=mysqli_fetch_array($stmt)){
            $date = $rows['date'];
  
            $content =  $rows['post'];
            $postid = $rows['G_Post_id'];
            $userid = $_SESSION['userid'];
            $pathg = $rows["img"];
            $Nlike = " ";
            if($rows['likes'] > 0){
            $Nlike = $rows['likes'];
            }
            $Ncomment = $rows['comments'];
            $Nuser = $rows['url_adress'];
            $userids = $rows['userid'];
            $path_img = 'imagepost/'."$pathg";
            
            if($rows['img'] !== ""){
                $path_img = 'imagepost/'."$pathg";
            }else{
                $path_img = $rows['gender'] == "female"? "imagepost/user_female.jpg" : "imagepost/user_male.jpg" ;
            }
            echo "
            <div class='posts'>
                <div>
                                    <img src='$path_img' style='width:75px; height:75px;' >
                                </div> 
                                <div>
                                    <div style='color:#405d9b'><a href='profile.php?userid=$userids'>$Nuser</a></div>
                                    <p> $content Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore deserunt beatae quas sint explicabo placeat, amet quam neque iste voluptas recusandae fugiat labore nesciunt iusto odit consectetur cupiditate aut reiciendis!</p> 
                                    <br>
                                    <br>
                                    <a href='likes.php?postid= $postid &type=post&userid=$userid'  style='color:#aaa; ' class='like'>$Nlike Like</a> <span class=' com' style='color:#aaa; '>($Ncomment) Comment</span> <span style='color:#aaa;'> $date  April 5 20:45</span>
                                </div>
                                </div>
            ";
            echo"
            <div class='row'>
            <div class='col-md-12 col-md-offset-6'>
                <div class='panel panel-info'>
                    <div class=' panel-body'>
                        <form action='comments.php?postid= $postid &userid=$userid ' method='post' class='form-inline'>
                            <textarea placeholder='what's on your mind' style='height:30px;width:80%;'
                            class='pd-cmnt-textarea bb' name='comment'>   </textarea>
                        <a href='comments.php?postid= $postid &userid=$userid'> <span class='info pull-right' name='reply'>Comment</span></a>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        ";
        }
    }

    // function shares(){
        
    // }
    // function postid(){
    //     $length = rand(4,19);
    //     $number = "";
    //     for($i=0 ; $i < $length; $i++){
            
    //         $new_rand = rand(0,9);
    //         $number = $number . $new_rand;
    //     }
    //     return $number;
    // }



 function getPost(){
    global $con;
    global $id;
    global $username;
if(isset($_POST['sub'])){
    global $con;
    
    $post  = $_POST['post'];
    function postid(){
    $length = rand(4,19);
    $number = "";
    for($i=0 ; $i < $length; $i++){
        
        $new_rand = rand(0,9);
        $number = $number . $new_rand;
    }
    return $number;
}
    $postid = postid();
    echo $postid;
   
    $upload_image = $_FILES['upload_image']['name'];
        $image_tmp = $_FILES['upload_image']['tmp_name'];
        
        $sql = "insert into post(postid,userid,post,date,image)
        values('$postid', '$id','$post',now(),'$upload_image')";
   
    mysqli_query($con,$sql);
}



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

$stmt = mysqli_query($con,"SELECT users.* ,post.*  
FROM post
INNER JOIN users ON users.userid = post.userid where post_shared !=1 and shares !=1  limit  $limit OFFSET $offset

");

while($rows=mysqli_fetch_array($stmt)){
   
    $date = $rows['date'];
  
    $content =  $rows['post'];
    $postid = $rows['postid'];
    $_COOKIE['postid'] = $rows['postid'];
    $userid = $_SESSION['userid'];
    $pathg = $rows["img"];
    $Nlike = " ";
    if($rows['likes'] > 0){
    $Nlike = $rows['likes'];
    }
    $Ncomment = $rows['comment'];
    $Nuser = $rows['url_adress'];
    $userids = $rows['userid'];
    $path_img = 'imagepost/'."$pathg";
    if($rows['img'] !== ""){
        $path_img = 'imagepost/'."$pathg";
    }else{
        $path_img = $rows['gender'] == "female"? "imagepost/user_female.jpg" : "imagepost/user_male.jpg" ;
    }
    
    
        
    
    echo "
    <div class='posts col-sm-12'>
        <div>
                            <img src='$path_img' style='width:75px; height:75px; border-radius:50%;' >
                         </div> 
                         <div>
                             <div ><a href='profile.php?userid=$userids' style='color:black'>$Nuser</a></div>
                            <p> $content Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore deserunt beatae quas sint explicabo placeat, amet quam neque iste voluptas recusandae fugiat labore nesciunt iusto odit consectetur cupiditate aut reiciendis!</p> 
                            <br>
                            <a href='likes.php?postid= $postid &type=post&userid=$userid'><span class='likes'><i class='fa fa-thumbs-up'></i></span></a>  <span class='commenticon'><i class='fa fa-comment'></i></span> <a href='directShare.php?postid= $postid &ownerpost=$userids&userid=$userid'  style='color:white; ' class='like commenticon'><span><i class='fa fa-share' aria-hidden='true'></i></span> </a>
                            <br>
                            <a href=''  style='color:white; ' class='like'>$Nlike Like</a> <span class=' com' style='color:white; '>($Ncomment) Comment</span> 
                            <a href='directShare.php?postid= $postid &ownerpost=$userids&userid=$userid'  style='color:white; ' class='like'> Share</a> <span style='color:white;'> $date  April 5 20:45</span>
                            </div>
                         </div>
    ";
    echo"
    <div class='row'>
       <div class='col-md-12 col-md-offset-6'>
           <div class='panel panel-info'>
               <div class=' panel-body'>
                   <form action='comments.php?postid= $postid &userid=$userid ' method='post' class='form-inline'>
                    <textarea placeholder='what's on your mind' style='height:30px;width:80%; border-radius: 15px; background-color: cornflowerblue; color: white;'
                    class='pd-cmnt-textarea' name='comment'>   </textarea>
                   <a href='comments.php?postid= $postid &userid=$userid'> <span class='info pull-right' name='reply'>Comment</span></a>
                   </form>
               </div>
           </div>
       </div>
    </div>
   ";

   $sg = "SELECT comments.* FROM comments
   where post_id = $postid
  
  ";
  $go = mysqli_query($con,$sg);
  while($Grow = mysqli_fetch_array($go)){

      $com = $Grow['comments'];
      $com_author = $Grow['comment_author'];
      $date = $Grow['date'];
      $com_id = $Grow['com_id'];
      $Mlike = $Grow['likes'];
      echo"
      <div class='row commentt' style='background-color: #3f5a8c; color: white;margin-top: 5px; margin-bottom: 4px;border-radius: 15px; width: 480px; margin-left: 2px;'>
      <div class='col-md-12 col-md-offset-6'>
          <div class='panel panel-info'>
              <div class=' panel-body'>
                 <div>
                  <p>$com_author <i> commented</i> on $date</p>
                  <h3 class='text-primaty' style='margin-left:5px; font-size:17px;'>$com </h3>
                  <span style='display:block;'>
                  <a href='likes.php?postid= $postid &type=comment&userid=$userid&comid=$com_id' style='color:white;'>$Mlike like</a> <a>comment</a><span/>
                 </div>
              </div>
          </div>
      </div>
   </div>
   
      ";

      
            }
    }
        ?>
        <script>
            var postid= <?php echo $postid;?> ;
            var userid= <?php echo $userid;?> ;
            var like = 'likes.php?postid='+postid+'&type=post&userid='+userid;
      $(document).ready(function () {
          $('.like').click(function (e) {
           // $('.notification').fadeIn(1000);
            e.preventDefault();
          // this.open('GET','likes.php?postid='+postid+'&type=post&userid='+userid,true);
            //  $.load('GET','likes.php?postid='+postid+'&type=post&userid='+userid);      
              jQuery.ajax({
                method: 'GET',
				url: like,
                dataType:'html',
                
                data:{'userid':userid,'postid':postid,'type':'post'},

				success:function(){
                    // $('.notification').show();
					console.log(like+'likes.php?postid='+ postid +'&type=post&userid=' + userid);
					//$('#notifications_counter').fadeOut('slow');
				}
			  })
              return true;
          });
          
      });
   </script>
   <?php

    $hh ="select shares.* ,users.*,post.* from shares 
    inner join users on users.userid = shares.owner_share
    inner join post on post.postid = shares.post_id";
    $o_sh=mysqli_query($con,$hh);
    while($ow_sh=mysqli_fetch_array($o_sh)){
        $imgg= $ow_sh['img_share'];
        $igg= $ow_sh['img_post'];
        $nam_po= $ow_sh['name_post'];
    $nam_sh= $ow_sh['name_share'];
    $user_shar = $ow_sh['owner_share'];
    $user_post = $ow_sh['owner_post'];
    $cont = $ow_sh['content'];
    $pp = $ow_sh['post'];
    $p_id = $ow_sh['post_id'];
    $shar_img = 'imagepost/'."$imgg";
    $post_img = 'imagepost/'."$igg";
    if($ow_sh['img'] !== ""){
        $shar_img = 'imagepost/'."$imgg";
    }else{
        $shar_img = $ow_sh['gender'] == "female"? "imagepost/user_female.jpg" : "imagepost/user_male.jpg" ;
    }
    echo "
    
    ";
    
    
   
        echo "
        <div class='posts col-sm-12'>
        <div>
            <div style='margin-bottom:11px;'>
            <img src='$shar_img' style='width:75px; height:75px; border-radius:50%;' >
            <a href='profile.php?userid=$user_shar' style='color:black'>$nam_sh</a>
            <br><span>$cont</span><br>
                        
                     </div> 
                     <div>
                         <div style='display:inline;'><img src='$post_img' style='width:75px; height:75px; border-radius:50%;' >
                         <a href='profile.php?userid=$user_post' style='color:black'>$nam_po</a></div>
                        <span > $pp </span> 
                        <br>
                        <a href='likes.php?postid=$p_id&type=post&userid=$userid'><span class='likes'><i class='fa fa-thumbs-up'></i></span></a>  <span class='commenticon'><i class='fa fa-comment'></i></span>
                        <br>
                        <a href='likes.php?postid=$p_id&type=post&userid=$userid'  style='color:white; ' class='like'>$Nlike Like</a> <span class=' com' style='color:white; '>($Ncomment) Comment</span> 
                        <a href='directShare.php?postid= $p_id &ownerpost=$userids&userid=$userid'  style='color:white; ' class='like'> Share</a> <span style='color:white;'> $date  April 5 20:45</span>
                        </div>
                        </div>
                     </div>
    ";
    
        }
    };

  

  
    
    
   
    

 

 
        


    
    
  



    

        
                
        
    
  

  
    
    
   
    

 





?>