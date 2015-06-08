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
		//$this->db->insert('tbl_berita', $data); 
		$sql = "insert into tbl_berita (cat_id,title,slug,desk,file,author,create_at) values(".$data['cat_id'].",'".$data['title']."','".$data['slug']."','".$data['desk']."','".$data['file']."','".$data['author']."','".$data['create_at']."')";
		$sql = $this->db->query($sql);
		return $sql;
	}

	function deleteBerita($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("tbl_berita");
	}
	
	function listBerita()
	{
		$sql = $this->db->query("SELECT * from tbl_berita");
		return $sql;
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
}