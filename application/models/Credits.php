<?php
class Credits extends CI_Model
{

    public function retrieveEmp()
    {
        return $this->db->get('employers')->result();
    }

    public function retrieveCredit()
    {
        return $this->db->select('*')->from('credit')
            ->join('lorry', 'lorry.lor_id = credit.credit_lorry')
            ->join('employers', 'employers.emp_id = credit.credit_collect')->get()->result();
    }

    public function retrieveCreditDetails()
    {
        return $this->db->select('*')->from('credit_payments')
            ->join('lorry', 'lorry.lor_id = credit_payments.cp_lorry')
            ->join('employers', 'employers.emp_id = credit_payments.cp_collector')->get()->result();
    }

    public function retrieveCreditRemains()
    {
        return $this->db->get('credit')->result();
    }

    public function get_lorrysalesEmp()
    {
        $arr['emp_role_id'] = EMP_ROLE_SALES_REP;
        return $this->db->get_where('employers', $arr)->result();
    }

    public function get_lorrycollectorEmp()
    {
        $arr['emp_role_id'] = EMP_ROLE_COLLECTORS;
        return $this->db->get_where('employers', $arr)->result();
    }

    public function load_emp($emp_lorry)
    {

        $d_array = array();

        $arr = array(
            'emp_lorry' => $emp_lorry,
            'emp_active' => 1,
        );

        $this->db->select('*')->from('employers')->where($arr);

        $queryEE = $this->db->get()->result();

        return $queryEE;
    }

    public function load_credit_by_ID()
    {

        $inv_no = $this->input->post('inv_no');
        $arr['credit_id'] = $inv_no;
        // return $this->db->get_where('credit', $arr)->result();

        $this->db->select('*')->from('credit')->where($arr);
        $queryEE = $this->db->get();

        if ($queryEE->num_rows() > 0) {

            $d_array[0] = $queryEE->row()->credit_shop;
            $d_array[1] = $queryEE->row()->credit_date;
            $d_array[2] = number_format($this->checkRemainBal($inv_no), 2);
            $d_array[3] = $queryEE->row()->credit_amount;

            return $d_array;
        } else {

            return "no";
        }
    }

    public function load_collectors($emp_lorry)
    {

        $d_array = array();

        $arr = array(
            'emp_lorry' => $emp_lorry,
            'emp_role_id' => EMP_ROLE_COLLECTORS,
            'emp_active' => 1,
        );

        $this->db->select('*')->from('employers')->where($arr);
        $queryEE = $this->db->get();

        if ($queryEE->num_rows() > 0) {

            $d_array[0] = $queryEE->row()->emp_id;
            $d_array[1] = $queryEE->row()->emp_role_id;
            $d_array[2] = $queryEE->row()->emp_name;

            return $d_array;
        } else {

            return "no";
        }
    }

    public function check_if_not_exists($arr)
    {
        return $this->db->get_where('credit', $arr)->result();
    }

    public function uploadExcel()
    {

        if (isset($_POST["Import"])) {

            echo $filename = $_FILES["file"]["tmp_name"];

            if ($_FILES["file"]["size"] > 0) {

                $credit_date = "";
                $emp_lorry = "";
                $credit_collect = "";
                $emp_cid = "";

                $credit_date = $this->input->post('credit_date');
                $emp_lorry = $this->input->post('emp_lorry');
                $credit_collect = $this->input->post('credit_collect');
                $emp_cid = $this->session->userdata('passed_user_national');

                $file = fopen($filename, "r");
                $i = 0;
                while (($emapData = fgetcsv($file, 10000, ",")) !== false) {

                    if ($i == 0) {
                    } else {

                        $invoiceNo = $emapData[0];
                        $shopName = $emapData[1];
                        $creditAmount = $emapData[2];

                        $insert_to_exceldb = array(

                            'credit_lorry' => $emp_lorry,
                            'credit_collect' => $credit_collect,
                            'credit_date' => $credit_date,
                            'credit_cid' => $emp_cid,
                            'credit_invoice' => $invoiceNo,
                            'credit_shop' => $shopName,
                            'credit_amount' => $creditAmount,
                        );

                        $this->db->insert('credit', $insert_to_exceldb);

                        // $temp = $this->check_if_not_exists($insert_to_exceldb);

                        // if($temp){

                        // }else{
                        //     $this->db->insert('credit', $insert_to_exceldb);
                        // }

                        // $this->db->insert('credit', $insert_to_exceldb)->where("credits NOT IN(".$this->db->get_where('credit', $insert_to_exceldb)->row().")", FALSE);

                    }

                    $i++;
                }
                fclose($file);
                return true;
            }
        }
    }

