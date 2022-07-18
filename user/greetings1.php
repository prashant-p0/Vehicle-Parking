<?php 
 
//  $con=mysqli_connect("localhost", "root", "", "vehicle-parking-db");
if(include('../includes/dbconn.php')){
    // echo" hi";
}
else{
    // echo "0";
}
    // include 'dbconn.php';
    date_default_timezone_set('Asia/Kathmandu');
    //Here we define out main variables 
    $welcome_string="Welcome"; 
    $numeric_date=date("G"); 
    
    //Start conditionals based on military time 
    if($numeric_date>=0&&$numeric_date<=11) 
    $welcome_string="Good Morning, "; 
    else if($numeric_date>=12&&$numeric_date<=17) 
    $welcome_string="Good Afternoon, "; 
    else if($numeric_date>=18&&$numeric_date<=23) 
    $welcome_string="Good Evening, "; 

    $adminid=$_SESSION['user'];
    $ret=mysqli_query($con,"SELECT * from user where uid='$adminid'");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {?>
        <div class="mt-2">
        <p class="line anim-typewriter"><?php echo $welcome_string, $row['firstname']; ?></p>
       </div>
        
        <?php }

?>

<style>
/* Google Fonts */
@import url(https://fonts.googleapis.com/css?family=Anonymous+Pro);

/* Global */
/* html {
     min-height: 200px;
     overflow: hidden;
} */

/* body {
     height: calc(100vh - 8em);
     padding: 4em;
     color: rgba(255, 255, 255, 0.75);
     font-family: 'Anonymous Pro', monospace;
     background-color: rgb(25, 25, 25);
} */

.line {
   margin-top: 20px;
     position: relative;
     /* top: 50%; */
     width: 16em;
     /* margin: 0 auto; */
     margin-left: 350px;
     border-right: 2px solid rgba(255, 255, 255, 0.75);
     font-size: 30px;
     text-align: center;
     white-space: nowrap;
     overflow: hidden;transform: translateY(-50%);
     color:black;
}

/*Animation*/

.anim-typewriter {
     animation: typewriter 4s steps(40) 1s 1 normal both,
     blinkTextCursor 500ms steps(40) infinite normal;
}

@keyframes typewriter {
     from {
           width: 0;
     }
     to {
           width: 16em;
     }
}

@keyframes blinkTextCursor {
     from {
           border-right-color: rgba(255, 255, 255, 0.75);
     }
     to {
           border-right-color: transparent;
     }
}
</style>