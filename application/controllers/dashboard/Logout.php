<?php
class logout extends CI_Controller
{
	function index()
	{
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('admin22');
		$this->session->unset_userdata('bm33');
		$this->session->unset_userdata('pm44');
		$this->session->unset_userdata('pc55');
		$this->session->unset_userdata('or66');
		$this->session->unset_userdata('or77');
		$this->session->unset_userdata('or88');

		
		session_destroy();

		redirect('dashboard/login');

			//session_destroy();
	}

}
