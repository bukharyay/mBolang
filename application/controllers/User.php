<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		// ini_set('display_errors', 'off');
		parent::__construct();
		$this->is_logged_in();
	}
	public function index()
	{

		$data['title'] = 'Dashboard';
		$data['idDaerah'] = $this->db->get_where('tb_kota', ['id_kota' => $this->session->userdata('id_kota')])->row_array();
		$this->load->view('template/V_Header', $data);
		$this->load->view('user/V_index', $data);
		$this->load->view('template/V_Footer', $data);
	}

	public function budaya()
	{
		$data['title'] = 'Budaya';
		$data['idDaerah'] = $this->db->get_where('tb_kota', ['id_kota' => $this->session->userdata('id_kota')])->row_array();
		$data['daerah'] = $this->M_Crud->get_table('tb_kota')->result_array();

		if ($this->session->userdata('id_role') == 1) {
			$data['budaya'] = $this->M_Crud->budaya()->result_array();
		} else {
			$data['budaya'] = $this->M_Crud->user_budaya($this->session->userdata('id_kota'))->result_array();
		}



		$this->form_validation->set_rules('name_budaya', 'Nama Budaya', 'trim|required');
		$this->form_validation->set_rules('id_kota', 'Daerah', 'trim|required');
		$this->form_validation->set_rules('description_budaya', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/V_Header', $data);
			$this->load->view('user/V_budaya', $data);
			$this->load->view('template/V_Footer', $data);
		} else {
			$data = [
				'name_budaya' => htmlspecialchars($this->input->post('name_budaya', true)),
				'description_budaya' => htmlspecialchars($this->input->post('description_budaya', true)),
				'id_kota' => $this->input->post('id_kota', true),
				'date_created' => date('Y-m-d'),
			];
			$upload_image = $_FILES['image_budaya']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/budaya/';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image_budaya')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('image_budaya', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				$data = [
					'name_budaya' => htmlspecialchars($this->input->post('name_budaya', true)),
					'description_budaya' => htmlspecialchars($this->input->post('description_budaya', true)),
					'id_kota' => $this->input->post('id_kota', true),
					'date_created' => date('Y-m-d'),
					'image_budaya' => 'default.jpg'
				];
			}

			$this->db->insert('tb_budaya', $data);
			$this->session->set_flashdata('success', 'Berhasil menambah data!');
			redirect('user/budaya');
		}
	}

	public function budayaEdit($id)
	{
		$data = [
			'name_budaya' => htmlspecialchars($this->input->post('name_budaya', true)),
			'description_budaya' => htmlspecialchars($this->input->post('description_budaya', true)),
			'id_kota' => $this->input->post('id_kota'),
			'date_created' => date('Y-m-d')
		];
		$upload_image = $_FILES['image_budaya']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '5120';
			$config['upload_path'] = './assets/budaya/';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$image = $this->db->get_where('tb_budaya', ['id_budaya' => $id])->row_array();

			if ($this->upload->do_upload('image_budaya')) {
				$old_image = $image['image_budaya'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'assets/budaya/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image_budaya', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->update('tb_budaya', $data, ['id_budaya' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Update Data');
		redirect('user/budaya');
	}

	public function budayaDelete($id)
	{
		$image = $this->db->get_where('tb_budaya', ['id_budaya' => $id])->row_array();
		$old_image = $image['image_kota'];
		unlink(FCPATH . 'assets/budaya/' . $old_image);
		$this->db->delete('tb_budaya', ['id_budaya' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Hapus Data');
		redirect('user/budaya');
	}

	public function kerajinan()
	{
		$data['title'] = 'Kerajinan';
		$data['idDaerah'] = $this->db->get_where('tb_kota', ['id_kota' => $this->session->userdata('id_kota')])->row_array();
		$data['daerah'] = $this->M_Crud->daerah()->result_array();
		if ($this->session->userdata('id_role') == 1) {
			$data['kerajinan'] = $this->M_Crud->kerajinan()->result_array();
		} else {
			$data['kerajinan'] = $this->M_Crud->user_kerajinan($this->session->userdata('id_kota'))->result_array();
		}


		$this->form_validation->set_rules('name_kerajinan', 'Nama Kerajinan', 'trim|required');
		$this->form_validation->set_rules('id_kota', 'Daerah', 'trim|required');
		$this->form_validation->set_rules('description_kerajinan', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/V_Header', $data);
			$this->load->view('user/V_Kerajinan', $data);
			$this->load->view('template/V_Footer', $data);
		} else {
			$data = [
				'name_kerajinan' => htmlspecialchars($this->input->post('name_kerajinan', true)),
				'description_kerajinan' => htmlspecialchars($this->input->post('description_kerajinan', true)),
				'id_kota' => $this->input->post('id_kota'),
				'date_created' => date('Y-m-d')
			];
			$upload_image = $_FILES['image_kerajinan']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/kerajinan/';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image_kerajinan')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('image_kerajinan', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				$data = [
					'name_kerajinan' => htmlspecialchars($this->input->post('name_kerajinan', true)),
					'description_kerajinan' => htmlspecialchars($this->input->post('description_kerajinan', true)),
					'id_kota' => $this->input->post('id_kota'),
					'date_created' => date('Y-m-d'),
					'image_kerajinan' => 'default.jpg'
				];
			}

			$this->db->insert('tb_kerajinan', $data);
			$this->session->set_flashdata('success', 'Berhasil menambah data!');
			redirect('user/kerajinan');
		}
	}

	public function kerajinanEdit($id)
	{
		$data = [
			'name_kerajinan' => htmlspecialchars($this->input->post('name_kerajinan', true)),
			'description_kerajinan' => htmlspecialchars($this->input->post('description_kerajinan', true)),
			'id_kota' => $this->input->post('id_kota'),
			'date_created' => date('Y-m-d')
		];
		$upload_image = $_FILES['image_kerajinan']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '5120';
			$config['upload_path'] = './assets/kerajinan/';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$image = $this->db->get_where('tb_kerajinan', ['id_kerajinan' => $id])->row_array();

			if ($this->upload->do_upload('image_kerajinan')) {
				$old_image = $image['image_kerajinan'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'assets/kerajinan/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image_kerajinan', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->update('tb_kerajinan', $data, ['id_kerajinan' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Update Data');
		redirect('user/kerajinan');
	}

	public function kerajinanDelete($id)
	{
		$image = $this->db->get_where('tb_kerajinan', ['id_kerajinan' => $id])->row_array();
		$old_image = $image['image_kota'];
		unlink(FCPATH . 'assets/kerajinan/' . $old_image);
		$this->db->delete('tb_kerajinan', ['id_kerajinan' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Hapus Data');
		redirect('user/kerajinan');
	}

	public function wisata()
	{
		$data['title'] = 'Wisata';
		$data['idDaerah'] = $this->db->get_where('tb_kota', ['id_kota' => $this->session->userdata('id_kota')])->row_array();
		$data['daerah'] = $this->M_Crud->daerah()->result_array();
		if ($this->session->userdata('id_role') == 1) {
			$data['wisata'] = $this->M_Crud->wisata()->result_array();
		} else {
			$data['wisata'] = $this->M_Crud->user_wisata($this->session->userdata('id_kota'))->result_array();
		}


		$this->form_validation->set_rules('name_wisata', 'Nama Wisata', 'trim|required');
		$this->form_validation->set_rules('id_kota', 'Daerah', 'trim|required');
		$this->form_validation->set_rules('description_wisata', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('link', 'Link', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/V_Header', $data);
			$this->load->view('user/V_wisata', $data);
			$this->load->view('template/V_Footer', $data);
		} else {
			$data = [
				'name_wisata' => htmlspecialchars($this->input->post('name_wisata', true)),
				'description_wisata' => htmlspecialchars($this->input->post('description_wisata', true)),
				'link' => htmlspecialchars($this->input->post('link', true)),
				'id_kota' => $this->input->post('id_kota'),
				'date_created' => date('Y-m-d')
			];
			$upload_image = $_FILES['image_wisata']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/wisata/';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image_wisata')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('image_wisata', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				$data = [
					'name_wisata' => htmlspecialchars($this->input->post('name_wisata', true)),
					'description_wisata' => htmlspecialchars($this->input->post('description_wisata', true)),
					'link' => htmlspecialchars($this->input->post('link', true)),
					'id_kota' => $this->input->post('id_kota'),
					'date_created' => date('Y-m-d'),
					'image_wisata' => 'default.jpg'
				];
			}

			$this->db->insert('tb_wisata', $data);
			$this->session->set_flashdata('success', 'Berhasil menambah data!');
			redirect('user/wisata');
		}
	}

	public function wisataEdit($id)
	{
		$data = [
			'name_wisata' => htmlspecialchars($this->input->post('name_wisata', true)),
			'description_wisata' => htmlspecialchars($this->input->post('description_wisata', true)),
			'link' => htmlspecialchars($this->input->post('link', true)),
			'id_kota' => $this->input->post('id_kota'),
			'date_created' => date('Y-m-d')
		];
		$upload_image = $_FILES['image_wisata']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '5120';
			$config['upload_path'] = './assets/wisata/';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$image = $this->db->get_where('tb_wisata', ['id_wisata' => $id])->row_array();

			if ($this->upload->do_upload('image_wisata')) {
				$old_image = $image['image_wisata'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'assets/wisata/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image_wisata', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->update('tb_wisata', $data, ['id_wisata' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Update Data');
		redirect('user/wisata');
	}

	public function wisataDelete($id)
	{
		$image = $this->db->get_where('tb_wisata', ['id_wisata' => $id])->row_array();
		$old_image = $image['image_kota'];
		unlink(FCPATH . 'assets/wisata/' . $old_image);
		$this->db->delete('tb_wisata', ['id_wisata' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Hapus Data');
		redirect('user/wisata');
	}

	public function kuliner()
	{
		$data['title'] = 'Kuliner';
		$data['idDaerah'] = $this->db->get_where('tb_kota', ['id_kota' => $this->session->userdata('id_kota')])->row_array();
		$data['daerah'] = $this->M_Crud->daerah()->result_array();
		if ($this->session->userdata('id_role') == 1) {
			$data['kuliner'] = $this->M_Crud->kuliner()->result_array();
		} else {
			$data['kuliner'] = $this->M_Crud->user_kuliner($this->session->userdata('id_kota'))->result_array();
		}

		$this->form_validation->set_rules('name_kuliner', 'Nama Kuliner', 'trim|required');
		$this->form_validation->set_rules('id_kota', 'Daerah', 'trim|required');
		$this->form_validation->set_rules('description_kuliner', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/V_Header', $data);
			$this->load->view('user/V_kuliner', $data);
			$this->load->view('template/V_Footer', $data);
		} else {
			$data = [
				'name_kuliner' => htmlspecialchars($this->input->post('name_kuliner', true)),
				'description_kuliner' => htmlspecialchars($this->input->post('description_kuliner', true)),
				'id_kota' => $this->input->post('id_kota'),
				'date_created' => date('Y-m-d')
			];
			$upload_image = $_FILES['image_kuliner']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/kuliner/';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image_kuliner')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('image_kuliner', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				$data = [
					'name_kuliner' => htmlspecialchars($this->input->post('name_kuliner', true)),
					'description_kuliner' => htmlspecialchars($this->input->post('description_kuliner', true)),
					'id_kota' => $this->input->post('id_kota'),
					'date_created' => date('Y-m-d'),
					'image_kuliner' => 'default.jpg'
				];
			}

			$this->db->insert('tb_kuliner', $data);
			$this->session->set_flashdata('success', 'Berhasil menambah data!');
			redirect('user/kuliner');
		}
	}

	public function kulinerEdit($id)
	{
		$data = [
			'name_kuliner' => htmlspecialchars($this->input->post('name_kuliner', true)),
			'description_kuliner' => htmlspecialchars($this->input->post('description_kuliner', true)),
			'id_kota' => $this->input->post('id_kota'),
			'date_created' => date('Y-m-d')
		];
		$upload_image = $_FILES['image_kuliner']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '5120';
			$config['upload_path'] = './assets/kuliner/';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$image = $this->db->get_where('tb_kuliner', ['id_kuliner' => $id])->row_array();

			if ($this->upload->do_upload('image_kuliner')) {
				$old_image = $image['image_kuliner'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'assets/kuliner/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image_kuliner', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->update('tb_kuliner', $data, ['id_kuliner' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Update Data');
		redirect('user/kuliner');
	}

	public function kulinerDelete($id)
	{
		$image = $this->db->get_where('tb_kuliner', ['id_kuliner' => $id])->row_array();
		$old_image = $image['image_kota'];
		unlink(FCPATH . 'assets/kuliner/' . $old_image);
		$this->db->delete('tb_kuliner', ['id_kuliner' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Hapus Data');
		redirect('user/kuliner');
	}

	private function is_logged_in()
	{

		$is_logged_in = $this->session->userdata('is_logged_in');
		$role_id = $this->session->userdata('id_role');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('auth');
		}
	}
}
