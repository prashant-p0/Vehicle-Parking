<?php

    include './includes/dbconn.php';
    
    $sql = "SELECT SUM(amount) FROM subscripted_user";
        $amountsum = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        // $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo $row_amountsum['SUM(amount)'];
 ?>