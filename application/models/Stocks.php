<?php
class Stocks extends CI_Model
{

    public function uploadExcel()
    {

        if (isset($_POST["Import"])) {

            echo $filename = $_FILES["file"]["tmp_name"];

            if ($_FILES["file"]["size"] > 0) {

                $sto_date = $this->input->post('stock_date');
                $sto_desc = $this->input->post('stock_desc');
                $sto_cid = $this->session->userdata('passed_user_national');
                $sto_active = 1;

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

                $stock_date = $this->input->post('stock_date');
                $stock_desc = $this->input->post('stock_desc');
                $stout_add_cid = $this->session->userdata('passed_user_national');
                $credit_collect = $this->input->post('credit_collect');
                $emp_lorry = $this->input->post('emp_lorry');

                $stock_id_from_stocktbl = "";

                $stout_active = 1;

                $invoice_id = "";

                $loop_begin_qty = 0;

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

                        $isDone = false;
                        $isOnlyUpdateDb = false;                                   

                        $arr['inv_pro_id'] = $inv_product_sku;
                        $check1 = $this->db->get_where('inventory', $arr)->result();

                        if ((count($check1) > 0) && ($temp_inv_qty > 0)) {

                            $kk = 0;

                            foreach ($check1 as $row) {
                                $stock_id_from_stocktbl = $row->inv_sto_id;
                                $inv_pro_id = $row->inv_pro_id;
                                $stock_qty = $row->inv_qtc;

                                if (($stock_qty > $temp_inv_qty) && ($isDone == false) && ($isOnlyUpdateDb == false)) {

                                    $_SESSION["" . $inv_product_sku . ""][] = $row->inv_qtc;

                                    // calculate new quatity with decrement
                                    $new_quantity = $stock_qty - $temp_inv_qty;

                                    $update_qty = array(
                                        'inv_qtc' => $new_quantity,
                                    );

                                    $this->db->where('inv_id', $row->inv_id);
                                    $this->db->update('inventory', $update_qty);

                                    $isDone = false;
                                    $isOnlyUpdateDb = true;

                                } else if (($stock_qty == $temp_inv_qty) && ($isDone == false) && ($isOnlyUpdateDb == false)) {

                                    $update_qty = array(
                                        'inv_qtc' => 0,
                                        'inv_active' => 0,
                                    );

                                    $this->db->where('inv_id', $row->inv_id);
                                    $this->db->update('inventory', $update_qty);

                                    $isDone = true;

                                    $qqq = 0;

                                    if (isset($_SESSION["" . $inv_product_sku . ""][0])) {
                                        $qqq = $_SESSION["" . $inv_product_sku . ""][0];
                                    } else {
                                        // $qqq = $stock_qty;
                                        $qqq = $stock_qty;
                                    }

                                    $insert_to_stockout_table = array(

                                        'stout_invoice_id' => $invoice_id,
                                        'stout_stock_id' => $stock_id_from_stocktbl,
                                        'stout_pro_id' => $inv_pro_id,
                                        'stout_qty' => $qqq,
                                        'stout_desc' => $stock_desc,
                                        'stout_date' => $stock_date,
                                        'stout_shopname' => $inv_shopname,
                                        'stout_lor_id' => $emp_lorry,
                                        'stout_rep' => $credit_collect,
                                        'stout_add_cid' => $stout_add_cid,
                                        'stout_active' => 1,

                                    );
                                    $this->db->insert('stockout', $insert_to_stockout_table);

                                    $loop_begin_qty = 0;

                                } else if (($temp_inv_qty > $stock_qty) && ($isDone == false) && ($isOnlyUpdateDb == false)) {

                                    //   $new_quantity = $temp_inv_qty-$stock_qty;
                                    $update_qty = array(
                                        'inv_qtc' => 0,
                                        'inv_active' => 0,
                                    );

                                    $this->db->where('inv_id', $row->inv_id);
                                    $this->db->update('inventory', $update_qty);

                                    $insert_to_stockout_table = array(

                                        'stout_invoice_id' => $invoice_id,
                                        'stout_stock_id' => $stock_id_from_stocktbl,
                                        'stout_pro_id' => $inv_pro_id,
                                        'stout_qty' => $stock_qty,
                                        'stout_desc' => $stock_desc,
                                        'stout_date' => $stock_date,
                                        'stout_shopname' => $inv_shopname,
                                        'stout_lor_id' => $emp_lorry,
                                        'stout_rep' => $credit_collect,
                                        'stout_add_cid' => $stout_add_cid,
                                        'stout_active' => 1,

                                    );
                                    $this->db->insert('stockout', $insert_to_stockout_table);

                                    $loop_begin_qty = 0;

                                    $temp_inv_qty = $temp_inv_qty - $stock_qty;

                                }

                                $kk++;

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
