<?php 
session_start();
?>

<html lang="en">

<head>
	<title>Leave Feedback</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
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

					<li class="nav-item active"><a href="Questionnaire.php">Leave Feedback</a></li>
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
			//Inverts the color scheme on the webpage if the checkbox is toggled on. page-wrap is the div tag for the page content

			function invertcolors() {
				var checkBox = document.getElementById("invert");

				if (checkBox.checked == true) {
					document.getElementById('page-wrap').style.backgroundColor = '#252525'
					document.getElementById('page-wrap').style.color = '#ebebeb'

				} else {
					document.getElementById('page-wrap').style.color = '#252525'
					document.getElementById('page-wrap').style.backgroundColor = '#ffffff'
				}

			}

			function textSize() {
				//Enlarge the text in the page-wrap div tag if the checkbox is toggled on

				var checkBox = document.getElementById("enlarge");

				if (checkBox.checked == true) {
					document.getElementById('page-wrap').style.fontSize = '25px'

				} else {
					document.getElementById('page-wrap').style.fontSize = '16px'
				}
			}
		</script>


		<?php
            if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            ?>

		<!--Main content on the page-->
		<div id="page-wrap">
			<h1>End Survey</h1>

			<h2>Questions on Website's content</h2>
			<!--The questionnaire is created using radio buttons-->
			<form action="saveresult.php" method="POST" id="questionnaire">
				<ol>
					<li>
						<h3>Q1. Was the information provided easy to follow? </h3>

						<div>
							<input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
							<label for="question-1-answers-A">Yes </label>
						</div>

						<div>
							<input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
							<label for="question-1-answers-B">No</label>
						</div>
					</li>

					<li>
						<h3>Q2. Do you feel you have learned more about Cybersecurity?</h3>

						<div>
							<input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
							<label for="question-2-answers-A">Yes</label>
						</div>

						<div>
							<input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
							<label for="question-2-answers-B">No</label>
						</div>

					</li>

					<li>

						<h3>Q3. How much did you know about Cybersecurity before using this website?</h3>

						<div>
							<input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
							<label for="question-3-answers-A">Very Knowledge</label>
						</div>

						<div>
							<input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
							<label for="question-3-answers-B">Knowledgeable </label>
						</div>

						<div>
							<input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
							<label for="question-3-answers-C">Little Knowledge</label>
						</div>

						<div>
							<input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
							<label for="question-3-answers-D">No Knowledge</label>
						</div>

					</li>

					<li>

						<h3>Q4. How Likely are you to recommend the website to a friend?</h3>

						<div>
							<input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
							<label for="question-4-answers-A">Very Likely</label>
						</div>

						<div>
							<input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
							<label for="question-4-answers-B">Likely</label>
						</div>

						<div>
							<input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
							<label for="question-4-answers-C">Unlikely</label>
						</div>

						<div>
							<input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
							<label for="question-4-answers-D">Very Unlikely</label>
						</div>

						<div>
							<input type="radio" name="question-4-answers" id="question-4-answers-E" value="E" />
							<label for="question-4-answers-E">Unsure</label>
						</div>

					</li>

				</ol>


				<h2>Website Survey</h2>

				<ol>
					<li>
						<h3>Q1. How easy was the website to use? </h3>

						<div>
							<input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
							<label for="question-5-answers-A">Very Easy</label>
						</div>

						<div>
							<input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
							<label for="question-5-answers-B">Easy</label>
						</div>

						<div>
							<input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
							<label for="question-5-answers-C">Neither Easy or Hard</label>
						</div>

						<div>
							<input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
							<label for="question-5-answers-D">Hard</label>
						</div>

						<div>
							<input type="radio" name="question-5-answers" id="question-5-answers-E" value="E" />
							<label for="question-5-answers-E">Very Hard</label>
						</div>
					</li>

					<li>
						<h3>Q2. Did you have any difficulties with the website?</h3>

						<div>
							<input type="radio" name="question-6-answers" id="question-6-answers-A" value="A" />
							<label for="question-6-answers-A">Yes</label>
						</div>

						<div>
							<input type="radio" name="question-6-answers" id="question-6-answers-B" value="B" />
							<label for="question-6-answers-B">No</label>
						</div>
					</li>

					<li>
						<h3>Q2.1 What did you find difficult? (Leave Blank if previous answer was no)</h3>
						<!--https://stackoverflow.com/questions/6364015/textarea-onclick-remove-text-->
						<textarea id="textbox" name="textbox" onfocus="if(this.value==this.defaultValue)this.value='';"
							onblur="if(this.value=='')this.value=this.defaultValue;" rows="10"
							cols="50">(Please Provide as much detail as possible)</textarea>
					</li>

				</ol>

				<input type="submit" value="Submit" name="submit" class="submitbtn" />

			</form>

		</div>



		<!--https://www.html.am/html-codes/character-codes/html-copyright-code.cfm -->
		<!--Copyright-->
		<footer><b>&copy;Copyright 2021 Ryan McMillan Abertay</b></footer>

		</main>
	</body>
	<?php
    
    //If the user hasn't logged in, they will be told they need to login before accessing the questionnaire
} else {
     echo "Leaving Feedback is exclusive to Registered users only. Please Login if you would like to leave feedback";
}

?>

</html>