<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Danus extends CI_Controller {

	public function index(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		
		// $this->load->view('templates/header',$data);
		$this->load->view('templates/header_danus',$data);
		// $this->load->view('templates/sidebar',$data);
		// $this->load->view('templates/topbar',$data);
		$this->load->view('danus/index',$data);
		$this->load->view('templates/footer');
	}


}