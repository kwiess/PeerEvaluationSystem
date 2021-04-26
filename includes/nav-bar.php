<?php 

$loginClassState = "";
$logoutClassState = "hidden";


if($title == "Login"){
    $homeClassState = "";
    $loginClassState = "hidden";
} 

if(isset($_SESSION['loginID'])){
    $loginClassState = "";
    $logoutClassState = "";
}


?>

<!--nav-bar-->
<div class="header header-hide">
			<div class="container">
				<nav class="navbar navbar-default" role="navigation">
                <button type="button" class="navbar-toggle" data-toggle="collapse" 
						 data-target="#example-navbar-collapse">
						 <span class="sr-only">Toggle navigation</span>
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
					  </button>
					   <a class="navbar-brand" href="./index.php"><img src="assets/img/sun.png" alt="logo"/> Mendota University</a>
				   <div class="collapse navbar-collapse" id="example-navbar-collapse">
					  <ul class="nav navbar-nav">
                      <li><a href="./index.php">Home</a></li>
                        <li class="<?php echo $logoutClassState?>" ><a href="./logout.php">Logout</a></li>
                        <li><a href="./scheduler.php">Appointment</a></li>
                        <li><a href="./center.php">Center</a></li>
                        <li><a href="./test_choosing_prof.php">Faculty</a></li>

					  </ul>
				   </div>
				</nav>
			</div>
		</div>
		<!--/nav-bar-->