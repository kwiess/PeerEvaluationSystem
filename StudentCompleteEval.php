<html lang="en">

<head>

<?php 

// $record_id = $_POST['record_id'];
// $actionCode = $_POST['actionCode'];
// $keyword;

// if($actionCode==1){
//     $keyword="ADD";
// }elseif($actionCode==2){
//     $keyword="DELETE";
// }

include("./includes/connect.inc.php");
include("./includes/student.auth.inc.php");
include('./includes/ChromePhp.php');

if(isset($_POST['submit_button'])){

}

ChromePhp::log("Past _POST");
ChromePhp::log($_POST);



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
        <h3>You are evaluating ***student name***</h3>
        <!-- <p>Submitted on April 2nd, 3:43PM </p> -->
        <div id="grey">
            <hr>

            <form action="/action_page.php">
                <label for="q1">1. What are this peer's strengths?</label> <br>
                <textarea id="q1ans" name="" rows="4" cols="50"> Answer and Questions
                    </textarea><br><br>
                
                    <label for="q2">2. Did this peer contribute their share to the prohect?</label> <br>
                <input type="checkbox" id="fname" name="fname"> Yes<br><br>
                <!-- <select id="q2ans">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select> -->

                  <label for="q3">3. On a scale 1-5, how well did this peer communicate with others?</label> <br>
                  <select id="q3ans">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>

                      <option value="4">4</option>
                      <option value="5">5</option>

                    </select>

                
              </form>

              <hr>

             
        </div>
        <div class="center"> 
            <button id="joinCourseButton">Submit</button>
            <button id="joinCourseButton">Cancel</button>

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