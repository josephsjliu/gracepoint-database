<?
$name = $_POST['Name'];
$des = $_POST['Description'];
$loc = $_POST['Location'];
// locid is obtained using location.
$host = "localhost";
$user = "root";
$pass = "";
echo "<center>";

if($name == "" || $des == "" || $loc == "") {
  header("Location: addingcontainer.php");
}

$locquery = "SELECT t_location.ID FROM t_location WHERE t_location.Name LIKE '{$_POST['Location']}'";
$dblink = mysql_connect($host, $user, $pass);
if(!$dblink) {
   die('Could not connect: '. mysql_error());
}
echo '<h1>Connected to Gracepoint Database</h1>';
$db = mysql_select_db("Gracepoint", $dblink);
if (!$db) {
  die("Gracepoint database not selected: ". mysql_error());
}

// Get id for location.
// location
$temp = mysql_query($locquery, $dblink);
if($temp === FALSE) {
  echo "result = false";
    die(mysql_error());
}
$locresult = mysql_fetch_array($temp, MYSQL_NUM);
$locid = $locresult[0];

// Now insert data.
$insert = "INSERT INTO Gracepoint.t_containers (Name, Description, Location_ID) VALUES ('{$_POST['Name']}', '{$_POST['Description']}', $locid)";
$result = mysql_query($insert, $dblink);
if($result) {
  echo "Add successful";
}
else {
  die("Could not add: ". mysql_error());
}
echo '<form action = "index.php" method = "post">';
echo '<input type = "submit" value = "Home" name = "Home">';
echo '</form>';
echo "</center>";
?>
