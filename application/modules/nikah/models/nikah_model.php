<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Nikah_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	function addNikah($data)
	{
		$this->db->insert('tbl_nikah', $data);
		$id = $this->db->insert_id();
	}

	function deleteNikah($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tbl_nikah");
	}
	
	function listNikah()
	{
		$data = $this->db->get('tbl_nikah')->result();
		return $data;
	}

	function updateNikah($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_nikah', $data); 
	}

	function getNikah($id)
	{
		$query = $this->db->get_where('tbl_nikah', array('id' => $id));
		$row = $query->row_array();
		return $row;
	}
}