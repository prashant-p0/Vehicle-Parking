<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');

if (strlen($_SESSION['user'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['update'])) {
        $uid =$_GET['uid'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

		$query = mysqli_query($con, "UPDATE user set username='$username',firstname='$firstname',lastname='$lastname',phone='$phone',address='$address' where uid='$uid'");
		if ($query) {
			$msg = "All remarks has been updated.";
		} else {
			$msg = "Something Went Wrong";
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
        <link rel="stylesheet" href="../includes/body.css">
		<script src="../includes/style0.js"></script>


		<title>Profile</title>
	</head>

	<body class="c1">
		 <?php
		$page = "in-vehicle";
		include 'sidebar1.php'
		?> 
		<div class="container">
			<h1 class="panel-heading text-center">Update User profile</h1>
			<div class="col-sm-12 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">


				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">

							<div class="panel-body">

							<?php if($msg)
					echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
					<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
					  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					</symbol>
								  <div class="alert alert-success d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
					<div> ' . $msg . '
					 </div>
					</div>' ?>

								<div class="col-md-12">


									<form method="POST">


										<?php
										$uid = $_GET['uid'];
										$ret = mysqli_query($con, "SELECT * from user where uid='$uid'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($ret)) {

										?>

											<div class="form-group">
												<label>Username </label>
												<input type="text" class="form-control" value="<?php echo $row['username']; ?>" id="username" name="username" >
											</div>


											<div class="form-group my-2">
												<label>FirstName</label>
												<input type="text" class="form-control" value="<?php echo $row['firstname']; ?>" id="sdesc" name="firstname" >
											</div>

                                            <div class="form-group my-2">
												<label>LastName</label>
												<input type="text" class="form-control" value="<?php echo $row['lastname']; ?>" id="sdesc" name="lastname" >
											</div>


											<div class="form-group">
												<label>Phone Number</label>
												<input type="number" class="form-control" value="<?php echo $row['phone']; ?>" id="sdesc" name="phone" readonly>
											</div>


											<div class="form-group my-2">
												<label>Address</label>
												<input type="text" class="form-control" value="<?php echo $row['address']; ?>" id="sdesc" name="address" >
											</div>
											

										<?php } ?>

										<button type="submit" class="btn btn-success my-3" name="update">Update</button>
										<!-- <button type="reset" class="btn btn-default ml-3">Reset</button> -->

								</div> <!--  col-md-12 ends -->


							</div>
						</div>
					</div>



				</div>
				<!--/.row-->




			</div>
			<!--/.main-->


			<script>
				window.onload = function() {
					var chart1 = document.getElementById("line-chart").getContext("2d");
					window.myLine = new Chart(chart1).Line(lineChartData, {
						responsive: true,
						scaleLineColor: "rgba(0,0,0,.2)",
						scaleGridLineColor: "rgba(0,0,0,.05)",
						scaleFontColor: "#c5c7cc"
					});
				};
			</script>

			<script>
				$(document).ready(function() {
					$('#example').DataTable();
				});
			</script>
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

<?php }  ?>