<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--The following Styling Script is used to design the login form-->
    <style type="text/css">
        .login-form {
            width: 340px;
            margin: 50px auto;
        }

        .login-form form {
            margin-bottom: 15px;
            background: grey;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>


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
                        <li><a href="Cybersecurity-Introduction.php">Introduction to Cybersecurity</a></li>
                        <li><a href="Cybersecurity-Methods.php">Ways to Stay Safe Online</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            </ul>


        </div>
    </nav>


        <!--The login form is where the user will be given an opportunity to login to their account. Once the user clicks submit, their input will be taken to loginprocess to verify if they can login or not-->
    <div class="login-form">
        <form action="loginprocess.php" method="post">
            <h2 class="text-center">Please Login</h2>
            <div class="form-group">
                
                <!--User must enter an email. A warning will occur if @ is missing from the textfield-->
                <input type="email" class="form-control" name="email" placeholder="Your Email" required="required">
            </div>
            <div class="form-group">
                <!--User must enter their password. This field is mandatory to submit login details-->
                <input type="password" class="form-control" name="password" placeholder="Your Password"
                    required="required">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            </div>
    </div>
    <!--Copyright-->
    <footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>

    </main>
</body>

</html>