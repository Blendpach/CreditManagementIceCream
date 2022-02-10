<?php
class AddUser extends CI_Model
{
public	function new_user_insert(){

		$user_name = "";
		$user_password = "";
		$user_date = "";
		$user_nic = "";
		$user_role = "";
		$user_tpno = "";
		$user_eno = "";
		$user_address = "";
		$user_note = "";
		$user_updatetime = "";
		$user_updateid = "";
		$user_crid = "";
		$user_status = "1";
	   $user_name  = $this->input->post('user_name');
	   $user_password  = $this->input->post('user_password');
	   $user_date  = $this->input->post('user_date');
	   $user_nic  = $this->input->post('user_nic');
	   $user_role  = $this->input->post('user_role');
	   $user_tpno  = $this->input->post('user_tpno');
	   $user_eno  = $this->input->post('user_eno');
	   $user_address  = $this->input->post('user_address');
	   $user_note  = $this->input->post('user_note');
	   $user_updatetime  = $this->input->post('user_updatetime');
	   $user_updateid  = $this->input->post('user_updateid');
	   $user_crid  = $this->input->post('user_crid');

    //    $email_post = $this->input->post('email');
    //    $passwrod = $this->input->post('password');

    //    $designation = $this->input->post('designation_select_dropdown');
    //    $c_br_no = $this->input->post('company_dropdown');
      
        $hashed_pwrd = md5($user_password);


        // $this->db->select('st_name,st_nic')->from('stakeholder')->where('st_email', $email_post);
        // $query4 = $this->db->get();

        // if ($query4->num_rows() > 0) {          

		// 	$u_name = $query4->row()->st_name;
        //     $u_nic = $query4->row()->st_nic;

        // }

        $insert_to_users = array(

            'user_name' => $user_name,
            'user_password' => $hashed_pwrd, 
            'user_date' => $user_date,
            'user_nic' => $user_nic, // meka ayn krnna. mekata oen field eka passe dagnna. passwrod eka blgnn one nisa meka damme
			'user_role' => $user_role,
			'user_crid' => $user_crid,
            'user_tpno' => $user_tpno,
			'user_eno' => $user_eno,
			'user_address' => $user_address,
            'user_note' => $user_note,
            'user_updatetime' => $user_updatetime,
			'user_updateid' => $user_updateid,
			'user_status' => $user_status,
               );
        
            $this->db->insert('users',$insert_to_users);


            return true;

	}

	public function user_nic_verifi()
    {
        $arr['user_nic'] = $this->input->post('nic');
		// $arr['user_password'] = md5($this->input->post('password'));
		
        return $this->db->get_where('users', $arr)->row();
    }


	public	function new_role_insert(){

		$role_name = "";
		
		$role_desc = "";
		$role_utime = "";
		$role_uid = "";
		$role_crid = "";
		$role_ctime = "";
		$role_snote = "";

		$role_name  = $this->input->post('role_id');
		$role_desc  = $this->input->post('role_description');
		$role_utime  = $this->input->post('user_updatetime');
		$role_uid  = $this->input->post('user_updateid');
		$role_crid  = $this->input->post('user_crid');
		$role_ctime  = $this->input->post('user_date');
		$role_snote = $this->input->post('role_specialnote');


        $insert_to_roles = array(

            'role_name' => $role_name,
            
            'role_description' => $role_desc,
            'role_updatetime' => $role_utime, // meka ayn krnna. mekata oen field eka passe dagnna. passwrod eka blgnn one nisa meka damme
			'role_updateid' => $role_uid,
			'role_createid' => $role_crid,
            'role_createtime' => $role_ctime,
			'role_specialnote' => $role_snote,
			
               );
        
            $this->db->insert('userroles',$insert_to_roles);


            return true;

	}
	
    function getUsers()
    {
        // $c_br_no = $this->input->post('company_dropdown');

        $users_DATA = array();

        $respond = $this->db->get('users');


             // $this->db->select('*')->from('banks_list_resolution');
        // $respond  = $this->db->get();

        if($respond->num_rows() > 0){

            foreach($respond->result() as $row){

                $user_detail = array();

                $user_id=$row->user_id;
                $user_name=$row->user_name;
                $user_date=$row->user_date;
                $user_nic=$row->user_nic;
                $user_role=$row->user_role;
                $user_tpno=$row->user_tpno;
                $user_eno=$row->user_eno;
                $user_address=$row->user_address;
				$user_note=$row->user_note;
				$user_updatetime=$row->user_updatetime;
                $user_updateid=$row->user_updateid;
                
                              
                    array_push($user_detail,$user_id);
                    array_push($user_detail,$user_name);
                    array_push($user_detail,$user_date);
                    array_push($user_detail,$user_nic);
                    array_push($user_detail,$user_role);
                    array_push($user_detail,$user_tpno);
                    array_push($user_detail,$user_eno);
                    array_push($user_detail,$user_address);
					array_push($user_detail,$user_note);
					array_push($user_detail,$user_updatetime);
                    array_push($user_detail,$user_updateid);
                   
               
                array_push($users_DATA,$user_detail);

            }

            if(isset($_SESSION['users_list_for_view'])){
                unset($_SESSION['users_list_for_view']);
            }
            $_SESSION['users_list_for_view'] = $users_DATA;
          //  $this->session->set_userdata('banks_list_of_company', $banks);

            return true;
            
        }
        
    
         

	}
	
