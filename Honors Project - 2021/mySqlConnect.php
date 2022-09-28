<?php
    //mysql_connect.php
    //contains database login info
    
    define('HOSTNAME','localhost');
    define('USERNAME', 'id8644076_honoursproject');
    define('PWRD', 'McMillan-Hons2021');
    define('DBNAME','id8644076_questionnaireresults');

    //database connection

    $dbConnect = @mysqli_connect(HOSTNAME, USERNAME, PWRD, DBNAME) OR die('Could not connect to db '.mysqli_connect_error());
?>