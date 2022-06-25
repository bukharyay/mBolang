<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_crud extends CI_Model
{
	public function __construct()
	{
		// ini_set('display_errors', 'off');
		parent::__construct();
	}

	function home_daerah($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kota');
		$this->db->where('id_kota', $id);
		return $this->db->get();
	}

	function home_wisata($id)
	{
		$this->db->select('*');
		$this->db->from('tb_wisata');
		$this->db->where('id_kota', $id);
		return $this->db->get();
	}

	function detail_wisata($id)
	{
		$this->db->select('*');
		$this->db->from('tb_wisata');
		$this->db->where('id_wisata', $id);
		return $this->db->get();
	}

	function home_kuliner($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kuliner');
		$this->db->where('id_kota', $id);
		return $this->db->get();
	}

	function detail_kuliner($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kuliner');
		$this->db->where('id_kuliner', $id);
		return $this->db->get();
	}

	function home_budaya($id)
	{
		$this->db->select('*');
		$this->db->from('tb_budaya');
		$this->db->where('id_kota', $id);
		return $this->db->get();
	}

	function detail_budaya($id)
	{
		$this->db->select('*');
		$this->db->from('tb_budaya');
		$this->db->where('id_budaya', $id);
		return $this->db->get();
	}

	function home_kerajinan($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kerajinan');
		$this->db->where('id_kota', $id);
		return $this->db->get();
	}

	function detail_kerajinan($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kerajinan');
		$this->db->where('id_kerajinan', $id);
		return $this->db->get();
	}

	function get_table($table)
	{
		return $this->db->get($table);
	}


	function daerah()
	{
		$this->db->select('*');
		$this->db->from('tb_kota');
		// $this->db->join('tb_kota', 'tb_user.id_kota = tb_kota.id_kota', 'left');
		return $this->db->get();
	}



	function user()
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->join('tb_kota', 'tb_user.id_kota = tb_kota.id_kota', 'left');
		return $this->db->get();
	}

	function budaya()
	{
		$this->db->select('*');
		$this->db->from('tb_budaya');
		$this->db->join('tb_kota', 'tb_budaya.id_kota = tb_kota.id_kota');
		return $this->db->get();
	}
	function user_budaya($id)
	{
		$this->db->select('*');
		$this->db->from('tb_budaya');
		$this->db->join('tb_kota', 'tb_budaya.id_kota = tb_kota.id_kota');
		$this->db->where('tb_budaya.id_kota', $id);
		return $this->db->get();
	}

	function wisata()
	{
		$this->db->select('*');
		$this->db->from('tb_wisata');
		$this->db->join('tb_kota', 'tb_wisata.id_kota = tb_kota.id_kota');
		return $this->db->get();
	}

	function user_wisata($id)
	{
		$this->db->select('*');
		$this->db->from('tb_wisata');
		$this->db->join('tb_kota', 'tb_wisata.id_kota = tb_kota.id_kota');
		$this->db->where('tb_wisata.id_kota', $id);

		return $this->db->get();
	}

	function kuliner()
	{
		$this->db->select('*');
		$this->db->from('tb_kuliner');
		$this->db->join('tb_kota', 'tb_kuliner.id_kota = tb_kota.id_kota');
		return $this->db->get();
	}

	function user_kuliner($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kuliner');
		$this->db->join('tb_kota', 'tb_kuliner.id_kota = tb_kota.id_kota');
		$this->db->where('tb_kuliner.id_kota', $id);
		return $this->db->get();
	}

	function kerajinan()
	{
		$this->db->select('*');
		$this->db->from('tb_kerajinan');
		$this->db->join('tb_kota', 'tb_kerajinan.id_kota = tb_kota.id_kota');
		return $this->db->get();
	}

	function user_kerajinan($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kerajinan');
		$this->db->join('tb_kota', 'tb_kerajinan.id_kota = tb_kota.id_kota');
		$this->db->where('tb_kerajinan.id_kota', $id);
		return $this->db->get();
	}
}