	function removeusers(){

		$usernic = $this->input->post("user_dropdown");
	
			$bbb = array('c_br_no' => $_SESSION['company_selected'] , 'st_nic' => $usernic);

			$this->db->select('st_nic')->from('users')->where($bbb);
			$queryA = $this->db->get();
		
			if ($queryA->num_rows() > 0) { 
				$this->db->where($bbb);
				$this->db->delete('users');
	
				return true;
			}else {
				return false;
			}
						
		
	}

	public	function deleteuser(){

		$user_nic = "";

		
	

		$user_nic  = $this->input->post('user_nic');

		//$bbb = array('user_nic' => $user_nic);

        
		$this->db->where('user_nic',$user_nic);
		$this->db->delete('users');


            return true;

	}


	public	function edituser(){

		$user_nic = "";
		$user_name = "";
		$user_address = "";
		$user_eno = "";
		$user_tpno = "";
		$user_note = "";
		//$user_password = "";
		$user_updateid = "";
		$user_updatetime = "";
		$user_status = "";

		$user_nic  = $this->input->post('user_nic');
		$user_name  = $this->input->post('user_name');
		$user_address  = $this->input->post('user_address');
		$user_eno  = $this->input->post('user_eno');
		$user_tpno  = $this->input->post('user_tpno');
		$user_note  = $this->input->post('user_note');
		//$user_password = $this->input->post('user_password1');
		$user_updateid  = $this->input->post('user_updateid');
		$user_updatetime = $this->input->post('user_updatetime');
		$user_status = $this->input->post('user_status');

		//$hashed_pwrd = md5($user_password);

        $edit_to_users = array(

            'user_nic' => $user_nic,
            
            'user_name' => $user_name,
            'user_address' => $user_address, 
			'user_eno' => $user_eno,
			'user_tpno' => $user_tpno,
            'user_note' => $user_note,
			//'user_password' => $hashed_pwrd,
			'user_updateid' => $user_updateid,
			'user_updatetime' => $user_updatetime,
			'user_status' => $user_status,
			
               );
        
		
			// $this->db->set($edit_to_users);
			// $this->db->where('user_nic', $user_nic);
			// $this->db->update('users');  
			
			$this->db->where('user_nic', $user_nic);
			$this->db->update('users',$edit_to_users);

            return true;

	}

	public	function edituserrole(){

		$role_name = "";
		$role_id ="";
		$role_desc = "";
		$role_utime = "";
		$role_uid = "";
		$role_snote = "";


		$role_id = $this->input->post('role_id');
		$role_name  = $this->input->post('role_name');
		$role_desc  = $this->input->post('role_description');
		$role_utime  = $this->input->post('user_updatetime');
		$role_uid  = $this->input->post('user_updateid');
		$role_snote = $this->input->post('role_specialnote');

		

        $edit_to_userroles = array(

            'role_id' => $role_id,
            
            'role_name' => $role_name,
            'role_description' => $role_desc, 
			'role_updatetime' => $role_utime,
			'role_updateid' => $role_uid,
            'role_specialnote' => $role_snote,
			
               );
        
		
			// $this->db->set($edit_to_users);
			// $this->db->where('user_nic', $user_nic);
			// $this->db->update('users');  
			
			$this->db->where('role_id', $role_id);
			$this->db->update('userroles',$edit_to_userroles);

            return true;

	}

	


