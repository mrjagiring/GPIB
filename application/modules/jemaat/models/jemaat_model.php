<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Jemaat_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	function addJemaat($data)
	{
		$this->db->insert('tbl_jemaat', $data);
		$id = $this->db->insert_id();
	}

	function deleteJemaat($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tbl_jemaat");
	}
	
	function listJemaat()
	{
		$data = $this->db->get('tbl_jemaat')->result();
		return $data;
	}

	function updateJemaat($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_jemaat', $data); 
	}

	function getJemaat($id)
	{
		$query = $this->db->get_where('tbl_jemaat', array('id' => $id));
		$row = $query->row_array();
		return $row;
	}
}