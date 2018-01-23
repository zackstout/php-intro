<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>php</title>
  <script src="jquery.min.js" charset="utf-8"></script>
</head>
<body>
  <h1>hello php!</h1>

<form action="process.php" method="post">
  Title: <input type="text" name="title" value="">
  Text: <input type="textarea" name="test" value="">
  <input type="submit" name="sub" value="Submit">
</form>

<br><br>

<!-- <form action="" method="get">
  Query: <input type="text" name="query" value="">
  <input type="submit" name="sub2" value="Submit">
</form> -->

<?php
require_once('connect.php');

if(mysqli_connect_errno()) {
  echo "error" . mysqli_connect_error();
} else {
  $query = 'SELECT * FROM todos_todo;';
  $result = mysqli_query($connection, $query);
}

while($row = mysqli_fetch_array($result)) {
  $name = $row["title"];
  $text = $row["test"];
  $time = $row["created_at"];
  $cleantime = substr($time, 0, 19);

  echo "<p>$name: $text</p>";
  echo "<p>&emsp;Created at: $cleantime</p>";
  // print_r($name);
  // echo("<script>console.log('PHP: $text');</script>");
}

?>

</body>
</html>