	public	function assignrole(){

		$user_nic = "";
		$user_role = "";
		$user_updatetime = "";
		$user_updateid = "";
		

		$user_nic  = $this->input->post('get_user_list');
		$user_role  = $this->input->post('selected_role');
		$user_updatetime  = $this->input->post('user_updatetime');
		$user_updateid  = $this->input->post('user_updateid');
		
		

        $assign_role = array(

            
            
            'user_role' => $user_role,
            'user_updatetime' => $user_updatetime, 
			'user_updateid' => $user_updateid,
			
			
               );
        
		
			  
			
			$this->db->where('user_nic', $user_nic);
			$this->db->update('users',$assign_role);

            return true;

	}
	public	function assignproperty(){

		$user_id = "";
		$pro_id = "";
		$uap_cdat = "";
		$uap_cid = "";
		$uap_udate = "";
		$uap_uid = "";

		$user_id  = $this->input->post('get_user_list');
		$pro_id  = $this->input->post('selected_role');
		$uap_cdat  = $this->input->post('uap_cdate');
		$uap_cid  = $this->input->post('uap_cid');
		$uap_udate  = $this->input->post('uap_udate');
		$uap_uid  = $this->input->post('uap_uid');
		
		

        $assign_role = array(

            
            
            'user_id' => $user_id,
            'pro_id' => $pro_id, 
			'uap_cdate' => $uap_cdat,			
            'uap_cid' => $uap_cid,
            'uap_udate' => $uap_udate, 
			'uap_uid' => $uap_uid,
			
			
			
               );
        
		
			  
			
			   $this->db->insert('user_assign_property',$assign_role);


			   return true;

            return true;

	}


	public	function changepassword(){

		$user_nic = "";
		$user_password = "";
		$user_updatetime ="";
		$user_updateid ="";
		

		$user_nic  = $this->input->post('user_nic');
		$user_password  = $this->input->post('user_password1');
		$user_updatetime  = $this->input->post('user_updatetime');
		$user_updateid  = $this->input->post('user_updateid');
		
		$hashed_pwrd = md5($user_password);

        $update_password = array(

            
            
			'user_nic' => $user_nic,
			'user_password' => $hashed_pwrd,
			
            'user_updatetime' => $user_updatetime, 
			'user_updateid' => $user_updateid,
			
			
               );
        
		
			  
			
			$this->db->where('user_nic', $user_nic);
			$this->db->update('users',$update_password);

            return true;

	}

	public	function updateassign(){

		$selected_role1 = "";
		$uap_udate = "";
		$uap_uid ="";
		$id  ="";
		

		$id  = $this->input->post('id');
		$selected_role1  = $this->input->post('selected_role1');
		$uap_udate  = $this->input->post('uap_udate');
		$uap_uid  = $this->input->post('uap_uid');
		

        $update_password = array(            
            
			'pro_id' => $selected_role1,
			'uap_udate' => $uap_udate,			
            'uap_uid' => $uap_uid, 		
			
               );
        
		
			  
			
			$this->db->where('id', $id);
			$this->db->update('user_assign_property',$update_password);

            return true;

	}
	public	function deleteuserrole(){

		

		
	

		$role_id  = $this->input->post('role_id');

		//$bbb = array('user_nic' => $user_nic);

        
		$this->db->where('role_id',$role_id);
		$this->db->delete('userroles');


            return true;

	}

	

    function load_user_from_db($passed_nic){

		$d_array = array();
		
		$this->db->select('*')->from('users')->where('user_nic',$passed_nic);
		$queryEE = $this->db->get();
	
		if ($queryEE->num_rows() > 0) {
	
			$d_array[0]= $queryEE->row()->user_nic;
			$d_array[1]= $queryEE->row()->user_name;
			// $d_array[2]= $queryEE->row()->user_role;
			$d_array[2]= $queryEE->row()->user_tpno;
			$d_array[3]= $queryEE->row()->user_eno;
			$d_array[4]= $queryEE->row()->user_address;
			$d_array[5]= $queryEE->row()->user_note;
			$d_array[6]= $queryEE->row()->user_status;
	
			return $d_array;
	}
			else{
	
			 return "no";
			
			}
	
	
	 }

	 

	 function more_user_details($passed_nic){

		$d_array = array();
		
		$this->db->select('*')->from('users')->where('user_nic',$passed_nic);
		$queryEE = $this->db->get();
	
		if ($queryEE->num_rows() > 0) {
	
			$d_array[0]= $queryEE->row()->user_nic;
			$d_array[1]= $queryEE->row()->user_name;
			$d_array[2]= $queryEE->row()->user_date;
			$d_array[3]= $queryEE->row()->user_role;
			$d_array[4]= $queryEE->row()->user_tpno;
			$d_array[5]= $queryEE->row()->user_eno;
			$d_array[6]= $queryEE->row()->user_address;
			$d_array[7]= $queryEE->row()->user_note;
			$d_array[8]= $queryEE->row()->user_updatetime;
			$d_array[9]= $queryEE->row()->user_updateid;
			$d_array[10]= $queryEE->row()->user_crid;
			$d_array[11]= $queryEE->row()->user_status;
			
	
			return $d_array;
	}
			else{
	
			 return "no";
			
			}
	
	
	 }


