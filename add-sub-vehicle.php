<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['add-sub-vehicle'])) {
        $plan = $_POST['plan'];
        $catname = $_POST['catename'];
        $amount = $_POST['amount'];

        $id = mysqli_query($con, "SELECT * FROM `subscirption` WHERE plan= '$plan'");
        $row = mysqli_fetch_array($id);
        $id1 = $row['sub_id'];


            $query_exists = mysqli_query($con, "SELECT * FROM `sub_vehicle` WHERE  category= '$catname' and sub_id='$id1'");
            $count = mysqli_num_rows($query_exists);

            if($count >0){
             $msg1 = "Vehicle Category Already exists...";
            }else{
            
    
            $query = mysqli_query($con, "INSERT into sub_vehicle(category,amount,sub_id) value('$catname','$amount','$id1')");
            if ($query) {
                $_SESSION['addsub'] = "Vehicle Category Added successfully...";
                    header('location:sub-vehicle-cat.php');
                // $msg = "Vehicle has been added";
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
        <link rel="stylesheet" href="includes/body.css">
  <script src="includes/style0.js"></script>


        <title>Add-Vehicle-category</title>
    </head>

    <body class="c1">

        <?php
        $page = "dashboard";
        include 'includes/sidebar.php'
        ?>

        <div class="container">
            <h2 class="text-center mt-4">Settings</h2>

            <?php if ($msg1) 
            echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
		<svg class="bi flex-shrink-0 me-2" width="30" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            ' . $msg1 . ' 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
            ?>
            
            <?php if ($msg) 
            echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
		<svg class="bi flex-shrink-0 me-2" width="30" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            ' . $msg . ' 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
            ?>
        
            <h3 class=" my-4">Add Vehicle</h3>
            <form method="POST" class="row g-4 needs-validation" novalidate>

                <div class="  col-md-3">
                    <label>Plan</label>
                    <select class="form-control mt-2" name="plan" id="plan">
                        <option value="0">Select Plan</option>
                        <?php $query = mysqli_query($con, "select * from subscirption");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option class="text-dark" value="<?php echo $row['plan']; ?>"><?php echo $row['plan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="  col-md-3">
                    <label>Vehicle Category</label>
                    <select class="form-control mt-2" name="catename" id="catename">
                        <option value="0">Select Category</option>
                        <?php $query = mysqli_query($con, "select * from vcategory");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option class="text-dark" value="<?php echo $row['VehicleCat']; ?>"><?php echo $row['VehicleCat']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="validationCustom02" class="form-label">Amount</label>
                    <input type="number" class="form-control" name="amount" id="amount" placeholder="123" maxlength="10" pattern="[0-9]{10}" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>




                <div class="col-12">
                    <button class="btn btn-success" name="add-sub-vehicle" type="submit">Add Module</button>
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




<?php }  ?>