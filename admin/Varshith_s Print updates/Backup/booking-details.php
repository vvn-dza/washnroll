<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$id=$_GET['bid'];
$ttype=$_POST['txntype'];
$transactionno=$_POST['transactionno'];	
$message=$_POST['message'];

$sql="update  tblcarwashbooking set adminRemark=:message,paymentMode=:ttype,txnNumber=:transactionno,status='Completed' where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':ttype',$ttype,PDO::PARAM_STR);
$query->bindParam(':transactionno',$transactionno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

 echo "<script>alert('Booking successfully completed');</script>";
 //echo "<script>window.location.href ='managecar-washingpoints.php'</script>";
}


// code for cancellation


	if(isset($_POST['cancel']))
	{
	$id=$_GET['bid'];
	$ttype=$_POST['txntype'];
	$transactionno=$_POST['transactionno'];	
	$message=$_POST['message'];
	
	$sql="update  tblcarwashbooking set adminRemark=:message,paymentMode=:ttype,txnNumber=:transactionno,status='Cancelled' where id=:id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':ttype',$ttype,PDO::PARAM_STR);
	$query->bindParam(':transactionno',$transactionno,PDO::PARAM_STR);
	$query->bindParam(':message',$message,PDO::PARAM_STR);
	$query->bindParam(':id',$id,PDO::PARAM_STR);
	$query->execute();
	
	 echo "<script>alert('Booking successfully cancelled');</script>";
	 //echo "<script>window.location.href ='managecar-washingpoints.php'</script>";
	}






	?>
<!DOCTYPE HTML>
<html>
<head>

<style>

@media print {
    #print{
        display:none;
    }
	.breadcrumb
	{
		display:none;		
	}


	.btn-primary
	{
		display:none;		
	}
}



</style>
<title> Bookings Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Bookings</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->

				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Bookings Details #<?php echo $_GET['bookingid'];?></h2>
					    <table id="table">
				
						</thead>
						<tbody>
<?php 
$bid=$_GET['bid'];
$sql = "SELECT * from tblcarwashbooking
join tblwashingpoints on tblwashingpoints.id=tblcarwashbooking.carWashPoint
 where tblcarwashbooking.id='$bid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
						  	<th width="200">Booking Id#</th>
							<td><?php echo htmlentities($result->bookingId);?></td>
							<th>Posting Date</th>
								<td><?php echo htmlentities($result->postingDate);?></td>
						</tr>
						<tr>
							<th>Name</th>
							<td width="300"><?php echo htmlentities($result->fullName);?></td>
							<th>Mobile No</th>
							<td><?php echo htmlentities($result->mobileNumber);?></td>
						</tr>
						<tr>
							<th>Package Type</th>
								<td>
								<?php $ptype=$result->packageType;
if($ptype=="bodywash"): echo "BODY WASH (400RS)";endif;
if($ptype=="fullwash"): echo "FULL WASH (500RS)";endif;
if($ptype=="premiumwash"): echo "PREMIUM WASH (600RS)";endif;
if($ptype=="scooterwash"): echo "SCOOTER WASH (150RS)";endif;
if($ptype=="bikewash"): echo "BIKE WASH(250RS)";endif;


							?></td>
							
						<th>Location </th>
							<td><?php echo htmlentities($result->washingPointName	);?><br />
								<?php echo htmlentities($result->address);?></td>
								

							</tr>
							<tr>
								<th>Washing Date</th>
							<td><?php echo htmlentities($result->washDate);?></td>

							

							<th>Washing Time</th>
							<td><?php echo htmlentities($result->washTime);?></td>
							</tr>
							<tr>


								<th>Message (if Any)</th>
<td colspan="3"><?php echo htmlentities($result->message);?></td>
							</tr>




							<!-- new stuff -->


							<th>Payment Mode</th>
<td colspan="3"><?php echo htmlentities($result->paymentMode);?></td>
							</tr>



							<th>Vehicle Registration</th>
							<td><?php echo htmlentities($result->regno);?></td>
							
					<tr>
								<th>Status</th>
<td colspan="3"><?php echo htmlentities($result->status);?></td>
							</tr>
<?php if($result->adminRemark==''): ?>
	<tr>
		<td colspan="3">
	<button data-toggle="modal" data-target="#myModal" class="btn-primary btn">Complete Booking</button>
</td>

<td colspan="3">
<button id="print"  class="btn-secondary btn"> Print</button>


<td colspan="3">
	<button data-toggle="modal" data-target="#myModal2" class="btn-primary btn">Cancel/Refund Booking</button>
</td>







</tr>
<?php  else:?>

<tr>
	<td colspan="4" style="color:blue; font-size:22px; text-align:center; font-weight:bold;">Admin Details</td>
</tr>

<tr>
	<th>Transaction Type</th>
	<td><?php echo htmlentities($result->paymentMode);?></td>
		<th>Transaction No.(if any)</th>
	<td><?php echo htmlentities($result->txnNumber);?></td>
</tr>
<tr>
	<th>Admin Remark</th>
	<td colspan="3"><?php echo htmlentities($result->adminRemark);?></td>
</tr>
<?php endif;?>

						 <?php } }  ?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>


<!--Model for update-->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Booking #<?php echo $_GET['bookingid'];?></h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="txntype" required class="form-control">
                <option value="">Payment Type</option>
                <option value="e-Wallet">Wallet</option>
                 <option value="UPI">UPI</option>
                  <option value="Debit/Credit Card">Debit/Credit Card</option>
                   <option value="Cash">Cash</option>
                    <option value="Other">Other</option>
              </select>

       
         
            <p><input type="text" name="transactionno" class="form-control"   placeholder="Transaction Number (if any)"></p>
       
             <p><textarea name="message"  class="form-control" placeholder="Admin Remark" required></textarea></p>
             <p><input type="submit" class="btn btn-custom" name="update" value="Update"></p>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



  
<!--Model for cancellation-->
 <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cancel Booking #<?php echo $_GET['bookingid'];?></h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="txntype" required class="form-control">
                <option value="">Payment Type</option>
                <option value="E-Wallet Refund">Wallet Refund</option>
                 <option value="UPI Refund">UPI Refunded</option>
                  <option value="Debit/Credit Card Refund">Debit/Credit Card</option>
                   <option value="Cash Refund">Cash Refund</option>
                    <option value="Other">Other</option>
              </select>

       
         
            <p><input type="text" name="transactionno" class="form-control"   placeholder="Transaction Number (if any)"></p>
       
             <p><textarea name="message"  class="form-control" placeholder="Admin Remark" required></textarea></p>
             <p><input type="submit" class="btn btn-custom" name="cancel" value="Cancel Booking"></p>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<!-- modal for cancellation end -->







<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>


</div>




<script>

    const printBtn=document.getElementById('print');
    printBtn.addEventListener('click',function(){
        print();
    })
</script>

