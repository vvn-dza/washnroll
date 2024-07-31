<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 






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

}



</style>
<title> Reports</title>
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



<!-- testing -->


<!--  -->


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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i> Reports</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->

				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Reports</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>Weekly Profits.</th>
						  <th>Weekly Bodywashes.</th>
						  <th>Weekly Full Washes.</th>
						  <th>Weekly Premium Washes.</th>
						  <th>Weekly Scooter Washes.</th>

						  <th>Weekly Bike Washes</th>
						 
							
							
						  </tr>
						</thead>
						<tbody>
					

<?php $sql = "SELECT SUM(price) AS profits from tblcarwashbooking where status='Completed' and washDate >= DATE_SUB(NOW(), INTERVAL 1 WEEK) ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($result->profits);?>Rs</td>
																		
<?php } ?>

						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>


						 <?php $sql = "SELECT COUNT(*) AS count_of_wbodywash FROM tblcarwashbooking WHERE packageType ='bodywash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_wbodywash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>


<!-- week body wash end -->


						 <!-- week full wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_wfullwash FROM tblcarwashbooking WHERE packageType ='fullwash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_wfullwash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- week full wash count end -->





						 

						 <!-- week premium wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_wpremiumwash FROM tblcarwashbooking WHERE packageType ='premiumwash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_wpremiumwash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- week premium wash count end -->




						 <!-- week scooter wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_wscooterwash FROM tblcarwashbooking WHERE packageType ='scooterwash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_wscooterwash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- week scooter wash count end -->




						 <!-- week bike wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_wbikewash FROM tblcarwashbooking WHERE packageType ='bikewash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_wbikewash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- week bike wash count end -->






						 <table id="table">
						<thead>
						  <tr>
						  <th>Monthly Profits.</th>
						  <th>Monthly Body Washes.</th>
						  <th>Monthly Fullwashes.</th>
						  <th>Monthly Premium Washes.</th>
						  <th>Monthly Scooter Washes.</th>
						  <th>Monthly Bike Washes.</th>

							
							<!-- <th>Wash type</th> -->
							<!-- <th width="200">Pacakge Type</th>
							<th>Location </th>
							<th>Washing Date/Time </th>
							<th width="200">Posting date </th>
							<th>Action </th> -->
							
						  </tr>
						</thead>



						<?php $sql = "SELECT SUM(price) AS mprofits from tblcarwashbooking where status='Completed' and washDate >= DATE_SUB(NOW(), INTERVAL 1 MONTH) ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($result->mprofits);?>RS</td>
							

					
								
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>


<!-- monthly sql start -->
<!-- monthly body wash -->



<?php $sql = "SELECT COUNT(*) AS count_of_mbodywash FROM tblcarwashbooking WHERE packageType ='bodywash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_mbodywash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>


<!-- week body wash end -->


						 <!-- month full wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_mfullwash FROM tblcarwashbooking WHERE packageType ='fullwash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$query = $dbh -> prepare($sql);;
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_mfullwash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- month full wash count end -->





						 

						 <!-- month premium wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_mpremiumwash FROM tblcarwashbooking WHERE packageType ='premiumwash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_mpremiumwash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- month premium wash count end -->




						 <!-- month scooter wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_mscooterwash FROM tblcarwashbooking WHERE packageType ='scooterwash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_mscooterwash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- month scooter wash count end -->




						 <!-- month bike wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_mbikewash FROM tblcarwashbooking WHERE packageType ='bikewash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_mbikewash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- week bike wash count end -->









<!-- monthly sql end -->


<!-- YEARLY START -->



<table id="table">
						<thead>
						  <tr>
						  <th>Annual Profits.</th>
						  <th>Annual Body Washes.</th>
						  <th>Annual Fullwashes.</th>
						  <th>Annual Premium Washes.</th>
						  <th>Annual Scooter Washes.</th>
						  <th>Annual Bike Washes.</th>

					
							
						  </tr>
						</thead>




<!-- year sql start -->


<?php $sql = "SELECT SUM(price) AS yprofits from tblcarwashbooking where status='Completed' and washDate >= DATE_SUB(NOW(), INTERVAL 1 YEAR) ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($result->yprofits);?>RS</td>
							

					
								
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>


<!-- monthly sql start -->
<!-- YEARLY body wash -->



<?php $sql = "SELECT COUNT(*) AS count_of_ybodywash FROM tblcarwashbooking WHERE packageType ='bodywash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_ybodywash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>


<!-- year body wash end -->


						 <!-- year full wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_yfullwash FROM tblcarwashbooking WHERE packageType ='fullwash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)";
$query = $dbh -> prepare($sql);;
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_yfullwash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- YEAR full wash count end -->





						 

						 <!-- YEAR premium wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_ypremiumwash FROM tblcarwashbooking WHERE packageType ='premiumwash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_ypremiumwash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- YEAR premium wash count end -->




						 <!-- YEAR scooter wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_yscooterwash FROM tblcarwashbooking WHERE packageType ='scooterwash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_yscooterwash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- YEAR scooter wash count end -->




						 <!-- YEAR bike wash count -->


						 <?php $sql = "SELECT COUNT(*) AS count_of_ybikewash FROM tblcarwashbooking WHERE packageType ='bikewash' AND status = 'completed' AND washDate >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						
							<td><?php echo htmlentities($result->count_of_ybikewash);?></td>
																		
<?php } ?>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>



						 <!-- year bike wash count end -->








<!-- year sql end  -->






						</tbody>
					  </table>
					</div>
				  </table>
	
			</div>

			
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

<div align="center">
<button id="print"> Print</button>

</div>
<script>

    const printBtn=document.getElementById('print');
    printBtn.addEventListener('click',function(){
        print();
    })
</script>





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