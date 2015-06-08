<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('form','html','url'));
		$this->load->database();
		$this->load->model('category_model');
	}
	
	public function index()
	{
		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			redirect('category/listing');
		}
		else{
			show_404();
		}
		
	}

	public function adding()
	{
		$data['title'] = mysql_real_escape_string($this->input->post("title"));
		$data['slug'] = mysql_real_escape_string(url_title($data['title'], 'dash', true));
		$data['desk'] = mysql_real_escape_string($this->input->post("desk"));
		$data['parent_id'] = $this->input->post("parent_id");
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->category_model->addCat($data);
			redirect('category/listing');
		}
		else
		{
			redirect('secure/login');
		}
	}

	public function deleting($id)
	{
		$isAdmin = $this->session->userdata('is_admin');
		$isLogin = $this->session->userdata('logged_in');
		if($isLogin === TRUE && $isAdmin === TRUE){
			$result = $this->category_model->deleteCat($id);
			redirect('category/listing');
		}
		else
		{
			echo '<script type="text/javascript"> alert("Maaf, User Anda bukan Admin.\nSilahkan hubungi Administrator!"); window.history.back(); </script>';
		}		
	}

	public function form($id)
	{
		$data['cssPage'] ='';
	
		$data['jsPage'] = '';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['id'] = $id;
			$data['allCategory'] = $this->category_model->rootCat();
				
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
		$data['cssPage'] ='
			<link rel="stylesheet" href="'.base_url().'assets/admin/plugins/datatables/dataTables.bootstrap.css" />';
	
		$data['jsPage'] = '
			<script src="'.base_url().'assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
			<script type="text/javascript">
		      $(function () {
		        $("#listKat").dataTable({"bLengthChange": false,"bFilter": false,"bSort": false});
		      });
		    </script>
		';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['allCategory'] = $this->category_model->listCat();
				
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
		$data['title'] = mysql_real_escape_string($this->input->post("title"));
		$data['slug'] = mysql_real_escape_string(url_title($data['title'], 'dash', true));
		$data['desk'] = mysql_real_escape_string($this->input->post("desk"));
		$data['parent_id'] = $this->input->post("parent_id");
		$id = $this->input->post("id");
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->category_model->updateCat($id, $data);
			redirect('category/listing');
		}
		else
		{
			redirect('secure/login');
		}
	}
}