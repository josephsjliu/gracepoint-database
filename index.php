<html>

<center>
<title> Gracepoint </title>
<h2> Welcome </h2>

<form action = "search.php" method = "post">
  <table>
    <tr>
      <td> Item </td>
      <td> <input type = "text" name = "Item"></input> </td>
    </tr>
    <tr>
      <td> Item Type </td>
      <td> <input type = "text" name = "Item Type"></input> </td>
    </tr>
    <tr>
      <td> Container </td>
      <td> <input type = "text" name = "Container"></input> </td>
    </tr>
    <tr>
      <td> Location </td>
      <td> <input type = "text" name = "Location"></input> </td>
    </tr>
  </table>
  <input type = "submit" name="Search" value = "Search"></input>
</form>

<form action = "insert.php" method = "post">
<input type = "submit" value = "Add" name = "Add"></input>
</form>
</center>

</html>
