<?php error_reporting(0);
include('includes/config.php'); 
session_start();
date_default_timezone_set('Asia/Kolkata');
// Code Start for body wash 1 and fetching price from db

$conn=mysqli_connect("localhost","root","","cwmsdb");
$query="SELECT * from prices";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
?>


<!-- session testing -->

<?php
    $u=$_SESSION['autousername'];
//    $p=$_SESSION['phoneno'];
//    echo "$p";
//    $e=$_SESSION['email'];
//    echo "$e";
$conn=mysqli_connect("localhost","root","","cwmsdb");
$query="SELECT * from testsign where username='$u'";
$result=mysqli_query($conn,$query);
$ses=mysqli_fetch_assoc($result);

$_SESSION['phoneno'] = $ses['phoneno'];
$_SESSION['uname'] = $ses['username'];
$_SESSION['vno'] = $ses['vehicleno'];
$_SESSION['saddr'] = $ses['addr'];
$_SESSION['washemail'] = $ses['email'];
?>


<!-- session testing end -->


<?php

if(isset($_POST['book1']))
{
$ptype=$_POST['packagetype'];
$price=$row['bodywash'];
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
$sql="INSERT INTO tblcarwashbooking(bookingId,packageType,price,carWashPoint,fullName,mobileNumber,regno,washDate,washTime,paymentMode,message,address,status) VALUES(:bno,:ptype,:price,:wpoint,:fname,:mobile,:regno,:date,:time,:paytype,:message,:address,:status)";

$query = $dbh->prepare($sql);
$query->bindParam(':bno',$bno,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
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

// testing for cod

if($lastInsertId && $_POST['txntype']=="Cash")
{
 
  echo '<script>alert("Your wash booking is scheduled on, ' . $date . ' at  ' . $time . '  Our staff will contact you shortly..");</script>';
  // echo '<script>alert("Your wash booking done successfully. Booking number is "+"'.$bno.'")</script>';
  echo '<script>window.location = "http://localhost/cwms/razorpay/success.php";</script>';
  

//  echo "<script>window.location.href ='washing-plans.php'</script>";
}


else if($lastInsertId)
{
    echo '<script>alert("Your wash booking is scheduled on, ' . $date . ' at  ' . $time . '");</script>';
    // echo '<script>alert("Your wash booking done successfully. Booking number is "+"'.$bno.'")</script>';
    echo '<script>window.location = "http://localhost/cwms/razorpay/index.php";</script>';
  
}

else 
{
 echo "<script>alert('Something went wrong. Please try again.');</script>";
}



}

// testing end









// if($lastInsertId)
// {
 
//   echo '<script>alert("Your wash booking is scheduled on, ' . $date . ' at  ' . $time . ' Kindly make payment here");</script>';
//   // echo '<script>alert("Your wash booking done successfully. Booking number is "+"'.$bno.'")</script>';
//   echo '<script>window.location = "http://localhost/cwms/razorpay/index.php";</script>';
  

// //  echo "<script>window.location.href ='washing-plans.php'</script>";
// }
// else 
// {
//  echo "<script>alert('Something went wrong. Please try again.');</script>";
// }

// }



// Code end for body wash


// code start for full wash 2



if(isset($_POST['book2']))
{
$ptype=$_POST['packagetype'];
$price=$row['fullwash'];
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
$sql="INSERT INTO tblcarwashbooking(bookingId,packageType,price,carWashPoint,fullName,mobileNumber,regno,washDate,washTime,paymentMode,message,address,status) VALUES(:bno,:ptype,:price,:wpoint,:fname,:mobile,:regno,:date,:time,:paytype,:message,:address,:status)";

$query = $dbh->prepare($sql);
$query->bindParam(':bno',$bno,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
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



// testing for cod

if($lastInsertId && $_POST['txntype']=="Cash")
{
 
  echo '<script>alert("Your wash booking is scheduled on, ' . $date . ' at  ' . $time . '  Our staff will contact you shortly..");</script>';
  // echo '<script>alert("Your wash booking done successfully. Booking number is "+"'.$bno.'")</script>';
  echo '<script>window.location = "http://localhost/cwms/razorpay/success.php";</script>';
  

//  echo "<script>window.location.href ='washing-plans.php'</script>";
}


else if($lastInsertId)
{
    echo '<script>alert("Your wash booking is scheduled on, ' . $date . ' at  ' . $time . '");</script>';
    // echo '<script>alert("Your wash booking done successfully. Booking number is "+"'.$bno.'")</script>';
    echo '<script>window.location = "http://localhost/cwms/razorpay/index.php";</script>';
  
}

else 
{
 echo "<script>alert('Something went wrong. Please try again.');</script>";
}



}

// testing end




// code end for full wash



//  code start for premium wash



if(isset($_POST['book3']))
{
$ptype=$_POST['packagetype'];
$price=$row['premiumwash'];
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
$sql="INSERT INTO tblcarwashbooking(bookingId,packageType,price,carWashPoint,fullName,mobileNumber,regno,washDate,washTime,paymentMode,message,address,status) VALUES(:bno,:ptype,:price,:wpoint,:fname,:mobile,:regno,:date,:time,:paytype,:message,:address,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':bno',$bno,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
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


// testing for cod

if($lastInsertId && $_POST['txntype']=="Cash")
{
 
  echo '<script>alert("Your wash booking is scheduled on, ' . $date . ' at  ' . $time . '  Our staff will contact you shortly..");</script>';
  // echo '<script>alert("Your wash booking done successfully. Booking number is "+"'.$bno.'")</script>';
  echo '<script>window.location = "http://localhost/cwms/razorpay/success.php";</script>';
  

//  echo "<script>window.location.href ='washing-plans.php'</script>";
}


else if($lastInsertId)
{
    echo '<script>alert("Your wash booking is scheduled on, ' . $date . ' at  ' . $time . '");</script>';
    // echo '<script>alert("Your wash booking done successfully. Booking number is "+"'.$bno.'")</script>';
    echo '<script>window.location = "http://localhost/cwms/razorpay/index.php";</script>';
  
}

else 
{
 echo "<script>alert('Something went wrong. Please try again.');</script>";
}



}

// testing end



// code end  for premium wash


$_SESSION['washprice'] = $price;
$_SESSION['washbno'] = $bno;
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>4 Wheeler Washing Plans</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

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
                        <h2>Washing Plan</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="washing-plans.php">Price</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Price Start -->
        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Washing Plan</p>
                    <h2>Hatchbacks & Sedans  </h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="price-header">
                                <h3>Body Wash</h3>
                                <h2>₹<strong><?php echo $row['bodywash'];?></strong></h2>
                            </div>
                            <div class="price-body">
							
						
							
							
                                <ul>
                                <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Window Wiping</li>
                                <!-- <li><i class="far fa-check-circle"></i>Tire Shine</li> -->
                                <li><i class="far fa-times-circle"></i>Interior Wet Cleaning</li>
                                <li><i class="far fa-times-circle"></i>Seats Washing</li>
                                <li><i class="far fa-times-circle"></i>Vacuum Cleaning</li>
                                <li><i class="far fa-times-circle"></i>9H Nano Ceramic Coating</li>
									<li><i class="far fa-times-circle"></i>- Paint Protection FiLm  (PPF)</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom"  data-toggle="modal" data-target="#myModal1">Book Now</a>
                            </div>
                        </div>
                    </div>
					
					
					                    <div class="col-md-4">
                        <div class="price-item featured-item ">
                            <div class="price-header">
                                <h3>FULL WASH</h3>
                                <h2>₹<strong><?php echo $row['fullwash'];?></strong></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Window Wiping</li>
                                    <li><i class="far fa-times-circle"></i>9H Nano Ceramic Coating</li>
									<li><i class="far fa-times-circle"></i>- Paint Protection FiLm  (PPF)</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom"  data-toggle="modal" data-target="#myModal2">Book Now</a>
                            </div>
                        </div>
                    </div>
					
					
					
					
					
					
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="price-header">
                                <h3>PREMIUM WASH</h3>
                                <h2>₹<strong><?php echo $row['premiumwash'];?></strong></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                    <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Window Wiping</li>
                                    <li><i class="far fa-check-circle"></i>9H Nano Ceramic Coating</li>
									<li><i class="far fa-check-circle"></i>- Paint Protection FiLm  (PPF)</li>

                                
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom" data-toggle="modal" data-target="#myModal3">Book Now</a>
                            </div>
                        </div>
                    </div>
                    
					
					
					
					
					
                </div>
            </div>
        </div>
        <!-- Price End -->
        
       <?php include_once('includes/footer.php');?>

<!--Model1 start-->
 <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Body Wash Booking</h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>Package Type
            <select name="packagetype" required class="form-control">
                <!-- <option value="">Select your Package Type</option> -->
                <option value="bodywash">BODY WASH <?php echo '₹'.$row['bodywash'];?></option>
                 <!-- <option value="2">FULL WASH (₹500)</option> -->
                  <!-- <option value="3 ">PREMIUM WASH (₹600)</option> -->
              </select>

          <p>Wash Location
            <select name="washingpoint" required class="form-control">
                <option value="">Select your Location</option>
<?php $sql = "SELECT * from tblwashingpoints";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{               ?>  
    <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->washingPointName);?></option>
<?php } ?>
            </select></p>
            <p>Name<input type="text" name="fname" value="<?php echo $_SESSION['uname'];?>" class="form-control"pattern="[a-zA-Z ]{3,20}" title="No numbers and special characters allowed" required placeholder="Enter Full Name" readonly></p>
            <p>Contact No:<input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" value="<?php echo $_SESSION['phoneno'];?>" required placeholder="Enter Mobile No." readonly></p>
            <p>Vehicle Number <br /><input type="text" value="<?php echo $_SESSION['vno'];?>" name="regno" required class="form-control" pattern="[a-zA-Z0-9]{3,10}" title="Enter valid vehicle number" ></p>

            <?php
$min_date = date('Y-m-d'); // get the current date in the format required by the date picker
?>


            <p>Wash Dates <br /><input type="date" name="washdate" required  class="form-control"  min="<?php echo $min_date; ?>"></p>


            <?php
$currentTime = date('H:i');
 echo"Current time is.$currentTime";
 ?>

<p>Choose your time slot</p>
<select id="myDropdown1" name="washtime" class="form-control">
<?php
$currentTime = date('H:i'); // get the current time in the format of hours:minutes
// echo $currentTime;
if ($currentTime >= '08:00' && $currentTime < '09:00')
 {
    // morning options
    // echo '<option value="08-09am">8am - 9am</option>';
    echo '<option value="09-10am">9am - 10am</option>';
    echo '<option value="10-11am">10am - 11am</option>';
    echo '<option value="11-12pm">11am - 12pm</option>';
    echo '<option value="12-01pm">12pm - 01pm</option>';
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
}

elseif ($currentTime >= '09:00' && $currentTime < '10:00') 
{
    echo '<option value="10-11am">10am - 11am</option>';
    echo '<option value="11-12pm">11am - 12pm</option>';
    echo '<option value="12-01pm">12pm - 01pm</option>';
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 

elseif ($currentTime >= '10:00' && $currentTime < '11:00') 
{
    
    echo '<option value="11-12pm">11am - 12pm</option>';
    echo '<option value="12-01pm">12pm - 01pm</option>';
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 

elseif ($currentTime >= '11:00' && $currentTime < '12:00') 
{
  
    echo '<option value="12-01pm">12pm - 01pm</option>';
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 

elseif ($currentTime >= '12:00' && $currentTime < '13:00') 
{
   
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 

elseif ($currentTime >= '13:00' && $currentTime < '14:00') 
{
    
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 

elseif ($currentTime >= '14:00' && $currentTime < '15:00') 
{
   
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 

elseif ($currentTime >= '15:00' && $currentTime < '16:00') 
{
   
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 

elseif ($currentTime >= '16:00' && $currentTime < '17:00') 
{
   
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 

else {

    echo '<option value="11">No timeslots</option>';

}
?>
</select>



             <p>Address<input type="text" name="address" required class="form-control" placeholder="Enter your address" maxlength="200" readonly value="<?php echo $_SESSION['saddr'];?>"</p>
             <p><input type="text" name="message"  class="form-control" placeholder="Message if any" maxlength="200"></textarea></p>

<!-- payment choice -->

<select name="txntype" required class="form-control">
                <option value="">Payment Type</option>
                <option value="Debit/Credit Card">Debit/Credit Card</option>
                <option value="Cash">Cash</option>
                <option value="e-Wallet">Wallet</option>
                 <option value="UPI">UPI</option>
                    <option value="Other">Other</option>
              </select>


<!--  payment choice end-->

             

            <center> <p><input type="submit"  class="btn btn-custom" id="disabletest1" name="book1" value="Book Now">
             <input type="reset" class="btn btn-custom" name="reset" value="Reset"></p><center>
      </form>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>
<!-- model 1 end -->




<!-- MODEL2 -->


<!--Model 2start-->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Full Wash Booking</h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="packagetype" required class="form-control">
                <!-- <option value="">Select your Package Type</option> -->
                <!-- <option value="1">BODY WASH (₹400)</option> -->
                 <option value="fullwash">FULL WASH <?php echo '₹'.$row['fullwash'];?></option>
                  <!-- <option value="3 ">PREMIUM WASH (₹600)</option> -->
              </select>

          <p>
            <select name="washingpoint" required class="form-control">
                <option value="">Select your location</option>
<?php $sql = "SELECT * from tblwashingpoints";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{               ?>  
    <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->washingPointName);?></option>
<?php } ?>
            </select></p>
            <p>Name<input type="text" name="fname" class="form-control"pattern="[a-zA-Z ]{3,20}" title="No numbers and special characters allowed" required placeholder="Enter Full Name" value="<?php echo $_SESSION['uname'];?>" readonly></p>
            <p>Mobile number<input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Enter Mobile No." value="<?php echo $_SESSION['phoneno'];?>" readonly></p>
            <p>Vehicle Number <br /><input type="text" name="regno" required class="form-control" pattern="[a-zA-Z0-9]{3,10}" title="Enter valid vehicle number" value="<?php echo $_SESSION['vno'];?>" ></p>

            <p>Wash Dates <br /><input type="date" name="washdate" required  class="form-control"  min="<?php echo $min_date; ?>"></p>


            <?php
$currentTime = date('H:i');
 echo"Current time is.$currentTime";
 ?>

<p>Choose your time slot</p>
<select id="myDropdown2" name="washtime" class="form-control">
<?php
$currentTime = date('H:i'); // get the current time in the format of hours:minutes
// echo $currentTime;
if ($currentTime >= '18:00' && $currentTime < '19:00')
 {
    // morning options
    // echo '<option value="08-09am">8am - 9am</option>';
    echo '<option value="09-10am">9am - 10am</option>';
    echo '<option value="10-11am">10am - 11am</option>';
    echo '<option value="11-12pm">11am - 12pm</option>';
    echo '<option value="12-01pm">12pm - 01pm</option>';
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
}

elseif ($currentTime >= '09:00' && $currentTime < '10:00') 
{
    echo '<option value="10-11am">10am - 11am</option>';
    echo '<option value="11-12pm">11am - 12pm</option>';
    echo '<option value="12-01pm">12pm - 01pm</option>';
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 


elseif ($currentTime >= '10:00' && $currentTime < '11:00') 
{
    
    echo '<option value="11-12pm">11am - 12pm</option>';
    echo '<option value="12-01pm">12pm - 01pm</option>';
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 


elseif ($currentTime >= '11:00' && $currentTime < '12:00') 
{
  
    echo '<option value="12-01pm">12pm - 01pm</option>';
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 


elseif ($currentTime >= '12:00' && $currentTime < '13:00') 
{
   
    echo '<option value="01-02pm">01pm - 02pm</option>';
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 



elseif ($currentTime >= '13:00' && $currentTime < '14:00') 
{
    
    echo '<option value="02-03pm">02pm - 03pm</option>';
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 



elseif ($currentTime >= '14:00' && $currentTime < '15:00') 
{
   
    echo '<option value="03-04pm">03pm - 04pm</option>';
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 



elseif ($currentTime >= '15:00' && $currentTime < '16:00') 
{
   
    echo '<option value="04-05pm">04pm - 05pm</option>';
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 



elseif ($currentTime >= '16:00' && $currentTime < '17:00') 
{
   
    echo '<option value="05-06pm">05pm - 06pm</option>';
} 


else {
    // evening options
    echo '<option value="11">No timeslots</option>';
    // echo '<option value="6">Option 6</option>';
}
?>
</select>



             <!-- <p>Wash Time <br /><input type="time" name="washtime" required class="form-control"></p> -->



             <p>Address<input type="text" name="address" required class="form-control" placeholder="Enter your address" maxlength="200" readonly value="<?php echo $_SESSION['saddr'];?>"</p>
             <p><input type="text" name="message"  class="form-control" placeholder="Message if any" maxlength="200"></p>




<!-- payment choice -->

<select name="txntype" required class="form-control">
                <option value="">Payment Type</option>
                <option value="Debit/Credit Card">Debit/Credit Card</option>
                <option value="Cash">Cash</option>
                <option value="e-Wallet">Wallet</option>
                 <option value="UPI">UPI</option>
                    <option value="Other">Other</option>
              </select>


<!--  payment choice end-->



            <center> <p><input type="submit" class="btn btn-custom" id="disabletest2" name="book2" value="Book Now">
             <input type="reset" class="btn btn-custom" name="reset" value="Reset"></p><center>
      </form>
        </div>
        
      </div>
      
    </div>
  </div>

<!-- model 2 end -->

<!-- model 3 -->




<!--Model3-->
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Premium Wash Booking</h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="packagetype" required class="form-control">
                <!-- <option value="">Select your Package Type</option> -->
                <!-- <option value="1">BODY WASH (₹400)</option> -->
                 <!-- <option value="2">FULL WASH (₹500)</option> -->
                  <option value="premiumwash">PREMIUM WASH  <?php echo '₹'.$row['premiumwash'];?></option>
              </select>

          <p>
            <select name="washingpoint" required class="form-control">
                <option value="">Select your location</option>
<?php $sql = "SELECT * from tblwashingpoints";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{               ?>  
    <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->washingPointName);?></option>
<?php } ?>
            </select></p>
            <p>Name<input type="text" name="fname" class="form-control"pattern="[a-zA-Z ]{3,20}" title="No numbers and special characters allowed" required placeholder="Enter Full Name" value="<?php echo $_SESSION['uname'];?>" readonly></p>
            <p>Contact No:<input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Enter Mobile No." value="<?php echo $_SESSION['phoneno'];?>" readonly></p>
            <p>Vehicle Number: <br /><input type="text" name="regno" required class="form-control" pattern="[a-zA-Z0-9]{3,10}" title="Enter valid vehicle number" value="<?php echo $_SESSION['vno'];?>" ></p>

            <p>Wash Dates <br /><input type="date" name="washdate" required  class="form-control"  min="<?php echo $min_date; ?>"></p>


<?php
$currentTime = date('H:i');
echo"Current time is.$currentTime";
?>

<p>Choose your time</p>
<select id="myDropdown3" name="washtime" class="form-control">
<?php
$currentTime = date('H:i'); // get the current time in the format of hours:minutes
// echo $currentTime;
if ($currentTime >= '08:00' && $currentTime < '09:00')
{
// morning options
// echo '<option value="08-09am">8am - 9am</option>';
echo '<option value="09-10am">9am - 10am</option>';
echo '<option value="10-11am">10am - 11am</option>';
echo '<option value="11-12pm">11am - 12pm</option>';
echo '<option value="12-01pm">12pm - 01pm</option>';
echo '<option value="01-02pm">01pm - 02pm</option>';
echo '<option value="02-03pm">02pm - 03pm</option>';
echo '<option value="03-04pm">03pm - 04pm</option>';
echo '<option value="04-05pm">04pm - 05pm</option>';
echo '<option value="05-06pm">05pm - 06pm</option>';
}

elseif ($currentTime >= '09:00' && $currentTime < '10:00') 
{
echo '<option value="10-11am">10am - 11am</option>';
echo '<option value="11-12pm">11am - 12pm</option>';
echo '<option value="12-01pm">12pm - 01pm</option>';
echo '<option value="01-02pm">01pm - 02pm</option>';
echo '<option value="02-03pm">02pm - 03pm</option>';
echo '<option value="03-04pm">03pm - 04pm</option>';
echo '<option value="04-05pm">04pm - 05pm</option>';
echo '<option value="05-06pm">05pm - 06pm</option>';
} 


elseif ($currentTime >= '10:00' && $currentTime < '11:00') 
{

echo '<option value="11-12pm">11am - 12pm</option>';
echo '<option value="12-01pm">12pm - 01pm</option>';
echo '<option value="01-02pm">01pm - 02pm</option>';
echo '<option value="02-03pm">02pm - 03pm</option>';
echo '<option value="03-04pm">03pm - 04pm</option>';
echo '<option value="04-05pm">04pm - 05pm</option>';
echo '<option value="05-06pm">05pm - 06pm</option>';
} 


elseif ($currentTime >= '11:00' && $currentTime < '12:00') 
{

echo '<option value="12-01pm">12pm - 01pm</option>';
echo '<option value="01-02pm">01pm - 02pm</option>';
echo '<option value="02-03pm">02pm - 03pm</option>';
echo '<option value="03-04pm">03pm - 04pm</option>';
echo '<option value="04-05pm">04pm - 05pm</option>';
echo '<option value="05-06pm">05pm - 06pm</option>';
} 


elseif ($currentTime >= '12:00' && $currentTime < '13:00') 
{

echo '<option value="01-02pm">01pm - 02pm</option>';
echo '<option value="02-03pm">02pm - 03pm</option>';
echo '<option value="03-04pm">03pm - 04pm</option>';
echo '<option value="04-05pm">04pm - 05pm</option>';
echo '<option value="05-06pm">05pm - 06pm</option>';
} 



elseif ($currentTime >= '13:00' && $currentTime < '14:00') 
{

echo '<option value="02-03pm">02pm - 03pm</option>';
echo '<option value="03-04pm">03pm - 04pm</option>';
echo '<option value="04-05pm">04pm - 05pm</option>';
echo '<option value="05-06pm">05pm - 06pm</option>';
} 



elseif ($currentTime >= '14:00' && $currentTime < '15:00') 
{

echo '<option value="03-04pm">03pm - 04pm</option>';
echo '<option value="04-05pm">04pm - 05pm</option>';
echo '<option value="05-06pm">05pm - 06pm</option>';
} 



elseif ($currentTime >= '15:00' && $currentTime < '16:00') 
{

echo '<option value="04-05pm">04pm - 05pm</option>';
echo '<option value="05-06pm">05pm - 06pm</option>';
} 



elseif ($currentTime >= '16:00' && $currentTime < '17:00') 
{

echo '<option value="05-06pm">05pm - 06pm</option>';
} 


else {
// evening options
echo '<option value="11">No timeslots</option>';
// echo '<option value="6">Option 6</option>';
}
?>
</select>




<p>Address<input type="text" name="address" required class="form-control" placeholder="Enter your address" maxlength="200" readonly value="<?php echo $_SESSION['saddr'];?>"</p>
             <p><input type="text" name="message"  class="form-control" placeholder="Message if any" maxlength="200"></p>




<!-- payment choice -->

<select name="txntype" required class="form-control">
                <option value="">Payment Type</option>
                <option value="Debit/Credit Card">Debit/Credit Card</option>
                <option value="Cash">Cash</option>
                <option value="e-Wallet">Wallet</option>
                 <option value="UPI">UPI</option>
                    <option value="Other">Other</option>
              </select>


<!--  payment choice end-->



            <center> <p><input type="submit" class="btn btn-custom" id="disabletest3" name="book3" value="Book Now">
             <input type="reset" class="btn btn-custom" name="reset" value="Reset"></p><center>
      </form>
        </div>
        
      </div>
      
    </div>
  </div>



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

        
        <!-- time javascript -->
        <!-- <script src="js/time.js"></script> -->
      </body>
</html>



<script>

  // Get the current time
  var currentTime = new Date();

  // Set the start and end time for the time range when the button should be enabled
  var startTime = new Date(currentTime.getFullYear(), currentTime.getMonth(), currentTime.getDate(), 1, 0, 0); // 9:00 AM
  var endTime = new Date(currentTime.getFullYear(), currentTime.getMonth(), currentTime.getDate(), 17, 0, 0); // 5:00 PM

  // Disable the button if the current time is outside of the time range
  if (currentTime < startTime || currentTime > endTime) {
    document.getElementById("disabletest1").disabled = false;
    document.getElementById("disabletest2").disabled = false;
    document.getElementById("disabletest3").disabled = false;
  }
</script>