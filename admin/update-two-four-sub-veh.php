<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if(isset($_POST['update-amount'])) {
		$amount=$_POST['amount'];
		$sid=$_POST['id'];
		
			
		$query=mysqli_query($con, "UPDATE `sub_vehicle` SET `amount` = '$amount' WHERE `sub_vehicle`.`sub_veh_id` = $sid;");
		if ($query) {
			$msg = "Amount has been updated...";
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
        <link rel="stylesheet" href="includes/body.css">
  <script src="includes/style0.js"></script>


        <title>Update</title>
    </head>

    <body class="c1">

        <?php
        $page = "dashboard";
        include 'includes/sidebar.php'
        ?>

        <div class="container">
            <h2 class="text-center mt-4">Settings</h2>

            <?php if ($msg)
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
  ' . $msg . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'
?>         

            <h3 class=" my-4">Update Amount</h3>
            <form method="POST" class="row g-4 needs-validation" novalidate>
                
                <?php
                $id = $_GET['sub'];
                $ret = mysqli_query($con, "SELECT * FROM sub_vehicle WHERE sub_veh_id=$id");

                while ($row = mysqli_fetch_array($ret)) {
                    $id1 = $row['sub_veh_id'];
                    $cat = $row['category'];
                    $amount = $row['amount'];
                    echo '
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Description</label>
                <input type="text" class="form-control" name="desc" id="desc" value="' . $cat . '" readonly>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
           
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Amount</label>
                <input type="text" class="form-control" name="amount" id="amount" value="' . $amount . '" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            
            <input type="hidden" id="id" name="id" value="'.$id1.'">
          
            <div class="col-12">
                <button class="btn btn-success" name="update-amount" type="submit">Update Module</button>
            </div> </form>';
                }
                ?>

           
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