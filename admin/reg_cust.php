<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit-detail'])) {
        $vehreno = $_POST['vehno'];
        $catename = $_POST['catname'];
        $company = $_POST['company'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $mail = $_POST['mail'];
        $desc = $_POST['plan'];
        $amount1 = $_POST['amt'];
        $validity = $_POST['validity'];




        // $sdate = date("Y-m-d");
        // // $validity = '1 Month';
        // $date = date_create($sdate);
        // date_modify($date, "+ $validity");
        // $date1 = date_format($date, "Y-m-d");

        $query_exist = mysqli_query($con, "SELECT * FROM subscripted_user WHERE vehicle_no='$vehreno' and vehicle_cat='$catename' and status != 'deleted';");
        $num = mysqli_num_rows($query_exist);
        // echo $num;
        if ($num > 0) {

            // count days left for end subscription
            $check_date = mysqli_query($con, "SELECT * FROM subscripted_user WHERE vehicle_no='$vehreno' && vehicle_cat='$catename';");
            $row = mysqli_fetch_assoc($check_date);
            $edate = $row['edate'];
            $sdate = $row['sdate'];
            $date1 = date("Y-m-d");
            $date2 = $edate;
            // echo $date2;
            // echo $date1;

            function dateDiff($date1, $date2)
            {
                $date1_ts = strtotime($date1);
                $date2_ts = strtotime($date2);
                $diff = $date2_ts - $date1_ts;
                return round($diff / 86400);
            }

            $dateDiff = dateDiff($date1, $date2);
            // echo $dateDiff;

            // add no. of count days into end date
            $sdate = date("Y-m-d");
            // echo $sdate;
            $day = $dateDiff . ' days';
            // echo $day;
            $date = date_create($sdate);
            date_modify($date, "+ $validity");
            date_modify($date, "+ $day");
            $date5 = date_format($date, "Y-m-d");
            // echo $date5;
            $st = "updated";
            // echo $validity;

            // $update = mysqli_query($con, "UPDATE subscripted_user set ownername='$name', plan='$plan', amount='$amount1', edate='$date5', status = '$st' where vehicle_no='$vehreno'");
            $update = mysqli_query($con, "UPDATE subscripted_user set ownername='$name', mail='$mail', plan='$desc', amount='$amount1', validity= '$validity', edate='$date5', status = '$st' where vehicle_no='$vehreno'");
        } else {
            $query = mysqli_query($con, "INSERT INTO `subscripted_user` (`sid`, `vehicle_no`, `vehiclename`, `vehicle_cat`, `ownername`, `phone`, `mail`,`plan`, `amount`, `validity`, `sdate`, `edate`) VALUES (NULL, '$vehreno', '$company', '$catename', '$name', '$contact','$mail' ,'$desc', '$amount1', '$validity', current_timestamp(), '$date1');");
            if ($query) {
                // $msg = "600";
                // Multiple recipients
                $to = $mail; // note the comma

                // Subject
                $subject = 'Thank you for Purchasing our Subscription';
                $body = "
                    <html>
                        <body>

                            <h2 style='color: #19b5e0;'>
                                Welcome to our World 😊
                            </h2><br>

                            Hello $name,<br><br>

                            Thank you for choosing our subscription, you choose $desc for Rs $amount1.<br>
                            Enjoy your Subscription.<br><br>

                            Your Subscription ends on <b> $date1 </b><br><br><br>


                            Thank you,<br>
                            The Vehicle Parking team
                        </body>
                    </html>";


                // To send HTML mail, the Content-type header must be set
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                // Additional headers
                // $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
                $headers[] = 'From: ppawar2662@gmail.com';
                // $headers[] = 'Cc: birthdayarchive@example.com';
                // $headers[] = 'Bcc: birthdaycheck@example.com';

                // Mail it
                if (mail($to, $subject,  $body, implode("\r\n", $headers))) {
                    echo "mail send";
                } else {
                    echo "mail not send";
                }
                // echo "Subscription done successfully";
                // $_SESSION['status'] = "Subscription done successfully";
                header('location: payment.php');
                // echo "<script>window.location.href = 'dashboard.php'</script>";
            } else {
                echo "<script>alert('Something Went Wrong');</script>";
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

        <title>Subscription-Module</title>
    </head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


    <body class="c1">

        <?php
        $page = "dashboard";
        include 'includes/sidebar.php'
        ?>


        <div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">
            <div class="col-lg-12 mx-auto">
                <h1 class="page-header text-center mb-3">Subscription-Module</h1>
            </div>

            <!--/.row-->
            <div class="container">
                <h3 class=" my-4">Entry Vehicle</h3>
                <form method="POST" class="row g-4 needs-validation" novalidate>
                    <div class="col-md-3">
                        <label for="validationCustom02" class="form-label">Vehicle Number</label>
                        <input type="text" class="form-control" id="vehicle_no" name="vehno" placeholder="MH-23-ER-123" required autofocus>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Choose Vehicle Category</label>
                        <select class="form-select" id="vehicle_cat" name="catname" required>
                            <?php
                            $id = $_GET['subid'];
                            $ret = mysqli_query($con, "SELECT * FROM sub_vehicle WHERE sub_id=$id");


                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <option class="text-dark" value="<?php echo  strtolower(str_replace(" ", "_", $row['category'])) ?>"><?php echo $row['category']; ?></option>

                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid category.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Vehicle's Company Name</label>
                        <input type="text" class="form-control" id="vehiclename" name="company" placeholder="Enter name" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom02" class="form-label">Owner's Full Name</label>
                        <input type="text" class="form-control" id="ownername" name="name" placeholder="Enter here.." required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="phone" name="contact" required>
                        <div class="invalid-feedback">
                            Please provide a valid Number.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">enter mail</label>
                        <input type="tel" class="form-control" id="mail" name="mail" required>
                        <div class="invalid-feedback">
                            Please provide a valid Email id.
                        </div>
                    </div>

                    <?php
                    $id = $_GET['subid'];
                    $ret = mysqli_query($con, "SELECT * FROM subscirption WHERE sub_id=$id");

                    $row = mysqli_fetch_array($ret);

                    $time = $row['validity'];
                    $plan = $row['plan'];
                    echo '
                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Plan</label>
                    <input type="text" class="form-control" name="plan" id="plan" value="' . $plan . '" readonly>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                
                <div class="col-md-2">
                    <label for="validationCustom05" class="form-label">Validity</label>
                    <input type="text" class="form-control" name="validity" id="validity"  value="' . $time . '" readonly>
                    <div class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                </div>';

                    ?>
                    <div class="col-md-2" style="margin-top:33px;">
                        <label for="validationCustom03" class="form-label">Amount
                            <input type="text" class="form-control" name="amt" id="amt" value="0" readonly>
                            <div class="amount-ref">
                                <?php
                                // $query = mysqli_query($con, "select * from vcategory");
                                $ret2 = mysqli_query($con, "SELECT * FROM sub_vehicle WHERE sub_id=$id");
                                while ($row = mysqli_fetch_array($ret2)) {
                                ?>
                                    <!-- <option selected disabled value="">Choose...</option> -->
                                    <div data-label="<?php echo strtolower(str_replace(" ", "_", $row['category'])) ?>" data-value="<?php echo $row['amount'] ?>">
                                    </div>

                                <?php } ?>
                            </div>

                        </label>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>

                    <!-- <div class="col-md-2">
                        <label for="validationCustom05" class="form-label">enter mail</label>
                        <input type="tel" class="form-control" name="amt" id="amt" value="12" readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Email id.
                        </div>
                    </div> -->

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
                    <input type="hidden" id="req" name="req" value="req">

                    <div class="col-12">
                        <input type="button" class="btn btn-success" name="submit-detail" id="btn" value="Pay Now" onclick="pay_now()" />
                        <!-- <button class="btn btn-success" name="submit-detail" type="submit">Submit</button> -->
                    </div>
                </form>
            </div>
            <!--/.main-->
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
                var name = jQuery('#name').val();
                var amt = jQuery('#amt').val();
                var plan = jQuery('#plan').val();
                var vehno = jQuery('#vehicle_no').val();
                var company = jQuery('#vehiclename').val();
                var catename = jQuery('#vehicle_cat').val();
                var name = jQuery('#ownername').val();
                var contact = jQuery('#phone').val();
                var mail = jQuery('#mail').val();
                var validity = jQuery('#validity').val();

                if (name == null || name == "", amt == null || amt == "", plan == null || plan == "", vehno == null, company == null || company == "", catename == null || catename == "", name == null || name == "") {
                    alert("Please Fill All  Field");
                    return false;
                } else if (!(/^[A-Z]{2}[-][0-9]{1,2}[-][A-Z]{1,2}[-][0-9]{1,4}$/.test(vehno)))

                {
                    alert("Please Insert Valid Vehicle Number..");
                    return false;
                }
                else if (!(/^[0-9]{10}$/.test(contact)))

                {
                    alert("Please Provide Vaild Contact Number");
                    return false;
                }
                else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)))

                {
                    alert("Please Provide Vaild Email Address..");
                    return false;
                } else {

                    jQuery.ajax({
                        type: 'post',
                        url: 'payment_process.php',
                        data: "amt=" + amt + "&name=" + name + "&plan=" + plan + "&vehicle_no=" + vehno + "&vehiclename=" + company + "&vehicle_cat=" + catename + "&ownername=" + name + "&phone=" + contact + "&mail=" + mail + "&validity=" + validity,
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








<?php }  ?>