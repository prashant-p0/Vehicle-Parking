<?php
session_start();
error_reporting(0);
// $con=mysqli_connect("localhost", "root", "", "vehicle-parking-db");
if (include('../includes/dbconn.php')) {
    // echo" hi";
} else {
    // echo "0";
}
// include('includes/dbconnection.php');
// error_reporting(0);
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


        <title>Modules</title>

    </head>

    <body class="c1">
        <?php
        $page = "dashboard";
        include 'sidebar1.php'
        ?>

        <div class="container">


            <div class="row">

                <?php
                if (isset($_SESSION['buy'])) {
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                    </svg>
                    <div class="alert alert-success d-flex alert-dismissible  align-items-center" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            <?php echo $_SESSION['buy']; ?>
                        </div>
                    </div>
                <?php

                }
                unset($_SESSION['buy']);
                ?>
                <?php
                if (isset($_SESSION['delete'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['delete']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php

                }
                unset($_SESSION['delete']);
                ?>
                <?php
                if (isset($_SESSION['sub'])) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['sub']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php

                }
                unset($_SESSION['sub']);
                ?>
                <?php
                if (isset($_SESSION['daily'])) {
                ?>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <div class="alert alert-info alert-dismissible fade show d-flex align-items-center" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="info:">
                            <use xlink:href="#info-fill" />
                        </svg>
                        <div>
                            <?php echo $_SESSION['daily']; ?>
                        </div>
                    </div>
                <?php

                }
                unset($_SESSION['daily']);
                ?>



                <?php
                $user = $_SESSION['user'];
                include 'includes/dbconn.php';
                // $ret = mysqli_query($con, "SELECT * FROM subscirption");
                $ret = mysqli_query($con, "SELECT * FROM `subscirption` WHERE sub_id IN (SELECT sub_id FROM sub_vehicle);");

                $count = mysqli_num_rows($ret);

                if ($count > 0) {
                    while ($row = mysqli_fetch_array($ret)) {
                        $subid = $row['sub_id'];
                        $desc = $row['plan'];
                        $time = $row['validity'];

                        $sdate = date("Y-m-d");
                        // $validity = '1 Month';
                        $date = date_create($sdate);
                        date_modify($date, "+ $time");
                        $date1 = date_format($date, "d-M-Y");

                        $query = mysqli_query($con, "SELECT s.sid, s.ownername FROM subscripted_user s INNER JOIN user u ON s.phone=u.phone WHERE u.uid=$user;");
                        $sql = mysqli_num_rows($query);
                        // echo $sql;
                        echo '
            <style>
            .card1{
                position: relative;
                width: 400px;
                height: 390px;
                margin: 30px;
                box-shadow: 20px 20px 50px rgba(0, 0,0,0.5);
                border-radius: 15px;
                background: black;
                overflow: hidden;
                justify-content: center;
                align-items: center;
                border-top: 1px solid rgba(255, 255, 255, 0.5);
                border-left: 1px solid rgba(255, 255, 255, 0.5);
                backdrop-filter: blur(5px);
            }

            .card1 .content{
                padding: 20px;
                
                transform: translateY(100px);
                opacity: 0;
                transition: 0.5s;
            }
            .container .card1:hover .content{
                transform: translateY(10px);
                opacity: 1;
            }
            .buy{
                position: relative;
                display: inline-block;
                padding: 8px 20px;
                margin-top:;
                background: #fff;
                color: black;
                border-radius: 20px;
                text-decoration: none;
                font-weight: 500;
                box-shadow: 0 5px 15px rgba(0, 0,0,0.2);
            }
            
            </style>
                <div class="col-md-4" style="margin-top: 40px;">
                    <div class="card1" style="border-radius:30px;">
                    <div class="content">
                        <ul class="pt-3 " style="list-style: none; display: flex; gap: 60px;">

                            <li>
                                <h4 style="color:white;">' . $desc . '</h4>
                            </li>
                            <li>
                                <h5 style="color:white;">' . $time . '</h5>
                            </li>
                        </ul>';
                        $ret3 = mysqli_query($con, "SELECT MIN(amount) AS amount FROM `sub_vehicle` GROUP BY sub_id HAVING sub_id='$subid'; ");

                        $row3 = mysqli_fetch_assoc($ret3);
                        $amount = $row3['amount'];

                        echo ' <ul style="list-style: none;">
                            <li class="me-3 ms-1" style="font-size: 20px; color:white">Starting From ' . $amount . '.00 INR</li>
                        </ul>

                        <ul style="list-style: none;">
                            <li>
                                <h4 style="font-weight: bolder; color:white">Starting ' . date("d-M-Y") . ' </h4>
                            </li>
                        </ul>
                        <ul class="ps-5 mb-3" style="color:white;">
                            <li class="pb-1">You will next be billed on ' . $date1 . '

                   
                    </li>


                            <li class="pb-1">Cancel anytime. <button class="btn " style="color:white;" data-bs-toggle="modal" data-bs-target="#loginModal"> offer terms</button> apply.</li>
                            <li>We"ll remind you 2 days before you get charged.</li>
                            <li class="pb-4" style="list-style: none; margin-left: 200px; margin-top: 10px;"><a class="buy"   href="buy-sub.php?subid=' . $subid . '">
                   
                         Buy Now</a></li>';


                        echo ' </ul>
                        </div>

                    </div>
                </div>';
                        include 'terms.php';
                    }
                } else {
                    echo '
                <img src="../includes/img/history1.png" style="height:400px; width:400px;margin-left:400px">
                <div class="alert alert-warning text-dark text-center" role="alert">
                  <b>Subscription Plan is not available</b>
                </div>';
                }
                ?>

            </div>
            <!-- <div class="card mb-4"> -->
            <!-- <div class="card-body"> -->

            <div class="col-md-12">






                <?php
                $user = $_SESSION['user'];
                $ret = mysqli_query($con, "SELECT s.* from  subscripted_user s inner JOIN user u ON s.phone=u.phone WHERE u.uid=$user and status!='deleted';");

                // $row = mysqli_fetch_array($ret);
                $cnt = 1;
                $count = mysqli_num_rows($ret);

                if ($count > 1) {
                    echo ' <h1 class="my-4 text-center">Activated Subscription </h1>
                                <table class="table table-striped table-hover mt-4" id="myTable">

                                <thead>
            
                                    <tr class="mt-4">
                                        <th scope="col">S.No</th>
                                        <th scope="col">Vehicle No</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col">Days Left</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>';
                    function dateDiff($date1, $date2)
                    {
                        $date1_ts = strtotime($date1);
                        $date2_ts = strtotime($date2);
                        $diff = $date2_ts - $date1_ts;
                        return round($diff / 86400);
                    }
                    while ($ro = mysqli_fetch_array($ret)) {
                        $sid = $ro['sid'];
                        $vehicleno = $ro['vehicle_no'];
                        $vehicleno = $ro['vehicle_no'];
                        $plan = $ro['plan'];
                        $sdate = $ro['sdate'];
                        $edate = $ro['edate'];
                        $validity = $ro['validity'];

                        // $count = mysqli_query($con, "SELECT DATEDIFF(edate, CURDATE())  FROM subscripted_user WHERE vehicle_no='$vehicleno';");
                        $date1 = date("Y-m-d");
                        $date2 = $edate;


                        $dateDiff = dateDiff($date1, $date2);

                        // convert date-format
                        $d = $sdate;
                        $date = date_create($d);
                        $InTime = date_format($date, "d-M-y ");

                        $d1 = $edate;
                        $date4 = date_create($d1);
                        $OutTime = date_format($date4, "d-M-y");


                        echo '
												<th scope="row">
                                               ' . $cnt . '
												</th>
												<td>
                                                ' . $vehicleno . '
                                                
												</td>
												<td>
													' . $InTime . '
												</td>
												<td>
													' . $OutTime . '
												</td>
												<td>
													' . $plan . '
												</td>
												<td>
													' . $dateDiff . '
												</td>
												
												<td>
                                                <a href="daily_req.php?req=' . $sid . '"><button type="button" class="btn btn-sm btn-warning">Daily Request</button></a>
                                                
                                                <a href="delete.php?sid=' . $sid . '">
												<button type="button"  class="btn btn-sm btn-danger">Cancel Subscription</button></a>
                                               
                                                <a href="../bill-sub.php?vid=' . $sid . '" download="receipt"><button type="button" class="btn btn-sm btn-warning"> <i class="fa fa-print"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                                                        <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                                                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                                    </svg></i></button></td>

												
                                                </tr>';
                        $cnt = $cnt + 1;
                    }

                    echo '
										</form>
									

									</tbody>
								</table>';

                    include 'cancel-subModal.php';
                } else {


                    echo '
                    <h1 class="my-4 text-center">Testimonials</h1>
                    <div class="row align-items-md-stretch mx-4 ">
                               ';
                    $test = mysqli_query($con, "SELECT * FROM `feedback` ORDER BY RAND() limit 3;");
                    // $row4 = mysqli_fetch_assoc($test);
                    while ($row4 = mysqli_fetch_array($test)) {
                        echo '
                               
  <div class="jumbotron x1 col-md-4 mx-auto my-4 ">
    <p class="leading-relaxed p-3">' . $row4['feedbacks'] . '</p>
    <span class="inline-flex "><span class="flex-grow flex flex-col pl-4"><span
          class="float-end pb-3 pr-2" style="color:#8602fa;"><b>-' . $row4['name'] . '</b></span></span></span>
  </div>
  ';
}
}
?>
</div>

<style>
  
.x1:hover {
  transition: all 0.2s ease-out;
  box-shadow: 0px 4px 8px rgba(38, 38, 38, 0.4);
  top: -4px;
  border: 1px solid #cccccc;
  /* background-color: white; */
  /* border-radius: 25px; */
}

.x1:hover:before {
  transform: scale(2.15);
}
    </style>
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../vanilla-tilt.js"></script>
        <script>
            VanillaTilt.init(document.querySelectorAll(".card1"), {
                max: 25,
                speed: 400,
                glare: true,
                "max-glare": 1
            });
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>

    </html>

<?php } ?>