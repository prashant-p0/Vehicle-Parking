<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="includes/body.css">
  <script src="includes/style0.js"></script>


    <title>Receipt</title>
  </head>
  <body class="c1">
  <div class="card mx-auto mt-5" style="width: 410px; height:500px;border:2px solid black">
    <h3 class="text-center pt-2">Vehical Parking System</h3>

    <h5 class="text-center" style="margin-top: 60px; margin-bottom:40px ">Daily Recipt</h5>
    <?php
        $cid=$_GET['vid'];
        $ret=mysqli_query($con,"SELECT * from vehicle_info where ID='$cid'");
       

       $row=mysqli_fetch_array($ret);
        ?>
    <p   style="margin-left: 25px; margin-bottom:5px" ><samp>Parking Number &nbsp;:  <?php  echo $row['ParkingNumber'];?></samp></p>
    <p   style="margin-left: 25px; margin-bottom:5px" ><samp>InTime &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php  echo $row['InTime'];?></samp></p>
    <p   style="margin-left: 25px; margin-bottom:5px" ><samp>OutTime &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php  echo $row['OutTime'];?></samp></p>
    <p   style="margin-left: 25px; margin-bottom:5px" ><samp>Parking Charge &nbsp;:  <?php  echo $row['ParkingCharge'];?></samp></p>
    <p   style="margin-left: 25px; margin-bottom:5px"><samp>Vehicle Type &nbsp;&nbsp;&nbsp;: <?php  echo $row['VehicleCategory'];?></samp></p>
    <p   style="margin-left: 25px; margin-bottom:5px"><samp>Vehicle Number &nbsp;: <?php  echo $row['RegistrationNumber'];?></samp></p>
    <p   style="margin-left: 25px; margin-bottom:5px"><samp>OwnerName &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php  echo $row['OwnerName'];?></samp></p>
    <p   style="margin-left: 25px; margin-bottom:5px"><samp>Contact &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php  echo $row['OwnerContactNumber'];?></samp></p>
    <p   style="margin-left: 25px; margin-bottom:10px"><samp>Subscripted User: 
    <?php
    $phone =$row['OwnerContactNumber'];
													$query = mysqli_query($con, "SELECT s.* FROM subscripted_user s LEFT JOIN vehicle_info v ON s.vehicle_no=v.RegistrationNumber WHERE s.phone=$phone;");
													// $cnt = 1;
													if ($row1 = mysqli_num_rows($query)) {
														echo 'Yes';
													} else {
														echo 'No';
													}

													?>
    </samp></p>
    <!-- <p style="border-top: 2px dashed black; width:360px;margin-left:10px;"></p> -->
    <p class="text-center"><samp> Have a Good Day ,Vist Again !🙂</samp></p>
    
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>