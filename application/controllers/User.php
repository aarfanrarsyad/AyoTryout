<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		is_logged_in();
	}
	public function index(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['danus']=$this->db->get_where('partner',['email'=>$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/index',$data);
		$this->load->view('templates/footer');
	}
	public function edit(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('name','Nama','required|trim');
		if(!$this->form_validation->run()){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/edit',$data);
		$this->load->view('templates/footer');
		}else{
			$email=$this->input->post('email');
			$name=$this->input->post('name');
			$nowa=$this->input->post('nowa');
			$kelas=$this->input->post('kelas');

			$nowa = (strpos($nowa, "+62")==0)?str_replace("+62","62",$nowa):$nowa;
			$str = str_split($nowa);			
            if ($str[0]=='0') {
            	$str[0]='62';
                $nowa='';
                foreach ($str as $digit ) $nowa .= $digit;
			}

			$this->db->set('name',$name);
			$this->db->set('nowa',$nowa);
			$this->db->set('kelas',$kelas);
			$this->db->where('email',$email);
			$this->db->update('user');

		$this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil diubah</div>');
		redirect('user');
		}
	}
	public function password(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('password','Password','required|trim',[
			'required'=> 'Password wajib diisi']);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',[
			'required'=> 'Password wajib diisi',
			'min_length'=>'Terlalu pendek',
			'matches'=> 'Password tidak sama']);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]',[
			'required'=> 'Password wajib diisi',
			'min_length'=>'Terlalu pendek',
			'matches'=> 'Password tidak sama']);
		if($this->form_validation->run()==false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/password',$data);
		$this->load->view('templates/footer');
		}else{
			$currPswrd=$this->input->post('password');
			$newPswrd=$this->input->post('password1');
			if(!password_verify($currPswrd, $data['user']['password'])){
			$this->session->set_flashdata('message','<div class="alert alert-danger">Password gagal diubah</div>');
			redirect('user/password');	
			}else{
				$password_hash=password_hash($newPswrd, PASSWORD_DEFAULT);
				$this->db->set('password',$password_hash);
				$this->db->where('email',$this->session->userdata('email'));
				$this->db->update('user');
				$this->session->set_flashdata('message','<div class="alert alert-success">Password berhasil diubah</div>');
			redirect('user');
			}
		}
	}

	public function apply(){		
		$nowa=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array()['nowa'];
		if ($nowa==NULL||$nowa=='62') {
			$this->session->set_flashdata('message','<div class="alert alert-warning">Lengkapi data terlebih dahulu</div>');
			redirect('user');
		} else {
			$data =[
				'email'=> $this->session->userdata('email'),
				'status'=> 0
			];
			$this->db->insert('partner',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success">Dalam proses</div>');
			redirect('user');
		}
	}
}