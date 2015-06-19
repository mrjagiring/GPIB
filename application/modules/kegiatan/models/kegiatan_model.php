<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Kegiatan_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	function addKgtn($data)
	{ 
		$this->db->insert('tbl_kegiatan', $data);
		$id = $this->db->insert_id();
	}

	function deleteKgtn($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tbl_kegiatan");
	}
	
	function listKgtn()
	{
		$this->db->order_by('id', 'DESC');
		$result	= $this->db->get('tbl_kegiatan');

		return $result->result();
	}

	function updateKgtn($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_kegiatan', $data); 
	}

	function getKgtn($id)
	{
		$query = $this->db->get_where('tbl_kegiatan', array('id' => $id));
		$row = $query->row_array();
		return $row;
	}
}