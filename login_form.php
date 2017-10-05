<?php

	if(isset($_SESSION['login_user'])){
		header("location: login_form.php");
	}
?>

<?php include "header.html"; ?>


	 <div class="row news">

		<form method="POST" action="login.php">

		  <div class="form-group col-xs-2 col-xs-offset-5">
		    <label for="text">Login</label>
		    <input type="text" name="username" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Login">
		  </div>

		  <div class="form-group col-xs-2 col-xs-offset-5">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>

		  <div class="form-group col-xs-2 col-xs-offset-5">
		  	<input type='submit' value='Submit' name='submit' />
		  </div>

		</form>

	</div>


<?php include "footer.html"; ?>

</body>
</html>
