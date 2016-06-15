
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="blog-home.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
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
                        <a href="#">About me</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Guilherme Linden
                    <small>Coder by love</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                  $connection = mysql_connect("localhost","root","");
                  mysql_select_db("blog",$connection);
                  $id = $_GET['id'];
                  $sql1 = mysql_query("SELECT * FROM categories WHERE id='$id'");
                    while($row1 = mysql_fetch_array($sql1)){
                      $tag = $row1['categorie'];
                    }
                  $sql = mysql_query("SELECT * FROM posts WHERE categorie='$tag'");
                  while($row = mysql_fetch_array($sql)){
                    $title = $row['title'];
                    $content = $row['content'];
                    $time = $row['time'];
                    $posted_by = $row['posted_by'];
                    $name = $row['name'];
                    $id = $row['id'];
                    ?>
                    <h2>
                        <a href="#"><?php echo $title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $posted_by ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo "Posted on $time" ?></p>
                    <hr>
                  <?php Print '<img class="img-responsive" src="imagens/' . $name . '" alt="">' ?>
                    <hr>
                    <?php
                    $content = substr($content, 0, 300);
                    Print '<p>'.$content . "..." . '</p>'

                    ?>
                    <a class="btn btn-primary" <?php Print 'href="read_more.php?id='. $id .'"'  ?>>Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>


                    <?php
                    }
                    ?>



                <!-- Pager -->


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                          <ul class="list-unstyled">
                          <?php
                          $connection = mysql_connect("localhost","root","");
                          mysql_select_db("blog",$connection);
                          $sql = mysql_query("SELECT * FROM categories LIMIT 5");
                          while($row = mysql_fetch_array($sql)){
                              Print '<li><a href="filtrar_categoria.php?id='. $row['id'] .'">'. $row['categorie'] .'</a> </li>';
                            }
                           ?>
                         </br>
                           <?php
                              Print '<li><a href="todas_categorias.php">See all</a> </li>';
                            ?>
                           </ul>
                        </div>


                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>What is Coder tips?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Guilherme Linden 2016</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
