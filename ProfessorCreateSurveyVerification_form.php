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
$courseid = $_POST["CourseID"];
$evalquestions = $_POST["SurveyQuestion"];
$EvaluationID = mt_rand(1000,9999);
$sql_createsurvey = "INSERT INTO `evaluation` (`CourseID`, `EvalQuestions`, `EvaluationID`) VALUES ($courseid, '$evalquestions', $EvaluationID)";
if (mysqli_query($conn, $sql_createsurvey)) {
    echo "<p>Your survey has been created with the survey ID of: " . $EvaluationID . ". Redirecting to Profile Page...</p>";
?> 
    <meta http-equiv="refresh" content="0; URL='ProfessorProfile.php'"/>
                   
<?php
} else {
    echo "Error: " . $sql_createcourse . ":-" . mysqli_error($conn);
 }
?>