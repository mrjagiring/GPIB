<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secure extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('secure_model');
		$this->load->model('berita/berita_model');
	}
	
	public function index() {
		show_404();
	}
	
	public function register() {
		// create the data object
		$data = new stdClass();
		$data->cssPage ='';	
		$data->jsPage = '';
		
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[tbl_users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			// validation not ok, send validation errors to the view
			$this->load->view('admin/header',$data);
			$this->load->view('register',$data);
			$this->load->view('admin/footer',$data);
		} else {
			// set variables from the form
			$user = array(
				'fullname'   => $this->input->post('fullname'),
				'username'   => $this->input->post('username'),
				'email'      => $this->input->post('email'),
				'password'   => $this->input->post('password'),
				'created_at' => date('Y-m-j H:i:s'),
			);
			
			if ($this->secure_model->create_user($user)) {
				// user creation ok
				redirect('secure/users');
			} else {
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('admin/header',$data);
				$this->load->view('register',$data);
				$this->load->view('admin/footer',$data);
			}
		}
	}
		
	public function login() {
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			// validation not ok, send validation errors to the view
			$this->load->view('login');
		} else {
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->secure_model->resolve_user_login($username, $password)) {
				$user_id = $this->secure_model->get_user_id_from_username($username);
				$user    = $this->secure_model->get_user($user_id);

				//set the session variables
				$sessiondata = array(
					'user_id' => (int)$user->id,
					'username' => (string)$user->username,
					'fullname' => (string)$user->fullname,
					'logged_in' => (bool)true,
					'is_confirmed' => (bool)$user->is_confirmed,
					'is_admin' => (bool)$user->is_admin
				);
				$this->session->set_userdata($sessiondata);
				
				// user login ok
				redirect('secure/dashboard');
			} else {
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('login', $data);
			}
		}
	}
	
	public function logout() {
		
		// create the data object
		$data = new stdClass();

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$this->session->sess_destroy();
			redirect('secure/login');
		}
	}
	
	public function forgot() {
		$this->session->sess_destroy();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
	}

	public function dashboard() {
		$data['cssPage'] ='';
	
		$data['jsPage'] = '';

		$isLogin = $this->session->userdata('logged_in');
		if ($isLogin === TRUE) {
			$this->load->view('admin/header', $data);
			$this->load->view('dashboard');
			$this->load->view('admin/footer', $data);
		}else{
			redirect('secure/login');
		}
	}
}