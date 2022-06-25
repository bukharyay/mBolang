<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		ini_set('display_errors', 'off');
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Selamat Datang';
		$data['daerah'] = $this->M_Crud->daerah()->result_array();
		$data['budaya'] = $this->M_Crud->budaya()->result_array();
		$data['kerajinan'] = $this->M_Crud->kerajinan()->result_array();
		$data['wisata'] = $this->M_Crud->wisata()->result_array();
		$data['kuliner'] = $this->M_Crud->kuliner()->result_array();

		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/index', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function daerah()
	{

		$data['title'] = 'Daerah';
		$data['daerah'] = $this->M_Crud->daerah()->result_array();

		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_daerah', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function detail_daerah($id)
	{

		$data['title'] = 'Daerah';
		$data['daerah'] = $this->M_Crud->home_daerah($id)->row_array();

		$data['budaya'] = $this->M_Crud->home_budaya($id)->result_array();
		$data['kerajinan'] = $this->M_Crud->home_kerajinan($id)->result_array();
		$data['wisata'] = $this->M_Crud->home_wisata($id)->result_array();
		$data['kuliner'] = $this->M_Crud->home_kuliner($id)->result_array();

		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_detailDaerah', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function wisata()
	{
		$data['title'] = 'Wisata';
		$data['wisata'] = $this->M_Crud->wisata()->result_array();

		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_wisata', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function detail_wisata($id)
	{

		$data['title'] = 'Wisata';
		$data['wisata'] = $this->M_Crud->detail_wisata($id)->row_array();

		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_detailWisata', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function kuliner()
	{

		$data['title'] = 'Kuliner';
		$data['kuliner'] = $this->M_Crud->kuliner()->result_array();

		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_kuliner', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function detail_kuliner($id)
	{

		$data['title'] = 'Kuliner';
		$data['kuliner'] = $this->M_Crud->detail_kuliner($id)->row_array();
		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_detailKuliner', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function budaya()
	{

		$data['title'] = 'Budaya';
		$data['budaya'] = $this->M_Crud->budaya()->result_array();

		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_budaya', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function detail_budaya($id)
	{

		$data['title'] = 'Budaya';
		$data['budaya'] = $this->M_Crud->detail_budaya($id)->row_array();
		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_detailBudaya', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function kerajinan()
	{

		$data['title'] = 'Kerajinan';
		$data['kerajinan'] = $this->M_Crud->kerajinan()->result_array();
		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_kerajinan', $data);
		$this->load->view('template/V_Fhome', $data);
	}

	public function detail_kerajinan($id)
	{

		$data['title'] = 'Kerajinan';
		$data['kerajinan'] = $this->M_Crud->detail_kerajinan($id)->row_array();
		$this->load->view('template/V_Hhome', $data);
		$this->load->view('home/V_detailKerajinan', $data);
		$this->load->view('template/V_Fhome', $data);
	}
}
