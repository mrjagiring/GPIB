<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Page_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	function addPage($data)
	{
		$this->db->insert('tbl_page', $data);
		$id = $this->db->insert_id();
	}

	function deletePage($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tbl_page");
	}
	
	function listPage()
	{
		$menu = $this->db->get('tbl_page')->result();
		return $menu;
	}

	function updatePage($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_page', $data); 
	}

	function rootPage()
	{
		$this->db->where('parent_id', 0);
		$menu = $this->db->get('tbl_page')->result();
		return $menu;
	}
	
	function manualQuery($datainput)
	{
		$sql = $this->db->query($datainput);
		return $sql;
	}
	
	function getPage($id)
	{
		//$query = $this->db->query("SELECT * from tbl_page where id=$id");
		$query = $this->db->get_where('tbl_page', array('id' => $id));
		//$query = $query->result();
		$row = $query->row_array();
		return $row;
	}
}