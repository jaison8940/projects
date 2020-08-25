<?php include 'includes/header.php'; ?>
		
        <h3><?php echo $title; ?></h3>
      	<?php foreach ($my_jobs as $job): ?>
      	<div class="row marketing">
	        <div class="col-md-8">
	          <h4><?php echo $job->job_title; ?></h4>
	          <p><?php echo $job->description; ?></p>     
	        </div>
	        <div class="col-md-4">

		        <div class="col-md-6">
		        		<a style="width: 100px;" class="btn btn-primary btn-block" href="job.php?id=<?php echo $job->id; ?>&myjob=yes">View</a>
		        </div>
		        <div class="col-md-6">
		        	<form method="get" action="viewapplications.php"> 
		        		<input type="hidden" name="job_id" value="<?php echo $job->id; ?>">
		        		<?php if($job->count == 0): ?>
				        <button style="width: 100px;" type="submit" class="btn btn-primary" disabled>
						  Applications <span style="border-radius: 15px;" class="badge badge-light"><?php echo $job->count; ?></span>
						</button>
						<?php else: ?>
							<button style="width: 100px;" type="submit" class="btn btn-primary">
						  Applications <span style="border-radius: 15px;" class="badge badge-light"><?php echo $job->count; ?></span>
						<?php endif; ?>

				    </form>
				</div>
			</div>
        </div>
        <?php endforeach; ?>  
           

<?php include 'includes/footer.php'; ?>