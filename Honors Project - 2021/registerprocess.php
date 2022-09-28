<?php
require('mySqlConnect.php');

if(isset($_POST['submit'])) {

$fname = $_POST['fname'];	
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

$fname2 = strip_tags($fname);
$surname2 = strip_tags($surname);
$email2 = strip_tags($email);
$password2 = strip_tags($password);

$sqlDuplicate = "SELECT * FROM users WHERE (email = '$email2' && password = '$password2')";

function valid_email($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
$result = mysqli_query($dbConnect, $sqlDuplicate);

if(!valid_email($email2)){
    header("Refresh:5; Register.php");
    ?>
<html>
<p>Email isn't suitable. Please enter a suitable domain</p>

</html>
<?php
} else if(strlen($password2) <= 13) {
     header("Refresh:5; Register.php");
    ?>
<html>
<p>Password Not Strong Enough. Needs at least 14 characters</p>

</html>

<?php
} else if (!preg_match('/[A-Z]/', $password2) || !preg_match('/([0-9]+)/', $password2) || !preg_match('/[\'!^£$%&*()}{@#~?,|=_+¬-]/', $password2) || !preg_match('/[a-z]/', $password2))
{
  header("Refresh:5; Register.php");
  echo "Password not strong enough";
    
}else if (mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO users (fname,surname, email, password) VALUES ('$fname2', '$surname2', '$email2', '$password2')";

if(!mysqli_query($dbConnect,$sql))
{
	echo 'Cant be Inserted';
} else
{  
    
    session_start();
		//Creates a session for the user
		$_SESSION['logged'] = true;
		$_SESSION['user'] = $email;
    header("Refresh:5; HomePage.php");
	echo 'Registration Complete. Welcome, '. $fname2;
	
}
    
} else {
    header("Refresh:5; Register.php");
    echo "This email already exists.";
}
}