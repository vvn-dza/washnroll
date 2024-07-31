<?php //error_reporting(0);
include('includes/config.php'); 





?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>2 Wheeler Washing Plans</title>
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
                        <h2>Payment Confirmation</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="washing-plans.php">Type</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        








        
        <!-- Price Start -->
        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Payment Type</p>
                    <h2>CASH ON DELIVERY / ONLINE PAYMENT</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="price-item featured-item">
                            <div class="price-header">
                                <!-- <h3>COD</h3> -->
                                <h2><strong>COD</strong></h2>
                            </div>
                            <div class="price-body">
							
						
							
							
                                <ul>
                                <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Mirror Wiping</li>
                                <!-- <li><i class="far fa-check-circle"></i>Tire Shine</li> -->
                                <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                <li><i class="far fa-times-circle"></i>9H Nano Ceramic Coating</li>
									<li><i class="far fa-times-circle"></i>- Paint Protection FiLm  (PPF)</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom"  data-toggle="modal" data-target="#myModal1">Book Now</a>
                            </div>
                        </div>
                    </div>







                    
					
					
					                    <div class="col-md-6">
                        <div class="price-item featured-item ">
                            <div class="price-header">
                                <!-- <h3> Pay ONline</h3> -->
                                <h2><strong>ONLINE</strong></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Mirror Wiping</li>
                                    <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                    <li><i class="far fa-times-circle"></i>9H Nano Ceramic Coating</li>
									<li><i class="far fa-times-circle"></i>- Paint Protection FiLm  (PPF)</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom"  data-toggle="modal" data-target="#myModal2">Book Now</a>
                            </div>
                        </div>
                    </div>

                    </div>
                        </div>
                    </div>


                    <?php include_once('includes/footer.php');?>

                    <!-- html end -->

                    
<!--Model1 start-->
 <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Vehicle Wash Booking</h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="packagetype" required class="form-control">
                <!-- <option value="">Select your Package Type</option> -->
                <option value="scooterwash">Scooter Wash (₹150)</option>
                 <!-- <option value="2">FULL WASH (₹500)</option> -->
                  <!-- <option value="3 ">PREMIUM WASH (₹600)</option> -->
              </select>

          <p>
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
            <p><input type="text" name="fname" class="form-control"pattern="[a-zA-Z ]{3,20}" title="No numbers and special characters allowed" required placeholder="Enter Full Name"></p>
            <p><input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Enter Mobile No."></p>
            <p>Vehicle Number <br /><input type="text" name="regno" required class="form-control" pattern="[a-zA-Z0-9]{3,10}" title="Enter valid vehicle number"></p>
            <p>Wash Date <br /><input type="date" min="2023-04-15" name="washdate" required class="form-control"></p>
             <p>Wash Time <br /><input type="time" name="washtime" required class="form-control"></p>
             <p><textarea name="address" required class="form-control" placeholder="Enter your address"></textarea></p>
             <p><input type="text" name="message"  class="form-control" placeholder="Message if any"></textarea></p>

            <center> <p><input type="submit" class="btn btn-custom" name="book4" value="Book Now">
             <input type="reset" class="btn btn-custom" name="reset" value="Reset"></p><center>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- model 1 end -->

<!--Model 2start-->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Vehicle Wash Booking</h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="packagetype" required class="form-control">
                <!-- <option value="">Select your Package Type</option> -->
                <!-- <option value="1">BODY WASH (₹400)</option> -->
                 <option value="bikewash">Bike Wash (250Rs)</option>
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
            <p><input type="text" name="fname" class="form-control"pattern="[a-zA-Z ]{3,20}" title="No numbers and special characters allowed" required placeholder="Enter Full Name"></p>
            <p><input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Enter Mobile No."></p>
            <p>Vehicle Number <br /><input type="text" name="regno" required class="form-control" pattern="[a-zA-Z0-9]{3,10}" title="Enter valid vehicle number"></p>
            <p>Wash Date <br /><input type="date" min="2023-04-15" name="washdate" required class="form-control"></p>
             <p>Wash Time <br /><input type="time" name="washtime" required class="form-control"></p>
             <p><textarea name="address" required class="form-control" placeholder="Enter your address"></textarea></p>
             <p><input type="text" name="message"  class="form-control" placeholder="Message if any"></textarea></p>

            <center> <p><input type="submit" class="btn btn-custom" name="book5" value="Book Now">
             <input type="reset" class="btn btn-custom" name="reset" value="Reset"></p><center>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<!-- model 2 end -->



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
