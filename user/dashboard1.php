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
else if($numeric_date>=15&&$numeric_date<=07) {
    include ('sidebar1.php');
    include('clock.php');

}
else {
    if (isset($_POST['submit-in'])) {
        // $parkingnumber = mt_rand(10000, 99999);
        $vehicleno = mysqli_real_escape_string($con, $_POST['vehno']);
        $catname = mysqli_real_escape_string($con, $_POST['catname']);
        $company = mysqli_real_escape_string($con,$_POST['company']);
        $ownername = mysqli_real_escape_string($con,$_POST['name']);
        $request = mysqli_real_escape_string($con,$_POST['req']);
        $enteringtime = $_POST['enteringtime'];
        $user = $_SESSION['user'];
        $phone_query = mysqli_query($con, "select phone from user WHERE uid = $user");
        $row = mysqli_fetch_assoc($phone_query);
        $user_phone = $row['phone'];
        // echo $user_phone;


        // vehicle parking space
        $re = mysqli_query($con, "SELECT COUNT(VehicleCategory) as vehicle FROM `vehicle_info` WHERE  VehicleCategory='$catname' AND Status='' ;");
        $incount = mysqli_fetch_assoc($re);
        $incount1 = $incount['vehicle'];


        //vehicle count space
        $countspace = mysqli_query($con, "SELECT `space` FROM `vcategory` WHERE  VehicleCat='$catname';");
        $space = mysqli_fetch_assoc($countspace);
        $space1 = $space['space'];

        $ret = mysqli_query($con, "SELECT * FROM `vehicle_info` WHERE RegistrationNumber='$vehicleno' AND VehicleCategory='$catname' AND (Status='' OR Status='req');");
        $count = mysqli_num_rows($ret);
        // echo $count;

        // if ($incount1 < $space1) {
        //     if ($count > 0) {
        //         $msg1 = "vehicle is already exist";
        //     } else {

        //         // $query = mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,`Status`,`uid`) value('$parkingnumber','$catname','$company','$vehicleno','$ownername','$user_phone','$request','$user')");
        //         $query = mysqli_query($con, "INSERT into vehicle_dummy(VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,`uid`) value('$catname','$company','$vehicleno','$ownername','$user_phone','$user')");
        //         if ($query) {
        //             header('location:4516');
        //             // $msg = "Your request has been submitted";
        //         } else {
        //             $msg = "Something Went Wrong";
        //         }
        //     }
        // }else {
        //     $msg2 = "Parking space is full";
        // }

        if ($count > 0) {
            $msg1 = "vehicle is Parked..";
        } else {
            if ($incount1 < $space1) {

                $query = mysqli_query($con, "INSERT into vehicle_dummy(VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,`uid`) value('$catname','$company','$vehicleno','$ownername','$user_phone','$user')");
                if ($query) {
                    header('location:4516');
                    // $msg = "Your request has been submitted";
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
        <link rel="stylesheet" href="../includes/body.css">
  <script src="../includes/style0.js"></script>


        <title>Dashboard</title>

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
   <button type="button" class="btn-close float-end" style="margin-left: 1024px;" data-bs-dismiss="alert" aria-label="Close"></button>
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
            <?php if ($msg2)
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



            <h3 class=" my-4">Entry Vehicle</h3>
            <form method="POST" class="row g-4 needs-validation" novalidate>
                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Vehicle Number</label>
                    <input type="text" class="form-control" id="vehicle_no" name="vehno" pattern="[A-Z]{2}[-][0-9]{2}[-][A-Z]{2}[-][0-9]{1,4}" placeholder="MH-23-ER-123" required autofocus>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Choose Vehicle Category</label>
                    <select class="form-select" id="vehicle_cat" name="catname" required>
                        <?php $query = mysqli_query($con, "select * from vcategory");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <!-- <option selected disabled value="">Choose...</option> -->
                            <option class="text-dark" value="<?php echo  strtolower(str_replace(" ", "_", $row['VehicleCat'])) ?>"><?php echo $row['VehicleCat']; ?></option>

                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid category.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Vehicle's Company Name</label>
                    <input type="text" class="form-control" id="vehiclename" name="company" placeholder="Enter name" pattern="[A-Za-z ]+" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Owner's Full Name</label>
                    <input type="text" class="form-control" id="ownername" name="name" placeholder="Enter here.." pattern="[A-Za-z ]+" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>




                <div class="col-md-2" style="margin-top:33px;">
                    <label for="validationCustom03" class="form-label">Amount
                        <input type="text" class="form-control" name="amt" id="amt" value="10" disabled>
                        <div class="amount-ref">
                            <?php $query = mysqli_query($con, "select * from vcategory");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <!-- <option selected disabled value="">Choose...</option> -->
                                <div data-label="<?php echo strtolower(str_replace(" ", "_", $row['VehicleCat'])) ?>" data-value="<?php echo $row['charges'] ?>">
                                </div>

                            <?php } ?>
                        </div>

                    </label>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Expired On</label>
                    <input type="text" class="form-control" name="valid" id="validationCustom05" value="Today" disabled>
                    <div class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                </div>

                <input type="hidden" id="req" name="req" value="req">

                <div class="col-12">
                    <?php
                    $user = $_SESSION['user'];
                    $phone_query = mysqli_query($con, "select phone from user WHERE uid = $user");
                    $row = mysqli_fetch_assoc($phone_query);
                    $user_phone = $row['phone'];
                    $qu = mysqli_query($con, "SELECT * FROM subscripted_user WHERE phone=$user_phone;");
                    if ($ro = mysqli_num_rows($qu)) {
                        echo '<button type="submit" class="btn btn-success mx-auto col-md-1" name="submit-in">Submit</button>';
                    } else {

                        echo '<input type="button" class="btn btn-success mx-auto col-md-1" name="submit-in" id="btn" value="Pay Now" onclick="pay_now()" />
												';
                    }

                    ?>

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
                                            window.location.href = "thank_you.php";
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
    <script>
        document.querySelector('[name="catname"]').addEventListener('change', (e) => {
            let value = document.querySelector(`.amount-ref [data-label='${e.target.value}']`).dataset.value
            document.querySelector('[name="amt"]').value = value
            console.log(value)
        })
    </script>

    </html>

<?php } ?>