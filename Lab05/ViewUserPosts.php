<?php
$user = $_POST["username"];
//$post = $_POST["post"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "n662l546", "Kaegiey9", "n662l546");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
//echo $user;
$query = "SELECT content, author_id FROM Posts WHERE author_id='$user'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Post: " . $row["content"] . "<br>";
        echo "Posted by " . $row["author_id"] . "<br><br>";
    }
}
else{
  echo "No posts";
}
/* close connection */
$mysqli->close();
?>
