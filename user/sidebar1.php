<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[6];
// echo $first_part;
?>
<?php
date_default_timezone_set('Asia/Kathmandu');
$numeric_date=date("G");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style11.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="../includes/style0.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <div class="mar">
        <marquee class="bg-dark text-white fs-5 p-2" behavior="alternate" direction="right" scrollamount="7">Modern College
            of arts ,science and commerce pune</marquee>
    </div>
    <nav>
    <?php if($numeric_date>=15&&$numeric_date<=24) { }else{ ?> 
      <a href="dashboard1.php">
      <?php } ?>
                    <img class="rounded-circle" src="https://www.iconshock.com/3D/character/png/thumbnails/journalist-reporter-columnist-pressman.png" width="50" class="img-responsive" alt="Icon">
                    </a>
      <!-- <div class="logo"></div> -->
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul >
      <?php if($numeric_date>=15&&$numeric_date<=24) { }else{ ?> 

        <li ><a class="<?php if ($first_part=="8548") {echo "active"; } else  {echo "noactive";}?>"href="8548">Home</a></li>
        <?php } ?>
        <li><a class="<?php if ($first_part=="1212") {echo "active"; } else  {echo "noactive";}?>" href="1212">Subscription</a></li>
        <li  ><a class="<?php if ($first_part=="2325") {echo "active"; } else  {echo "noactive";}?>"  href="2325">Vehicle History</a></li>
        <li><a class="<?php if ($first_part=="2125") {echo "active"; } else  {echo "noactive";}?>"  href="2125">Contact</a></li>
        <a href="2315"  > <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
          <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
      </svg></a>
      <li><a type="button" class="btn btn-outline-dark" style="margin-left: 10px;" href="../logout.php" >Logout</a></li>
      </ul>
    </nav>
    <!-- <div class="content">
      <div>Responsive Navigation Menu Bar Design</div>
      <div>using only HTML & CSS</div>
    </div> -->

  </body>
</html>
