<?php
class Reports extends CI_Model
{

    public function retrieveCredits()
    {

        // $start_date = "2022-01-14";
        // $end_date = "2022-01-30";

        // $strtdate = $this->input->post('credit_date_st');
        // $enddate = $this->input->post('credit_date_en');

        // $credit_date_st = $this->input->post('credit_date_st');
        // $credit_date_en = $this->input->post('credit_date_en');

        $startdate = $this->input->post('credit_date_st');

        $enddate = $this->input->post('credit_date_en');
        $credit_select = $this->input->post('credit_select');


        $queryEE = $this->db->query('SELECT * FROM `credit` INNER JOIN lorry ON credit.credit_lorry = lorry.lor_id INNER JOIN employers ON credit.credit_collect = employers.emp_id WHERE credit.credit_date BETWEEN "' . $startdate . '" AND "' . $enddate . ' "');

        // $queryEE = $this->db->select('*')->from('credit')
        //     ->join('lorry', 'lorry.lor_id = credit.credit_lorry')
        //     ->join('employers', 'employers.emp_id = credit.credit_collect')
        // //->where('credit_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"')
        // //->where("credit_date BETWEEN '$strtdate' AND '$enddate'")
        // //->where('credit_date >=', $strtdate)
        // //->where('credit_date <=', $enddate)
        //     ->get();

        $queryQ = $this->db->query('SELECT * FROM `credit_payments` INNER JOIN lorry ON credit_payments.cp_lorry = lorry.lor_id INNER JOIN employers ON credit_payments.cp_collector = employers.emp_id  INNER JOIN credit ON credit_payments.cp_inv_id = credit.credit_id WHERE credit_payments.cp_date BETWEEN "' . $startdate . '" AND "' . $enddate . ' "');

        // $this->db->select('*')->from('credit_payments')
        //     ->join('lorry', 'lorry.lor_id = credit_payments.cp_lorry')
        //     ->join('employers', 'employers.emp_id = credit_payments.cp_collector')
        //     ->join('credit', 'credit.credit_id = credit_payments.cp_inv_id')
        // //->where('cp_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"')
        // // ->where("cp_date BETWEEN $strtdate AND $enddate")
        // //->where("cp_date BETWEEN '$strtdate' AND '$enddate'")
        // // ->where('cp_date >=', $strtdate)
        // // ->where('cp_date <=', $enddate)
        //     ->get();

        // if (($queryEE->num_rows() > 0) || ($queryQ->num_rows() > 0)) {
        if ($credit_select == 'credit') {
            $i = 0;

            foreach ($queryEE->result() as $row) {

                $d_array[$i]['credit_date'] = $row->credit_date;
                $d_array[$i]['credit_invoice'] = $row->credit_invoice;
                $d_array[$i]['credit_shop'] = $row->credit_shop;
                $d_array[$i]['emp_name'] = $row->emp_name;
                $d_array[$i]['credit_amount'] = $row->credit_amount;
                $d_array[$i]['isFromCredit'] = 1;
                $i++;
            }

            $this->session->set_flashdata('filtrerddata', $d_array);
        } else if ($credit_select == 'collect') {
            $j = 0;
            foreach ($queryQ->result() as $row) {
                $d_array[$j]['credit_date'] = $row->cp_date;
                $d_array[$j]['credit_given_date'] = $row->credit_date;
                $d_array[$j]['credit_collect_date'] = $row->cp_date;
                $d_array[$j]['credit_invoice'] = $row->credit_invoice;
                $d_array[$j]['credit_shop'] = $row->credit_shop;

                $d_array[$j]['emp_name_collect'] = $row->emp_name;
                $arr1['emp_id'] = $row->credit_collect;
                $credit_invoice12 = $this->db->select('*')->from('employers')->where($arr1)->get();
                $employee_name = $credit_invoice12->row()->emp_name;
                $d_array[$j]['emp_name_givent'] = $employee_name;
                $d_array[$j]['credit_amount'] = $row->cp_amount;
                $d_array[$j]['isFromCredit'] = 2;
                $j++;
            }
            //print_r($d_array);
            $this->session->set_flashdata('filtrerddata', $d_array);

            // } else {
        }
        //    return "no";

        // }
        return $d_array;
    }

