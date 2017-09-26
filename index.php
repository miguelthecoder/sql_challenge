<!DOCTYPE html>
   <head>
      <link rel="stylesheet" href="styles.css" type="text/css">
      <meta charset="utf-8">
      <title></title>
   </head>
<?php
// connect to the DB
try{
$conn = new mysqli('localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP', 'MRosas_SQLchallenge_one');
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
} catch (Exception $e){
   echo $e->getMessage();
   exit;
}
?>
