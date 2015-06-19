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
                $this->load->model('search_model','search');
	}
	
        /**
         * 
         * INDEX HOME
         * 
         */
	public function index()
	{
                $data['leftnews'] = $this->config->item('leftnews');
                $data['rightnews'] = $this->config->item('rightnews');
	
                
		$item_slider = $this->model->get_slider();
		$next_item  = $this->model->next_item_slider($item_slider->slider_id);
				
		$data['page']   = $this->model->get_page();
				
		$data['sbu'] = $this->model->get_last_sbu();
                
                
                
		$data['slider']	 = $item_slider;
		$data['sliders']	= $next_item;

		$data['birthday']       = $this->getBirthday();
		$data['annivs']         = $this->model->get_anniversary_couple();

		$data['kegiatans']      = $this->getKegiatan();       
				
		$this->template->display('index',$data);
	}
	/**
         * 
         * BERITA
         * @param slug
         * 
         */	
	function berita($slug){
                $data['rightnews'] = $this->config->item('rightnews');
			
		//slider
		$data['page']   = $this->model->get_page();

                $data['birthday']       = $this->getBirthday();
                $data['annivs']         = $this->model->get_anniversary_couple();

                $data['kegiatans']      = $this->getKegiatan();
				
		//detail post
		$data['post']         = $this->model->getBySlug($slug);
				
		$this->template->display('detail', $data);
	}
	/**
         * 
         * PAGE
         * @param type $id
         */	
	function page($id){
            
                $data['rightnews'] = $this->config->item('rightnews');
                            

                $data['page']   = $this->model->get_page();

                $data['birthday']       = $this->getBirthday();
                $data['annivs']         = $this->model->get_anniversary_couple();

                $data['kegiatans']      = $this->getKegiatan();
                
                //detail post
                $data['detail']       = $this->model->get_detail_page($id);
                
                $this->template->display('page',$data);
            
        }
        
        /*
         * 
         * GALLERY
         * 
         */
        
        function gallery(){                
                //slider
                
                $data['page']   = $this->model->get_page();
                
                 $data['rightnews'] = $this->config->item('rightnews');
                
                $data['page']   = $this->model->get_page();

                $data['birthday']       = $this->getBirthday();
                $data['annivs']         = $this->model->get_anniversary_couple();

                $data['kegiatans']      = $this->getKegiatan();
                
                //detail post
                $this->load->helper('directory');
                $map = directory_map('./uploads/gallery/', 1);
                $data['map']    = $map;
                
                $this->template->display('gallery/index',$data);
            
        }
        
        function item_gallery($folder){
                
                //slider
                 $data['rightnews'] = $this->config->item('rightnews');
                
                $data['page']   = $this->model->get_page();
                
                $data['page']   = $this->model->get_page();

                $data['birthday']       = $this->getBirthday();
                $data['annivs']         = $this->model->get_anniversary_couple();

                $data['kegiatans']      = $this->getKegiatan();
                
                //detail post
                $this->load->helper('directory');
                
                $data['path']   = $folder;
                $data['mapdata']    = directory_map('./uploads/gallery/'.$folder);

                
                $this->template->display('gallery/detail',$data);
            
            
        }
        
        /*
         * 
         * SEARCH
         * 
         * 
         */
        
        function search(){
            
            $data['rightnews'] = $this->config->item('rightnews');
            
            $term = $this->input->post('srch-term');
            
            
            $data['page']   = $this->model->get_page();

            $data['birthday']       = $this->getBirthday();
            $data['annivs']         = $this->model->get_anniversary_couple();

            $data['kegiatans']      = $this->getKegiatan();
            
            
            $searchberita = $this->search->getBerita($term);
            $searchpage   = $this->search->getPageSearch($term);
            $data['sberita'] = $searchberita;
            $data['spage']   = $searchpage;
            $data['term']   = $term;
            
            if(!$searchberita && !$searchpage){
                
                $this->template->display('search/zero_result',$data);
            }
            else{
                
                $this->template->display('search/result',$data);
            }
            
        }
        
        /*
         * JEMAAT
         */
        function jemaat($id){


            $data['rightnews'] = $this->config->item('rightnews');

            //right event data
            $data['page']   = $this->model->get_page();

            $data['birthday']       = $this->getBirthday();
            $data['annivs']         = $this->model->get_anniversary_couple();

            $data['kegiatans']      = $this->getKegiatan();

            $data['jemaat']     = $this->model->get_jemaat_detail($id);

            $this->template->display('jemaat',$data);

            
        }
        
        
        
        /*
         * 
         * ULANG TAHUN PERNIKAHAN
         * 
         */
        function anniversary($id){
            
            $data['leftnews'] = $this->config->item('leftnews');
            $data['rightnews'] = $this->config->item('rightnews');


            $data['page']   = $this->model->get_page();

            $data['birthday']       = $this->getBirthday();
            $data['annivs']         = $this->model->get_anniversary_couple();

            $data['kegiatans']      = $this->getKegiatan();
            
            $data['anniv']              = $this->model->get_detail_anniv($id);

            $this->template->display('anniv',$data);
            
        }

        /*
         * SBU
         * 
         */
        function sbu($id){
            
            $data['leftnews'] = $this->config->item('leftnews');
            $data['rightnews'] = $this->config->item('rightnews');


            $data['page']   = $this->model->get_page();

            $data['birthday']       = $this->getBirthday();
            $data['annivs']         = $this->model->get_anniversary_couple();

            $data['kegiatans']      = $this->getKegiatan();
            
            $data['detail']     = $this->model->get_detail_sbu($id);
            

            $this->template->display('sbu',$data);
            
            
        }
        
        /***
         * 
         * 
         * Kegiatan
         * 
         */
        function kegiatan($id){
            
            $data['leftnews'] = $this->config->item('leftnews');
            $data['rightnews'] = $this->config->item('rightnews');


            $data['page']   = $this->model->get_page();

            $data['birthday']       = $this->getBirthday();
            $data['annivs']         = $this->model->get_anniversary_couple();

            $data['kegiatans']      = $this->getKegiatan();
            
            $data['detail']     = $this->model->get_detail_kegiatan($id);
            
            $this->template->display('kegiatan',$data);
            
        }
        
        /**
         * birthdate start to end
         */
        
        
        function getBirthday(){
            $current_month = date("m");
            $all = $this->model->get_birthday();
            

            foreach($all AS $bd){
                $bdate = date("d", strtotime($bd->dob));
                $bmonth = date("m", strtotime($bd->dob));
                //echo $bdate;
                $lastweek = date('d', strtotime('last sunday'));
                $thisweek = date('d', strtotime('next sunday'));
                
               //echo $bmonth;
               if($bmonth == $current_month){
                   
                   if($bdate >= $lastweek){
                       
                       if($bdate <= $thisweek){
                           
                            $jemaats[] = $this->model->get_jemaat_bday($bd->id);
                            
                                        
                       }
                   
                   }    

                }

            }
            return $jemaats;
   
            
        }
        
        function getKegiatan(){
            
            $current_month = date("m");
            $all = $this->model->get_all_kegiatan();
            
             foreach($all AS $row){
                $tanggal = date("d", strtotime($row->tanggal));
                $bulan = date("m", strtotime($row->tanggal));
                //echo $bdate;
                $lastweek = date('d', strtotime('last sunday'));
                $thisweek = date('d', strtotime('next sunday'));
                
               //echo $bmonth;
               if($bulan == $current_month){
                   
                   if($tanggal >= $lastweek){
                       
                       if($tanggal <= $thisweek){
                           
                            $kegiatans[] = $this->model->get_kegiatan_sepekan($row->id);
                            
                                        
                       }
                   
                   }    

                }

            }
            return $kegiatans;
            
        }
        
        
}
