<?php
session_start();
// include('db.php');
// $con=mysqli_connect('localhost','root','','payment');
$con=mysqli_connect("localhost", "root", "", "vehicle-parking-db");


if(isset($_POST['amt']) && isset($_POST['name'])  && isset($_POST['plan'])&& isset($_POST['vehicle_no'])&& isset($_POST['vehiclename'])&& isset($_POST['vehicle_cat'])&& isset($_POST['ownername'])&& isset($_POST['mail'])&& isset($_POST['phone'])&& isset($_POST['validity'])){
        $vehreno = $_POST['vehicle_no'];
        $catename = $_POST['vehicle_cat'];
        $company = $_POST['vehiclename'];
        $name = $_POST['ownername'];
        $contact = $_POST['phone'];
        $mail = $_POST['mail'];
        $desc = $_POST['plan'];
        $amount1 = $_POST['amt'];
        $validity = $_POST['validity'];
        $date = date_create($sdate);
        date_modify($date, "+ $validity");
        $date1 = date_format($date, "Y-m-d");
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');

    $query_exist = mysqli_query($con, "SELECT * FROM subscripted_user WHERE vehicle_no='$vehreno' and vehicle_cat='$catename' and  status != 'deleted';");
    $num = mysqli_num_rows($query_exist);
    echo $num;
    if ($num > 0) {

        // count days left for end subscription
        $check_date = mysqli_query($con, "SELECT * FROM subscripted_user WHERE vehicle_no='$vehreno' && vehicle_cat='$catename';");
        $row = mysqli_fetch_assoc($check_date);
        $sid = $row['sid'];
        $edate = $row['edate'];
        $sdate = $row['sdate'];
        $date1 = date("Y-m-d");
        $date2 = $edate;
        // echo $date2;
        // echo $date1;

        function dateDiff($date1, $date2)
        {
            $date1_ts = strtotime($date1);
            $date2_ts = strtotime($date2);
            $diff = $date2_ts - $date1_ts;
            return round($diff / 86400);
        }

        $dateDiff = dateDiff($date1, $date2);
        // echo $dateDiff;

        // add no. of count days into end date
        $sdate = date("Y-m-d");
        // echo $sdate;
        $day = $dateDiff . ' days';
        // echo $day;
        $date = date_create($sdate);
        date_modify($date, "+ $validity");
        date_modify($date, "+ $day");
        $date5 = date_format($date, "Y-m-d");
        // echo $date5;
        $st = "updated";
        // echo $validity;

        // $update = mysqli_query($con, "UPDATE subscripted_user set ownername='$name', plan='$plan', amount='$amount1', edate='$date5', status = '$st' where vehicle_no='$vehreno'");
        mysqli_query($con, "UPDATE subscripted_user set ownername='$name',phone = '$contact', mail='$mail', plan='$desc', amount='$amount1', validity= '$validity', edate='$date5', status = '$st' , payment_status='$payment_status' where vehicle_no='$vehreno'");
        $_SESSION['OID1']= $sid;
        
    } else {

        mysqli_query($con, "INSERT INTO `subscripted_user` (`sid`, `vehicle_no`, `vehiclename`, `vehicle_cat`, `ownername`, `phone`, `mail`,`plan`, `amount`, `validity`, `sdate`, `edate`,`payment_status`) VALUES (NULL, '$vehreno', '$company', '$catename', '$name', '$contact','$mail' ,'$desc', '$amount1', '$validity', current_timestamp(), '$date1','$payment_status');");
        $_SESSION['OID']=mysqli_insert_id($con);
        }  
    } 
if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con,"update subscripted_user set payment_status='complete',payment_id='$payment_id' where sid='".$_SESSION['OID']."'");
}

if(isset($_POST['payment_id']) && isset($_SESSION['OID1'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con,"update subscripted_user set payment_status='complete',payment_id='$payment_id' where sid='".$_SESSION['OID1']."'");
}
