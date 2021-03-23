<?php 
	require_once 'sys/inti.php';
	$alrt = "";
	if (isset($_SESSION['gtuser'])) {
		header("Location:dashboard");
	}
	
	if (isset($_POST['signup'])) {
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if (checkExist($username,$email)) {
			if (doRegist($fullname,$username,$email,$password)) {
				#user registered
				$alrt =  '<div class="alert alert-success alert-dismissible fade show" role="alert" style="filter:drop-shadow(2px 2px 10px #888);">
					  <strong>Registered Successfully!</strong> Go to <a href="signin.php">Sign In</a> page to start using our service!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
			}else{
				#registration failed 
				$alrt =  '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="filter:drop-shadow(2px 2px 10px #888);">
					  <strong>Registration Failed!</strong> Something went wrong in our system!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
			}
		}else{
			#user already registered
			$alrt =  '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="filter:drop-shadow(2px 2px 10px #888);">
					  <strong>Registration Failed!</strong> Username or email already registered on our database
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';

		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />

    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<!-- google fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@500&family=Lobster&display=swap" rel="stylesheet">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="assets/img/icon.png">
	<style type="text/css">
		font-family: 'Lobster', cursive;
		font-family: 'Baloo Tammudu 2', cursive;
	</style>
</head>
<body style="background-image: url('assets/img/talk.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

	<nav class="navbar navbar-light ">
		<div class="container">
		  <a href="index.php" class="navbar-brand"  style="font-family: Lobster; "> GreenTalk <img src="assets/img/icon.png" width="30px"></a>
		  <form class="form-inline">
		   	<!-- alrtt --><?php echo $alrt; ?>
		  </form>
		</div>
	</nav>


	<div class="container text-white d-flex text-dark" style="font-family: Baloo Tammudu 2; height: 50vh">
		<div class="col-md-4 align-self-center" style="margin-top: 40vh">
			<h2 style="font-family: Lobster"> Join the Crowd Now! </h2><br>
			<form action="" method="POST">
			  <div class="form-group">
			    <label for="inputFullname">Full Name</label>
			    <input required="" name="fullname" type="text" class="form-control" id="inputFullname" placeholder="Full Name" autocomplete="off">
			  </div>
			  <div class="form-group">
			    <label for="inputUsername">Username</label>
			    <input required="" name="username" type="text" class="form-control" id="inputUsername" placeholder="Username">
			  </div>
			  <div class="form-group">
			    <label for="inputEmail">Email</label>
			    <input required="" name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="inputPassword">Password</label>
			    <input required="" name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
			  </div>
			  <button type="submit" name="signup" class="btn btn-success">Sign Up</button>
			   &emsp; &nbsp; <small class="text-dark" style="">Already have an account? <a href="signin.php" style="color:#00a103	">Sign In</a> now.</small>
			</form>
		</div>
	</div>




</body>
</html>