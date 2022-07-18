<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Kathmandu');
$numeric_date = date("G");

if (include('../includes/dbconn.php')) {
    // echo" hi";
} else {
    // echo "0";
}

include('../includes/dbconn.php');
if (strlen($_SESSION['user'] == 0)) {
    header('location:logout.php');
}
// else if($numeric_date>=15&&$numeric_date<=24) {
//     include ('sidebar1.php');
//     include('clock.php');

// }
else {
    if (isset($_POST['submit-in'])) {
        $parkingnumber = mt_rand(10000, 99999);
        $vehicleno = $_POST['vehno'];
        $catname = $_POST['catname'];
        $company = $_POST['company'];
        $ownername = $_POST['name'];
        $request = $_POST['req'];
        $enteringtime = $_POST['enteringtime'];
        $user = $_SESSION['user'];
        $phone_query = mysqli_query($con, "select phone from user WHERE uid = $user");
        $row = mysqli_fetch_assoc($phone_query);
        $user_phone = $row['phone'];
        // echo $user_phone;


        $ret = mysqli_query($con, "SELECT * FROM `vehicle_info` WHERE RegistrationNumber='$vehicleno' AND VehicleCategory='$catname' AND (Status='' OR Status='req');");
        $count = mysqli_num_rows($ret);
        // echo $count;

        if ($count > 0) {
            $msg1 = "vehicle is already exist";
        } else {

            $query = mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,`Status`,`uid`) value('$parkingnumber','$catname','$company','$vehicleno','$ownername','$user_phone','$request','$user')");
            // $query = mysqli_query($con, "INSERT into vehicle_dummy(VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,`uid`) value('$catname','$company','$vehicleno','$ownername','$user_phone','$user')");
            if ($query) {
                // header('location:preview.php');
                $msg = "Your request has been submitted";
            } else {
                $msg = "Something Went Wrong";
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
        <link rel="stylesheet" href="../includes/body.css">
  <script src="../includes/style0.js"></script>


        <title>Preview</title>

    </head>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 1);

        window.onunload = function() {
            null
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <body class="c1">

        <?php
        $page = "dashboard";
        include 'sidebar1.php'
        ?>

        <div class="container">
            <h2 class="text-center mt-4 text-capitalize"><?php include 'greetings1.php' ?></h2>
            <?php if ($msg)
                echo  '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol><div>
                  <div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
   ' . $msg . '
   </div>
   <button type="button" class="btn-close float-end" style="margin-left: 924px;" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   </div>' ?>
            <?php if ($msg1)
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
		 ' ?>


            <?php
            if (isset($_SESSION['daily'])) {
            ?>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                </svg>
                <div class="alert alert-success alert-dismissible  d-flex align-items-center" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        <?php echo $_SESSION['daily']; ?>
                    </div>
                </div>
            <?php

            }

            unset($_SESSION['daily']);
            ?>



            <h3 class=" my-4">Confirm Details</h3>
            <div class="col-md-12">


                <form method="POST" class="row g-4 mt-3">


                    <?php
                    // $cid = $_GET['updateid'];
                    $user = $_SESSION['user'];
                    $ret = mysqli_query($con, "SELECT * from vehicle_dummy where uid='$user' order by cdate desc limit 1");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                        $phone = $row['OwnerContactNumber'];
                        $vehno = $row['RegistrationNumber'];
                        $catname = $row['VehicleCategory'];


                    ?>

                        <div class="col-md-3">
                            <label class="form-label">Vehicle Registration Number</label>
                            <input type="text" class="form-control" value="<?php echo $vehno ?>" id="vehicle_no" name="vehno" readonly>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" value="<?php echo $catname ?>" id="vehicle_cat" name="catname" readonly>
                        </div>

                        <div class=" col-md-3">
                            <label class="form-label">Company Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['VehicleCompanyname']; ?>" id="vehiclename" name="company" readonly>
                        </div>







                        <div class="col-md-4">
                            <label class="form-label">Vehicle Owned By</label>
                            <input type="text" class="form-control" value="<?php echo $row['OwnerName']; ?>" id="ownername" name="name" readonly>
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
                                <input type="number" class="form-control" value="<?php echo $charges ?>" id="amt" name="amt" readonly>

                            </div>
                        <?php
                        } ?>

                        <input type="hidden" id="req" name="req" value="req">

                        <div class="row mt-4">
                            <!-- <input type="button" class="btn btn-success mx-auto col-md-2" name="submit-in" id="btn" value="Pay Now" onclick="pay_now()" /> -->

                            <?php
                            // $qu = mysqli_query($con, "SELECT s.vehicle_no FROM subscripted_user s LEFT JOIN vehicle_info v ON s.vehicle_no=v.RegistrationNumber WHERE s.phone=$phone and status != 'deleted';");
                            // $qu = mysqli_query($con, "SELECT s.vehicle_no FROM subscripted_user s LEFT JOIN vehicle_info v ON s.vehicle_no=v.RegistrationNumber WHERE s.phone=$phone and s.status != 'deleted';");
                            $qu = mysqli_query($con, "SELECT vehicle_no FROM subscripted_user WHERE vehicle_no= '$vehno' and vehicle_cat='$catname' and status != 'deleted'");
                            // $qu1 = mysqli_query($con, "SELECT * FROM vehicle_info WHERE ID=$cid and  payment_status = 'complete';");
                            // $cnt = 1;
                            if ($ro = mysqli_num_rows($qu)) {
                                // echo $row1['s.vehicle_no'];
                                echo '<button type="submit" class="btn btn-success mx-auto col-md-2" name="submit-in">Submit</button>
                                ';
                            } else {

                                echo '<input type="button" class="btn btn-success mx-auto col-md-2" name="submit-in" id="btn" value="Pay Now" onclick="pay_now()" />
                               ';
                            }

                            ?>
                        <?php } ?>
                        </div>
                </form>
                <a href="dashboard1.php"><button type="submit" class="btn btn-warning">Back</button></a>
            </div> <!--  col-md-12 ends -->
        </div>
        

        <script>
            function pay_now() {
                var vehno = jQuery('#vehicle_no').val();
                var catename = jQuery('#vehicle_cat').val();
                var company = jQuery('#vehiclename').val();
                var name = jQuery('#ownername').val();
                var amt = jQuery('#amt').val();
                var req = jQuery('#req').val();

                if (name == null || name == "", amt == null || amt == "", vehno == null, company == null || company == "") {
                    alert("Please Fill All  Field");
                    return false;
                } else if (!(/^[A-Z]{2}[-][0-9]{1,2}[-][A-Z]{1,2}[-][0-9]{1,4}$/.test(vehno)))

                {
                    alert("Please Fill All the Field");
                    return false;
                } else {

                    jQuery.ajax({
                        type: 'post',
                        url: 'payment_process.php',
                        data: "amt=" + amt + "&vehicle_no=" + vehno + "&vehiclename=" + company + "&vehicle_cat=" + catename + "&ownername=" + name + "&req=" + req,
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
                                        url: 'payment_process.php',
                                        data: "payment_id=" + response.razorpay_payment_id,
                                        success: function(result) {
                                            window.location.href = "daily-thank-you.php";
                                        }
                                    });
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.open();
                        }
                    });

                }


            }
        </script>
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

<?php } ?>