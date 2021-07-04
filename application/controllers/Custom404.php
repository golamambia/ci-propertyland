<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom404 extends CI_Controller {

  public function __construct() {

    parent::__construct();

    // load base_url
    $this->load->helper('url');
  }

  public function index(){
 
    $this->output->set_status_header('404'); 
   $data['title']="The Local Browse";
		$this->load->view('header',$data);
    $this->load->view('error404');
     $this->load->view('footer');
 
  }

}