    public function retrieveCheque($startdate, $enddate)
    {

        $queryQ = $this->db->query('SELECT * FROM `cheque_payments` INNER JOIN credit_payments ON cheque_payments.cheque_cp_id = credit_payments.cp_id INNER JOIN lorry ON credit_payments.cp_lorry = lorry.lor_id INNER JOIN employers ON credit_payments.cp_collector = employers.emp_id  INNER JOIN credit ON credit_payments.cp_inv_id = credit.credit_id WHERE cheque_payments.cheque_date BETWEEN "' . $startdate . '" AND "' . $enddate . ' "');


        $j = 0;
        foreach ($queryQ->result() as $row) {
            $d_array[$j]['cheque_payments_credit_date'] = $row->cp_date;
            $d_array[$j]['cheque_payments_credit_given_date'] = $row->credit_date;
            $d_array[$j]['cheque_payments_credit_collect_date'] = $row->cp_date;
            $d_array[$j]['cheque_payments_credit_invoice'] = $row->credit_invoice;
            $d_array[$j]['cheque_payments_credit_shop'] = $row->credit_shop;

            $d_array[$j]['cheque_payments_emp_name_collect'] = $row->emp_name;
            $arr1['emp_id'] = $row->credit_collect;
            $credit_invoice12 = $this->db->select('*')->from('employers')->where($arr1)->get();
            $employee_name = $credit_invoice12->row()->emp_name;
            $d_array[$j]['cheque_payments_emp_name_givent'] = $employee_name;
            $d_array[$j]['cheque_payments_credit_amount'] = $row->cp_amount;
            $d_array[$j]['cheque_payments_due_date'] = $row->cheque_date;
            $d_array[$j]['cheque_payments_statues'] = $row->cheque_status;
            $d_array[$j]['cheque_payments_id'] = $row->cheque_id;
            $d_array[$j]['cheque_payments_isFromCredit'] = 2;
            $j++;
        }

        $this->session->set_flashdata('cheque_list', $d_array);

        return $d_array;
    }

    public function change_cheque()
    {

        $cheque_id = $this->input->post('cheque_id');
        $cheque_status = $this->input->post('cheque_status');
        if ($cheque_status == 1) {
            $new_cheque_id = 0;
        } else if ($cheque_status == 0) {
            $new_cheque_id = 1;
        }
        $update_credit = array(
            'cheque_status' => $new_cheque_id,
        );
        $this->db->where('cheque_id', $cheque_id);
        $this->db->update('cheque_payments', $update_credit);
        return true;
    }




    public function get_total_invoice()
    {
        $data = $this->db->get('credit_payments')->result();
        $total = 0;
        date_default_timezone_set("Asia/Colombo");
        $year = date("Y");
        foreach ($data as $datas) {
            // if ($datas->credit_status == 1) {
            $yearOnly = substr($datas->cp_date, 0, 4);
            if ($year == $yearOnly) {
                $amount = $datas->cp_amount;
                $total = $total + $amount;
                // }
            }
        }

        return $total;
    }

    public function get_total_invoice_count()
    {


        date_default_timezone_set("Asia/Colombo");
        $year = date("Y");
        $data = $this->db->get('credit_payments')->result();
        $i = 0;
        foreach ($data as $datas) {
            //if ($datas->credit_status == 1) {
            $yearOnly = substr($datas->cp_date, 0, 4);
            if ($year == $yearOnly) {
                $i++;
            }
            // }
        }
        $total = $i;

        return $total;
    }


