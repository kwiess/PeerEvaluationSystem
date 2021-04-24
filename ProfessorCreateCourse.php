<<?php
include 'db_connection.php';
$conn = OpenCon();
// echo "Connected Successfully";
// CloseCon($conn);
?>

<<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <div class="container">
                <label for="CourseName"><b>Course Name:</b></label><br>
                <input type="text" placeholder="Enter course name" name="CourseName" required><br><br>
                <label for="NumberGroups"><b>Number of Groups in Course:</b></label><br>
                <input type="text" placeholder="Enter number of groups" name="NumberGroups" required><br><br>
                <label><b>or...</b></label><br><br>
                <label for="StudentFile"><b>Upload .xslx file with student information:</b></label><br>
                <input type="file" id="studentfile" name="StudentFile"><br><br>
                <label><b>Download Sample File Template:</b></label>
                <a href="document.location='index.html"><img src="Image_4.png" width="15" height="15" alt="check"></a><br><br>
                <h4><i><u>A course code will automatically be generated for your course.<br>You can find this code under 'My Courses' on your Profile Page.</i></u></h4>
                <button id="joinCourseButton" type="button" onclick="document.location='ProfessorProfile.html'">Create Course</button>
                <button id="joinCourseButton" type="button" onclick="document.location='ProfessorProfilePage.html'">Cancel</button>
                </div>        
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
