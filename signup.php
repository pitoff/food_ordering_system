<?php
	include "header.php";
	// if (isset($_POST['signup'])) {
	// 	$name = $_POST['']
	// }
?>
<div class="row">
	<div class="col-lg-12" style="text-align: center;">
		<h1>Sign up</h1>
	</div>
</div>

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<form role="form" method="POST" action="">                   
          <div class="form-group">
            <label for="exampleInputname">Name</label>
            <input type="text" name = "name" class="form-control" id="exampleInputname" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputname">Username</label>
            <input type="text" name = "username" class="form-control" id="exampleInputname" placeholder="username">
          </div>
          <div class="form-group">
            <label for="exampleInputname">Password</label>
            <input type="password" name = "password" class="form-control" id="exampleInputname" placeholder="password">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><span class="glyphicon glyphicon-envelope"></span> Email</label>
            <input type="email" name = "email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputphonenumber"><span class="fa fa-phone"></span> PhoneNumber</label>
            <input type="text" name = "phonenumber" class="form-control" id="exampleInputphonenumber" placeholder="PhoneNumber">
          </div>
  
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="submit">Sign Up</button>
        <button type="submit" class="btn btn-default" name="submit">LogIn</button>
      </div>
      </form>
</div>
<div class="col-sm-3"></div>
</div>