    public function get_total_check_invoice()
    {
        $data =  $this->db->select('*')->from('cheque_payments')->join('credit_payments', 'credit_payments.cp_id = cheque_payments.cheque_cp_id')->get()->result();
        $total = 0;
        date_default_timezone_set("Asia/Colombo");
        $year = date("Y");
        foreach ($data as $datas) {
            if ($datas->cheque_status == 1) {
                $yearOnly = substr($datas->cp_date, 0, 4);
                if ($year == $yearOnly) {
                    $amount = $datas->cp_amount;
                    $total = $total + $amount;
                }
            }
        }

        return $total;
    }

    public function get_total_check_invoice_count()
    {


        date_default_timezone_set("Asia/Colombo");
        $year = date("Y");
        $data =  $this->db->select('*')->from('cheque_payments')->join('credit_payments', 'credit_payments.cp_id = cheque_payments.cheque_cp_id')->get()->result();

        $i = 0;
        foreach ($data as $datas) {
            if ($datas->cheque_status == 1) {
                $yearOnly = substr($datas->cp_date, 0, 4);
                if ($year == $yearOnly) {
                    $i++;
                }
            }
        }
        $total = $i;

        return $total;
    }

    public function get_total_check_invoice_count_month()
    {


        date_default_timezone_set("Asia/Colombo");
        $year = date("Y-m");
        $data =  $this->db->select('*')->from('cheque_payments')->join('credit_payments', 'credit_payments.cp_id = cheque_payments.cheque_cp_id')->get()->result();

        $i = 0;
        foreach ($data as $datas) {
            // if ($datas->cheque_status == 1) {
            $yearOnly = substr($datas->cp_date, 0, 7);
            if ($year == $yearOnly) {
                $i++;
            }
            // }
        }
        $total = $i;

        return $total;
    }

    public function get_total_cash_invoice()
    {
        $total = 0;
        $total2 = 0;
        $total3 = 0;
        $total2 = $this->get_total_invoice();
        $total3 = $this->get_total_check_invoice();
        $total =  $total2 - $total3;
        return $total;
    }

    public function get_total_cash_invoice_count()
    {
        $total = 0;
        $total2 = 0;
        $total3 = 0;
        $total2 = $this->get_total_invoice_count();
        $total3 = $this->get_total_check_invoice_count();
        $total =  $total2 - $total3;

        return $total;
    }


    public function get_today_cheque_value()
    {
        date_default_timezone_set("Asia/Colombo");
        $today = date("Y-m-d");
        $start_date = $today;
        $end_date = $today;


        $total = $this->today_chek_value($start_date, $end_date);


        return $total;
    }
    public function get_today_cheque_bank_value()
    {
        date_default_timezone_set("Asia/Colombo");
        $today = date("Y-m-d");
        $start_date = $today;
        $end_date = $today;


        $total = $this->today_chek_bank_value($start_date, $end_date);


        return $total;
    }

    public function get_today_cheque_value_count()
    {
        date_default_timezone_set("Asia/Colombo");
        $today = date("Y-m-d");
        $start_date = $today;
        $end_date = $today;


        $total = $this->today_chek_count($start_date, $end_date);


        return $total;
    }

    public function today_chek_value($startdate, $enddate)
    {

        $queryQ = $this->db->query('SELECT * FROM `cheque_payments` INNER JOIN credit_payments ON cheque_payments.cheque_cp_id = credit_payments.cp_id INNER JOIN lorry ON credit_payments.cp_lorry = lorry.lor_id INNER JOIN employers ON credit_payments.cp_collector = employers.emp_id  INNER JOIN credit ON credit_payments.cp_inv_id = credit.credit_id WHERE cheque_payments.cheque_date BETWEEN "' . $startdate . '" AND "' . $enddate . ' "');

        $total = 0;
        $j = 0;
        foreach ($queryQ->result() as $row) {
            if ($row->cheque_status == 1) {
                $total = $total + $row->cp_amount;

                $j++;
            }
        }



        return $total;
    }

