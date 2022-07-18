<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit-vehicle'])) {
        $parkingnumber = mt_rand(10000, 99999);
        $catename = $_POST['catename'];
        $vehcomp = $_POST['vehcomp'];
        $vehreno = strtoupper($_POST['vehreno']);
        $ownername = $_POST['ownername'];
        $ownercontno = $_POST['ownercontno'];
        $enteringtime = $_POST['enteringtime'];

        // vehicle parking space
        $re = mysqli_query($con, "SELECT COUNT(VehicleCategory) as vehicle FROM `vehicle_info` WHERE  VehicleCategory='$catename' AND Status='' ;");
        $incount = mysqli_fetch_assoc($re);
        $incount1 = $incount['vehicle'];


        //vehicle count space
        $countspace = mysqli_query($con, "SELECT `space` FROM `vcategory` WHERE  VehicleCat='$catename';");
        $space = mysqli_fetch_assoc($countspace);
        $space1 = $space['space'];



        // check vehicle is already parked
        $ret = mysqli_query($con, "SELECT * FROM `vehicle_info` WHERE RegistrationNumber='$vehreno' AND VehicleCategory='$catename' AND (Status='' OR Status='req');");
        $count = mysqli_num_rows($ret);

        // if ($incount1 < $space1) {
        //     if ($count > 0) {
        //         $msg1 = "vehicle is Parked..";
        //     } else {

        //         $query = mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,InTime) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno',CURRENT_TIMESTAMP)");
        //         if ($query) {
        //             $_SESSION['entry'] = "Vehicle entry has been done..";
        //             header('location: in-vehicles.php');
        //         } else {
        //             $msg = "Something Went Wrong";
        //         }
        //     }
        // } else {
        //     $msg2 = "Parking space is full";
        // }

        if ($count > 0) {
            $msg1 = "vehicle is Parked..";
        } else {
            if ($incount1 < $space1) {

                $query = mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,InTime) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno',CURRENT_TIMESTAMP)");
                if ($query) {
                    $_SESSION['entry'] = "Vehicle entry has been done..";
                    header('location: in-vehicles.php');
                } else {
                    $msg = "Something Went Wrong";
                }
            } else {
                $msg2 = "Parking space is full";
            }
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


        <title>Vechicle-Entry</title>
    </head>

    <body class="c1" oncontextmenu="return false">
        <?php
        $page = "manage-vehicles";
        include 'includes/sidebar.php'
        ?>
        <div class="container">

            <div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">


                <div class="panel panel-default">
                    <h1 class="panel-heading text-center">Vehicle Details</h1>
                    <h3 class="panel-heading">Parking space Left</h3>
                    <div class="row mt-3">
                    <?php
                    	$category = mysqli_query($con, "SELECT * FROM vcategory");
                        while ($row = mysqli_fetch_array($category)) {
                            $cat = $row['VehicleCat'];
                            $cnt = $row['space'];
                            
                            $vehiclecat = mysqli_query($con, "SELECT COUNT(VehicleCategory) as vehicle FROM `vehicle_info` WHERE  VehicleCategory='$cat' AND Status='' ;");
                            $in = mysqli_fetch_assoc($vehiclecat);
                            $incount2 = $in['vehicle'];
                            $total = $cnt - $incount2;
                            echo '
                            <div class="alert alert-danger text-dark text-center mr-3 mx-auto" style="width: 300px;" role="alert">
                            '.$cat.' : '.$total.'
                            </div>';
                        } 
                        ?>
                        </div>
                       
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
		 ' ?> <?php if ($msg1)
                    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
						<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
						  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
						</symbol>
						<div class="alert alert-warning d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		 ' . $msg1 . '
		 </div>
		 <button type="button" class="btn-close float-end" style="margin-left: 1024px;" data-bs-dismiss="alert" aria-label="Close"></button>
		 </div>
		 ' ?> <?php if ($msg2)
                    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
						<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
						  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
						</symbol>
						<div class="alert alert-warning d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		 ' . $msg2 . '
		 </div>
		 <button type="button" class="btn-close float-end" style="margin-left: 1024px;" data-bs-dismiss="alert" aria-label="Close"></button>
		 </div>
		 ' ?> <h3 class=" my-4">Entry Vehicle</h3>

                    <form method="POST" class="row g-4 needs-validation" novalidate>
                        <div class="col-md-3">
                            <label for="validationCustom02" class="form-label">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehreno" name="vehreno" pattern="[A-Z]{2}[-][0-9]{2}[-][A-Z]{2}[-][0-9]{1,4}" placeholder="MH-23-ER-123" required autofocus>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Vehicle Category</label>
                            <select class="form-control " name="catename" id="catename">
                                <option " value=" 0">Select Category</option>
                                <?php $query = mysqli_query($con, "select * from vcategory");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <!-- <option class="text-dark" value="<?php echo $row['VehicleCat']; ?>"><?php echo $row['VehicleCat']; ?></option> -->
                                    <option class="text-dark" value="<?php echo  strtolower(str_replace(" ", "_", $row['VehicleCat'])) ?>"><?php echo $row['VehicleCat']; ?></option>

                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid category.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Vehicle's Company Name</label>
                            <input type="text" class="form-control" id="vehcomp" name="vehcomp" placeholder="Enter name" pattern="[A-Za-z ]+" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="validationCustom02" class="form-label">Owner's Name</label>
                            <input type="text" class="form-control" id="ownername" name="ownername" pattern="[A-Za-z ]+" placeholder="Enter here.." required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" maxlength="10" pattern="[0-9]+" id="ownercontno" placeholder="9069545343" name="ownercontno" required>
                            <div class="invalid-feedback">
                                Please provide a valid Number.
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success" name="submit-vehicle" type="submit">Submit</button>
                        </div>


                    </form>

                </div>
                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict'

                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.querySelectorAll('.needs-validation')

                        // Loop over them and prevent submission
                        Array.prototype.slice.call(forms)
                            .forEach(function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (!form.checkValidity()) {
                                        event.preventDefault()
                                        event.stopPropagation()
                                    }

                                    form.classList.add('was-validated')
                                }, false)
                            })
                    })()
                </script>




            </div>
        </div>
        <!--/.main-->



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