<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Home_model extends CI_Model
{
    
        var $berita = 'tbl_berita';
        var $cat    = 'tbl_category';
        var $jemaat = 'tbl_jemaat';
        var $slider = 'tbl_slider';
        var $user   = 'tbl_users';
        var $pg     = 'tbl_page';
    
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
            
            $this->db->select('b.id AS postid, b.cat_id, b.title, b.slug, b.create_at, b.desk, b.file, b.author, c.id, c.title AS category, u.id, u.username', false);
            $this->db->from($this->berita.' AS b');
            $this->db->join($this->cat.' AS c','c.id = b.cat_id');
            $this->db->join($this->user.' AS u','u.id = b.author');
            $this->db->where('b.slug',$slug);
            $query = $this->db->get();

            return $query->row();


        }
        
        function get_related_detail($catid, $id){
            
            $this->db->select('b.id, b.cat_id, b.title, b.slug, b.create_at, b.desk, b.file,c.id, c.title AS category', false);
            $this->db->from($this->berita.' AS b');
            $this->db->join($this->cat.' AS c','c.id = b.cat_id');
            $this->db->where('b.id !=', $id);
            $this->db->where_in('b.cat_id', $catid);
            $this->db->order_by('b.create_at','desc');
            $this->db->limit(5);
            $query = $this->db->get();

            return $query->result();
            
        }
        
        //PAGE
        
        function get_page(){
            
            $this->db->select('');
            $this->db->where('parent_id','0');
            $query = $this->db->get($this->pg);
            
            return $query->result();
            
        }
        
        function get_detail_page($id){
            
            $this->db->where('id',$id);
            $query = $this->db->get($this->pg);
            
            return $query->row();
            
        }
        
        function get_related_page($id, $parentid){
            
            $this->db->where('id !=',$id);
            $this->db->where_in('parent_id', $parentid);
            $this->db->limit(5);
            
            $query = $this->db->get($this->pg);
            
            return $query->result();
            
        }
        
        function has_child($id){
            
            $this->db->select('');
            $this->db->where('parent_id',$id);
            $this->db->count_all_results($this->pg);
            
        }
        
        function follow_parent_id($id){
            
            $this->db->select('');
            $this->db->where('parent_id',$id);
            $query = $this->db->get($this->pg);
            
            return $query->result();
            
        }
        

}        