    public function today_chek_bank_value($startdate, $enddate)
    {

        $queryQ = $this->db->query('SELECT * FROM `cheque_payments` INNER JOIN credit_payments ON cheque_payments.cheque_cp_id = credit_payments.cp_id INNER JOIN lorry ON credit_payments.cp_lorry = lorry.lor_id INNER JOIN employers ON credit_payments.cp_collector = employers.emp_id  INNER JOIN credit ON credit_payments.cp_inv_id = credit.credit_id WHERE cheque_payments.cheque_date BETWEEN "' . $startdate . '" AND "' . $enddate . ' "');

        $total = 0;
        $j = 0;
        foreach ($queryQ->result() as $row) {
            if ($row->cheque_status == 0) {
                $total = $total + $row->cp_amount;

                $j++;
            }
        }



        return $total;
    }



    public function today_chek_count($startdate, $enddate)
    {

        $queryQ = $this->db->query('SELECT * FROM `cheque_payments` INNER JOIN credit_payments ON cheque_payments.cheque_cp_id = credit_payments.cp_id INNER JOIN lorry ON credit_payments.cp_lorry = lorry.lor_id INNER JOIN employers ON credit_payments.cp_collector = employers.emp_id  INNER JOIN credit ON credit_payments.cp_inv_id = credit.credit_id WHERE cheque_payments.cheque_date BETWEEN "' . $startdate . '" AND "' . $enddate . ' "');

        $total = 0;
        $j = 0;
        foreach ($queryQ->result() as $row) {
            if ($row->cheque_status == 1) {
                $total = $total + $row->cp_amount;

                $j++;
            }
        }


        return $j;
    }


    public function get_all_cheque_value()
    {
        date_default_timezone_set("Asia/Colombo");
        $today = date("Y-m-d");
        $todays = date("Y");
        $start_date =$todays .'-01-01';
        $end_date = $todays .'-12-31';


        $total = $this->get_all_cheque_value_retrive($start_date, $end_date);


        return $total;
    }


    public function get_all_cheque_value_retrive($startdate, $enddate)
    {

        $queryQ = $this->db->query('SELECT * FROM `cheque_payments` INNER JOIN credit_payments ON cheque_payments.cheque_cp_id = credit_payments.cp_id INNER JOIN lorry ON credit_payments.cp_lorry = lorry.lor_id INNER JOIN employers ON credit_payments.cp_collector = employers.emp_id  INNER JOIN credit ON credit_payments.cp_inv_id = credit.credit_id WHERE cheque_payments.cheque_date BETWEEN "' . $startdate . '" AND "' . $enddate . ' "');

        $total = 0;
        $j = 0;
        foreach ($queryQ->result() as $row) {
            if ($row->cheque_status == 1) {
                if ($row->cheque_status == 1) {
                    $total = $total + $row->cp_amount;    
                    $j++;
                }
            }
        }


        return $total;
    }


    public function get_all_cheque_value_count()
    {
        date_default_timezone_set("Asia/Colombo");
        $today = date("Y-m-d");
        $todays = date("Y");
        $start_date =$todays .'-01-01';
        $end_date = $todays .'-12-31';


        $total = $this->get_all_cheque_value_retrive_count($start_date, $end_date);


        return $total;
    }


    public function get_all_cheque_value_retrive_count($startdate, $enddate)
    {

        $queryQ = $this->db->query('SELECT * FROM `cheque_payments` INNER JOIN credit_payments ON cheque_payments.cheque_cp_id = credit_payments.cp_id INNER JOIN lorry ON credit_payments.cp_lorry = lorry.lor_id INNER JOIN employers ON credit_payments.cp_collector = employers.emp_id  INNER JOIN credit ON credit_payments.cp_inv_id = credit.credit_id WHERE cheque_payments.cheque_date BETWEEN "' . $startdate . '" AND "' . $enddate . ' "');

        $total = 0;
        $j = 0;
        foreach ($queryQ->result() as $row) {
            if ($row->cheque_status == 1) {
                $total = $total + $row->cp_amount;
                $j++;
            }
        }


        return $j;
    }
}
