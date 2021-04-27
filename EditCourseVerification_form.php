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
        include('includes/professor.auth.inc.php');
    ?>
    <?php if (isset($_POST['editcourse_form_submitted'])): //this code is executed when the form is submitted ?>

        <h2>Updating course name to: "<?php echo $_POST['CourseName']; ?>"...</h2>

            <?php
            
            // dont need this anymore
            //$sql_professorid = "SELECT `ProfessorID` FROM `Professor` WHERE `ProfessorID` = 1234"; //this should be passed in -- but dont need it?
            //$result_professorid = mysqli_query($conn, $sql_professorid);
            //$row_professorid = mysqli_fetch_array($result_professorid);
            //$professorid = $row_professorid["ProfessorID"]; //variable

            $professorid = $_SESSION['professorID'];

            $sql_courseid = "SELECT `CourseID` FROM `Course` WHERE `ProfessorID` = 1234 LIMIT 1"; //this should be passed in
            $result_courseid = mysqli_query($conn, $sql_courseid);
            $row_courseid = mysqli_fetch_array($result_courseid);
            $courseid = $row_courseid["CourseID"]; //variable
            
            $coursename = $_POST["CourseName"]; //variable
            $sql_verifyname = "SELECT `CourseName` FROM `Course` WHERE `ProfessorID` = $professorid AND `CourseName` = '$coursename'"; //check that this professor doesnt already have course with this name   
            $result_verifyname = mysqli_query($conn, $sql_verifyname);
            
            $rowcount = mysqli_num_rows($result_verifyname); 
            if ($rowcount < 1) {
                echo "<p>Course name \"" . $coursename . "\" verified to be available. Creating course...</p>";
                //need to update course in Course table -- CourseID, CourseName, ProfessorID

                $sql_editcourse = "UPDATE `Course` SET `CourseName`='$coursename' WHERE `CourseID` = $courseid";

                if (mysqli_query($conn, $sql_editcourse)) {
                    echo "<p>Your course has been updated with the name of: " . $coursename . ". Redirecting to Profile Page...</p>";
            ?> 
                    <meta http-equiv="refresh" content="0; URL='ProfessorProfile.php'"/>
                   
            <?php
                 } else {
                    echo "Error: " . $sql_editcourse . ":-" . mysqli_error($conn);
                 }
                
            ?>

            <?php
            }
            else {
                echo "<p>Course name could not be verified. Course was not updated.<br> Please check that you do not currently have a course with this name.</p>";
            }
            ?>

        <p>Go <a href="ProfessorProfile.php">back</a> to your profile page.</p>

        <?php else: ?>

            <h2>Registration Form</h2>

            <form action="EditCourseVerification_form.php" method="POST"> <h4>Course Name: </h4>
                <input type="text" name="CourseName" placeholder="Enter course name..." size="30" style="border:1px solid #000000">
                <input type="hidden" name="editcourse_form_submitted" value="1"/> <br><br>
                <button id="joinCourseButton" type="submit" value="Submit">Update Course</button>
                <button id="joinCourseButton" type="button" onclick="document.location='ProfessorProfile.php'">Cancel</button>
            </form>
      <?php endif;  ?> 
</body> 
</html>