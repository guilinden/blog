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
 <html >
   <head>
     <meta charset="UTF-8">
     <title>New Post</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/bootstrap.css" rel="stylesheet">
   </head>
   <body>
   </br>
   <a href="home.php">Home</a>
    <div class="wrapper">
     <form class="form-signin" method="post" enctype="multipart/form-data">
       <h2 class="form-signin-heading">New Post</h2>
       <h4>Title</h4><input type="text" class="form-control" name="title" placeholder="Title" /></br>
       <select name="categorie">
       <?php
        $connection = mysql_connect("localhost","root","");
        mysql_select_db("blog",$connection);
        $sql = mysql_query("SELECT * FROM categories");

        while($row = mysql_fetch_array($sql)){
            echo '<option value="'.$row['categorie'].'">'.$row['categorie'].'</option>';
        }
        ?>
        </select>

 			<h4>Content</h4>
 			<div class="form-group">
   			<textarea class="form-control" rows="12" id="comment" name="content"></textarea>
 			</div>
      <input type="file" name="arquivo">
       <button class="btn btn-lg btn-primary btn-block" type="submit" name="post">Post it</button>
     </form>
   </div>
   </body>
 </html>
 <?php
 if(isset($_POST['post'])){
   $content = mysql_real_escape_string($_POST['content']);
   $title = mysql_real_escape_string($_POST['title']);
   $categorie = mysql_real_escape_string($_POST['categorie']);
   $user = $_SESSION['user'];
   $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
   $novo_nome = md5(time()) . $extensao;
   $diretorio = "imagens/";
   move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);

   $connection = mysql_connect("localhost","root","");
   mysql_select_db("blog",$connection);

   $query = "INSERT INTO posts (title,categorie,content,posted_by,name) VALUES ('$title','$categorie','$content','$user','$novo_nome')";
   mysql_query($query);
 }
 ?>
