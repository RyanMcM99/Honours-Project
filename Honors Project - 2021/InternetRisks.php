<?php
//Start Session will ensure the page will use sessions on this page. This will help with login functionality.
    session_start();
?>
<html lang="en">

<head>
    <title>Internet Risks</title>
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
                    document.getElementById('textchange').style.fontSize = '14px'
                }
            }
        </script>

        <!--Main content on the page-->
        <div id="textchange">

            <h1>
                <center><b>Risks of the Internet</b></center>
            </h1>

            <center><img src="hacker.jpg" width="50%" alt="Hackert"></center>

            <!--https://blog.netwrix.com/2018/05/15/top-10-most-common-types-of-cyber-attacks/#Malware%20attack-->

            <br>

            <h2>
                <center><b>Is the internet safe?</b></center>
            </h2>

            <p>Despite the vast number of ventures the internet offers us, there are individuals and organisations that
                will take advantage of this technology to harm us. <br><br>

                These malicious users construct various types of
                software that can take over our computer or devices. <br><br>
                They create programs and websites that may seem respectable and legitimate on the surface but have
                malicious code that can damage our devices or take control of our personal accounts.<br><br>

                Sadly, these forms of attacks are becoming all the more common over the internet. <br><br>


                At present there is not anything  definitive to stop these organisations or individuals
                stealing our information. <br><br>

                However, it is important to understand what type of attacks are lurking on the web, which will give us a
                better idea on how to defend ourselves from these users and protect our personal information. <br><br>

                So let us take a look at the most common types of attacks.</p>

            <h2>
                <center><b>What are the risks associated with the Internet?</b></center>
            </h2>

            <h3>
                <center><b>Malware Attacks</b></center>
            </h3>

            <center><img src="Malware.jpg" width="50%" alt="Malware"></center>

            <br>

            <p>Malware is one of the most common forms of attacks but what exactly is it? <br><br>
                To put it simply, malware is
                any unwanted software installed into your computer and/or device without your permission and
                consent.<br><br>

                Malware is a software that attaches itself to programs and alter it to its own devious intentions. Let us
                take a look at
                some of the most common forms of malware lurking round the internet: </p>

            <ul="filled">
                <li><b>Trojans -</b> Sometimes referred to as a trojan horse, a trojan is a program that lurks within a
                    useful program and is intended for a malicious purpose. <br><br>

                    Trojans can create a back door that
                    attackers can exploit. <br><br> Trojans can be programmed to access your computer where they can listen
                    and
                    perform attacks. </li>
                <br>
                <li><b>Ransomware -</b> Ransomware takes a more direct approach than the other types of malware. <br><br>

                    Ransomware
                    restricts access to your data and threatens you by saying it will delete or publish your data unless
                    you pay a ransom. It is possible to reverse some ransomware if it is basic enough, but some will
                    force you to enter a private password they will give to you when you pay the ransom. Enabling you to gain back access to your systems.</li>
                <br>
                <li><b>Worms -</b> Unlike viruses, Worms don't attach themselves to files on your computer. Instead,
                    they are self-contained programs that are propagated across networks and computers. <br><br>

                    They are
                    commonly spread through email attachments where, once opened, will activate the worm program.</li>
                <br>
                <li><b>File infectors -</b> A file infector is a virus that usually attaches itself to executable code
                    files (files that end in .exe). When accessing the .exe file, the file is infected by the virus.
                </li>
                </ul>

                <h3>
                    <center><b>Phishing Attacks</b></center>
                </h3>

                <center><img src="phishing.jpg" width="50%" alt="Phishing Attacks"></center>

                <br>

                <p>A Phishing Attack consists of emails distributed around, which tricks you into thinking they are from a reliable
                    source. <br><br>
                    These emails have the intention of retrieving your personal information or pressure you into
                    performing some action. <br><br>

                    These emails may have an attachment that, when accessed, installs malware
                    onto your computer/devices.<br><br>
                    They may also present a link in the email which will redirect you to an
                    illegitimate website.<br><br>

                    These websites can trick you into downloading malware onto your machine or
                    trick you into giving up your personal information.</p>

                <h3>
                    <center><b>Password Attacks</b></center>
                </h3>

                <center><img src="passwordattack.jpg" width="50%" alt="Password Attacks"></center>

                <br>

                <p>It should be no surprise that passwords are a common focus for effective attacks on our personal
                    data. <br><br>

                    Hackers are always trying to find new methods to trick users into giving up their passwords.
                    <br><br>

                    Hackers
                    can attempt to retrieve your password through either <b>Brute-Force</b> or <b>Dictionary
                        Attacks</b>.

                    <ul="filled">
                        <li><b>Brute-Force - </b>This refers to a hacker trying to force their way into your accounts by
                            means of guessing the password. <br><br>

                            Hackers will attempt to find any information on you, for instance your birth date, name or
                            address.<br><br>

                            They can also find information of you family or friends in an attempt to get lucky and break
                            into your account.<br><br>

                            This is made even worse if you use the exact same password for all your accounts because if
                            one account gets breached, all your accounts can be breached.</li>
                        <br>

                        <li><b>Dictionary Attacks - </b>This refers to a hacker using a dictionary of common passwords
                            to
                            gain access to a user's computer, device and network. <br><br>

                            Hackers can achieve this by copying an
                            encrypted file which contains passwords and applies that same encryption to a dictionary of
                            commonly used passwords, and then compares the results.</li>
                        </ul>
                </p>

                <br>
                <p>If you're reading this page and feeling intimidated or even frightened by the dangers of the
                    internet,
                    do not worry.<br><br>
                    We will soon go over methods to protect ourselves from these issues.
                    <br><br>

                    The next page will give some real-world examples of how malicious software can be used.
                </p>

                <left><button><a href="InternetBenefits.php" class="button">Previous Page: Benefits of the
                            Internet</a></button></left>
                <!--Aligns the next button to the bottom right of the screen-->
                <div id="rAlign">
                    <right><button><a href="RiskExamples.php" class="button">Next Page: Examples of Online
                                Attacks</a></button></right>
                </div>
                <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
                <footer>
                    <!--Copyright-->
                    <b>&copy;Copyright 2021 Ryan McMillan Abertay</b>
                </footer>

        </div>

        </main>
    </body>

</html>