<?php
session_start();
error_reporting(0);

if($con=mysqli_connect("localhost", "root", "", "vehicle-parking-db")){
	echo"1";
} else {
	echo"0";
}
// include('../includes/dbconn.php');

if (isset($_POST['signup'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $firstname = mysqli_real_escape_string($con,$_POST['first']);
    $lastname = mysqli_real_escape_string($con,$_POST['last']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $adhar_no=mysqli_real_escape_string($con,$_POST['adhar_no']);
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
            $hash = md5($pass);
            // $hash = md5($pass);
            $sql = "INSERT INTO `user` (`username`, `firstname`, `lastname`,`phone`,`address`,`adhar_no`,`password`,`time`) VALUES ('$email', '$firstname','$lastname','$phone','$address','$adhar_no','$hash', current_timestamp())";
            // $sql = INSERT INTO `user` (`uid`, `username`, `firstname`, `lastname`, `phone`, `address`, `password`, `time`) VALUES (NULL, 'bunny@gmail.com', 'manthan', 'udamale', '1414141414', 'jsdfsjdfsjsdjvbfjbfjb', 'Man', current_timestamp());
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "send";
                // $showAlert = true;
                // header("location: dashboard1.php");
                // exit();
				header("location: ../index.php");
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




<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../includes/style0.js"></script>


<style type="text/css">
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

    }
	#otpdiv{

		display: none;
	}
	#verifyotp{

		display: none;
	}
	#resend_otp{
		display: none;
	}

	.countdown{
		display: table;
		width: 100%;
		text-align: left;
		font-size: 15px;

	}

	.jumbotron {
            width: 800px;
            height: 650px;
            background-color: white;
            border-radius: 20px;
        }
	#resend_otp:hover{

		text-decoration:underline;
		

	}
</style>
</head>
<body>

		<!--html part start-->
		<div class="container ">
			<!-- <div class="row"> -->
				<div  class="jumbotron">
					<div class="otp_msg mt-1"></div>
					<h1 class="text-danger text-center mb-2">Signup User</h1>
					

					
			<form method="post" class="row g-3 needs-validation mx-4" novalidate>
				<div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@gmail.+com" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
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
                <div class="col-md-4 ">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <input type="text" name="last" class="form-control" id="validationCustom02" placeholder="Lastname" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div> 
			  <div class="form-group mt-3 ml-3">
			    <label for="mobile">Enter Mobile Number</label>
			    <input type="text" class="form-control" id="mob" name="phone"  placeholder="Enter mobile" required>
			   
			  </div>
			  <div class="form-group mt-3 ml-2" id="otpdiv">
			    <label for="otp verification">Enter OTP</label>
			    <input type="text" class="form-control" id="otp" maxlength="10" pattern="[0-9]+" placeholder="Enter OTP">
			    <br>
			    <div class="countdown ml-3"></div>
				<a href="#" class="ml-5" id="resend_otp" type="button">Resend</a>
			  </div>
			 
			  <button type="button" id="sendotp" class="btn btn-primary mt-5 ml-2" style="width: 100px; height:40px">Send OTP</button>
			  <button type="button" id="verifyotp" class="btn btn-primary mt-5 ml-2" style="width: 100px; height:40px">Verify OTP</button>

			  <div class="col-md-8">
                    <label for="validationCustom03" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please provide a valid Address.
                    </div>
                </div>
				<div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Adhar Number</label>
                    <input type="int" name="adhar_no" pattern="[0-9]{4}"  placeholder="only first 4 digit" class="form-control" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Confirm Password</label>
                    <input type="password" name="cpass" class="form-control" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

				<div class="col-md-6 mt-2">
                    <button class="btn btn-primary" name="signup" type="submit">Submit form</button>
                </div>
				</form>
				<div class="col-md-6  " >
            <a href="../"><button type="submit" class="btn btn-dark back " style="margin-left: 600px;">Back</button></a>
        </div>
			  
			
				</div>

				<div class="col-6 ml-2">
					
				</div>
			<!-- </div> -->

			
		</div>

		<!-- html part ends-->

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
										// window.location.replace('index.php');
																				
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


			// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
			
		</script>
		 <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        
    </script>
</body>
</html>