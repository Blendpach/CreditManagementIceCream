<?php

class sessionass extends CI_Model{



	function checksession()
	{
		$user_nic = $this->input->post('nic');
		
	    $this->db->select('user_role')->from('users')->where('user_nic',$user_nic);
		$query = $this->db->get();
   
		if ($query->num_rows() > 0) {
			return $query->row()->user_role;
		}
		return false;


	}
	

	function retriveuserstatus()
	{
		$user_nic = $this->input->post('nic');
		
	    $this->db->select('user_status')->from('users')->where('user_nic',$user_nic);
		$queryqw = $this->db->get();
   
		if ($queryqw->num_rows() > 0) {
			return $queryqw->row()->user_status;
		}
		return false;


	}


	function pass_logged_user(){

		$passed_nic = $this->input->post('nic');
		
		$this->db->select('user_nic')->from('users')->where('user_nic',$passed_nic);
   
		$query11 = $this->db->get();
   
		if ($query11->num_rows() > 0) {
			return $query11->row()->user_nic;
		}
		return false;
   }

   
	function pass_logged_user_stnic(){

		$passed_stnic = $this->input->post('nic');
		
		$this->db->select('user_nic')->from('users')->where('user_nic',$passed_stnic);
   
		$query22 = $this->db->get();
   
		if ($query22->num_rows() > 0) {
			return $query22->row()->st_nic;
		}
		return false;
   }


   function retrieve_director_registry(){
	$nic_passed = $this->input->post('nic');
	$this->db->select('user_name,user_nic,user_role')->from('users')->where('user_nic',$nic_passed);

	$query33 = $this->db->get();

	if ($query33->num_rows() > 0) {

		

		$aa = $query33->row()->user_name;
		$bb = $query33->row()->user_nic;
		$cc = $query33->row()->user_role;
		

		$mmaray = array($aa,$bb,$cc);

		return $mmaray;
		
}

return false;

	}


	function retrieve_logged_person_company_list($nic_passed){

		$this->db->select('c_br_no')->from('is_stakeholder')->where('st_nic',$nic_passed);
	
		$query12 = $this->db->get();
	
		if ($query12->num_rows() > 0) {
			// this is loading if only the person nic is in director table
			$i = 0;
			$myarray = array();
		
			foreach ($query12->result() as $row1)
				{
				$myarray[$i] = $row1->c_br_no;
				$i++;
				}
							
			return $myarray;
		
	}
	
	return false;
	
		}




		function check_designation_director_istrue($nic_passed){

			$this->db->select('c_br_no')->from('is_director')->where('st_nic',$nic_passed);
				$query111 = $this->db->get();
				if ($query111->num_rows() > 0) {
					$i = 0;
					$myarray5 = array();
						foreach ($query111->result() as $row22)
						{
						$myarray5[$i] = $row22->c_br_no;
						$i++;
						}									
					return $myarray5;
				}
				else
				{
					return 0;
				}



			

			
		}


		function check_designation_secretary_istrue($nic_passed){

			
			

				$this->db->select('c_br_no')->from('is_secretary')->where('st_nic',$nic_passed);
				$query222 = $this->db->get();
				if ($query222->num_rows() > 0) {
					$i = 0;
					$myarray6 = array();
						foreach ($query222->result() as $row33)
						{
						$myarray6[$i] = $row33->c_br_no;
						$i++;
						}									
					return $myarray6;
				}

			
			else {	
				return 0 ;			
			}

			
		}



		function check_designation_shareholder_istrue($nic_passed){

		

				$this->db->select('c_br_no')->from('is_stakeholder')->where('st_nic',$nic_passed);
				$query333 = $this->db->get();
				if ($query333->num_rows() > 0) {
					$i = 0;
					$myarray7 = array();
						foreach ($query333->result() as $row44)
						{
						$myarray7[$i] = $row44->c_br_no;
						$i++;
						}									
					return $myarray7;
				}			
			else {	
				return 0 ;			
			}

			
		}


				



}
	


		


