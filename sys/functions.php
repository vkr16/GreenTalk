<?php 
	function checkExist($username,$email){
		global $conn;

		$username = mysqli_real_escape_string($conn, $username);
		$email	  = mysqli_real_escape_string($conn, $email);

		$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

		if ($res = mysqli_query($conn,$sql) ) {
			if (mysqli_num_rows($res) == 0) {
				return true;
			}else {
				return false;
			}
		}
	}

	function doRegist($fullname,$username,$email,$password){
		global $conn;

		$fullname 	  = mysqli_real_escape_string($conn, $fullname);
		$username 	  = mysqli_real_escape_string($conn, $username);
		$email	  	  = mysqli_real_escape_string($conn, $email);
		$password	  = mysqli_real_escape_string($conn, $password);
		$password	  = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO users (fullname,username,email,password) VALUES ('$fullname' , '$username' , '$email' , '$password')";

		if (mysqli_query($conn, $sql)) {
			return true;
		}else{
			return false;
		}

	}

	function checkCredentials($username, $password){
		global $conn;

		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);

		$query = "SELECT * FROM users WHERE username =  '$username'";

		$execution = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($execution);

		if (password_verify($password, $data['password'])) {
			return true;
		}else{
			return false;
		}
	}

	function checkStatus($username){
		global $conn;

		$username = mysqli_real_escape_string($conn, $username);

		$sql = "SELECT * FROM users WHERE username = '$username'";

		if ($res = mysqli_query($conn,$sql) ) {
			if (mysqli_num_rows($res) != 0) {
				return true;
			}else {
				return false;
			}
		}


	}

	
 ?>