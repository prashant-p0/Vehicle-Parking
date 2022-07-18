<?php
session_start();
error_reporting(0);
// $con = mysqli_connect("localhost", "root", "", "vehicle-parking-db");
if(include('../includes/dbconn.php')){
    // echo" hi";
}
else{
    // echo "0";
}

include('../includes/dbconn.php');
if (strlen($_SESSION['user'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit-vehicle'])) {
        $parkingnumber = mt_rand(10000, 99999);
        $vehicleno = $_POST['vehno'];
        $catname = $_POST['catname'];
        $company = $_POST['company'];
        $ownername = $_POST['name'];
        $contact = $_POST['contact'];
        $request = $_POST['req'];
        $user=$_SESSION['user'];
        // $amount = $_POST['amount'];
        // $valid = $_POST['valid'];
        $enteringtime = $_POST['enteringtime'];

        $query = mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,Status,uid) value('$parkingnumber','$catname','$company','$vehicleno','$ownername','$contact','$request',$user)");
        if ($query) {
            $msg = "Your request has been submitted";
        } else {
            $msg = "Something Went Wrong";
        }
    } ?>

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
   <button type="button" class="btn-close float-end" style="margin-left: 960px;" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   </div>' ?>
            <h3 class=" my-4">Entry Vehicle</h3>
            <form method="POST" class="row g-4 needs-validation" novalidate>
                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Vehicle Number</label>
                    <input type="text" class="form-control" name="vehno" pattern="[A-Z]{2}[-][0-9]{2}[-][A-Z]{2}[-][0-9]{1,4}" placeholder="MH-23-ER-123" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                <?php $query = mysqli_query($con, "select * from vcategory");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                    <label for="validationCustom04" class="form-label">Choose Vehicle Category</label>
                    <select class="form-select" id="classesPW" name="catname" required>
                    <option value="<? echo $row ['vehiclecat'];?>">two wheeler</option>
                     <option value="9">four wheeler</option>
                    </select>
                    <?php }?>
                    <div class="invalid-feedback">
                        Please select a valid category.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Vehicle's Company Name</label>
                    <input type="text" class="form-control" name="company" placeholder="Enter name" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Owner's Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter here.." required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Contact Number</label>
                    <input type="tel" class="form-control"  maxlength="10" pattern="[0-9]+" name="contact" required>
                    <div class="invalid-feedback">
                        Please provide a valid Number.
                    </div>
                </div>


                <h3>
    <span>£</span>
    <span id="pwTotal">5</span>
    <!-- <input type="text" id="pwTotal" value=""> -->
</h3>

                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Expired On</label>
                    <input type="text" class="form-control" name="valid" id="validationCustom05" value="Today" disabled>
                    <div class="invalid-feedback">
                        Please provide a valid zip.
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
                <input type="hidden" id="req" name="req" value="req">

                <div class="col-12">
                    <button class="btn btn-success" name="submit-vehicle" type="submit">Submit</button>
                </div>
            </form>
        </div>
       
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


        <script>
    let select = document.querySelector('#classesPW')
let sp = document.querySelector('#pwTotal')

select.addEventListener('change', function() {
  sp.innerHTML = select.options[select.selectedIndex].value
})
    </script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>

    </html>

<?php } ?>