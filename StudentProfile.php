<?php
    include('db_connection.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Profile</title>
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
                        <th>View Available Surveys:</th>
                    </tr>
                
                    <?php 
                  
                    $sql_studentid = "SELECT `StudentID` FROM `Student` WHERE `StudentID` = 9999"; // get studentid ... should already have this when they're logged in?
                    $result_studentid = mysqli_query($conn, $sql_studentid);
                    $row_studentid = mysqli_fetch_array($result_studentid);
                    $studentid = $row_studentid["StudentID"];


                    $sql_courses = "SELECT `CourseID`, `CourseName`, `ProfessorID` FROM `Course` WHERE `CourseID` IN (SELECT `CourseID` FROM `Groups` WHERE `StudentID` = $studentid)";
                    $result_courses = mysqli_query($conn, $sql_courses);

                    ?>
                    <?php
                    while ($row_courses = mysqli_fetch_array($result_courses)) {
                        
                    ?>
                        <?php

                        $course_id = $row_courses["CourseID"]; //make new variable for courseid
                        $sql_coursesize = "SELECT COUNT(`StudentID`) FROM `Groups` WHERE `CourseID` = $course_id"; // sql to count students in course
                        $result_coursesize = mysqli_query($conn, $sql_coursesize); // result of query
                        $row_coursesize = mysqli_fetch_array($result_coursesize); // fetch array
                        
                        $sql_groupnum = "SELECT `GroupNumber` FROM `Groups` WHERE `CourseID` = $course_id AND `StudentID` = $studentid";
                        $result_groupnum = mysqli_query($conn, $sql_groupnum);
                        $row_groupnum = mysqli_fetch_array($result_groupnum);
                        $groupnum = $row_groupnum["GroupNumber"];

                        ?>
                        <tr>
                        <td id="row" width: 50%><?php echo $row_courses["CourseName"]; ?></td>
                        <td id="row"><?php echo $row_coursesize["COUNT(`StudentID`)"]; ?> Students</td>
                        <td id="row"><?php echo $row_courses["CourseID"]; ?></td>
                        <td id="row"><select name="surveys" onchange="location = this.value;">
                            <option></option>
                            <?php 
                            $sql_surveys = "SELECT `StudentName` FROM `Student` WHERE `StudentID` IN (SELECT `StudentID` FROM `Groups` WHERE `CourseID` = $course_id AND `GroupNumber` = $groupnum AND `StudentID` != $studentid)";
                            $result_surveys = mysqli_query($conn, $sql_surveys);
                            while ($row_surveys = $result_surveys->fetch_assoc()){
                                // need to pass thru a value of what student they selected so it can track whose evaluation they're completing
                                echo "<option value=\"StudentCompleteEval.php\">" . $row_surveys["StudentName"] . "</option>";
                            }
                            ?>
                            </select>
                        </td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                    <?php
                    }
                    ?>
                    <td></td>
                </tbody>
            </table>
            <br><br><br><br>
            <h2>Survey History</h2>
            <hr>
            <table>
                <tbody>
                    <tr>
                        <th>Course Name:</th>
                        <th>Professor Name:</th>
                        <th>Peer Reviewed:</th>
                        <th>Status:</th>
                    </tr>
                    <?php 
                    $sql_evaluations = "SELECT * FROM `Evaluation` WHERE `StudentID` = $studentid OR `EvaluatedStudentsID` = $studentid";
                    $result_evaluations = mysqli_query($conn, $sql_evaluations);

                    ?>
                    <?php
                    while ($row_evaluations = mysqli_fetch_array($result_evaluations)) {
                        
                    ?>
                        <?php
                        
                        $coursehistory_id = $row_evaluations["CourseID"];
                        $sql_coursename = "SELECT `CourseName` FROM `Course` WHERE `CourseID` = $coursehistory_id";
                        $result_coursename = mysqli_query($conn, $sql_coursename);
                        $row_coursename = mysqli_fetch_array($result_coursename);
                        
                        $sql_professorname = "SELECT `ProfessorName` FROM `Professor` WHERE `ProfessorID` = (SELECT `ProfessorID` FROM `Course` WHERE `CourseID` = $coursehistory_id)";
                        $result_professorname = mysqli_query($conn, $sql_professorname);
                        $row_professorname = mysqli_fetch_array($result_professorname);
                        
                        $evaluatedstudent_id = $row_evaluations["EvaluatedStudentsID"];
                        $sql_peerreviewed = "SELECT `StudentName` FROM `Student` WHERE `StudentID` = $evaluatedstudent_id";
                        $result_peerreviewed = mysqli_query($conn, $sql_peerreviewed);
                        $row_peerreviewed = mysqli_fetch_array($result_peerreviewed);


                        ?>
                        <tr>
                        <td id="row" width: 50%><?php echo $row_coursename["CourseName"]; ?></td>
                        <td id="row"><?php echo $row_professorname["ProfessorName"]; ?></td>
                        <td id="row">Reviewed: <?php echo $row_peerreviewed["StudentName"]; ?></td>
                        <td id="row">Submitted</td>
                        <td id="selection"><button onclick="window.location.href='StudentReviewEval.php'" id="ViewButton" type="button">View</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <td></td>
                    </tr>
                </tbody>
            </table>
            <br><br><br><br>
            <h2>Join Course with Code</h2>
            <hr><br>
            <form action="JoinCourseVerification_form.php" method="POST"> Enter your course code:
                <input type="text" name="CourseCode"> <br> Enter your group number:
                <input type="text" name="GroupNum"> 
                <input type="hidden" name="joincourse_form_submitted" value="1"/> <br>
                <input type="submit" value="Submit">
            </form>
            <h5>Don't have a course code? Contact your instructor to obtain their course code.</h5>
        </div>
    </div>
    <div id="footer2">
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