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
		if ($_SESSION['logged_in']){
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
	
		$data['jsPage'] = '';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['id'] = $id;
				
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

	public function uploading()
	{
		$config['encrypt_name']=TRUE;
		$config['upload_path'] = './assets/uploads/category/';
		$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
		$config['max_size'] = '2000';
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('image')) { echo $this->upload->display_errors(); }
		else {
			$dataimage = $this->upload->data();
			$thumb_path = './assets/uploads/category/thumbs';
			if (!is_file($thumb_path . $dataimage['file_name'])) {
				$config = array(
					'source_image' => $dataimage['full_path'], //get original image
					'new_image' => $thumb_path,
					'maintain_ratio' => true,
					'width' => 150,
					'height' => 100
				);
				$this->load->library('image_lib', $config); //load library
				$this->image_lib->resize(); //do whatever specified in config
			}

			$result = $dataimage['file_name'];
			return $result;
		}
	}
}