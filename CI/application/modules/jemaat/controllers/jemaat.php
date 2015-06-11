<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jemaat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$data['cssPage'] ='<link rel="stylesheet" href="'.base_url().'assets/grocery_crud/themes/flexigrid/css/flexigrid.css" />
		<link rel="stylesheet" href="'.base_url().'assets/grocery_crud/css/jquery_plugins/fancybox/jquery.fancybox.css" />
		<link rel="stylesheet" href="'.base_url().'assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css" />';

		$data['jsPage'] = '<script src="'.base_url().'assets/grocery_crud/js/jquery_plugins/jquery.noty.js"></script>
		<script src="'.base_url().'assets/grocery_crud/js/jquery_plugins/config/jquery.noty.config.js"></script>
		<script src="'.base_url().'assets/grocery_crud/js/common/lazyload-min.js"></script>
		<script src="'.base_url().'assets/grocery_crud/js/common/list.js"></script>
		<script src="'.base_url().'assets/grocery_crud/themes/flexigrid/js/cookies.js"></script>
		<script src="'.base_url().'assets/grocery_crud/themes/flexigrid/js/flexigrid.js"></script>
		<script src="'.base_url().'assets/grocery_crud/js/jquery_plugins/jquery.form.min.js"></script>
		<script src="'.base_url().'assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js"></script>
		<script src="'.base_url().'assets/grocery_crud/themes/flexigrid/js/jquery.printElement.min.js"></script>
		<script src="'.base_url().'assets/grocery_crud/js/jquery_plugins/jquery.fancybox-1.3.4.js"></script>
		<script src="'.base_url().'assets/grocery_crud/js/jquery_plugins/jquery.easing-1.3.pack.js"></script>
		<script src="'.base_url().'assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js"></script>';

		$this->load->view('admin/header',$data);
		$this->load->view('example',$output);
		$this->load->view('admin/footer',$data);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function manage()
	{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('tbl_jemaat');
			$crud->columns('id','first_name','last_name','gender','pob','dob','status_baptis','status_sidi','status_nikah','tanggal_nikah','alamat');
			
			$crud->field_type('gender','enum',array('LK','PR'));
			$crud->field_type('status_baptis','dropdown', array('0' => 'Belum', '1' => 'Sudah'));
			$crud->field_type('status_sidi','dropdown', array('0' => 'Belum', '1' => 'Sudah'));
			$crud->field_type('status_nikah','dropdown', array('0' => 'Belum', '1' => 'Sudah'));

			$crud->display_as('id','ID Jemaat');
			$crud->display_as('first_name','Nama Depan');
			$crud->display_as('last_name','Nama Akhir');
			$crud->display_as('gender','Jenis Kelamin');
			$crud->display_as('pob','Tempat Lahir');
			$crud->display_as('dob','Tanggal Lahir');
			$crud->display_as('status_baptis','Baptis');
			$crud->display_as('status_sidi','Naik Sidi');
			$crud->display_as('status_nikah','Menikah');
			$crud->display_as('tanggal_nikah','Tanggal Menikah');
			$crud->set_subject('Data Jemaat');

			$crud->required_fields('id');

			//$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}

}