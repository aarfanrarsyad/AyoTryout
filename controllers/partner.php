<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}

	public function setting(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('partner/setting',$data);
		$this->load->view('templates/footer');
	}

}