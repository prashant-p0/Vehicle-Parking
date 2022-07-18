<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
error_reporting(0);

if (isset($_POST['resetpw'])) {
	$secode = $_SESSION['secode'];
	$email = $_SESSION['email'];
	$password = md5($_POST['newpassword']);

	$query = mysqli_query($con, "UPDATE admin set Password='$password'  where  Email='$email' && Security_Code='$secode' ");
	if ($query && $_POST["newpassword"] === $_POST["confirmpassword"]) {
		echo " Password Changed!";
		 session_destroy();
		 header('location:index.php');
	}
	else{
		$msg= " password does not match";
		echo $msg ;
	}
}
?>








<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="includes/body.css">
	<script src="includes/style0.js"></script>


	<title>Reset-Password</title>
	<style>
		 body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #161623;
}
    body::before{
    content: '';
    position: absolute;
    /* top: 0;
    left: 0; */
    width: 100%;
    height: 100%;
    background: linear-gradient(#f00,#f0f);
    clip-path: circle(50% at right 80%);
}

body::after{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#2196f3,#e91e63);
    clip-path: circle(30% at 10% 10%);
}

.container{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1200vh;
    flex-wrap: wrap;
    z-index: 1;

}

		.jumbotron {
			width: 39%;
			height: 400px;
			margin-left: 10px;
			margin-top: 40px;
			background-color: white;
			border-radius: 20px;
		}

		.form-floating {
			width: 68%;
			margin-left: 80px;
		}

		.button {
			margin-left: 85px;
			margin-bottom: 15px;
		}

		button {
			margin-bottom: 15px;
			margin-left: 430px;
		}
	</style>
	
</head>

<body>
	<!-- <h1>Hello, world!</h1> -->
	<div class="container">
	<div class="jumbotron">
	
		<form method="post">
			<h4 class="pt-4  text-center" style="margin-bottom: 60px;">Password Recovery</h4>

			<?php if ($msg)
              echo '<div class="alert alert-danger d-flex p-3 alert-dismissible fade show" style="height:55px; width:470px" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>
              ' . $msg . '
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>' ?>
			

			<div class="form-floating my-3 " >
				<input type="password" class="form-control" name="newpassword" id="floatingInput" placeholder="name@example.com" required>
				<label for="floatingInput">new password</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" name="confirmpassword" id="floatingPassword" placeholder="Password" required>
				<label for="floatingPassword">Confirm password</label>
			</div><br>
			<!-- <a href="forgot-password.php" class="link-secondary mt-4">forget password?</a><br> -->

			<button type="submit" name="resetpw" class="btn btn-success button">Proceed</button>
		</form>
		<!-- <a href="index.php"><button type="submit" name="login" class="btn btn-dark">Back</button></a> -->
	</div>
	</div>
	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>

</html>