<?
$name = $_POST['Name'];
// typeid is obtained using description.
$des = $_POST['Description'];
$quantity = $_POST['Quantity'];
$serial = $_POST['Serial_Number'];
$price = $_POST['Price'];
$len = $_POST['Length'];
$con = $_POST['Container'];
// conid is obtained using container.
$loc = $_POST['Location'];
// locid is obtained using location.
$host = "localhost";
$user = "root";
$pass = "";
echo "<center>";

// If any blank is left empty redirect to same page.
if($name == "" || $des == "" || $quantity == "" || $serial == "" || $price == "" || $len == "" || $con == "" || $loc == "") {
  header("Location: addingitem.php");
}

$typequery = "SELECT t_item_type.ID FROM t_item_type WHERE t_item_type.Name LIKE '{$_POST['Description']}'";
$conquery = "SELECT t_containers.ID FROM t_containers WHERE t_containers.Description LIKE '{$_POST['Container']}'";
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

// Get ids for type, container and location.
// id
$temp = mysql_query($typequery, $dblink);
if($temp === FALSE) {
  echo "result = false";
    die(mysql_error());
}
$typeresult = mysql_fetch_array($temp, MYSQL_NUM);
$typeid = $typeresult[0];
// container
$temp1 = mysql_query($conquery, $dblink);
if($temp1 === FALSE) {
  echo "result = false";
    die(mysql_error());
}
$conresult = mysql_fetch_array($temp1, MYSQL_NUM);
$conid = $conresult[0];
// location
$temp2 = mysql_query($locquery, $dblink);
if($temp2 === FALSE) {
  echo "result = false";
    die(mysql_error());
}
$locresult = mysql_fetch_array($temp2, MYSQL_NUM);
$locid = $locresult[0];

// Now insert data.
$insert = "INSERT INTO Gracepoint.t_items (Name, Item_Type_ID, Description, Quantity, Serial_Number, Price, Length, Container_ID, Location_ID) VALUES ('{$_POST['Name']}', $typeid, '{$_POST['Description']}', '{$_POST['Quantity']}', '{$_POST['Serial_Number']}', '{$_POST['Price']}', '{$_POST['Length']}', $conid, $locid)";
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
