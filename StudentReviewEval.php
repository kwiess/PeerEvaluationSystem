<?php
    include('db_connection.php'); //REVIEW: abosulte for Diana
    include("./includes/ChromePhp.php");
    // include_once("./includes/connect.inc.php");
    include('includes/student.auth.inc.php');

    //get url param. 
    if(!empty($_GET["id"])){

        $evalId = $_GET["id"];

        $sql_peerreviewed = "SELECT * FROM `Evaluation` WHERE `EvaluationID` = $evalId";

        $result_peerreviewed = mysqli_query($conn, $sql_peerreviewed);
        $row_peerreviewed = mysqli_fetch_array($result_peerreviewed);

        ChromePhp::log($row_peerreviewed);

        // fetch student info for that url param
        $sql_peer = "SELECT StudentName FROM `Student` WHERE `StudentID` = $row_peerreviewed[EvaluatedStudentsID]";
        $result_peer = mysqli_query($conn, $sql_peer);
        $row_peer = mysqli_fetch_array($result_peer);

        ChromePhp::log($row_peer);
        // ChromePhp::log($row_peerreviewed["EvalQuestions"]);

        // $questions = json_decode($row_peerreviewed["EvalQuestions"]);
        //remove leading [ and tailing]
        // $questions = explode(", ",$row_peerreviewed["EvalQuestions"]);
        $questions  = array($row_peerreviewed["EvalQuestions"], $row_peerreviewed["EvalQuestions2"],$row_peerreviewed["EvalQuestions3"] );
        ChromePhp::log($questions);


    }



    // render in html

?>

<html lang="en">

<head>
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
        <h1>View Evaluations</h1>
        <h2>IS424</h2>
        <h3>Your evaluation for <?php echo $row_peer["StudentName"]; ?>                      
        </h3>
        <!-- <p>Submitted on April 2nd, 3:43PM </p> -->
        <div id="grey">
            <hr>

            <form action="/action_page.php">
                <label for="q1">1. What are this peer's strengths?</label> <br>
                <textarea id="q1ans" name="" rows="4" cols="50">  <?php echo $questions[0]; ?>
                    </textarea><br><br>
                
                    <label for="q2">2. Did this peer contribute their share to the prohect?</label> <br>
                <input type="checkbox" id="fname" name="fname" <?php if($questions[1] =="1" )echo("checked") ?>  > Yes<br><br>
                <!-- <select id="q2ans">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select> -->

                  <label for="q3">3. On a scale 1-5, how well did this peer communicate with others?</label> <br>
                  <select id="q3ans">

                  <?php 
        ChromePhp::log("Will start forloop");
                  
                  for($j=1; $j<6; $j++){
                      $i = strval($j);
                    //   ChromePhp::log($i);
                    $str = "";
                      if($i== $questions[2] ){
                          $str = "<option value='$i' selected>$i</option>";
                      }
                      else {
                          $str = "<option value='$i'>$i</option>";
                  
                      }
                      echo($str);
        ChromePhp::log($str);
                  
                  }
                  ?>
                                    
                                

                    </select>

                
              </form>

              <hr>

             
        </div>
        <div class="center"> 

            <button id="joinCourseButton" onclick="window.location.href='StudentProfile.php'" >Back to My Profile</button>
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
