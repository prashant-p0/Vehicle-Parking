<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (isset($_POST['login'])) {
  $adminuser = $_POST['username'];
  $password = md5($_POST['password']);
  $query = mysqli_query($con, "SELECT ID from admin where  UserName='$adminuser' && Password='$password' ");
  $ret = mysqli_fetch_array($query);
  if ($ret > 0) {
    $_SESSION['vpmsaid'] = $ret['ID'];
    header('location:dashboard.php');
  } else {
    $msg = "Incorrect username or password!";
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


  <title>Login</title>
  <style>
    body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #161623;
}
    body::before{
    content: '';
    position: absolute;
    /* top: 0;
    left: 0; */
    width: 100%;
    height: 100%;
    background: linear-gradient(#f00,#f0f);
    clip-path: circle(50% at right 80%);
}

body::after{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#2196f3,#e91e63);
    clip-path: circle(30% at 10% 10%);
}

.container{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1200vh;
    flex-wrap: wrap;
    z-index: 1;

}


    .jumbotron {
      width: 65%;
      height: 75%;
      margin-left: 40px;
      margin-top: 25px;
      background-color: white;
      border-radius: 20px;
    }

    form {
      width: 65%;
      height: 55%;
      margin-top: 60px;
      /* float: right; */
    }

    img {
      margin-left: 20px;
    }

    .button {
      float: right;
    }

    h2 {
      background-image: linear-gradient(to left, violet, indigo, green, blue, purple, orange, red);
      -webkit-background-clip: text;
      -moz-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    .row {
      height: 600px;
    }
  </style>
</head>

<body>
  <!-- <h1>Hello, world!</h1> -->

  <div class="container">
  <div class="jumbotron">

    <div class="row">
      <div class="col">

        <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-teenage-boy_183364-81184.jpg?w=740" width="500" height="570" class="img-responsive" alt="Icon">
      </div>
      <div class="col">

        <form method="post" >
          <h2>Modern College of Shivajinagar-411015</h2>
          <h4 class="mt-4">Login</h4>
          <p class="fs-6">Welcome back! Please login to your account.</p>

          <?php if ($msg)
            echo '<div class="alert alert-danger d-flex p-3 alert-dismissible fade show" style="height:55px; width:355px" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>
              ' . $msg . '
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>' ?>





<div class="form-floating my-3">
              <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com" >
              <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div><br>
            <a href="forgot-password.php" class="link-primary mt-4">forget password?</a><br>
            <a href="dashboard1.php" class="link-primary mt-4">forget password?</a><br>
            <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp User</button>';

          
            <button type="submit" name="login" class="btn btn-dark mt-4 button">Submit</button>
          </form>
      </div>
      <!-- <form class="container-fluid justify-content-end">
        <button class="btn btn-outline-success me-2" type="button">Main button</button>
        <button class="btn btn-sm btn-outline-secondary" type="button">Smaller button</button>
      </form> -->
      <?php include 'signupmodal.php'; ?>
    </div>
  </div>


  </div>

  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
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

</body>

</html>