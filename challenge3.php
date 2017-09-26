<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css" type="text/css">
<title>
</title>
</head>
<body>
<h1>Add Items to the list..</h1>
<form method="POST" action="success.php">
    <label for="name">Name</label>
    <input id="name" name="name_" type="text" />
    <label for="description">Description</label>
    <input type="text" id="description" name="description_" />
    <label for="price">Price</label>
    <input id="price" name="price_" type="text" />
    <label for="color">Color</label>
    <input type="text" id="color" name="color_" />
    <input type="submit" value="Submit">
</form>
<?php
if(!empty($_POST)){
    try {
      $db = new PDO('mysql:dbname=MRosas_SQLchallenge_one;host=localhost','r2hstudent', 'SbFaGzNgGIE8kfP');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //query where are you inserting into...
      $query = 'INSERT INTO challenge_two(name, description, price, color) VALUES (:name, :description, :price, :color)';
      // prepare the statment
       $prepared = $db->prepare($query);

       $prepared->bindParam(':name', $_POST['name_']);
       $prepared->bindParam(':description', $_POST['description_']);
       $prepared->bindParam(':price', $_POST['price_']);
       $prepared->bindParam(':color', $_POST['color_']);

       $prepare->execute();

    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
    }
?>
