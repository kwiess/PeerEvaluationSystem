<?php
    session_start();
	if(empty($_SESSION['professorID'])){
        echo "<p>Access denied. You will now be redirected to the login page.</p>";
        echo "<META HTTP-EQUIV=\"refresh\" content=\"2; URL=professor_login.php\">"; //TODO: change to prof login
        exit;
    }
?>