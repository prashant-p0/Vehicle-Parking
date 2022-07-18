<?php

    include './includes/dbconn.php';
    
    $sql = "SELECT SUM( amount) FROM subscripted_user";
    $sql1 = "SELECT SUM( amount) FROM sub_user_log";
        $amountsum = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $amountsum1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
        $row_amountsum1 = mysqli_fetch_assoc($amountsum1);
        $total =  $row_amountsum['SUM( amount)'] +  $row_amountsum1['SUM( amount)'];
        // $totalRows_amountsum = mysqli_num_rows($amountsum);
        // echo $row_amountsum['SUM(amount)'];
        echo $total;
 ?>