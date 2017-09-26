<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" action="">
      <input type="text" name="userNumber" value="">
      <button type="submit" >Submit</button>
    </form>
    <button type="button" name="button" onclick="submitForm()">test</button>
  </body>
</html>

<?php
$conn = new mysqli('localhost', 'root', 'root', 'MRosas');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT number FROM submission GROUP BY number";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div> {$row['number']}</div>";
    }
}
$conn->close();
?>
<?php
//connect to DB

header('Content-Type: application/json');
$requestBody = file_get_contents('php://input');
 $jsonData = json_decode($requestBody);
$userNumber = $jsonData->userNumber;
if (isset($userNumber)) {
  $sql = "INSERT INTO submission (number) VALUES ($userNumber)";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


  $isEven = check_isEven($userNumber);
  $response = array('isEven' => $isEven);
  echo json_encode($response);
}
function check_isEven($number) {
  return $number % 2 == 0;
}

 ?>
