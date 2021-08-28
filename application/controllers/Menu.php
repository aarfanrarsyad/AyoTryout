<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		is_logged_in();
	}
	public function index(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();		
		$data['apply']=$this->db->get('partner')->result_array();
		$data['userAll']=$this->db->get('user')->result_array();
		
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('menu/index',$data);
			$this->load->view('templates/footer');
	}

 //  	public function submenu(){
 //  	$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
 //  	$this->load->model('Menu_model','menu');
	// $data['subMenu']=$this->menu->getSubMenu();
	// $data['menu']=$this->db->get('user_menu')->result_array();
	// $this->form_validation->set_rules('title','Title','required');
	// $this->form_validation->set_rules('menu_id','Menu','required');
	// $this->form_validation->set_rules('url','url','required');
	// $this->form_validation->set_rules('icon','icon','required');

	// if($this->form_validation->run()==false){
	// 	$this->load->view('templates/header',$data);
	// 	$this->load->view('templates/sidebar',$data);
	// 	$this->load->view('templates/topbar',$data);
	// 	$this->load->view('menu/submenu',$data);
	// 	$this->load->view('templates/footer');
	// }else{
	// 	$data=[
	// 		'title'=>$this->input->post('title'),
	// 		'menu_id'=>$this->input->post('menu_id'),
	// 		'url'=>$this->input->post('url'),
	// 		'icon'=>$this->input->post('icon'),
	// 		'is_active'=>$this->input->post('is_active')
	// 	];
	// 	$this->db->insert('user_sub_menu',$data);
	// 	$this->session->set_flashdata('message','
 //                <div class="alert alert-succes">SubMenu berhasil ditambahkan!</div>');
	// 	redirect('menu/submenu');
	// }
 //  }

	public function edit(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		$id=$this->uri->segment(3);
		$data['edit']=$this->db->get_where('user',['id'=>$id])->row_array();

		$this->form_validation->set_rules('email','Email','required|trim');

		if(!$this->form_validation->run()){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('menu/edit',$data);
		$this->load->view('templates/footer');
		}else{
			$email=$this->input->post('email');
			$name=$this->input->post('name');
			$nowa=$this->input->post('nowa');
			$kelas=$this->input->post('kelas');
			$role_id=$this->input->post('role_id');
			$image=$this->input->post('image');
			$is_active=$this->input->post('is_active');


			$this->db->set('name',$name);
			$this->db->set('nowa',$nowa);
			$this->db->set('kelas',$kelas);
			$this->db->set('is_active',$is_active);
			$this->db->set('role_id',$role_id);
			$this->db->set('image',$image);
			$this->db->where('email',$email);
			$this->db->update('user');

		$this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil diubah</div>');
		redirect('menu');
		}
	}

	public function hapus(){

		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete('user');
		$this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil diubah</div>');
		redirect('menu');
		
	}

	public function approv(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		$this->db->set('status',1);
		$this->db->where('id',$this->uri->segment(3));
		$this->db->update('partner');

		$nowa = $this->uri->segment(4);
        $user = $this->db->query("SELECT * FROM `user` WHERE `nowa` = $nowa")->row_array();
        $role_id = $user['role_id']==1?1:2;

		$this->db->set('role_id',$role_id);
		$this->db->where('id',$user['id']);
		$this->db->update('user');

		redirect('admin');
	}


}//control