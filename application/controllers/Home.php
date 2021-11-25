<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['kuliah'] = $this->Data_m->allData();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}
//menamabah data
	public function tambah()
	{
		
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('input_data');
		$this->load->view('templates/footer');
	 	
	}



	public function upload()
	{
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $prodi = $this->input->post('prodi');
        $nim = $this->input->post('nim');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $deskripsi = $this->input->post('deskripsi');
       	$setuju = $this->input->post('setuju');


		$data['gambar'] = '';
		$gambar = $_FILES['gambar']['name'];
		$config['upload_path'] ='./uploads';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('gambar'))
		{
			echo "Gambar gagal diupload";
		} else {
			$gambar =$this->upload->data('file_name');
			$data = array(
	             'nama_mahasiswa' => $nama_mahasiswa,
                 'prodi' => $prodi,
                 'nim' => $nim,
                 'email' => $email,
                 'password' => $password,
                 'tanggal_lahir' => $tanggal_lahir,
                 'jenis_kelamin' => $jenis_kelamin,
              	 'deskripsi' => $deskripsi,
                 'setuju' => $setuju,
              	 'gambar' => $gambar,
	            );
			
		}
		$this->db->insert('kuliah',$data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data Berhasil Ditambahkan</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		redirect('home');

	}




//mengupdate data
	public function update($id){
		

		$data['item'] =  $this->db->get_where('kuliah',['id_mahasiswa'=>$id])->row();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('update', $data);
		$this->load->view('templates/footer');
		
	}

	public function edit_data($id)
	{	$kondisi = array('id_mahasiswa' => $id );
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $prodi = $this->input->post('prodi');
        $nim = $this->input->post('nim');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $deskripsi = $this->input->post('deskripsi');
       	$setuju = $this->input->post('setuju');

       	$path = './uploads/';

		$data['gambar'] = '';
		$gambar = $_FILES['gambar']['name'];
		$config['upload_path'] ='./uploads';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('gambar'))
		{
			echo "Gambar gagal diupload";
		} else {
			$gambar =$this->upload->data('file_name');
			$data = array(
	             'nama_mahasiswa' => $nama_mahasiswa,
                 'prodi' => $prodi,
                 'nim' => $nim,
                 'email' => $email,
                 'password' => $password,
                 'tanggal_lahir' => $tanggal_lahir,
                 'jenis_kelamin' => $jenis_kelamin,
              	 'deskripsi' => $deskripsi,
                 'setuju' => $setuju,
              	 'gambar' => $gambar,
	            );
			 @unlink($path.$this->input->post('filelama'));
		}
		$this->db->update('kuliah',$data,$kondisi);
		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data Berhasil Diubah</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		redirect('home');

	}


	public function delete($id){
		$this->db->where('id_mahasiswa',$id);
		$this->db->delete('kuliah');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data Berhasil Dihapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		redirect('home');
	}
}
