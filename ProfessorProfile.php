<?php
    include('db_connection.php');
    include('includes/professor.auth.inc.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Professor Profile</title>
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
    <div id="profile">
        <h1>Your Profile</h1><br><br>
        <div id="grey">
            <h2>My Courses</h2>
            <hr>
            <table id="profileTable">
                <tbody>
                    <tr>
                        <th>Course Name:</th>
                        <th>Class Size:</th>
                        <th>Course Code:</th>
                    </tr>

                    <?php
                    // dont need this section anymore
                    // $sql_professorid = "SELECT `ProfessorID` FROM `Professor` WHERE `ProfessorID` = 1234"; // get professorid ... should already have this when they're logged in?
                    //$result_professorid = mysqli_query($conn, $sql_professorid);
                    //$row_professorid = mysqli_fetch_array($result_professorid);
                    //$professorid = $row_professorid["ProfessorID"];

                    $professorid = $_SESSION['professorID'];

                    $sql_courses = "SELECT * FROM `Course` WHERE `ProfessorID` = $professorid";
                    $result_courses = mysqli_query($conn, $sql_courses);

                    while ($row_courses = mysqli_fetch_array($result_courses)) {
                        $course_id = $row_courses["CourseID"];

                        $sql_coursesize = "SELECT COUNT(`StudentID`) FROM `Groups` WHERE `CourseID` = $course_id"; // sql to count students in course
                        $result_coursesize = mysqli_query($conn, $sql_coursesize); // result of query
                        $row_coursesize = mysqli_fetch_array($result_coursesize); // fetch array
                    ?>

                        <td id="row" width: 50%><?php echo $row_courses["CourseName"]; ?></td>
                        <td id="row"><?php echo $row_coursesize["COUNT(`StudentID`)"]; ?> Students</td>
                        <td id="row"><?php echo $row_courses["CourseID"]; ?></td>
                        <td id="row"><button id="ProfileButton" type="button"><a href="ProfessorEditEvaluation.php">Edit Evaluation</a></button></td>
                        <td id="row"><button id="ProfileButton" type="button"><a href="ProfessorEditCourse.php">Edit Course</a></button></td>
                        <td id="row"><button id="ProfileButton" type="button"><a href="ProfessorViewIndEvals.php">View Evaluations</a></button></td>
                        <td></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br><br><br><br><br>
        <div id="grey">
            <h2>Create a New Course:</h2>
            <hr><br>
            <button id="joinCourseButton"><a href="ProfessorCreateCourse.php">Create new course</a></button>    
        </div>
        <div id="grey">
            <h2>Create a New Survey:</h2>
            <hr><br>
            <button id="joinCourseButton"><a href="ProfessorCreateSurvey.php">Create new survey</a></button>    
        </div>
    </div>
</body>

</div>

</html>