    public function add_payment()
    {

        $credit_invoice = "";
        $payment_date = "";
        $credit_lorry = "";
        $credit_collector = "";
        $credit_amount = "";
        $collect_type = "";
        $credit_invoice = $this->input->post('inv_no');
        $payment_date = $this->input->post('credit_date');
        $credit_lorry = $this->input->post('emp_lorry');
        $credit_collector = $this->input->post('credit_collect');
        $credit_amount = $this->input->post('amount');
        $collect_type = $this->input->post('collect_type');

        $pay_cid = $this->session->userdata('passed_user_national');

        $insert_to_payment = array(

            'cp_inv_id' => $credit_invoice,
            'cp_date' => $payment_date,
            'cp_lorry' => $credit_lorry,
            'cp_collector' => $credit_collector,
            'cp_amount' => $credit_amount,
            'cp_cid' => $pay_cid,
            'cp_type' => $collect_type,

        );




        // $total_payments = 0;
        // $total_credit_amount = 0;
        // $balance_due = 0;

        // $arr['cp_inv_id'] = $credit_invoice;
        // $res =  $this->db->get_where('credit_payments', $arr)->result();
        // foreach($res as $row){
        //     $temp = $row->cp_amount;
        //     $total_payments = $total_payments+$temp;
        // }

        // $arr2['credit_id'] = $credit_invoice;
        // $res2 =  $this->db->get_where('credit', $arr2)->result();
        // foreach($res2 as $row){
        //     $total_credit_amount = $row->credit_amount;
        // }

        $balance_due = $this->checkRemainBal($credit_invoice);

        //$balance_due = $total_credit_amount - $total_payments;

        if ($balance_due > $credit_amount) {

            $this->db->insert('credit_payments', $insert_to_payment);
            $last_id =  $this->db->insert_id();

            if ($collect_type == 'check') {

                $check_date = $this->input->post('check_date');
                $insert_to_payment2 = array(

                    'cheque_date' => $check_date,
                    'cheque_cp_id' => $last_id,
                    'cheque_status' => 1,

                );
                $this->db->insert('cheque_payments', $insert_to_payment2);
            }


            return true;
        } else if ($balance_due == $credit_amount) {

            $update_credit = array(
                'credit_status' => 0,
            );

            $this->db->where('credit_id', $credit_invoice);
            $this->db->update('credit', $update_credit);
            $this->db->insert('credit_payments', $insert_to_payment);
            $last_id =  $this->db->insert_id();
            if ($collect_type == 'check') {
                $check_date = $this->input->post('check_date');
                $insert_to_payment2 = array(

                    'cheque_date' => $check_date,
                    'cheque_cp_id' => $last_id,
                    'cheque_status' => 1,

                );
                $this->db->insert('cheque_payments', $insert_to_payment2);
            }

            return true;
        } else {
            return false;
        }
    }

    public function checkRemainBal($credit_invoice)
    {

        $total_payments = 0;
        $total_credit_amount = 0;
        $balance_due = 0;

        $arr['cp_inv_id'] = $credit_invoice;
        $res = $this->db->get_where('credit_payments', $arr)->result();
        foreach ($res as $row) {
            $temp = $row->cp_amount;
            $total_payments = $total_payments + $temp;
        }

        $arr2['credit_id'] = $credit_invoice;
        $res2 = $this->db->get_where('credit', $arr2)->result();
        foreach ($res2 as $row) {
            $total_credit_amount = $row->credit_amount;
        }

        $balance_due = $total_credit_amount - $total_payments;

        return $balance_due;
    }

    public function get_credits()
    {
        $data = $this->db->get('credit')->result();
        $total = 0;
        date_default_timezone_set("Asia/Colombo");
        $year = date("Y");
        foreach ($data as $datas) {
            // if ($datas->credit_status == 1) {
            $yearOnly = substr($datas->credit_date, 0, 4);
            if ($year == $yearOnly) {
                $amount = $datas->credit_amount;
                $total = $total + $amount;
            }
            // }
        }

        $total2 = $this->get_credits_recive();


        return $total - $total2;
    }
    public function get_credits_count()
    {

        date_default_timezone_set("Asia/Colombo");
        $year = date("Y");
        $data = $this->db->get('credit')->result();
        $i = 0;
        foreach ($data as $datas) {
            if ($datas->credit_status == 1) {
                $yearOnly = substr($datas->credit_date, 0, 4);
                if ($year == $yearOnly) {
                    $i++;
                }
            }
        }
        $total = $i;

        return $total;
    }

