<?php

//Requires access to the Database
require('mySqlConnect.php');
    session_start();


if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}else{
    //Collects all users that has been registered
    $selectQuery = "SELECT * FROM `users` ORDER BY `userID` ASC";
    $result = mysqli_query($dbConnect,$selectQuery);
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registered Users</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--These references allow for bootstrap and JQuery to be used on this page. These are used for the navbar and icons. It also references the stylesheet css file.-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
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

    <?php
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    ?>
    <!--Creates a table that will display all registered users-->
    <h1>Registered Users and Contact Details</h1>
    <table border="1px" style="width:600px; line-height:40px;">
        <thead>
            <tr>
                <!--Table is made up of 2 columns. 1 for the name and 1 for the contact info-->
                <th>Name</th>
                <th>Contact Information</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Iterates through all rows in the database to display each user in the table
                while($row = mysqli_fetch_assoc($result)){?>
            <tr>
                <td>
                    <?php echo $row['fname'].' '.$row['surname']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
            <tr>
                <?php }
            ?>
        </tbody>
    </table>

    <br>
    <?php
    
    } else{
    
    echo "Administration Access Only!";
    
?>
    <button onclick="history.go(-1);">Back </button>
</body>
<?php
}
?>

</html>