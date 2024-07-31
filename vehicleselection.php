<?php //error_reporting(0);
include('includes/config.php');
session_start();
?>
<?php


if(strlen($_SESSION['autousername'])==0)
	{	
header('location:http://localhost/shopping/login.php');
}
else{
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Vehicle Choice</title>


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

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

<?php

include_once('includes/header.php');

?>


 <!-- Team Start -->
 <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Choose youre vehicle type</p>
                    <h2>2 WHEELER OR 4 WHEELER</h2>
                </div>
				
				
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <div class="team-item">
                            <div class="team-img">
                           <a href="washing-plans.php">   <img src="img/8.jpg" alt="Team Image"> </a>
                            </div>
                            <!-- <div class="team-text"> -->
                                <!-- <h2> 4 Wheelers</h2> -->
                                <!-- <p>HATCHBACK, SEDAN AND SUV</p> -->

                            <!-- </div> -->
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-4">
                        <div class="team-item">
                            <div class="team-img">
                            <a href="2wheelerplans.php">     <img src="img/bike2.jpg" alt="Team Image"></a>
                            </div>
                            <!-- <div class="team-text">
                            <a href="washing-plans.php">click here <h2>2 WHEELER</h2><a>
                                <p>SCOOTER AND BIKE</p>      
                            </div> -->
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
		</center>
        <!-- Team End -->


        <?php include('includes/footer.php'); ?>

<?php } ?>