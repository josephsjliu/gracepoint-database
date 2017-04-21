<?
$name = $_POST['Name'];
$des = $_POST['Description'];
// locid is obtained using location.
$host = "localhost";
$user = "root";
$pass = "";
echo "<center>";

if($name == "") {
  header("Location: addingtype.php");
}

$dblink = mysql_connect($host, $user, $pass);
if(!$dblink) {
   die('Could not connect: '. mysql_error());
}
echo '<h1>Connected to Gracepoint Database</h1>';
$db = mysql_select_db("Gracepoint", $dblink);
if (!$db) {
  die("Gracepoint database not selected: ". mysql_error());
}

// Now insert data.
$insert = "INSERT INTO Gracepoint.t_item_type (Name, Description) VALUES ('{$_POST['Name']}', '{$_POST['Description']}')";
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
