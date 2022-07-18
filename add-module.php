<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
	header('location:logout.php');
} else {
    if (isset($_POST['add-sub'])) {
        $desc = $_POST['desc'];
        // $amount = $_POST['amount'];
        $date = $_POST['date'];

        $ret = mysqli_query($con, "SELECT * FROM `subscirption` WHERE plan='$desc';");

        $count = mysqli_num_rows($ret);

        if ($count > 0) {
            $msg1 = "Module is already exists..";
        } else {
    
        // $query = mysqli_query($con, "INSERT INTO `subscirption` (`sub_id`, `plan`, `amount`, `validity`) VALUES (NULL, '', '3330', '3 year');");
        $query = mysqli_query($con, "INSERT into `subscirption` (plan,validity) values ('$desc','$date');");
        if ($query) {
          $msg = "Module has been added";
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


    <title>Add-Module</title>
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
          <?php if ($msg1)
            echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
  ' . $msg1 . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'
?>    
        <h3 class=" my-4">Add New Module</h3>
        <form method="POST" class="row g-4 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Description</label>
                <input type="text" class="form-control" name="desc" id="desc" placeholder="desc.." required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <!-- <div class="col-md-3">
                <label for="validationCustom02" class="form-label">Amount</label>
                <input type="number" class="form-control" name="amount" id="amount" placeholder="123" maxlength="10" pattern="[0-9]{10}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div> -->
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Expired On <u>(Fill Date as 12 Months format)</u></label>
                <input type="text" class="form-control" name="date" id="date" placeholder="4 Months." required>
                <div class="invalid-feedback">
                    Please provide a valid pattern.
                </div>
            </div>
            
           
          
            <div class="col-12">
                <button class="btn btn-success" name="add-sub" type="submit">Add Module</button>
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