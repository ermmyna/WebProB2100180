<?php 

  $con = mysqli_connect("localhost", "root", "", "bit210");

  if(mysqli_connect_errno()){
    die("Cannot Connect to the database".mysqli_connect_error());
  }

  define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/GitHub/WebProB21000180/uploads/");

  define("FETCH_SRC","http://127.0.0.1/GitHub/WebProB2100180/uploads/");
?>

