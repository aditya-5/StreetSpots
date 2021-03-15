<?php

session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
	header("location: ../index.php");
	exit();
}

require("server.php");


$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty(trim($_POST['username']))){
		$username_err = "Username field cannot be blank";
	}
	else{
		$username = trim($_POST['username']);
	}

	if(empty(trim($_POST['password']))){
		$password_err = "Password field cannot be blank";
	}
	else{
		$password = trim($_POST['password']);
	}


	if(empty($username_err) && empty($password_err)){

		$sql = "SELECT user_id, username, password, first_name, last_name,email from USERS where username= ? or email = ?";

		if($stmt = mysqli_prepare($conn,$sql)){
			mysqli_stmt_bind_param($stmt, 'ss', $param_username,$param_email);
			$param_username = $username;
			$param_email = $username;
			if(mysqli_stmt_execute($stmt)){
				// To store the result
				mysqli_stmt_store_result($stmt);

				// If any information has been retrieved or not
				if(mysqli_stmt_num_rows($stmt)==1){
					// Used to bind the fetched stuff to the variables
					mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $firstn, $lastn, $email);

					// Fetch the results into the variables above
					if(mysqli_stmt_fetch($stmt)){
						if(password_verify($password, $hashed_password)){       //(uncomment this when the passwords in the database are hashed)
							session_start();

							$_SESSION['loggedin'] = true;
							$_SESSION['id'] = $id;
							$_SESSION['username'] = $username;
							$_SESSION['first_name'] = $firstn;
							$_SESSION['last_name'] = $lastn;
							$_SESSION['email'] = $email;
							// header("location: welcome.php");
							header("location: ../index.php");
						}
						else{
							echo "Oops. The password is incorrect";
						}

					}
				}
				else{
					echo "No account was found with these credentials";
				}
			}
			else{
				echo "Something is wrong with the dollar stmt part";
			}
			mysqli_stmt_close($stmt);
		}

	}

    mysqli_close($conn);

}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 </head>
 <body>
	 <?php
	 include('login_header.php'); ?>
	 <br>
	 <center><h4>You need to be logged in to Add Vendors</h4>
 	<div class="container p-3 middle">
 		<form action="login.php" method="POST">
 			<h2 class="text-center">Login</h2><br>
 			<div class="form-group">
 				<label for="username" class="form-label">E-mail</label>
 				<input type="text" class="form-control" id="username" name="username" placeholder="Enter e-mail">
 			</div>
 			<div class="form-group">
 				<label for="password" class="form-label">Password</label>
 				<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
 			</div>
 			<br><br>
 			<div class="text-center">
	 			<button class="btn btn-primary">Login</button></form>
 			</div>
 		
 		<div class="text-center">
 			<a href="register.php"><button class="btn btn-secondary">Register</button></a>
 		</div><br>

 	</div>

 </body>

 <?php
 include('login_footer.php'); ?>
 </html>
