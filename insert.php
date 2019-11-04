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
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    
    $name =$_REQUEST['name'];
    $date = $_REQUEST['date'];
    $ins_query= "INSERT INTO `courses`(`Course_ID`, `Name`, `Date`, `Description`, `Price`) VALUES (null, '$name','$date',null,null);";

    mysqli_query($link,$ins_query)
    or die(mysqli_error($link));
    $status = "New Record Inserted Successfully. Please contact system admin to add content.";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Event</title>

</head>
<body>
<div class="form">
<a href="welcomeadmin.php">View Records</a> 
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input type="date" name="date" placeholder="Enter Date" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>