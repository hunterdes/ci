<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Platform extends CI_Controller {

	public function index(){
	
		echo "sergsergsergse";
		
	}
	
	public function gun(){
	
		$data = array(
               'title' => 'Gun game',
               'heading' => 'My Heading',
               'message' => 'My Message'
          ); 
		  $this->load->helper('url');
		  
		
		$this -> load -> view('platform/gun',$data);
	}
	
	public function backgammon(){
	
		$data = array(
               'title' => 'backgammon',
               'heading' => 'My Heading',
               'message' => 'My Message'
          ); 
		$this->load->helper('url');
		  
		
		$this -> load -> view('platform/backgammon',$data);
	}
	
}