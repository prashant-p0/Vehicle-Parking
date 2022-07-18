<!-- Modal -->

<?php
session_start();
error_reporting(0);
$user_id = $_SESSION['user'];

if (strlen($_SESSION['user'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['update'])) {
        $sid =$_GET['sid'];
        $vehiclename = $_POST['vehiclename'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

		$query = mysqli_query($con,  "DELETE from subscripted_user  where sid='$sid'");
		if ($query) {
			$msg = "All remarks has been updated.";
		} else {
			$msg = "Something Went Wrong";
		}
	}
?>
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="signupModalLabel">Delete Module</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/bunny/php/forum/partials/_handleSignup.php" method="POST">
            <h2 class="modal-title  text-center">Are you sure?</h2>
            <div class="mx-auto" style=" width:250px">
                <p class="text-center mx-auto">This is going to be permanently 
                delete, Are you sure?</p>
            </div>
            
            <div class="alert alert-danger d-flex p-3 alert-dismissible fade show  mb-3" style="height:90px; width:390px ; margin-left:50px" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="40" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <p>Buy deleting this Subscription, Money will not refunded !</p>
            </div>
            <?php

                    $ret = mysqli_query($con, "SELECT * from  subscripted_user s INNER JOIN user u ON s.phone=u.phone WHERE u.uid=$user and status!='deleted';");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {

                    ?>

            <button type="button" class=" btn btn-outline-dark mt-4" style="margin-left:90px; margin-bottom :20px; width:100px"  data-bs-dismiss="modal">Cancel</button>
            <a href="delete.php?sid=<?php echo $row['sid']; ?>">
        <button type="button" name="update" class="btn btn-danger mt-4" style="width: 170px; margin-left:20px; margin-bottom :20px;">Yes,Delete</button> </a>

        <?php
                    } ?>
            </form>
        </div>
    </div>
</div>
<?php } ?>