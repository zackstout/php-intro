<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>php</title>
  </head>
  <body>
    <h1>hello php!</h1>


    <?php
    $name = 'php!';
    $things = ['a rat', 'a monkey', 'a meerkat!'];
    echo "<p>$name</p>";

    for ($i=0; $i<count($things); $i+=1) {
      echo "<div>This animal is $things[$i]</div>";
    }
    ?>


      <?php
      $connection = mysqli_connect("127.0.0.1", "root", "root", "todolist");

      if(mysqli_connect_errno()) {
        echo "error" . mysqli_connect_error();
      } else {
        $query = 'SELECT * FROM todos_todo;';
        $result = mysqli_query($connection, $query);
      }

      while($row = mysqli_fetch_array($result)) {
        $name = $row["title"];
        $text = $row["test"];
        echo "<p>$name: $text</p>";
        // echo("<script>console.log('PHP: $text');</script>");
      }



       ?>

  </body>
</html>
