<?php
session_start();
// include('db.php');
// $con=mysqli_connect('localhost','root','','payment');
$con = mysqli_connect("localhost", "root", "", "vehicle-parking-db");


if (isset($_POST['amt'])&& isset($_POST['status'])&& isset($_POST['remark']) && isset($_POST['cid'])) {
    $amt = $_POST['amt'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $cid = $_POST['cid'];

    // echo $cid , $remark, $status, $amt;

   
    // $payment_status = "pending";
    // $added_on=date('Y-m-d h:i:s');


    mysqli_query($con, "UPDATE vehicle_info set OutTime=CURRENT_TIMESTAMP, ParkingCharge='$amt', Remark='$remark', Status ='$status' where ID=$cid");
    $_SESSION['OID'] =$cid;
}
if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    // mysqli_query($con,"update subscripted_user set payment_status='complete',payment_id='$payment_id' where sid='".$_SESSION['OID']."'");
    mysqli_query($con, "update vehicle_info set payment_status='complete',payment_id='$payment_id' where ID='" . $_SESSION['OID'] . "'");
}



       

      






?>
