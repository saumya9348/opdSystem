<?php
            use Twilio\Rest\Client;
    class Main extends CI_Controller{
        function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Main_db');
        $this->load->library('pdf');
        }
        public function index(){
            echo 'Hello World!';
            $this->load->view('index');
        }
        public function dashboard(){
            $this->load->view('index');
        }
        public function createstaff(){
            $data['flag']="createstaff";
            $submit=$this->input->post('submit');
            if(isset($submit)){
            $fullname=$this->input->post('fullname');
            $user_name=$this->input->post('user_name');
            $Email1=$this->input->post('Email1');
            $medical_name=$this->input->post('medical_name');
            $ph_no=$this->input->post('ph_no');
            $Password1=$this->input->post('Password1');
            $existData=array(
                "user_id"=>$user_name,
                "mailid"=>$Email1,
                "table"=>'login_credential'
            );
            $isExist=$this->Main_db->isExist($existData);
            $data=array(
                'full_name'=>$fullname,
                'phno'=>$ph_no,
                'user_id'=>$user_name,
                'mailid'=>$Email1,
                'medical_id'=>$medical_name,
                'pw'=>$Password1
            );
            if($isExist){
                echo "<script type=\"text/javascript\">
                    alert('Staff Already Exist');
                    window.location = \"getStaff\"
                    </script>";
            }else{
            $result=$this->Main_db->createstaff($data);
            echo "<script type=\"text/javascript\">
                    alert('Sucessfully Added');
                    window.location = \"getStaff\"
                    </script>";
            }
            }
            $data['getMedical']=$this->Main_db->getMedical();
            $this->load->view('registertion',$data);
        }
        public function createdoc(){
            $data['flag']="createdoc";
            $submit=$this->input->post('submit');
            if(isset($submit)){
            $fullname=$this->input->post('fullname');
            $user_name=$this->input->post('user_name');
            $Email1=$this->input->post('Email1');
            $ph_no=$this->input->post('ph_no');
            $medical_name=$this->session->userdata('medical_pf_id');
            $Password1=$this->input->post('Password1');
            $speciality=$this->input->post('speciality');
            $existData=array(
                'user_id'=>$user_name,
                'mailid'=>$Email1,
                "table"=>'doctor_data'
            );
            $isExist=$this->Main_db->isExist($existData);
            $data=array(
                'doc_name'=>$fullname,
                'phno'=>$ph_no,
                'user_id'=>$user_name,
                'mailid'=>$Email1,
                'medical_id'=>$medical_name,
                'speciality'=>$speciality,
                'pw'=>$Password1
            );
            if($isExist){
                echo "<script type=\"text/javascript\">
                    alert('Doctor Alredy Exist');
                    window.location = \"getDoc\"
                    </script>";
            }else{
            $result=$this->Main_db->createdoc($data);
            echo "<script type=\"text/javascript\">
                    alert('Sucessfully Added');
                    window.location = \"getDoc\"
                    </script>";
            }
            }
            $data['getMedical']=$this->Main_db->getMedical();
            $this->load->view('registertion',$data);

        }
        
        public function createMedical(){
            $data['flag']="createMedical";
            $submit=$this->input->post('submit');
            if(isset($submit)){
            $fullname=$this->input->post('fullname');
            $user_name=$this->input->post('user_name');
            $Email1=$this->input->post('Email1');
            $Password1=$this->input->post('Password1');
            $data=array(
                'medical_name'=>$fullname,
                'user_id'=>$user_name,
                'mailid'=>$Email1,
                'pw'=>$Password1
            );
            $isExist=array(
                'user_id'=>$user_name,
                'mailid'=>$Email1,
                "table"=>'medical_data'
            );
            $isExist=$this->Main_db->isExist($isExist);
            if($isExist){
                echo "Data Already Exist";
            }else{
            $result=$this->Main_db->createMedical($data);
            echo "<script type=\"text/javascript\">
                    alert('Sucessfully Added');
                    window.location = \"welcome_message\"
                    </script>";
            }
            }
            $this->load->view('registertion',$data);
        }

        public function createPateint(){
            $medical_pf_id=  $this->session->userdata('medical_pf_id');
            $data['flag']="createPateint";
            $submit=$this->input->post('submit');
            if(isset($submit)){
                $fullname=$this->input->post('fullname');
                $medical_name=$this->input->post('medical_name');
                $user_name=$this->input->post('user_name');
                $dob=$this->input->post('dob');
                $ph_no=$this->input->post('ph_no');
                $Password1=$this->input->post('Password1');
                $disease=$this->input->post('disease');
                $doc_id=$this->input->post('doc_name');
                $gender=$this->input->post('gender');
                $appoint_date= $this->input->post('appoint_date')=='' || empty($this->input->post('appoint_date')) ? date('Y-m-d') : $this->input->post('appoint_date') ;
                $data=array(
                    'medical_id'=>$medical_name,
                    'user_id'=>$user_name,
                    'pw'=>$Password1,
                    'patients_name'=>$fullname,
                    'phno'=>$ph_no,
                    'disease'=>$disease,
                    'dob'=>$dob,
                    'doc_id'=>$doc_id,
                    'gender'=>$gender,
                    'apointment_date'=>$appoint_date,
                    'register_date'=>date("Y-m-d")
                );
                $result=$this->Main_db->createPateint($data);
                if($result){
                echo "<script type=\"text/javascript\">
                    alert('Sucessfully Added');
                    window.location = \"getPatient\"
                    </script>";
                }
                
            }
                $data['getMedical']=$this->Main_db->getMedical();
                $data['getDoctors']=$this->Main_db->getDoctors($medical_pf_id);
                $data['pateint']=$this->Main_db->getMedical();
                $this->load->view('registertion',$data);
        }
        public function disease(){
            $submit=$this->input->post('submit');
            if(isset($submit)){
                $medical_name=$this->input->post('medical_name');
                $desease=$this->input->post('desease');
                $Fees=$this->input->post('Fees');
                $data=array(
                    'mediacl_id'=>$medical_name,
                    'disease_name'=>$desease,
                    'amount'=>$Fees
                );
                $result=$this->Main_db->disease($data);
                if($result>=1){
                    echo "<script type=\"text/javascript\">
                    alert('Sucessfully Added');
                    window.location = \"welcome_message\"
                    </script>";
                }else {
                    echo "Failed To Add";
                }
            }
            $data['getMedical']=$this->Main_db->getMedical();
            $this->load->view('addPateintDieseas',$data); 
        }
        public function gatDisease(){
            $medical_name=$this->input->post('medical_name');
            $a=13;
            $gatDisease=$this->Main_db->gatDisease($medical_name);
            echo "<option value=''>select</option>";
            foreach($gatDisease as $d){
                echo "<option value='$d->id'>$d->disease_name</option>";
            }
        }
        public function welcome_message(){
             
            $this->load->view('welcome_message' );
        }
        /**
         * Log in user 
         */
        public function login($admin=NULL){
             $admin_uri1 = $this->uri->segment(1);
             $admin_uri2 = $this->uri->segment(2);
            $submit=$this->input->post('submit');
            if(isset($submit)){
                    $admin_name=$this->input->post('admin_name');
                    if($admin_name=="admin"){
                    $admin_name=$this->input->post('admin_name');
                    $this->session->set_userdata('admin_name',$admin_name);
                    $logoptn=$this->input->post('logoptn');
                    $user_name=$this->input->post('user_name');
                    $this->session->set_userdata('user_name',$user_name);
                    $Password1=$this->input->post('Password1');
                }else{
                    $admin_name=$this->input->post('admin_name');
                    $this->session->set_userdata('admin_name',$admin_name);
                    $logoptn=$this->input->post('logoptn');
                    $user_name=$this->input->post('user_name');
                    $this->session->set_userdata('user_name',$user_name);
                    $Password1=$this->input->post('Password1');
                }
            $table='';
            switch(@$admin_name){
                case "admin":
                    $table='admin';
                    break;
                case "medical":
                  $table='medical_data';
                  break;
                case "staff":
                  $table='login_credential';
                  break;
                case "doctor":
                  $table='doctor_data';
                  break;
                default:
                  break;
            }
            $isExist=array(
                'user_id'=>$user_name,
                'pw'=>$Password1,
                'logoptn'=>$logoptn,
                "table"=>$table,
                "user_check"=>$admin_name
            );
            $isExist=$this->Main_db->isExist($isExist);
            $data1=array(
                "id"=>$isExist,
                "flag"=>"admin"
            );
            if(count($isExist)>=1){
                
                $medical_pf_id=   $admin_name=='medical' && $admin_name!='admin' ? $isExist[0]->id : ($admin_name!='medical' && $admin_name!='admin' ? $isExist[0]->medical_id : '') ;
                $this->session->set_userdata('medical_pf_id',$medical_pf_id);
                $this->session->set_userdata('user_pk_id',$isExist[0]->id);

                $this->db->select("medical_name");
                $this->db->from("medical_data");
                $this->db->where("id",$medical_pf_id);
                $medname=$this->db->get()->result();
                $this->session->set_userdata('medical_name_',$medname[0]->medical_name);
                $this->session->set_userdata('ses_id',$user_name);


                if($admin_name=='admin'){
                    echo "<script type=\"text/javascript\">
                    alert('Sucessfully Loged In');
                    window.location = \"getDashboard\"
                    </script>";
                }if($admin_name=='medical'){
                    echo "<script type=\"text/javascript\">
                    alert('Sucessfully Loged In');
                    window.location = \"getDashboard\"
                    </script>";
                }elseif ($admin_name=='staff') {
                    echo "<script type=\"text/javascript\">
                    alert('Sucessfully Loged In');
                    window.location = \"getDashboard\"
                    </script>";
                
                }elseif ($admin_name=='doctor') {
                    echo "<script type=\"text/javascript\">
                    alert('Sucessfully Loged In');
                    window.location = \"getDashboard\"
                    </script>";
                }
            }else {
                if($admin_name=="admin"){
                    echo "<script type=\"text/javascript\">
                    alert('Wrong UserId Or Password');
                    </script>";
                    redirect('super-admin/8083');
                }else{
                echo "<script type=\"text/javascript\">
                    alert('Wrong UserId Or Password');
                    </script>";
                }
            }
            }
            if($admin_uri1=="super-admin" && $admin_uri2==8083){
                $this->load->view('superadmin_login');
            }else{
                $this->load->view('login');
            }
        }
        /**
         * Log out user and destroy session
         */
        public function logoutUser(){
            $this->session->sess_destroy();
            redirect('main/login');

        }
        private function _sendMessage($mobno,$body){
            $sid = 'AC988fa559081cbdf8a23a8f3f33671fab';
            $token = '67531d75c6b49c46fcc9d459e9e10cef';
            $client = new Client($sid, $token);
 
            // Use the client to do fun stuff like send text messages!
             return $client->messages->create(
                // the number you'd like to send the message to
                '+91'."'$mobno'",
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    "from" => "+19205192249",
                    // the body of the text message you'd like to send
                    'body' => "$body"
                )
            );
        }
        public function GeneratePdf(){
            $this->db->select("*");
            $this->db->from("doctor_data");
            $this->db->where("medical_id",11);
            $res['report']=$this->db->get()->result();
            $this->load->view('prescription',$res);
            $html = $this->output->get_output();
                    // Load pdf library
            $this->load->library('pdf');
            $this->pdf->loadHtml($html);
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->render();
            // Output the generated PDF (1 = download and 0 = preview)
            $this->pdf->stream("html_contents.pdf", array("Attachment"=> 0));		
        }
        public function addPatientPrec($id){
            $prec=$this->input->post('prec');
            $this->db->select("*");
            $this->db->from("patients_data");
            $this->db->where("id",$id);
            $data['pdata']=$this->db->get()->result();
            $data['p_pk_id']=$id;
            if($prec!='' && !empty($prec)){
                $this->db->where('id', $id);
                $this->db->update('patients_data', array('prescription' => $prec,'checked_up_flag'=>1));
                $this->session->set_flashdata('prec_msg', 'Sucessfully prescription added');
                $urll=isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? $url = "https://" : "http://"; 
                $urll.=$_SERVER['HTTP_HOST'];
                $msg="Your doctor recomended medicine are $prec <br>";
                $msg.="Or else you also can download the prescription click on this link ".$urll.'/Main/prescription/'.$id;
                $this->_sendMessage($data['pdata'][0]->phno,$msg);
                    redirect('main/getPatient');
            }
            $this->load->view('addPatientPrec',$data);
        }
        public function prescription($id = null)
        {
            $medical_pf_id=  $this->session->userdata('medical_pf_id');
            $pid=$id;

            $this->db->select("md.medical_name,dd.doc_name,dd.phno as d_ph,pd.patients_name,pd.phno as p_ph,pd.dob,pd.gender,pd.prescription");
            $this->db->from("patients_data as pd");
            $this->db->join("medical_data as md","md.id=pd.medical_id",'join');
            $this->db->join("doctor_data as dd","dd.id=pd.doc_id",'join');
            // $this->db->where("pd.medical_id",$medical_pf_id);
            $this->db->where("pd.id",$pid);
            $res['report']=$this->db->get()->result();
            $paitent_name=$res['report'][0]->patients_name;
            $this->load->view('prescription',$res);

            $html = $this->output->get_output();
                    // Load pdf library
            $this->load->library('pdf');
            $this->pdf->loadHtml($html);
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->render();
            // Output the generated PDF (1 = download and 0 = preview)
            $this->pdf->stream("$paitent_name-prescription.pdf", array("Attachment"=> 0));

        }
        public function getDashboard(){
            $medical_pf_id=  $this->session->userdata('medical_pf_id');
            $this->db->select("id");
            $this->db->from("doctor_data");
            if($medical_pf_id!='' || empty($medical_pf_id)){
            $this->db->where("medical_id",$medical_pf_id);
            }
            $data["doc"]=$this->db->get()->num_rows();
            $this->db->select("id");
            $this->db->from("login_credential");
            if($medical_pf_id!='' || empty($medical_pf_id)){
                $this->db->where("medical_id",$medical_pf_id);
            }
            $data["staff"]=$this->db->get()->num_rows();
            $this->db->select("id");
            $this->db->from("patients_data");
            if($medical_pf_id!='' || empty($medical_pf_id)){
                $this->db->where("medical_id",$medical_pf_id);
            }
            $data["pat"]=$this->db->get()->num_rows();
            $this->load->view('dashboard',$data);
        }
        public function getDoc(){
            $user_pk_id=  $this->session->userdata('user_pk_id');
            $medical_pf_id=  $this->session->userdata('medical_pf_id');
            $this->db->select("dd.*,md.medical_name");
            $this->db->from("doctor_data dd");
            $this->db->join("medical_data as md",'md.id=dd.medical_id','join');
            $this->db->where("dd.medical_id",$medical_pf_id);
            $this->db->order_by('dd.id','desc');
            $data["alldocs"]=$this->db->get()->result();
            $this->load->view('allDoctors',$data);

        }
        public function getPatient(){
            $user_pk_id=  $this->session->userdata('user_pk_id');
           $medical_pf_id=  $this->session->userdata('medical_pf_id');
            $post_submit=$this->input->post("submit");
            $this->db->select("pd.*,ds.id as did,ds.disease_name");
            $this->db->from("patients_data as pd");
            $this->db->join("medical_data as md",'md.id=pd.medical_id','join');
            $this->db->join("disease as ds",'md.id=pd.medical_id','join');
            $this->db->where("pd.medical_id",$medical_pf_id);
            $this->db->order_by('pd.id','desc');
            if($post_submit){
                echo $this->input->post("date_filter");
                $this->db->where("register_date =",$this->input->post("date_filter"));
                $this->db->or_where("apointment_date =",$this->input->post("date_filter"));
                // die();
            }
            $data["allPatients"]=$this->db->get()->result();
            $this->load->view('getPateint',$data);
        }
        public function getStaff(){
            $user_pk_id=  $this->session->userdata('user_pk_id');
            $medical_pf_id=  $this->session->userdata('medical_pf_id');
            $this->db->select("*");
            $this->db->from("login_credential");
            $this->db->where("medical_id",$medical_pf_id);
            $this->db->order_by('id','desc');
            $data["allStaffs"]=$this->db->get()->result();
            $this->load->view('getStaff',$data);
        }
    }

?>