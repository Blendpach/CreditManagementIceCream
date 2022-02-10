<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin'))
			redirect('portal/home');
	}

	function index()
	{
		$this->load->view('templates/headerlogin');

		$this->load->view('pages/login');
		$this->load->view('templates/footerlogin');
	}

	function verify()
	{
		$this->load->model('users');
		//$roleid = $this->users->checksession();
		$check = $this->users->validate();
		$this->load->model('sessionass');
		$roleid = $this->sessionass->checksession();
		$userstatus = $this->sessionass->retriveuserstatus();
		$this->session->set_userdata('LOGGED_USER_ROLE_ID', $roleid);
		//$userstatus = "1";


		//  $passed_nic_to_login_page = $this->sessionass->pass_logged_user_stnic();
		//  $this->session->set_userdata('passed_user_nic',$passed_nic_to_login_page);



		$director_data = array();
		$director_data = $this->sessionass->retrieve_director_registry();

		$this->session->set_userdata('passed_user_name', $director_data[0]);
		$this->session->set_userdata('passed_user_national', $director_data[1]);
		$this->session->set_userdata('passed_user_address', $director_data[2]);


		//retrieve all company list for admin
		$this->load->model('users');
		$comp_list_for_admin = array();
		$comp_list_for_admin = $this->users->retrieve_all_company_list();
		$this->session->set_userdata('user_name_list', $comp_list_for_admin);

		//retrieve all company list for admin
		$comp_BRNO_list_for_admin = array();
		$comp_BRNO_list_for_admin = $this->users->retrieve_all_company_BR_list();
		$this->session->set_userdata('user_nic_list', $comp_BRNO_list_for_admin);

		if ($userstatus == "1") {



			if ($check) {
					//$roleid = 1;
					switch ($roleid) {
						case "1":

							$this->session->set_userdata('admin', '1');
							$this->session->set_flashdata('success', 'You Have Logged in Successfuly <br> Role :- Super Administrator ');
							redirect('portal/home');

							break;

						case "22":
							$this->session->set_userdata('admin22', '22');
							$this->session->set_flashdata('success', 'You Have Logged in Successfuly <br> Role :- Administrator');
							redirect('portal/home');
							break;

						

						default:
							//$this->session->set_userdata('admin','1');
							// $this->session->set_userdata('admin','1');
							$this->session->set_flashdata('error', 'User Role not assigned Properly.<br> Please Contact System Administrator ');
							redirect('dashboard/login');
					}
				} else {
					$this->session->set_flashdata('error', ' Please enter correct details and try again !');
					redirect('dashboard/login');
				}
		} else {
				$this->session->set_flashdata('error', 'User Account Not Exsist or Disabled. Please Contact Administrator');
				redirect('dashboard/login');
			}
	}
}
