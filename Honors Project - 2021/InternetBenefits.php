<?php
//Start Session will ensure the page will use sessions on this page. This will help with login functionality.
session_start();
?>
<html lang="en">

<head>
    <title>Internet Benefits</title>
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

    <!--The timer is reset if the user moves the cursor on the page-->


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
                            <li class="active"><a href="InternetBenefits.php">Benefits of the Internet</a></li>
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
                    document.getElementById('textchange').style.fontSize = '14px'
                }
            }
        </script>
        <!--Main content on the page-->
        <div id="textchange">

            <h1>
                <center><b>Benefits of the Internet</b></center>
            </h1>


            <br>

            <!--http://workawesome.com/communication/10-life-changing-benefits-of-the-internet-age/-->

            <h2><b>
                    <center>Social Benefits</center>
                </b></h2>

            <center><img src="social-stock.jpeg" width="500px" height="250px" alt="Social Benefits"></center>

            <br>

            <p>The invention of the internet has completely changed the landscape of the way we are able to communicate
                with one another. <br><br>

                There are many options such as email and Social Media websites allowing you to very easily get in
                contact with others in seconds. <br><br>

                They have also helped with communication between multiple people, who are not in the same country, or
                are in a position where they are unable to speak to each other or see each other face to face. <br><br>

                This makes it easy for someone to get in touch with another or multiple people, when it can be difficult
                to find time to meet up or have meetings etc. <br><br>

                And the best part, this can be communicated in just seconds. <br><br>

                You can communicate to your friends or work colleagues as long as they have the internet, by using
                several applications whether it be by email, text or a form of social media. <br><br>

                With all that said, why not take advantage of this advancement.
            </p>



            <h2><b>
                    <center>Health Benefits</center>
                </b></h2>

            <center><img src="health-stock.jpg" width="500px" height="250px" alt="Health Benefits"></center>

            <br>

            <p>On the surface, you may be wondering why the internet has the potential to benefit your health but there
                are ways in which it can. <br><br>

                The internet can allow you to visit various health websites that can help with any concerns you may
                have. <br><br>

                For example, you can research any symptoms you have to get an idea on ways you can help yourself i.e.,
                for headaches.<br><br>
                The internet also can benefit your health and wellbeing.
                Allowing users to look for online exercise tutorials and mental health websites.<br><br>

                The internet gives you the ability to get in contact with doctors where you can schedule online
                appointments with them, or just ask them questions.<br><br>

                This is extremely useful if the nearest medical facility is far from where you live or isn't open as it
                allows you to get in touch with doctors or medical professionals whenever you need advice. <br><br>

                The best thing about using the internet for health reasons, is that in most countries you can now order
                online prescriptions for topping up your medication.<br><br>

                This can be beneficial for the elderly and infirm as they can find it difficult to get to the surgery to
                pick up their prescriptions.

            <h2><b>
                    <center>Online Learning & Research</center>
                </b></h2>

            <center><img src="research-stock.jpg" width="500px" height="250px" alt="Research"></center>

            <br>

            <p>The internet holds an unimaginable amount of knowledge on any subject you can think of.
                From information on hobbies, to keeping up to date with what is going on in the world. <br><br>
                The internet makes it easy to find
                whatever information you want. <br><br>
                And the best part? You can find the information you want at a moment’s notice. <br><br>

                The internet also offers online coursing on a vast number of topics. This allows everyone to join
                classes on anything they wish to engage with whether it be hobbies or other interests. <br><br>

                The internet can also be used by school and College students in order to help with studying for their
                courses and exams.
            </p>


            <h2><b>
                    <center>Online Banking</center>
                </b></h2>


            <center><img src="banking-stock.jpg" width="500px" height="250px" alt="The Internet"></center>

            <br>

            <p>Online Banking has grown over the last decade. It has become an easier alternative to visiting your bank
                or building society. It enables you to keep up to date with your finances 24 hours a day, and to see if
                there has been any fraudulent activity on your accounts. <br><br> To access your accounts, all you'll
                need is either
                a smartphone, tablet or computer and access to the internet. <br><br>

                Online Banking gives users a quick and, usually, free alternative and allows users to carry out several
                tasks for instance paying bills or transferring money. Users can do this without the need to visit or
                get in contact with your bank.</p>

            <!--The user is presented with a link to an external website for more information, if they are currently logged in-->
            <?php
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            
            ?>

            <p>For more information about how online banking works, as well as how they keep your accounts and
                information safe, please have a look at the Money & Pensions Service website. Link below:</p>
            <a href="https://www.moneyadviceservice.org.uk/en/articles/beginners-guide-to-online-banking">Learn More
                about Online Banking</a>
            <?php
        }
        ?>

            <h2><b>
                    <center>Online Shopping</center>
                </b></h2>

            <center><img src="shopping-stock.jpg" width="500px" height="250px" alt="The Internet"></center>

            <br>

            <p>Shopping is an important aspect of our lives. It allows us to restock our homes with food, clothing and
                technology to name but a few.<br><br>

                These are all great things but
                there is one problem that can make shopping an inconvienience. Not all shops can be open 24/7. <br><br>
                Most
                shops are open from 9:00am to 5:30pm which restricts consumers to only being able to shop between those
                times. This can be a real inconvenience to those who are at work between those hours and are unable to
                buy
                what they need. <br><br> Thankfully, this is where online shopping comes into play. The main advantage
                of online shopping is that they are online 24/7. This means consumers have no restrictions as to when
                they are able to buy their products. <br><br>

                They also allow for deliveries which means you do not need to
                collect your purchase, as they will deliver the product straight to your door. <br><br>

                Some companies like Amazon will even offer deals to consumers that will reduce the pricing of products for
                a certain period of time. <br><br>

                Amazon also offers their Prime service which allows you to access their
                streaming service, offering hundreds of hours of entertainment.</p>


            <!--The back button is placed on the bottom left whereas the next button is placed on the bottom right. This was done to help aid navigation-->
            <left><button><a href="What is the Internet.php" class="button">Previous Page: What is the
                        Internet</a></button></left>
            <div id="rAlign">
                <right><button><a href="InternetRisks.php" class="button">Next Page: Risks of the Internet</a></button>
                </right>
            </div>
            <!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
            <!--copyright-->
            <footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>

            </main>
    </body>

</html>