<?php
session_start();
error_reporting(0);
$user_id = $_SESSION['user'];

// $con = mysqli_connect("localhost", "root", "", "vehicle-parking-db");
if (include('../includes/dbconn.php')) {
    // echo" hi";
} else {
    // echo "0";
}

// include('../includes/dbconn.php');
if (strlen($_SESSION['user'] == 0)) {
    header('location:logout.php');
} else { ?>


    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../includes/body.css">
  <script src="../includes/style0.js"></script>


        <title>Setting</title>
        <style>
            .reset {
                width: 100px;
                height: 100px;
                margin-left: 130px;
                margin-top: 40px;
                margin-bottom: 40px;
            }

            .edit {
                margin-left: 60px;
                margin-top: 20px;
                margin-bottom: 40px;
                width: 120px;
                height: 130px;
                /* margin-left: 130px; */
                /* margin-bottom: 10px; */
            }

            svg {
                margin-left: 170px;
            }
          .img{
              margin-left: 80px;
          }
        </style>
    </head>

    <body class="c1" >
        <?php
        $page = "dashboard";
        include 'sidebar1.php'
        ?>

        <div class="container">
            <div class="col-sm-9 mt-4 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">


                <div class="row mt-4">
                    <div class="col-lg-12 mx-auto">
                        <h1 class="page-header text-center mb-3">Settings</h1>
                    </div>
                </div>

            </div>
            <div class="row mt-4">
                <div class="row">
                    <div class="jumbotron  col-md-4 mx-auto mt-4">
                        <img class="reset" src="../includes/img/reset.png" alt="Loading"><br>
                        <div class="d-flex">
                            <h5>Reset Password</h5>
                            <a href="25689">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">Read more icon<g fill="none" fill-rule="evenodd" stroke="#0070AD" stroke-width="2">
                                        <path class="border_svg" d="M1 18c0 9.39 7.61 17 17 17s17-7.61 17-17S27.39 1 18 1 1 8.61 1 18z"></path>
                                        <path d="M15.018 11.997l3.958 3.958 2.042 2.042-6.021 6.02"></path>
                                    </g></svg></a>
                        </div>
                    </div>
                    <?php

                    $ret = mysqli_query($con, "SELECT * FROM user where uid=$user_id ");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {

                    ?>
                        <div class="jumbotron  mx-auto col-md-4 mt-4">
                            <img class="edit" name="img"  src="../includes/img/e1.png" alt="Loading"><br>
                            <div class="d-flex">
                                <h5>Edit Profile</h5>
                                <a href="edit.php?uid=<?php echo $row['uid']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">Read more icon<g fill="none" fill-rule="evenodd" stroke="#0070AD" stroke-width="2">
                                            <path class="border_svg" d="M1 18c0 9.39 7.61 17 17 17s17-7.61 17-17S27.39 1 18 1 1 8.61 1 18z"></path>
                                            <path d="M15.018 11.997l3.958 3.958 2.042 2.042-6.021 6.02"></path>
                                        </g></svg></a>
                            </div>
                        </div>
                    <?php
                    } ?>
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
    </body>

    </html>

<?php } ?>