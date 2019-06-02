<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Candidates extends CI_Controller {
        public function __construct() {
            parent::__construct(); 
            $this->load->model('CandidatesModel');         
        }
        public function index(){
            $candidates=new CandidatesModel;
            $data['data']=$candidates->get_candidates();
            $this->load->view('includes/header');       
            $this->load->view('candidates/list',$data);
            $this->load->view('includes/footer');
        }
        public function create(){
            $this->load->view('includes/header');
            $this->load->view('candidates/create');
            $this->load->view('includes/footer');      
        }
        public function store(){
            $candidates=new CandidatesModel;
            $result = $candidates->insert_candidate();
            if($result['status']){
                $this->session->set_flashdata('flashSuccess', 'Inserted Successfully!');
                redirect(base_url('candidates'));
            }else{
                $this->session->set_flashdata('flashError', $result['message']);
                redirect(base_url('candidates/create'));
            }
        }
        public function edit($id){
            $candidate = $this->db->get_where('candidates', array('id' => $id))->row();
            $this->load->view('includes/header');
            $this->load->view('candidates/edit',array('candidate'=>$candidate));
            $this->load->view('includes/footer');   
        }
        public function update($id){
            $candidates=new CandidatesModel;
            $result = $candidates->update_candidate($id);
            if($result['status']){
                $this->session->set_flashdata('flashSuccess', 'Updated Successfully!');
                redirect(base_url('candidates'));
            }else{
                $this->session->set_flashdata('flashError', $result['message']);
                redirect(base_url('candidates/edit/' . $id));
            } 
        }
        public function delete($id){
            $candidates=new CandidatesModel;
            $result = $candidates->delete_candidate($id);  
            if($result['status']){
                $this->session->set_flashdata('flashSuccess', 'Deleted Successfully!');
            }else{
                $this->session->set_flashdata('flashError', $result['message']);
            } 
            redirect(base_url('candidates'));
        }
        public function hide($id){
            $candidates=new CandidatesModel;
            $result = $candidates->hide_candidate($id);
            if($result['status']){
                $this->session->set_flashdata('flashSuccess', 'Hidden Successfully!');
            }else{
                $this->session->set_flashdata('flashError', $result['message']);
            }
            redirect(base_url('candidates'));
        }
        public function unhide($id){
            $candidates=new CandidatesModel;
            $result = $candidates->unhide_candidate($id);
            if($result['status']){
                $this->session->set_flashdata('flashSuccess', 'Undone Successfully!');
            }else{
                $this->session->set_flashdata('flashError', $result['message']);
            }
            redirect(base_url('candidates'));
        }
        public function view($id){
            $candidates=new CandidatesModel;
            $data['data']=$candidates->get_candidates($id);
            $this->load->view('includes/header');       
            $this->load->view('candidates/view', $data);
            $this->load->view('includes/footer');
        }
    }