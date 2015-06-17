<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Category_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	function addCat($data)
	{
		//$this->db->insert('tbl_category', $data); 
		$sql = "insert into tbl_category (title,slug,desk,parent_id) values('".$data['title']."','".$data['slug']."','".$data['desk']."',".$data['parent_id'].")";
		$sql = $this->db->query($sql);
		return $sql;
	}

	function deleteCat($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tbl_category");
	}
	
	function listCat()
	{
		$sql = $this->db->query("SELECT * from tbl_category");
		return $sql;
	}

	function updateCat($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_category', $data); 
	}

	function rootCat()
	{
		$sql = $this->db->query("SELECT * from tbl_category where parent_id=0");
		return $sql;
	}
	
	function manualQuery($datainput)
	{
		$sql = $this->db->query($datainput);
		return $sql;
	}
	
	function getCat($id)
	{
		//$query = $this->db->query("SELECT * from tbl_category where id=$id");
		$query = $this->db->get_where('tbl_category', array('id' => $id));
		//$query = $query->result();
		$row = $query->row_array();
		return $row;
	}
}