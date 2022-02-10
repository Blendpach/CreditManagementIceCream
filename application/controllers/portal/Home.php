<?php
class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();


        if ($this->session->userdata('admin')) {
        } else if ($this->session->userdata('admin22')) {
        } else {
            redirect('dashboard/logout');
        }
    }




    public function index($page = 'home')
    {


        $sidebar = "";

        if (!file_exists(APPPATH . 'views/pages/dashboard/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }



        if ($this->session->userdata('admin')) {
            $sidebar = "sadmin";
        }
        if ($this->session->userdata('admin22')) {
            $sidebar = "admin22";
        }



        $this->load->model('credits');
        $data['get_credits'] = $this->credits->get_credits();
        $data['get_credits_count'] = $this->credits->get_credits_count();

        $data['get_credits_recive'] = $this->credits->get_credits_recive();

        $data['get_credits_recive_count'] = $this->credits->get_credits_recive_count();
        $data['get_credits_month'] = $this->credits->get_credits_month();
        $data['get_credits_count_month'] = $this->credits->get_credits_count_month();

        $data['get_credits_recive_month'] = $this->credits->get_credits_recive_month();

        $data['get_credits_recive_count_month'] = $this->credits->get_credits_recive_count_month();

        $this->load->model('reports');
        $data['get_total_invoice'] = $this->reports->get_total_invoice();
        $data['get_total_invoice_count'] = $this->reports->get_total_invoice_count();
        $data['get_total_check_invoice'] = $this->reports->get_total_check_invoice();
        $data['get_total_check_invoice_count'] = $this->reports->get_total_check_invoice_count();
        $data['get_total_cash_invoice'] = $this->reports->get_total_cash_invoice();
        $data['get_total_cash_invoice_count'] = $this->reports->get_total_cash_invoice_count();
        $data['get_total_check_invoice_count_month'] = $this->reports->get_total_check_invoice_count_month();
        $data['get_today_cheque_value'] = $this->reports->get_today_cheque_value();
        $data['get_today_cheque_value_count'] = $this->reports->get_today_cheque_value_count();
        $data['get_today_cheque_bank_value'] = $this->reports->get_today_cheque_bank_value();
        $data['get_all_cheque_value_count'] = $this->reports->get_all_cheque_value_count();
        $data['get_all_cheque_value'] = $this->reports->get_all_cheque_value();
        $this->load->view('templates/header', $data);



        $this->load->view('templates/sidebar/' . $sidebar);

        $this->load->view('pages/dashboard/home');
        $this->load->view('templates/footer');
        $this->load->view('templates/homejs');
    }





    public function retrive_profile_data()
    {

        $this->load->model('users');
        if ($this->users->retrive_profile_data()) {
        }
    }
}
