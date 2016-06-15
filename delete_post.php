<?php
  session_start();
  if(isset($_SESSION['user'])){
    echo "Welcome " . $_SESSION['user'];
    //$id = session_id();
  }
  else{
    echo "<script language='javascript' type='text/javascript'>alert('Voce de estar logado');window.location.href='index.php';</script>";
  }


  if($_SERVER['REQUEST_METHOD'] == "GET")
	 {
     mysql_connect("localhost", "root","") or die(mysql_error());
     mysql_select_db("blog") or die("Erro ao conectar no bando");
     $id=$_GET['id'];
     $result = mysql_query("SELECT * FROM posts WHERE id='$id'");
     while($row = mysql_fetch_array($result)){
       $name = $row['name'];
       unlink("imagens/". $name);
     }
     mysql_query("DELETE FROM posts WHERE id = '$id'");
     header("Location:meus_posts.php");
  }
?>
