<?php
//Start Session will ensure the page will use sessions on this page. This will help with login functionality.
session_start();
?>

<html lang="en">

<head>
    <title>Introduction to Cybersecurity</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--These references allow for bootstrap and JQuery to be used on this page. These are used for the navbar and icons. It also references the stylesheet css file.-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">


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

    <!--If the user is logged in. They will be timed for being inactive for 20 minutes. If the user doesn't move the cursor in that time, the user will be logged out-->
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
        <?php
}
?>
        <!--Navbar - The navbar uses dropdowns to differentiate the different modules on the website i.e. the internet and risks and Cybersecurity and staying safe. The navbar also contains a login and register buttton, and a logout and feedback button if the user is logged in. Finally, the navbar contains an accessiblity button that will change the text size and the color scheme of the page-->

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
                            <li><a href="quiz.php">Knowledge Check</a></li>
                        </ul>
                    </li>
                    <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cybersecurity
                            and
                            Staying Safe Online<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="Cybersecurity-Introduction.php">Introduction to
                                    Cybersecurity</a></li>
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
            //Inverts the color scheme on the webpage if the checkbox is toggled on. textchange is the div tag for the page
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

        <!--Main content on the page-->
        <div id="textchange">
            <h1>
                <center><b>What is CyberSecurity?</b></center>
            </h1>

            <center><img src="Cybersecurity.jpg" width="500px" height="250px" alt="Cybersecurity"></center>
            <br>

            <p>Cybersecurity is used to help protect both individuals and organisations and lower the risk of any
                incoming
                Cyber Attack. <br><br>

                The main function of Cybersecurity is to protect our everyday devices, e.g., computers,
                laptops, smartphones, and tablets, as well as the services we use from any thefts and damages. </p>


            <h3>
                <center><b>The importance of Cybersecurity</b></center>
            </h3>

            <center><img src="Cybersecurity3.jpg" width="500px" height="250px"></center>

            <br>

            <p>With the large precense technology has in our daily lives, it's not surprising that some individuals and
                organisations try to take advantage for personal gain. <br><br>

                To demonstrate how dangerous this is, let us take
                a look at websites that offer online shopping. <br><br>

                Whilst it has never been easier to purchase items via the internet, some of these websites are not an
                entirely safe option when purchasing goods.<br><br>

                You will need to enter in your bank details, as well as other personal information so that the
                transaction can be completed.
                If there is no protection set up on the website, a malicious user can access your personal information,
                gaining access to your bank account.
                <br><br>
            </p>

            <p>You may be thinking to yourself, "Why would I even hand over my personal information to these companies
                if they can be stolen?". <br><br>

                It is good to be cautious about handing over sensitive information, but be rest
                assured that businesses and organisations take your security seriously. <br><br>

                Businesses must comply with the
                Data Protection Act which has consequenses if they fail to to follow those regulations. When they store
                you're information, they have security precautions that will ensure that your data is protected from
                external attacks. <br><br> </p>

            <?php
        
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                
                ?>

            <a href="https://www.youtube.com/watch?v=inWWhr5tnEA">An Introduction to Cybersecurity</a>

            <?php
                 
        }
        ?>

            <p>Even though these businesses and organisations are determined to protect your data, it is important for
                you to understand some techniques to protect yourself. The next page will go over methods.</p>

            <left><button><a href="RiskExamples.php" class="button">Previous Page: Risk Examples</a></button></left>

            <!--The back button is placed on the bottom left whereas the next button is placed on the bottom right. This was done to help aid navigation-->

            <div id="rAlign">
                <right><button><a href="Cybersecurity-Methods.php" class="button">Next Page: How to stay safe
                            online</a></button></right>
            </div>
            <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
            <footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>
        </div>
    </body>

</html>