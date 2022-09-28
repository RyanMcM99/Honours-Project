<?php
//Start Session will ensure the page will use sessions on this page. This will help with login functionality.
session_start();
?>

<html lang="en">

<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--These references allow for bootstrap and JQuery to be used on this page. These are used for the navbar and icons. It also references the stylesheet css file.-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <!--Padding for the text so it isn't on the far left of the page-->
    <style>
        #textchange {
            padding-right: 20px;
        }
    </style>

</head>

<body>
    <!--If the user is logged in. They will be timed for being inactive for 20 minutes. If the user doesn't move the cursor in that time, the user will be logged out-->
    <?php
 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
 {
 
 ?>
    <!--The timer is reset if the user moves the cursor on the page-->

    <body onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()"
        onscroll="reset_interval()">




        <script type="text/javascript">

            //the interval 'timer' is set as soon as the page loads

            var timer = setInterval(function () { auto_logout() }, 1200000);


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
                    <li class="nav-item active"><a href="HomePage.php">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">The Internet and its
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
                    document.getElementById('textchange').style.fontSize = '16px'
                }
            }
        </script>


        <h1>
            <center><b>A beginner's guide to Cybersecurity</b></center>
        </h1>

        <img src="Cybersecurity-home.jpg" height="500px" width="100%" alt="Cybersecurity">
        <br>

        <!--Main content on the page-->

        <div id="textchange">
            <p>The development of technology has created many advances in the way we live our lives. One of the biggest
                creations is the internet. The internet is an easily accessible resource that allows us to get in
                contact with family and friends, play game’s, banking ,do online shopping and conduct research to name
                but a few. <br><br>

                The possibilities are end-less! <br><br>

                However, for those who are not too familiar or comfortable using technology, you may feel intimidated or
                reluctant to engage with the internet. <br><br>

                This is because the internet is not entirely secure to users who are not sure on ways to protect
                them-selves. <br><br>

                There are malicious users who will create malware and viruses that can gain access to your personal
                information and devices. <br><br>

                This website was created as an information guide at an introductory level for those unsure of how to use
                the internet. <br><br>

                Hopefully it will give you a better understanding of the internet ,and advise on ways you can protect
                yourself online . <br><br></p>

            <h3><b>Takeaways from this course:</b></h3>

            <ul type="disc">
                <li>The knowledge of how to stay safe online.</li>
                <li>The ability to detect malware and fraudulent websites.</li>
                <li>More comfortable to engage with technology.</li>
            </ul>
            <br>

            <p>Some content will be restricted to most users. <br> <br>

                To get more information, including videos and other
                websites that offer more information, you will need to create an account. <br><br>

                Creating an account will also
                allow you to leave feedback which will improve the quality of this website for future users.</p>

            <center><button style="height:50px;width:200px;font-size:20px"><a href="What is the Internet.php"
                        class="button">Begin</a></button></center>

            <?php

//https://hibbard.eu/how-to-make-a-simple-visitor-counter-using-php/#:~:text=%20Here%20are%20the%20steps%20I%E2%80%99ll%20take%20to,finished%20image%20an%20free%20it%20from...%20More

// The following is a counter that records the number of times the website has been visited
$counter_name = "counter.txt";

// Check if a text file exists.
// If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}

// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);

// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f);
}

echo "You are visitor number $counterVal to this site";
?>
            <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
            <!--copyright-->
            <footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>
            </main>
    </body>

</html>