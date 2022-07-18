<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

										// $cid = $_GET['updateid'];
										$ret = mysqli_query($con, "SELECT * FROM `subscripted_user` ORDER BY sid DESC LIMIT 1;");
										$cnt = 1;
										while ($row = mysqli_fetch_array($ret)) {
											// $phone = $row['OwnerContactNumber'];


									
?>

<div class="col-md-3">
												<label class="form-label">Vehicle Registration Number</label>
												<input type="text" class="form-control" value="<?php echo $row['vehicle_no']; ?>" id="catename" name="catename" readonly>
											</div>
                                            <?php } ?>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form>
    <input type="textbox" name="name" id="name" placeholder="Enter your name"/><br/><br/>
    <?php
    $ret = mysqli_query($con, "SELECT * FROM `subscripted_user` ORDER BY sid DESC LIMIT 1;");
										$cnt = 1;
										while ($row = mysqli_fetch_array($ret)) {?>
    <input type="textbox" name="amt" id="amt" value="<?php echo $row['amount']; ?>" placeholder="Enter amt"/><br/><br/>
    <?php } ?>
    <input type="textbox" name="plan" id="plan" placeholder="Enter plan"/><br/><br/>
    <input type="textbox" name="vehno" id="vehicle_no" placeholder="Enter plan"/><br/><br/>
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
</form>

<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        var plan=jQuery('#plan').val();
        var vehno=jQuery('#vehicle_no').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process1.php',
               data:"amt="+amt+"&name="+name+"&plan="+plan+"&vehicle_no="+vehno,
               success:function(result){
                   var options = {
                        "key": "rzp_test_iTv8DJzXkYaA9V", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process1.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>