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
 
if(isset($_POST['update']))
{    
    $id = $_POST['course_id'];
    
    $name=$_POST['name'];
    $date=$_POST['date'];
    
    
    // checking empty fields
    if(empty($name) || empty($age) || empty($email)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($date)) {
            echo "<font color='red'>Date field is empty.</font><br/>";
        }
               
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE courses SET 'name'='$name','date'='$date' WHERE 'Course_ID'=$id;");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['course_id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM course WHERE 'Course_ID'=$id;");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $date = $res['date'];

}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="text" name="date" value="<?php echo $date;?>"></td>
            </tr>
            
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>