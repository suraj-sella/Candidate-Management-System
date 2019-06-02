<?php
  defined('BASEPATH') OR exit('No direct script access allowed');  
  class Import extends CI_Controller {  
    function __construct() {
      parent::__construct();
      $this->load->database();
      $this->load->model('import_model', 'import');
    }      
 
    public function uploadExcel(){
      $this->load->view('includes/header');
      $this->load->view('upload');
      $this->load->view('includes/footer');
    }
    public function uploadData(){
      if ($this->input->post('submit')) {
        $path = APPPATH . "/uploads/";
        require_once APPPATH . "/third_party/PHPExcel.php";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);            
        if (!$this->upload->do_upload('uploadFile')) {
          print_r($this->upload->display_errors());die();
          $error = array('error' => $this->upload->display_errors());
        } else {
          $data = array('upload_data' => $this->upload->data());
        }
        if(empty($error)){
          if (!empty($data['upload_data']['file_name'])) {
            $import_xls_file = $data['upload_data']['file_name'];
          } else {
            $import_xls_file = 0;
          }
          $inputFileName = $path . $import_xls_file;
          try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            $flag = true;
            $i=0;
            foreach ($allDataInSheet as $value) {
              if($flag){
                $flag =false;
                continue;
              }
              $inserdata[$i]['name'] = $value['A'];
              //Email Id Validation
              if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$value['B'])){ 
                throw new Exception('Email Invalid For Entry Name: ' . $value['A'] . '! Please Verify Excel Before Uploading!');
              }
              $inserdata[$i]['email'] = $value['B'];
              //Contact Validation
              $regx = '/^[0-9]{10}$/m';
              if(!preg_match_all($regx, $value['C'], $matches, PREG_SET_ORDER, 0)){
                throw new Exception('Contact Details Invalid For Entry Name: ' . $value['A'] . '! Please Verify Excel Before Uploading!');
              }
              $inserdata[$i]['contact'] = $value['C'];
              //Gender Validation
              $regx = '/^(male|female)$/mi';
              if(!preg_match_all($regx, $value['D'], $matches, PREG_SET_ORDER, 0)){
                throw new Exception('Gender Invalid For Entry Name: ' . $value['A'] . '! Please Verify Excel Before Uploading!');
              }
              $inserdata[$i]['gender'] = $value['D'];
              $inserdata[$i]['address'] = $value['E'];
              $inserdata[$i]['city'] = $value['F'];
              $inserdata[$i]['highedu'] = $value['G'];
              $i++;
            }               
            $result = $this->import->importdata($inserdata);   
            if($result){
              echo "Imported successfully";
              redirect(base_url('candidates'));
            }else{
              echo "ERROR !";
            }             
          } catch (Exception $e) {
            echo 'Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' .$e->getMessage();
          }
        }else{
          echo $error['error'];
        }
      }
      $this->load->view('includes/header');
      $this->load->view('upload');
      $this->load->view('includes/footer');
    }
  }
?>