<?php
$user = $_POST["username"];
$post = $_POST["post"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "n662l546", "Kaegiey9", "n662l546");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$randomid = rand(1000, 9999);
$que = "SELECT user_id FROM Users";
$userExist = false;

if ($result = $mysqli->query($que)) {

      while($row = $result->fetch_assoc()) {
          if($row["user_id"]==$user)
          {
            $userExist = true;
          }
      }
}
if($userExist){
  if(empty($post)){
    echo "Post empty";
  }
  else{
      //echo $user;
      $query = "INSERT INTO Posts (content, post_id, author_id) VALUES ('$post', '$randomid', '$user')";
      if ($result = $mysqli->query($query)) {

              printf ("Added");
          /* free result set */
          //$result->free();
        }
    }
}
else{
  echo "Not an user";
}
/* close connection */
$mysqli->close();
?>
