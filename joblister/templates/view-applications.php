<?php include 'includes/header.php'; ?>

      
        <h3><?php echo $title; ?></h3>

      	<?php foreach ($my_applications as $my_application): ?>
      	<hr>
      	<div class="row marketing">
	        <div class="col-md-8">
	          <p style="display: inline;">
	            <ul class="list-group">
	            	<li class="list-group-item"><strong class="strong">Name:</strong> <?php echo $my_application->first_name; ?> <?php echo $my_application->last_name; ?></li>
					<li class="list-group-item"><strong class="strong">University/College:</strong> <?php echo $my_application->university_or_college; ?></li>
					<li class="list-group-item"><strong class="strong">Year of passing:</strong> <?php echo $my_application->passing_year; ?></li>
					<li class="list-group-item"><strong class="strong">Cgpa:</strong> <?php echo $my_application->cgpa; ?></li>
					
					<li class="list-group-item"><strong class="strong">Applied on:</strong> <?php echo date("d-m-Y h:i:s", strtotime($my_application->applied_date)); ?></li>
				</ul>	          	
	          </p>     
	        </div>
	        <div class="col-md-4">
		        <div class="col-md-6">
		        		<a style="width: 100px;" class="btn btn-primary btn-block" href="viewapplications.php?user_id=<?php echo $my_application->user_id; ?>&job_id=<?php echo $my_application->job_id; ?>">View Full Details</a>
		        </div>
			</div>
        </div>

        <?php endforeach; ?>  

        <a href="<?php echo $go_back; ?>">Go Back</a>
           

<?php include 'includes/footer.php'; ?>