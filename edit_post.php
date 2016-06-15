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
	<title>Edit Post</title>
</head>
<body>
</br>
  <a href="home.php">Home</a>
  <h3>Selected post</h3>
  <?php
  $connection = mysql_connect("localhost","root","");
  mysql_select_db("blog",$connection);
  $id=$_GET['id'];
  $sql = mysql_query("SELECT * FROM posts WHERE id='$id' ");
  while($row = mysql_fetch_array($sql)){
    $title = $row['title'];
    $subtitle = $row['subtitle'];
    $content = $row['content'];
    $time = $row['time'];
    $posted_by = $row['posted_by']
    ?>
    <h2><?php echo $title ?></h2>
    <h4><?php echo $subtitle ?></h4>
    <p><?php echo $content ?></p>
    <small><?php echo "Posted by " . $posted_by . " - " . $time ?></small>
    <hr></hr>

<?php
  }
 ?>
  <form method="post">
    <p>Title</p><input type="text" name="title">
    <p>Subtitle</p><input type="text" name="subtitle">
    <p>Content</p><textarea rows="12" name="content"></textarea></br>
    <input type="submit" name="editar" value="Edit post"></br>
  </form>
</body>
</html>
<?php
  if(isset($_POST['editar'])){
    $title = mysql_real_escape_string($_POST['title']);
    $subtitle = mysql_real_escape_string($_POST['subtitle']);
    $content = mysql_real_escape_string($_POST['content']);

    $connection = mysql_connect("localhost","root","");
    mysql_select_db("blog",$connection);
    $query = "UPDATE posts SET title='$title', subtitle='$subtitle', content='$content'";
    mysql_query($query);
  }

 ?>
