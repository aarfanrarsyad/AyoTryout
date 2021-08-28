<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}

	public function index(){
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$email = $this->session->userdata('email');
		$queryPartner = "SELECT `name`,`nowa`,`nama_danus`,`status`,`partner`.`id`
	                     FROM `user` JOIN `partner`
    	                 ON `user`.`email`=`partner`.`email`
    	                 WHERE `partner`.`status`= 0 OR `partner`.`status`= 2
            	         ORDER BY `partner`.`status` ASC";
        $data['partner'] =$this->db->query($queryPartner)->result_array();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('templates/footer');
	}

}