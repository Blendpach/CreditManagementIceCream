<?php
class Dashboard extends CI_Model
{
    public function getfirstcard()
    {

        $query1 = $this->db->query('SELECT * FROM property');
        $firstcards['noproperty'] = $query1->num_rows();

        $query2 = $this->db->query('SELECT * FROM rooms');
        $firstcards['norooms'] = $query2->num_rows();

        $query3 = $this->db->query('SELECT * FROM booking_customer');
        $firstcards['nousers'] = $query3->num_rows();

        $query4 = $this->db->query('SELECT * FROM booking_room');
        $firstcards['nobookings'] = $query4->num_rows();

        return $firstcards;

        
    }

}