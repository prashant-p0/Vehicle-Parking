<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[6];
// echo $first_part;
?>
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

    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        .nav-link {
            color: black;
        }

        

        .nav-link:hover {
            background-color: #000000;
            color: white;
            /* border: 2px solid black; */
            border-radius: 10px;
        }
        span{
            width: 32px;
            height: 28px;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <div class="mar">
        <marquee class="bg-dark text-white fs-5 p-2" behavior="alternate" direction="right" scrollamount="7">Modern College
            of arts ,science and commerce pune</marquee>
    </div>
    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <!-- <a class="navbar-brand">Navbar</a> -->
            <div class="profile-sidebar ml-4">
                <div class="profile-userpic">
                    <!-- <img class="rounded-circle" src="https://www.w3schools.com/howto/img_avatar.png" width="50" class="img-responsive" alt="Icon"> -->
                    <img class="rounded-circle" src="https://www.iconshock.com/3D/character/png/thumbnails/journalist-reporter-columnist-pressman.png" width="50" class="img-responsive" alt="Icon">
                    <!-- <img src="img/ca"  alt="Icon"> -->
                </div>
                <div class="profile-usertitle mt-2">
                    <div class="profile-usertitle-name">Admin</div>
                </div>
                <div class="clear"></div>
            </div>
            <ul class="nav ml-4">
       
                <li class="nav-item ml-4">
                    <a class="nav-link mt-2 "  href="1024" checked>Dashboard</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="5245">Vehicle<br>Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="7488">Vehicle<br>Entry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 " href="4526">In<br>Vehicle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="7412">Out<br>Vehicle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="1422">View<br>Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="6589">Total<br>Income</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tooltip" data-bs-placement="bottom" title="12" href="req_user.php">Requested<br>User</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link mt-2 " href="5268">Customer</a>
                </li>

            </ul>
            
            <form class="d-flex ml-2" style="margin-right:20px"><a  href="8569">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg></a>
                    <?php  $ret=mysqli_query($con,"SELECT * from vehicle_info WHERE Status='req';");
                    $count = mysqli_num_rows($ret);
                    
        ?>
                    <a  href="7625">
                    <span class="badge rounded-pill bg-dark p-2 " style="margin-left:20px; margin-right:10px; width:50px" ><?php  echo $count ?> new</span></a>

                <!-- <input class="form-control me-2 mx-2" type="search" placeholder="Search vehicle no." aria-label="Search"> -->
                <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                <!-- <button type="button"  class="btn btn-dark ml-2">Logout</button> -->
                <button type="button" id="'.$subid.'"  data-bs-toggle="modal" data-bs-target="#qrModal" class="btn btn-warning btn-sm">QR</button>
                <a type="button" href="./5689" class="btn btn-dark " style="margin-left: 10px;">Logout</a>

            </form>
            <?php include 'qrModal.php'; ?>
        </div>
    </nav>
    <hr>
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