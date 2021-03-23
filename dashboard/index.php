<?php
require_once '../sys/inti.php';
if (!isset($_SESSION['gtuser']))
{
    header("Location:../signin.php");
}
$username = $_SESSION['gtuser'];
$query = "SELECT * FROM users WHERE username = '$username'";
$data = mysqli_fetch_assoc(mysqli_query($conn, $query));
$fullname = $data['fullname'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>GreenTalk</title>
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />

	<!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
	<!-- Bootstrap Files -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


	<!-- google fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@500&family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="assets/img/icon.png">
	<style type="text/css">
		font-family: 'Lobster', cursive;
		font-family: 'Baloo Tammudu 2', cursive;
		font-family: 'Raleway', sans-serif;
	</style>
</head>
<body style="background-color: #fec400">
<script type = "text/javascript" >
    function update() {
        $.post("loader.php", {
                channel: $("#channel :selected").val()
            },
            function(data) {
                $("#chatBox").html(data);
            }
        );

        setTimeout('update()', 500);
    }

$(document).ready(
    function() {
        update();

        $("#message").on('keypress', function(e) {
            if (e.which == 13) {

                $.post("loader.php", {
                        message: $("#message").val(),
                        channel: $("#channel :selected").val()
                    },
                    function(data) {
                        $("#chatBox").html(data);
                        $("#message").val("");
                    }
                );
            }
        });

        $("#send").click(
            function() {
                $.post("loader.php", {
                        message: $("#message").val(),
                        channel: $("#channel :selected").val()
                    },
                    function(data) {
                        $("#chatBox").html(data);
                        $("#message").val("");
                    }
                );
            }
        );
    }
);

</script>

	<nav class="navbar navbar-light ">
		<div class="container">
		  <a href="index.php" class="navbar-brand"  style="font-family: Lobster; "> GreenTalk <img src="../assets/img/icon.png" width="30px"></a>
		  <form class="form-inline">
		   	
		  </form>
		</div>
	</nav>


	<div class="container">
		<div class="row">
			
			<div class="col-md-8">
				<div class="alert alert-warning" style="height: 85vh">
					<div class="chatBox p-3" id="chatBox" style="max-width: 100%; max-height: 85%; height:85%;background-color: ;border-radius: 5px;overflow-y: auto;font-family: raleway;display: flex;flex-direction: column-reverse;">
						<!-- ChatBox -->
					</div>
					
					<div class="input-group mt-3">
						<textarea class="form-control" placeholder="Type your message . . ." type="text" name="message" id="message" style="max-height: 10vh;min-height: 10vh"></textarea>
						 <div class="input-group-append">
						    <button class="btn btn-success" type="button" id="send">Button</button>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="alert alert-secondary">
					<h6>Control Panel</h6>
					<hr>
					You're signed in as : <br> <strong><?php echo $fullname.'</strong> <small>( '.$username.' )</small>'; ?><hr>
					<div class="input-group mr-4">
					  <div class="input-group-prepend">
					    <label class="input-group-text bg-success text-light" for="selectChannel">Select Channel</label>
					  </div>
					  <select class="custom-select" id="channel" name="channel">
					    <option selected value="public">Public (default)</option>
					    <?php for ($i=1; $i <= 10; $i++) { 
					    	echo '<option value="GT'.$i.'">GreenTalk '.$i.'</option>';
					    } ?>
					  </select>
					</div><hr>
		  <a class="btn btn-danger" href="../signout.php"><i class="fas fa-power-off"></i> Sign Out</a>

				</div>
			</div>
		</div>
	</div>
</body>
</html>