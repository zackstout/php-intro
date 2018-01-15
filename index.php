<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>php</title>
    <script src="jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
    <h1>hello php!</h1>

    <!-- <script>
      $(document).ready(function() {
        console.log('jq');

        $('#sub').on('click', function() {
          console.log('clicked');
        });
      });
    </script> -->


    <?php
    $name = 'php!';
    $things = ['a rat', 'a monkey', 'a meerkat!'];
    echo "<p>$name</p>";

    for ($i=0; $i<count($things); $i+=1) {
      echo "<div>This animal is $things[$i]</div>";
    }
    ?>

    <!-- removed action="process.php" -->
    <form action="process.php" method="post">
      Title: <input type="text" name="title" value="">
      Text: <input type="textarea" name="test" value="">
      <input type="submit" name="sub" value="Submit">
    </form>


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


      // $response = file_get_contents('http://poetrydb.org/title/Ozymandias/lines.json');
      // $response = file_get_contents('http://poetrydb.org/author/Shakespeare/lines.json');
      //
      // print_r($response);



       ?>

  </body>
</html>
