<!DOCTYPE html>
<html>
<head>
<title>
</title>
</head>
<body>
<h1>Challenge 3</h1>
<form method="POST" action="index.php">
    <label for="name">Name</label><input id="name" name="name" type="text" />
    <label for="description">Description</label><input type="text" id="description" name="description" />
    <label for="price">Price</label><input id="price" name="price" type="price" />
    <label for="color">Color</label><input type="text" id="color" name="color" />
    <input type="submit" value="Submit">
</form>
<?php
if(!empty($_POST)){
    $conn = new mysqli('localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP', 'MRosas_SQLchallenge_one');
    try {
        //this queries what we actually need
      $query = "INSERT INTO MRosas_SQLchallenge_one.challenge_two (name, description, price, color) VALUES (:name, :description, :price, :color)";
      // this gets your statement ready
       $prepared = $conn->prepare($query);
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
