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

<form action="process.php" method="post">
  Title: <input type="text" name="title" value="">
  Text: <input type="textarea" name="test" value="">
  <input type="submit" name="sub" value="Submit">
</form>

<br><br>

<form action="" method="get">
  Query: <input type="text" name="query" value="">
  <input type="submit" name="sub2" value="Submit">
</form>

<br><br>

<!-- $http.get('https://api.giphy.com/v1/gifs/search?api_key=MgySsWcwlCGjN46KaT2DLAWOdyKQsfrk&q=' + keyword + '&limit=10') -->


<?php




// if(isset($_GET['sub2'])) {
// $maps_url = 'https://api.nasa.gov/planetary/apod?api_key=jL5f4l8TRYT0OiXWW1Rl3Tu0vNueaXtTWgwKxEsZ';
// $maps_json = file_get_contents($maps_url);
// $maps_json = file_get_contents($maps_url);
// $maps_array = json_decode($maps_json, true);
// echo $maps_array;
// }
 ?>

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

$response = file_get_contents('http://poetrydb.org/title/Ozymandias/lines.json');
$response = file_get_contents('http://poetrydb.org/author/Shelley/lines.json');
//

// echo $response;
$json = json_decode($response, true);

$words = array();

for ($i=0; $i < count($json[0][lines]); $i+=1) {
  // echo ($json[0][lines][$i] . "<br>");
  $arr = explode(" ", $json[0][lines][$i]);
  for ($j=0; $j < count($arr); $j++) {
    array_push($words, $arr[j]);
  }
}

echo '<ul>';
foreach ($words as $word) {
  echo "<li>$word</li>";
  // echo $word;
}
echo '</ul>';

echo "<br><br>";

$arrContextOptions = array(
  "ssl"=>array(
    // "cafile"=> "/cacert.pem",
    "verify_peer"=>false,
    "verify_peer_name"=>false,
  ),
);

// $ctx = stream_context_create([
//     'ssl' => [
//         'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT,
//     ],
// ]);


// $math = file_get_contents('http://api.wolframalpha.com/v2/query?appid=7R8Q7K-2XXKYK7VKY&input=pi&format=plaintext&includepodid=Property', false, stream_context_create($arrContextOptions));
// echo (json_decode($math, true));
// $json2 = json_decode($math, true);
// echo $math;
// echo '<br><br>';
//
// $nasa = file_get_contents('http://api.nasa.gov/planetary/apod?api_key=jL5f4l8TRYT0OiXWW1Rl3Tu0vNueaXtTWgwKxEsZ', false, stream_context_create($arrContextOptions));
// $json1 = json_decode($nasa, true);
//
// print $nasa;
// echo $json1;


?>

</body>
</html>
