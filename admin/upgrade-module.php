<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if(isset($_POST['update-module'])) {
		$desc=$_POST['desc'];
		// $amount=$_POST['amount'];
		$time=$_POST['time'];
		$sid=$_POST['id'];
		
			
		$query=mysqli_query($con, "UPDATE `subscirption` SET `plan`='$desc',`validity`='$time' WHERE `subscirption`.`sub_id` = $sid;");
		if ($query) {
			$msg = "Module has been updated...";
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


        <title>Update-Module</title>
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

            <h3 class=" my-4">Update Module</h3>
            <form method="POST" class="row g-4 needs-validation" novalidate>
                <?php
                $id = $_GET['subid'];
                $ret = mysqli_query($con, "SELECT * FROM subscirption WHERE sub_id=$id");

                while ($row = mysqli_fetch_array($ret)) {
                    $desc = $row['plan'];
                    // $amount = $row['amount'];
                    $time = $row['validity'];
                    echo '
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Description</label>
                <input type="text" class="form-control" name="desc" id="desc" value="' . $desc . '" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            
            <div class="col-md-5">
                <label for="validationCustom03" class="form-label">Time</label>
                <input type="text" class="form-control" name="time" id="time" value="' . $time . '" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            
            <input type="hidden" id="id" name="id" value="'.$id.'">
          
            <div class="col-12">
                <button class="btn btn-success" name="update-module" type="submit">Update Module</button>
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