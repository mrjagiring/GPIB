<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model {
    
    var $img = 'tbl_slider';
    
    /**
     * 
     * fields
     * 
     * id,
     * caption,
     * image
     * 
     */

    
    public function __construct()
    {
        parent::__construct();
    }
    
    function select_all(){
        
        $this->db->select('');
        $query = $this->db->get($this->img);
        
        return $query->result();
        
    }
    
    function get_row($id){
        
        $this->db->where('id',$id);
        $query = $this->db->get($this->img);
        
        return $query->row();
    }
    
    function update($id){
        
        $this->db->set('caption', $this->input->post('caption'));
        $this->db->where('id',$id);
        $this->db->update($this->img);
        
    }
    
    function update_image($id){
        
        $dataimage = $this->upload->data();
        $this->db->set('image',$dataimage['file_name']);
        $this->db->where('id', $id);
        
        $this->db->update($this->img);
    }
    
    function insert_new_gallery($fields){
        
        $this->db->set($fields);
        $this->db->insert($this->img);
        
    }
    
    function delete_row($id){
        
        $this->db->where('id',$id);
        $this->db->delete($this->img);
        
    }
    
    function iterate() {
        $this->load->helper('directory');
        $map = directory_map('./uploads/gallery/', 1);
        return $map;
    }
}    