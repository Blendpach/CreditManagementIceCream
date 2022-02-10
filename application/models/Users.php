<?php
class Users extends CI_Model
{
    public function validate()
    {
        $arr['user_nic'] = $this->input->post('nic');
		$arr['user_password'] = md5($this->input->post('password'));
		
        return $this->db->get_where('users', $arr)->row();
    }

    
    public function popupbox() {
		echo ' <script > ';
		echo ' alert("Hello\nHow are you?"); ';
		echo '</script>';
	}
	
	public function new_user_insert(){

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
	   $user_name  = $this->input->post('user_name');
	   $user_password  = $this->input->post('user_password');
	   $user_date  = $this->input->post('user_nic');
	   $user_nic  = $this->input->post('user_nic');
	   $user_role  = $this->input->post('user_role');
	   $user_tpno  = $this->input->post('user_tpno');
	   $user_eno  = $this->input->post('user_eno');
	   $user_address  = $this->input->post('user_address');
	   $user_note  = $this->input->post('user_note');
	   $user_updatetime  = $this->input->post('user_updatetime');
	   $user_updateid  = $this->input->post('user_updateid');

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
            'user_tpno' => $user_tpno,
			'user_eno' => $user_eno,
			'user_address' => $user_address,
            'user_note' => $user_note,
            'user_updatetime' => $user_updatetime,
            'user_updateid' => $user_updateid,
               );
        
            $this->db->insert('users',$insert_to_users);


            return true;

	}
	public function retrieve_all_company_list()
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

    public function retrieve_all_company_BR_list()
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

}
