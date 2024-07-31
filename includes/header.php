<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
?>
       
       <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.php">
                                    <h1>Wash'N <span>Roll</span></h1>
                                <!-- <img src="img/logo.png" alt="Logo"> -->
                            </a>
                        </div>
                    </div>

<?php 
$sql = "SELECT * from tblpages where type='contact'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{       
?>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Service Hours</h3>
                                        <p><?php   echo $result->openignHrs; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="fa fa-phone-alt"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Contact No:</h3>
                                        <p>+<?php   echo $result->phoneNumber; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p><?php   echo $result->emailId; ?></p>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="about.php" class="nav-item nav-link">About</a>
                    
                            <a href="location.php" class="nav-item nav-link"> Locations</a>
							<!-- <a href="subscription.php" class="nav-item nav-link">Subscriptions</a> -->
							<a href="http://localhost/shopping/index.php" class="nav-item nav-link">Accessories</a>
                            <a href="gallery.php" class="nav-item nav-link">Gallery</a>
                    
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <a href="admin" class="nav-item nav-link">Admin</a>
                            <a href="http://localhost/shopping/my-wishlist.php" class="nav-item nav-link">Wishlist</a>
                            <a href="http://localhost/shopping/my-cart.php" class="nav-item nav-link">Cart</a>

<!-- login test -->


<?php if (strlen($_SESSION['login']) == 0) { ?>
						<a href="http://localhost/shopping/login.php" class="nav-item nav-link">Login</a></li>
					<?php } else { ?>

						<li><a href="http://localhost/shopping/logout.php" class="nav-item nav-link">Logout</a></li>
					<?php } ?>



                    <?php if (strlen($_SESSION['login']) > 1) { ?>
                            <a href="http://localhost/shopping/my-account.php" class="nav-item nav-link"><?php $u=$_SESSION['autousername']; echo"$u";?></a>

                            <?php }  ?>

                           
                        </div>
                        <div class="ml-auto">
                        <a class="btn btn-custom" href="vehicleselection.php" style="width:150px;height:50px">Book now</a>
                        </div>
                       
                        
                       
                            
                        
                        
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
