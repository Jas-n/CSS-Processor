<?php namespace Jas_n;
class css_processor{
	/**
		Combined defaults and constructor variables
	*/
	private $args=array();
	/**
		Default file processing
	*/
	private $defaults=array(
		'minify'=>true	# Minify the CSS
	);
	/**
		List of files to process
	*/
	private $files;
	public function __construct($args=NULL){
		if(is_array($args)){
			$this->args=array_merge($this->defaults,$args);
		}else{
			$this->args=$this->defaults;
		}
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
		Process the files
	*/
	public function process($browsers){
		switch($browsers){
			case 'bootstrap-3':
				break;
			case 'bootstrap-4':
				break;
			default:
				break;
		}
	}
	/**
		Minify compiled css
	*/
	private function minify($css){
		
	}
}