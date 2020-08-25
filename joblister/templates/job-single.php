<?php include 'includes/header.php'; ?>

<h2 class="page-header"><strong><?php echo $job->job_title; ?></strong> <small style="display: inline;"><i class="fa fa-map-marker"></i> <?php echo $job->location; ?>, <?php echo $job->country; ?></small></h2>
<small>
	Posted By <?php echo $job->contact_user; ?> on  <?php echo $job->post_date; ?>
</small>
<hr>
<p class="lead"><?php echo $job->description; ?></p>
<ul class="list-group">
	<li class="list-group-item"><strong>Company: <?php echo $job->company; ?></strong></li>
	<li class="list-group-item"><strong>Salary: <?php echo $job->salary; ?></strong></li>
	<li class="list-group-item"><strong>Contact-email: <?php echo $job->contact_email; ?></strong></li>
</ul>
<br>
<br>
<a href="<?php echo $go_back; ?>">Go Back</a>
<br>
<br>

<div class="well">
	<a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-primary">Edit</a>

	<form style="display: inline;" method="post" action="job.php">
		<input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
		<input type="submit" class="btn btn-danger" name="submit" value="Delete">
		
	</form>
	
</div>


<?php include 'includes/footer.php'; ?>