<?php 
	function reDirect($page = FALSE, $msg = NULL, $msg_type = NULL){
		if(is_string($page)){
			$location = $page;
		}else{
			$location = $_SERVER['SCRIPT_NAME'];
		}
		

		if($msg != NULL){
			$_SESSION['msg'] = $msg;

		}

		if($msg_type != NULL){
			$_SESSION['msg_type'] = $msg_type;

		}
		header('Location: '.$location);
		exit;
	}

	function displayMessage(){
		
		if(!empty($_SESSION['msg'])){
			


			$msg = $_SESSION['msg'];

			if(!empty($_SESSION['msg_type'])){
				$msg_type = $_SESSION['msg_type'];
				if($msg_type == 'error'){
					echo '<div class="alert alert-danger">'.$msg.'</div>';
				}else{
					echo '<div class="alert alert-success">'.$msg.'</div>';
				}
			}

			unset($_SESSION['msg']);
			unset($_SESSION['msg_type']);
		}
		else{
			echo '';   
		}
	}

	// function validateMessage(){
		
	// 	if(!empty($_SESSION['validationErr'])){
	// 		echo '<div class="alert alert-danger">Please fill in all fields!</div>';

	// 		unset($_SESSION['validationErr']);
			
	// 	}
	// 	else{
	// 		echo '';   
	// 	}

	// }




?>