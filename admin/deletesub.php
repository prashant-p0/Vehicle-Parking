<?php


session_start();
error_reporting(0);


if(isset($_GET['sub_veh_id'])){
$id=$_GET['sub_veh_id'];

include('includes/dbconn.php');


$qry="DELETE from sub_vehicle where sub_veh_id=$id";
$result=mysqli_query($con,$qry);

if($result){
    // echo"DELETED";
    // header('Location:vehicle-category.php');
    $_SESSION['delsub'] = "Vehicle Category Deleted successfully...";
    header('location:sub-vehicle-cat.php');
}else{
    echo"ERROR!!";
}
}
?>