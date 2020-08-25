<?php include 'includes/header.php'; ?>

      
        <h3><?php echo $title; ?></h3>
      	<?php foreach ($applied_jobs as $job): ?>
      	<div class="row marketing">
	        <div class="col-md-10">
	          <h4><?php echo $job->job_title; ?></h4>
	          <p><?php echo $job->description; ?></p>     
	        </div>
	        <div class="col-md-2">
	        		<a class="btn btn-primary" href="job.php?id=<?php echo $job->id; ?>&appliedjob=yes">View</a>
	        </div>
        </div>
        <?php endforeach; ?>  
           

<?php include 'includes/footer.php'; ?> 