<?php
//Start Session will ensure the page will use sessions on this page. This will help with login functionality.
    session_start();
?>
<html lang="en">

<head>
    <title>Quiz 2 Results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--These references allow for bootstrap and JQuery to be used on this page. These are used for the navbar and icons. It also references the stylesheet css file.-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">


    <!--Padding for the text so it isn't on the far left of the page. It also puts padding on the top so it isn't close to the image and to the right so it isnt pushed to the edge of the page-->
    <style>
        #textchange {
            padding-left: 20px;
            padding-top: 20px;
            padding-right: 20px;
        }

        #rAlign {
            float: right;
            padding-right: 20px;
        }
    </style>
</head>

<body>

    <?php
 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
 {
 
 ?>
    <!--If the user is logged in. They will be timed for being inactive for 20 minutes. If the user doesn't move the cursor in that time, the user will be logged out-->

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
        <!--Navbar - The navbar uses dropdowns to differentiate the different modules on the website i.e. the internet and risks and Cybersecurity and staying safe. The navbar also contains a login and register buttton, and a logout and feedback button if the user is logged in. Finally, the navbar contains an accessiblity button that will change the text size and the color scheme of the page-->
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
                            <li class="active"><a href="InternetRisks.php">Risks of the Internet</a></li>
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
                </ul>

                <?php
            
                    }else{
                        
            ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>

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
            </div>
        </nav>
        <script>
            //Inverts the color scheme on the webpage if the checkbox is toggled on. textchange is the div tag for the page content
            function invertcolors() {
                var checkBox = document.getElementById("invert");

                if (checkBox.checked == true) {
                    document.getElementById('textchange').style.backgroundColor = '#252525'
                    document.getElementById('textchange').style.color = '#ebebeb'

                } else {
                    document.getElementById('textchange').style.color = '#252525'
                    document.getElementById('textchange').style.backgroundColor = '#ffffff'
                }

            }

            function textSize() {
                //Enlarge the text in the text change div tag if the checkbox is toggled on
                var checkBox = document.getElementById("enlarge");

                if (checkBox.checked == true) {
                    document.getElementById('textchange').style.fontSize = '25px'

                } else {
                    document.getElementById('textchange').style.fontSize = '14px'
                }
            }
        </script>


        <?php
 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
 {
 
 ?>

        <div id="page-wrap">

            <h1>Results</h1>

            <?php
            
            $answer1 = $_POST['question-1-answers'];
            $answer2 = $_POST['question-2-answers'];
            $answer3 = $_POST['question-3-answers'];
        
            $totalCorrect = 0;
            
            if ($answer1 == "B") 
            {
                $totalCorrect++;
                echo "Q1 Correct. If you don't feel comfortable with an email, you shouldn't click any links.";
                
                echo "<br>";
                echo "<br>";
            }   else 
            {
                echo "Q1 Incorrect. If you feel uncertain about an email, you shouldn't click any links";
                
                echo "<br>";
                echo "<br>";
            }
            if ($answer2 == "A") 
            {
                $totalCorrect++;
                echo "Q2 Correct. Well done. The internet allows you to join with other overs similar interests";
                
                echo "<br>";
                echo "<br>";
            }   else
            {
                echo "Q2 Incorrect. The internet can bring people together over a common interest";
                
                echo "<br>";
                echo "<br>";
            }
            if ($answer3 == "A") 
            {
                $totalCorrect++; 
                echo "Q3 Correct. Well done. The internet allows users to get in contact with medical professionals";
                
                echo "<br>";
                echo "<br>";
            }  else
            {
                echo "Q3 Incorrect. The internet allows users to get in contact with medical professionals";
                
                echo "<br>";
                echo "<br>";
            }
            
            
            if($totalCorrect == 3)
            {
                
             echo "Great Work. You seem to have a good understanding of the infromation you've read so far. You can now proceed forward.";
                
                echo "<br>";
                echo "<br>";
            }
            
            else if($totalCorrect == 2)
            {
              echo "Good Job. You seem to understand most of the information. You can proceed onwards but you may want to go back to ensure you understand the content so far.";
                
                echo "<br>";
                echo "<br>";
                
            }
            
            else if ($totalCorrect < 2) 
            {
                echo "It is advised you go back to revise the information before going forward.";
                echo "<br>";
                echo "<br>";
            }
            echo "<div id='results'>$totalCorrect / 3 correct</div>";
            ?>
            <left><button><a href="Cybersecurity-Introduction.php" class="button">Begin Module 2</a></button></left>
            <?php
        }else{
            echo "Members Only";
            ?>

            <left><button><a href="Login.php" class="button">Login</a></button></left>

            <?php
        }
        ?>

            <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
            <footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>

            </main>

        </div>

    </body>

</html>