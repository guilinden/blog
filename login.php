<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Bootstrap Snippet: Login Form</title>
        <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
        <link rel="stylesheet" href="css/style.css">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="index.php">Coder tips</a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
										<li>
												<a href="about_us.php">About us</a>
										</li>
										<li>
												<a href="contact.php">Contact</a>
										</li>
										<li>
												<a href="login.php">Login</a>
										</li>
								</ul>
						</div>
						<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
		</nav>
      <div class="wrapper">
    <form class="form-signin" method="post">
      <h2 class="form-signin-heading">Entrar</h2>
      <input type="text" class="form-control" name="user" placeholder="Usuario" />
      <input type="password" class="form-control" name="password" placeholder="Senha" />
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
    </form>
  </div>
  </body>
</html>


<?php
  if(isset($_POST['login'])){
    $user = mysql_real_escape_string($_POST['user']);
    $password = mysql_real_escape_string($_POST['password']);

    $connection = mysql_connect("localhost","root","");
    mysql_select_db("blog",$connection);

    $sql = mysql_query("SELECT * FROM users WHERE password='$password' and user='$user'");
    if(mysql_num_rows($sql) == 0){
      echo "Wrong username or password";
    }
    else{
      session_start();
      $_SESSION['user'] = $user;
      header("Location:home.php");
    }
  }

 ?>
