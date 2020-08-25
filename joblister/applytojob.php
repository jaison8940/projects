<?php include_once 'config/init.php'; ?>

<?php 

	$job = new Job;
	
	use PHPMailer\PHPMailer\PHPMailer;
	require_once 'PHPMailer-master/src/PHPMailer.php';
	require_once 'PHPMailer-master/src/SMTP.php';
	require_once 'PHPMailer-master/src/Exception.php';

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		$template = new Template('templates/apply-to-job.php');
    	
		$job_id = $_SESSION['job_id'];
		
		$template->countries = $job->getCountries();
		$template->qualifications = $job->getQualifications();
		$template->specializations = $job->getSpecializations();
		$template->boards = $job->getBoards();
		$template->job_id = $job_id;
		
		if(isset($_POST['submit']))
		{
			$data = array();
			$data['fname'] = $_POST['fname'];
			$data['lname'] = $_POST['lname'];
			$data['dob'] = $_POST['dob'];
			$data['address'] = $_POST['address'];
			$data['city'] = $_POST['city'];
			$data['state'] = $_POST['state'];
			$data['country'] = $job->getCountry($_POST['country'])->name;
			$data['qualification'] = $job->getQualification($_POST['qualification'])->name;
			$data['course'] = $job->validate($_POST['course']);
			if(strcmp($data['course'],'other')){
				$data['course'] = $job->validate($_POST['course_other']);

			}
			$data['specialization'] = $job->validate($_POST['specialization']);
			if(strcmp($data['specialization'], 'other')){
				$data['specialization'] = $job->validate($_POST['specialization_other']);

			}
			$data['university_or_college'] = $job->validate($_POST['university_or_college']);
			if(strcmp($data['university_or_college'],'other')){
				$data['university_or_college'] = $job->validate($_POST['college_other']);

			}
			
			$data['c_type'] = $job->validate($_POST['c_type']);
			$data['cgpa'] = $job->validate($_POST['cgpa']);
			$data['arrear'] = $job->validate($_POST['arrear']);
			$data['board'] = $job->validate($_POST['board']);
			$data['user_id'] = $_SESSION['user_id'];

			$data['percentage'] = $job->validate($_POST['percentage']);
			$data['email'] = $_POST['email'];
			$data['contact_no'] = $job->validate(isset($_POST['contact_no']));
			$data['job_id'] = $job_id;

			

			if(isset($_POST['passing_year']) && !empty($_POST['passing_year']))
			{
				$data['passing_year'] = $_POST['passing_year'];
			}
			else{
				$data['passing_year'] = $_POST['yop'];
			}

			if($job->applyToJob($data))
			{
				$email = $job->getMail($job_id);

				$job_det = $job->getJobDet($job_id);

				$mail = new PHPMailer();

				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'joblister.notification@gmail.com';
				$mail->Password = 'joblister@123';
				$mail->SMTPSecure = 'ssl';
				$mail->Port = 465;

				$mail->setFrom('joblister.notification@gmail.com', 'JobLister');
				$mail->addAddress($data['email'], 'Me');
				$mail->Subject = 'Application Submission';

				$mail->isHTML(TRUE);
				$mail->Body = "<html>Hi there, your application is successfully submitted.<br>
				<ul>
					<li>Company: ".$job_det->company."</li>
					<li>Job Title: ".$job_det->job_title."</li>					
				</ul>
				<br> you can check further details on website. Have a nice day!.
				</html>";



		
				if($mail->send()){
					
					$mail->ClearAllRecipients();
					$mail->addAddress($email, 'Me');
					$mail->Subject = 'Job Application';

					$mail->isHTML(TRUE);
					$mail->Body = "<html>Hi there, you have received application for your job(".$job_det->job_title."). please check the website for further details!. </html>";
					$mail->send();
				    reDirect("index.php","Applied Successfully!","success");
				} 
				else {
				    reDirect("applytojob.php","Please enter valid email id!","error");
				}

				reDirect("index.php","Applied Successfully!","success");

			}
			else
			{
				reDirect("index.php","Error occurred! Try again later!","error");

			}


		}
		else if(isset($_POST['country_id']))
		{
			$result = $job->getColleges($_POST['country_id']);
			$output .= '<option value="">Select University/College</option>';
		    foreach($result as $row){
		    	$output .= '<option value="'.$row->name.'">'.$row->name.'</option>';
		    }
		    $output .= "<option value='other'>Other</option>";
		    echo $output;

		}
		else if(isset($_POST['country_id_for_phcode']))
		{
			$result = '+'.$job->getPhonecode($_POST['country_id_for_phcode'])->phonecode;
		    echo $result;

		}
		else if(isset($_POST['qualification_id'])){
			$result = $job->getCourses($_POST['qualification_id']);
			$output .= '<option value="">Select Course</option>';
		    foreach($result as $row){
		    	$output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
		    }
		    $output .= "<option value='other'>Other</option>";
		    echo $output;

		}
		else{
			$template->job_id = $job_id;
			echo $template;

		}
	
		

	}
	else{
		
		$template = new Template('templates/login-page.php');
		echo $template;

	}





?>