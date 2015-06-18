<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sbu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('html'));
		$this->load->database();
		$this->load->model('sbu_model');
	}
	
	public function index()
	{
		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			redirect('sbu/listing');
		}
		else{
			redirect('secure/login');
		}
		
	}

	public function adding()
	{
		$data['tanggal'] = $this->input->post("tanggal");
		$data['kategori'] = $this->input->post("kategori");
		$data['nats'] = $this->input->post("nats");
		$data['nyanyian'] = $this->input->post("nyanyian");
		$data['judul'] = $this->input->post('judul');
		$data['desk'] = $this->input->post("desk");
		$data['create_by'] = $this->session->userdata('user_id');
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->sbu_model->addSbu($data);
			redirect('sbu/listing');
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
			$result = $this->sbu_model->deleteSbu($id);
			redirect('sbu/listing');
		}
		else{
			redirect('secure/login');
		}		
	}

	public function form($id)
	{
		$data['cssPage'] ='<link rel="stylesheet" href="'.base_url().'assets/admin/plugins/datepicker/datepicker3.css" />';
		$data['jsPage'] = '<script src="'.base_url().'assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script type="text/javascript">
			$(\'#pickDate .input-group.date\').datepicker({
				format: "yyyy-mm-dd",
				todayHighlight: true
			});
		</script>';

		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../assets/ckfinder/');

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
		$data['cssPage'] ='<link rel="stylesheet" href="'.base_url().'assets/admin/plugins/datatables/dataTables.bootstrap.css" />';
	
		$data['jsPage'] = '<script src="'.base_url().'assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="'.base_url().'assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript">
		      $(function () {
		        $("#listKgtn").dataTable({
		        	"bLengthChange": false,"bSort": false,"bAutoWidth": false,"bInfo": true,
		        	"columns": [null,null,null,null,null,null,{"width":"10%"}]
		        });
		      });
		</script>';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['allSbu'] = $this->sbu_model->listSbu();
				
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
		$data['tanggal'] = $this->input->post("tanggal");
		$data['kategori'] = $this->input->post("kategori");
		$data['nats'] = $this->input->post("nats");
		$data['nyanyian'] = $this->input->post("nyanyian");
		$data['judul'] = $this->input->post('judul');
		$data['desk'] = $this->input->post("desk");
		$data['update_by'] = $this->session->userdata('user_id');
		$id = $this->input->post("id");
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->sbu_model->updateSbu($id, $data);
			redirect('sbu/listing');
		}
		else
		{
			redirect('secure/login');
		}		
	}
}