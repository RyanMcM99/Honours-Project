<?php
session_start();
?>

<html lang="en">

<head>
    <title>Acknowledgments</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <style>
        #page {

            padding-left: 20px;
            padding-right: 20px;
        }
    </style>

</head>

<body>

   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--These references allow for bootstrap and JQuery to be used on this page. These are used for the navbar and icons. It also references the stylesheet css file.-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        //Inverts the color scheme on the webpage if the checkbox is toggled on. textchange is the div tag for the page content
        function invertcolors() {
            var checkBox = document.getElementById("invert");

            if (checkBox.checked == true) {
                document.getElementById('page').style.backgroundColor = '#252525'
                document.getElementById('page').style.color = '#ebebeb'

            } else {
                document.getElementById('page').style.color = '#252525'
                document.getElementById('page').style.backgroundColor = '#ffffff'
            }

        }

        function textSize() {
            //Enlarge the text in the text change div tag if the checkbox is toggled on
            var checkBox = document.getElementById("enlarge");

            if (checkBox.checked == true) {
                document.getElementById('page').style.fontSize = '25px'

            } else {
                document.getElementById('page').style.fontSize = '14px'
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
                        <li><a href="quiz.php">Knowledge Check</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cybersecurity and
                        Staying Safe Online<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="Cybersecurity-Introduction.php">Introduction to Cybersecurity</a>
                        </li>
                        <li><a href="Cybersecurity-Methods.php">Ways to Stay Safe Online</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a href="references.php">Acknoledgements</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>



        </div>
    </nav>
    <h1>
        <center>References</center>
    </h1>

    <div id="page">

        <p>The table below credits all external websites that contributed to the information on this website.</p>

        <table>
            <table border="1px" style="width:600px; line-height:40px;">
                <tr>
                    <th>
                        <center>Page</center>
                    </th>
                    <th>
                        <center>Source</center>
                    </th>
                </tr>
                <tr>
                    <td>Benefits of the Internet</td>
                    <td>http://workawesome.com/communication/10-life-changing-benefits-of-the-internet-age</td>
                </tr>
                <tr>
                    <td>Risks of the Internet</td>
                    <td>https://blog.netwrix.com/2018/05/15/top-10-most-common-types-of-cyber-attacks/#Malware%20attack
                    </td>
                </tr>
                <tr>
                    <td>Examples of Malware</td>
                    <td>https://www.kratikal.com/blog/5-most-notorious-malware-attacks-of-all-time</td>
                </tr>
                <tr>
                    <td>Methods to Stay Safe Online</td>
                    <td>https://www.techrepublic.com/article/top-5-ways-to-stay-safe-online/#:~:text=%20Here%20are%20five%20ways%20to%20stay%20safe,people%20can%20sniff%20out%20your%20traffic.%20More%20
                    </td>
                </tr>
                <tr>
                    <td>Methods to Stay Safe Online</td>
                    <td>https://top10bestantivirusprotection.com </td>
                </tr>

                <tr>
                    <td>Risk Examples</td>
                    <td>https://www.techrepublic.com/article/covidlock-ransomware-exploits-coronavirus-with-malicious-android-app/
                    </td>
                </tr>
            </table>
    </div>
</body>

</html>