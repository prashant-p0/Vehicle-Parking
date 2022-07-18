<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit-in'])) {
		$cid = $_GET['updateid'];
		$remark = $_POST['remark'];
		$status = $_POST['status'];
		$parkingcharge = $_POST['amt'];

		$query = mysqli_query($con, "UPDATE vehicle_info set Remark='$remark', OutTime=CURRENT_TIMESTAMP,Status='$status',ParkingCharge='$parkingcharge' where ID='$cid'");
		if ($query) {
			$_SESSION['out'] = "Vehicle left the parking..";
			header('location: out-vehicles.php');
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
		<link rel="stylesheet" href="includes/body.css">

		<title>Outgoing-Vehicle</title>
	</head>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<script src="includes/style0.js"></script>



	<body class="c1">
		<?php
		$page = "in-vehicle";
		include 'includes/sidebar.php'
		?>
		<div class="container">
			<h1 class="panel-heading text-center">Vehicle Category Management</h1>
			<div class="col-sm-12 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">


				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">

							<div class="panel-body">

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
		 <button type="button" class="btn-close float-end" style="margin-left: 944px;" data-bs-dismiss="alert" aria-label="Close"></button>
		 </div>
		 ' ?>

								<div class="col-md-12">


									<form method="POST" class="row g-4 mt-3">


										<?php
										$cid = $_GET['updateid'];
										$ret = mysqli_query($con, "SELECT * from vehicle_info where ID='$cid'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($ret)) {
											$phone = $row['OwnerContactNumber'];
											$vehno = $row['RegistrationNumber'];
											$catname = $row['VehicleCategory'];


										?>

											<div class="col-md-3">
												<label class="form-label">Vehicle Registration Number</label>
												<input type="text" class="form-control" value="<?php echo $vehno ?>" id="catename" name="catename" readonly>
											</div>


											<div class=" col-md-3">
												<label class="form-label">Company Name</label>
												<input type="text" class="form-control" value="<?php echo $row['VehicleCompanyname']; ?>" id="sdesc" name="sdesc" readonly>
											</div>


											<div class="col-md-3">
												<label class="form-label">Category</label>
												<input type="text" class="form-control" value="<?php echo $catname ?>" id="sdesc" name="sdesc" readonly>
											</div>


											<div class="col-md-2">
												<label class="form-label">Parking Number</label>
												<input type="text" class="form-control" value="<?php echo $row['ParkingNumber']; ?>" id="sdesc" name="sdesc" readonly>
											</div>


											<div class="col-md-3">
												<label class="form-label">Vehicle IN Time</label>
												<input type="text" class="form-control" value="<?php echo $row['InTime']; ?>" id="sdesc" name="sdesc" readonly>
											</div>


											<div class="col-md-4">
												<label class="form-label">Vehicle Owned By</label>
												<input type="text" class="form-control" value="<?php echo $row['OwnerName']; ?>" id="sdesc" name="sdesc" readonly>
											</div>


											<div class="col-md-3">
												<label class="form-label">Vehicle Owner Contact</label>
												<input type="text" class="form-control" value="<?php echo $row['OwnerContactNumber']; ?>" id="sdesc" name="sdesc" readonly>
											</div>


											<div class="col-md-3">
												<label class="form-label">Current Status</label>
												<input type="text" class="form-control" value="<?php if ($row['Status'] == "") {
																									echo "Vehicle In";
																								}
																								if ($row['Status'] == "Out") {
																									echo "Vehicle out";
																								}; ?>" id="sdesc" name="sdesc" readonly>
											</div>
											<?php
											// $qu = mysqli_query($con, "SELECT s.vehicle_no FROM subscripted_user s LEFT JOIN vehicle_info v ON s.vehicle_no=v.RegistrationNumber WHERE s.phone=$phone;");
											$qu = mysqli_query($con, "SELECT vehicle_no FROM subscripted_user WHERE vehicle_no= '$vehno' and vehicle_cat='$catname' and status != 'deleted'");
											// $cnt = 1;
											if ($ro = mysqli_num_rows($qu)) {
												// echo $row1['s.vehicle_no'];
												echo '<div class="col-md-3">
												<label class="form-label">Total Charge</label>
												<input type="number" class="form-control" placeholder="" value="0" id="amt" name="amt" readonly>
											</div>';
											} else {
												$cat = $row['VehicleCategory'];
												$qu1 = mysqli_query($con, "SELECT charges from vcategory where VehicleCat='$cat';");
												$phone1 = mysqli_fetch_assoc($qu1);
												$charges = $phone1['charges']; ?>
												<div class="col-md-3">
													<label class="form-label">Total Charge</label>
													<input type="number" class="form-control" id="amt" name="amt" value="<?php echo $charges ?>"  readonly>

												</div>
											<?php
											} ?>






											<div class="col-md-3">
												<label class="form-label">Status</label>
												<select id="status" name="status" class="form-control" required="true">
													<option value="Out">Outgoing Vehicle</option>
												</select>
											</div>


											<?php
											$admin = $_SESSION['vpmsaid'];
											$ret = mysqli_query($con, "SELECT AdminName from admin where ID='$admin'");
											$cnt = 1;
											$row = mysqli_fetch_array($ret);

											echo '
											<div class="col-md-3">
												<label class="form-label">Remarks</label>
												<input type="text" class="form-control" id="remark" name="remark" value="' . $row['AdminName'] . '" readonly>
											</div>';
											?>
											

											
												<input type="hidden" id="cid" class="cid" value="<?php echo $cid ?>" readonly>
										



											<div class="row mt-4">
												<!-- <input type="button" class="btn btn-success mx-auto col-md-2" name="submit-in" id="btn" value="Pay Now" onclick="pay_now()" /> -->

												<?php
												// $qu = mysqli_query($con, "SELECT s.vehicle_no FROM subscripted_user s LEFT JOIN vehicle_info v ON s.vehicle_no=v.RegistrationNumber WHERE s.phone=$phone and status != 'deleted';");
												// $qu = mysqli_query($con, "SELECT s.vehicle_no FROM subscripted_user s LEFT JOIN vehicle_info v ON s.vehicle_no=v.RegistrationNumber WHERE s.phone=$phone and s.status != 'deleted';");
												$qu = mysqli_query($con, "SELECT vehicle_no FROM subscripted_user WHERE vehicle_no= '$vehno' and vehicle_cat='$catname' and status != 'deleted'");
												$qu1 = mysqli_query($con, "SELECT * FROM vehicle_info WHERE ID=$cid and  payment_status = 'complete';");
												// $cnt = 1;
												if ($ro = mysqli_num_rows($qu)) {
													// echo $row1['s.vehicle_no'];
													echo '<button type="submit" class="btn btn-success mx-auto col-md-2" name="submit-in">Submit For Out-Going</button>';
												} elseif ($ro1 = mysqli_num_rows($qu1)) {
													echo '<button type="submit" class="btn btn-success mx-auto col-md-2" name="submit-in">Submit For Out-Going</button>';
												} else {

													echo '<input type="button" class="btn btn-success mx-auto col-md-2" name="submit-in" id="btn" value="Pay Now" onclick="pay_now()" />
												';
												}

												?>
											<?php } ?>
											</div>

								</div> <!--  col-md-12 ends -->


							</div>
						</div>
					</div>



				</div>
				<!--/.row-->




			</div>
			<!--/.main-->

			<script>
				function pay_now() {
					var amt = jQuery('#amt').val();
					var status = jQuery('#status').val();
					var remark = jQuery('#remark').val();
					var cid = jQuery('#cid').val();

		


						jQuery.ajax({
							type: 'post',
							url: 'payment_processdaily.php',
							data: "amt=" + amt + "&status=" + status + "&remark=" + remark + "&cid=" + cid,
							success: function(result) {
								var options = {
									"key": "rzp_test_iTv8DJzXkYaA9V",
									"amount": amt * 100,
									"currency": "INR",
									"name": "Parking-System",
									"description": "Transaction",
									// "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
									"image": "https://img.freepik.com/free-photo/fun-3d-cartoon-teenage-boy_183364-81184.jpg?w=740",
									"handler": function(response) {
										jQuery.ajax({
											type: 'post',
											url: 'payment_processdaily.php',
											data: "payment_id=" + response.razorpay_payment_id,
											success: function(result) {
												window.location.href = "thank_you1.php";
											}
										});
									}
								};
								var rzp1 = new Razorpay(options);
								rzp1.open();
							}
						});

					
				}
			</script>


			<!-- <script>
				$(document).ready(function() {
					$('#example').DataTable();
				});
			</script> -->
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