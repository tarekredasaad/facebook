<?php 
ob_start();
	session_start();

	$pagetitle = '' ;

   include 'header.php';
   include 'connect.php';

//    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;

//    if($do == 'Manage') {
//    	echo 'welcome to comments page';
$stmt = mysqli_query($con,"SELECT posts.*   FROM posts
 
    ");
  //$stmt->execute();

  $rows = mysqli_fetch_array($stmt);
  ?>
  <h1 class='text-center'> Manage Posts</h1>
<div class='container'>"
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>#ID</td>
                <td>name_poster</td>
                <td>post_details</td>
                <td>post_date</td>
                <!-- <td>Travel From</td>
                <td>Travel To</td> -->
                <td>Control</td>
            </tr>
            <?php 
               while($rows=mysqli_fetch_array($stmt)){
                    // code...
                    echo "<tr>";
                      echo "<td>" . $rows['post_id'] . "</td>";
                      echo "<td>" . $rows['name_poster'] . "</td>";
                      echo "<td>" . $rows['post_details'] . "</td>";
                      echo "<td>" . $rows['post_date'] . "</td>";
                    //   echo "<td>" . $rows['travelFrom'] . "</td>";
                    //   echo "<td>" . $rows['travelTo'] . "</td>";
                      echo "<td>
                      <a href='travels.php?do=Edit&travelid=" . $rows['post_id'] . "' class='btn btn-success'>Edit</a>
                      <a href='travels.php?do=Delete&travelid=" . $rows['post_id'] . "'' class='btn btn-danger confirm'>Delete</a>"; 
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
	 	<?php 
	//  }elseif($do == 'Edit') {  
	//  	$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid'])
	//  	:  0;
	 	
	//  	$stmt =$con->prepare("SELECT * FROM comments WHERE c_id = ?");
	// 		$stmt->execute(array($comid));
	// 		$row = $stmt->fetch();
	// 		$count = $stmt->rowCount();
	 	
	// 		if ($count > 0){
			
	 	
	 	
	//   <h1 class="text-center">Edit Comment</h1>
	//   <div class="container">
	//   	<form class="form-horizontal" action="?do=Update" method="POST">
	//   		<input type="hidden" name="comid" value="<?php echo $comid ">
	//   		<!-- username-->
	//   	<div class="form-group">
	//   		<label class="col-sm-2 control-label" >Comment</label>
	//   		<div class="col-sm-10"> ?>
	  			textarea type="text" name="comment""form-control" value=""  required="required"><?php// echo $row['comment'] </textarea>
	//   		</div>
	//   	</div>	
	//   	<!-- username-->
	  	
	//   	<!-- username-->
	//   	<div class="form-group">
	  		
	//   		<div class="col-sm-offset-2 col-sm-10">
	//   			<input type="submit" value="Save" class="btn btn-primary">
	//   		</div>
	//   	</div>	
	//   	<!-- username-->
	//   	</form>
	//   </div>	
	//  	<?php 
	//  }
	//  	else {
	//  		echo "<div class='container'>";
	// 		$theMsg = '<div class="alert alert-danger"> there is no such id</div>';
	// 		redirectHome($theMsg, "back", 4);
	// 		echo "</div>";
	// 		}
	//  }elseif ($do == 'Update') { //Update page
	//    echo "<h1 class='text-center'> Update Comment</h1>";
	//    echo "<div class='container'>" ;
	//  	// code...
	//    if($_SERVER['REQUEST_METHOD'] == 'POST') {

	//    		$comid  = $_POST['comid'];
	//    		$comment  = $_POST['comment'];
	   		
	   		
	//    		 	$stmt = $con->prepare("UPDATE comments SET comment = ? WHERE c_id = ? ");
	//    $stmt->execute(array($comment, $comid ));

	//    $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . 'Record Update</div>';
	//    redirectHome($theMsg, "back", 4);

	    
	//    } else {
	//    	$theMsg = ' sorry you canot Browse this page Directly ';
	//    	redirectHome($theMsg);
	//   	 }echo '</div>';
	    

	   
	   
	//  }elseif($do == 'Delete') {

	//  	$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid'])
	//  	:  0;
	 	
	//  	//$stmt =$con->prepare("SELECT * FROM users WHERE userID = ? LIMIT 1");

	//  		$check = checkitem('c_id' , 'comments', $comid);
	// 		//$stmt->execute(array($userid));
			
	// 		//$count = $stmt->rowCount();
	 
	// 		if ($check > 0){
	// 			echo "<h1 class='text-center'> Delete Comment</h1>";
	//    			echo "<div class='container'>" ;
	// 			$stmt = $con->prepare("DELETE FROM comments WHERE c_id = :zid");
	// 			$stmt->bindParam(":zid", $comid);
	// 			$stmt->execute();

	// 			$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . 'Record Delete</div>';
	// 			redirectHome($theMsg, "back", 4);
	// 		}else {
	// 			$theMsg = 'This ID is Not Exist';
	// 			redirectHome($theMsg);
	// 		}
	// 		echo "</div>";
	//  		}elseif($do == 'Approve') {

	//  	$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid'])
	//  	:  0;
	 	
	//  	//$stmt =$con->prepare("SELECT * FROM users WHERE userID = ? LIMIT 1");

	//  		$check = checkitem('c_id' , 'comments', $comid);
	// 		//$stmt->execute(array($userid));
			
	// 		//$count = $stmt->rowCount();
	 
	// 		if ($check > 0){
	// 			echo "<h1 class='text-center'> Approve Comment</h1>";
	//    			echo "<div class='container'>" ;
	// 			$stmt = $con->prepare("UPDATE comments SET status = 1 WHERE c_id = ?");
				
	// 			$stmt->execute(array($comid));

	// 			$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . 'Record Approved</div>';
	// 			redirectHome($theMsg, "back", 4);
	// 		}else {
	// 			$theMsg = 'This ID is Not Exist';
	// 			redirectHome($theMsg);
	// 		}
	// 		echo "</div>";
	//  		}
	 		//ob_end_flush();
             ?>