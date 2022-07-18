<?php
session_start();
error_reporting(0);
if(include('../includes/dbconn.php')){
    // echo" hi";
}
else{
    // echo "0";
}

// error_reporting(0);
if (strlen($_SESSION['user'] == 0)) {
    header('location:../logout.php');
} else {
    if (isset($_POST['sub'])) {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];
        $user1 = $_POST['user'];


        // $query = mysqli_query($con, "INSERT into contact(email,phone,description,uid) value('$email','$phone','$desc','$user1)");
        $query = mysqli_query($con, "INSERT INTO `contact` (`cid`, `email`, `phone`, `description`, `uid`) VALUES (NULL, '$email', '$phone', '$desc', '$user1');");
        if ($query) {
            $msg = "Your request has been submitted";
        } else {
            $msg = "Something Went Wrong";
        }
    } ?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../includes/body.css">
  <script src="../includes/style0.js"></script>


        <title>Contact</title>
        <style>
            .container {
                min-height: 80vh;
            }
        </style>
    </head>

    <body class="c1">

        <?php
        $page = "dashboard";
        include 'sidebar1.php';
         $user = $_SESSION['user'];
        ?>

        <div class="container mb-4 col-md-4">
            <center>
                <h1 class="text-center mt-4"><u>Contact Us</u></h1>
                <?php if($msg)
					echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
					<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
					  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					</symbol>
								  <div class="alert alert-success d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
					<div> ' . $msg . '
					 </div>
                     <button type="button" class="btn-close float-end" style="margin-left: 120px;" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>' ?>
                <form method="POST">
                    <div class="mb-3 mt-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text mr-0">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contact No</label>
                        <input type="tel" class="form-control" name="phone" id="phone" maxlength="10" pattern="[0-9]{10}" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormcontrolTextarea1">Elaborate Your Concern</label>
                        <textarea class="form-control" id="desc" name="desc" rows="5" pattern="[A-Za-z ]+" required></textarea>
                    </div>
                    <input type="hidden" id="user" name="user" value="<?php echo $user ?>">

                    <button type="submit" name="sub" class="btn btn-success col-md-3 py-2 mb-5">Submit</button>
                </form>
            </center>
        </div>




        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </body>

    </html>

<?php } ?>