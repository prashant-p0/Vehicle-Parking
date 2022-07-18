<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsaid'] == 0)) {
	header('location:logout.php');
} else { ?>

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


		<title>Dashboard</title>
		<style>
			.round {
				width: 50px;
				height: 120px;
			}
		</style>
	</head>

	<body class="c1">





		<?php
		$page = "dashboard";
		include 'includes/sidebar.php'
		?>

		<div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">


			<div class="row">
				<div class="col-lg-12 mx-auto">
					<h1 class="page-header text-center mb-3"><?php include 'includes/greetings.php' ?></h1>
				</div>
			</div>
			<!--/.row-->

			<div class="container mt-3">
				<div class="row mx-auto">
					<div class="col-xs-2 col-md-3 col-lg-3 no-padding">
						<!-- <div class="panel panel-teal panel-widget border-right"> -->
						<div class="row no-padding">
							<img class="round ms-5 text-center" src="map.png" style="width: 150px; height:80px " alt="Icon">
							<div class="large fs-4  " style="margin-left: 90px;"><?php include 'counters/parking-count.php' ?></div>
							<div class="text-muted  ms-3 fs-5">Total Vehicles Parked</div>
						</div>
						<!-- </div> -->
					</div>
					<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
						<div class="panel panel-blue panel-widget border-right">
							<div class="row no-padding"><em class="fa fa-xl fa-toggle-on color-orange"></em>
								<img class="round " src="perspective3.png" style="width: 150px; height:80px "  alt="Icon">

								<div class="large fs-4 " style="margin-left: 75px;"><?php include 'counters/invehicles-count.php' ?></div>
								<div class="text-muted ms-4 fs-5">Vehicles IN</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
						<div class="panel panel-orange panel-widget border-right">
							<div class="row no-padding"><em class="fa fa-xl fa-toggle-off color-teal"></em>
								<img class="round " src="perspective_matte.png" style="width: 150px; height:80px;"  alt="Icon">
								<div class="large fs-4 ms-5"><?php include 'counters/outvehicles-count.php' ?></div>
								<div class="text-muted fs-5">Vehicles OUT</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
						<div class="panel panel-red panel-widget ">
							<div class="row no-padding"><em class="fa fa-xl fa-clock-o color-red"></em>
								<img class="round ms-2" src="perspective.png" style="width: 150px; height:80px;"  alt="Icon">

								<div class="large fs-4 ms-5 "><?php include 'counters/current-parkingCount.php' ?></div>
								<div class="text-muted  fs-5">Parking Done within 24 hrs</div>
							</div>
						</div>
					</div>
				</div>
				<!--/.row-->


				<div class="row">
				
					<?php
					$ret = mysqli_query($con, "SELECT * FROM subscirption");

					while ($row = mysqli_fetch_array($ret)) {
						$subid = $row['sub_id'];
						$desc = $row['description'];
						$time = $row['time'];
						$amount = $row['amount'];
					
					echo'
                    <style>
                    .card{
                        position: relative;
                        width: 400px;
                        height: 400px;
                        margin: 30px;
                        box-shadow: 20px 20px 50px rgba(0, 0,0,0.5);
                        border-radius: 15px;
                        background: black;
                        overflow: hidden;
                        justify-content: center;
                        align-items: center;
                        border-top: 1px solid rgba(255, 255, 255, 0.5);
                        border-left: 1px solid rgba(255, 255, 255, 0.5);
                        backdrop-filter: blur(5px);
                    }

                    .card .content{
                        padding: 20px;
                        
                        transform: translateY(100px);
                        opacity: 0;
                        transition: 0.5s;
                    }
                    .container .card:hover .content{
                        transform: translateY(10px);
                        opacity: 1;
                    }
                    </style>
						<div class="col-md-4" style="margin-top: 40px;">
							<div class="card" style="border-radius:30px;">
                            <div class="content">
								<ul class="pt-3 " style="list-style: none; display: flex; gap: 60px;">

									<li>
										<h4 style="color:white;">'.$desc.'</h4>
									</li>
									<li>
										<h5 style="color:white;">'.$time.'</h5>
									</li>
								</ul>
								<ul style="list-style: none;">
									<li class="me-3 ms-1" style="font-size: 20px; color:white">1 '.$desc.' : FOR ' .$amount.'.00 INR</li>
								</ul>

								<ul style="list-style: none;">
									<li>
										<h4 style="font-weight: bolder; color:white">Starting '. date("d-M-Y") .' </h4>
									</li>
								</ul>
								<ul class="ps-5 mb-3" style="color:white;">
									<li class="pb-1">You will next be billed on ';
								
									switch($subid) {
										case 1:
											$d = strtotime("+1 week");
											echo date("d-M-Y", $d);
											break;
										case 2:
											$d = strtotime("+1 Months");
											echo date("d-M-Y", $d);
											break;
										case 3:
											$d = strtotime("+1 year");
											echo date("d-M-Y", $d);
											break;
									
										default:
											echo "not available";
									}
									
									 echo '</li>


									<li class="pb-1">Cancel anytime. <button class="btn " style="color:white;" data-bs-toggle="modal" data-bs-target="#loginModal"> offer terms</button> apply.</li>
									<li>We"ll remind you 2 days before you get charged.</li>
									<li class="pb-4" style="list-style: none; margin-left: 200px; margin-top: 10px;"><a style="color: white; "  href="reg_cust.php?subid='.$subid.'">Buy Now</a></li>

								</ul>
                                </div>

							</div>
						</div>';
						include 'terms.php';

					}
					?>
			
				</div>
				
							
			</div>
		
			<?php

			include 'includes/dbconn.php';
			$ret = mysqli_query($con, "SELECT count(ID) id1 from vehicle_info where Status=''");
			$row5 = mysqli_fetch_array($ret);

			$ret = mysqli_query($con, "SELECT count(ID) id2 from vehicle_info where Status='Out'");
			$row6 = mysqli_fetch_array($ret);

			$ret = mysqli_query($con, "SELECT count(ID) as id1 from vehicle_info where VehicleCategory='Two Wheeler'");
			$row = mysqli_fetch_array($ret);

			$ret = mysqli_query($con, "SELECT count(ID) as id2 from vehicle_info where VehicleCategory='Four Wheeler'");
			$row2 = mysqli_fetch_array($ret);

			$ret = mysqli_query($con, "SELECT count(ID) as id4 from vehicle_info where VehicleCategory='Three Wheeler'");
			$row4 = mysqli_fetch_array($ret);

			?>


		</div>
		<!--/.main-->


		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script type="text/javascript" src="vanilla-tilt.js"></script> 
    <script>
        VanillaTilt.init(document.querySelectorAll(".card"), {
		max: 25,
		speed: 400,
        glare:true,
        "max-glare":1
	});
    </script>
		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
		-->
	</body>

	</html>
<?php } ?>