<?php
    require('mySqlConnect.php');
    //Creates a session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Page</title>
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
    </style>

</head>

<body>

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
                        <li class="active"><a href="Cybersecurity-Introduction.php">Introduction to Cybersecurity</a>
                        </li>
                        <li><a href="Cybersecurity-Methods.php">Ways to Stay Safe Online</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a href="references.php">Acknowledgements</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="Logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>



        </div>
    </nav>

    <?php
        //Only admins can access this page. If an admin session has been created, they will be allowed access to this page. else they will be restricted from using this page.
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    ?>
    <div id="textchange">
        <!--Allows Admin to view all registered users-->
        <input type="button" value="Display All Users" class="displayAll" id="btnHome"
            onClick="document.location.href='displayUsers.php'" />
        <!--Allows Admin to view all feedback recorded-->
        <input type="button" value="Review Feedback" class="displayAll" id="displayFeedback"
            onClick="document.location.href='reviewfeedback.php'" />
        <!--Allows Admin to see how many users have visited the website-->
        <input type="button" value="How many visitors have accessed the site" class="displayVisitors" id="btnVisitors"
            onClick="document.location.href='displayVisitors.php'" />
</body>
<?php

} else{
    echo "Administration Access only!";
}
?>
<br>
<button onclick="history.go(-1);">Back </button>
</div>

</html>