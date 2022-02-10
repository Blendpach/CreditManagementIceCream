<?php
class Setups extends CI_Model
{

    public function add_lorry()
    {

        $lor_name = "";
        $lor_detail = "";
        $lor_cid = "";

        $lor_name = $this->input->post('lor_name');
        $lor_detail = $this->input->post('lor_detail');
        $lor_cid = $this->session->userdata('passed_user_national');

        $insert_to_lorry = array(

            'lor_name' => $lor_name,
            'lor_detail' => $lor_detail,
            'lor_cid' => $lor_cid,

        );

        $this->db->insert('lorry', $insert_to_lorry);

        return true;
    }

    public function assign_salesRep_lorry()
    {

        $assign_lor_id = "";
        $assign_emp_id = "";
        $assign_emp_role_id = "";
        $assign_cid = $this->session->userdata('passed_user_national');

        $assign_emp_id = $this->input->post('assign_emp_id');
        $assign_lor_id = $this->input->post('assign_lor_id');
        $assign_emp_role_id = $this->input->post('assign_emp_role_id');

        $insert_to_lorrysalesrep = array(

            'assign_emp_id' => $assign_emp_id,
            'assign_lor_id' => $assign_lor_id,
            'assign_emp_role_id' => $assign_emp_role_id,
            'assign_cid' => $assign_cid,
        );

        $this->db->insert('lorry_assign', $insert_to_lorrysalesrep);

        return true;
    }

    public function add_emp()
    {

        $emp_id = "";
        $emp_nic = "";
        $emp_name = "";
        $emp_contact = "";
        $emp_email = "";
        $emp_cid = "";
        $emp_lorry = "";

        $emp_lorry = $this->input->post('emp_lorry');
        // $emp_id = $this->input->post('emp_id');
        $emp_role_id = $this->input->post('emp_role_id');
        $emp_nic = $this->input->post('emp_nic');
        $emp_name = $this->input->post('emp_name');
        $emp_contact = $this->input->post('emp_contact');
        $emp_email = $this->input->post('emp_email');
        $emp_cid = $this->session->userdata('passed_user_national');
        $emp_basic = $this->input->post('emp_salary');
        $emp_rate = $this->input->post('emp_bonus');


        $insert_to_emp = array(

            // 'emp_id' => $emp_id,
            'emp_role_id' => $emp_role_id,
            'emp_nic' => $emp_nic,
            'emp_name' => $emp_name,
            'emp_contact' => $emp_contact,
            'emp_email' => $emp_email,
            'emp_cid' => $emp_cid,
            'emp_lorry' => $emp_lorry,
            'emp_basic' => $emp_basic,
            'emp_rate' => $emp_rate,

        );

        $this->db->insert('employers', $insert_to_emp);

        return true;
    }

    public function get_lorry()
    {
        return $this->db->get('lorry')->result();
    }

    public function pro_validate()
    {
        $arr['pro_sku'] = $this->input->post('pro_sku');


        return $this->db->get_where('product', $arr)->row();
    }

    public function add_pro()
    {

        $pro_name = "";
        $pro_sku = "";
        $pro_desc = "";
        $pro_cid = "";
        $pro_date = "";
        $pro_active = 0;

        $pro_name = $this->input->post('pro_name');

        $pro_sku = $this->input->post('pro_sku');
        $pro_desc = $this->input->post('pro_desc');
        $pro_cid = $this->session->userdata('passed_user_national');
        $pro_date = $this->input->post('pro_date');
        // $pro_active = $this->input->post('pro_active');



        $insert_to_emp = array(

            // 'emp_id' => $emp_id,
            'pro_name' => $pro_name,
            'pro_sku' => $pro_sku,
            'pro_desc' => $pro_desc,
            'pro_cid' => $pro_cid,
            'pro_date' => $pro_date,
            'pro_active' => $pro_active,


        );

        $this->db->insert('product', $insert_to_emp);

        return true;
    }

    public function get_pro()
    {
        return $this->db->get('product')->result();
    }

    public function get_salesEmp()
    {
        $arr['emp_role_id'] = EMP_ROLE_SALES_REP;
        return $this->db->get_where('employers', $arr)->result();
    }

    public function get_collectorEmp()
    {
        $arr['emp_role_id'] = EMP_ROLE_COLLECTORS;
        return $this->db->get_where('employers', $arr)->result();
    }

    public function get_emp()
    {
        return $this->db->select('*')->from('employers')->join('lorry', 'lorry.lor_id = employers.emp_lorry')->get()->result();
    }

    public function get_assignedSalesRep()
    {
        $arr['assign_emp_role_id'] = EMP_ROLE_SALES_REP;
        return $this->db->get_where('lorry_assign', $arr)->result();
    }

    public function get_assignedCollectors()
    {
        $arr['assign_emp_role_id'] = EMP_ROLE_COLLECTORS;
        return $this->db->get_where('lorry_assign', $arr)->result();
    }

    public function get_emp_by_id($emp_id)
    {
        $arr['emp_id'] = $emp_id;
        return $this->db->get_where('employers', $arr)->result();
    }

    public function get_pro_by_id($pro_id)
    {
        $arr['pro_id'] = $pro_id;
        return $this->db->get_where('product', $arr)->result();
    }

    public function get_assignedById($record_id)
    {
        $arr['assign_record_id'] = $record_id;
        return $this->db->get_where('lorry_assign', $arr)->result();
    }

    public function delete_product()
    {

        $lor_id = "";

        $lor_id = $this->input->post('lor_id');

        $this->db->where('lor_id', $lor_id);
        $this->db->delete('lorry');

        return true;
    }

