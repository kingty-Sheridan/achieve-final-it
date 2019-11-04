<?php
  define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Ach1eve$$');
define('DB_NAME', 'kingty_login');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("Database connection failed: " . $link ->connect_error);
}
$id=$_REQUEST['course_id'];

 


$query = "DELETE FROM courses WHERE Course_ID =$id;"; 
$result = mysqli_query($link ,$query) or die ( mysqli_error($link));
header("Location: welcomeadmin.php"); 
?>