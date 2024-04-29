
<?php
session_start();
if(!isset($_SESSION['loggedin'] )|| $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


// if($_SERVER["REQUEST_METHOD"]=="POST"){
//   include 'partials/dbconnect.php';
 
//   // $score=$_POST['userScore'];

//   // $sql=" INSERT INTO `users` (`score`) VALUES ('$score') Where";
//   // $sql="UPDATE `users` SET `score` = '$score' WHERE `users`.`username` = $username";
// }
?>

<!-- Created By CodingNepal - www.codingnepalweb.com  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    <link rel="stylesheet" href="css/exam.css">
    <!-- FontAweome CDN Link for Icons-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>
<body>

<!-- <?php

require 'partials/_nav.php'
?> -->
 <a class="nav-link " aria-current="page" href="/loginsystem/welcome.php">
<button type="button" class="btn btn-primary"><-Back</button>
</a>
<div class="container">

  <!-- start Quiz button -->
  <div class="start_btn"><button>Start </button></div>

  <!-- Info Box -->
  <div class="info_box">
        <div class="info-title"><span>Some Rules </span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the test while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
          </div>
          <div class="buttons">
            <button class="quit">Exit</button>
            <button class="restart">Continue</button>
          </div>
        </div>
        
        <!-- Quiz Box -->
    <div class="quiz_box">
      <header>
        <div class="title">TEST</div>
        <div class="timer">
          <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
          </header>
          <section>
            <div class="que_text">
              <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
              <!-- Here I've inserted options from JavaScript -->
            </div>
          </section>
          
          <!-- footer of Quiz Box -->
          <footer>
            <div class="total_que">
              <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Next Que</button>
          </footer>
        </div>
        
        <!-- Result Box -->
        <form action="/loginsystem/exam.php" method="post">
          <div class="result_box">
            <div class="icon">
              <i class="fas fa-crown"></i>
            </div>
            <div class="complete_text">You've completed the Test!</div>
            <div class="score_text">
              
              
              <!-- Here I've inserted Score Result from JavaScript -->
            </div>
            <div class="buttons">
              <button class="restart">Replay </button>
              <button class="quit">Quit</button>
             
            </div>
          </div>
        </form>
        
      </div>
        <!-- Inside this JavaScript file I've inserted Questions and Options only -->
        <script src="js/questions.js"></script>
        
        <!-- Inside this JavaScript file I've coded all Quiz Codes -->
        <script src="js/script.js"></script>

      </body>
      </html>