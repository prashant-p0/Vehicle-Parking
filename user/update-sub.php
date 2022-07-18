<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');
if (strlen($_SESSION['user'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit-detail'])) {
        $vehreno = $_POST['vehno'];
        $catename = $_POST['catname'];
        $company = $_POST['company'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $desc = $_POST['plan'];
        $amount1 = $_POST['amount'];
        $validity = $_POST['validity'];



        // $date=date_create($sdate);
        //  date_modify($date,"+ $validity");
        // $date1= date_format($date,"Y-m-d");
        $sdate = date("Y-m-d");
        // $validity = '1 Month';
        $date = date_create($sdate);
        date_modify($date, "+ $validity");
        $date1 = date_format($date, "Y-m-d");
        // echo $date1;

        $query = mysqli_query($con, "INSERT INTO `subscripted_user` (`sid`, `vehicle_no`, `vehiclename`, `vehicle_cat`, `ownername`, `phone`, `plan`, `amount`, `validity`, `sdate`, `edate`) VALUES (NULL, '$vehreno', '$company', '$catename', '$name', '$contact', '$desc', '$amount1', '$validity', current_timestamp(), '$date1');");
        // $query = mysqli_query($con, "INSERT INTO `subscripted_user` (`sid`, `vehicle_no`, `vehiclename`, `vehicle_cat`, `ownername`, `phone`, `plan`, `amount`, `validity`, `sdate`) VALUES (NULL, '$vehreno', '$name', '$catename', '$ownername', '$contact', '$desc', '$amount1', '$validity', current_timestamp())");
        // $query = mysqli_query($con, "INSERT into subscripted_user(vehicle_no,vehicle_cat,vehiclename,ownername,phone,plan,amount, validity) value('$vehreno','$catename','$company','$name','$ownername','$contact','$desc','$amount1','$validity')");
        if ($query) {
            $_SESSION['sub'] = "Subscription updated successfully ...";
            header('location: module.php');
            // echo "<script>window.location.href = 'dashboard.php'</script>";
        } else {
            echo "<script>alert('Something Went Wrong');</script>";
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


        <title>Subscription-Module</title>
    </head>

    <body class="c1">

        <?php
        $page = "dashboard";
        include 'sidebar1.php'
        ?>


        <div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">
            <div class="col-lg-12 mx-auto">
                <h1 class="page-header text-center mb-3"> Update-Subscription</h1>
            </div>

            <!--/.row-->
            <div class="container">
                <h3 class=" my-4">Update Detail</h3>
                <form method="POST" class="row g-4 needs-validation" novalidate>
                    <?php
                    $vid = $_GET['updateid'];
                    $query = mysqli_query($con, "SELECT * FROM `subscripted_user` WHERE sid =$vid;");
                    $row = mysqli_fetch_array($query);
                    $id = $row['sid'];

                    ?>
                    <div class="col-md-3">
                        <label for="validationCustom02" class="form-label">Vehicle Number</label>
                        <input type="text" class="form-control" name="vehno" value="<?php echo $row['vehicle_no']; ?>" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom02" class="form-label">Vehicle Category</label>



                        <input type="text" class="form-control" name="catname" value="<?php echo $row['vehicle_cat']; ?>" readonly>

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Vehicle's Company Name</label>

                        <input type="text" class="form-control" name="company" value="<?php echo $row['vehiclename']; ?>" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom02" class="form-label">Owner's Full Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row['ownername']; ?>" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Enter Email</label>
                        <input type="email" class="form-control" name="mail" placeholder="Enter here.." required>
                        <div class="invalid-feedback">
                            Please provide a valid Number.
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <label for="validationCustom05" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" name="contact" value="<?php echo $row['phone']; ?>" readonly>
                        <div class="invalid-feedback">
                            Please provide a valid Number.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Choose Vehicle Category</label>
                        <select class="form-select" name="cat" required>
                            <?php
                            $query1 = mysqli_query($con, "SELECT * FROM subscirption WHERE sub_id IN (SELECT sub_id FROM sub_vehicle WHERE category = (SELECT vehicle_cat FROM subscripted_user WHERE sid=$id));");
                            // $query1 = mysqli_query($con, "SELECT * FROM subscirption");
                            while ($row1 = mysqli_fetch_array($query1)) {
                            ?>
                                <!-- <option selected disabled value="">Choose...</option> -->
                                <option class="text-dark" value="<?php echo  strtolower(str_replace(" ", "_", $row1['plan'])) ?>"><?php echo $row1['plan']; ?></option>

                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid category.
                        </div>
                    </div>

 
                    <div class="col-md-2">
                        <label for="validationCustom05" class="form-label">Amount
                            <input type="text" class="form-control" name="amount" id="amount" value="1" disabled>
                            <div class="amount-ref">
                                <?php $query1 = mysqli_query($con, "select * from sub_vehicle where sub_id=1");
                                while ($row1 = mysqli_fetch_array($query1)) {

                                ?>
                                    <option class="text-dark" value="<?php echo  strtolower(str_replace(" ", "_", $row1['sub_id'])) ?>"><?php echo $row1['amount']; ?></option>


                                <?php } ?>
                            </div>
                        </label>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div> 

                    <div class="col-md-2">
                        <label for="validationCustom05" class="form-label">Validity
                            <input type="text" class="form-control" name="validity" id="validity" value="1" disabled>
                            <div class="validity-ref">
                                <?php $query1 = mysqli_query($con, "select * from subscirption");
                                while ($row1 = mysqli_fetch_array($query1)) {
                                ?>
                                    <!-- <option selected disabled value="">Choose...</option> -->
                                    <div data-label="<?php echo strtolower(str_replace(" ", "_", $row1['plan'])) ?>" data-value="<?php echo $row1['validity'] ?>">
                                    </div>

                                <?php } ?>
                            </div>
                        </label>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>





                    <div class="col-12">
                        <button class="btn btn-success" name="submit-detail" type="submit">Submit</button>
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
        document.querySelector('[name="cat"]').addEventListener('change', (e) => {
            let value = document.querySelector(`.validity-ref [data-label='${e.target.value}']`).dataset.value
            document.querySelector('[name="validity"]').value = value
            console.log(value)
        })
    </script>

    </html>








<?php }  ?>