<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	// Code for Updating prices
	if(isset($_POST['update']))
	{
	$bwash=$_POST['bwash'];
	$fwash=$_POST['fwash'];
	$pwash=$_POST['pwash'];   
	$swash=$_POST['swash'];
	$bikewash=$_POST['bikewash'];
    $id=1;
    $sql="UPDATE prices set bodywash=:bwash,fullwash=:fwash,premiumwash=:pwash,scooterwash=:swash,bikewash=:bikewash where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bwash',$bwash,PDO::PARAM_STR);
    $query->bindParam(':fwash',$fwash,PDO::PARAM_STR);
    $query->bindParam(':pwash',$pwash,PDO::PARAM_STR);
    $query->bindParam(':swash',$swash,PDO::PARAM_STR);
    $query->bindParam(':bikewash',$bikewash,PDO::PARAM_STR);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    
     echo "<script>alert('Prices Details updated successfully');</script>";
     //echo "<script>window.location.href ='managecar-washingpoints.php'</script>";
    }

    ?>
    

<?php

	$conn=mysqli_connect("localhost","root","","cwmsdb");
$query="SELECT * from prices";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Update Prices</title>

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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Update Prices </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Update Prices</h3>

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="washingpoint" method="post" enctype="multipart/form-data">
								<div class="form-group">
									
									<div class="col-sm-8">
					
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Body Wash Price</label>
									<div class="col-sm-8">
										<input type="number" name="bwash" class="form-control" required placeholder="<?php echo "old price is ".$row['bodywash'];?>">
									</div>
								</div>



                                
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Full Wash Price</label>
									<div class="col-sm-8">
										<input type="number" name="fwash" class="form-control" required placeholder="<?php echo "old price is ".$row['fullwash'];?>">
									</div>
								</div>


                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Premium Wash Price</label>
									<div class="col-sm-8">
										<input type="number" name="pwash" class="form-control" required placeholder="<?php echo "old price is ".$row['premiumwash'];?>">
									</div>
								</div>


                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Scooter Wash Price</label>
									<div class="col-sm-8">
										<input type="number" name="swash" class="form-control" required placeholder="<?php echo "old price is ".$row['scooterwash'];?>">
									</div>
								</div>


                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bike Wash Price</label>
									<div class="col-sm-8">
										<input type="number" name="bikewash" class="form-control" required placeholder="<?php echo "old price is ".$row['bikewash'];?>">
									</div>
								</div>


								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="update" class="btn-primary btn">Update Price</button>

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