<?php

$valid_passwords = array ("admin" => "Ach1eve");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="Achieve Admin Portal"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}

// Initialize the session
require_once "config.php";
session_start();
 

?>
 
<!DOCTYPE html>
<html lang="en">
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
    
    ?>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style>
	/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
	</style>

    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi ADMIN</h1>
    </div>
    <p>
      
        <a href="home.html" class="btn btn-danger">Sign Out</a>
    </p>
<table border="1" align="center">
<tr>
  <td>Course Name</td>
  <td>Start Date And End Date</td>
 
  <td></td>
  <td></td>
</tr>
<?php

$query = mysqli_query($link,"SELECT * FROM `courses`")
   or die (mysqli_error($link));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['Name']}</td>
    <td>{$row['Date']}</td>
   
 <td><a href=\"update.php?course_id={$row['Course_ID']}\">Edit</a></td>
 <td><a href=\"delete.php?course_id={$row['Course_ID']}\">Delete</a></td>
    </tr>";

}

?>
<tr>
    <td></td>
    <td></td>
   
     <td></td>
    <td><a href="insert.php">Add</a><br/><br/></td>
    </tr>
</table>

</body>
</html>