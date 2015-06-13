<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Home_model extends CI_Model
{
    
        var $berita = 'tbl_berita';
        var $cat    = 'tbl_category';
        var $jemaat = 'tbl_jemaat';
        var $slider = 'tbl_slider';
    
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
                
		
	}
        
        function get_catatan_dari_meja_pendeta(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('cat_id', 1);
            $this->db->limit(4);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
            
        }
        
        function get_berita_majelis_sinode_gpib(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('cat_id', 14);
            $this->db->limit(4);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
            
        }
        
        function get_informasi_sekretariats(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('cat_id', 4);
            $this->db->limit(4);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
            
        }
        
        
        function get_first_sermon(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where_in('cat_id', array(12,13));
            $this->db->limit(1);
            
            $query = $this->db->get($this->berita);
            
            return $query->row();
            
        }
        
        function get_sermon_after($id){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('id !=', $id);
            $this->db->where_in('cat_id', array(12,13));
            $this->db->limit(3);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
        }
        
        function get_birthday($current_month){
            
            $this->db->select('');
            $this->db->like('dob', $current_month);
            $this->db->order_by('dob','desc');
            $this->db->limit(5);
            
            $query = $this->db->get($this->jemaat);
            
            return $query->result();
            
        }
        
        function get_anniversary($current_month){
            
            $this->db->select('');
            $this->db->like('tanggal_nikah', $current_month);
            $this->db->order_by('dob','desc');
            $this->db->limit(5);
            
            $query = $this->db->get($this->jemaat);
            
            return $query->result();
            
        }
        
        function get_wedding(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('cat_id', 6);
            $this->db->limit(4);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
            
        }
        
        function get_jobs_vacancy(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('cat_id', 8);
            $this->db->limit(4);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
            
        }
        
        function get_jemaat_sakit(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('cat_id', 7);
            $this->db->limit(4);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
            
        }
        
        function get_event(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('cat_id', 15);
            $this->db->limit(6);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
            
        }
        
        function get_others(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('cat_id', 16);
            $this->db->limit(6);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
            
        }
        
        function get_slider(){
            
            $this->db->order_by('created_at','desc');
            $this->db->limit(1);
            
            $query = $this->db->get($this->slider);
            
            return $query->row();
            
        }
        
        function next_item_slider($id){
            
            $this->db->where('slider_id !=', $id);
            $this->db->order_by('created_at','desc');
            
            $query = $this->db->get($this->slider);
            
            return $query->result();
            
        }
        
        //detail
        function get_berita_by_slug($slug){
            
            $this->db->where('slug', $slug);
            $query = $this->db->get($this->berita);
            
            return $query->row();
            
        }
        

}        