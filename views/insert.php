<?php

  $con = mysqli_connect("localhost", "roflcopter", "root123", "photoblock");

  if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: ". mysqli_connect_error();
  }

  $sql = "INSERT INTO posts (title, content) VALUES ('$_POST[title]', '$_POST[content]')";

  if(!mysqli_query($con, $sql)) {
    die('Error: '. mysqli_error($con));
  }
  header("Location: ../home");
  echo "Succesfully Posted";
?>