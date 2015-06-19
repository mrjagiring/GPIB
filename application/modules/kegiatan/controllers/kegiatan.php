<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('html'));
		$this->load->database();
		$this->load->model('kegiatan_model');
	}
	
	public function index()
	{
		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			redirect('kegiatan/listing');
		}
		else{
			redirect('secure/login');
		}
		
	}

	public function adding()
	{
		$data['tanggal'] = $this->input->post("tanggal");
		$data['pukul'] = $this->input->post("pukul");
		$data['kegiatan'] = $this->input->post("kegiatan");
		$data['tempat'] = $this->input->post("tempat");
		$data['pemimpin'] = $this->input->post('pemimpin');
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->kegiatan_model->addKgtn($data);
			redirect('kegiatan/listing');
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
			$result = $this->kegiatan_model->deleteKgtn($id);
			redirect('kegiatan/listing');
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
		        	"columns": [null,null,null,null,null,{"width":"10%"}]
		        });
		      });
		</script>';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['allKgtn'] = $this->kegiatan_model->listKgtn();
				
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
		$data['pukul'] = $this->input->post("pukul");
		$data['kegiatan'] = $this->input->post("kegiatan");
		$data['tempat'] = $this->input->post("tempat");
		$data['pemimpin'] = $this->input->post('pemimpin');
		$id = $this->input->post("id");
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->kegiatan_model->updateKgtn($id, $data);
			redirect('kegiatan/listing');
		}
		else
		{
			redirect('secure/login');
		}		
	}
}