<?php
//$user = $_POST["username"];
//$post = $_POST["post"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "n662l546", "Kaegiey9", "n662l546");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$i = 0;
$query = "SELECT author_id, content FROM Posts";

if ($result = $mysqli->query($query)) {

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $arr[$i] = $row["author_id"];
          $postarr[$i] = $row["content"];
          $i=$i+1;
      }
    }
    else {
      echo "Table is empty";
    }
    $result->free();
}

/* close connection */
$mysqli->close();
?>
