<?php
class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin')) {
        } else if ($this->session->userdata('admin22')) {
        } else {
            redirect('dashboard/logout');
        }

        $this->load->model('import_model', 'import');
    }

    public function action($page = 'home')
    {
        //$myVar['result'] = $this->session->flashdata('result');
        //$myVar['viewr'] = $this->session->flashdata('viewr');

        $this->load->model('setups');
        $data['get_lorry'] = $this->setups->get_lorry();

        $this->load->model('credits');
        $data['get_credit'] = $this->credits->retrieveCredit();
        $data['get_creditRemains'] = $this->credits->retrieveCreditRemains();
        $data['retrieveCreditDetails'] = $this->credits->retrieveCreditDetails();

        // if ($page = 'report_gen') {
        //     $this->load->model('reports');
        //     $data['get_filter_data'] = $this->reports->retrieveCredits();

        // }

        if ($this->session->userdata('admin')) {
            $sidebar = "sadmin";
        }
        if ($this->session->userdata('admin22')) {
            $sidebar = "admin22";
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar/' . $sidebar);
        // $this->load->view('credit/' . $page);
        $this->load->view('report/' . $page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/formpages/formjs');
    }

    public function getDataArr()
    {

        if (isset($_POST['inv_no'])) {

            $credit_array = array();
            $this->load->model('reports');
            $credit_array = $this->reports->retrieveCredits();

            echo json_encode($credit_array, JSON_FORCE_OBJECT);
        }
    }

    public function search_date()
    {

        if (isset($_POST['credit_select'])) {

            $this->load->model('reports');
            $credit_select = $this->input->post('credit_select');
            if ($this->reports->retrieveCredits()) {

                if ($credit_select == 'credit') {
                    // set flash data
                    $this->session->set_flashdata('success', ' Successfully');
                    redirect('portal/report/action/report_gen');
                } else if ($credit_select == 'collect') {
                    $this->session->set_flashdata('success', ' Successfully');
                    redirect('portal/report/action/report_gen1');
                }
            } else {
                $this->session->set_flashdata('error', 'Please check  again');
                redirect('portal/report/action/home');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Select  Report type');
            redirect('portal/report/action/home');
        }
    }

    public function cheque_details()
    {

        if (isset($_POST['start_cheque'])) {

            $this->load->model('reports');
            $start_cheque = $this->input->post('start_cheque');
            $end_cheque = $this->input->post('end_cheque');

            if ($this->reports->retrieveCheque($start_cheque, $end_cheque)) {
                $this->session->set_flashdata('success', ' Successfully');
                redirect('portal/report/action/cheque_find_more');
            } else {
                $this->session->set_flashdata('error', 'Please Select any other date');
                redirect('portal/report/action/cheque_find');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Select Date');
            redirect('portal/report/action/cheque_find');
        }
    }


    public function cheque_details_today()
    {
        date_default_timezone_set("Asia/Colombo");
        $today = date("Y-m-d");
        $start_cheque = $today;
        $end_cheque = $today;
        $this->load->model('reports');


        if ($this->reports->retrieveCheque($start_cheque, $end_cheque)) {
            $this->session->set_flashdata('success', ' Successfully');
            redirect('portal/report/action/cheque_for_bank');
        } else {
            $this->session->set_flashdata('error', 'Please Select any other date');
            redirect('portal/report/action/cheque_find');
        }
    }


    public function cheque_all()
    {
        date_default_timezone_set("Asia/Colombo");
        $today = date("Y-m-d");
    


        $todays = date("Y");
        $start_cheque = $todays .'-01-01';
        $end_date = $todays . '-12-31';
        $end_cheque = $end_date;
        $this->load->model('reports');


        if ($this->reports->retrieveCheque($start_cheque, $end_cheque)) {
            $this->session->set_flashdata('success', ' Successfully');
            redirect('portal/report/action/cheque_for_bank');
        } else {
            $this->session->set_flashdata('error', 'Please Select any other date');
            redirect('portal/report/action/cheque_find');
        }
    }



    public function change_cheque()
    {

        if (isset($_POST['cheque_id'])) {

            $this->load->model('reports');
            if ($this->reports->change_cheque()) {
                // set flash data
                $this->session->set_flashdata('success', 'Change Cheque Successfully');
                redirect('portal/report/action/cheque_find');
            }
        }
    }
}
