<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*	Inventory model
*
*/
class Export_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->datas_table      = 'inv_datas';
		$this->locations_table  = 'inv_locations';
		$this->category_table  = 'inv_categories';
		$this->status_table     = 'inv_status';
		$this->users_table      = 'users';
		$this->loggedinuser     = $this->ion_auth->user()->row();
	}

	public function get_inventory($id='',$limit='', $start='')
	{
		$this->db->select(
			$this->datas_table.".id, ".
			$this->datas_table.".code, ".
			$this->datas_table.".category_id, ".
			$this->category_table.".name AS categories_name, ".
			$this->datas_table.".brand, ".
			$this->datas_table.".satuan, ".
			$this->datas_table.".dasar, ".
			$this->datas_table.".grosir, ".
			$this->datas_table.".ecer, ".
			$this->datas_table.".awal, ".
			$this->datas_table.".masuk, ".
			$this->datas_table.".keluar, ".
			$this->datas_table.".akhir, ".
			$this->datas_table.".deleted, ".
			$this->users_table.".username, ".
			$this->users_table.".first_name, ".
			$this->users_table.".last_name"
		);
		$this->db->from($this->datas_table);


		// join category table
		$this->db->join(
			$this->category_table,
			$this->datas_table.'.category_id = '.$this->category_table.'.id',
			'left');

		// join user table
		$this->db->join(
			$this->users_table,
			$this->datas_table.'.created_by = '.$this->users_table.'.username',
			'left');

		$this->db->where($this->datas_table.'.deleted', '0');

		// if ID provided
		if ($id!='') {
			$this->db->where($this->datas_table.'.id', $id);
		}

		// if limit and start provided
		if ($limit!="") {
			$this->db->limit($limit, $start);
		}

		// order by
		$this->db->order_by($this->datas_table.'.id', 'asc');
		$datas = $this->db->get();
		return $datas;
	}
}