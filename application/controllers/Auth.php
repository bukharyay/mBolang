<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		// ini_set('display_errors', 'off');
		parent::__construct();
		// $this->is_logged_in();
	}

	// private function is_logged_in()
	// {
	// 	if ($this->session->userdata('id_role') == 1) {
	// 		redirect('admin');
	// 	} else if ($this->session->userdata('id_role') == 2) {
	// 		redirect('user');
	// 	}
	// }


	public function index()
	{
		if ($this->session->userdata('id_role') == 1) {
			redirect('admin');
		} else if ($this->session->userdata('id_role') == 2) {
			redirect('user');
		}

		$data['title'] = 'Login Page';
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/V_login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['email' => $username])->row_array();

		if ($user > 0) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'is_logged_in' => true,
						'id_user' => $user['id_user'],
						'email' => $user['email'],
						'name_user' => $user['name_user'],
						'avatar' => $user['avatar'],
						'id_role' => $user['id_role'],
						'id_kota' => $user['id_kota'],
					];

					$this->session->set_userdata($data);

					if ($user['id_role'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('error2', 'Password salah!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('error', 'User belum diaktifkan!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('error', 'User tidak terdaftar!');
			redirect('auth');
		}
	}

	public function blocked()
	{
		$data['title'] = 'Blocked';
		$this->load->view('auth/V_blocked', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');
		$this->session->unset_userdata('id_kota');
		$this->session->set_flashdata('success', 'Akun ada sudah ter Logout!');
		redirect('home');
	}
}
