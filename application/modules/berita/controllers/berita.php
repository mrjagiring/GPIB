<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('html'));
		$this->load->database();
		$this->load->model('berita_model');
		$this->load->model('category/category_model');
	}
	
	public function index()
	{
		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			redirect('berita/listing');
		}
		else{
			redirect('secure/login');
		}
		
	}

	public function adding()
	{
		$data['cat_id'] = $this->input->post("cat_id");
		$data['title'] = $this->input->post("title");
		$data['slug'] = url_title($data['title'], 'dash', true);
		$data['desk'] = $this->input->post("editor1");
		$data['author'] = $this->input->post("author");
		$data['create_by'] = $this->session->userdata('user_id');
		$data['create_at'] = date('Y-m-d h:i:s');
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->berita_model->addBerita($data);
			redirect('berita/listing');
		}
		else
		{
			redirect('secure/login');
		}
	}

	public function deleting($id)
	{
		$isLogin = $this->session->userdata('logged_in');
		if($isLogin === TRUE){
			$result = $this->berita_model->deleteBerita($id);
			redirect('berita/listing');
		}
		else{
			redirect('secure/login');
		}		
	}

	public function form($id)
	{
		$data['cssPage'] ='';
		$data['jsPage'] = '';

		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		//$this->ckeditor->config['width'] = '730px';
		//$this->ckeditor->config['height'] = '300px'; 

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../assets/ckfinder/');

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['id'] = $id;
			$data['allCategory'] = $this->category_model->listCat();
				
			$this->load->view('admin/header',$data);
			$this->load->view('form',$data);
			$this->load->view('admin/footer',$data);
		}
		else{
			redirect('secure/login');
		}
	}

	public function listing()
	{
		$data['cssPage'] ='<link rel="stylesheet" href="'.base_url().'assets/admin/plugins/datatables/dataTables.bootstrap.css" />';
	
		$data['jsPage'] = '<script src="'.base_url().'assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="'.base_url().'assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript">
		      $(function () {
		        $("#listPost").dataTable({
		        	"bLengthChange": false,"bSort": false,"bAutoWidth": false,"bInfo": true,
		        	"columns": [null,null,null,null,null,{"width":"10%"}]
		        });
		      });
		    </script>';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['allPost'] = $this->berita_model->listBerita();
				
			$this->load->view('admin/header',$data);
			$this->load->view('list',$data);
			$this->load->view('admin/footer',$data);
		}
		else{
			redirect('secure/login');
		}
	}

	public function updating()
	{
		$data['cat_id'] = $this->input->post("cat_id");
		$data['title'] = $this->input->post("title");
		$data['slug'] = url_title($data['title'], 'dash', true);
		$data['desk'] = $this->input->post("editor1");
		$data['author'] = $this->input->post("author");
		$data['update_by'] = $this->session->userdata('user_id');
		$id = $this->input->post("id");
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->berita_model->updateBerita($id, $data);
			redirect('berita/listing');
		}
		else
		{
			redirect('secure/login');
		}		
	}
}