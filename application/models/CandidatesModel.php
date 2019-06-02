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
        return $this->db->insert('candidates', $data);
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
        if($id==0){
            return $this->db->insert('candidates',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('candidates',$data);
        }        
    }
    public function hide_candidate($id){
        $data = array(
            'isDel' => 1
        );
        $this->db->where('id',$id);
        return $this->db->update('candidates',$data);
    }
    public function unhide_candidate($id){
        $data = array(
            'isDel' => 0
        );
        $this->db->where('id',$id);
        return $this->db->update('candidates',$data);
    }
}
?>