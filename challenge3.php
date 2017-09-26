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
    <label for="name">Name</label><input id="name" name="name" type="text" />
    <label for="description">Description</label><input type="text" id="description" name="description" />
    <label for="price">Price</label><input id="price" name="price" type="text" />
    <label for="color">Color</label><input type="text" id="color" name="color" />
    <input type="submit" value="Submit">
</form>
<?php
if(!empty($_POST)){
    $db = new PDO("mysql:dbname=MRosas_SQLchallenge_one;host=localhost","r2hstudent", "SbFaGzNgGIE8kfP");
    try {
        //query where are you inserting into...
      $query = "INSERT INTO challenge_two (name, description, price, color) VALUES (:name, :description, :price, :color)";
      // prepare the statment
       $prepared = $db->prepare($query);

       $prepared->bindParam(':name', $_POST['name']);
       $prepared->bindParam(':description', $_POST['description']);
       $prepared->bindParam(':price', $_POST['price']);
       $prepared->bindParam(':color', $_POST['color']);

       $prepare->execute();

    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
    }
?>
</body>
</html>
