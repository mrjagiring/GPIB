<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Sbu_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	function addSbu($data)
	{ 
		$this->db->insert('tbl_sbu', $data);
		$id = $this->db->insert_id();
	}

	function deleteSbu($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tbl_sbu");
	}
	
	function listSbu()
	{
		$this->db->order_by('tanggal', 'DESC');
		$result	= $this->db->get('tbl_sbu');

		return $result->result();
	}

	function updateSbu($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_sbu', $data); 
	}

	function getSbu($id)
	{
		$query = $this->db->get_where('tbl_sbu', array('id' => $id));
		$row = $query->row_array();
		return $row;
	}
}