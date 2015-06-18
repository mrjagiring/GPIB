<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Search_model extends CI_Model
{
    
        var $berita = 'tbl_berita';
        var $cat    = 'tbl_category';
        var $pg     = 'tbl_page';
    
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
	}
        
        function getBerita($term){
            
            $this->db->select('');
            $this->db->like('title',$term);
            
            $query = $this->db->get($this->berita);
            return $query->result();
            
        }
        
        function getPageSearch($term){
            
            $this->db->select('');
            $this->db->like('title',$term);
            
            $query = $this->db->get($this->pg);
            return $query->result();
            
        }
        
}        
