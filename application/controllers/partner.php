<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function setting(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['partner']=$this->db->get_where('partner',['email'=>$this->session->userdata('email')])->row_array();		
		$data['barang']=$this->db->get_where('barang',['danus'=>$data['partner']['nama_danus']])->result_array();
		// var_dump($data['barang']);die;
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('partner/setting',$data);
		$this->load->view('templates/footer');
	}

	public function addDanus(){
		$data['partner'] = $this->db->get_where('partner',['email'=>$this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('namaDanus','Nama Danus','required|trim');
		$this->form_validation->set_rules('tglMulai','Tanggal Mulai','required');
		$this->form_validation->set_rules('tglSelesai','Tanggal Selesai','required');
		
		$cek = $this->db->get_where('partner',['nama_danus'=>$this->input->post('namaDanus')])->row_array();
		// var_dump($cek);die;

		if ($cek!==NULL) {
			$this->session->set_flashdata('message','<div class="alert alert-warning">Nama Danus sudah ada</div>');
			redirect('partner/setting');
		} else {
			$data = array(
				'nama_danus' => $this->input->post('namaDanus'),
				'status' => 2
				 );
			$this->db->where('email',$this->session->userdata('email'));			
			$this->db->update('partner',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success">Danus berhasil ditambahkan</div>');
			redirect('partner/setting');
		}		
	}//function

	public function editDanus(){
		$data['partner'] = $this->db->get_where('partner',['email'=>$this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('editNamaDanus','Nama Danus');
		$this->form_validation->set_rules('tglMulai','Tanggal Mulai');
		$this->form_validation->set_rules('tglSelesai','Tanggal Selesai');
		$this->form_validation->set_rules('kepentingan','Kepentingan');
		
		$email = $this->session->userdata('email');
		$nama_danus = $this->input->post('editNamaDanus');
		$tgl_mulai = $this->input->post('tglMulai');
		$tgl_selesai = $this->input->post('tglSelesai');
		$kepentingan = $this->input->post('kepentingan');

		if ($tgl_mulai>$tgl_selesai) {
		$this->session->set_flashdata('message','<div class="alert alert-warning">Tanggal mulai harus lebih dekat dari tanggal selesai</div>');
		redirect('partner/setting');
		die;
		}
		// var_dump($tgl_mulai);echo "<br>";
		// var_dump(date('d-m-Y h:i:s'));die;
		// var_dump();echo "<br>";

		$data = array(
			'nama_danus' => $nama_danus,
			'tgl_mulai' => $tgl_mulai,
			'tgl_selesai' => $tgl_selesai,
			'kepentingan' => $kepentingan,
			'status' => 3
			 );
		$this->db->where('email',$email);
		$this->db->update('partner',$data);
		$this->session->set_flashdata('message','<div class="alert alert-success">Danus berhasil diupdate</div>');
		redirect('partner/setting');
				
	}//function

	public function tambah(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['partner'] = $this->db->get_where('partner',['email'=>$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('nama_barang','Nama Barang','required|trim');
		$this->form_validation->set_rules('hargaJual','Harga Jual','required');
		$this->form_validation->set_rules('hargaBeli','Harga Beli','required');


		if(!$this->form_validation->run()){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('partner/tambah',$data);
		$this->load->view('templates/footer');
		}else{
		$danus = $data['partner']['nama_danus'];
		$nama_barang = $this->input->post('nama_barang');
		$harga_beli = $this->input->post('hargaBeli');
		$harga_jual = $this->input->post('hargaJual');
		$gambar1 = $this->input->post('gambar1');
		$gambar2 = $this->input->post('gambar2');
		$gambar3 = $this->input->post('gambar3');
		$varian = $this->input->post('varian');
		$stok = $this->input->post('stok');

		$varian = ($varian=='') ? 'varian' : $varian;
		for ($i=1; $i <(4-1) ; $i++) {
			if ($this->input->post('varian'.$i)!=='') {
				$varian .= '/'.$this->input->post('varian'.$i);
			}
		}//var_dump($varian);die;

			$this->db->set('danus',$danus);
			$this->db->set('nama_barang',$nama_barang);
			$this->db->set('harga_beli',$harga_beli);
			$this->db->set('harga_jual',$harga_jual);
			$this->db->set('gambar1',$gambar1);
			$this->db->set('gambar2',$gambar2);
			$this->db->set('gambar3',$gambar3);
			$this->db->set('varian',$varian);
			$this->db->set('stok',$stok);
			$this->db->insert('barang');

		$this->session->set_flashdata('message','<div class="alert alert-success">Barang ditambahkan</div>');
		redirect('partner/setting#collapseCardBarang');
		}		
	}//function

	public function edit(){
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['partner'] = $this->db->get_where('partner',['email'=>$this->session->userdata('email')])->row_array();
		$data['barang'] = $this->db->get_where('barang',['id'=>$this->uri->segment(3)])->row_array();

		$id=$this->uri->segment(3);

		$this->form_validation->set_rules('email','Email','required|trim');

		if(!$this->form_validation->run()){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('partner/edit',$data);
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
}