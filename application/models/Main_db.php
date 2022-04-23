<?php

    class Main_db extends CI_Model{

        public function login1(){
           $res= $this->db->get('doctor_data');
           return $res->result();
        }
        public function createstaff($data){
            return ($this->db->insert('login_credential', $data)) ? $this->db->insert_id() : false ;
        }
        public function createdoc($data){
            return ($this->db->insert('doctor_data', $data)) ? $this->db->insert_id() : false ;
        }
        public function createMedical($data){
            print_r($data);
            echo "hii";
            return ($this->db->insert('medical_data', $data)) ? $this->db->insert_id() : false ;
        }
        public function createPateint($data){
            return ($this->db->insert('patients_data', $data)) ? $this->db->insert_id() : false ;
        }
        public function disease($data){
            return ($this->db->insert('disease', $data)) ? $this->db->insert_id() : false ;
        }
        public function gatDisease($data){
            $this->db->select("*");
            $this->db->from('disease');
            $this->db->where('mediacl_id',$data);
            $query = $this->db->get();
            return $query->result();
        }
        public function getMedical(){
            $res= $this->db->get('medical_data');
            return $res->result();
        }
        public function getDoctors($medical_pf_id){
            $res= $this->db->query("select * from doctor_data where medical_id='$medical_pf_id'");
            return $res->result();
        }
        public function isExist($existData){
            $this->db->select('*');
            $this->db->from($existData['table']);
            if($existData['logoptn']=="uid"){
            $this->db->where('user_id',$existData['user_id']);
            }else {
                if($existData['user_check']=='admin'){
                    $this->db->where('mail_id',$existData['user_id']);
                }else{
                    $this->db->where('mailid',$existData['user_id']);
                }
            }
            $this->db->where('pw',$existData['pw']);
            $query = $this->db->get();
            return $query->result();
        }
    }

?>