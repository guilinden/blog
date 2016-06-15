<?php
  session_start();
  if(isset($_SESSION['user'])){
    echo "Welcome " . $_SESSION['user'];
  }
  else {
    echo "<script language='javascript' type='text/javascript'>alert('Voce de estar logado');window.location.href='index.php';</script>";
  }

  $connection = mysql_connect("localhost","root","");
  mysql_select_db("blog",$connection);
  $id = $_GET['id'];
  $query = "DELETE FROM users WHERE id='$id'";
  mysql_query($query);
  header("Location:usuarios.php");
 ?>
