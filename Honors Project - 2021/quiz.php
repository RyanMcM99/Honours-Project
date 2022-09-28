<?php
session_start();
?>

<html lang="en">

<head>
    <title>Knowledge Check</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <style>
        #submit {
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <?php
 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
 {
 
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

        <?php
}
?>
        <!--Navbar - The navbar uses dropdowns to differentiate the different modules on the website i.e. the internet and risks and Cybersecurity and staying safe. The navbar also contains a login and register buttton, and a logout and feedback button if the user is logged in. Finally, the navbar contains an accessiblity button that will change the text size and the color scheme of the page-->


        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="HomePage.php">Home</a></li>
                    <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">The Internet
                            and its
                            Risks<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="What is the Internet.php">What is the Internet</a></li>
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
                    <?php 
                 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                    
                
                ?>

                    <li class="nav-item"><a href="Questionnaire.php">Leave Feedback</a></li>
                </ul>

                <?php

             }if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                    
                    
            ?>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

                    <?php
             } else {
                 ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                        <?php
             } 
           ?>

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Accessibility
                                Options<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li> <label class="switch">
                                        <input type="checkbox" id="enlarge" onclick="textSize()">
                                        <span class="slider round">Enlarge Text</span>
                                    </label>
                                </li>

                                <li> <label class="switch">
                                        <input type="checkbox" id="invert" onclick="invertcolors()">
                                        <span class="slider round">Invert</span>
                                    </label>
                                </li>
                            </ul>
                        </li>

                    </ul>
            </div>
        </nav>
        <script>
            //Inverts the color scheme on the webpage if the checkbox is toggled on. textchange is the div tag for the page content
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
                //Enlarge the text in the text change div tag if the checkbox is toggled on
                var checkBox = document.getElementById("enlarge");

                if (checkBox.checked == true) {
                    document.getElementById('page-wrap').style.fontSize = '25px'

                } else {
                    document.getElementById('page-wrap').style.fontSize = '14px'
                }
            }
        </script>

        <!--Main content on the page-->

        <div id="page-wrap">
            <!--The quiz is made up using radio buttons-->
            <h1>The Internet and Its Risks Knowledge Check</h1>
            <form action="result.php" method="POST" id="quiz">
                <ol>
                    <li>
                        <h3>What benefits does the Internet offer?</h3>

                        <div>
                            <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                            <label for="question-1-answers-A">A) Allows for Social Contact </label>
                        </div>

                        <div>
                            <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                            <label for="question-1-answers-B">B) Instant Access to Medical Professionals</label>
                        </div>

                        <div>
                            <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                            <label for="question-1-answers-C">C) Instant access to vast information on all kinds of
                                topics </label>
                        </div>

                        <div>
                            <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                            <label for="question-1-answers-D">D) All of the Above</label>
                        </div>
                    </li>

                    <li>
                        <h3>Online Banking is a fully safe alternative to normal banking. (True or False?)</h3>

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

                        <h3>What is a Phising Attack?</h3>

                        <div>
                            <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                            <label for="question-3-answers-A">A) A malicious email that tricks you into installing
                                malware onto you're system.</label>
                        </div>

                        <div>
                            <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                            <label for="question-3-answers-B">B) An attack on your passwords with the goal of breaking
                                your account. </label>
                        </div>

                        <div>
                            <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                            <label for="question-3-answers-C">C) Is primarily a website that tricks you into being
                                authentic, tricking you into giving over personal information.</label>
                        </div>

                        <div>
                            <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                            <label for="question-3-answers-D">D) None Of The Above</label>
                        </div>

                    </li>

                    <li>

                        <h3>Malware can attatch itself to pre-existing code (True or False?)</h3>

                        <div>
                            <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                            <label for="question-4-answers-A">A) True</label>
                        </div>

                        <div>
                            <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                            <label for="question-4-answers-B">B) False</label>
                        </div>

                    </li>

                    <li>

                        <h3>Which malware was used for CovidLock & LockerGoga?</h3>

                        <div>
                            <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                            <label for="question-5-answers-A">A) Worms</label>
                        </div>

                        <div>
                            <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                            <label for="question-5-answers-B">B) Trojan Horses</label>
                        </div>

                        <div>
                            <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                            <label for="question-5-answers-C">C) Ransomware</label>
                        </div>

                        <div>
                            <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                            <label for="question-5-answers-D">D) All of the Above</label>
                        </div>

                    </li>

                </ol>

                <div id="submit">
                    <input type="submit" value="Submit" class="submitbtn" />

                </div>
            </form>

        </div>


        </li>
        </ol>
        </form>
        </div>
        <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
        <!--Copyright-->
        <footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>

        </main>
    </body>