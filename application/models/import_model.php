<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Import_model extends CI_Model {
 
    public function importData($data) {
 
        $res = $this->db->insert_batch('candidates',$data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }
 
    }
 
}
 
?>