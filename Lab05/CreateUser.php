<?php
$user = $_POST["username"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "n662l546", "Kaegiey9", "n662l546");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$que = "SELECT user_id FROM Users";
$exist = false;

if ($result = $mysqli->query($que)) {

      while($row = $result->fetch_assoc()) {
          if($row["user_id"]==$user)
          {
            $exist = true;
          }
      }
}
if($exist!=true){
  if(empty($user)){
    echo "Input an username";
  }
  else{
$query = "INSERT INTO Users (user_id) VALUES ('$user')";

if ($result = $mysqli->query($query)) {

        printf ("Added");
    /* free result set */
    //$result->free();
  }
}
}
else{
  echo "User already exists";
}
/* close connection */
$mysqli->close();
?>
