<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('form','html','url'));
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
		$username = $this->session->userdata('username');
		$isAdmin = $this->session->userdata('loginadmin');
		if($username != "" && $isAdmin === TRUE){
			$data = $this->category_model->getCat($id);
			if ($data['image'] != '') { unlink('./assets/uploads/category/'.$data['image']); }
			$result = $this->category_model->deleteCat($id);
			redirect('category/listing');
		}
		else{
			$data["judul"] = "Ananaka Admin Dashboard | Login";
			redirect('panel/login');
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
		$data['cssPage'] ='
			<link rel="stylesheet" href="'.base_url().'assets/admin/plugins/datatables/dataTables.bootstrap.css" />';
	
		$data['jsPage'] = '
			<script src="'.base_url().'assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
			<script type="text/javascript">
		      $(function () {
		        $("#listPost").dataTable({"bLengthChange": false,"bFilter": false,"bSort": false});
		      });
		    </script>
		';

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
		$data['name'] = mysql_real_escape_string($this->input->post("name"));
		$data['description'] = mysql_real_escape_string($this->input->post("description"));
		$data['isActive'] = $this->input->post("isActive");
		$id = $this->input->post("id");
		//print_r($data);

		$username = $this->session->userdata('username');
		$isAdmin = $this->session->userdata('loginadmin');
		if($username != "" && $isAdmin === TRUE){
			if ($this->input->post('btn_login') == "Save changes")
			{
				$dataCategory = $this->category_model->getCat($id);

				if ($_FILES['image']['tmp_name'] != "") 
				{
					$data['image'] = $this->uploading();
					if ($dataCategory['image'] != '')
					{
						unlink('./assets/uploads/category/'.$dataCategory['image']);
						unlink('./assets/uploads/category/thumbs/'.$dataCategory['image']);
					}

					$result = $this->category_model->updateCat($id, $data);
					redirect('category/listing');
				} else {
					$data['image'] = $dataCategory['image'];
					
					$result = $this->category_model->updateCat($id, $data);
					redirect('category/listing');
				}
			}
		}
		else{
			$data["judul"] = "Ananaka Admin Dashboard | Login";
			redirect('panel/login');
		}
		
	}
}