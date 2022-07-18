<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost", "root", "", "vehicle-parking-db");
// include('../includes/dbconn.php');

if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pass = md5($_POST['pass']);
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




<!DOCTYPE html>
<html>
<head>
	<title>otp verification</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../includes/style0.js"></script>


<style type="text/css">
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

	#resend_otp:hover{

		text-decoration:underline;
		

	}
</style>
</head>
<body>

		<!--html part start-->
		<div class="container p-3 my-3 border">
			<div class="row">
				<div  class="col-6 border border-success p-4 ml-2">
					<div class="otp_msg"></div>
					<h1 class="text-danger text-center">OTP VERIFICATION</h1>
			<form method="post">
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
			  <div class="form-group">
			    <label for="mobile">Enter Mobile Number</label>
			    <input type="text" class="form-control" id="mob"  placeholder="Enter mobile">
			   
			  </div>
			  <div class="form-group" id="otpdiv">
			    <label for="otp verification">Enter OTP</label>
			    <input type="text" class="form-control" id="otp" placeholder="Enter OTP">
			    <br>
			    <div class="countdown"></div>
				<a href="#" id="resend_otp" type="button">Resend</a>
			  </div>
			 
			  <button type="button" id="sendotp" class="btn btn-primary">Send OTP</button>
			  <button type="button" id="verifyotp" class="btn btn-primary">Verify OTP</button>
			   <div class="col-12">
                    <button class="btn btn-primary" name="signup" type="submit">Submit form</button>
                </div>
			</form>
				</div>

				<div class="col-6 ml-2">
					
				</div>
			</div>

			
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
</body>
</html>