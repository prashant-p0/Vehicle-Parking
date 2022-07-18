<?php
    session_start();
    include('includes/dbconn.php');
    error_reporting(0);

    if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
    } else {
    
    if(isset($_POST['change-password'])){
        $adminid=$_SESSION['vpmsaid'];
        $cpassword=md5($_POST['currentpassword']);
        $newpassword=md5($_POST['newpassword']);
        $query=mysqli_query($con,"SELECT ID from admin where ID='$adminid' and   Password='$cpassword'");
        $row=mysqli_fetch_array($query);

        if($row>0){
            $ret=mysqli_query($con,"update admin set Password='$newpassword' where ID='$adminid'");
            $msg= "Your password has updated successfully .."; 
        } else {
        $msg="Current password is wrong"; }
    } 
?>















<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="includes/body.css">
		<script src="includes/style0.js"></script>


	<title>Change-Password</title>
	<style>
		.center{
			margin-left:  300px;
			margin-top: 20px;
		}
		
	</style>
</head>

<body class="c1">
	<?php
		include 'includes/sidebar.php'
		?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12 mx-auto">
				<h1 class="page-header text-center mb-3">Change-Password</h1>

				<?php if($msg)
					echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
					<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
					  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					</symbol>
								  <div class="alert alert-success d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
					<div> ' . $msg . '
					 </div>
					</div>' ?>
			</div>
		</div>
		<div class="panel panel-default">

			<div class="panel-body">

				<div class="col-md-12 center">

					

					<form method="POST">
						
						<div class="form-group ">

							<?php
							$adminid=$_SESSION['vpmsaid'];
							$ret=mysqli_query($con,"SELECT * from admin where ID='$adminid'");
							$cnt=1;
							while ($row=mysqli_fetch_array($ret)) {

							?> 
							<div class="col-lg-6">
								<label>Existing Password</label>
								<input type="password" class="form-control mt-2" name="currentpassword" required>
							</div>
						</div>


						<div class="col-lg-6 my-3">
							<div class="form-group">
								<label>New Password</label>
								<input type="password" class="form-control mt-2" name="newpassword" required>
							</div>
						</div>


						<div class="col-lg-6">
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" class="form-control mt-2" name="confirmpassword" required>
							</div>
						</div>

				
						<button type="submit" class="btn btn-success mt-3" name="change-password">Change Password</button>
				


					
				
							<?php } ?>
						</form>
					</div> <!--  col-md-12 ends -->
			</div>
		</div>
	</div>
	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php }  ?>