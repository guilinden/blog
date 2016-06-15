<?php
  session_start();
  if(isset($_SESSION['user'])){
    echo "Welcome " . $_SESSION['user'];
    $id = session_id();
  }
  else{
    echo "<script language='javascript' type='text/javascript'>alert('Voce de estar logado');window.location.href='index.php';</script>";
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <?php
    $user = $_SESSION['user'];
    Print '<a href="home.php">Home</a>';
    $connection = mysql_connect("localhost","root","");
    mysql_select_db("blog",$connection);
    $sql = mysql_query("SELECT * FROM posts WHERE posted_by='$user' ORDER BY id DESC ");
    while($row = mysql_fetch_array($sql)){
    $title = $row['title'];
    $content = $row['content'];
    $time = $row['time'];
    $posted_by = $row['posted_by'];
    $name = $row['name'];
    ?>
    <h2><?php echo $title ?></h2>
    <p><?php echo $content ?></p>
    <small><?php echo "Posted by " . $posted_by . " - " . $time ?></small>
    <?php echo '<img src="imagens/'. $name.'" /></br>'; ?>
    <?php Print '<a href="edit_post.php?id='. $row['id'] .'">Editar</a>';?> - <?php Print '<a href="delete_post.php?id='. $row['id'] .'">Deletar</a>';?>
    <hr></hr>


  <?php
  }
  ?>


</body>
</html>
