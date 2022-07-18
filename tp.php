<?php
$host_name = 'www.google.com';
$port_no = '80';

$st = (bool)@fsockopen($host_name, $port_no, $err_no, $err_str, 10);
if ($st) {
    
session_start();
error_reporting(0);
include('includes/dbconn.php');

if ($_SESSION["locked"]) {
  $diff = time() - $_SESSION["locked"];
  if ($diff > 10) {
    unset($_SESSION["locked"]);
    unset($_SESSION["login-attemp"]);
  }
}

if (isset($_POST['login'])) {
  $adminuser = $_POST['username'];
  $password = md5($_POST['password']);

  $sdate = date("Y-m-d", strtotime("yesterday"));
	$date = date_create($sdate);
	date_modify($date, "+ $cdate");
	$date5 = date_format($date, "Y-m-d");
  $del = mysqli_query($con, "delete from  vehicle_info where cdate='$sdate' and Status='req';");
  $up = mysqli_query($con, "update subscripted_user set status='deleted' where edate='$sdate'");

  $sub_user_log = mysqli_query($con, "delete from sub_user_log where payment_status='pending' && cdate='$sdate'");

  $query = mysqli_query($con, "SELECT ID from admin where  UserName='$adminuser' && Password='$password' ");
  $ret = mysqli_fetch_array($query);
  $query1 = mysqli_query($con, "SELECT `uid` from user where  username='$adminuser' && password='$password' ");
  $ret1 = mysqli_fetch_array($query1);
  echo $ret;
  if ($ret > 0) {
    $_SESSION['vpmsaid'] = $ret['ID'];
    header('location:1024');
  } else if ($ret1 > 0) {
    $_SESSION['user'] = $ret1['uid'];
    header('location:user/8548');
  } else {
    $_SESSION["login-attemp"] += 1;
    $msg = "Incorrect username or password..";
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
      max-width: 1200vh;
      flex-wrap: wrap;
      z-index: 1;
      /* border: 2px solid red; */
      height: 700px;

    }


    .jumbotron {
      width: 65%;
      height: 97%;
      margin-left: 40px;
      margin-top: 25px;
      background-color: white;
      border-radius: 20px;
    }

    form {
      width: 80%;
      height: 75%;
      margin-top: 60px;
      /* float: right; */
    }

    img {
      margin-left: 20px;
      height: 550px;
    }

    /* .button {
      float: right;
    } */

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
  <div class="main">


    <div class="container">
      <div class="jumbotron bg-white round-4">

        <div class="row">
          <div class="col">

            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-teenage-boy_183364-81184.jpg?w=740" width="500" height="570" class="img-responsive" alt="Icon">
          </div>
          <div class="col">

            <form method="post">
              <h2>Modern College of Shivajinagar-411015</h2>
              <h4 class="mt-4">Login</h4>
              <p class="fs-6">Welcome back! Please login to your account.</p>

              <?php if ($msg)
                echo '<div class="alert alert-danger d-flex p-3 alert-dismissible fade show" style="height:55px; width:350px" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>
              ' . $msg . '
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>' ?>





              <form class="row g-4 needs-validation" novalidate>
                <div class="col-md-10">
                  <label for="validationCustom02" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="validationCustom02" placeholder="name@example.com" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-10 my-3">
                  <label for="validationCustom02" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="validationCustom02" placeholder="Enter here" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <a href="forgot-password.php" class="link-primary">forget password?</a><br>
                <?php if ($_SESSION["login-attemp"] > 2) {
                  $_SESSION["locked"] = time();
                  echo '<div class="primary fs-5" style="color:red";>You are locked for <span id="timer"></span> Sec</div>';
                } else { ?>
                  <button type="submit" name="login" class="btn btn-dark mt-4 button">LogIn</button>
                  <a class="text-light" href="user/5024"><button type="button" class="btn btn-success mt-4 ml-2"> Signup User</button></a>
                <?php  } ?>
              </form>

          </div>
          <!---------------------------- cokkies part start ------------------------------------>

          <div class="mt-3">
            <style>
              .wrapper.hide {
                opacity: 0;
                pointer-events: none;
                transform: scale(0.8);
                transition: all 0.3s ease;
              }
            </style>
            <div class="wrapper alert alert-dark alert-dismissible fade show d-flex flex-row p-1 " style="border-radius:20px ;background:#1dd1a1;margin-left:50px;height:78px ; width:900px">
              <!-- <img src="cookie.png" alt="" width="100px" > -->

              <div class="content text-center flex ml-3 " style="margin-left:50px;">

                <header class="fs-5">Cookies Consent</header>
                <div class="d-flex flex-row " style="margin-right:10px;width:860px">
                  <p>This website use cookies to ensure you get the best experience on website.</p>
                  <div class="buttons" style="margin-bottom: 50px;">
                    <button class="item btn btn-outline-dark mb-2" style="margin-bottom: 50px;">I understand</button>
                    <a href="#" class="item" style="color:black">Learn more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>


    </div>

  </div>
  <script>
    const cookieBox = document.querySelector(".wrapper"),
      acceptBtn = cookieBox.querySelector("button");

    acceptBtn.onclick = () => {
      //setting cookie for 1 month, after one month it'll be expired automatically
      document.cookie = "CookieBy=VehicalSystem; max-age=" + 60 * 60 * 24 * 30;
      if (document.cookie) { //if cookie is set
        cookieBox.classList.add("hide"); //hide cookie box
      } else { //if cookie not set then alert an error
        alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
      }
    }
    let checkCookie = document.cookie.indexOf("CookieBy=VehicalSystem"); //checking our cookie
    //if cookie is set then hide the cookie box else show it
    checkCookie != -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");
  </script>




  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  <script>
    let timerOn = true;

    function timer(remaining) {
      var m = Math.floor(remaining / 60);
      var s = remaining % 60;

      //   m = m < 10 ? '0' + m : m;
      s = s < 10 ? s : s;
      document.getElementById('timer').innerHTML = s;
      remaining -= 1;

      if (remaining >= 0 && timerOn) {
        setTimeout(function() {
          timer(remaining);
        }, 1000);
        return;
      }

      if (!timerOn) {
        // Do validate stuff here
        return;
      }

      // Do timeout stuff here
      alert('Now you can log in again ');
      window.location.replace('index.php');
    }

    timer(10);
  </script>



</body>

</html>
<?php

} else {
    include('tp1.php');
    
}
?>