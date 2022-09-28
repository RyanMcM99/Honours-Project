<?php

	if (isset($_POST["submit"]))
{
	
	session_start();
	//Requires Access to the database
	require('mySqlConnect.php');
	
	//Gets the email and password from the form
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	if(empty ($email))
	{
		echo"Please enter your Email"; //This will be displayed if the user doesn't enter their ID
		
	}
	
	if(empty ($password))
	{
		echo"Please enter your password"; //This will be displayed if the user doesn't enter their password
	}
	
	
	//This is the Admin Password. If the login details matches this, the user will gain access to the administration pages
	if($email == "Email@email.com" && $password == "Password12345")
	{
	    echo "Login Successful";
	    
	    if(!session_id())
	        session_start();
	        //Creates a session for the Admin
	   $_SESSION['admin'] = true;
		$_SESSION['email'] = $email;
		//Redirects the Admin to the Administration Page
		echo "<script> location.href='Admin.php'; </script>";
        exit;
	} else
	{
	    //This query checks to see if there is a match for the login details
	$query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($dbConnect,$email) ."' AND password = '". mysqli_real_escape_string($dbConnect,$password)."'";
	
	//If a match is found, the login is successful
	$result = mysqli_query($dbConnect,$query);
	if (mysqli_num_rows($result) == 1)
	{
		echo "Login Successful";
	
		
		if(!session_id())
		    session_start();
		//Creates a session for the user
		$_SESSION['logged'] = true;
		$_SESSION['user'] = $email;
		//Redirects the user back to the home page
		echo "<script> location.href = 'HomePage.php'; </script>";
        exit;
	}
			//If the attempt is unsuccessful, the user is redirected to the login page to try again
	else
	{
		echo "Login Unsuccessful";
		echo "<script> location.href = 'Login.php'; </script>";
        exit;
	}
	}
}
else
//Warning that the user has left the form empty. This shouldn't occur but is here in case the user gets through with an empty form.
{
	echo "Empty input Submit";
}

session_write_close();