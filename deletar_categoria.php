<?php
  $connection = mysql_connect("localhost","root","");
  mysql_select_db("blog",$connection);
  $id = $_GET['id'];
  $query = "DELETE FROM categories WHERE id='$id'";
  mysql_query($query);
  header("Location:nova_categoria.php");
 ?>
