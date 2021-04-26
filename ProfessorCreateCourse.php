<?php
    include('db_connection.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Professor Create Course</title>
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
        <h1>Create Course</h1>
        <div id="grey">
            <hr>
            <h2><u>Enter your course information...</u></h2>
                
                <form action="CreateCourseVerification_form.php" method="POST"> <h4>Course Name: </h4>
                    <input type="text" name="CourseName" placeholder="Enter course name..." size="30" style="border:1px solid #000000">
                    <input type="hidden" name="createcourse_form_submitted" value="1"/> <br><br>
                    <button id="joinCourseButton" type="submit" value="Submit">Create Course</button>
                    <button id="joinCourseButton" type="button" onclick="document.location='ProfessorProfile.php'">Cancel</button>
                </form>
                
                <h4><i><u>A course code will automatically be generated for your course.<br>You can find this code under 'My Courses' on your Profile Page.</i></u></h4>
        </div>
    </div>
    <div id="footer">
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
