<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css" type="text/css">
<title>
</title>
</head>
<body>
<p>Add Items to the list..</p>
<form method="POST" action="success.php">
    <label for="name">Name</label><input id="name" name="name" type="text" />
    <label for="description">Description</label><input type="text" id="description" name="description" />
    <label for="price">Price</label><input id="price" name="price" type="price" />
    <label for="color">Color</label><input type="text" id="color" name="color" />
    <input type="submit" value="Submit">
</form>
<?php
if(!empty($_POST)){
    $db = new PDO("mysql:host=localhost;dbname=MRosas_SQLchallenge_one;port=8888","r2hstudent", "SbFaGzNgGIE8kfP");
    try {
        //query where are you inserting into...
      $query = "INSERT INTO MRosas_SQLchallenge_one.challenge_two (name, description, price, color) VALUES (:name, :description, :price, :color)";
      // prepare the statment
       $prepared = $db->prepare($query);

       //from mark's example
        $prepared->execute(array(
           ':name' => $_POST["name"],
           ':description' => $_POST["description"],
           ':price' => $_POST["price"],
           ':color' => $_POST["color"],
       ));
    } catch (Exception $e) {
        echo "Bad query";
        exit;
    }
    }
?>
</body>
</html>
