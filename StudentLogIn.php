<html lang="en">

<head>

<?php 
        include("connect.inc.php");

        if(isset($_POST['signin'])){
        echo("Sign in was posted");
        }

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Log In</title>
</head>

<body>
    <div id="black-LogIn">
        <nav>
            <a href="index.html">HOME</a> &nbsp
            <a href="about.html">ABOUT</a> &nbsp
            <a href="howitworks.html">HOW IT WORKS</a> &nbsp
            <a href="team.html">TEAM</a> &nbsp
            <a href="contacts.html">CONTACT</a> &nbsp
        </nav>
        <h1><i>PEER EVALUATION SYSTEM</i></h1>
    </div>
    <div id="LogIn">
        <div class="container">
            <h1 id="LogInTitle">Student Sign In</h1>
            <form action="StudentLogIn.php" name="login_form" method="POST" class="center-block align-center col-lg-5 col-md-5 col-sm-10 col-xs-10">
                <label for="Username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required><br><br>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required><br><br>
                <button id="SignIn" name="signin"  type="submit">Sign In</button><br>
                <button id="newMember" name="newMember"  type="submit">Not a Member Yet?</button>
                <button id="forgotpassword" name="forgotpassword"  type="submit">Forgot Password?</button>
				</form>

        </div>
    </div>
    <div id="footer">
</body>
<nav id="nav2">
    <a href="index.html">HOME</a> &nbsp
    <a href="about.html">ABOUT</a> &nbsp
    <a href="howitworks.html">HOW IT WORKS</a> &nbsp
    <a href="team.html">TEAM</a> &nbsp
    <a href="contacts.html">CONTACT</a> &nbsp
</nav>
</div>

</html>