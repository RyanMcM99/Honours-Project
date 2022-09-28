<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
            color: white;
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

        #instructions {
            font-size: 15px;
            color: white;
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
                        <li><a href="Cybersecurity-Introduction.php">Introduction to Cybersecurity</a></li>
                        <li><a href="Cybersecurity-Methods.php">Ways to Stay Safe Online</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="Login.php"><span class="glyphicon glyphicon-user"></span>Login</a></li>
            </ul>
        </div>
    </nav>


    <div class="login-form">
        <form action="registerprocess.php" method="post">
            <h2 class="text-center">Please Create an Account</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="fname" placeholder="Enter Your First Name"
                    required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="surname" placeholder="Enter Your Surname"
                    required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Your Password"
                    required="required">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
            </div>

            <div id="instructions" <ul="filled">
                <li>Ensure your email is accurate i.e. must contain @</li>
                <li>Password must contain :
                    <ul>
                        <li>1 Uppercase Character (A-Z)</li>
                    </ul>
                    <ul>
                        <li>1 Lowercase Character (a-z)</li>
                    </ul>

                    <ul>
                        <li>1 Number (0-9)</li>
                    </ul>
                    <ul>
                        <li> 1 Special Character (!"£$%)</li>
                    </ul>
                    <ul>
                        <li>Password must be at least 14 charcters long</li>
                    </ul>
                </li>
                </ul>
            </div>
    </div>
    <footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>

    </main>
</body>

</html>