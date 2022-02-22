<?php
class Stocks extends CI_Model
{


    public function uploadExcel()
    {

        if (isset($_POST["Import"])) {

            echo $filename = $_FILES["file"]["tmp_name"];

            if ($_FILES["file"]["size"] > 0) {

           

                $sto_date =  $this->input->post('stock_date');
                $sto_desc =  $this->input->post('stock_desc');
                $sto_cid =  $this->session->userdata('passed_user_national');
                $sto_active =  1;

                $insert_to_stock = array(

                    'sto_date' => $sto_date,
                    'sto_desc' => $sto_desc,
                    'sto_cid' => $sto_cid,
                    'sto_active' => $sto_active,

                );

                $this->db->insert('stock', $insert_to_stock);

                $inv_sto_id = $this->db->insert_id();

                $inv_pro_id = "";
                $inv_qtc = "";
                $inv_get = "";
                $inv_sell = "";
                

                $file = fopen($filename, "r");
                $i = 0;
                while (($emapData = fgetcsv($file, 10000, ",")) !== false) {

                    if ($i == 0) {
                    } else {

                        $inv_pro_id = $emapData[0];
                        $inv_qtc = $emapData[1];
                        $inv_get = $emapData[2];
                        $inv_sell = $emapData[3];

                        $insert_to_inventory = array(

                            'inv_sto_id' => $inv_sto_id,
                            'inv_pro_id' => $inv_pro_id,
                            'inv_qtc' => $inv_qtc,
                            'inv_get' => $inv_get,
                            'inv_sell' => $inv_sell,
                            'inv_active' => 1,

                        );
        
                        $this->db->insert('inventory', $insert_to_inventory);

                    }

                    $i++;
                }
                fclose($file);
                return true;
            }
        }
    }


    public function uploadStockOutExcel()
    {

        if (isset($_POST["Import"])) {

            echo $filename = $_FILES["file"]["tmp_name"];

            if ($_FILES["file"]["size"] > 0) {

           
                $stock_date =  $this->input->post('stock_date');
                $stock_desc =  $this->input->post('stock_desc');
                $stout_add_cid =  $this->session->userdata('passed_user_national');
                $emp_lorry =  $this->session->userdata('emp_lorry');
                $credit_collect =  $this->session->userdata('credit_collect');
                $emp_lorry =  $this->session->userdata('emp_lorry');

                $stock_id_from_stocktbl = "";
                
                $stout_active =  1;
              
                $file = fopen($filename, "r");
                $i = 0;
                while (($emapData = fgetcsv($file, 10000, ",")) !== false) {

                    if ($i == 0) {
                    } else {

                        $invoice_id = $emapData[0];
                        $inv_product_sku = $emapData[1];
                        $inv_qty = $emapData[2];
                        $inv_shopname = $emapData[3];


                        // assign temp qty for calculate
                        $temp_inv_qty = $inv_qty;


                        
                        $arr['inv_pro_id'] = $inv_product_sku;
                        $check1 = $this->db->get_where('inventory', $arr)->result();

                        if ($check1->num_rows() > 0)
                            {
                            foreach ($check1 as $row)
                            {
                                $stock_id_from_stocktbl = $row->inv_sto_id;
                                $inv_pro_id = $row->inv_pro_id;

                                $stock_qty = $row->inv_qtc;

                              
                                if($stock_qty >= $temp_inv_qty){
                                    //should 0 qty
                                    // should active 0


                                } else {

                                    // should reduce qty from first row 
                                    // then reduce from next row


                                    $temp_inv_qty = $temp_inv_qty-$stock_qty;
                                }


                       
                                
                                    $insert_to_stockout = array(

                                        'stout_invoice_id' => $invoice_id,
                                        'stout_stock_id' => $stock_id_from_stocktbl,
                                        'stout_pro_id' => $inv_product_sku,
                                        'stout_qty' => $inv_qty,
                                        'stout_desc' => $stock_desc,
                                        'stout_date' => $stock_date,
                                        'stout_shopname' => $inv_shopname,
                                        'stout_lor_id' => $emp_lorry,
                                        'stout_rep' => $credit_collect,
                                        'stout_add_cid' => $stout_add_cid,
                                        'stout_active' => $stout_active,
                    
                                    );
                    
                                    $this->db->insert('inventory', $insert_to_stockout);


                            }
                            }


                    }

                    $i++;
                }
                fclose($file);
                return true;
            }
        }
    }

    


    public function get_inventory()
    {
        return $this->db->get('inventory')->result();
    }


    public function delete_inventory()
    {

        $inv_id = "";

        $inv_id = $this->input->post('inv_id');

        $this->db->where('inv_id', $inv_id);
        $this->db->delete('inventory');

        return true;
    }




   
}
