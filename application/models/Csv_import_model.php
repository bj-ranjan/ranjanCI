<?php
class Csv_import_model extends CI_Model
{
 function select()
 {

  // $this->db->stop_cache();
  // $this->db->flush_cache();
  // $this->db->start_cache();
  // $this->db->reconnect();
 
  

  $this->db->order_by('user_id', 'DESC');
  
  $query = $this->db->get('user1');
 // $this->db->reset();
  //$this->db->stop_cache();
  //$this->db->flush_cache();
 //  $this->db->flush_cache();
  return $query;
 

 }

 function insert($data)
 {
  $this->db->insert_batch('user1', $data);
 }
}
?>
