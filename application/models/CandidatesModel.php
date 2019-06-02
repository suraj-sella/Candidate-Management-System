<?php
    class CandidatesModel extends CI_Model{
        public function get_candidates($id=0){
            if($id){
                $this->db->like('id', $id);
            }
            $query = $this->db->get("candidates");
            return $query->result();
        }
        public function insert_candidate(){    
        $data = array(
            'name' => $this->input->post('inputName'),
            'email' => $this->input->post('inputEmail'),
            'contact' => $this->input->post('inputContact'),
            'gender' => $this->input->post('inputGender'),
            'address' => $this->input->post('inputAddress'),
            'city' => $this->input->post('inputCity'),
            'highedu' => $this->input->post('inputHighEdu'),
        );
        $this->db->insert('candidates', $data);
        $error = $this->db->error();
        if($error['code']){
            return array(
                'status' => false, 
                'message' => str_replace("'", "`", $error['message'])
            );    
        }else{
            return array(
                'status' => true, 
            );
        }
    }
    public function update_candidate($id) 
    {
        $data = array(
            'name' => $this->input->post('inputName'),
            'email' => $this->input->post('inputEmail'),
            'contact' => $this->input->post('inputContact'),
            'gender' => $this->input->post('inputGender'),
            'address' => $this->input->post('inputAddress'),
            'city' => $this->input->post('inputCity'),
            'highedu' => $this->input->post('inputHighEdu'),
        );
        $this->db->where('id',$id);
        $this->db->update('candidates',$data);
        $error = $this->db->error();
        if($error['code']){
            return array(
                'status' => false, 
                'message' => str_replace("'", "`", $error['message'])
            );    
        }else{
            return array(
                'status' => true, 
            );
        }
    }
    public function hide_candidate($id){
        $data = array(
            'isDel' => 1,
            'update_timestamp' => date("Y-m-d H:i:s")
        );
        $this->db->where('id',$id);
        $this->db->update('candidates',$data);
        $error = $this->db->error();
        if($error['code']){
            return array(
                'status' => false, 
                'message' => str_replace("'", "`", $error['message'])
            );    
        }else{
            return array(
                'status' => true, 
            );
        } 
    }
    public function unhide_candidate($id){
        $data = array(
            'isDel' => 0,
            'update_timestamp' => date("Y-m-d H:i:s")
        );
        $this->db->where('id',$id);
        $this->db->update('candidates',$data);
        $error = $this->db->error();
        if($error['code']){
            return array(
                'status' => false, 
                'message' => str_replace("'", "`", $error['message'])
            );    
        }else{
            return array(
                'status' => true, 
            );
        } 
    }
    public function delete_candidate($id){
        $this->db->where('id', $id);
        $this->db->delete('candidates');
        $error = $this->db->error();
        if($error['code']){
            return array(
                'status' => false, 
                'message' => str_replace("'", "`", $error['message'])
            );    
        }else{
            return array(
                'status' => true, 
            );
        } 
    }
}
?>