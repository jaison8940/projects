<?php include_once 'config/init.php'; ?>

<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	require_once 'PHPMailer-master/src/PHPMailer.php';
	require_once 'PHPMailer-master/src/SMTP.php';
	require_once 'PHPMailer-master/src/Exception.php';
	$job = new Job;
	if($_SESSION['logged_in']){
		if(isset($_POST['submit']))
		{
			$data = array();
			$data['job_title'] = $_POST['job_title'];
			$data['company'] = $_POST['company'];
			$data['category_id'] = $_POST['category'];
			$data['description'] = $_POST['description'];
			$data['location'] = $_POST['location'];
			$data['salary'] = $_POST['salary'];
			$data['country'] = $_POST['country'];
			$data['contact_user'] = $_POST['contact_user'];
			$data['contact_email'] = $_POST['contact_email'];
			$data['user_id'] = $_SESSION['user_id'];

			

			$email = $job->getUserMail($_SESSION['user_id']);

			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'joblister.notification@gmail.com';
			$mail->Password = 'joblister@123';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;

			$mail->setFrom('joblister.notification@gmail.com', 'JobLister');
			$mail->addAddress($email, 'Me');
			$mail->Subject = 'Successfully listed your job!';

			$mail->isHTML(TRUE);
			$mail->Body = "<html>Hi there, your job has been listed successfully!. 
			<ul>
				<li>Company: {$data['company']}</li>
				<li>Job Title: {$data['job_title']}</li>					
			</ul>
			<br> you can check further details on website. Have a nice day!.
			</html>";
	
			if($data['category_id']==0){
				reDirect("create.php","Please choose valid category!","error");
			}
			else{
			if($mail->send() && $job->create($data)){
				
				

				reDirect("index.php","Your job has been listed","success");



			}else{
				reDirect('create.php','Something went wrong','error');
			}
		}
	
		}
		$template = new Template('templates/job-create.php');
		$template->countries = $job->getCountries();
		$template->categories = $job->getCategories();
		echo $template;
	}
	else{
		reDirect("index.php","Please signin","error");
	}


?>