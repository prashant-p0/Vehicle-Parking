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


    <title>Update-Module</title>
    
  </head>

  <body class="c1">
    <?php
    $page = "manage-vehicles";
    include 'includes/sidebar.php'
    ?>
    <div class="container">
      <h1 class="panel-heading text-center">Modules</h1>

     
      <form  method="POST">
      <div class="row mt-4">
        <?php
        // $cid=$_GET['viewid'];
        $ret = mysqli_query($con, "SELECT * from  subscirption");
        // $cnt = 1;
        while ($row = mysqli_fetch_array($ret)) {
            $id = $row['sub_id'];
            $desc = $row['plan'];
            $validity =$row['validity'];

            echo '
       
       
          <div class="col-sm-4">
            <div class="ca card rounded mb-3 shadow-lg">
              <div class="card-body">
                <!-- <h5 class="card-text">Special title treatment</h5> -->
                <p class="card-text" name="name"><b>Plan: </b>'.$desc.'</p>
                <p class="card-text"><b>Expired On: </b>'.$validity.'</p>
                <a href="upgrade-module.php?subid='.$id.'"  name="entry-vehicle" class="btn btn-success float-end">Update Module</a>
              </div>
            </div>
          </div>
        </form>
           
        ';} ?>

        

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

<?php }  ?>