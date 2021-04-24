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
    ?>
    <?php if (isset($_POST['createcourse_form_submitted'])): //this code is executed when the form is submitted ?>

        <h2>Creating course: "<?php echo $_POST['CourseName']; ?>"...</h2>

            <?php
            $sql_professorid = "SELECT `ProfessorID` FROM `Professor` WHERE `ProfessorID` = 1234"; //this should be passed in
            $result_professorid = mysqli_query($conn, $sql_professorid);
            $row_professorid = mysqli_fetch_array($result_professorid);
            $professorid = $row_professorid["ProfessorID"]; //variable
            
            $coursename = $_POST["CourseName"]; //variable
            $sql_verifyname = "SELECT `CourseName` FROM `Course` WHERE `ProfessorID` = $professorid AND `CourseName` = '$coursename'"; //check that this professor doesnt already have course with this name   
            $result_verifyname = mysqli_query($conn, $sql_verifyname);
            
            $rowcount = mysqli_num_rows($result_verifyname); 
            if ($rowcount < 1) {
                echo "<p>Course name \"" . $coursename . "\" verified. Creating course...</p>";
                //need to insert course in Course table -- CourseID, CourseName, ProfessorID
                $courseid = mt_rand(1000,9999);

                $sql_checkcourseid = "SELECT `CourseID` FROM `Course` WHERE `CourseID` = $courseid";
                $result_checkcourseid = mysqli_query($conn, $sql_checkcourseid);


                while (mysqli_num_rows($result_checkcourseid) >= 1) {
                    $courseid = mt_rand(1000,9999);
                    
                    $sql_checkcourseid = "SELECT `CourseID` FROM `Course` WHERE `CourseID` = $courseid";
                    $result_checkcourseid = mysqli_query($conn, $sql_checkcourseid);
                    if (mysqli_num_rows($result_checkcourseid) >= 1) {
                        continue;
                    }
                    else {
                        break;
                    }
                }
                
                $sql_createcourse = "INSERT INTO `Course` (`CourseID`, `CourseName`, `ProfessorID`) VALUES ($courseid, '$coursename', $professorid)";

                if (mysqli_query($conn, $sql_createcourse)) {
                    echo "<p>Your course has been created with the Course Code of: " . $courseid . ". Redirecting to Profile Page...</p>";
            ?> 
                    <meta http-equiv="refresh" content="0; URL='ProfessorProfile.php'"/>
                   
            <?php
                 } else {
                    echo "Error: " . $sql_createcourse . ":-" . mysqli_error($conn);
                 }
                
            ?>

            <?php
            }
            else {
                echo "<p>Course name could not be verified. Course was not created.<br> Please check that you do not currently have a course with this name.</p>";
            }
            ?>

        <p>Go <a href="ProfessorProfile.php">back</a> to your profile page.</p>

        <?php else: ?>

            <h2>Registration Form</h2>

            <form action="CreateCourseVerification_form.php" method="POST"> <h4>Course Name: </h4>
                <input type="text" name="CourseName" placeholder="Enter course name..." size="30" style="border:1px solid #000000">
                <input type="hidden" name="createcourse_form_submitted" value="1"/> <br><br>
                <button id="joinCourseButton" type="submit" value="Submit">Create Course</button>
                <button id="joinCourseButton" type="button" onclick="document.location='ProfessorProfile.php'">Cancel</button>
            </form>
      <?php endif;  ?> 
</body> 
</html>