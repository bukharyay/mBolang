<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		// ini_set('display_errors', 'off');
		parent::__construct();
	}
	public function index()
	{

		$this->load->view('welcome_message');
	}
	public function test()
	{
		$this->load->view('welcome_message');
	}
}
