<?php
    include('db_connection.php');
    include('includes/professor.auth.inc.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Professor Edit Course</title>
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
        <h1>Edit Course</h1>
        <div id="grey">
            <hr>
            <h2><u>Update your course information...</u></h2>
                
                <form action="EditCourseVerification_form.php" method="POST"> 
                    <h4><i>Enter Existing Course Code: </i></h4>
                    <input type="text" name="CourseCode" placeholder="Enter course code..." size="30" style="border:1px solid #000000"><h4><i>New Course Name: </i></h4>
                    <input type="text" name="CourseName" placeholder="Enter course name..." size="30" style="border:1px solid #000000">
                    <input type="hidden" name="editcourse_form_submitted" value="1"/> <br><br>
                    <button id="joinCourseButton" type="submit" value="Submit">Update Course</button>
                    <button id="joinCourseButton" type="button" onclick="document.location='ProfessorProfile.php'">Cancel</button>
                </form>
                
                <h4><i><u>Please note: Your course code cannot be changed.</i></u></h4>
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
