<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="get" action="">
      <select name="colors">
         <option value="Beige">Beige</option>
         <option value="Black">Black</option>
         <option value="Denim">Denim</option>
         <option value="Gray">Gray</option>
         <option value="Khaki">Khaki</option>
         <option value="White">White</option>
      </select>
      <input type="submit" value="submit">
    </form>
  </body>
</html>
<?php
if(!empty($_GET)) {
  try{
// connect to the DB
$conn = new mysqli('localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP', 'MRosas_SQLchallenge_one');
$colors = 'SELECT name, description, price, color FROM challenge_two WHERE color = "red" ';
// prepare preps a statement and returns an object.
$prepared = $conn->prepare($colors);
/// :colors is just a place holder.
// $prepared->bindParam(':colors', $GET['colors']);

$prepared->execute();

foreach($prepared->fetchAll() as $colors) {
  echo "<p>{$colors['name']}, {$colors['color']}</p>";
}

}catch (Exception $e) {
  echo $e->getMessage();
  exit;
}
}
