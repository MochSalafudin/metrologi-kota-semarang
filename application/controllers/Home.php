<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		#notifikasi
		$this->load->model('model_posting', 'posting');
	}
	public function index()
	{
		    $d['app'] = "Metrologi Kota Semarang";
			$d['title'] = "HomePage";
			#breadcumb
			$d['data_profil'] = $this->posting->get_profil();

			$d['data_timbangan'] = $this->posting->data_kategori_header('Massa Timbangan');
			$d['data_volume'] = $this->posting->data_kategori_header('Volume');
			$d['data_panjang'] = $this->posting->data_kategori_header('Panjang dan Tekanan');
			$d['data_kadar_air'] = $this->posting->kadar_air('22');
		
			$d['data_kategori'] = $this->posting->data_kategori();
			$d['data_jenisall'] = $this->posting->jenis();

			$this->load->view('home', $d);
		
	}
	public function pencarian()
	{
		$id = $this->input->post('id_pencarian');
		    if(!empty($id))
			{
				$d['app'] = "Metrologi Kota Semarang";
				$d['title'] = "Pencarian";
				
				$d['data_jenis'] = $this->posting->data_jenis($id);
				$d['class3'] = $d['data_jenis'][0]['nama_kategori'];
	
				$this->load->view('pencarian', $d);
			}else{
				redirect('home');
			}
		
	}
}
