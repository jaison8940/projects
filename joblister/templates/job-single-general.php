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
<div class="well">
	<form method="post" action="applytojob.php">
		<?php if($_SESSION['user_id'] == $job->user_id): ?>
			<input type="submit" class="btn btn-lg btn-primary" value="Apply" disabled> 
		<?php elseif ($applied_or_not == true): ?>
			<input type="submit" class="btn btn-lg btn-primary" value="Applied" disabled>
		<?php else: ?>
			<!-- <input type="hidden" name="job_id" value="<?php echo $job->id; ?>"> -->
			<?php $_SESSION['job_id']=$job->id; ?>
			<input type="submit" class="btn btn-lg btn-primary" value="Apply" > 
		<?php endif; ?>
	</form>
</div>

<br>
<br>
<a href="<?php echo $go_back; ?>">Go Back</a>
<br>
<br>



<?php include 'includes/footer.php'; ?>