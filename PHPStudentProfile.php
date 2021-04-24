<?php
//include 'db_connection.php';
//$conn = OpenCon();
// echo "Connected Successfully";
// CloseCon($conn);
?>

<<html lang="en">
</body>
</html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                 <?php
                 // php added
                 include('db_connection.php');
                 ?>
                <tbody>
                    <tr>
                        <th>Course Name:</th>
                        <th>Class Size:</th>
                        <th>Course Code:</th>
                        <th>View Available Surveys:</th>
                    </tr>
                    <tr>
                        <?php 
                        // php added
                        // ***need to add: check what courses the student is in
                        //$sql_course = "SELECT `CourseID`, `CourseName`, `ProfessorID` FROM `Course`";
                        //$sql_student = "SELECT `StudentID` FROM `Student` WHERE 1"; // should automatically have studentID b/c their logged in?

                        //$sql_groups = "SELECT `GroupNumber`, `StudentID`, `ProfessorID`, `CourseID` FROM `Groups` WHERE 'StudentID' = $sql_studentid";
                        //$sql_coursesize = "SELECT COUNT('CourseID') WHERE 'CourseID' = (SELECT 'CourseID' FROM 'Course' ";
                        
                        $sql_studentid = "SELECT `StudentID` FROM `Student` WHERE 1";
                        $sql_courses = "SELECT `CourseID`, `CourseName`, `ProfessorID` FROM `Course` WHERE (SELECT `CourseID` FROM `Groups` WHERE `StudentID` = 9999)";

                        $result_studentid = mysqli_query($conn, $sql_studentid);
                        $result_courses = mysqli_query($conn, $sql_courses);

                        $row_studentid = mysqli_fetch_array($result_studentid);
                        $row_courses = mysqli_fetch_array($result_courses);

                        //$sql_coursesize = "SELECT COUNT(`StudentID`) FROM `Groups` WHERE `CourseID` = $row_courses["CourseID"]";
                        //$result_coursesize = mysqli_query($conn, $sql_coursesize);
                        //$row_coursesize = mysqli_fetch_array($result_coursesize);

                        ?>
                        <?php
                        //$row = mysqli_fetch_array($result_course);
                        
                        //this loop doesn't work
                        //somehow need to loop thru these values -- in case the student is in more than one course
                        if ($result_courses) {
                            while($row_courses = mysqli_fetch_array($result_courses)) {
                                echo "<p> Hello </p>";
                                echo $row_courses["CourseName"];

                            }
                        }
                        ?>
                        <td id="row" width: 50%><?php echo $row_courses["CourseName"]; ?></td>
                        <td id="row">24 Students</td> <!-- need to calculate students in course -->
                        <td id="row"><?php echo $row_courses["CourseID"]; ?></td>
                        <td id="selection">
                            <form action="/action_page.php">
                                <label for="surveys">View Available Surveys:</label>
                                <select id="surveys">
                                  <option value="Kyle">Kyle</option>
                                  <option value="Diana">Diana</option>
                                  <option value="Olivia">Olivia</option>
                                  <option value="Breydn">Breydn</option>
                                </select>
                            </form>
                        </td>
                        <td></td>
                    </tr>
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
                    <tr>
                        <td id="row" width: 50%>IS 424</td>
                        <td id="row">Professor Khasawneh</td>
                        <td id="row">Reviewer: Kyle</td>
                        <td id="row">Submitted</td>
                        <td id="selection"><button id="ViewButton" type="button">View</button></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <br><br><br><br>
            <h2>Join Course with Code</h2>
            <hr><br>
            <label for="CourseCode" style="font-size:22px"><b>Enter your course code:</b></label>
            <input type="text" size="30" placeholder="Enter course code..." name="CourseCode" required>
            <button id="joinCourseButton" type="button" onclick="document.location='StudentProfile.html'">Join Course</button>
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