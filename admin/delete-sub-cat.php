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


    <title>Delete-Vehicle-Category</title>
    
  </head>

  <body class="c1">
    <?php
    $page = "manage-vehicles";
    include 'includes/sidebar.php'
    ?>
    <div class="container">
      <h1 class="panel-heading text-center">Dalete Vehicle</h1>
      

     
      <form  method="POST">
      <div class="row mt-4">
        <?php
        // $cid=$_GET['viewid'];
        $ret = mysqli_query($con, "SELECT * from  subscirption");
        while ($row = mysqli_fetch_array($ret)) {
            $id = $row['sub_id'];
            $desc = $row['plan'];
            $validity =$row['validity'];

            echo '
       
       
          <div class="col-sm-4">
            <div class="ca card rounded mb-3 shadow-lg">
              <div class="card-body">
                <!-- <h5 class="card-text">Special title treatment</h5> -->
                <p class="card-text text-center" name="name"><b>Plan: </b>'.$desc.'</p>
                <p class="card-text text-center"><b>validity: </b>'.$validity.'</p>';
                $ret1 = mysqli_query($con, "SELECT * from  sub_vehicle where sub_id=$id");
                while ($row1 = mysqli_fetch_array($ret1)) {
                    $id1 = $row1['sub_veh_id'];
                    $cat = $row1['category'];
                    
                    echo '
                    <div class="row mx-auto">
					<a href="deletesub.php?sub_veh_id=' . $id1 . '">
            <button type="button" id="'.$id1.'"  style="align-item:center;width:350px" class="btn btn-danger btn-sm my-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
					<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
					<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
				  </svg>'.$cat.'</button></a>
            </div>';
        }
             echo' </div>
            </div>
          </div>
        </form>
           
        ';} ?>
        <?php include 'deletevehModal.php'; ?>

        

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