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
  $conn = new PDO('mysql:dbname=MRosas_SQLchallenge_one;host=localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $colors = 'SELECT name, description, price, color FROM challenge_two WHERE color = :colors ';
  // prepare preps a statement and returns an object.
  $prepared = $conn->prepare($colors);
  /// :colors is just a place holder.
  $prepared->bindParam(':colors', $_GET['colors']);

  $prepared->execute();

  foreach($prepared->fetch_assoc() as $colors) {
    echo "<p>{$colors['name']}, {$colors['color']}</p>";
  }

}catch (Exception $e) {
  echo $e->getMessage();
  exit;
}
}
