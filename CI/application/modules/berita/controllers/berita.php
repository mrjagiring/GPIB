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
		$data['title'] = mysql_real_escape_string($this->input->post("title"));
		$data['slug'] = mysql_real_escape_string(url_title($data['title'], 'dash', true));
		$data['desk'] = mysql_real_escape_string($this->input->post("editor1"));
		$data['file'] = mysql_real_escape_string($this->input->post("file"));
		$data['author'] = $this->session->userdata('user_id');
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
	
		$data['jsPage'] = '
			<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
			<script type="text/javascript">
				$(function () {
					CKEDITOR.replace("editor1");
				});
			</script>';

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
			$(function () {$("#listPost").dataTable({"bLengthChange": false,"bFilter": false,"bSort": false});});
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
		$data['title'] = mysql_real_escape_string($this->input->post("title"));
		$data['slug'] = mysql_real_escape_string(url_title($data['title'], 'dash', true));
		$data['desk'] = mysql_real_escape_string($this->input->post("editor1"));
		$data['file'] = mysql_real_escape_string($this->input->post("file"));
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