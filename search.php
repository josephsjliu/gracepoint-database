<?
$item = $_POST['Item'];
$item_type = $_POST['Item Type'];
$container = $_POST['Container'];
$location = $_POST['Location'];
$host = "localhost";
$user = "root";
$pass = "";
echo "<center>";

// If search fields are empty then redirect back to same page. (Figure out how to print statment to enter)
if ($item == "" && $item_type == "" && $container == "" && $location == "" ) {
  header("Location: index.php");
}

$query = "SELECT t_items.Name, t_item_type.Name, t_items.Length, t_containers.Name, t_location.Name FROM t_items JOIN t_location ON t_items.Location_ID = t_location.ID JOIN t_containers ON t_items.Container_ID = t_containers.ID JOIN t_item_type ON t_items.Item_Type_ID = t_item_type.ID WHERE t_items.Name = '{$_POST['Item']}'";
$dblink = mysql_connect($host, $user, $pass);
if(!$dblink) {
   die('Could not connect: '. mysql_error());
}
echo '<h1>Connected to Gracepoint Database</h1>';
$db = mysql_select_db("Gracepoint", $dblink);
if (!$db) {
  die("Gracepoint database not selected: ". mysql_error());
}
$result = mysql_query($query, $dblink);
if($result === FALSE) {
  echo "result = false";
    die(mysql_error());
}

echo "<table>
  <tr>
    <td>Name</td>
    <td>Item Type</td>
    <td>Length</td>
    <td>Container</td>
    <td>Location</td>
  </tr>";

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
  echo "<tr>
      <td>" . $row[0] . "</td>
      <td>" . $row[1] . "</td>
      <td>" . $row[2] . "</td>
      <td>" . $row[3] . "</td>
      <td>" . $row[4] . "</td>
    </tr>";
}

echo "</table>";

echo "</center>";
?>
