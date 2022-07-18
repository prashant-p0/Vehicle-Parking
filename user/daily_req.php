<?php


session_start();
error_reporting(0);


if (isset($_GET['req'])) {
    $id = $_GET['req'];

    // include('includes/dbconn.php');
    include('../includes/dbconn.php');

    // $exist = mysqli_query($con, "SELECT v.* from  vehicle_info v left JOIN subscripted_user s ON v.RegistrationNumber=s.vehicle_no WHERE s.sid=$id and v.Status='req';");
    // $exist = mysqli_query($con, "SELECT vehicle_no FROM `subscripted_user` WHERE sid= $id;");

    // $row3 = mysqli_fetch_assoc($exist);
    // $veh_no = $row3['vehhicle_no'];

    // $exist1 = mysqli_query($con, "SELECT * FROM `subscripted_user` WHERE sid= $id;");


    $ret = mysqli_query($con, "SELECT * FROM `subscripted_user` WHERE sid= $id;");
    ($ro = mysqli_fetch_array($ret));
        $sid = $ro['sid'];
        $vehicleno = $ro['vehicle_no'];
        $catname = $ro['vehicle_cat'];
        $company = $ro['vehiclename'];
        $ownername = $ro['ownername'];
        $parkingnumber = mt_rand(10000, 99999);
        //get owner contact
        $user = $_SESSION['user'];
        $phone_query = mysqli_query($con, "select phone from user WHERE uid = $user");
        $row = mysqli_fetch_assoc($phone_query);
        $user_phone = $row['phone'];
        $request = "req";

        $ret = mysqli_query($con, "SELECT * FROM `vehicle_info` WHERE RegistrationNumber='$vehicleno' AND VehicleCategory='$catname' AND (Status='' OR Status='req');");

        $count = mysqli_num_rows($ret);
        // echo $count;

        if ($count > 0) {
            // echo 'vehicle is already exist';
            $_SESSION['daily'] = "vehicle is already parked..";
            header('Location:module.php');

        } else {

            $query = mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,Status,uid) value('$parkingnumber','$catname','$company','$vehicleno','$ownername','$user_phone','$request','$user')");
            if ($query) {
                // $msg = "Your request has been submitted";
                $_SESSION['daily'] = "Your request  has been submitted successfully ..";
                header('Location:dashboard1.php');
            } else {
                $msg = "Something Went Wrong";
            }
        }
    

   
}
