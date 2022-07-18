<?php
session_start();
// include('db.php');
// $con=mysqli_connect('localhost','root','','payment');
$con=mysqli_connect("localhost", "root", "", "vehicle-parking-db");


if(isset($_POST['amt'])&& isset($_POST['vehicle_no'])&& isset($_POST['vehiclename'])&& isset($_POST['vehicle_cat'])&& isset($_POST['ownername'])&& isset($_POST['req'])){
        $vehreno = $_POST['vehicle_no'];
        $catename = $_POST['vehicle_cat'];
        $company = $_POST['vehiclename'];
        $name = $_POST['ownername'];
        $amount1 = $_POST['amt'];
        $request = $_POST['req'];
        $parkingnumber = mt_rand(10000, 99999);
        $payment_status="pending";
       
        //get user phone no.
        $user = $_SESSION['user'];
        $phone_query = mysqli_query($con, "select phone from user WHERE uid = $user");
        $row = mysqli_fetch_assoc($phone_query);
        $user_phone = $row['phone'];



        // mysqli_query($con, "INSERT INTO `subscripted_user` (`sid`, `vehicle_no`, `vehiclename`, `vehicle_cat`, `ownername`, `phone`, `mail`,`plan`, `amount`, `validity`, `sdate`, `edate`,`payment_status`) VALUES (NULL, '$vehreno', '$company', '$catename', '$name', '$contact','$mail' ,'$desc', '$amount1', '$validity', current_timestamp(), '$date1','$payment_status');");
        mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,ParkingCharge,`Status`,`payment_status`,`uid`) value('$parkingnumber','$catename','$company','$vehreno','$name','$user_phone','$amount1','$request','$payment_status','$user')");
        $_SESSION['OID']=mysqli_insert_id($con);
          
    } 
if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con,"update vehicle_info set payment_status='complete',payment_id='$payment_id' where ID='".$_SESSION['OID']."'");
}





?>
