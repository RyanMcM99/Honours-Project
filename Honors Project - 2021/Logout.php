<?php
//Logout will destroy all sessions.
session_start();
unset($_SESSION["logged"]);
unset($_SESSION["user"]);
unset($_SESSION["admin"]);
 echo("<script>alert('Logout Successful')</script>");
 echo("<script>window.location = 'HomePage.php';</script>");
?>