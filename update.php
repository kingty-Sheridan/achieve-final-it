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
$query = "SELECT * FROM courses where Course_ID = $id"; 
$result = mysqli_query($link, $query) or die ( mysqli_error($link));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h1>Update Record</h1>
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
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['course_id'];

$name = $_REQUEST['name'];
$date = $_REQUEST['date'];

$update= "UPDATE courses SET Name='$name',Date='$date' WHERE Course_ID=$id;";

mysqli_query($link, $update) or die(mysqli_error($link));

$status = "Record Updated Successfully. ";

echo $status;
echo "<a href='welcomeadmin.php'>View Records</a>";

}else {
?>
<div>
<a href="welcomeadmin.php">View Records</a> 
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['Course_id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" 
required value="<?php echo $row['name'];?>" /></p>
<p><input type="date" name="date" placeholder="Enter Date" 
required value="<?php echo $row['date'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>