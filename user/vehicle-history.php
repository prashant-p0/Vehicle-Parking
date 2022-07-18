<?php
session_start();
error_reporting(0);
// $con = mysqli_connect("localhost", "root", "", "vehicle-parking-db");
if (include('../includes/dbconn.php'))
  if (strlen($_SESSION['user'] == 0)) {
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
    <link rel="stylesheet" href="../includes/body.css">
  <script src="../includes/style0.js"></script>


    <title>History</title>
    <style>
      .dataTables_filter {
        float: right;
      }
    </style>
  </head>

  <body class="c1">

    <?php
    $page = "dashboard";
    include 'sidebar1.php'
    ?>
    <div class="container">
      <h1 class="panel-heading text-center">Vehicle History</h1>


      <form method="POST">
        <div class=" my-4">

         
                <?php
                $user = $_SESSION['user'];
                // echo $user;
                $check_phone = mysqli_query($con, "SELECT phone from user where uid=$user;");
                // var_dump($check_phone);
                $phone1 = mysqli_fetch_assoc($check_phone);
                $get_phone = $phone1['phone'];
                $ret = mysqli_query($con, "SELECT * from  vehicle_info where OwnerContactNumber=$get_phone && Status='Out' order by ID desc;");


                // $ret = mysqli_query($con, "SELECT * from  subscripted_user where status='deleted';");
                $cnt = 1;
                $count = mysqli_num_rows($ret);
                if($count >0){
                  echo '
                  <table class="table table-striped table-hover mt-4" id="myTable">

                  <thead>
      
                    <tr class="mt-4">
                      <th scope="col">S.No</th>
                      <th scope="col">Parking No</th>
                      <th scope="col">Vehicle No</th>
                      <th scope="col">Vehicle Category</th>
      
                      <th scope="col">InTime</th>
                      <th scope="col">OutTime</th>
                      <th scope="col">Charge</th>
                      <th scope="col">Remark</th>
                      <th scope="col">Sub-User</th>
                      <!-- <th scope="col">Validity</th> -->
                      <th scope="col">action</th>
      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>';
                while ($row = mysqli_fetch_array($ret)) {
                  $phone = $row['OwnerContactNumber'];

                  // convert date-format
                  $d = $row['InTime'];
                  $date = date_create($d);
                  $InTime = date_format($date, "d-M-y H:i:s");

                  $d1 = $row['OutTime'];
                  $date1 = date_create($d1);
                  $OutTime = date_format($date1, "d-M-y H:i:s");

                ?>
                  <th scope='row'>
                    <?php echo $cnt; ?>
                  </th>
                  <td>
                    <?php echo $row['ParkingNumber']; ?>
                  </td>
                  <td>
                    <?php echo $row['RegistrationNumber']; ?>
                  </td>

                  <td>
                    <?php echo $row['VehicleCategory']; ?>
                  </td>
                  <td>
                    <?php echo $InTime ?>
                  </td>
                  <td>
                    <?php echo $OutTime ?>
                  </td>
                  <td>
                    <?php echo $row['ParkingCharge']; ?>
                  </td>
                  <td>
                    <?php echo $row['Remark']; ?>
                  </td>
                  </td>

                  <td>

                    <?php
                    $query = mysqli_query($con, "SELECT s.vehicle_no FROM subscripted_user s LEFT JOIN vehicle_info v ON s.vehicle_no=v.RegistrationNumber WHERE s.phone=$phone;");
                    // $cnt = 1;
                    if ($row1 = mysqli_num_rows($query)) {
                      echo 'Yes';
                    } else {
                      echo 'No';
                    }

                    ?>



                  </td>

                  <td>

                    <a href="../bill-out-daily.php?vid=<?php echo $row['ID']; ?>" download="receipt"><button type="button" class="btn btn-sm btn-warning"> <i class="fa fa-print"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                            <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                          </svg></i></button>


                  </td>

                  <!-- <td>No</td> -->

              </tr>
      </form>
    <?php $cnt = $cnt + 1;
                }
              }
                else
                {
                echo '<div class="alert alert-warning text-dark" role="alert">
                  <b>You Haven`t Park Yet...</b>
                </div>
                <img src="../includes/img/history1.png" style="height:400px; width:400px;margin-left:400px">';
                } ?>

    </tbody>
    </table>




    </div>

    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Optional JavaScript -->
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


