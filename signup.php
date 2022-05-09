
<style>
    #blue_bar{
            background-color:#405d9b;
            height:50px;
        }
</style>
<div  id="blue_bar">
        <div style="width: 800px; ">
            MyBook &nbsp &nbsp<input type="text" id="search_box">
           
        </div>
    </div>

<form class="signup" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	<h4 class="text-center"> </h4>
	<input class="" type="text" name="first_user" placeholder="First name" autocomplete="off">
	<input class="" type="text" name="last_user" placeholder="Last name" autocomplete="off">
	
    <input class="" type="password" name="pass" placeholder="Password" autocomplete="new-password">
	<input class="" type="password" name="pass2" placeholder="Password again" autocomplete="new-password">
	<input class="" type="email" name="email" placeholder="Email" >
    <label>Gender</label>
    <select name="gender" id="">
        <option value="">Male</option>
        <option value="">Female</option>
    </select>
	<input class="btn btn-success btn-block" type="submit" value="signup">

</form>