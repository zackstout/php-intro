<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    require_once('connect.php');

    if(isset($_POST['sub'])) {
      $name = $_POST["title"];
      $text = $_POST["test"];
      $created = $_POST["created_at"];
      echo "$name: $text";

      $query = "INSERT INTO todos_todo (id, title, test, created_at) VALUES (NULL, ?, ?, NOW());";

      $stmt = mysqli_prepare($connection, $query);

      mysqli_stmt_bind_param($stmt, "ss", $name, $text);

      mysqli_stmt_execute($stmt);

      $affected_rows = mysqli_stmt_affected_rows($stmt);

      if ($affected_rows == 1) {
        echo 'entered';

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
      } else {

        // echo mysqli_error();

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
      }
    } else {
      echo 'error';
    }





     ?>

     <a href="/">Go back</a>
  </body>
</html>