	 function load_role_from_db($passed_nic){

		$d_array = array();
		
		$this->db->select('*')->from('userroles')->where('role_id',$passed_nic);
		$queryEE = $this->db->get();
	
		if ($queryEE->num_rows() > 0) {
	
			$d_array[0]= $queryEE->row()->role_specialnote;
			$d_array[1]= $queryEE->row()->role_name;
			$d_array[2]= $queryEE->row()->role_desc;
	
			return $d_array;
	}
			else{
	
			 return "no";
			
			}
	
	
	 }


	 function load_role_from_db1($passed_nic){

		$d_array = array();
		
		$this->db->select('*');
		$this->db->from('property');
		$this->db->join('user_assign_property', 'user_assign_property.pro_id = property.pro_id');
		$this->db->where('user_assign_property.user_id' , $passed_nic);
		// $this->db->select('*')->from('user_assign_property')->where('user_id',$passed_nic);
		$queryEE = $this->db->get();
	
		if ($queryEE->num_rows() > 0) {
	
		
			$d_array[0]= $queryEE->row()->pro_name;
			$d_array[1]= $queryEE->row()->id;
	
			return $d_array;
	}
			else{
	
			 return "no";
			
			}
	
	
	 }
	 

	 

	 public function retrieve_all_user_list()
	 {
 
		 $this->db->select('user_name')->from('users');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray[$i] = $row1->user_name;
				 $i++;
			 }
 
			 return $myarray;
 
		 }
 
		 return false;
 
	 }
 
	 public function retrieve_all_nic_list()
	 {
 
		 $this->db->select('user_nic')->from('users');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray2 = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray2[$i] = $row1->user_nic;
				 $i++;
			 }
 
			 return $myarray2;
 
		 }
 
		 return false;
 
	 }
	 public function retrieve_all_user_status()
	 {
 
		 $this->db->select('user_status')->from('users');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray2 = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray2[$i] = $row1->user_status;
				 $i++;
			 }
 
			 return $myarray2;
 
		 }
 
		 return false;
 
	 }
	 public function retrieve_all_eno_list()
	 {
 
		 $this->db->select('user_eno')->from('users');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray[$i] = $row1->user_eno;
				 $i++;
			 }
 
			 return $myarray;
 
		 }
 
		 return false;
 
	 }
	 public function retrieve_all_tpno_list()
	 {
 
		 $this->db->select('user_tpno')->from('users');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray[$i] = $row1->user_tpno;
				 $i++;
			 }
 
			 return $myarray;
 
		 }
 
		 return false;
 
	 }
	 public function retrieve_all_roleid_list()
	 {
 
		 $this->db->select('user_role')->from('users');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray[$i] = $row1->user_role;
				 $i++;
			 }
 
			 return $myarray;
 
		 }
 
		 return false;
 
	 }
	 
	 public function retrieve_all_statues_list()
	 {
 
		 $this->db->select('user_status')->from('users');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray[$i] = $row1->user_status;
				 $i++;
			 }
 
			 return $myarray;
 
		 }
 
		 return false;
 
	 }
	 
	 public function retrieve_all_id_list()
	 {
 
		 $this->db->select('user_id')->from('users');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray[$i] = $row1->user_id;
				 $i++;
			 }
 
			 return $myarray;
 
		 }
 
		 return false;
 
	 }



// methana nbkn




	 public function retrieve_all_role_list()
	 {
 
		 $this->db->select('user_role')->from('users');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray2 = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray2[$i] = $row1->user_role;
				 $i++;
			 }
 
			 return $myarray2;
 
		 }
 
		 return false;
 
	 }

	 public function retrieve_all_role_id_list()
	 {
 
		 $this->db->select('role_id')->from('userroles');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray2 = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray2[$i] = $row1->role_id;
				 $i++;
			 }
 
			 return $myarray2;
 
		 }
 
		 return false;
 
	 }
	 public function retrieve_all_role_name_list()
	 {
 
		 $this->db->select('role_name')->from('userroles');
 
		 $query = $this->db->get();
 
		 if ($query->num_rows() > 0) {
			 $i = 0;
			 $myarray2 = array();
 
			 foreach ($query->result() as $row1) {
				 $myarray2[$i] = $row1->role_name;
				 $i++;
			 }
 
			 return $myarray2;
 
		 }
 
		 return false;
 
	 }

	 public function verifyassign()
	 {

		// $user_id  = $this->input->post('get_user_list');
		// $pro_id  = $this->input->post('selected_role');
		 $arr['user_id'] = $this->input->post('get_user_list');
		//  $arr['pro_id'] = $this->input->post('selected_role');
		 
		 return $this->db->get_where('user_assign_property', $arr)->row();
	 }

}
