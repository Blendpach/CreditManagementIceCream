<?php
class Setup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('admin')) {
        } else if ($this->session->userdata('admin22')) {
        } else {
            redirect('dashboard/logout');
        }
    }

    public function action($page = 'home')
    {

        $this->load->model('setups');

        $data['get_lorry'] = $this->setups->get_lorry();
        $data['get_emp'] = $this->setups->get_emp();
        $data['get_pro'] = $this->setups->get_pro();

        $data['get_salesEmp'] = $this->setups->get_salesEmp();
        $data['get_collectorEmp'] = $this->setups->get_collectorEmp();

        $data['get_assignedSalesRep'] = $this->setups->get_assignedSalesRep();
        $data['get_assignedCollectors'] = $this->setups->get_assignedCollectors();

        $lor_id = "";
        if (isset($_GET["lor_id"])) {
            $lor_id =  $_GET["lor_id"];
            $data['get_lorry_by_id'] = $this->setups->get_lorry_by_id($lor_id);
        }

        $emp_id = "";
        if (isset($_GET["emp_id"])) {
            $emp_id =  $_GET["emp_id"];
            $data['get_emp_by_id'] = $this->setups->get_emp_by_id($emp_id);
        }

        $emp_id = "";
        if (isset($_GET["record_id"])) {
            $record_id =  $_GET["record_id"];
            $data['get_assignedById'] = $this->setups->get_assignedById($record_id);
        }

        $sidebar = "";

        if (!file_exists(APPPATH . 'views/setup/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        if ($this->session->userdata('admin')) {
            $sidebar = "sadmin";
        }
        if ($this->session->userdata('admin22')) {
            $sidebar = "admin22";
        }


        $this->load->view('templates/header');

        $this->load->view('templates/sidebar/' . $sidebar);

        $this->load->view('setup/' . $page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/formpages/formjs');
    }

    public function add_lorry()
    {

        if (isset($_POST['lorry_add'])) {

            $this->load->model('setups');

            if ($this->setups->add_lorry()) {
                // set flash data
                $this->session->set_flashdata('success', 'New Lorry Added Successfully');
                redirect('portal/setup/action/setup_lorry');
            }
        }
    }


    public function assign_salesRep_lorry()
    {

        if (isset($_POST['lorry_assign_salesrep'])) {

            $this->load->model('setups');

            if ($this->setups->assign_salesRep_lorry()) {
                // set flash data
                $this->session->set_flashdata('success', 'Assigned Successfully');
                redirect('portal/setup/action/assignSalesRep');
            }
        }
    }



    public function add_emp()
    {

        if (isset($_POST['emp_add'])) {

            $this->load->model('setups');


            $emp_role_id = $this->input->post('emp_role_id');

            if ($emp_role_id == EMP_ROLE_SALES_REP) {

                if ($this->setups->add_emp()) {
                    // set flash data
                    $this->session->set_flashdata('success', 'New Sales Rep Added Successfully');
                    redirect('portal/setup/action/setup_sales_rep');
                }
            }

            if ($emp_role_id == EMP_ROLE_COLLECTORS) {

                if ($this->setups->add_emp()) {
                    // set flash data
                    $this->session->set_flashdata('success', 'New Sales Rep Added Successfully');
                    redirect('portal/setup/action/setup_collectors');
                }
            }
        }
    }

    public function add_pro()
    {

        if (isset($_POST['pro_add'])) {

            $this->load->model('setups');


            $pro_validate = $this->setups->pro_validate();

            if ($pro_validate) {
                $this->session->set_flashdata('success', 'Please Check SKU use for the product');
                redirect('portal/setup/action/add_product');
              
            } else {

                if ($this->setups->add_pro()) {
                    // set flash data
                    $this->session->set_flashdata('success', 'New Product Added Successfully');
                    redirect('portal/setup/action/add_product');
                } 
               
            }
        }
    }

    function delete_lorry()
    {
        if (isset($_POST['lor_id'])) {
            $this->load->model('setups');
            if ($this->setups->delete_lorry()) {
                // set flash data
                $this->session->set_flashdata('error', 'Lorry Deleted Successfully');
                redirect('portal/setup/action/setup_lorry');
            }
        }
    }



    function delete_emp()
    {
        if (isset($_POST['emp_id'])) {
            $this->load->model('setups');
            if ($this->setups->delete_emp()) {

                $emp_role_id = $this->input->post('emp_role_id');

                if ($emp_role_id == EMP_ROLE_SALES_REP) {
                    // set flash data
                    $this->session->set_flashdata('error', 'Sales Rep Deleted Successfully');
                    redirect('portal/setup/action/setup_sales_rep');
                }

                if ($emp_role_id == EMP_ROLE_COLLECTORS) {
                    // set flash data
                    $this->session->set_flashdata('error', 'Collector Deleted Successfully');
                    redirect('portal/setup/action/setup_collector');
                }
            }
        }
    }


    function change_lorry_status()
    {
        if (isset($_POST['active_btn'])) {

            $this->load->model('setups');
            if ($this->setups->change_lorry_status()) {

                $this->session->set_flashdata('success', 'Lorry Status Updated Successfully');
                redirect('portal/setup/action/setup_lorry');
            }
        }

        if (isset($_POST['deactive_btn'])) {

            $this->load->model('setups');
            if ($this->setups->change_lorry_status()) {

                $this->session->set_flashdata('success', 'Lorry Status Updated Successfully');
                redirect('portal/setup/action/setup_lorry');
            }
        }
    }

    function change_pro_status()
    {
        if (isset($_POST['pro_id'])) {

            $this->load->model('setups');
            if ($this->setups->change_pro_status()) {

                $this->session->set_flashdata('success', 'Product Status Updated Successfully');
                redirect('portal/setup/action/add_product');
            }
        }
    }

    function change_emp_status()
    {

        if (isset($_POST['active_btn'])) {

            $this->load->model('setups');
            if ($this->setups->change_emp_status()) {

                $emp_role_id = $this->input->post('emp_role_id');

                if ($emp_role_id == EMP_ROLE_SALES_REP) {
                    $this->session->set_flashdata('success', 'Employee Status Updated Successfully');
                    redirect('portal/setup/action/setup_sales_rep');
                }

                if ($emp_role_id == EMP_ROLE_COLLECTORS) {
                    $this->session->set_flashdata('success', 'Employee Status Updated Successfully');
                    redirect('portal/setup/action/setup_collectors');
                }
            }
        }

        if (isset($_POST['deactive_btn'])) {

            $this->load->model('setups');
            if ($this->setups->change_emp_status()) {
                $emp_role_id = $this->input->post('emp_role_id');

                if ($emp_role_id == EMP_ROLE_SALES_REP) {
                    $this->session->set_flashdata('success', 'Employee Status Updated Successfully');
                    redirect('portal/setup/action/setup_sales_rep');
                }

                if ($emp_role_id == EMP_ROLE_COLLECTORS) {
                    $this->session->set_flashdata('success', 'Employee Status Updated Successfully');
                    redirect('portal/setup/action/setup_collectors');
                }
            }
        }
    }


    public function update_lorry()
    {
        if (isset($_POST['update_lor']) && isset($_POST['lor_id'])) {

            $this->load->model('setups');

            if ($this->setups->update_lorry()) {
                // set flash data
                $this->session->set_flashdata('success', 'Data Edited Successfully');
                redirect('portal/setup/action/setup_lorry');
            }
        }
    }


    public function update_assignSaleRep()
    {
        if (isset($_POST['update_assignSaleRep']) && isset($_POST['record_id'])) {

            $this->load->model('setups');

            if ($this->setups->update_assignSaleRep()) {
                // set flash data
                $this->session->set_flashdata('success', 'Data Edited Successfully');
                redirect('portal/setup/action/assignSalesRep');
            }
        }
    }

    public function update_emp()
    {

        if (isset($_POST['update_emp']) && isset($_POST['emp_id'])) {

            $this->load->model('setups');

            $emp_role_id = $this->input->post('emp_role_id');


            if ($emp_role_id == EMP_ROLE_SALES_REP) {

                if ($this->setups->update_emp($emp_role_id)) {
                    // set flash data
                    $this->session->set_flashdata('success', 'Sales Rep Data Edited Successfully');
                    redirect('portal/setup/action/setup_sales_rep');
                }
            }

            if ($emp_role_id == EMP_ROLE_COLLECTORS) {

                if ($this->setups->update_emp($emp_role_id)) {
                    // set flash data
                    $this->session->set_flashdata('success', 'Collector Data Edited Successfully');
                    redirect('portal/setup/action/setup_collectors');
                }
            }
        }
    }


    public function add_payment()
    {

        if (isset($_POST['lorry_add'])) {

            $this->load->model('setups');

            if ($this->setups->add_lorry()) {
                // set flash data
                $this->session->set_flashdata('success', 'New Lorry Added Successfully');
                redirect('portal/setup/action/setup_lorry');
            }
        }
    }
}
