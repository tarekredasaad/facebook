<?php
include "connect.php";


if(isset($_POST['reply']) && isset($_GET['postid']) && isset($_GET['userid'])){

    $userid = $_GET['userid'];    
    $post_id = $_GET['postid'];
    $comment = $_POST['comment'];

    
    if($comment == ""){
        echo "<script>alert('enter your comment!')</script>";
        echo "<script>window.open('profile_page.php','_self')</script>";
    }else{

        $stmt = mysqli_query($con,"SELECT users.url_adress  FROM users
         where userid = $userid
        

");

    $rows=mysqli_fetch_array($stmt);
    $Nuser = $rows['url_adress'];
        $insert = "insert into comments (post_id,user_id,comments,comment_author,date)
        values('$post_id','$userid','$comment','$Nuser',now())";
        $run = mysqli_query($con,$insert);
        
        $note = "INSERT INTO notification (userid,activity,contentid,content_owner,content_type,date)
        values ('$userid','commented','$post_id',(select userid from post where postid = '$post_id') ,'Post',now())";
        $noti = mysqli_query($con,$note);
        
        $update_comment = "update post set  comment = comment + 1 where postid= $post_id";
        $run_update = mysqli_query($con,$update_comment);
        echo "<script>window.open('profile_page.php','_self')</script>";
    }
};

$test = isset($_COOKIE['postid']) ? $_COOKIE['postid'] : " cool" ;
// echo $test ;
// }
// echo getpost();
// function setGetRequest($url)
// {
//     $query = parse_url($url, PHP_URL_QUERY);
//     parse_str($query, $_GET);
// }

// $url = 'comments.php?postid= $postid &userid=$userid';

// setGetRequest($url);   

// var_dump($_REQUEST);
    
//     print_r($_GET);

    function seeComments(){
        global $con;
        
        // $userid =setGetRequest('userid');
        //  $post_id =$_REQUEST['postid'];
        $ff = "SELECT post.*  FROM post 
        ";
        $Vcomment = mysqli_query($con,$ff);
        while($rom = mysqli_fetch_array($Vcomment)){
            
            $postid = $rom['postid'];

            $sg = "SELECT comments.* FROM comments
         where post_id = '$postid';
        
        ";
        $go = mysqli_query($con,$sg);
        while($Grow = mysqli_fetch_array($go)){

            $com = $Grow['comments'];
            $com_author = $Grow['comment_author'];
            $date = $Grow['date'];
            echo"
            <div class='row commentt'>
            <div class='col-md-12 col-md-offset-6'>
                <div class='panel panel-info'>
                    <div class=' panel-body'>
                       <div>
                        <p>$com_author <i> commented</i> on $date</p>
                        <h3 class='text-primaty' style='margin-left:5px; font-size:17px;'>$com </h3>
                       </div>
                    </div>
                </div>
            </div>
         </div>
            ";
         }
        };
        

    
};


