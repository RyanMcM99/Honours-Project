<?php
//Start Session will ensure the page will use sessions on this page. This will help with login functionality.
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Examples of Internet Attacks</title>
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
                    <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">The Internet
                            and its
                            Risks<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="What is the Internet.php">What is the Internet</a></li>
                            <li><a href="InternetBenefits.php">Benefits of the Internet</a></li>
                            <li><a href="InternetRisks.php">Risks of the Internet</a></li>
                            <li class="active"><a href="RiskExamples.php">Real-World Examples of Cyber Attacks</a></li>
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
        <!--Main content on the page-->
        <div id="textchange">
            <h1>
                <center><b>Real-World Malware and Cyber Attacks</b></center>
            </h1>

            <!--https://www.kratikal.com/blog/5-most-notorious-malware-attacks-of-all-time/-->
            <h3>
                <center><b>CovidLock</b></center>
            </h3>

            <center><img src="covidlock.png" width="50%" alt="CovidLock"></center>
            <br>

            <p>Currently, we are still in the middle of the Coronavirus epidemic, which is taking its toll on how we go about our
                daily lives. It has been difficult for everyone<br><br>

                However, where we see difficulty, some people see it as an
                opportunity. <br><br>

                There are individuals who are committing cyber-attacks by creating malware within
                applications that aim to lure in people who are looking for information related to COVID-19. <br><br>

                Remember when we spoke about Ransomware? Well, Cybercriminals have deployed ransonware called CovidLock
                which uses malware that encrypts key data on your device.<br><br>
                Once the malware is installed, this program
                infects your device with malicious files that gives you false promises to offer detailed information
                that is related to the Coronavirus. <br><br>

                The app claims to show heat map visuals and other data about
                COVID19. <br><br>

                When the app is being installed, it will attempt to coerce its user to give it administration
                access with the promise of unlocking certain types of information. <br><br>

                If this access is granted, the app
                will lock up all contacts, pictures, videos, and social media accounts. The only way to get control back
                of your device is to pay the
                demanded ransom. <br><br>

                The app will make threats that your private information will be released publicly and
                your phones memory will be erased.</p>
            <!--User is offered more information if the user is logged in-->
            <?php
                
                 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
 {
     echo "For more information on CovidLock, have a look at this website"
     
     ?>

            <a
                href="https://www.techrepublic.com/article/covidlock-ransomware-exploits-coronavirus-with-malicious-android-app/">TechRepublic
                - CovidLock</a>

            <?php
 }
    ?>

            <br>
            <h3>
                <center><b>LockerGoga</b></center>
            </h3>

            <center><img src="lockergoga.jpg" width="50%" alt="LockerGoga"></center>
            <br>
            <p>LockerGoga was another example of a ransomware attack that took place in 2019.<br><br>

                LockerGoga was responsible
                for infecting both Altran Technologies and a Norwegian aluminium company called Norsk Hydro where both
                company's IT systems were disrupted. <br><br>

                LockerGoga was spread through malicious emails, credential theft
                and phishing scams. The damage caused by LockerGoga estimated in millions of dollars as equipment needed
                to be repaired and replaced.</p>
            <br>
            <h3>
                <center><b>Emotet, Trojan</b></center>
            </h3>

            <br>
            <center><img src="emotet.jpg" width="50%" alt="Emotet"></center>

            <br>
            <p>An example of a trojan horse is Emotet which was defined as the most destructive and highly dangerous
                malware by the U.S. Department of Homeland Security. This was due to the malware being widely used by
                cybercriminals for financial information thefts such as the theft of bank logins. <br><br>

                Emotet was spread through malicious emails as both spam and phishing campaigns. The city of Allentown,
                Pennsylvania and the Chilean bank Consorcio were the 2 most affected case of Emotet. <br><br>

                Consorcio suffered
                $2 million and Allentown ended up losing $1 million.</p>
            <left><button><a href="InternetRisks.php" class="button">Previous Page: Risks of the internet</a></button>
            </left>

            <!--The back button is placed on the bottom left whereas the next button is placed on the bottom right. This was done to help aid navigation-->
            <div id="rAlign">
                <right><button><a href="quiz.php" class="button">Next Page: Knowledge Check 1</a></button></right>
            </div>
            <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
            <!--copyright-->
            <footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>

        </div>
        </main>
    </body>

</html>