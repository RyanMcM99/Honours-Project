<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Knowledge Check - Part 2 (Members Only)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php
 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
     
     ?>

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

        <?php
}
?>
        <script>
            function invertcolors() {
                var checkBox = document.getElementById("invert");

                if (checkBox.checked == true) {
                    document.getElementById('page-wrap').style.backgroundColor = '#252525'
                    document.getElementById('page-wrap').style.color = '#ebebeb'

                } else {
                    document.getElementById('page-wrap').style.color = '#252525'
                    document.getElementById('page-wrap').style.backgroundColor = '#ffffff'
                }

            }

            function textSize() {
                var checkBox = document.getElementById("enlarge");

                if (checkBox.checked == true) {
                    document.getElementById('page-wrap').style.fontSize = '25px'

                } else {
                    document.getElementById('page-wrap').style.fontSize = '14px'
                }
            }
        </script>


        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="HomePage.php">Home</a></li>
                    <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">The Internet
                            and its
                            Risks<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="What is the Internet.php">What is the Internet</a></li>
                            <li><a href="InternetBenefits.php">Benefits of the Internet</a></li>
                            <li><a href="InternetRisks.php">Risks of the Internet</a></li>
                            <li><a href="RiskExamples.php">Real-World Examples of Cyber Attacks</a></li>
                            <li><a href="quiz.php">Knowledge Check</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cybersecurity and
                            Staying Safe Online<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Cybersecurity-Introduction.php">Introduction to Cybersecurity</a></li>
                            <li><a href="Cybersecurity-Methods.php">Ways to Stay Safe Online</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a href="Questionnaire.php">Leave Feedback</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>
        <?php
         if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
             ?>
        <div id="page-wrap">
            <h1>The Internet and Its Risks Knowledge Check - Members only</h1>
            <form action="quizResult2.php" method="POST" id="quiz">
                <ol>
                    <li>
                        <h3>You recieve an email you aren't familiar with. The email prompts you to click a link. Do you
                            click it?</h3>

                        <div>
                            <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                            <label for="question-1-answers-A">A) Yes </label>
                        </div>

                        <div>
                            <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                            <label for="question-1-answers-B">B) No</label>
                        </div>
                    </li>

                    <li>
                        <h3>The internet allows you to engage with others over common interests and hobbies? (True or
                            False)</h3>

                        <div>
                            <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                            <label for="question-2-answers-A">A) True</label>
                        </div>

                        <div>
                            <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                            <label for="question-2-answers-B">B) False</label>
                        </div>

                    </li>

                    <li>

                        <h3>The internet allows you to get information on any symptons you may be feeling as well as
                            allowing you to get in touch with medical professionals? (True or False)</h3>

                        <div>
                            <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                            <label for="question-3-answers-A">A) True</label>
                        </div>

                        <div>
                            <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                            <label for="question-3-answers-B">B) False</label>
                        </div>
                    </li>
                </ol>

                <input type="submit" value="Submit" class="submitbtn" />

            </form>

        </div>


        </li>
        </ol>
        </form>
        </div>
        <?php
} else {
     echo "Leaving Feedback is exclusive to Registered users only. Please Login if you would like to leave feedback";
     
?>

        <button><a href="Login.php" class="button">Login</a></button>
        <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
        <?php
}
?>
        <footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>

        </main>
    </body>