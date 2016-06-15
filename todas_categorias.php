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
          Print '<td><a href="filtrar_categoria.php?id='. $row['id'] .'">'. $row['categorie'] .'</a> </td>';
      Print '</tr>';
    }
   ?>
  </table>

</body>
</html>
