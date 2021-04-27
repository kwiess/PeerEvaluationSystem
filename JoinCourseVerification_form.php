<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
        include('db_connection.php');
        include('includes/student.auth.inc.php');

    ?>
    <?php if (isset($_POST['joincourse_form_submitted'])): //this code is executed when the form is submitted ?>

        <h2>Verifying course code: <?php echo $_POST['CourseCode']; ?> </h2>

            <?php
            $coursecode = $_POST["CourseCode"]; //variable
            $sql_verifycourse = "SELECT `CourseID` FROM `Course` WHERE `CourseID` = $coursecode";        
            $result_verifycourse = mysqli_query($conn, $sql_verifycourse);
            $row_verifycourse = mysqli_fetch_array($result_verifycourse);
            
            $rowcount=mysqli_num_rows($result_verifycourse); 
            if ($rowcount > 0) {
                echo "<p>Code " . $coursecode . " verified. Adding you to the course group...</p>";
                //need to insert student in Groups table -- GroupNumber, StudentID, ProfessorID, CourseID
                
                // dont need this anymore
                //$sql_studentid = "SELECT `StudentID` FROM `Student` WHERE `StudentID` = 8888"; // get studentid ... should already have this when they're logged in?
                //$result_studentid = mysqli_query($conn, $sql_studentid);
                //$row_studentid = mysqli_fetch_array($result_studentid);
                //$studentid = $row_studentid["StudentID"]; //variable
                
                $studentid = $_SESSION['studentID'];

                $sql_professorid = "SELECT `ProfessorID` FROM `Course` WHERE `CourseID` = $coursecode"; 
                $result_professorid = mysqli_query($conn, $sql_professorid);
                $row_professorid = mysqli_fetch_array($result_professorid);
                $professorid = $row_professorid["ProfessorID"]; //variable

                $groupnum = $_POST["GroupNum"]; //variable
                $sql_coursejoin = "INSERT INTO `Groups` (`GroupNumber`, `StudentID`, `ProfessorID`, `CourseID`) VALUES ($groupnum, $studentid, $professorid, $coursecode)";

                if (mysqli_query($conn, $sql_coursejoin)) {
                    echo "<p>You've been added to course: " . $coursecode . ". Redirecting to Profile Page...</p>";
            ?> 
                    <meta http-equiv="refresh" content="0; URL='StudentProfile.PHP'"/>
                   
            <?php
                 } else {
                    echo "Error: " . $sql_coursejoin . ":-" . mysqli_error($conn);
                 }
                

            ?>

            <?php
            }
            else {
                echo "<p>Code could not be verified. You were not added to the course...<br> Please return to Profile Page and try again.</p>";
            }

            ?>

        <p>Go <a href="StudentProfile.php">back</a> to your profile page.</p>

        <?php else: ?>

            <h2>Registration Form</h2>

            <form action="registration_form.php" method="POST">
                 First name:
                <input type="text" name="firstname">
                <br> Last name:
                <input type="text" name="lastname">
			    <input type="hidden" name="joincourse_form_submitted" value="1" />
                <input type="submit" value="Submit">
            </form>
      <?php endif;  ?> 
</body> 
</html>