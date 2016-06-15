<?php
  session_start();
  if(isset($_SESSION['user'])){
    echo "Welcome " . $_SESSION['user'];
  }
  else {
    echo "<script language='javascript' type='text/javascript'>alert('Voce de estar logado');window.location.href='index.php';</script>";
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
</head>
<body>
  <a href="home.php">Home</a>
  <table border="1">
    <tr>
      <th>#</th>
      <th>User</th>
      <th></th>


    </tr>
    <?php
      $cont = 0;
      $connection = mysql_connect("localhost","root","");
      mysql_select_db("blog",$connection);
      $sql = mysql_query("SELECT * FROM users");
      while($row = mysql_fetch_array($sql)){
        $cont++;
        Print "<tr>";
          Print "<th>" . $cont . "</th>";
          Print '<td>'. $row['user'] . "</td>";
          Print '<td><a href="delete_user.php?id='. $row['id'] .'">Delete</a> </td>';
        Print "</tr>";
      }
     ?>
  </table>
  <h3>Create a new user</h3>
  <form method="post">
    User:<input type="text" name="user"></br>
    Password:<input type="password" name="password"></br>
    <input type="submit" name="create" value="Create user">
  </form>

</body>
</html>
<?php
  if(isset($_POST['create'])){
    $connection = mysql_connect("localhost","root","");
    mysql_select_db("blog",$connection);
    $user = mysql_real_escape_string($_POST['user']);
    $password = mysql_real_escape_string($_POST['password']);
    $query = "INSERT INTO users (user,password) VALUES ('$user','$password')";
    mysql_query($query);
    header("Location:usuarios.php");
  }
 ?>
