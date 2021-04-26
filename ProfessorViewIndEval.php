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
            <div><button id="joinCourseButton"><a href="placeholder.html">Aggregate View</a></button></div>  

            <br>
            <h2><u>You are viewing **Student** evaluations</u></h2> <br>
            
            Select Another Student
            <select name="studentselect" id="studentselect"> 
            </select>
            <hr>      
        </div>


        <?php
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "PeerEvaluation";

    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 
$sql = "SELECT EvalQuestions FROM evaluation WHERE StudentID = StudentID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
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
