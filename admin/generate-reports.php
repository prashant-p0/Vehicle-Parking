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

		<title>Reports</title>
		<style>
      .dataTables_filter {
        float: right;
      }
    </style>
	</head>

	<body class="c1">
		<?php
		$page = "reports";
		include 'includes/sidebar.php'
		?>

		<div class="container">
			<h1 class=" text-center">Generated Reports</h1>

			<div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main mt-4">


				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<!-- <div class="panel-heading">Generate Reports</div> -->
							<div class="panel-body">
								<table id="myTable" class="table table-striped table-hover mt-4">

									<?php
									$fdate = $_POST['fromdate'];
									$tdate = $_POST['todate'];
									?>

									<div class="alert bg-info" role="alert"> <em class="fa fa-lg fa-file">&nbsp;</em>
										Displaying reports from <b> <?php echo $fdate ?> </b> to <b> <?php echo $tdate ?> </b>
									</div>


									<thead>
										<tr>
											<th>#</th>
											<th>Vehicle Reg. No.</th>
											<th>Category</th>
											<th>Parking Number</th>
											<th>Vehicle InTime</th>
                                            <th>Vehicle OutTime</th>
                                            <th>Charge</th>
											<th>Vehicle's Owner</th>

										</tr>
									</thead>
									<tbody>

										<?php
										$ret = mysqli_query($con, "SELECT * from vehicle_info where date(InTime) between '$fdate' and '$tdate' and Status='Out'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($ret)) {

											// convert date-format
											$d= $row['InTime'];
											$date=date_create($d);
											$InTime= date_format($date,"d/M/y-H:i");

											$d1= $row['OutTime'];
												$date1=date_create($d1);
												$OutTime= date_format($date1,"d/M/y-H:i");

										?>

											<tr>

												<td><?php echo $cnt; ?></td>

												<td><?php echo $row['RegistrationNumber']; ?></td>


												<td><?php echo $row['VehicleCategory']; ?></td>

												<td><?php echo 'CA-' . $row['ParkingNumber']; ?></td>
												<td><?php echo $InTime ?></td>
                                                <td><?php echo  $OutTime ?></td>
                                                <td><?php echo  $row['ParkingCharge']; ?></td>

												<td><?php echo $row['OwnerName']; ?></td>

												<!-- <td><a href="update-incomingdetail.php?updateid=<?php echo $row['ID']; ?>"><button type="button" class="btn btn-sm btn-danger">Take Action</button></a>
							</td> -->

											</tr>

										<?php $cnt = $cnt + 1;
										} ?>


									</tbody>

								</table>
							</div>
						</div>
					</div>



				</div>
				<!--/.row-->




			</div>
			<!--/.main-->




			
		</div>
		<!-- Optional JavaScript; choose one of the two! -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<!-- Option 1: Bootstrap Bundle with Popper -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

	<script>
				$(document).ready(function() {

					$('#myTable').DataTable();
				});
			</script>
	</body>

	</html>
<?php }  ?>