


<?php
require("server.php");
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
	header("location: login.php");
	exit();
}

// Initialising the values
$username = $password = $confirm_password = $email= $firstname = $lastname = '';
$username_err = $password_err = $confirm_password_err = $email_err = $firstname_err = $lastname_err = '' ;

// Checking if form has been submitted or not (similar to isset())
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty(trim($_POST['username']))){
		$username_err = 'Email cannot be blank';
	}
	else{

	// ***************************************************************************
	// Checking if username already exists
		$sql = "SELECT user_id from USERS WHERE username=?";

		// Prepare the SQL query and bind the username param to it (in place of the question mark)
		if($stmt = mysqli_prepare($conn,$sql)){
			// Bind params to the query, s means string here.
			mysqli_stmt_bind_param($stmt, "s", $param_username);
			$param_username = trim($_POST['username']);

			if(mysqli_stmt_execute($stmt)){

				// To store the result received (doesn't cause performance loss)
				mysqli_stmt_store_result($stmt);

				if(mysqli_stmt_num_rows($stmt)==1){
					$username_err = "Username already in use";
				}
				else{
					$username = strtolower(trim($_POST['username']));
				}
			}
		}
		else{
			echo("Something went wrong with the dollar stmt part");
		}


		if(strpos($username,' ')){
			$username_err = "Username cannot contain spaces";
		}
		else{
			if(!preg_match('/^[a-z0-9]+$/',$username)){
				$username_err = "Username can contain only letters and numbers";
			}
		}



		mysqli_stmt_close($stmt);

		// ***************************************************************************
		// Checking if email already exists
		$sql = "SELECT user_id from USERS WHERE email=?";

		// Prepare the SQL query and bind the username param to it (in place of the question mark)
		if($stmt = mysqli_prepare($conn,$sql)){
			// Bind params to the query, s means string here.
			mysqli_stmt_bind_param($stmt, "s", $param_email);
			$param_email = trim($_POST['email']);

			if(mysqli_stmt_execute($stmt)){

				// To store the result received (doesn't cause performance loss)
				mysqli_stmt_store_result($stmt);

				if(mysqli_stmt_num_rows($stmt)==1){
					$email_err = "E-mail already in use";
				}
				else{
					$email = strtolower(trim($_POST['email']));
				}
			}
		}
		else{
			echo("Something went wrong with the dollar stmt part");
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email_err = "Validation failed";
		}
		mysqli_stmt_close($stmt);

		// ***************************************************************************

		// Checking first name and last name
		$firstname = trim($_POST['firstn']);
		$lastname = trim($_POST['lastn']);
		if(empty($firstname)){
			$firstname_err = "First Name cannot be empty";
		}

		if(empty($lastname)){
			$firstname_err = "Last Name cannot be empty";
		}

		$firstname = strtolower($firstname);
		$firstname = ucfirst($firstname);
		$firstname = explode(' ', $firstname);
		$firstname = $firstname[0];

		$lastname = strtolower($lastname);
		$lastname = ucfirst($lastname);
		$lastname = explode(' ', $lastname);
		$lastname = $lastname[0];

		if(!preg_match("/^[A-Z][a-z]*$/",$firstname)){
			$firstname_err = "First Name cannot contain spaces";
		}

		if(!preg_match("/^[A-Z][a-z]*$/",$lastname)){
			$lastname_err = "Last Name cannot contain spaces";
		}


	}



// Checking the password constraints
if(empty(trim($_POST['password']))) {
	$password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password']))<6){
	$password_err = "Password needs to be greater than 6 characters";
}
else{
	$password = trim($_POST['password']);
}

// Checking the confirm password
if(empty(trim($_POST["confirmpass"]))){
	$confirm_password_err = "Confirm password field cannot be empty";
}
else{
	$confirm_password = trim($_POST["confirmpass"]);
	if( empty($password_err) && $password != trim($_POST["confirmpass"])){
		$confirm_password_err = "Passwords don't match";
			}
}




// Checking if any errors before entering into database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($email_err)
&& empty($firstname_err)&& empty($lastname_err)){
	$sql = "INSERT INTO USERS (username, password,email, first_name,last_name) VALUES (?,?,?,?,?)";

	if($stmt = mysqli_prepare($conn, $sql)){
		mysqli_stmt_bind_param($stmt, "sssss", $username, $param_password, $email, $firstname, $lastname);
		$param_password = password_hash($password , PASSWORD_DEFAULT);
		if(mysqli_stmt_execute($stmt)){
			header("location: login.php");
		}
		else{
			echo "Something went wrong with the second dollar stmt part";
		}

	mysqli_stmt_close($stmt);
}}

mysqli_close($conn);
}

 ?>


<html>
<head>
	<title>Register</title>
</head>
<body>


	<div class="container p-4 middle">
		<form action="register.php" method="POST">
		<h2 class="text-center">Register</h2><br>
		<div class="form-group mb-3">
			<label for="email" class="form-label">E-mail</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
		</div>

		<div class="form-group mb-3">
			<label for="username" class="form-label">Username</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
		</div>
		<div class="form-group mb-3">
			<label for="firstn" class="form-label">First Name</label>
			<input type="text" class="form-control" id="firstn" name="firstn" placeholder="Enter First Name">
		</div>
		<div class="form-group mb-3">
			<label for="lastn" class="form-label">Last Name</label>
			<input type="text" class="form-control" id="lastn" name="lastn" placeholder="Enter Last Name">
		</div>





		<div class="form-group mb-3">
			<label for="pass" class="form-label">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
		</div>
		<div class="form-group mb-3">
			<label for="pass" class="form-label">Password</label>
			<input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="Confirm Password">
		</div><br>
		<div class="text-center">
			<button class="btn btn-primary">Register</button>
			</div>
			</form>


	<div class="text-center">
		<a href="login.php"><button class="btn btn-secondary">Login</button></a>
	</div>
</div>

</body>
</html>
