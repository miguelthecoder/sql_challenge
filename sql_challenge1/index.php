<!DOCTYPE html>
   <head>
      <link rel="stylesheet" href="styles.css" type="text/css">
      <meta charset="utf-8">
      <title></title>
   </head>
<?php
// connect to the DB
$conn = new mysqli('localhost', 'root', 'root', 'MRosas')
or die ('Cannot connect to db');
   $result = $conn->query("SELECT state_name FROM challenge_one");
    echo "<html>";
    echo "<body>";
    echo '<div class="input">';
    echo "<label>Pick Your State: </label><br>";
    echo "<select class='select' name='id'>";

   while ($row = $result->fetch_assoc()) {
        unset($id, $nameofstate);
        $id = $row['state_name'];
        $nameofstate = $row['state_name'];
        echo '<option value=" '.$id.' ">'.$nameofstate.'</option>';
   }
    echo "</select>";
    echo '</div>';
    echo "</body>";
    echo "</html>";
?>
