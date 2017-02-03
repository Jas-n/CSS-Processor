<?php namespace Jas_n;
include('../../../FUNCTIONS/CORE/print_pre.php'); # For debugging purposes
class css_processor{
	/**
		Combined defaults and constructor variables
	*/
	private $args=array();
	/**
		Default file processing
	*/
	private $defaults=array(
		'minify'	=>true,			# Minify the CSS
		'output'	=>'download',	# What to do when processing is complete
		'output_dir'=>'',			# The destination to save the processed CSS
	);
	/**
		List of files/data to process
	*/
	private $files=array();
	/**
		List of messages
	*/
	private $messages=array(
		'errors' =>array(),
		'success'=>array()
	);
	public function __construct($options=NULL){
		if(is_array($args)){
			$this->args=array_merge($this->defaults,$args);
		}else{
			$this->args=$this->defaults;
		}
		print_pre($this->args);
	}
	/**
		Add CSS text to process
	*/
	public function add_text($text){
	}
	/**
		Add a file to process
	*/
	public function add_file($file){
		/* Check against:
		- Whether the file exists
		- Whether the extension is a .css
		- Whether the file type is css*/
	}
	/**
		Get messages captured during processing
	*/
	public function get_messages(){
		print_pre($this->messages);
	}
	/**
		Process the files
		- This method handles the return messages
	*/
	public function process($browsers){
		# Check whether files/text has been added
		if(sizeof($this->files)===0){
			$this->messages['errors'][]='No files/CSS has been added.';
			return false;
		}
		# Process which browsers to add prefixes for
		switch($browsers){
			case 'bootstrap-3':
				break;
			case 'bootstrap-4':
				break;
		}
		$this->messages['success'][]='Using browser set '.$browsers;
		/*
			- Get caniusedata if current data is over a day old
		*/
		# Minify
		if($this->args['minify']){
			$css=$this->minify($css);
		}
		# Output
		switch($this->args['output']){
			case 'dir':
				if(!$this->args['output_dir']){
					$this->messages['errors'][]='Output directory is not defined.';
					return false;
				}
				break;
			case 'download':
				break;
			case 'text':
				break;
			default:
				$this->messages['errors'][]='Output is incorrectly defined.';
				return false;
				break;
		}
	}
	/**
		Minify compiled css
	*/
	private function minify($css){
		# Strip comments
		$css=preg_replace('!/\*.*?\*/!s','', $css);
		$css=preg_replace('/\n\s*\n/',"\n", $css);
		# Minify
		$css=preg_replace('/[\n\r \t]/',' ', $css);
		$css=preg_replace('/ +/',' ', $css);
		$css=preg_replace('/ ?([,:;{}]) ?/','$1',$css);
		# Remove trailing semicolon
		$css=preg_replace('/;}/','}',$css);
		return $css;
	}
}