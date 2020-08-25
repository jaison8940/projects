<?php include 'includes/header.php'; ?>
  
	<h3 class="page-header">Create Job Listing</h3><br>
	<form method="post" action="create.php">
		<div class="form-group">
			<label>Company*</label>
			<input type="text" class="form-control" name="company" required>
		</div>
		<div class="form-group">
			<label>Category*</label>
			<select class="form-control" name="category" required>
				<option value="0">Choose category</option>
	            <?php foreach ($categories as $cat): ?>
	              <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
	            <?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Job Title*</label>
			<input type="text" class="form-control" name="job_title" required>
		</div>
		<div class="form-group">
			<label>Description*</label>
			<textarea class="form-control" name="description" required></textarea>
		</div>
		<div class="form-group">
			<label>Location*</label>
			<input type="text" class="form-control" name="location" required>
		</div>
		<div class="form-group">
	      <label>Country*</label>
	      <select id="country" class="form-control" name="country" required>
	        <option value="">Select Country</option>
	        <?php foreach ($countries as $country): ?>
	          <option value="<?php echo $country->name; ?>"><?php echo $country->name; ?></option>
	        <?php endforeach; ?>
	      </select>
	    </div>
		<div class="form-group">
			<label>Salary*</label>
			<input type="text" class="form-control" name="salary" required>
		</div>
		<div class="form-group">
			<label>Contact User*</label>
			<input type="text" class="form-control" name="contact_user" required>
		</div>
		<div class="form-group">
			<label>Contact Email*</label>
			<input type="text" class="form-control" name="contact_email" required>
		</div>
		
		<input type="submit" class="btn btn-primary" value="Submit" name="submit">

	</form>

<?php include 'includes/footer.php'; ?>