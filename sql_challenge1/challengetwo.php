<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" action="">
      <select>
         <option value="Beige">Beige</option>
         <option value="Black">Black</option>
         <option value="Denim">Denim</option>
         <option value="Gray">Gray</option>
         <option value="Khaki">Khaki</option>
         <option value="White">White</option>
      </select>
      <button type="submit" >Submit</button>
    </form>
    <button type="button" name="button" onclick="submitForm()">test</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/superagent/3.6.0/superagent.min.js"></script>
    <script src="app.js"></script>
  </body>
</html>

<?php
// connect to the DB
$conn = new mysqli('localhost', 'root', 'root', 'MRosas')
or die ('Cannot connect to db');
   $result = $conn->query("SELECT name, FROM challenge_one");
$userNumber = $_POST["userNumber"];
if (isset($userNumber)) {
  $isEven = check_isEven($userNumber);
  if ($isEven === true){
  echo "The number: {$userNumber}  is an Even Number";
  }else {
    echo "The number: {$userNumber}  is an Odd Number";
  }
  ?>
  <script>
    function redirect(){
      window.location.href="/";
    }
  </script>
  <button type="button" name="button" onclick="redirect()">reset</button>
  <?php
  die();
}
function check_isEven($number) {
  return $number % 2 == 0;
}

 ?>

<?php
