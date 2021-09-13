<?php
class Excel_import_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->categories_table = 'inv_categories';
		$this->datas_table      = 'inv_datas';
		$this->users_table      = 'users';
		$this->loggedinuser     = $this->ion_auth->user()->row();
	}

	function select()
	{
		$this->db->order_by('code', 'DESC');
		$query = $this->db->get('inv_datas');
		return $query;
	}

	function selectSS()
	{
		$this->db->order_by('code', 'DESC');
		$query = $this->db->get('inv_categories');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch($this->datas_table, $data);
	}

	function insertSS($data)
	{
		$this->db->insert_batch($this->categories_table, $data);
	}
}
?>