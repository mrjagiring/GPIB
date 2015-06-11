<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('html'));
		$this->load->database();
		$this->load->model('page_model');
		$this->load->model('category/category_model');
	}
	
	public function index()
	{
		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			redirect('page/listing');
		}
		else{
			show_404();
		}
	}

	public function adding()
	{
		$data['parent_id'] = $this->input->post("parent_id");
		$data['title'] = mysql_real_escape_string($this->input->post("title"));
		$data['content'] = mysql_real_escape_string($this->input->post("editor1"));
		if ($data['target'] == 1) { 
			$data['menu_title'] = url_title($data['title'], 'dash', true); 
			$data['url'] = 'page/' . $data['menu_title'];
		} elseif ($data['target'] == 2) { 
			$data['menu_title'] = $this->input->post("slug");
			$data['url'] = 'category/' . $data['menu_title'];
		}else {
			$data['url'] = '#';
		}
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->menu_model->addMenu($data);
			redirect('page/listing');
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
			$result = $this->page_model->deletePage($id);
			redirect('page/listing');
		}
		else
		{
			echo '<script type="text/javascript"> alert("Maaf, User Anda bukan Admin.\nSilahkan hubungi Administrator!"); window.history.back(); </script>';
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
			</script>
			<script type="text/javascript">
				$( document ).ready(function() {
					var current_index = $("#myTab")[0].selectedIndex;
					$(\'#myTab li a\').eq(current_index).tab(\'show\');
				}
			</script>
			<script type="text/javascript">
				$(\'#mySelect\').on(\'change\', function (e) {
					$(\'#myTab li a\').eq($(this).val()).tab(\'show\');
				});
			</script>';

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
		        $("#listMenu").dataTable({"bLengthChange": false,"bFilter": false,"bSort": false});
		      });
		    </script>
		';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['allMenu'] = $this->page_model->listPage();
				
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