<html lang="en">

<head>

<?php 
include("./includes/ChromePhp.php");
// include("./includes/connect.inc.php");
include('db_connection.php'); //REVIEW: abosulte for Diana


function set_session($id){
    session_start();
    $sess_id = session_id();
    $_SESSION['studentID']=$id;

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $param_username = trim($_POST["username"]);
    $param_password = trim($_POST["password"]);

        
    ChromePhp::log($param_username);
    ChromePhp::log($param_password);

    if(isset($_POST['signin'])){
        ChromePhp::log("Sign in was posted");


        // Prepare a select statement
        // Set parameters
        $sql = "SELECT StudentID FROM Student WHERE StudentEmail = \"$param_username\" and StudentPassword = \"$param_password\" ";
        $auth_result = mysqli_query($conn,$sql);


        if(!$auth_result){
            echo "<script type='text/javascript'>alert('connection failed!');</script>";
            // echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=login.php\">";
        }else{
            $num = mysqli_num_rows($auth_result);
            if($num==0){
                echo "<script type='text/javascript'>alert('Incorrect student id or password!');</script>";
                // echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=login.php\">";
            }elseif($num==1){
                // echo "<script type='text/javascript'>alert('Logged in!');</script>";
                ChromePhp::log($auth_result);
                $obj = $auth_result->fetch_object();
                echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=StudentProfile.php\">";
                set_session($obj->StudentID);
                exit;
            }else{
                echo "<script type='text/javascript'>alert('Database Error!');</script>";
                echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=login.php\">";
            }
        }
    }
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
                <input type="password" placeholder="Enter Password" name="password" required><br><br>
                <button id="SignIn" name="signin"  type="submit">Sign In</button><br>
                <button id="forgotpassword" name="forgotpassword"  type="submit">Forgot Password?</button>
				</form>

                <button id="newMember" onclick="window.location.href='StudentSignUp.php'" >Not a Member Yet?</button>

        </div>
    </div>
    <div id="footer">
</body>
<nav id="nav2">
    <a href="index.html">HOME</a> &nbsp
    <a href="howitworks.html">HOW IT WORKS</a> &nbsp
    <a href="team.html">TEAM</a> &nbsp
    <a href="contacts.html">CONTACT</a> &nbsp
</nav>
</div>

</html>