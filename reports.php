<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    if (strlen($_SESSION['vpmsaid']==0)) {
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="includes/body.css">
		<script src="includes/style0.js"></script>


	<title>Reports</title>
	<style>
		.date{
			margin-left: 400px;
		}
		.button{
			margin-left: 570px;
		}
	</style>
</head>

<body class="c1">
	<?php
		$page="reports";
		include 'includes/sidebar.php'
		?>
	<div class="container">
		<h1 class="panel-heading text-center">Reports</h1>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			


			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- <div class="panel-heading">Parking Reports</div> -->

						<form method="POST" enctype="multipart/form-data" name="datereports"
							action="85696">

							<div class="panel-body">

								<?php if($msg)
                                echo "<div class='alert bg-danger' role='alert'>
                                <em class='fa fa-lg fa-warning'>&nbsp;</em> 
                                $msg
                                <a href='#' class='pull-right'>
                                <em class='fa fa-lg fa-close'>
                                </em></a></div>" ?>

								<div class="form-group date mt-4">
									
									<div class="col-lg-8 ">
										<label for="">From</label>
										<input class="form-control " type="date" name="fromdate" id="fromdate"
											required="true">
									</div>


									<div class="col-lg-8  mt-3">
										<label for="">To</label>
										<input class="form-control" type="date" name="todate" id="todate"
											required="true">
									</div>


								</div>

							</div>
							<button type="submit" class="btn btn-success mt-3 button" name="submit">Generate Report</button>
							

						</form>
					</div>
				</div>



			</div>
			<!--/.row-->


		</div>

		</div>
		<!--/.main-->


		

		<script>
			$(document).ready(function () {
				$('#example').DataTable();
			});
		</script>
		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous"></script>

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php }  ?>
