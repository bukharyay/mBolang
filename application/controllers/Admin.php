<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
		$this->load->view('admin/V_index', $data);
		$this->load->view('template/V_Footer', $data);
	}

	public function active($id)
	{
		$data = [
			'is_active' => 1
		];
		$this->db->update('tb_user', $data, ['id_user' => $id]);
		$this->session->set_flashdata('success', 'Berhasil mengaktifkan user!');
		redirect('admin/user');
	}

	public function daerah()
	{
		$data['title'] = 'Daerah';
		$data['idDaerah'] = $this->db->get_where('tb_kota', ['id_kota' => $this->session->userdata('id_kota')])->row_array();

		$data['daerah'] = $this->M_Crud->daerah()->result_array();
		$this->form_validation->set_rules('name_kota', 'Nama Daerah', 'trim|required');
		$this->form_validation->set_rules('link', 'Link', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/V_Header', $data);
			$this->load->view('admin/V_daerah', $data);
			$this->load->view('template/V_Footer', $data);
		} else {
			$data = [
				'name_kota' => htmlspecialchars($this->input->post('name_kota', true)),
				'link' => htmlspecialchars($this->input->post('link', true)),
				'description' => htmlspecialchars($this->input->post('description', true)),
			];
			$upload_image = $_FILES['image_kota']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/daerah/';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image_kota')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('image_kota', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				$data = [
					'name_kota' => htmlspecialchars($this->input->post('name_kota', true)),
					'link' => htmlspecialchars($this->input->post('link', true)),
					'description' => htmlspecialchars($this->input->post('description', true)),
					'image_kota' => 'default.jpg'
				];
			}

			$this->db->insert('tb_kota', $data);
			$this->session->set_flashdata('success', 'Berhasil menambah data!');
			redirect('admin/daerah');
		}
	}

	public function daerahEdit($id)
	{
		$data = [
			'name_kota' => htmlspecialchars($this->input->post('name_kota', true)),
			'link' => htmlspecialchars($this->input->post('link', true)),
			'description' => htmlspecialchars($this->input->post('description', true)),
		];
		$upload_image = $_FILES['image_kota']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '5120';
			$config['upload_path'] = './assets/daerah/';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$image = $this->db->get_where('tb_kota', ['id_kota' => $id])->row_array();


			if ($this->upload->do_upload('image_kota')) {
				$old_image = $image['image_kota'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'assets/daerah/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image_kota', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->update('tb_kota', $data, ['id_kota' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Update Data');
		redirect('admin/daerah');
	}

	public function daerahDelete($id)
	{
		$image = $this->db->get_where('tb_kota', ['id_kota' => $id])->row_array();
		$old_image = $image['image_kota'];
		unlink(FCPATH . 'assets/daerah/' . $old_image);
		$this->db->delete('tb_kota', ['id_kota' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Hapus Data');
		redirect('admin/daerah');
	}

	public function user()
	{

		$data['title'] = 'User';
		$data['idDaerah'] = $this->db->get_where('tb_kota', ['id_kota' => $this->session->userdata('id_kota')])->row_array();

		$data['userm'] = $this->M_Crud->user()->result_array();
		$data['daerah'] = $this->M_Crud->get_table('tb_kota')->result_array();
		$this->form_validation->set_rules('name_user', 'Nama', 'trim|required');
		$this->form_validation->set_rules('id_role', 'Role', 'trim|required');
		$this->form_validation->set_rules('id_kota', 'Daerah', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tb_user.email]', ['is_unique' => 'This Email has Already Registered!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/V_Header', $data);
			$this->load->view('admin/V_user', $data);
			$this->load->view('template/V_Footer', $data);
		} else {
			$data = [
				'name_user' => htmlspecialchars($this->input->post('name_user', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' =>  password_hash('12345', PASSWORD_BCRYPT),
				'id_role' => $this->input->post('id_role', true),
				'id_kota' => $this->input->post('id_kota', true),
				'is_active' => 0,
				'date_created' => date('Y-m-d'),
			];
			$upload_image = $_FILES['avatar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/user/';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('avatar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('avatar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				$data = [
					'name_user' => htmlspecialchars($this->input->post('name_user', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'password' =>  password_hash('12345', PASSWORD_BCRYPT),
					'id_role' => $this->input->post('id_role', true),
					'id_kota' => $this->input->post('id_kota', true),
					'is_active' => 0,
					'date_created' => date('Y-m-d'),
					'avatar' => 'default.jpg'
				];
			}

			$this->db->insert('tb_user', $data);
			$this->session->set_flashdata('success', 'Berhasil menambah data!');
			redirect('admin/user');
		}
	}

	public function userEdit($id)
	{
		$data = [
			'name_user' => htmlspecialchars($this->input->post('name_user', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'id_role' => $this->input->post('id_role', true),
			'id_kota' => $this->input->post('id_kota', true),
			'date_created' => date('Y-m-d'),

		];
		$upload_image = $_FILES['avatar']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '5120';
			$config['upload_path'] = './assets/user/';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$image = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();

			if ($this->upload->do_upload('avatar')) {
				$old_image = $image['avatar'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'assets/user/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('avatar', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->update('tb_user', $data, ['id_user' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Update Data');
		redirect('admin/user');
	}

	public function userDelete($id)
	{
		$image = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
		$old_image = $image['avatar'];
		unlink(FCPATH . 'assets/user/' . $old_image);
		$this->db->delete('tb_user', ['id_user' => $id]);
		$this->session->set_flashdata('success', 'Berhasil Hapus Data');
		redirect('admin/user');
	}




	private function is_logged_in()
	{

		$is_logged_in = $this->session->userdata('is_logged_in');
		$role_id = $this->session->userdata('id_role');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('auth');
		}
		if ($role_id != 1) {
			redirect('auth/blocked');
		}
	}
}
