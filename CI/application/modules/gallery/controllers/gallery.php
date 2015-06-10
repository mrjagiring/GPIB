<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library(array('form_validation','image_lib'));    
        $this->load->model('gallery_model','mod');
    }
    
    public function index(){
        
        $this->form_validation->set_rules('caption','caption','required');
        if($this->form_validation->run() == FALSE){
            
            $data['result']     = $this->mod->select_all();
            
            $this->template->display('index', $data);
            
        }
        else {
            
             if($this->do_upload()){
                    $dataimage = $this->upload->data();
                    $fields = array(
                                'caption'          =>	$this->input->post("caption"),
                                'image'             =>	$dataimage['file_name']
                            );
                    $this->mod->insert_new_gallery($fields);
                    $this->session->set_flashdata('msg', 'New Gallery Has Been Created');
                    redirect('gallery/','location',302);
                }
                else{
                    redirect('gallery/','location',302);                
            
                    
            }
            
        }
        
    }
    
    function do_upload($user_file = 'image'){
        
            $valid = TRUE;

            $config['upload_path']      = './uploads/images/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = '1000';
            $config['max_width']        = '0';
            $config['max_height']       = '0';


            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($user_file))
            {
                    $valid = FALSE;
                    $this->session->set_flashdata('msg', $this->upload->display_errors());
            }
            else
            {
                    $this->upload->set_upload_path('./uploads/_thumbs/');
                    $this->upload->do_upload($user_file);

                    $dataimage = $this->upload->data();
                    $data = array('upload_data' => $this->upload->data());

                    unset($config);
                    $config['image_library']	= 'gd2';
                    $config['source_image']     = $dataimage['full_path'];
                    $config['create_thumb']	= FALSE;
                    $config['maintain_ratio']	= TRUE;
                    $config['width']		= 400;
                    $config['height']		= 320;
                    $this->image_lib->initialize($config);

                    if( !$this->image_lib->resize() ) 
                    {

                        $valid = FALSE;
                        //$this->session->set_flashdata('msg', $this->image_lib->display_errors('',''));
                    }
            }

            return $valid;
    }
    
    function delete($id){
        
        $this->delete_old_images($id);
        
        $this->mod->delete_row($id);
        $this->session->set_flashdata('msg','Image Gallery Deleted');
        
        redirect('gallery','location',302);
        
    }
    
    function edit($id){
        
        $this->form_validation->set_rules('caption','caption','required');
        
        if($this->form_validation->run() == FALSE){
            
            $data['row']    = $this->mod->get_row($id);
            
            $this->template->display('edit', $data);            
        }
        else {
            
            $this->mod->update($id);
            $this->session->set_flashdata('msg','Caption Updated');
            
            redirect('gallery','location',302);
            
        }
        
    }
    
    function changimage($id){
        
        if($this->do_upload()){
            
                    $this->delete_old_images($id);
            
                    $this->mod->update_image($id);
                    $this->session->set_flashdata('msg', 'Image Has Been Updated');
                    redirect('gallery/','location',302);
                }
                else{
                
                redirect('gallery/edit/'.$id,'location',302);                
            
                    
        }
        
    }
    
    function delete_old_images($id){
        
        $row = $this->mod->get_row($id);
        
        $this->load->helper('file');
        
        unlink('./uploads/images/'.$row->image);
        
        unlink('./uploads/_thumbs/'.$row->image);
        
    }
    
}    