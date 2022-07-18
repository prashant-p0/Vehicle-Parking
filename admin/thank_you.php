<?php
session_start();
$con=mysqli_connect('localhost','root','','vehicle-parking-db');
        // $cid=$_GET['viewid'];
        $ret = mysqli_query($con, "SELECT * from  subscripted_user order by `sid` desc limit 1 ");
        while ($row = mysqli_fetch_array($ret)) { ?>


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


    <title>Payment</title>
    <style>
        body {
            display: flex;
            /* justify-content: center; */
            align-items: center;
            min-height: 100vh;
            background-color: rgb(243, 243, 243);
        }

        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
           
            z-index: 1;
        }

        .jumbotron {          
            background-color: #6dc6b3;
            border-radius: 20px;
        }
    </style>

</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <div class="container">
        <div class="row">
            <div class="jumbotron col-md-12 shadow-lg">
                <!-- <form method="post"> -->


					<h4 class="pt-4 px-3  ">Thanks For Buying Subscription!</h4>
                <h4 class="pt-2 px-3">Transcaction done Successfully.</h4>
                <!-- <img class="reset mx-auto" src="includes/img/arabica-1172.png" width="100px" height="100px" alt="Loading"><br> -->



                <!-- <ul>
    <li class="box-row d-flex flex-item-center" >
                                                    <div class="form-group p-3 fs-5 " style=" margin-left:100px">
                                                        <label style="color:white">Vehicle Number :</label>
                                                    </div>
                                                    <div class="p-2 ">
                                                        <input type="text" style="width:200px;background:#6dc6b3;color:red;border:none;font-size:22px" class="form-control" value="" id="sdesc" name="firstname" readonly>
                                                    </div>
                                                </li>
                                                <li class="box-row d-flex flex-item-center" >
                                                    <div class="form-group p-3 fs-5 " style=" margin-left:100px">
                                                        <label style="color:white">Vehicle Name :&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    </div>
                                                    <div class="p-2 ">
                                                        <input type="text" style="width:200px;background:black;color:red;border:none;font-size:22px" class="form-control" value="" id="sdesc" name="firstname" readonly>
                                                    </div>
                                                </li>
    </ul> -->
                <!-- </form> -->

                <div class="d-grid gap-2 col-2 mx-auto">
                    <a href="dashboard.php"><button type="submit" name="login"
                        class="btn btn-primary m-4 col-sm-12 mx-auto">Okay</button></a>
                  </div>
               
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

<?php     }
?>