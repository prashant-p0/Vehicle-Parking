

<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
	header('location:logout.php');
} else {

    if (isset($_POST['delete'])) {
        $subid = $_GET['sub_id'];
        $query = mysqli_query($con, "delete from subscirption where sub_id='$subid'");
        if ($query) {
            $_SESSION['delete'] = "Module Deleted successfully";
            header('location:delete-module.php');
        } else {
            $msg = "Something Went Wrong";
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
  <script src="includes/style0.js"></script>

        <title>Vehicle</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: #161623;
            }


            .container {
                /* position: relative; */
                /* display: flex; */
                justify-content: center;
                align-items: center;
                max-width: 1200vh;
                flex-wrap: wrap;
                z-index: 1;
                height: 700px;

            }

            .jumbotron {
                width: 39%;
                /* height: 400px; */
                margin-left: 460px;
                margin-top: 180px;
                background-color: black;
                border-radius: 20px;
                border: 1px solid red;
            }

            .form-floating {
                width: 68%;
                margin-left: 80px;
            }

            .button {
                margin-left: 85px;
                margin-bottom: 15px;

            }

            button {
                margin-bottom: 15px;
                margin-left: 100px;
            }
        </style>
    </head>


    <body>


        <div class="container" style="margin-top:10px">
            <!--             
            <div class="alert alert-warning d-flex align-items-center" style="width:720px;margin-left:320px;margin-bottom:20px" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                    <use xlink:href="#info-fill" />
                </svg>
                <div>
                    Buy deleting this Subscription, Money will be not refunded !!!
                </div>
            </div> -->

            <div class="jumbotron">

                <h1 class="panel-heading text-center mt-3 " style="color:red">Delete Module</h1>
                <div class="col-sm-12 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">




                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <div class="panel-body">

                                    <?php if ($msg)
                                        echo "<div class='alert bg-info ' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?>

                                    <div class="col-md-12">


                                        <form method="POST">


                                            <?php
                                            $subid = $_GET['sub_id'];
                                            $ret = mysqli_query($con, "SELECT * FROM subscirption where sub_id='$subid'");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret)) {

                                            ?>

                                                <ul>
                                                <li class="box-row d-flex flex-item-center" >
                                                    <div class="form-group p-3 fs-5 " style=" margin-left:100px">
                                                        <label style="color:white">Plan &nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    </div>
                                                    <div class="p-2 ">
                                                        <input type="text" style="width:200px;background:black;color:red;border:none;font-size:22px" class="form-control" value="<?php echo $row['plan']; ?>" id="sdesc" name="firstname" readonly>
                                                    </div>
                                                </li>
                                                <li class="box-row d-flex flex-item-center" >
                                                    <div class="form-group p-3 fs-5 " style=" margin-left:100px">
                                                        <label style="color:white">Validity :&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    </div>
                                                    <div class="p-2 ">
                                                        <input type="text" style="width:200px;background:black;color:red;border:none;font-size:22px" class="form-control" value="<?php echo $row['validity']; ?>" id="sdesc" name="firstname" readonly>
                                                    </div>
                                                </li>

                                               
                                                </ul>
                                                <button type="submit" class="hi btn btn-outline-danger my-3" name="delete">Delete</button>
                                        </form>
                                        <a href="delete-module.php"><button type="submit" class="btn btn-outline-info" style="margin-left: 470px;">Back</button></a>

                                    </div>


                                <?php } ?>


                                <!-- <button type="submit" class=" btn btn-outline-primary my-3" style="margin-right: 100px;">Back</button> -->


                                <!-- <button type="reset" class="btn btn-default ml-3">Reset</button> -->

                                <!--  col-md-12 ends -->


                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!--/.row-->




            </div>
            <!--/.main-->

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

<?php }  ?>