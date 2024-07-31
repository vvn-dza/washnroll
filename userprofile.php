
<?php 
error_reporting(E_ERROR | E_PARSE);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> User Profile</title>
   

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <!-- <link href="cssfolder/styles.css" rel="stylesheet"> -->
          <link href="bluecss/style.css" rel="stylesheet">
    </head>

    <body>
<?php include_once('includes/header.php');?>
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Your Account</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
   <?php
   $u=$_SESSION['autousername'];
//    $p=$_SESSION['phoneno'];
//    echo "$p";
//    $e=$_SESSION['email'];
//    echo "$e";
$conn=mysqli_connect("localhost","root","","cwmsdb");
$query="SELECT * from testsign where username='$u'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
?>
<table border="0" class="useertable"> <tr> <td style="font-size:70px"> Hello,
<?php echo $row['username']; ?></td></tr></table>
<br>
<table border="0" class="details">
<tr> <td >
<?php echo" Email  : "; echo $row['email']; ?></td></tr>
<tr> <td>
<?php echo" Contact  : ";echo $row['phoneno']; ?></td></tr>
<tr> <td>
<?php echo" Vehicle number  : ";echo $row['vehicleno']; ?></td></tr>
<tr><td>Address:</td></tr>
<tr> <td>
<?php echo $row['addr']; ?></td></tr>
</table>
<br>
<br>
<br>
<h1 style="transform: translateX(20px);"> Your Booking details are as follows:</h1>
<?php 
if($row==0)
{
    echo "YOU ARE NOT A MEMBER YET ! ";
    echo "  Kindly register"
 ?><a href="userlog.php"> here</a>   
<?php }
else
{
    $p=$row['phoneno'];
    
$query="SELECT * from tblcarwashbooking where fullName='$u' OR mobileNumber='$p'";
$result=mysqli_query($conn,$query);

}
while($row=mysqli_fetch_assoc($result))
{
?>

<table border="3" class="tablecss">
<tr><th>Booking ID</th><th>Package Type</th><th>Price</th><th>Vehicle number</th><th>Wash date</th><th>Wash time</th><th>Payment mode</th><th>tax number</th><th>posting date</th><th>Admin remarks</th><th>status</th></tr>
<tr class="">
<td  style="dispaly:hidden;"> <?php echo $row['bookingId'];?></td>
<td  style="dispaly:hidden;"> <?php echo $row['packageType'];?></td>
<td  style="dispaly:hidden;"> <?php echo $row['price'];?></td>
<!-- <td  style="dispaly:hidden;"> <?php echo $row['carWashPoint'];?></td> -->
<td  style="dispaly:hidden;"> <?php echo $row['regno'];?></td>
    <td  style="dispaly:hidden;"> <?php echo $row['washDate'];?></td>
<td  style="dispaly:hidden;"> <?php echo $row['washTime'];?></td>
<td  style="dispaly:hidden;"> <?php echo $row['paymentMode'];?></td>
<td  style="dispaly:hidden;"> <?php echo $row['txnNumber'];?></td>
<td  style="dispaly:hidden;"> <?php echo $row['postingDate'];?></td>
<td  style="dispaly:hidden;"> <?php echo $row['adminRemark'];?></td>
<td  style="dispaly:hidden;width:10%"> <?php echo $row['status'];?></td>


</tr>
<br>
</table>

<?php } ?>
   

  

<?php include_once('includes/footer.php');?>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
<style>
.tablecss
{
    background-color:#2a208b;
    color:white;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    text-align: center;
    /* width:70%; */
    transform: translateX(20px);
    
}

.useertable
{
 
   color:#2a208b;
   text-align: center;
   transform: translateX(20px);
}

.details
{
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    font-size: 20px;
    /* background:wheat; */
    transform: translateX(20px);
    padding-left: 10px;
    border-radius: 2px solid black;
}

body
{
    background-color:whitesmoke;
}


</style>