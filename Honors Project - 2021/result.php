<!DOCTYPE html>

<head>
    <title>Knowledge Check</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <body onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()"
        onscroll="reset_interval()">

        <script type="text/javascript">

            //the interval 'timer' is set as soon as the page loads

            var timer = setInterval(function () { auto_logout() }, 1200000);

            // the figure '20000' (20 seconds) indicates how many milliseconds the timer be set to.

            //e.g. if you want it to set 5 mins, calculate 5min= 5x60=300 sec => 300,000 milliseconds.

            //https://www.scriptarticle.com/automatic-session-timeoutlogout-using-php-x-minutes-inactivityidle-time/#:~:text=Session%20timeout%20or%20Session%20expire%20depends%20on%20the,to%20something%20else.%20Below%20are%20some%20Session%20configurations.
            function reset_interval() {

                //first step: clear the existing timer
                clearInterval(timer);

                //second step: implement the timer again
                timer = setInterval(function () { auto_logout() }, 1200000);
                //..completed the reset of the timer

            }

            function auto_logout() {

                //this function will redirect the user to the logout script

                if (confirm("You have been logged out from the application, Press OK to login again!")) {
                    window.location = "Logout.php";
                }

            }

        </script>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="HomePage.php">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">The Internet and its
                            Risks<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="What is the Internet.php">What is the Internet</a></li>
                            <li><a href="InternetBenefits.php">Benefits of the Internet</a></li>
                            <li><a href="InternetRisks.php">Risks of the Internet</a></li>
                            <li><a href="RiskExamples.php">Real-World Examples of Cyber Attacks</a></li>
                            <li class="active"><a href="quiz.php">Knowledge Check</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cybersecurity and
                            Staying Safe Online<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Cybersecurity-Introduction.php">Introduction to Cybersecurity</a></li>
                            <li><a href="Cybersecurity-Methods.php">Ways to Stay Safe Online</a></li>
                        </ul>
                    </li>

                    < <?php if (isset($_SESSION['logged']) && $_SESSION['logged']==true) { ?>

                        <li class="nav-item"><a href="Questionnaire.php">Leave Feedback</a></li>
                </ul>


                <?php
        
                }if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                    
                    
            ?>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
                <?php
                    
                    
                } else  {
           
           ?>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>

                <?php
           
           
}
                ?>

            </div>
        </nav>
        <div id="page-wrap">

            <h1>Results</h1>

            <?php
            
            $answer1 = $_POST['question-1-answers'];
            $answer2 = $_POST['question-2-answers'];
            $answer3 = $_POST['question-3-answers'];
            $answer4 = $_POST['question-4-answers'];
            $answer5 = $_POST['question-5-answers'];
        
            $totalCorrect = 0;
            
            if ($answer1 == "D") 
            {
                $totalCorrect++;
                echo "Q1 Correct. Well done, all available options are benefits gained from the internet.";
                
                echo "<br>";
                echo "<br>";
            }   else 
            {
                echo "Q1 Incorrect. This was a trick question. All options are benefits gained from the internet.";
                
                echo "<br>";
                echo "<br>";
            }
            if ($answer2 == "B") 
            {
                $totalCorrect++;
                echo "Q2 Correct. Well done. Despite being a quick way of accessing your account, Online Banking is not completely safe as there malicious users that will try to hijack your account.";
                
                echo "<br>";
                echo "<br>";
            }   else
            {
                echo "Q2 Incorrect. Online Banking is not completely safe so it's best to keep cautious when using these services.";
                
                echo "<br>";
                echo "<br>";
            }
            if ($answer3 == "A") 
            {
                $totalCorrect++; 
                echo "Q3 Correct. Well done. Phishing Attacks take the form of emails that will attempt to trick you into clicking a link that will install malware onto your device.";
                
                echo "<br>";
                echo "<br>";
            }  else
            {
                echo "Q3 Incorrect. Phishing Attacks are actually emails that will try to trick you into installing malware onto your device.";
                
                echo "<br>";
                echo "<br>";
            }
            
            if ($answer4 == "A") 
            {
                $totalCorrect++;
                echo "Q4 Correct. Well done. Malware is able to attatch itself to programs. They might be an extremely small part of a big program but they will work to damage your device.";
                
                echo "<br>";
                echo "<br>";
            } else
            {
                echo "Q4 Incorrect. Malware is able to attatch itself to programs. ";
                
                echo "<br>";
                echo "<br>";
            }
            if ($answer5 == "C") 
            {
                $totalCorrect++;
                echo "Q5 Correct. Well done. Ransomware was used in both these cases.";
                
                echo "<br>";
                echo "<br>";
            } else
            {
                echo "Q5 Incorrect. The correct answer is Ransomware";
                
                echo "<br>";
                echo "<br>";
            }
            
            
            if($totalCorrect == 5)
            {
                if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) 
                		echo "<script> location.href = 'quiz2.php'; </script>";
             //   echo "Great Work. You seem to have a good understanding of the infromation you've read so far. You can now proceed forward.";
                
               // echo "<br>";
                //echo "<br>";
            }
            
            else if($totalCorrect == 3 || $totalCorrect == 4)
            {
              //  echo "Good Job. You seem to understand most of the information. You can proceed onwards but you may want to go back to ensure you understand the content so far.";
                
               // echo "<br>";
                //echo "<br>";
                
                		echo "<script> location.href = 'quiz2.php'; </script>";
            }
            
            else if ($totalCorrect < 3) 
            {
                echo "It is advised you go back to revise the information before going forward.";
                echo "<br>";
                echo "<br>";
            }
            echo "<div id='results'>$totalCorrect / 5 correct</div>";
            
            
        ?>

            <left><button><a href="What is the Internet.php" class="button">Revisit Module 1</a></button></left>

            <right><button><a href="quiz2.php" class="button">Knowledge Check Part 2 - Members Only!</a></button>
            </right>

            <right><button><a href="Cybersecurity-Introduction.php" class="button">Begin Module 2: Cybersecurity and
                        Staying Safe Online</a></button></right>

            <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
            <footer>&copy;Copyright 2021 Ryan McMillan Abertay</footer>

            </main>

        </div>

    </body>

    </html>