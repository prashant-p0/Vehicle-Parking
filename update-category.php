<?php
session_start();
error_reporting(0);

include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['update-category'])) {
		$aid = $_SESSION['vpmsaid'];
		$catname = ($_POST['catename']);
		$charges = ($_POST['charges']);
		$space = ($_POST['space']);
		$eid = $_GET['editid'];

		$query = mysqli_query($con, "UPDATE vcategory set VehicleCat='$catname', charges=$charges, space=$space where ID='$eid'");
		if ($query) {
			$ms1 = true;
			$msg = "All Fields are updated";
		} else {
			$ms1 = false;
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
		<link rel="stylesheet" href="includes/body.css">
		<script src="includes/style0.js"></script>


		<title>Update-Category</title>
	</head>

	<body class="c1">
		<!-- <h1>Hello, world!</h1> -->

		<?php
		$page = "vehicle-category";
		include 'includes/sidebar.php'
		?>
		<div class="container">
			<div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">


				<div class="panel panel-default">
					<h1 class="panel-heading text-center">Update Vehicle Category</h1>
					<div class="panel-body">

						<div class="col-md-12">

							<?php if ($msg)
								echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
						<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
						  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
						</symbol>
						<div class="alert alert-success d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		 ' . $msg . '
		 </div>
		 <button type="button" class="btn-close float-end" style="margin-left: 1024px;" data-bs-dismiss="alert" aria-label="Close"></button>
		 </div>
		 ' ?>

							<?php
							$cid = $_GET['editid'];
							$ret = mysqli_query($con, "SELECT * from  vcategory where ID='$cid'");
							// $cnt = 1;
							while ($row = mysqli_fetch_array($ret)) {

							?>
								<form method="POST">



									<div class="form-group">
										<label>Category Name</label>
										<input type="text" class="form-control my-2" value="<?php echo $row['VehicleCat']; ?>" id="catename" name="catename" required>
									</div>
									<div class="form-group my-3">
										<label>Category Name</label>
										<input type="text" class="form-control my-2" value="<?php echo $row['charges']; ?>" id="charges" name="charges" required>
									</div>

									<div class="form-group my-3">
										<label>Parking Space</label>
										<input type="number" class="form-control mt-2" value="<?php echo $row['space']; ?>" id="space" name="space" required>
									</div>


									<button type="submit" class="btn btn-success mt-2" name="update-category">Make Changes</button>
								<?php } ?>
						</div> <!--  col-md-12 ends -->
						</form>
					</div>
				</div>




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
<?php }  ?>