<html lang="en">

<head>

<?php 
        include("./includes/ChromePhp.php");
        include("./includes/connect.inc.php");

        function set_session($id){
            session_start();
            $sess_id = session_id();
            $_SESSION['studentID']=$id;
    
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if(isset($_POST['signin'])){
                ChromePhp::log("Sign in was posted");

            // Validate username
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username.";
                ChromePhp::log(username_err);

            } else{
                // Prepare a select statement
                // Set parameters
                $param_username = trim($_POST["username"]);
                $param_password = trim($_POST["password"]);
                
                ChromePhp::log($param_username);
                ChromePhp::log($param_password);


                

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
            mysqli_close($conn);
        
                // $stmt = mysqli_prepare($conn, $sql);

                //     // Bind variables to the prepared statement as parameters
                //     mysqli_stmt_bind_param($stmt, "s", $param_username, $param_password);
                //     // mysqli_stmt_bind_param($stmt, "s", $param_password);
                    

                    
                //     // Attempt to execute the prepared statement
                //     if(mysqli_stmt_execute($stmt)){
                //         echo("Executed");
                //         /* store result */
                //         mysqli_stmt_store_result($stmt);
                //         echo($stmt);
                //         Chrome
                //         if(mysqli_stmt_num_rows($stmt) == 1){
                //             // $username_err = "This username is already taken.";
                //             echo("Signed in!");
                //         } else{
                //             $username = trim($_POST["username"]);
                //             echo("Didnt Signed in!");

                //         }
                //     } else{
                //         echo "Oops! Something went wrong. Please try again later.";
                //     }
        
                    // Close statement
                    // mysqli_stmt_close($stmt);

            }

            }

            // if(isset($_POST['newMember'])){
            //     //create user
            //     // Validate username
            //     if(empty(trim($_POST["username"]))){
            //         $username_err = "Please enter a username.";
            //     } else{
            //         // Prepare a select statement
            //         $sql = "SELECT id FROM Student WHERE StudentEmail = ?";
                    
            //         if($stmt = mysqli_prepare($link, $sql)){
            //             // Bind variables to the prepared statement as parameters
            //             mysqli_stmt_bind_param($stmt, "s", $param_username);
                        
            //             // Set parameters
            //             $param_username = trim($_POST["username"]);
                        
            //             // Attempt to execute the prepared statement
            //             if(mysqli_stmt_execute($stmt)){
            //                 /* store result */
            //                 mysqli_stmt_store_result($stmt);
                            
            //                 if(mysqli_stmt_num_rows($stmt) == 1){
            //                     $username_err = "This username is already taken.";
            //                 } else{
            //                     $username = trim($_POST["username"]);
            //                 }
            //             } else{
            //                 echo "Oops! Something went wrong. Please try again later.";
            //             }
            
            //             // Close statement
            //             mysqli_stmt_close($stmt);
            //         }
            //     }

            //                 // Validate password
            // if(empty(trim($_POST["password"]))){
            //     $password_err = "Please enter a password.";     
            // } elseif(strlen(trim($_POST["password"])) < 6){
            //     $password_err = "Password must have atleast 6 characters.";
            // } else{
            //     $password = trim($_POST["password"]);
            // }
            
            // // Check input errors before inserting in database
            // if(empty($username_err) && empty($password_err)){
                
            //     // Prepare an insert statement
            //     $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                 
            //     if($stmt = mysqli_prepare($link, $sql)){
            //         // Bind variables to the prepared statement as parameters
            //         mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
                    
            //         // Set parameters
            //         $param_username = $username;
            //         $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                    
            //         // Attempt to execute the prepared statement
            //         if(mysqli_stmt_execute($stmt)){
            //             // Redirect to login page
            //             header("location: login.php");
            //         } else{
            //             echo "Oops! Something went wrong. Please try again later.";
            //         }
        
            //         // Close statement
            //         mysqli_stmt_close($stmt);
            //     }
            // }

            // }
            

            
            // Close connection
            // mysqli_close($link);
        

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