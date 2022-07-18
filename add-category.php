<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['vpmsaid'] == 0)) {
  header('location:logout.php');
} else {

  if (isset($_POST['submit-category'])) {
    $catname = $_POST['catename'];
    $sdesc = $_POST['sdesc'];
    $space = $_POST['space'];

    $query = mysqli_query($con, "INSERT into vcategory(VehicleCat,charges,space) value('$catname','$sdesc','$space')");
    if ($query) {
      $_SESSION['addcat']="Vehicle Category added successfully...";
            header('location: vehicle-category.php');
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
		<link rel="stylesheet" href="includes/body.css">
  <script src="includes/style0.js"></script>


    <title>Add-Vehicle-Category</title>
  </head>

  <body class="c1">
    <!-- <h1>Hello, world!</h1> -->
    <?php
    $page = "vehicle-category";
    include 'includes/sidebar.php'
    ?>

    <div class="container">
      <div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">




        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <h1 class="panel-heading text-center">Add New Vehicle Category</h1>
              <div class="panel-body">

              <?php if ($msg)
								echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
						<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
						  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
						</symbol>
						<div class="alert alert-success d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
		 ' . $msg . '
		 </div>
		 <button type="button" class="btn-close float-end" style="margin-left: 944px;" data-bs-dismiss="alert" aria-label="Close"></button>
		 </div>
		 ' ?>

                <div class="col-md-12">

                  <form method="POST">

                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" class="form-control mt-2" placeholder="Enter Here.." id="catename" name="catename" required>
                    </div>


                    <div class="form-group my-3">
                      <label>Daily Charges</label>
                      <input type="text" class="form-control mt-2" placeholder="123" id="sdesc" name="sdesc" required>
                    </div>

                    <div class="form-group my-3">
                      <label>Parking Space</label>
                      <input type="number" class="form-control mt-2" placeholder="123" id="space" name="space" required>
                    </div>



                    <button type="submit" class="btn btn-success" name="submit-category">Submit</button>
                </div> <!--  col-md-12 ends -->


              </div>
            </div>
          </div>



        </div>
        <!--/.row-->
      </div>

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

    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>
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