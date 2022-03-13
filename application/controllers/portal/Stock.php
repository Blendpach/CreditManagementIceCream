<?php
class Stock extends CI_Controller
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

        $this->load->model('stocks');
        $data['get_inventory'] = $this->stocks->get_inventory();

        $this->load->model('setups');
        $data['get_lorry'] = $this->setups->get_lorry();

        $lor_id = "";
        if(isset($_GET["lor_id"])){
                $lor_id =  $_GET["lor_id"];    
                $data['get_lorry_by_id'] = $this->setups->get_lorry_by_id($lor_id);
        }

        $emp_id = "";
        if(isset($_GET["emp_id"])){
                $emp_id =  $_GET["emp_id"];    
                $data['get_emp_by_id'] = $this->setups->get_emp_by_id($emp_id);
        }

        $emp_id = "";
        if(isset($_GET["record_id"])){
                $record_id =  $_GET["record_id"];    
                $data['get_assignedById'] = $this->setups->get_assignedById($record_id);
        }

        $sidebar = "";

        if (!file_exists(APPPATH . 'views/stock/' . $page . '.php')) {
            
            show_404();
        }

        if ($this->session->userdata('admin')) {
            $sidebar = "sadmin";
        }
        if ($this->session->userdata('admin22')) {
            $sidebar = "admin22";
        }
        

        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar/' . $sidebar);

        $this->load->view('stock/' . $page);
        $this->load->view('templates/footer');
		$this->load->view('templates/formpages/formjs');

    }
   

    public function uploadExcel()
    {

        $this->load->model('stocks');

        if ($this->stocks->uploadExcel()) {
            // set flash data
            $this->session->set_flashdata('success', 'Upload Successfully');
            redirect('portal/stock/action/viewinventory');
        }
    }


    public function uploadStockOutExcel()
    {

        $this->load->model('stocks');

        if ($this->stocks->uploadStockOutExcel()) {
            $this->session->set_flashdata('success', 'Upload and Stock Update Successfully');
            redirect('portal/stock/action/viewinventory');
        }
    }


    


    function delete_inventory()
    {
        if (isset($_POST['inv_id'])) {
       $this->load->model('stocks');
        if ($this->stocks->delete_inventory()) {
            // set flash data
            $this->session->set_flashdata('error', 'Record Deleted Successfully');
            redirect('portal/stock/action/viewinventory');
        }
        }
    }


  

}
