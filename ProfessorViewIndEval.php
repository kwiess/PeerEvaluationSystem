<?php
    include('db_connection.php');
    include('includes/professor.auth.inc.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Professor View Evaluation</title>
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
        <h1>View Evaluation</h1>
        <div id="grey">
            <h2><u>IS 424</u></h2>

            <br>
            <h2><u>You are viewing **Student** evaluations</u></h2> <br>
            
            Select Another Student
            <form action="ProfessorViewIndEval.php" method="POST">
            <select name="StudentName" id="StudentName">
                <option value="Kyle"> Kyle</option>
                <option value="Diana"> Diana</option>
                <option value="Olivia"> Olivia</option>
                <option value="Breydn"> Breydn</option>
            </select>
            <input type="submit" name="submit"/>
    </form>
            <hr>   
               
        </div>
        <?php
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "PeerEvaluation";

    $conn = mysqli_connect($localhost, $username, $password, $database);

    if (!$conn) {
        echo "<p>Connection failed " . mysqli_connect_error() . "</p>";
    } else {
        //echo "<p>Connection successful </p>";
    }

    ?>
        <?php
        $name = $_POST['StudentName'];
        echo "<p> <font  size='6pt'>You are viewing evaluation results for $name</font> </p>";
        // echo ($name);
        echo nl2br("\n\n");
        //  $name= "Kyle";
        $sql_studentid = "SELECT StudentID FROM student WHERE StudentName = \"$name\"";
        $result_studentid = mysqli_query($conn, $sql_studentid);
        $row_studentid = mysqli_fetch_array($result_studentid);
        $studentid = $row_studentid["StudentID"];
        $sql_studenteval = "SELECT EvalQuestions FROM Evaluation WHERE studentID = \"$studentid\"";
        $result_studenteval = mysqli_query($conn, $sql_studenteval);
        $row_studenteval = mysqli_fetch_array($result_studenteval);
        $student_eval = $row_studenteval["EvalQuestions"];
        echo($student_eval);
        mysqli_close($conn);

    
        ?>
    </div>

    
    <br><br><br><div id="footer">
</body>
<nav id="nav2">
    <a href="index.html">HOME</a> &nbsp
    <a href="howitworks.html">HOW IT WORKS</a> &nbsp
    <a href="team.html">TEAM</a> &nbsp
    <a href="contacts.html">CONTACT</a> &nbsp
</nav>
</div>

</html>
