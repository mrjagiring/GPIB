<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Home_model extends CI_Model
{
    
        var $berita = 'tbl_berita';
        var $cat    = 'tbl_category';
        var $jemaat = 'tbl_jemaat';
        var $slider = 'tbl_slider';
        var $user   = 'tbl_users';
        var $pg     = 'tbl_page';
        var $sbu    = 'tbl_sbu';
        var $keg    = 'tbl_kegiatan';
    
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
	}

    function getCatExlude($parent_id, $exclude)
    {
        $array = array('parent_id' => $parent_id, 'id <>' => $exclude);
        $query = $this->db->get_where('tbl_category', $array);
        //$query = $query->result();
        $row = $query->row_array();
        return $row['id'];
    }

    function getBerita($category_id = false, $limit = false, $offset = false, $by=false, $sort=false)
    {
        //if we are provided a category_id, then get post according to category
        if ($category_id)
        {
            $this->db->order_by($by, $sort);            
            $result = $this->db->limit($limit)->offset($offset)->get_where('tbl_berita', array('cat_id' => $category_id))->result();
            return $result;
        }
        else
        {
            $this->db->order_by('id', 'DESC');
            $result = $this->db->get('tbl_berita');

            return $result->result();
        }
    }

    //detail
    function getBySlug($slug)
    {
        $this->db->where('slug', $slug);
        $query = $this->db->get($this->berita);
        return $query->row();
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
        /*
         * SBU
         */
        
        function get_last_sbu(){
            
            $this->db->select('');
            $this->db->order_by('id','desc');
            $this->db->limit(1);
            
            $query = $this->db->get($this->sbu);
            
            return $query->row();
            
        }
        
        function get_sbu_before($id){
            
            $this->db->select('');
            $this->db->where('id !=', $id);
            $this->db->limit(3);
            
            $query = $this->db->get($this->sbu);
            
            return $query->result();
        }
        
        
        function get_detail_sbu($id){
            
            $this->db->where('id',$id);
            $query = $this->db->get($this->sbu);
            
            return $query->row();
            
        }
        /*
         *Birthday
         */
        function get_birthday(){ 

            $this->db->select('');  
            $query = $this->db->get($this->jemaat);
            
            return $query->result();
            
        }
        /**
         * 
         * ANNIVERSARY
         * @return type
         */
        function get_anniversary(){
            
            $this->db->select('');
            $current_month = date("m");
            $query = $this->db->get('tbl_nikah');
            
            $nexttwo = strtotime(date("m", strtotime('this month')) . " +2 month");
            
            
            foreach ($query->result() as $row)
            {
                $tanggal = date("m", strtotime($row->tanggal));
                if($tanggal == $current_month){
                    
                    $rowid[] = $row->id;
                }
                elseif($tanggal >= $current_month || $tanggal <= $nexttwo){
                    $rowid[] = $row->id;
                }
               
            }
            
            return $rowid;
            
            
            
        }
        
        function get_anniversary_couple(){
            
            $id = $this->get_anniversary();
            $this->db->where_in('id',$id);
            $this->db->order_by('tanggal','ASC');
            $this->db->limit(5);
            $query = $this->db->get('tbl_nikah');
            
            return $query->result();
            
        }
        
        function get_detail_anniv($id){
            
            $this->db->where('id',$id);
            $query = $this->db->get('tbl_nikah');
            
            return $query->row();
            
        }
        
        
        /*
         * Weddubg Event
         */
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

        function get_jemaat_bday($id){
            
            $this->db->where_in('id', $id);
            $this->db->order_by('dob','ASC');
            $query = $this->db->get($this->jemaat);
            
            return $query->result();
            
        }
        
        function get_jemaat_detail($id){
            
            $this->db->where('id',$id);
            $query = $this->db->get($this->jemaat);
            
            return $query->row();
            
        }
        
        function get_jemaat_sakit(){
            
            $this->db->select('');
            $this->db->order_by('create_at','desc');
            $this->db->where('cat_id', 7);
            $this->db->limit(4);
            
            $query = $this->db->get($this->berita);
            
            return $query->result();
            
        }
        
        /*
         * 
         * Kegiatan Minggu Ini
         */
        function get_all_kegiatan(){
            
            $this->db->select('');
            $query = $this->db->get($this->keg);
            
            return $query->result();
            
        }
        
        function get_kegiatan_sepekan($id){
            
            $this->db->where_in('id',$id);
            $this->db->order_by('id','asc');
            $query = $this->db->get($this->keg);
            
            
            return $query->result();
            
        }
        
        function get_detail_kegiatan($id){
            
            $this->db->where('id',$id);
            $query = $this->db->get($this->keg);
            
            return $query->row();
            
        }
        
        /***
         * 
         * SLIDER
         * 
         */
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