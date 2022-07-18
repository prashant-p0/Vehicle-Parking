<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid'] == 0)) {
	header('location:logout.php');
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


	<title>Total-Income</title>
</head>

<body class="c1">
	<?php
	$page = "income";
	include 'includes/sidebar.php'
	?>
	<div class="container">
		<h1 class=" text-center">Total Income</h1>
		<div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main mt-4">



			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- <div class="panel-heading">Total Income</div> -->
						<div class="panel-body">

							<div class="col-md-12 no-padding">


								<div class="row progress-labels">
									<h1 class="col-md-12 text-center"><img src="rupee-indian.png" width="30px" alt=""> <?php include 'counters/income-count.php' ?></h1>
									<!-- <div class="col-sm-6" style="text-align: right;">50%</div> -->
								</div>
								<p class="lead text-center"><?php echo "Total parking charge collected till date - " . date("Y/m/d") . "<br>"; ?></p>
								<div class="progress">
									<div data-percentage="0%" style="width: 38%;" class="progress-bar progress-bar-teal" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>

							</div> <!--  col-md-12 ends -->

						</div>
					</div>
				</div>



			</div>
			<!--/.row-->


			<div class="row mt-4">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- <div class="panel-heading">Today's Income</div> -->
						<div class="panel-body">

							<div class="col-md-12 no-padding">


								<div class="row progress-labels">
									<h1 class="col-md-12 text-center"><img src="rupee-indian.png" width="30px" alt=""> <?php include 'counters/currentday-income.php' ?></h1>
									<!-- <div class="col-sm-6" style="text-align: right;">50%</div> -->
								</div>
								<p class="lead text-center">Today's total parking charge collection</p>
								<div class="progress">
									<div data-percentage="0%" style="width: 20%;" class="progress-bar progress-bar-teal" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>

							</div> <!--  col-md-12 ends -->

						</div>
					</div>
				</div>



			</div>
			<!--/.row-->


			<div class="row mt-4">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- <div class="panel-heading">Yesterday's Income</div> -->
						<div class="panel-body">

							<div class="col-md-12 no-padding">


								<div class="row progress-labels">
									<h1 class="col-md-12 text-center"><img src="rupee-indian.png" width="30px" alt=""> <?php include 'counters/yesday-income.php' ?></h1>
									<!-- <div class="col-sm-6" style="text-align: right;">50%</div> -->
								</div>
								<p class="lead text-center">Yesterday's total parking charge collection</p>
								<div class="progress">
									<div data-percentage="0%" style="width: 20%;" class="progress-bar progress-bar-teal" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>

							</div> <!--  col-md-12 ends -->

						</div>
					</div>
				</div>



			</div>
			<!--/.row-->
			<div class="row my-4">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- <div class="panel-heading">Yesterday's Income</div> -->
						<div class="panel-body">

							<div class="col-md-12 no-padding">


								<div class="row progress-labels">
									<h1 class="col-md-12 text-center"><img src="rupee-indian.png" width="30px" alt=""> <?php include 'counters/income-subscription.php' ?></h1>
									<!-- <div class="col-sm-6" style="text-align: right;">50%</div> -->
								</div>
								<p class="lead text-center">Subscription total parking charge collection</p>
								<div class="progress">
									<div data-percentage="0%" style="width: 20%;" class="progress-bar progress-bar-teal" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>

							</div> <!--  col-md-12 ends -->

						</div>
					</div>
				</div>



			</div>
			<!--/.row-->




		</div>
		<!--/.main-->
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