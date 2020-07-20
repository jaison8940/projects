<?php 
  session_start();
  if(isset($_POST['webname']))
  {
    if(isset($_SESSION['Bookmarks']))
    {
      $_SESSION['Bookmarks'][$_POST['webname']] = $_POST['weburl'];
    }
    else{
      $_SESSION['Bookmarks'] = array($_POST['webname'] => $_POST['weburl']);
    }
  }
  if(isset($_GET['action']) && $_GET['action'] == 'delete')
  {
    unset($_SESSION['Bookmarks'][$_GET['name']]);
    header("Location: dubuk.php");
  }
  if(isset($_GET['action']) && $_GET['action'] == 'clear')
  {
    unset($_SESSION['Bookmarks']);
    session_destroy();
    header("Location: dubuk.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Bookmarks app</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style type="text/css">
            body {
        padding-top: 5rem;
      }
    </style>
  </head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Bookmarks</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="dubuk.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-right">
            <li class="nav-item"><a class="nav-link" href="dubuk.php?action=clear">Clear all</a></li>
      </ul>      
    </div>
  </nav>

<main role="main" class="container">
  <div class="container">
    <div class="row">
      <div class="col-md-7">        
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="form-group">
            <label>Website Name</label><br>
            <input type="text" class="form-group" name="webname">
          </div>
          <div class="form-group">
            <label>Website URL</label><br>
            <input type="text" class="form-group" name="weburl">
          </div>        
        <input type="submit" class="btn btn-default" name="d" value="Submit">
        </form>
      </div>
      <div class="col-md-5">        
        <?php if(isset($_SESSION['Bookmarks'])): ?>
          <ul class="list-group">
            <?php foreach ($_SESSION['Bookmarks'] as $key => $value): ?>
              <li class="list-group-item">
                <a href="<?php echo $value; ?>"><?php echo $key; ?><a href="dubuk.php?action=delete&name=<?php echo $key; ?>">[X]</a></a> 
              </li>
            <?php endforeach; ?> 
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</main>
</body>
</html>
