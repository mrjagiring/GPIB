<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
        function __construct()
	{
		parent::__construct();

		$this->load->model('home_model','model');
	}
    
	public function index()
	{
                $current_month = date("m");
                
                $item_slider = $this->model->get_slider();
                $next_item  = $this->model->next_item_slider($item_slider->slider_id);
                
                
                
                $data['headline'] = $this->model->get_first_sermon();
                $data['slider']     = $item_slider;
                $data['sliders']    = $next_item;
                 
            
                $data['catatan']    = $this->model->get_catatan_dari_meja_pendeta();
                $data['sinodes']    = $this->model->get_berita_majelis_sinode_gpib();
                $data['sekretariats']   = $this->model->get_informasi_sekretariats();
                
                $data['birthday']   = $this->model->get_birthday($current_month);
                $data['annivs']     = $this->model->get_anniversary($current_month);
                $data['weddings']    = $this->model->get_wedding();
                
                $data['jobs']    = $this->model->get_jobs_vacancy();
                $data['jemaatsakit']    = $this->model->get_jemaat_sakit();
                $data['events']         = $this->model->get_event();
                $data['others']         = $this->model->get_others();
                
                
                
		$this->template->display('index',$data);
 
	}
        
        function berita($slug){
                
                echo $slug;
            
        }
        
        function jemaat($id){
            
            echo $id;
            
        }
        
}
