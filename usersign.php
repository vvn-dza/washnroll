<?php include('server.php') ?>   
<?php //error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> sign in</title>
   

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

        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    
                    </div>
                    <div class="col-12">
                    <h1>welcome to <span style="color:#2a208b;">Auto </span><span style="color:#000000;">Cleanse</h1></span>                        
                        <a href="index.php">browse as guest</a>
                        <a href="userlog.php">login</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- login form -->

        <div>
        <!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="signbg">

  <div class="header" align="left">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="usersign.php" class="content">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="cusername"  pattern="[a-zA-Z ]{3,20}" title="No special characters and numbers allowed"  value="<?php echo $username; ?>">
  	</div>
  	
    <div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>

    <div class="input-group">
  	  <label>Phone No.</label>
  	  <input type="text" name="phoneno" pattern="[0-9]{10}" title="10 numeric characters only" value="<?php echo $phno; ?>">
  	</div>


    <div class="input-group">
  	  <label>Vehicle no.</label>
  	  <input type="text" name="vehicleno" pattern="[a-zA-Z0-9]{3,10}" title="Enter valid vehicle number" value="<?php echo $vhno; ?>">
  	</div>




    <div class="input-group">
    
    <table>
    <tr><td><label> Address</label></td></tr>
      <tr><td><p><textarea name="address" required placeholder="Enter your address" rows="5" cols="50" style="margin:0;resize:none;overflow:hidden;" class="selector-for-some-widget " value="<?php echo $addr; ?>"></textarea></textarea></td></tr></p>
     	
      </table>
    </div>








  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="userlog.php">login in</a>
  	</p>
  </form>
</body>
</html>

    
        

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">



                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            
                        </div>

                        <hr />
                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        
        



  

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
