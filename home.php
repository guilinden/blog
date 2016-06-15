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
 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Painel administrador</title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 </head>
 <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link href="css/bootstrap.css" rel="stylesheet">
 		<link href="estilo.css" rel="stylesheet">
 <body>
 	<div class="container">
     <div class="row">
         <div class="col-md-3">
             <ul class="nav nav-pills nav-stacked">
                 <li class="active"><a href="index.php"><i class="fa fa-home fa-fw"></i>Index</a></li>
                 <li><a href="novo_post.php"><i class="fa fa-list-alt fa-fw"></i>Novo post</a></li>
                 <li><a href="nova_categoria.php"><i class="fa fa-list-alt fa-fw"></i>Nova categoria</a></li>
                 <li><a href="meus_posts.php"><i class="fa fa-list-alt fa-fw"></i>Meus posts</a></li>
                 <li><a href="usuarios.php"><i class="fa fa-table fa-fw"></i>Usuarios</a></li>
                 <li><a href="logout.php"><i class="fa fa-cogs fa-fw"></i>Logout</a></li>
             </ul>
         </div>
         <div align="center" class="col-md-9 well">
             Painel administrador
         </div>
     </div>
 </div>
 </body>
 </html>
