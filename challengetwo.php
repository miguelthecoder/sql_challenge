<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" action="">
      <select name="colors">
         <option value="Beige">Beige</option>
         <option value="Black">Black</option>
         <option value="Denim">Denim</option>
         <option value="Gray">Gray</option>
         <option value="Khaki">Khaki</option>
         <option value="White">White</option>
      </select>
      <button type="submit" value="submit">Submit</button>
    </form>
  </body>
</html>
<?php
if(!empty($_GET)) {
  try{
// connect to the DB
$conn = new PDO('mysql:host=localhost;dbname=MRosas_SQLchallenge_one', 'r2hstudent', 'SbFaGzNgGIE8kfP');
$color = 'SELECT name, description, price, color FROM challenge_two WHERE color= :colors ';
// prepare preps a statement and returns an object.
$prepared = $db->prepare($colors);
/// :colors is just a place holder.
$prepared->bidParam(':colors', $GET['colors']);

$prepared->execute();

foreach($prepared->fetchAll() as $color) {
  echo "<p>{$color['name']}, {$color['color']}</p>";
}

}catch (Exception $e) {
  echo $e->getMessage();
  exit;
}
}
