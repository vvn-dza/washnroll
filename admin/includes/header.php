<?php
// session_start();

// $_SESSION['alogin']=$_POST['username'];
?>

<div class="header-main">
					<div class="logo-w3-agile">
								<h1><a href="dashboard.php">Wash n Roll Admin Dashboard</a></h1>
							</div>
				
						
						<div class="profile_details w3l">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="images/Joel James Professional.jpg" alt=""> </span> 
												<div class="user-name">
													<p>Welcome</p>
													<span><?php echo $_SESSION['alogin']; ?></span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="change-password.php"><i class="fa fa-lock"></i> Setting</a> </li> 
											<li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				</div>

				<style>

@media print {
    #print{
        display:none;
    }
	.sidebar-menu
	{
		display:none;
	}
	.header-main
	{
		display:none;
		
	}
}

</style>