<?php include 'includes/header.php'; ?>
<h3><?php echo $title; ?></h3>
<br>
<h4 class="page-header">Name: <?php echo $applicant_details->first_name; ?> <?php echo $applicant_details->last_name; ?></h4>
<small>
	Applied On <?php echo date("d-m-Y h:i:s", strtotime($applicant_details->applied_date)); ?>
</small>
<br><br>

<ul class="list-group">
	<li class="list-group-item"><strong class="strong">FIRST NAME:</strong> <?php echo $applicant_details->first_name; ?></li>
	<li class="list-group-item"><strong class="strong">LAST NAME:</strong> <?php echo $applicant_details->last_name; ?></li>
	<li class="list-group-item"><strong class="strong">DOB:</strong> <?php echo date("d-m-Y", strtotime($applicant_details->dob)); ?></li>
	<li class="list-group-item"><strong class="strong">ADDRESS:</strong> <?php echo $applicant_details->address; ?></li>
	
	<li class="list-group-item"><strong class="strong">CITY:</strong> <?php echo $applicant_details->city; ?></li>
	<li class="list-group-item"><strong class="strong">STATE:</strong> <?php echo $applicant_details->state; ?></li>
	<li class="list-group-item"><strong class="strong">COUNTRY:</strong> <?php echo $applicant_details->country; ?></li>
	<li class="list-group-item"><strong class="strong">QUALIFICATION:</strong> <?php echo $applicant_details->qualification; ?></li>
	<li class="list-group-item"><strong class="strong">COURSE:</strong> <?php echo $applicant_details->course; ?></li>
	<li class="list-group-item"><strong class="strong">SPECIALIZATION:</strong> <?php echo $applicant_details->specialization; ?></li>
	<li class="list-group-item"><strong class="strong">UNIVERSITY/COLLEGE:</strong> <?php echo $applicant_details->university_or_college; ?></li>
	<li class="list-group-item"><strong class="strong">YEAR OF PASSING:</strong> <?php echo $applicant_details->passing_year; ?></li>

	<li class="list-group-item"><strong class="strong">COUTSE TYPE:</strong> <?php echo $applicant_details->course_type; ?></li>
	<li class="list-group-item"><strong class="strong">CGPA:</strong> <?php echo $applicant_details->cgpa; ?></li>
	<li class="list-group-item"><strong class="strong">ARREAR:</strong> <?php echo $applicant_details->arrear; ?></li>
	<li class="list-group-item"><strong class="strong">BOARD:</strong> <?php echo $applicant_details->board; ?></li>

	<li class="list-group-item"><strong class="strong">PERCENTAGE:</strong> <?php echo $applicant_details->percentage; ?></li>
	<li class="list-group-item"><strong class="strong">E-MAIL:</strong> <?php echo $applicant_details->email; ?></li>
	<li class="list-group-item"><strong class="strong">CONTACT NO:</strong> <?php echo $applicant_details->contact_no; ?></li>
	

</ul>
<br>
<br>
<a href="<?php echo $go_back; ?>">Go Back</a>
<br>
<br>




<?php include 'includes/footer.php'; ?>