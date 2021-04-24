<?php
    session_start();
	if(empty($_SESSION['studentID'])){
        echo "<p>Access denied. You will now be redirected to the login page.</p>";
        echo "<META HTTP-EQUIV=\"refresh\" content=\"2; URL=StudentLogIn.php\">";
        exit;
    }
?>