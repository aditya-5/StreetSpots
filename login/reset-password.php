<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
	header("location: login.php");
	exit();
}


$curpass = $newpass =$confirmpass = "";
$curpass_err = $newpass_err = $confirmpass_err=  "";

require('server.php') ;
if($_SERVER['REQUEST_METHOD']=="POST"){


	// Checking if current password is empty
	if(empty(trim($_POST['curpass']))){
		$curpass_err = "Current password field cannot be empty";
	}
	else{
		$curpass = trim($_POST['curpass']);
	}
	echo $curpass_err;

	// Checking if new password is less than 6 characters or empty
	if(empty(trim($_POST['newpass']))){
		$newpass_err = "New password field cannot be empty";
	}
	elseif(strlen(trim($_POST['newpass']))<6){
		$newpass_err = "New Password field cannot be less than 6 characters";
	}
	else{
		$newpass = trim($_POST['newpass']);
	}
	echo $newpass_err;



	// Checking if confirm new password is empty
	if(empty(trim($_POST['confirmpass']))){
		$confirmpass_err = "Confirm New Password field cannot be empty";
	}
	else{
		$confirmpass = trim($_POST['confirmpass']);
	}
	echo $confirmpass_err;



	// Validation if no errors
	if(empty($curpass_err) && empty($newpass_err) && empty($confirmpass_err) ){

		// Checking if new password and confirm new password match
		if(strcmp($newpass,$confirmpass)==0){

		$sql = "SELECT password from USERS where user_id =?";

		if($stmt = mysqli_prepare($conn, $sql)){
			mysqli_stmt_bind_param($stmt, 'i', $param_id);
			$param_id = $_SESSION['id'];

			if(mysqli_execute($stmt)){
				mysqli_stmt_store_result($stmt);
				mysqli_stmt_bind_result($stmt, $passhash);
				if(mysqli_stmt_fetch($stmt)){
					if(password_verify($curpass, $passhash)){
						$sql = "UPDATE USERS SET password = ? where user_id =?";
						if($stmt1 = mysqli_prepare($conn, $sql)){
							mysqli_stmt_bind_param($stmt1, 'si',$param_password, $param_id);
							$param_password = password_hash($newpass,PASSWORD_DEFAULT);
							$param_id = $_SESSION['id'];
							if(mysqli_execute($stmt1)){
								session_destroy();
								header("location: login.php");
							}
							else{
								echo "Something went wrong with the stmt 2 part";
							}
						}
						echo "Something went wrong with the stmt 2 part";
							mysqli_stmt_close($stmt1);
				}
				else{
					echo "Your current password doesn't match the one in the database";
				}
			}
		}else{
			echo "Something went wrong with the stmt 1 part";
			}
		mysqli_stmt_close($stmt);
		}
	}
	else{
		echo "New Password and Confirm New Password don't match";
	}

}


mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Reset Password
	</title>
</head>
<body>
<div class="container middle p-4">
	<form action="reset-password.php" method="POST">
		<div class="form-group mb-3">
			<label for="curpass">Current Password</label>
			<input type="password" id="curpass" name="curpass" placeholder="Current Password" class="form-control">
		</div>
		<div class="form-group">
			<label for="newpass">New Password</label>
			<input type="password" id="newpass" name="newpass" placeholder="New Password" class="form-control">
		</div>
		<div class="form-group">
			<label for="confirmpass">Confirm New Password</label>
			<input type="password" id="confirmpass" name="confirmpass" placeholder="Confirm New Password" class="form-control">
		</div><br>
		<div class="text-center">
			<button class="btn btn-primary">Reset Password</button>
		</div>
	</form>
</div>
</body>
</html>
