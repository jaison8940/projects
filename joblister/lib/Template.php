<?php 
class Template{
	protected $template;
	protected $vars = array();
	// Magic methods
	public function __construct($template){
		$this->template = $template;
	}

	public function __get($key){
		return $this->vars[$key];
	}

	public function __set($key,$val){
		$this->vars[$key] = $val;
	}

	public function __toString(){
		extract($this->vars);
		//chdir changes the current directory 
		//dirname returns parent directory
		chdir(dirname($this->template));
		// outputting the template
		ob_start(); // ob_start — Turn on output buffering
		include basename($this->template); // includes the filename, basename returns filename from the path and content of the file will be outputted.
		
		return ob_get_clean(); //  Get current buffer contents and delete current output buffer
	}



}

?>