<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (isset($_POST['reset'])) {
  $secode = $_POST['secode'];
  $email = $_POST['email'];

  $query = mysqli_query($con, "SELECT ID from admin where  Email='$email' and Security_Code='$secode' ");
  $ret = mysqli_fetch_array($query);
  if ($ret > 0) {
    // $_SESSION['secode'] = $secode;
    $_SESSION['username'] = $username;
    header('location:resetpw.php');
  } else {
    $msg = "Invalid Details. Please again.";
  }
}

if (isset($_POST['userreset'])) {
    $adhar_no = $_POST['adhar_no'];
    $username = $_POST['username'];
  
    $query = mysqli_query($con, "SELECT uid from user where  username='$username' and adhar_no='$adhar_no' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
    //   $_SESSION['secode'] = $secode;
      $_SESSION['username'] = $username;
      header('location:resetpw1.php');
    } else {
      $msg = "Invalid Details. Please try again.";
    }
  }
?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Password Recovery</title>
    <link rel="stylesheet" href="forgot.css">
  <script src="includes/style0.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: black;">
    <div class="wrapper" >
        <div class="title-text">
            <div class="title login">
            Password Recovery For
            </div>
            <div class="title signup">
            Password Recovery For
            </div>
        </div>
        <?php if ($msg)
        echo '<div class="alert alert-danger d-flex  alert-dismissible fade show mx-3" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
          '.$msg.'
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>' ?>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">user</label>
                <label for="signup" class="slide signup">admin</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form method="post" class="login">
                    <!-- <h4 class="pt-4 text-center">Password Recovery</h4> -->
                    <!-- <div class="form-floating my-3 ">
                        <input type="text" class="form-control" name="secode" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Security Code</label>
                    </div> -->
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" name="username" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">username</label>
                    </div>
                    <div class="form-floating  ">
                        <input type="text" class="form-control" name="adhar_no" id="floatingInput"  placeholder="only first 4 digit" required>
                        <label for="floatingInput">Adhar Number</label>
                    </div><br>
                    <!-- <a href="forgot-password.php" class="link-secondary mt-4">forget password?</a><br> -->

                    <button type="submit" name="userreset" class="btn btn-success button">Proceed</button>
                </form>
                <form method="post">
                    <!-- <h4 class="pt-4 text-center">Password Recovery</h4> -->
                    <div class="form-floating my-3 ">
                        <input type="text" class="form-control" name="secode" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Security Code</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Email address</label>
                    </div><br>
                    <!-- <a href="forgot-password.php" class="link-secondary mt-4">forget password?</a><br> -->

                    <button type="submit" name="reset" class="btn btn-success button">Proceed</button>
                </form>


            </div>
            <a href="index"><button type="submit" name="login" class="btn btn-dark" style="margin-left: 350px;">Back</button></a>

        </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });

        $(document).ready(function(){


function validate_mobile(mob){

    var pattern =  /^[6-9]\d{9}$/;

    if (mob == '') {

        return false;
    }else if (!pattern.test(mob)) {

        return false;
    }else{

        return true;
    }
}


//send otp function
function send_otp(mob){

        var ch = "send_otp";
            
            $.ajax({

            url: "otp_process.php",
            method: "post",
            data: {mob:mob,ch:ch},
            dataType: "text",
            success: function(data){

                if (data == 'success') {

                    $('#otpdiv').css("display","block");
                    $('#sendotp').css("display","none");
                    $('#verifyotp').css("display","block");
                    
                        timer();
                    $('.otp_msg').html('<div class="alert alert-success">OTP sent successfully</div>').fadeIn();
                        
                        window.setTimeout(function(){
                        $('.otp_msg').fadeOut();
                    },1000)
                        

                }else{

                    $('.otp_msg').html('<div class="alert alert-danger">Error in sending OTP</div>').fadeIn();
                        
                        window.setTimeout(function(){
                        $('.otp_msg').fadeOut();
                    },1000)
                
                }
            }

        });
}
//end of send otp function


//send otp function

$('#sendotp').click(function(){

    var mob = $('#mob').val();

    

        if (validate_mobile(mob) == false) 
        $('.otp_msg').html('<div class="alert alert-danger">Enter Valid mobile number</div>').fadeIn(); else 	send_otp(mob);

        window.setTimeout(function(){
            $('.otp_msg').fadeOut();
        },1000)
        

            


    });

//end of send otp function


//resend otp function
$('#resend_otp').click(function(){

    var mob = $('#mob').val();
    
    send_otp(mob);
        $(this).hide();
});
//end of resend otp function


//verify otp function starts

$('#verifyotp').click(function(){

        
        var ch = "verify_otp";
        var otp = $('#otp').val();

        $.ajax({

            url: "otp_process.php",
            method: "post",
            data: {otp:otp,ch:ch},
            dataType: "text",
            success: function(data){

                    if (data == "success") {

                        $('.otp_msg').html('<div class="alert alert-success">OTP Verified successfully</div>').show().fadeOut(4000);
                         window.location.replace('index.php');
                                                                
                    }else{

                        $('.otp_msg').html('<div class="alert alert-danger">otp did not match</div>').show().fadeOut(4000);
                    }
            }
        });
                

});

//end of verify otp function


//start of timer function

function timer(){

    var timer2 = "00:31";
    var interval = setInterval(function() {


      var timer = timer2.split(':');
      //by parsing integer, I avoid all extra string processing
      var minutes = parseInt(timer[0], 10);
      var seconds = parseInt(timer[1], 10);
      --seconds;
      minutes = (seconds < 0) ? --minutes : minutes;
      
      seconds = (seconds < 0) ? 59 : seconds;
      seconds = (seconds < 10) ? '0' + seconds : seconds;
      //minutes = (minutes < 10) ?  minutes : minutes;
      $('.countdown').html("Resend otp in:  <b class='text-primary'>"+ minutes + ':' + seconds + " seconds </b>");
      //if (minutes < 0) clearInterval(interval);
      if ((seconds <= 0) && (minutes <= 0)){
          clearInterval(interval);
          $('.countdown').html('');
          $('#resend_otp').css("display","block");
      } 
      timer2 = minutes + ':' + seconds;
    }, 1000);

}

//end of timer


});


    </script>
    
</body>

</html>