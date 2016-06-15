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
	<title>Nova categoria</title>
</head>
<body>
	<a href="home.php">Home</a></br></br>
  <table border="1">
  <tr>
    <th>#</th>
    <th>Categoria</th>
    <th></th>
  </tr>
  <?php
    $connection = mysql_connect("localhost","root","");
    mysql_select_db("blog",$connection);
    $cont = 0;
    $sql = mysql_query("SELECT * FROM categories");
    while($row = mysql_fetch_array($sql)){
      $cont++;
      Print '<tr>';
        Print '<th>' . $cont . "</th>";
        Print '<td>'. $row['categorie'] . "</td>";
				Print '<td align="center"><a href="deletar_categoria.php?id='. $row['id'] .'">Deletar</a> </td>';
      Print '</tr>';
    }
   ?>
  </table>
  <h3>Criar nova categoria</h3>
  <form method="post">
    <input type="text" name="categorie" placeholder="Categorie">
    <input type="submit" name="create" value="Create">
  </form>
</body>
</html>

<?php
  if(isset($_POST['create'])){
    $connection = mysql_connect("localhost","root","");
    mysql_select_db("blog",$connection);
		$categorie = strtolower(mysql_real_escape_string($_POST['categorie']));
		$sql = mysql_query("SELECT * FROM categories WHERE categorie='$categorie'");
		if(mysql_num_rows($sql)>0){
			echo "A categoria ja existe";
		}
		else {
		$query = "INSERT INTO categories (categorie) VALUES ('$categorie')";
		mysql_query($query);
		header("Location:nova_categoria.php");
		}
  }
 ?>
