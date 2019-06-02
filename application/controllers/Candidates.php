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
            $candidates->insert_candidate();
            redirect(base_url('candidates'));
        }
        public function edit($id){
            $candidate = $this->db->get_where('candidates', array('id' => $id))->row();
            $this->load->view('includes/header');
            $this->load->view('candidates/edit',array('candidate'=>$candidate));
            $this->load->view('includes/footer');   
        }
        public function update($id){
            $candidates=new CandidatesModel;
            $candidates->update_candidate($id);
            redirect(base_url('candidates'));
        }
        public function delete($id){
            $this->db->where('id', $id);
            $this->db->delete('candidates');
            redirect(base_url('candidates'));
        }
        public function hide($id){
            $candidates=new CandidatesModel;
            $candidates->hide_candidate($id);
            redirect(base_url('candidates'));
        }
        public function unhide($id){
            $candidates=new CandidatesModel;
            $candidates->unhide_candidate($id);
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