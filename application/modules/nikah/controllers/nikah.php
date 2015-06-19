<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nikah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('html'));
		$this->load->database();
		$this->load->model('nikah_model');
		$this->load->model('jemaat/jemaat_model');
	}
	
	public function index()
	{
		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			redirect('nikah/listing');
		}
		else{
			show_404();
		}
	}

	public function adding()
	{
		$data['suami'] = $this->input->post("suami");
		$data['istri'] = $this->input->post("istri");
		$data['tempat'] = $this->input->post("tempat");
		$data['tanggal'] = $this->input->post("tanggal");
		$data['sipil'] = $this->input->post("sipil");
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$result = $this->nikah_model->addNikah($data);

			$status['nikah'] = 1;
			$suami = $this->jemaat_model->updateJemaat($data['suami'], $status);
			$istri = $this->jemaat_model->updateJemaat($data['istri'], $status);

			redirect('nikah/listing');
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
			$status['nikah'] = 0;
			$data = $this->nikah_model->getNikah($id);

			$suami = $this->jemaat_model->updateJemaat($data['suami'], $status);
			$istri = $this->jemaat_model->updateJemaat($data['istri'], $status);

			$result = $this->nikah_model->deleteNikah($id);
			redirect('nikah/listing');
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
		        $("#listNikah").dataTable({
		        	"bLengthChange": false,"bSort": false,"bAutoWidth": false,"bInfo": true
		        });
		      });
		    </script>
		';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['jn'] = $this->nikah_model->listNikah();

			$this->load->view('admin/header',$data);
			$this->load->view('list',$data);
			$this->load->view('admin/footer',$data);
		}
		else{
			redirect('secure/login');
		}
	}

	public function view($id)
	{
		$data['cssPage'] ='';
	
		$data['jsPage'] = '';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$data['dj'] = $this->jemaat_model->getJemaat($id);

			$this->load->view('admin/header',$data);
			$this->load->view('view',$data);
			$this->load->view('admin/footer',$data);
		}
		else{
			redirect('secure/login');
		}
	}

	public function updating()
	{
		$data['suami'] = $this->input->post("suami");
		$data['istri'] = $this->input->post("istri");
		$data['tempat'] = $this->input->post("tempat");
		$data['tanggal'] = $this->input->post("tanggal");
		$data['sipil'] = $this->input->post("sipil");
		$id = $this->input->post("id");
		//print_r($data);

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$status['nikah'] = 0;
			$dataN = $this->nikah_model->getNikah($id);
			$suami = $this->jemaat_model->updateJemaat($dataN['suami'], $status);
			$istri = $this->jemaat_model->updateJemaat($dataN['istri'], $status);

			$result = $this->nikah_model->updateNikah($id, $data);
			$status['nikah'] = 1;
			$suami = $this->jemaat_model->updateJemaat($data['suami'], $status);
			$istri = $this->jemaat_model->updateJemaat($data['istri'], $status);

			redirect('nikah/listing');
		}
		else
		{
			redirect('secure/login');
		}
	}
}