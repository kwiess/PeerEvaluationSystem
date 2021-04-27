<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Professor Create Survey</title>
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
        <h1>Create Survey</h1><br><br>
        <div id="grey">
            <hr>
        <div id="grey">
            <br>
            <div>
            <form action="ProfessorCreateSurveyVerification_form.php" method="POST">
            <input type="text" name="CourseID" placeholder="Enter Course ID..." size="30" style="border:1px solid #000000"> <br> <br>
            <div><h3> Add Questions (Seperate Questions with Semicolon):</h3></div>
                    <textarea type="text" name="SurveyQuestion" placeholder="Enter Survey Question..." rows="20" cols="50" style="border:1px solid #000000"> </textarea> <br>
                    <button id="joinCourseButton" type="submit" value="Submit">Add Question</button>
                    <button id="joinCourseButton" type="button" onclick="document.location='ProfessorProfile.php'">Cancel</button>
                </form>

            </div>
            <br>
             
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

