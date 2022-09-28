<?php
header( "refresh:5;url=displayVisitors.php" );
   session_start();

?>

<title>Website Visitors</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
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

  <center>
    <h1>Total Website Visits</h1>
  </center>


  <?php
$counter_name = "counter.txt";

// Check if a text file exists.
// If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}

// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);



echo "The website has been visited a total of ".$counterVal. " times";
?>

  <html>
  <br>

  <?php
} else{
    echo "Administration Access Only!"
    
?>
  <button onclick="history.go(-1);">Back </button>
  <?php
}
?>

  </html>