    public function get_credits_recive()
    {

        $data = $this->db->get('credit_payments')->result();
        $total = 0;
        date_default_timezone_set("Asia/Colombo");
        $year = date("Y");
        foreach ($data as $datas) {
            // if ($datas->credit_status == 0) {
            $yearOnly = substr($datas->cp_date, 0, 4);
            if ($year == $yearOnly) {
                $amount = $datas->cp_amount;
                $total = $total + $amount;
            }
            // }
        }

        return $total;
    }

    public function get_credits_recive_count()
    {
        $data = $this->db->get('credit')->result();
        $i = 0;
        date_default_timezone_set("Asia/Colombo");
        $year = date("Y");
        foreach ($data as $datas) {
            if ($datas->credit_status == 0) {
                $yearOnly = substr($datas->credit_date, 0, 4);
                if ($year == $yearOnly) {
                    $i++;
                }
            }
        }
        $total = $i;

        return $total;
    }

    public function get_credits_month()
    {
        $data = $this->db->get('credit')->result();
        $total = 0;
        date_default_timezone_set("Asia/Colombo");
        $year = date('Y-m');
        foreach ($data as $datas) {
            if ($datas->credit_status == 1) {
                $yearOnly = substr($datas->credit_date, 0, 7);
                if ($year == $yearOnly) {
                    $amount = $datas->credit_amount;
                    $total = $total + $amount;
                }
            }
        }

        return $total;
    }
    public function get_credits_count_month()
    {

        date_default_timezone_set("Asia/Colombo");
        $year = date('Y-m');
        $data = $this->db->get('credit')->result();
        $i = 0;
        foreach ($data as $datas) {
            if ($datas->credit_status == 1) {
                $yearOnly = substr($datas->credit_date, 0, 7);
                if ($year == $yearOnly) {
                    $i++;
                }
            }
        }
        $total = $i;

        return $total;
    }

    public function get_credits_recive_month()
    {

        $data = $this->db->get('credit_payments')->result();
        $total = 0;
        date_default_timezone_set("Asia/Colombo");
        $year = date('Y-m');
        foreach ($data as $datas) {
            //  if ($datas->credit_status == 0) {
            $yearOnly = substr($datas->cp_date, 0, 7);
            if ($year == $yearOnly) {
                $amount = $datas->cp_amount;
                $total = $total + $amount;
            }
            //}
        }

        return $total;
    }

    public function get_credits_recive_count_month()
    {
        $data = $this->db->get('credit')->result();
        $i = 0;
        date_default_timezone_set("Asia/Colombo");
        $year = date('Y-m');
        foreach ($data as $datas) {
            if ($datas->credit_status == 0) {
                $yearOnly = substr($datas->credit_date, 0, 7);
                if ($year == $yearOnly) {
                    $i++;
                }
            }
        }
        $total = $i;

        return $total;
    }

    public function delete_credit()
    {

        $credit_id = "";

        $credit_id = $this->input->post('credit_id');

        $this->db->where('credit_id', $credit_id);
        $this->db->delete('credit');

        $this->db->where('cp_inv_id', $credit_id);
        $this->db->delete('credit_payments');

        return true;
    }

    public function delete_col_credit()
    {

        $credit_id = "";
        $credit_id = $this->input->post('cp_id');



        $arr1['cp_id'] = $credit_id;
        $credit_invoice12 = $this->db->select('*')->from('credit_payments')->where($arr1)->get();


        $credit_invoice = $credit_invoice12->row()->cp_inv_id;


        $arr2['credit_id'] = $credit_invoice;
        $credit_amount12 = $this->db->select('*')->from('credit')->where($arr2)->get();

        $credit_status =   $credit_amount12->row()->credit_status;
        $this->db->where('cp_id', $credit_id);
        $this->db->delete('credit_payments');

        $this->db->where('cheque_cp_id', $credit_id);
        $this->db->delete('cheque_payments');

        if ($credit_status == 0) {

            $update_credit = array(
                'credit_status' => 1,
            );

            $this->db->where('credit_id', $credit_invoice);
            $this->db->update('credit', $update_credit);

            return true;
        } else {
            return true;
        }
    }
}
