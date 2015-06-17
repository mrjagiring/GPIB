<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Berita_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}

	function addBerita($data)
	{ 
		$this->db->insert('tbl_berita', $data);
		$id = $this->db->insert_id();
	}

	function deleteBerita($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tbl_berita");
	}
	
	function listBerita($limit = false, $offset = false)
	{
		if ($limit)
		{
			$this->db->order_by('id', 'DESC');
			$result	= $this->db->get('tbl_berita',$limit,$offset);
			
			return $result->result();
		}
		else
		{
			$this->db->order_by('id', 'DESC');
			$result	= $this->db->get('tbl_berita');

			return $result->result();
		}
	}

	function updateBerita($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_berita', $data); 
	}

	function catBerita($cat)
	{
		$sql = $this->db->query("SELECT * from tbl_berita where cat_id=$cat");
		return $sql;
	}
	
	function manualQuery($datainput)
	{
		$sql = $this->db->query($datainput);
		return $sql;
	}
	
	function getBerita($id)
	{
		//$query = $this->db->query("SELECT * from tbl_berita where id=$id");
		$query = $this->db->get_where('tbl_berita', array('id' => $id));
		//$query = $query->result();
		$row = $query->row_array();
		return $row;
	}

	function getAllBerita($category_id = false, $limit = false, $offset = false, $by=false, $sort=false)
	{
		//if we are provided a category_id, then get post according to category
		if ($category_id)
		{
			$this->db->get_where('tbl_berita', array('cat_id' => $category_id));
			$this->db->order_by($by, $sort);			
			$result	= $this->db->limit($limit)->offset($offset)->get()->result();
			
			return $result;
		}
		else
		{
			$this->db->order_by('id', 'DESC');
			$result	= $this->db->get('tbl_berita');

			return $result->result();
		}
	}

}