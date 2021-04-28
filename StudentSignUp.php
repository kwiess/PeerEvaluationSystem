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
    $param_name = trim($_POST["name"]);

    ChromePhp::log("New member");

if(isset($_POST['submit'])){
    ChromePhp::log("New member");
        
        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } else{
            // Prepare a select statement
            $sql = "SELECT StudentID FROM Student WHERE StudentEmail = ?";
            
            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
    ChromePhp::log("Making query member");

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This username is already taken.";
    ChromePhp::log("Found member with same name");

                    } else{
                        $username = trim($_POST["username"]);
    ChromePhp::log("No error. So good to make thi the username ");
    // Prepare an insert statement
    $rand_id = rand(100,100000);
    $sql = "INSERT INTO Student (StudentID,StudentName,StudentEmail, StudentPassword) VALUES ($rand_id, \"$param_name\",\"$username\", \"$param_password\")";
    
    ChromePhp::log("Try to create!!!");
    
    //close prev
    $return = mysqli_query($conn,$sql);

    if ($return == TRUE){
        ChromePhp::log("Created!!!");
        set_session($rand_id);

        // echo "<script type='text/javascript'>alert('Record Added!');</script>";

        echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=StudentProfile.php\">";
    } else{
    ChromePhp::log("Failed to create!!!");
    ChromePhp::log(mysqli_error($conn));

    }
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
}

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Sign Up</title>
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
            <h1 id="LogInTitle">Student Sign Up</h1>
            <form action="StudentSignUp.php" name="login_form" method="POST" class="center-block align-center col-lg-5 col-md-5 col-sm-10 col-xs-10">

            <label for="Username"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required><br><br>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email Address" name="username" required><br><br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required><br><br>
            <!-- <label for="psw-repeat"><b>Repeat Password</b></label> -->
            <!-- <input type="password" placeholder="Repeat Password" name="psw-repeat" required><br><br> -->
            <label id="agree"><input type="checkbox" checked="checked" name="remember" required >I agree to terms of use and privacy</label><br><br>
            <button id="SignIn" name="submit" type="submit">Sign Up</button><br>

				</form>

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