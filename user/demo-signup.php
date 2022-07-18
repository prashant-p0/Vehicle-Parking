<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost", "root", "", "vehicle-parking-db");
// include('/includes/dbconn.php');

if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pass = ($_POST['pass']);
    $cpass = $_POST['cpass'];

    // chect whether user exist or not
    $existsql = "SELECT * FROM `user` WHERE username = '$email'";
    $result = mysqli_query($con, $existsql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $msg = "Email is already Exist";
    } else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            // $hash = md5($pass);
            $sql = "INSERT INTO `user` (`username`, `firstname`, `lastname`,`phone`,`address`,`password`,`time`) VALUES ('$email', '$firstname','$lastname','$phone','$address','$hash', current_timestamp())";
            // $sql = INSERT INTO `user` (`uid`, `username`, `firstname`, `lastname`, `phone`, `address`, `password`, `time`) VALUES (NULL, 'bunny@gmail.com', 'manthan', 'udamale', '1414141414', 'jsdfsjdfsjsdjvbfjbfjb', 'Man', current_timestamp());
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "send";
                // $showAlert = true;
                // header("location: dashboard1.php");
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
            width: 55%;
            height: 700px;
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

            <form  method="post" class="row g-3 needs-validation mx-4" novalidate>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
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
                <div class="form-group mt-3">
			    <label for="mobile">Enter Mobile Number</label>
			    <input type="text" class="form-control" id="mob"  placeholder="Enter mobile">
			   
			  </div>
			  <div class="form-group mt-3 ml-2" id="otpdiv">
			    <label for="otp verification">Enter OTP</label>
			    <input type="text" class="form-control" id="otp" placeholder="Enter OTP">
			    <br>
			    <div class="countdown ml-3"></div>
				<a href="#" id="resend_otp" type="button">Resend</a>
			  </div>
			 
			  <button type="button" id="sendotp" class="btn btn-primary mt-5 ml-2" style="width: 100px; height:40px">Send OTP</button>
			  <button type="button" id="verifyotp" class="btn btn-primary">Verify OTP</button>
			  
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
    
    	<script type="text/javascript">
			
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

					

						if (validate_mobile(mob) == false) $('.otp_msg').html('<div class="alert alert-danger" style="position:absolute">Enter Valid mobile number</div>').fadeIn(); else 	send_otp(mob);

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