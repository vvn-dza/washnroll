<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	// Code for Booking
	if(isset($_POST['book']))
	{
	$ptype=$_POST['packagetype'];
	$pprice=$_POST['pprice'];
	$wpoint=$_POST['washingpoint'];   
	$fname=$_POST['fname'];
	$mobile=$_POST['contactno'];
	$regno=$_POST['regno'];
	$date=$_POST['washdate'];
	$time=$_POST['washtime'];
	$message=$_POST['message'];
	$address=$_POST['address'];

	$paytype=$_POST['txntype'];

	$status='New';
	$bno=mt_rand(100000000, 999999999);
	$sql="INSERT INTO tblcarwashbooking(bookingId,packageType,price,carWashPoint,fullName,mobileNumber,regno,washDate,washTime,paymentMode,message,address,status) VALUES(:bno,:ptype,:pprice,:wpoint,:fname,:mobile,:regno,:date,:time,:paytype,:message,:address,:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':bno',$bno,PDO::PARAM_STR);
	$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
	$query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
	$query->bindParam(':wpoint',$wpoint,PDO::PARAM_STR);
	$query->bindParam(':fname',$fname,PDO::PARAM_STR);
	$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
	$query->bindParam(':regno',$regno,PDO::PARAM_STR);
	$query->bindParam(':date',$date,PDO::PARAM_STR);


	$query->bindParam(':paytype',$paytype,PDO::PARAM_STR);


	$query->bindParam(':time',$time,PDO::PARAM_STR);
	$query->bindParam(':message',$message,PDO::PARAM_STR);
	$query->bindParam(':address',$address,PDO::PARAM_STR);
	$query->bindParam(':status',$status,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
	 
	  echo '<script>alert("Your booking done successfully. Booking number is "+"'.$bno.'")</script>';
	 echo "<script>window.location.href ='new-booking.php'</script>";
	}
	else 
	{
	 echo "<script>alert('Something went wrong. Please try again.');</script>";
	}
	
	}

	$conn=mysqli_connect("localhost","root","","cwmsdb");
	$query="SELECT * from prices";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($result);





	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Vehicle Washing Booking</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Add Vehicle Washing Booking </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Add Vehicle Washing Booking</h3>

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="washingpoint" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
									<div class="col-sm-8">
								 <select name="packagetype" required class="form-control">
                <option value="">Package Type</option>
                <option value="bodywash">BODY WASH Rs <?php echo $row['bodywash'];?></option>
                 <option value="fullwash">FULL WASH Rs <?php echo $row['fullwash'];?></option>
                  <option value="premiumwash">PREMIUM WASH Rs <?php echo $row['premiumwash'];?></option>
				  <option value="scooterwash">SCOOTER WASH Rs <?php echo $row['scooterwash'];?></option>
				  <option value="bikewash">BIKE WASH Rs <?php echo $row['bikewash'];?></option>
              </select>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Price</label>
									<div class="col-sm-8">
										<input type="number" name="pprice" class="form-control"pattern="[0-9]" required placeholder="Enter the price">
									</div>
								</div>







<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location</label>
									<div class="col-sm-8">
								<select name="washingpoint" required class="form-control">
                <option value="">Select Customer Location</option>
<?php $sql = "SELECT * from tblwashingpoints";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{               ?>  
    <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->washingPointName);?> </option>
<?php } ?>
            </select>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Full Name</label>
									<div class="col-sm-8">
										<input type="text" name="fname" class="form-control" pattern="[a-zA-Z ]{3,20}" required placeholder="Full Name">
									</div>
								</div>



								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile No</label>
									<div class="col-sm-8">
										<input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No.">
									</div>
								</div>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Vehicle No</label>
									<div class="col-sm-8">
										<input type="text" name="regno" class="form-control"
										pattern="[a-zA-Z0-9]{3,10}"
										title="Entered vehicle number is not correct " required placeholder="Vehicle No.">
									</div>
								</div>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Wash Date</label>
									<div class="col-sm-8">
									<input type="date" name="washdate" required class="form-control">
									</div>
								</div>

	

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Wash Time Slot</label>
									<div class="col-sm-8">
										<select name="washtime" required class="form-control">
<option value="09-10am">9am - 10am</option>'
<option value="10-11am">10am - 11am</option>
<option value="11-12pm">11am - 12pm</option>
<option value="12-01pm">12pm - 01pm</option>
<option value="01-02pm">01pm - 02pm</option>
<option value="02-03pm">02pm - 03pm</option>
<option value="03-04pm">03pm - 04pm</option>
<option value="04-05pm">04pm - 05pm</option>
<option value="05-06pm">05pm - 06pm</option>

</select>

									</div>
								</div>


								<div class="form-group">
									<label for="focusedinput" required class="col-sm-2 control-label">ADDRRESS</label>
									<div class="col-sm-8">
								<textarea name="address"  class="form-control" placeholder="Enter address"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Message (if any)</label>
									<div class="col-sm-8">
								<textarea name="message"  class="form-control" maxlength="200" placeholder="Message if any"></textarea>
									</div>
								</div>


								<div class="form-group">
								<label for="focusedinput" required class="col-sm-2 control-label">Payment Type</label>
								<div class="col-sm-8">
								<select name="txntype" required class="form-control">
                <option value="">Payment Type</option>
                <option value="Debit/Credit Card">Debit/Credit Card</option>
                <option value="Cash">Cash</option>
                <option value="e-Wallet">Wallet</option>
                 <option value="UPI">UPI</option>
                    <option value="Other">Other</option>
              </select>

</div>
								</div>
	

					
								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="book" class="btn-primary btn">Add</button>

				<button type="reset" class="btn-inverse btn">Reset</button>
			</div>
		</div>
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

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