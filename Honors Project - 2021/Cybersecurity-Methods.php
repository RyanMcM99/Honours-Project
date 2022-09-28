<?php
//Start Session will ensure the page will use sessions on this page. This will help with login functionality.
session_start();
?>

<html lang="en">

<head>
    <title>Cybersecurity Methods</title>
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
                            <li><a href="Cybersecurity-Introduction.php">Introduction to Cybersecurity</a></li>
                            <li class="active"><a href="Cybersecurity-Methods.php">Ways to Stay Safe Online</a></li>
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
                <center><b>Methods of Staying Safe Online</b></center>
            </h1>

            <center><img src="stayingsafe1.jpg" width="500px" height="250px" alt="Staying Safe Online"></center>
            <br>

            <!--https://www.techrepublic.com/article/top-5-ways-to-stay-safe-online/#:~:text=%20Here%20are%20five%20ways%20to%20stay%20safe,people%20can%20sniff%20out%20your%20traffic.%20More%20-->

            <h2>
                <center><b>How to Stay Safe Online</b></center>
            </h2>

            <p>Now that you have a basic understanding of what Cybersecurity is, you may be wondering how you can
                protect yourself online. <br><br>

                Thankfully, you <b>do not</b> need to have a high amount of technical knowledge or even be an expert
                on cybersecurity in order to keep yourself safe online. <br><br>

                This page will explain various methods you
                can use to reduce the risk of malware and other attacks on your device. It is recommended that you do
                some more research on each of these methods if you are interested in using them.</p>


            <h3>
                <center><b>Ensure Your Anti-Virus Software is Up to Date</b></center>
            </h3>

            <center><img src="antivirus.jpg" width="500px" height="250px" alt="Staying Safe Online"></center>

            <br>

            <p>One way to lower the risk of an attack is to ensure that your Anti-Virus software is up-to-date. <br><br>


                Anti-Virus is software that works to prevent, detect, and remove malware, with the goal of protecting
                your computer. <br><br>

                Some examples of Anti-Virus software are: <br> </p>

            <b>Paid Options</b> <br>
            <ul type="filled">
                <li>Kaspersky</li>
                <li>McAfee</li>
                <li>Norton</li>
            </ul>

            <b>Free Options</b> <br>
            <ul type="filled">
                <li>AVG</li>
                <li>Panda</li>
            </ul>

            <?php
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    
    ?>
            <p>The software listed above aims to protect your computer and personal accounts from any viruses or
                attacks. If you would like to have a look at the best Anti-Virus software for your system, please have a
                look at the link below. <br></p>

            <a href="https://top10bestantivirusprotection.com">Best Anti-Virus software 2021</a> <br>
            <?php
        
        }
        ?>
            <p> Anti-Virus software does a great job at protecting your computer <br><br>

                However, new malware programs are being created
                all the time. Anti-Software programs will not be able to defend against these viruses automatically so
                programmers are constantly at work to locate new malware and updating their software to defend systems
                against these new attacks. <br><br>

                To ensure you are always protected, please ensure your Anti-Virus Software is
                constantly updated so you are able to protect your computer from new malware.</p>


            <h3>
                <center><b>Smart use of Passwords</b></center>
            </h3>

            <center><img src="password.jpg" width="500px" height="250px" alt="Staying Safe Online"></center>
            <br>
            <p>Using passwords is one of the most commonly used method of protection that we use. <br><br>

                A password is a word or set of characters
                chosen by a user that restricts access to your account unless that word is entered. This reduces the
                chance of
                unauthorised users from accessing accounts that they aren't given access to, or stops you from buying
                products unless you confirm who you are. <br><br>

                Passwords are great, but they aren't fool proof. <br><br>

                Hackers are able to hack into your account even though
                it is protected. So how do we ensure our passwords are strong enough to protect against these attacks.
                <br><br>

                <b>Never Use the Same Password Twice</b> - You should try not to use the same password twice. It may
                feel overwhelming to have many passwords for many accounts but the truth is, it's for the better.
                <br><br>

                If you
                use the same password for everything, it puts all your accounts at risk. If one of those accounts are
                breached by a hacker, they are going to try that exact same password for all your other accounts.
                Therefore, it important to try and use as many unique passwords as possible.<br><br>

                <b>Use a combination of Characters and Numbers</b> - The best way to come up with a good password is to
                ensure that your password uses a combination of characters (a-z,A-Z), numbers (0-9) and symbols (!"*%$).
                <br><br>

                This helps to ensure that your password is strong enough, reducing the risk of your account being
                breached.<br><br>

                <b>Ensure your password is long</b> - Another way of making a strong password is to ensure that it is
                not
                too short. The shorter your password, the easier it is for someone to hack into your account. <br><br>

                The length
                of your password should be a minimum of 8 characters and/or numbers. This will help reduce the risk of
                your account being breached.<br><br>
            </p>

            <h3>
                <center><b>Install a Firewall</b></center>
            </h3>

            <br>
            <center><img src="firewall.jpg" width="500px" height="250px" alt="Firewall"></center>


            <!--https://www.cisco.com/c/en/us/products/security/firewalls/what-is-a-firewall.html-->
            <p>If you have Anti-Virus installed and still feel you are vulnerable online, it may be worth looking at
                installing a Firewall onto your computer or other device. <br><br>

                A firewall is a network security device that monitors
                incoming and outgoing network traffic which allows it to make a choice on whether to allow or block
                specific traffic based on a pre-defined set of security rules. <br><br>

                For over 25 years, firewalls have been a first line of defence in regards to network security. But how
                do they work? <br><br>

                Firewalls create a barrier between both secured and controlled internal networks that can
                be either trusted and untrusted outside networks like the internet. <br><br>

                For example, Firewalls prevent malicious users from accessing and taking control of your computer from
                another location. However, Firewalls aren't suitable for defending you from malware and viruses.
                Therefore, Firewalls work best in conjunction with Anti-Virus software.</p>


            <h3>
                <center><b>Try not to connect to public Wi-Fi</b></center>
            </h3>

            <center><img src="publicwifi.jpg" width="500px" height="250px" alt="Public Wifi"></center>

            <br>

            <p>Most places offer Wi-Fi to the public. From restaurants and cafes to buses and trains. On the surface,
                these seem extremely convenient for us as it allows us to access the internet even when we are not at our
                home. <br><br>

                You may even think of the stereotypical writer typing away at his computer in a small cafe, using
                the internet to find sparks of inspiration. However, it is important to remember that this isn't safe.
                <br><br>

                Even though they may be convenient for us, most public Wi-Fi don't have very sophisticated security
                measures, which leaves your data open for an attack. <br><br>

                Hackers have an easier time accessing your private
                data and accounts when you're connected to public Wi-Fi because you aren't protected. <br><br>

                Only use public
                Wi-Fi when you need to but be careful as you're leaving yourself open for a higher chance of attack.
            </p>


            <left><button><a href="RiskExamples.php" class="button">Previous Page: Risk Examples</a></button></left>

            <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
            <footer>
                <!--Copyright-->
                &copy;Copyright 2021 Ryan McMillan Abertay
            </footer>
        </div>
        </main>
    </body>

</html>