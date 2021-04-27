<html lang="en">

<head>

<?php 


include('./includes/ChromePhp.php');
include('db_connection.php'); //REVIEW: abosulte for Diana
// include("./includes/connect.inc.php");
include("./includes/student.auth.inc.php");

    if(isset($_POST['submit'])){
        ChromePhp::log("Submitted");
        ChromePhp::log($_POST);
        
        // TODO: submit to db
        // get groupid, course_id, evalStudentId, student_id, questions
        $student_id = $_POST["id"];
        $group_id = $_POST["group_id"];
        $course_id = $_POST["course_id"];
        $eval_student_id = $_POST["rev_id"];

        $q1= $_POST["q1"];
        if($_POST["q2"]=="on")
        $q2= 1;
        else
        $q2= 0;

        $q3= $_POST["q3"];

        // $evalQ = "[$q1, $q2, $q3]" ;
        // $evqlQ = json_encode(array($q1,$q2,$q3 ));

        ChromePhp::log(($evalQ));

        $sql = "INSERT INTO Evaluation (StudentID,EvaluatedStudentsID,EvalQuestions,EvalQuestions2,EvalQuestions3,GroupNumber, CourseID) VALUES (\"$student_id\" ,\"$eval_student_id\", \"$q1\", \"$q2\", \"$q3\",\"$group_id\", \"$course_id\")";

        $return = mysqli_query($conn,$sql);
        if ($return == TRUE){
            // echo "<script type='text/javascript'>alert('Record Added!');</script>";
            echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=StudentProfile.php\">";
        }else{
            // die("dead!".mysqli_error($conn));
        ChromePhp::log(mysqli_error($conn));

        }

    
        // format questions
    
        // add to DB if none exists. if exists, then change for that evalID
    
        //redirect to profile.
    }


            
    if($_SERVER["REQUEST_METHOD"] == "GET"){

        ChromePhp::log("Getting name for student");
        ChromePhp::log($_GET);
        

        $evalId = $_GET["rev_id"];

        $sql_peerreviewed = "SELECT * FROM `Student` WHERE `StudentID` = $evalId";

        $result_peerreviewed = mysqli_query($conn, $sql_peerreviewed);
        $row_peerreviewed = mysqli_fetch_array($result_peerreviewed);

        // ChromePhp::log($row_peerreviewed);

    }
        ?> 


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Review Evaluation</title>
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
        <h1>Complete Evaluations</h1>
        <h2>IS424</h2>
        <h3>You are evaluating <?php echo $row_peerreviewed["StudentName"]; ?></h3>
        <!-- <p>Submitted on April 2nd, 3:43PM </p> -->
        <div id="grey">
            <hr>

            <form action="<?php echo "StudentCompleteEval.php?rev_id=$_GET[rev_id]&id=$_GET[id]&course_id=$_GET[course_id]&group_id=$_GET[group_id]" ?>" method="POST">
                <label for="q1">1. What are this peer's strengths?</label> <br>
                <textarea id="q1" name="q1" rows="4" cols="50">Here</textarea><br><br>
                
                    <label for="q2">2. Did this peer contribute their share to the prohect?</label> <br>
                <input type="checkbox" name="q2"> Yes<br><br>


                  <label for="q3">3. On a scale 1-5, how well did this peer communicate with others?</label> <br>
                  <select id="q3ans" name="q3">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                    <input type="hidden" id="courseID" name="course_id" value="<?php echo($_GET["course_id"])?>">
                    <input type="hidden" id="groupID" name="group_id" value="<?php echo($_GET["group_id"])?>">
                    <input type="hidden" id="studentID" name="id" value="<?php echo($_GET["id"])?>">
                    <input type="hidden" id="evalStudentID" name="rev_id" value="<?php echo($_GET["rev_id"])?>">



                    <div class="center"> 
            <button id="joinCourseButton" name="submit">Submit</button>
            <button id="joinCourseButton" onclick="window.location.href='StudentProfile.php'" >Cancel</button>

        </div>
              </form>

              <hr>

             
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
