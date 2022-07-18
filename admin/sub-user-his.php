<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

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


    <title>User-History</title>
    <style>
      .dataTables_filter {
        float: right;
      }
    </style>
  </head>

  <body class="c1">


    <?php
    $page = "dashboard";
    include 'includes/sidebar.php'
    ?>
    <div class="container">
      <h1 class="panel-heading text-center">Subscripted User History</h1>




      <form method="POST">
        <div class=" my-4">


          <?php

          $ret = mysqli_query($con, "SELECT * from  sub_user_log WHERE payment_status != 'pending';");
          $cnt = 1;
          $count= mysqli_num_rows($ret);

          if ($count > 0) {
            echo '
                <table class="table table-striped table-hover mt-4" id="myTable">

                <thead>
    
                  <tr class="mt-4">
                    <th scope="col">S.No</th>
                    <th scope="col">Vehicle No</th>
                    <th scope="col">Vehicle Category</th>
    
                    <th scope="col">Owername</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Validity</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <!-- <th scope="col">action</th> -->
    
                  </tr>
                </thead>
                <tbody>
                  <tr>';
            while ($row = mysqli_fetch_array($ret)) {

              // convert date-format
              $d = $row['sdate'];
              $date = date_create($d);
              $InTime = date_format($date, "d-M-y ");

              $d1 = $row['edate'];
              $date1 = date_create($d1);
              $OutTime = date_format($date1, "d-M-y");

          ?>
              <th scope='row'>
                <?php echo $cnt; ?>
              </th>
              <td>
                <?php echo $row['vehicle_no']; ?>
              </td>
              <td>
                <?php echo $row['vehicle_cat']; ?>
              </td>

              <td>
                <?php echo $row['ownername']; ?>
              </td>
              <td>
                <?php echo $row['phone']; ?>
              </td>
              <td>
                <?php echo $row['plan']; ?>
              </td>
              <td>
                <?php echo $row['amount']; ?>
              </td>
              <td>
                <?php echo $row['validity']; ?>
              </td>
              <td>
                <?php echo $InTime ?>
              </td>
              <td>
                <?php echo $OutTime ?>
              </td>


              <!-- <td>No</td> -->

              </tr>
      </form>
  <?php $cnt = $cnt + 1;
            }
          } else {
            echo '<div class="alert alert-warning text-dark" role="alert">
            <b>Suscripted User-History Not Found..</b>
          </div>
          <img src="includes/img/history1.png" style="height:400px; width:400px;margin-left:400px">';
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