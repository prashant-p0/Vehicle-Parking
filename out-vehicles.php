<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {
?>







    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="includes/body.css">
  <script src="includes/style0.js"></script>


        <title>Outgoing-vehicle</title>
        <style>
      .dataTables_filter {
        float: right;
      }
    </style>
    </head>

    <body class="c1">
        <?php
        $page = "out-vehicle";
        include 'includes/sidebar.php'
        ?>
        <div class="container">
            <h1 class="panel-heading text-center">Outgoing Vehicle</h1>
            <!-- <a  href="deleted-user.php"><button type="submit" class="btn btn-dark " >Deleted user</button></a> -->

            <?php
                if (isset($_SESSION['out'])) {
                ?>
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <?php echo $_SESSION['out']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

                    <?php

                }
                unset($_SESSION['out']);
                    ?>


            <div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">



                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-sheading">Outgoing Vehicles</div> -->
                            <div class="panel-body mt-4">
                               
                                        <?php
                                        // $cid=$_GET['viewid'];
                                        $ret = mysqli_query($con, "SELECT * from  vehicle_info where Status='Out' order by OutTime desc");
                                        $cnt = 1;
                                        $count = mysqli_num_rows($ret);

												if ($count > 0){
                                                    echo '
                                                    <table id="myTable" class="table table-striped table-hover mt-4" style="width:100%">

                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Vehicle No.</th>
                                                            <th>Category</th>
                                                            <th>Parking Number</th>
                                                            <th>Vehicle InTime</th>
                                                            <th>Vehicle OutTime</th>
                                                            <th>Charge</th>
                                                            <th>Vehicles Owner</th>
                                                            <th>Contact No</th>
                                                            <th>Subscripted User</th>
                                                            <th >action</th>
                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    ';
                                        while ($row = mysqli_fetch_array($ret)) {
                                            $phone = $row['OwnerContactNumber'];
                                            $vehno = $row['RegistrationNumber'];
											$catname= $row['VehicleCategory'];


                                            // convert date-format
												$d= $row['InTime'];
												$date=date_create($d);
												$InTime= date_format($date,"d/M/y-H:i");

												$d1= $row['OutTime'];
												$date1=date_create($d1);
												$OutTime= date_format($date1,"d/M/y-H:i");


                                        ?>

                                            <tr class="mt-4">

                                                <td><?php echo $cnt; ?></td>

                                                <td><?php echo $row['RegistrationNumber']; ?></td>


                                                <td><?php echo $row['VehicleCategory']; ?></td>

                                                <td><?php echo 'CA-' . $row['ParkingNumber']; ?></td>
                                                <td><?php echo $InTime ?></td>
                                                <td><?php echo $OutTime  ?></td>

                                                <td><?php echo 'Rs. ' . $row['ParkingCharge']; ?></td>

                                                <td><?php echo $row['OwnerName']; ?></td>
                                                <td><?php echo $row['OwnerContactNumber']; ?></td>
                                                <td>

													<?php
													// $query = mysqli_query($con, "SELECT s.vehicle_no FROM subscripted_user s LEFT JOIN vehicle_info v ON s.vehicle_no=v.RegistrationNumber WHERE s.phone=$phone;");
                                                    $query = mysqli_query($con, "SELECT vehicle_no FROM subscripted_user WHERE vehicle_no= '$vehno' and vehicle_cat='$catname' and status != 'deleted'");
													// $cnt = 1;
													if ($row1 = mysqli_num_rows($query)) {
														echo 'Yes';
													} else {
														echo 'No';
													}

													?>



												</td>

                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <!-- <a href="outgoing-detail.php?updateid=<?php echo $row['ID']; ?>"><button type="button" class="btn btn-sm btn-info">View Details</button></a> -->
                                                        <a href="bill-out-daily.php?vid=<?php echo $row['ID']; ?>" download="receipt"><button type="button" class="btn btn-sm btn-warning"> <i class="fa fa-print"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                                                        <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                                                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                                    </svg></i></button>
                                                    </div>
                                                </td>

                                            </tr>

                                        <?php $cnt = $cnt + 1;
                                        }
                                     }else {
                                        echo '<div class="alert alert-warning text-dark" role="alert">
                                        <b>Customer-Entry Not Found..</b>
                                      </div>
                                      <img src="includes/img/history1.png" style="height:400px; width:400px;margin-left:400px">';
                                      } ?>


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
                <!--/.row-->





            </div>
            <!--/.main-->
        </div>
        <script>
            window.onload = function() {
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc"
                });
            };
        </script>

        <!-- <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script> -->
        <!-- Optional JavaScript; choose one of the two! -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
			$(document).ready(function() {

				$('#myTable').DataTable();
			});
		</script>
    </body>

    </html>


<?php }  ?>