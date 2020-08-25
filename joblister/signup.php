<?php include_once 'config/init.php'; ?>

<?php 
	
	use PHPMailer\PHPMailer\PHPMailer;
	require_once 'PHPMailer-master/src/PHPMailer.php';
	require_once 'PHPMailer-master/src/SMTP.php';
	require_once 'PHPMailer-master/src/Exception.php';


	$job = new Job;
	if(isset($_POST['submit']))
	{
		$data = array();
		$data['email'] = $_POST['email'];
		$data['password'] = trim($_POST['password']);
		$data['cpassword'] = trim($_POST['cpassword']);
		
		
 		if($job->auth($data)){
 			if(strlen($data['password'])<6)
 			{
 				reDirect("signup.php","Password must be atleast 6 characters!","error");
 			}

			
			$data['password'] = md5(trim($_POST['password']));
			$data['cpassword'] = md5(trim($_POST['cpassword']));

			if(strcmp(trim($data['password']), trim($data['cpassword'])))
			{
				reDirect("signup.php","Password doesn't match!","error");
				
			}

			if($job->enter_user_creds($data)){
				
				

				

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
				$mail->Subject = 'Welcome to Joblister!';

				$mail->isHTML(TRUE);
				$mail->Body = '<html>Hi there, welcome to joblister. please feel free to explore jobs and to list your own job. </html>';


				if($mail->send()){
				    reDirect("index.php","Please log in to continue!","success");
				} else {
				    reDirect("signup.php","Please enter valid email id!","error");
				}

					 
			}else{
				reDirect('index.php','Something went wrong please try again later!','error');
			}
		}
		else{
			reDirect("signup.php","Entered email has registered already! please sign-in!","error");

		}
	}

	
	$template = new Template('templates/signup-page.php');
	echo $template;


?>