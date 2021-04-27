<html lang="en">

<head>

<?php 
include("./includes/ChromePhp.php");
include("./includes/connect.inc.php");

function set_session($id){
    session_start();
    $sess_id = session_id();
    $_SESSION['professorID']=$id;

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
        $sql = "SELECT ProfessorID FROM Professor WHERE ProfessorName = \"$param_username\" and ProfessorPassword = \"$param_password\" ";
        $auth_result = mysqli_query($conn,$sql);


        if(!$auth_result){
            echo "<script type='text/javascript'>alert('connection failed!');</script>";
            // echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=login.php\">";
        }else{
            $num = mysqli_num_rows($auth_result);
            if($num==0){
                echo "<script type='text/javascript'>alert('Incorrect Professor id or password!');</script>";
                // echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=login.php\">";
            }elseif($num==1){
                // echo "<script type='text/javascript'>alert('Logged in!');</script>";
                ChromePhp::log($auth_result);
                $obj = $auth_result->fetch_object();
                echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=ProfessorProfile.php\">";
                set_session($obj->ProfessorID);
                exit;
            }else{
                echo "<script type='text/javascript'>alert('Database Error!');</script>";
                echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=login.php\">";
            }
        }
    }


    


    if(isset($_POST['newMember'])){
    ChromePhp::log("New member");
        
        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } else{
            // Prepare a select statement
            $sql = "SELECT ProfessorID FROM Professor WHERE ProfessorName = ?";
            
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
    $sql = "INSERT INTO Professor (ProfessorID,ProfessorName, ProfessorPassword) VALUES ($rand_id, \"$username\", \"$param_password\")";
    
    ChromePhp::log("Try to create!!!");
    
    //close prev
    $return = mysqli_query($conn,$sql);

    if ($return == TRUE){
        ChromePhp::log("Created!!!");
        set_session($rand_id);

        // echo "<script type='text/javascript'>alert('Record Added!');</script>";

        echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=ProfessorProfile.php\">";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Professor Log In</title>
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
            <h1 id="LogInTitle">Professor Sign In</h1>
            <form action="ProfessorLogIn.php" name="login_form" method="POST" class="center-block align-center col-lg-5 col-md-5 col-sm-10 col-xs-10">
                <label for="Username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required><br><br>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required><br><br>
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
    <a href="howitworks.html">HOW IT WORKS</a> &nbsp
    <a href="team.html">TEAM</a> &nbsp
    <a href="contacts.html">CONTACT</a> &nbsp
</nav>
</div>

</html>