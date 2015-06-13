<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class CKEditor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //session_start();
    }
 
    public function index()
    {
        $data['cssPage'] ='';
        $data['jsPage'] ='';
        
        $this->load->view('admin/header', $data);        
        $this->load->view('ckeditor-form');
        $this->load->view('admin/footer', $data);
    }
 
    
}