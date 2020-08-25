<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.0.1">
	<title>JobLister</title>

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">

  <!-- CSS only -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<script src="https://use.fontawesome.com/cd083f6f99.js"></script>

<!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <style type="text/css">
        #nav{
      font-size: 16px !important;
    }
    strong.strong{
  display:inline-block;
  width:140px;
  text-align:left;
} 
</style>

</head>
<body>
	  <div class="container">  

      <nav class="navbar navbar-expand-md">
        <!-- <div class="container"> -->
        <h3 class="text-muted"><?php echo SITE_TITLE; ?></h3>  
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapseElement" aria-expanded="false">&#9776;</button>
        <div id="collapseElement" class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto" id="nav">
            <li class="nav-item">
              <a  class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php">Create Listing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mylistings.php">My Listings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="applied_jobs.php">Applied Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php" style="background-color: red;color: white;width: 70px;padding: 9px;">Logout</a>
            </li>
            
          </ul>
        </div>
      </nav>

      

<hr>

      
    <?php displayMessage(); ?>