<?php
define('DB_SERVER1','localhost');
define('DB_USER1','root');
define('DB_PASS1' ,'');
define('DB_NAME1', 'shopping');
$con = mysqli_connect(DB_SERVER1,DB_USER1,DB_PASS1,DB_NAME1);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>