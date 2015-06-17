<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();

                $this->config->load('berita');
                $this->load->library(array('form_validation','image_moo'));
                $this->load->helper(array('html', 'file'));
                $this->load->model('extractImage/extract_image_model', 'extract');
                $this->load->model('home_model','model');
	}
	
	public function index()
	{
                $data['leftnews'] = $this->config->item('leftnews');
                $data['rightnews'] = $this->config->item('rightnews');
        
		$current_month = date("m");
		$item_slider = $this->model->get_slider();
		$next_item  = $this->model->next_item_slider($item_slider->slider_id);
				
		$data['page']   = $this->model->get_page();
				
		$data['headline'] = $this->model->get_first_sermon();
		$data['slider']	 = $item_slider;
		$data['sliders']	= $next_item;

		$data['birthday']   = $this->model->get_birthday($current_month);
		$data['annivs']	 = $this->model->get_anniversary($current_month);

		$data['events']		 = $this->model->get_event();
		$data['others']		 = $this->model->get_others();
				
		$this->template->display('index',$data);
	}
		
	function berita($slug){
                $data['rightnews'] = $this->config->item('rightnews');
		$current_month = date("m");
			
		//slider
		$item_slider          = $this->model->get_slider();
		$next_item            = $this->model->next_item_slider($item_slider->slider_id);
		$data['slider']       = $item_slider;
		$data['sliders']      = $next_item;
			
		$data['page']         = $this->model->get_page();
			
		//right event data
		$data['birthday']     = $this->model->get_birthday($current_month);
		$data['annivs']       = $this->model->get_anniversary($current_month);

		$data['events']       = $this->model->get_event();
		$data['others']       = $this->model->get_others();
				
		//detail post
		$data['post']         = $this->model->getBySlug($slug);
				
		$this->template->display('detail', $data);
	}
		
	function page($id){
            
                $current_month = date("m");
                
                //slider
                $item_slider = $this->model->get_slider();
                $next_item  = $this->model->next_item_slider($item_slider->slider_id);
                $data['slider']     = $item_slider;
                $data['sliders']    = $next_item;
                
                $data['page']   = $this->model->get_page();
                
                //right event data
                $data['birthday']   = $this->model->get_birthday($current_month);
                $data['annivs']     = $this->model->get_anniversary($current_month);
                $data['weddings']    = $this->model->get_wedding();
                
                
                $data['jobs']    = $this->model->get_jobs_vacancy();
                $data['jemaatsakit']    = $this->model->get_jemaat_sakit();
                $data['events']         = $this->model->get_event();
                $data['others']         = $this->model->get_others();
                
                //detail post
                $data['detail']       = $this->model->get_detail_page($id);
                
                $this->template->display('page',$data);
            
        }
        
        
        function gallery(){
            
                $current_month = date("m");
                
                //slider
                $item_slider = $this->model->get_slider();
                $next_item  = $this->model->next_item_slider($item_slider->slider_id);
                $data['slider']     = $item_slider;
                $data['sliders']    = $next_item;
                
                $data['page']   = $this->model->get_page();
                
                //right event data
                $data['birthday']   = $this->model->get_birthday($current_month);
                $data['annivs']     = $this->model->get_anniversary($current_month);
                $data['weddings']    = $this->model->get_wedding();
                
                
                $data['jobs']    = $this->model->get_jobs_vacancy();
                $data['jemaatsakit']    = $this->model->get_jemaat_sakit();
                $data['events']         = $this->model->get_event();
                $data['others']         = $this->model->get_others();
                
                //detail post
                $this->load->helper('directory');
                $map = directory_map('./uploads/gallery/', 1);
                $data['map']    = $map;
                
                $this->template->display('gallery/index',$data);
            
        }
        
        function item_gallery($folder){
            
                $current_month = date("m");
                
                //slider
                $item_slider = $this->model->get_slider();
                $next_item  = $this->model->next_item_slider($item_slider->slider_id);
                $data['slider']     = $item_slider;
                $data['sliders']    = $next_item;
                
                $data['page']   = $this->model->get_page();
                
                //right event data
                $data['birthday']   = $this->model->get_birthday($current_month);
                $data['annivs']     = $this->model->get_anniversary($current_month);
                $data['weddings']    = $this->model->get_wedding();
                
                
                $data['jobs']    = $this->model->get_jobs_vacancy();
                $data['jemaatsakit']    = $this->model->get_jemaat_sakit();
                $data['events']         = $this->model->get_event();
                $data['others']         = $this->model->get_others();
                
                //detail post
                $this->load->helper('directory');
                
                $data['path']   = $folder;
                $data['mapdata']    = directory_map('./uploads/gallery/'.$folder);

                
                $this->template->display('gallery/detail',$data);
            
            
        }
  
}
