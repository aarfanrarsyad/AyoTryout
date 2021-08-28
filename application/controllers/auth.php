<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index(){
		if($this->session->userdata('email')){
			redirect('user');
		}

		$this->form_validation->set_rules('email','Email','trim|required|valid_email',[
			'required'=> 'Email wajib diisi',
			'valid_email'=>'Email tidak valid']);
		$this->form_validation->set_rules('password','Password','trim|required',[
			'required'=> 'Password wajib diisi']);
		if($this->form_validation->run()==false){
		$this->load->view('templates/auth_header');
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
		}else{
			$email =$this->input->post('email');
			$password =$this->input->post('password');
			$user=$this->db->get_where('user',['email'=>$email])->row_array();
			if($user){
				if($user['is_active']==1){
					if(password_verify($password, $user['password'])){
						$data=[
							'email'=>$user['email'],
							'role_id'=>$user['role_id'],
							'last_login' => time()
						];

						$this->db->where('email',$email);
						$this->db->update('user',$data);
						$this->session->set_userdata($data);
						if($user['role_id']==1){
							redirect('admin');
						}elseif ($user['role_id']==2) {
							redirect('user');
						}else{
							redirect('user');						
						}

					}else{
						$this->session->set_flashdata('message','<div class="alert alert-danger">email atau password salah</div>');
					}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger">Email belum aktif, Silahkan hubungi admin</div>');
				}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger">Email belum terdaftar</div>');
			}
		redirect('auth');
		}
	}

	public function registration(){
		if($this->session->userdata('email')){
			redirect('user');
		}
		$this->form_validation->set_rules('name','Name','required|trim',[
			'required'=> 'Nama wajib diisi']);
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'required'=> 'Email wajib diisi',
			'valid_email'=>'Email tidak valid',
			'is_unique'=>'Email sudah terdaftar']);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
			'required'=> 'Password wajib diisi',
			'matches'=> 'Password tidak sama',
			'min_length'=>'Terlalu pendek']);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');


		if(!$this->form_validation->run()){	
		$this->load->view('templates/auth_header');
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');
		}else{
			$data =[
				'name' => htmlspecialchars($this->input->post('name',true)),
				'email'=> htmlspecialchars($this->input->post('email',true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 0,
				'date_created'=>time()
			];


		$this->db->insert('user',$data);
		$this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Registrasi, Mohon tunggu konfirmasi</div>');
		redirect('auth');
		}
	}


		public function logout(){
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');
			$this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Logout</div>');
		redirect('auth');
		}


	
}