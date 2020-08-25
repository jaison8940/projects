<?php include 'includes/header.php'; ?>

      <div class="jumbotron w-100 p-3" >
        <h1>Find A Job</h1>
        <form method="get" action="index.php">
          <select name="category" class="form-control">
            <option value="0">Choose category</option>
            <?php foreach ($categories as $cat): ?>
              <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
            <?php endforeach; ?>
          </select>
          <br>
          <input type="submit" class="btn btn-lg btn-success" value="Find">
        </form>
      </div>
        <h3><?php echo $title; ?></h3>
      	<?php foreach ($jobs as $job): ?>
      	<div class="row marketing">
	        <div class="col-md-10">
	          <h4><strong><?php echo $job->job_title; ?></strong> <small style="display: inline;"><i class="fa fa-map-marker"></i> <?php echo $job->country; ?></small></h4>
            
	          <p><?php echo $job->description; ?></p>     
	        </div>
	        <div class="col-md-2">
	        		<a class="btn btn-primary" href="job.php?id=<?php echo $job->id; ?>">View</a>
	        </div>
        </div>
        <?php endforeach; ?>  
           

<?php include 'includes/footer.php'; ?>