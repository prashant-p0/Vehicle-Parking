<?php
session_start();
error_reporting(0);
// $con=mysqli_connect("localhost", "root", "", "vehicle-parking-db");
if (include('../includes/dbconn.php')) {
    // echo" hi";
} else {
    // echo "0";
}

if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $adhar_no = $_POST['adhar_no'];
    $pass = ($_POST['pass']);
    $cpass = $_POST['cpass'];


    // chect whether user exist or not
    $existsql = "SELECT * FROM `user` WHERE username = '$email' ";
    $result = mysqli_query($con, $existsql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $msg = "Email is already Exist";
    } else {
        if ($pass == $cpass) {
            // $hash = password_hash($pass, PASSWORD_DEFAULT);
            $hash = md5($pass);
            $sql = "INSERT INTO `user` (`username`, `firstname`, `lastname`,`phone`,`address`,`adhar_no`,`password`,`time`) VALUES ('$email', '$firstname','$lastname','$phone','$address','$adhar_no','$hash', current_timestamp())";
            // $sql = INSERT INTO `user` (`uid`, `username`, `firstname`, `lastname`, `phone`, `address`, `password`, `time`) VALUES (NULL, 'bunny@gmail.com', 'manthan', 'udamale', '1414141414', 'jsdfsjdfsjsdjvbfjbfjb', 'Man', current_timestamp());
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "send";
                // $showAlert = true;
                header("location: ../index.php");
                // exit();
            }
        } else {
            $msg = "Password do not matched";
        }
    }

    // $query = mysqli_query($con, "SELECT ID from admin where  Email='$email' and Security_Code='$secode' ");
    // $ret = mysqli_fetch_array($query);
    // if ($ret > 0) {
    //     $_SESSION['secode'] = $secode;
    //     $_SESSION['email'] = $email;
    //     header('location:resetpw.php');
    // } else {
    //     $msg = "Invalid Details. Please again.";
    // }
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
    <script src="../includes/style0.js"></script>

    <title>Signup-User</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #161623;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(#f00, #f0f);
            clip-path: circle(50% at right 80%);
        }

        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(#2196f3, #e91e63);
            clip-path: circle(30% at 10% 10%);
        }

        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1100vh;
            flex-wrap: wrap;
            z-index: 1;

        }


        .jumbotron {
            width: 49%;
            background-color: white;
            border-radius: 20px;
        }




        .back {
            margin-bottom: 15px;
            margin-left: 630px;
        }
    </style>
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <div class="container">
        <div class="jumbotron">
            <h4 class="pt-4 text-center">Signup User</h4>
            <?php if ($msg)
                echo '<div class="alert alert-danger d-flex p-3 alert-dismissible fade show" style="height:55px; width:700px" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <div>
              ' . $msg . '
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>' ?>

            <form method="post" class="row g-3 needs-validation mx-4" novalidate>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="validationCustomUsername" pattern="[a-z0-9._%+-]+@gmail.+com" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">First name</label>
                    <input type="text" name="first" class="form-control" id="validationCustom01" placeholder="Firstname" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <input type="text" name="last" class="form-control" id="validationCustom02" placeholder="Lastname" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Phone Number</label>
                    <input type="tel" name="phone" class="form-control" id="validationCustom01" placeholder="123-456-7890" pattern="[0-9]{10}" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="validationCustom03" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please provide a valid Address.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Adhar Number</label>
                    <input type="int" name="adhar_no" pattern="[0-9]{4}" placeholder="only first 4 digit" class="form-control" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Confirm Password</label>
                    <input type="password" name="cpass" class="form-control" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <!-- <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div> -->
                <div class="col-12">
                    <button class="btn btn-primary" name="signup" type="submit">Submit form</button>
                </div>
            </form>
            <a href="../index.php"><button type="submit" class="btn btn-dark back">Back</button></a>
        </div>
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