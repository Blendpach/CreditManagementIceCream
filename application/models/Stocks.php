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
