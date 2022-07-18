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
    if (isset($_POST['feedback'])) {

        $feedback = $_POST['feed'];
        $sug = $_POST['sug'];
        $rate = $_POST['rate'];
        $name = "bunny";


        $user = $_SESSION['user'];
        $phone_query = mysqli_query($con, "select * from user WHERE uid = $user");
        $row = mysqli_fetch_array($phone_query);
        $user_phone = $row['phone'];
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        
        $fullname= $fname." ".$lname;
        

        // $query = mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,`Status`,`uid`) value('$parkingnumber','$catname','$company','$vehicleno','$ownername','$user_phone','$request','$user')");
        $query = mysqli_query($con, "INSERT into feedback(name,phone,`feedbacks`,suggestion,Rate_Us) value('$fullname','$user_phone','$feedback','$sug','$rate')");
        if ($query) {
            // header('location:preview');
            $msg = "Your feeback has been submitted";
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
        <link rel="stylesheet" href="../includes/body.css">
  <script src="../includes/style0.js"></script>


        <title>Feedback</title>

    </head>
    

    <body class="c1">

        <?php
        $page = "dashboard";
        include 'sidebar1.php'
        ?>
        <div class="container col-md-4">
            <h2 class="text-center mt-4 text-capitalize">Feedback</h2>
            <?php if ($msg)
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
					<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
					  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					</symbol>
								  <div class="alert alert-success d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
					<div> ' . $msg . '
					 </div>
                     <button type="button" class="btn-close float-end" style="margin-left: 120px;" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>' ?>







            <form method="POST" class="row g-4 needs-validation" novalidate>


                <div class="form-group mb-1 mt-4">
                    <label for="exampleFormcontrolTextarea2">Feedback</label>
                    <textarea class="form-control mt-2" id="feed" name="feed" rows="5" pattern="[A-Za-z ]+" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormcontrolTextarea1">Suggetions</label>
                    <textarea class="form-control mt-2" id="sug" name="sug" rows="5" pattern="[A-Za-z ]+" required></textarea>
                </div>

                <div class="form-group">
                    <label for="validationCustom04" class="form-label">Rate Us</label>
                    <select class="form-select" id="vehicle_cat" name="rate" required>

                        <option value="very Satisfied">very Satisfied</option>
                        <option value="Satisfied">Satisfied</option>
                        <option value="Neutral">Neutral</option>
                        <option value="UnSatisfied">UnSatisfied</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid category.
                    </div>
                </div>

                <div class="col-md-12">

                    <button type="submit" name="feedback" class="btn btn-success col-sn-3 py-2 mb-5">Submit</button>


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