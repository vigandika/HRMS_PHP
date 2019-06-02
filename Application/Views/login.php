<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Account Login</title>

  <link href="../Public/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../Public/css/style.css" rel="stylesheet" />
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Log In</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse"></div>
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">
             Account Login
          </h1>
        </div>
      </div>
    </div>
  </header>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form method="post" id="login" action="Overview" class="well">
            <div class="form-group">
              <label>Username</label>
              <input required name="username" type="text" value="<?php echo @$_COOKIE['cid']?>" class="form-control" placeholder="Enter Username" />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input required name="password" type="password" class="form-control" placeholder="Password" />
            </div>
              <input type="checkbox" name="ch" ><label>Remember Me</label>
            <button type="submit" name="signin" class="btn btn-default btn-block">
              Login
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php
  if(array_key_exists(0,$args)){
      echo "<div class=\"alert alert-warning\">";
      echo "Wrong Username or password";
      echo "</div>";
  }
  ?>

  <footer id="footer">
    <p>Copyright HRMS, &copy; 2019</p>
  </footer>

  <script>
    CKEDITOR.replace("editor1");
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../Public/js/bootstrap.min.js"></script>
</body>

</html>


<?php
@$id=$_POST['username'];
if(isset($_POST['signin']))
{

        if($_POST['ch']==true)
        {
            setcookie("cid",$id,time()+60*60*24);
//            header('location:../Controllers/DefaultController.php');
        }
//        header('location:../Controllers/DefaultController.php');

}
?>