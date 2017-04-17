<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak extends CI_Controller {

	public function index($idPegawai)
	{
		
		$this->load->model('pegawai_model');
		$data["anak_list"] = $this->pegawai_model->getAnakByPegawai($idPegawai);
		$this->load->view('anak',$data);	
	
	}

	public function create($idPegawai)
	{
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('pegawai_model');
		if ($this->form_validation->run()==FALSE){
			$this->load->view('tambah_anak_view');
		}
		else {
			$this->pegawai_model->insertAnak($idPegawai);
			$data["pegawai_list"] = $this->pegawai_model->getDataPegawai();	
			$this->load->view('pegawai', $data);
		}
	}

}

/* End of file Anak.php */
/* Location: ./application/controllers/Anak.php */
 ?>