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

        $this->load->model('setups');

        $data['get_lorry'] = $this->setups->get_lorry();
        $data['get_emp'] = $this->setups->get_emp(); 

        $data['get_salesEmp'] = $this->setups->get_salesEmp(); 
        $data['get_collectorEmp'] = $this->setups->get_collectorEmp(); 

        $data['get_assignedSalesRep'] = $this->setups->get_assignedSalesRep();  
        $data['get_assignedCollectors'] = $this->setups->get_assignedCollectors();  
        
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
   


}
