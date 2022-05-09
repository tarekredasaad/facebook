<?php 

include "connect.php";
include "header.php";
session_start();
if(!isset($_SESSION['UID'])){
    header('location:index.php');
} 
print_r( 'welcome' . $_SESSION['user']) ;
$uid=$_SESSION['UID'];
$name=$_SESSION['user'];
$status_update = "update user set status = 1 where name = '$name'";
mysqli_query($con,$status_update);


    
if(isset($_POST['submit'])){
	$to_id=mysqli_real_escape_string($con,$_POST['to_id']);
	$message=mysqli_real_escape_string($con,$_POST['message']);
	mysqli_query($con,"insert into messages(from_id,to_id,message) values('$uid','$to_id','$message')");
	$msg="Message send";
}

$res_message=mysqli_query($con,"select user.name,messages.message from messages,user where messages.message_status=0 and messages.to_id='$uid' and user.id=messages.from_id");
$unread_count=mysqli_num_rows($res_message);

$sql_user="select id,name from user order by name asc";
$res_user=mysqli_query($con,$sql_user);

?>
<div class="notification-box">
    <ul class="list">
        <li><div class="nite" style="background-color: red !important;
    color: #FFF;
    margin: 3px;
    z-index: 2;
    text-align: center;">
            <?php echo $unread_count;?>

        </div>
        <div class="notification-button">
            <div class="notification">
             <h3 class="text">Notifications</h3>
                 <div>
                <?php if($unread_count > 0){
                while($rows=mysqli_fetch_array($res_message)){
                    ?>
                    <p><strong><?php echo $rows['name'];?></strong>  <br> message <strong><?php echo $rows['message']; ?></strong></p>
             <?php   }
             } ?>
                </div>
            </div>
        </div>
    </li>
        <li><a href="logout.php">logout</a></li>
    </ul>
</div>


<div class="container">
        <form class="form" action="" method="post">
            <h1 class="text-center text-info">Post Form</h1>
            <div class="form-group">
                <label for="" class="text-info">UserName</label>
                <select class="form-control" name="to_id" require>
                <option value="">select user</option> 
                <?php while($row_user=mysqli_fetch_array($res_user)){
                    
                    ?>
                <option value="<?php echo $row_user['id'] ; ?>"><?php echo $row_user['name'] ; ?> </option>  <?php }?>  
            </select>
            </div>
            <div class="form-group">
            <label for="message" class="text-info">Message:</label><br>
             <textarea class="form-control" name="message" required></textarea>
             </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success btn-block" >
            </div>
        </form>
    </div>



    <?php

$stmt = mysqli_query($con,"SELECT posts.*, user.* ,messages.* 
FROM posts inner join user inner join messages
 GROUP BY post_details , id , message;

 
");
//$stmt->execute();

$rows = mysqli_fetch_array($stmt);
?>
    <h1 class='text-center'> Manage Posts</h1>
<div class='container'>
<div class="table-responsive">
	<table class="main-table text-center table table-bordered">
		<tr>
			<td>#ID</td>
			<td>name_poster</td>
			<td>post_details</td>
			<td>post_date</td>
            <td>status</td>
            <td>message_status</td>
			<!-- <td>Travel From</td>
			<td>Travel To</td> -->
			<td>Control</td>
		</tr>
		<?php 
        $i = 0;
		   while($rows=mysqli_fetch_array($stmt)){
				// code...
                
                $i++;
                    $status_msg= $rows['message_status'];
                    $stat = 'unread';
                    $clas = 'btn-danger';
                    if($status_msg > 0 ){
                        $stat = 'read';
                        $clas = 'btn-success';
                    }
                    $status_line = $rows['status'] ;
                    $status = 'offline';
                    $class = 'btn-danger';
                    if($status_line > 0 ){
                        $status = 'online';
                        $class = 'btn-success';
                    }
				echo "<tr>";
				  echo "<td>" . $i . "</td>";
				  echo "<td>" . $rows['name_poster'] . "</td>";
				  echo "<td>" . $rows['post_details'] . "</td>";
				  echo "<td>" . $rows['post_date'] . "</td>";
                  echo "<td>" . $rows['status'] . "</td>";
                  echo "<td>" . $rows['message_status'] . "</td>";
				//   echo "<td>" . $rows['travelFrom'] . "</td>";
				//   echo "<td>" . $rows['travelTo'] . "</td>";
				  echo "<td>
				  <a href='travels.php?do=Edit&travelid=" . $rows['post_id'] . "' class='btn ".$class ."'>". $status ."</a>
				  <a href='travels.php?do=Delete&travelid=" . $rows['post_id'] . "'' class='btn ".$clas ." '>". $stat ."</a>"; 
				  if($rows['post_id'] == 0) {
					  echo "<a href='users.php?do=Activate&travelid=" . $rows['post_id'] . "'' class='btn btn-info activate'>Activate</a>";
					  }

				 echo " </td>";
				echo "</tr>";
                
			}
		?>
		
		
	</table>
</div>
<a href="Addpost.php" class="btn btn-primary">Add Post</a>
</div>



    <script>
      $(document).ready(function () {
          $('.notification-button').click(function () {
           // $('.notification').fadeIn(1000);
              jQuery.ajax({
				url:'update_message.php',
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