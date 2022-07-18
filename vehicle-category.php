<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
	header('location:logout.php');
} else {
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

		<title>Vehicle-Category</title>
	</head>

	<body class="c1">
		<?php
		$page = "vehicle-category";
		include 'includes/sidebar.php'
		?>

		<div class="container mt-4">


			<h1 class=" text-center">Vehicle Categories</h1>

			<?php 
			if(isset($_SESSION['addcat'])){
				?>
				<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol></svg>
				<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
 <?php  echo $_SESSION['addcat']; ?>
  </div>
</div>
  <?php
				
			}
			unset($_SESSION['addcat']);
			?>
			<?php 

			if(isset($_SESSION['delcat'])){
				?>
				<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol></svg>
				<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
 <?php  echo $_SESSION['delcat']; ?>
  </div>
</div>
  <?php
				
			}
			unset($_SESSION['delcat']);
			?>

			<a href="74589" type="button" class="btn btn-dark px-1 my-3">Add New Vehicle Category</a>
			<div class="panel-body">
				<table id="example" class="table table-striped table-hover table-bordered" style="width:100%">

					<thead>
						<tr>
							<th>#</th>
							<th>Vehicle Category</th>
							<th>Daily Charges</th>
							<th>Parking Space</th>
							<th>Published On</th>
							<th>Actions</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$ret = mysqli_query($con, "SELECT * from  vcategory");
						$cnt = 1;
						while ($row = mysqli_fetch_array($ret)) {

						?>

							<tr>

								<td><?php echo $cnt; ?></td>

								<td><?php echo $row['VehicleCat']; ?></td>
								<td><?php echo $row['charges']; ?></td>
								<td><?php echo $row['space']; ?></td>

								<td><?php echo $row['CreationDate']; ?></td>

								<td><a  href="update-category.php?editid=<?php echo $row['ID']; ?>"> <button class="btn btn-success btn-sm mr-4">Edit</button></a>
									<a href="remove-category.php?editid=<?php echo $row['ID']; ?>"> <button class="btn btn-danger btn-sm">Delete</button></a>
								</td>

							</tr>

						<?php $cnt = $cnt + 1;
						} ?>


					</tbody>

				</table>
			</div>



		</div>





		<!-- </div> -->
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