    public function change_lorry_status()
    {
        $lor_status = "";
        $lor_status = $this->input->post('lor_status');
        $lor_id = $this->input->post('lor_id');

        $update_lorry = array(
            'lor_active' => $lor_status,
        );

        $this->db->where('lor_id', $lor_id);
        $this->db->update('lorry', $update_lorry);
        return true;
    }

    public function change_pro_status()
    {

        $pro_id = $this->input->post('pro_id');
        $pro_active = $this->input->post('pro_active');

        if ($pro_active == 0) {
            $pro_active_new = 1;
        } else if ($pro_active == 1) {

            $pro_active_new = 0;
        }

        $update_product = array(
            'pro_active' => $pro_active_new,
        );

        $this->db->where('pro_id', $pro_id);
        $this->db->update('product', $update_product);
        return true;
    }

    public function get_lorry_by_id($lor_id)
    {
        $arr['lor_id'] = $lor_id;
        return $this->db->get_where('lorry', $arr)->result();
    }
    public function change_emp_status()
    {
        $emp_status = "";
        $emp_status = $this->input->post('emp_status');
        $emp_id = $this->input->post('emp_id');

        $update_emp = array(
            'emp_active' => $emp_status,
        );

        $this->db->where('emp_id', $emp_id);
        $this->db->update('employers', $update_emp);

        return true;
    }

    public function update_lorry()
    {
        $lor_name = "";
        $lor_detail = "";
        $lor_date = "";
        $lor_cid = "";

        $lor_name = $this->input->post('lor_name');
        $lor_detail = $this->input->post('lor_detail');
        $lor_date = $this->input->post('updated_date');
        $lor_cid = $this->session->userdata('passed_user_national');

        $lor_id = $this->input->post('lor_id');

        $update_lorry = array(
            'lor_name' => $lor_name,
            'lor_detail' => $lor_detail,
            'lor_date' => $lor_date,
            'lor_cid' => $lor_cid,
        );

        $this->db->where('lor_id', $lor_id);
        $this->db->update('lorry', $update_lorry);

        return true;
    }

    public function update_assignSaleRep()
    {
        $assign_lor_id = "";
        $assign_date = "";
        $assign_cid = "";

        $assign_lor_id = $this->input->post('assign_lor_id');
        $assign_date = $this->input->post('updated_date');
        $assign_cid = $this->session->userdata('passed_user_national');

        $lor_id = $this->input->post('lor_id');

        $update_lorry = array(
            'assign_lor_id' => $assign_lor_id,
            'assign_date' => $assign_date,
            'assign_cid' => $assign_cid,
        );

        $this->db->where('assign_lor_id', $lor_id);
        $this->db->update('lorry_assign', $update_lorry);

        return true;
    }

    public function update_emp($emp_role_id)
    {
        $emp_id = "";
        $emp_name = "";
        $emp_nic = "";
        $emp_contact = "";
        $emp_email = "";
        $emp_date = "";
        $emp_cid = "";
        //$emp_lorry = "";

        $emp_id = $this->input->post('emp_id');
        $emp_name = $this->input->post('emp_name');
        $emp_nic = $this->input->post('emp_nic');
        $emp_contact = $this->input->post('emp_contact');
        $emp_email = $this->input->post('emp_email');
        $emp_date = $this->input->post('emp_date');
        $emp_cid = $this->session->userdata('passed_user_national');
        //$emp_lorry = $this->session->userdata('emp_lorry');

        $update_emp = array(
            'emp_name' => $emp_name,
            'emp_nic' => $emp_nic,
            'emp_contact' => $emp_contact,
            'emp_email' => $emp_email,
            'emp_date' => $emp_date,
            'emp_cid' => $emp_cid,
            //'emp_lorry' => $emp_lorry,
        );

        $where_arr = array(
            'emp_id' => $emp_id,
            'emp_role_id' => $emp_role_id,
        );

        $this->db->where($where_arr);
        $this->db->update('employers', $update_emp);

        return true;
    }

    public function update_pro()
    {
        $pro_name = "";
        $pro_sku = "";
        $pro_desc = "";
        $pro_cid = "";
        $pro_date = "";
        $pro_active = 0;

        $pro_id = $this->input->post('pro_id');
        $pro_name = $this->input->post('pro_name');
        $pro_sku = $this->input->post('pro_sku');
        $pro_desc = $this->input->post('pro_desc');
        $pro_cid = $this->session->userdata('passed_user_national');
        $pro_date = $this->input->post('pro_date');
        // $pro_active = $this->input->post('pro_active');



        $insert_to_emp = array(

            // 'emp_id' => $emp_id,
            'pro_name' => $pro_name,
            'pro_sku' => $pro_sku,
            'pro_desc' => $pro_desc,
            'pro_cid' => $pro_cid,
            'pro_date' => $pro_date,
            'pro_active' => $pro_active,


        );
        $this->db->where('pro_id', $pro_id);
        $this->db->update('product', $insert_to_emp);

        return true;
    }

    public function delete_lorry()
    {
        $lorry_id = "";
        $lorry_id = $this->input->post('lor_id');

        $this->db->where('lor_id', $lorry_id);
        $this->db->delete('lorry');
        return true;
    }

    public function delete_emp()
    {
        $emp_id = "";
        $emp_id = $this->input->post('emp_id');

        $this->db->where('emp_id', $emp_id);
        $this->db->delete('employers');
        return true;
    }
}
