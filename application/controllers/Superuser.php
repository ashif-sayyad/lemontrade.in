<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superuser extends CI_Controller {
	public function __construct()  
	{
		parent::__construct();
		//$this->load->model('excel_import_model');
		$this->load->library('excel');
                $this->load->model('tadmin_model');
                $this->load->model('admin');
                $this->load->model('import_model', 'import');
                $this->load->library('session');
                date_default_timezone_set("Asia/Kolkata");
                $this->load->library('form_validation');
                $this->load->helper(array('form','url','file'));	
	 
	}
        
        function rand(){
            
//            $rand = rand(1000,9999);
            $d ='2018-05';
            $n=date('Y-m');
            if($d >= $n){
                echo 1;
            }else{
                echo 0;
            }
        }

        public function index()
	{
             if ($this->session->userdata('superuser_login') == 1) {
                 $this->session->set_userdata('last_page', current_url());                  
                 $data['page_title'] = 'Dashboard'; 
                 $this->load->view('superuser/index',$data);			
            }
           else{
                    $data['page_title'] = 'Login';
                    $this->load->view('myadmin/login',$data);
		}
        }   
   
     function  sendsms(){
            $code = 123456;
            $date = date('Y-m-d');
            $contact = 9922031316;
             $msg ="Use $code for todays vendor transactions. This is system generated.";
            $data = $this->send_message($contact,$msg);   
            echo $data;
        }

        public function send_message($mob,$msg)
	{
               $web_url = "http://www.sms123.in/QuickSend.aspx?";
                $url = $web_url.http_build_query(array('username'=> "tirupati",'password' => "tirupati",
                    'mob' => $mob,'msg' => $msg,'sender' => "TRTRVL"));	                	
	 	 //echo  $url;
                 //echo $shortUrl=file_get_contents($url);
		$ch = curl_init();
		if($ch)
		{					
			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			$result = curl_exec($ch );
		
			curl_close( $ch );
			return 1;
		}
		else
		{
			return 0;
		}
	}

      
     
     
        /*************Society*********/
        public function members($task='',$member_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'addMember'){
                         $this->form_validation->set_rules('wing', 'Wing', 'required');
			 $this->form_validation->set_rules('floor_no','Floor No','required');
			 $this->form_validation->set_rules('flat_no', 'Flat No', 'required');
			 $this->form_validation->set_rules('first_name', 'First Name', 'required');
                         $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                         $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
                         $this->form_validation->set_rules('email', 'Email', 'required','required');
                        $email=strtolower($this->input->post('email'));
			 $password='123456';
                          $static_str='AM';
			$currenttimeseconds = date("mdY_His");
                        $TOKEN = md5($static_str.$currenttimeseconds);
			 if ($this->form_validation->run())
			{   $n=date('Y-m');
                            $owner = $this->input->post('owner');
                            $ref_member_id = $this->input->post('ref_member_id');
                            
                              $mobile = $this->input->post('mobile');
                              $email = $this->input->post('email'); 
                              $mem = $this->db->get_where('members',array('email'=>$email,'is_active'=>1))->result();
                              $mem1 = $this->db->get_where('members',array('mobile'=>$mobile,'is_active'=>1))->result();
                              if(!empty($ref_member_id) && $owner=='No'){
                                $mem2 = $this->db->get_where('members',array('ref_member_id'=>$ref_member_id,'is_active'=>1))->result();
                              }
                             if($mem) {
                                        $this->session->set_flashdata('err_msg','Data Already Exist..!');
                                         redirect(base_url().'Superuser/members');
                            }elseif($mem1) {
                                     $this->session->set_flashdata('err_msg','Data Already Exist..!');
                                     redirect(base_url().'Superuser/members');
                            }elseif($mem2){
                                    $this->session->set_flashdata('err_msg','Tenant Already Exist..!');
                                     redirect(base_url().'Superuser/members');                                     
                            }else{
                            $society_id = $this->session->userdata('log_admin_id'); 
                            $society_name = $this->session->userdata('log_society_name');
                             
                             if(!empty($ref_member_id)){ $ref_member_id = $ref_member_id;}else{ $ref_member_id='';}
                             $since = $this->input->post('since');
                             if(!empty($since)){ $since = $since;}else{ $since='';}
                             $police_verified = $this->input->post('police_verified');
                             if(!empty($police_verified)){ $police_verified = $police_verified;}else{ $police_verified='';}
                             $agreement = $this->input->post('agreement');
                             if(!empty($agreement)){ $agreement = $agreement;}else{ $agreement='';}
                             $end_period = $this->input->post('end_period');
                             if(!empty($end_period)){ $end_period = $end_period;}else{ $end_period='';}
                            $data=array( 
                                        'society_id'=>$society_id,
                                        'society_name'=>$society_name,
	        			'first_name'=>ucwords(strtolower($this->input->post('first_name'))),
                                        'last_name'=>ucwords(strtolower($this->input->post('last_name'))),
                                        'full_name'=>ucwords(strtolower($this->input->post('first_name')))." ".ucwords(strtolower($this->input->post('last_name'))),
                                        'wing'=> strtoupper($this->input->post('wing')),
                                        'floor_no'=>$this->input->post('floor_no'),
                                        'flat_no'=>$this->input->post('flat_no'),
                                        'flat_type'=>$this->input->post('flat_type'),
                                        'mobile'=>$this->input->post('mobile'),
                                        'email'=>$email,
	        			'password'=>strrev(sha1(md5($password))),                               
	        			'owner'=>$this->input->post('owner'), //if yes 
                                        'ref_member_id' => $ref_member_id,
	        			'since'=>$since,
                                        'police_verified'=>$police_verified,
                                        'agreement'=>$agreement,
                                        'end_period'=>$end_period,
                                
                                        'parking_allotted'=>$this->input->post('parking_allotted'),
                                        'parking_no'=>$this->input->post('parking_no'),
                                        //'parking_type'=> 'Open',//$this->input->post('parking_type'),
                                
                                        'vehicles'=>$this->input->post('vehicles'),//counts
                                
                                        'two_wheeler_1'=> strtoupper($this->input->post('two_wheeler_1')),
                                        'two_wheeler_2'=>strtoupper($this->input->post('two_wheeler_2')),
                                        'two_wheeler_3'=>strtoupper($this->input->post('two_wheeler_3')),
                                        'two_wheeler_4'=>strtoupper($this->input->post('two_wheeler_4')),
                                        
                                        'four_wheeler_1'=>strtoupper($this->input->post('four_wheeler_1')),
                                        'four_wheeler_2'=>strtoupper($this->input->post('four_wheeler_2')),
                                        'four_wheeler_3'=>strtoupper($this->input->post('four_wheeler_3')),
                                
                                        'bicycle_1'=>strtoupper($this->input->post('bicycle_1')),
                                        'bicycle_2'=>strtoupper($this->input->post('bicycle_2')),
                                        'bicycle_3'=>strtoupper($this->input->post('bicycle_3')),
                                
	        			//'token'=>$TOKEN,
                                        'is_active'=>1
	        			);
					$details=$this->admin->record_insert('members',$data);
					//$findemail = $this->admin->Sendmail($email,$password);

					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Data Added Successfully.');
					redirect(base_url().'Superuser/members');
                        }
                           
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/members');
                        }
           }
             if($task == 'editMember'){
                          $this->form_validation->set_rules('wing', 'Wing', 'required');
			 $this->form_validation->set_rules('floor_no','Floor No','required');
			 $this->form_validation->set_rules('flat_no', 'Flat No', 'required');
			 $this->form_validation->set_rules('first_name', 'First Name', 'required');
                         $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                         //$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');		 
			 if ($this->form_validation->run())
			{
                             $since = $this->input->post('since');
                             if(!empty($since)){ $since = $since;}else{ $since='';}
                             $police_verified = $this->input->post('police_verified');
                             if(!empty($police_verified)){ $police_verified = $police_verified;}else{ $police_verified='';}
                             $agreement = $this->input->post('agreement');
                             if(!empty($agreement)){ $agreement = $agreement;}else{ $agreement='';}
                              $end_period = $this->input->post('end_period');
                             if(!empty($end_period)){ $end_period = $end_period;}else{ $end_period='';}
                             
                             $data=array(
					'first_name'=>ucwords(strtolower($this->input->post('first_name'))),
                                        'last_name'=>ucwords(strtolower($this->input->post('last_name'))),
                                        'full_name'=>ucwords(strtolower($this->input->post('first_name')))." ".ucwords(strtolower($this->input->post('last_name'))),
                                        'wing'=>$this->input->post('wing'),
                                        'floor_no'=>$this->input->post('floor_no'),
                                        'flat_no'=>$this->input->post('flat_no'),
                                        'flat_type'=>$this->input->post('flat_type'),
                                        //'mobile'=>$this->input->post('mobile'),                            
	        			'owner'=>$this->input->post('owner'), //if yes 
                                
                                        'since'=>$since,
                                        'police_verified'=>$police_verified,
                                        'agreement'=>$agreement,
                                        'end_period'=>$end_period,
                                
                                        'parking_allotted'=>$this->input->post('parking_allotted'),
                                        'parking_no'=>$this->input->post('parking_no'),
                                        //'parking_type'=>$this->input->post('parking_type'),
                                
                                        'vehicles'=>$this->input->post('vehicles'),//counts
                                        'two_wheeler_1'=>$this->input->post('two_wheeler_1'),
                                        'two_wheeler_2'=>$this->input->post('two_wheeler_2'),
                                        'two_wheeler_3'=>$this->input->post('two_wheeler_3'),
                                        'two_wheeler_4'=>$this->input->post('two_wheeler_4'),
                                        
                                        'four_wheeler_1'=>$this->input->post('four_wheeler_1'),
                                        'four_wheeler_2'=>$this->input->post('four_wheeler_2'),
                                        'four_wheeler_3'=>$this->input->post('four_wheeler_3'),
                                
                                        'bicycle_1'=>$this->input->post('bicycle_1'),
                                        'bicycle_2'=>$this->input->post('bicycle_2'),
                                        'bicycle_3'=>$this->input->post('bicycle_3')
                                 );
                                
                                        $where =array('member_id'=>$member_id);
					$vendors=$this->admin->records_update('members',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Data Updated Successfully.');
					redirect(base_url().'Superuser/members');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/members');
                        }                 
             }
             if($task == 'delete'){
                        $where =array('member_id'=>$member_id);
                        $this->admin->delete_record('members',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/members');
             }
             
            $this->db->order_by("member_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1);
            $data['member_info']=$this->admin->record_list('members',$where);
            $data['page_title']='Members';
            $this->load->view('superuser/members',$data);
        }
        
        public function loadTenant(){
            echo $this->load->view('superuser/addTenant');
        }
        public function loadeditTenant(){
            echo $this->load->view('superuser/editTenant');
        }
        /********noticeboard*********/
        
	public function noticeboard($task='',$notice_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addNotice'){
                        $society_id = $this->session->userdata('log_admin_id');
                        $notice_no = $this->input->post('notice_no');
                        $where =array('society_id'=>$society_id,'notice_no'=>$notice_no,'is_active'=>1);
                        $avail=$this->admin->record_list('noticeboard',$where);
                        if($avail){
                            $this->session->set_flashdata('err_msg','Notice No Already Exist..!');
                             redirect(base_url().'Superuser/noticeboard');
                        }else{
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');
                        $this->form_validation->set_rules('notice_no', 'Notice No', 'required');
			$this->form_validation->set_rules('summary', 'Summary', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');			
			 if ($this->form_validation->run())
			{
                             if($_FILES['notice']['name']!= "")
                                {
                                    $img_name='notice';
                                    $img_path='notice';
                                    $profile=$this->admin->upload_image($img_name,$img_path);  
                                }else{
                                   $profile=''; 
                                }
                           
                            $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
	        			'start_date'=>$this->input->post('start_date'),
	        			'end_date'=>$this->input->post('end_date'),
                                        'notice_no'=>$this->input->post('notice_no'),
                                        'summary'=>$this->input->post('summary'),
	        			'description'=>$this->input->post('description'),
                                        'view_for'=>1,//$this->input->post('view_for'),//array
                                        'file'=>$profile,
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('noticeboard',$data);
                                        $id = $this->db->insert_id();
                                        $msg = 'New Notice Added in Society..!';
                                        $this->send_note($msg,'NoticeBoard',$id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Notice Added Successfully.');
					redirect(base_url().'Superuser/noticeboard');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/noticeboard');
                        } 
                    }
             }
             
             if($task == 'editNotice'){
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');
                        $this->form_validation->set_rules('notice_no', 'Notice No', 'required');
                        $this->form_validation->set_rules('summary', 'Summary', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			 if ($this->form_validation->run())
			{
                             if($_FILES['notice']['name']!= "")
                                {
                                    $img_name='notice';
                                    $img_path='notice';
                                    $profile=$this->admin->upload_image($img_name,$img_path); 
                                     $data=array(
					'start_date'=>$this->input->post('start_date'),
	        			'end_date'=>$this->input->post('end_date'),
                                        'notice_no'=>$this->input->post('notice_no'),
                                        'summary'=>$this->input->post('summary'),
	        			'description'=>$this->input->post('description'),
                                        'file'=>$profile	        			
                                        );   
                                }else{
                                    $data=array(
					'start_date'=>$this->input->post('start_date'),
	        			'end_date'=>$this->input->post('end_date'),
                                        'notice_no'=>$this->input->post('notice_no'),
                                        'summary'=>$this->input->post('summary'),
	        			'description'=>$this->input->post('description')	        			
                                        );   
                                }
                                                        
                                        $where =array('notice_id'=>$notice_id);
					$banners=$this->admin->records_update('noticeboard',$data,$where);
                                        $msg = 'Notice Updated in Society..!';
                                        $this->send_note($msg,'NoticeBoard',$notice_id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Notice Updated Successfully.');
					redirect(base_url().'Superuser/noticeboard');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/noticeboard');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('notice_id'=>$notice_id);
                        $this->admin->delete_record('noticeboard',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/noticeboard');
             }             
            $this->db->order_by("notice_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1);
            $data['noticeboard_info']=$this->admin->record_list('noticeboard',$where);
            $data['page_title']='Notice Board';
            $this->load->view('superuser/noticeboard',$data);
        }
        
       /**********management******/
        public function management($task='',$management_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addManagement'){
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Date', 'required');
			$this->form_validation->set_rules('role', 'Role', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
                        $this->form_validation->set_rules('available_time', 'Available Time', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
	        			'first_name'=> ucwords(strtolower($this->input->post('first_name'))),
	        			'last_name'=>ucwords(strtolower($this->input->post('last_name'))),
                                        'role'=>ucwords(strtolower($this->input->post('role'))),
	        			'mobile'=>$this->input->post('mobile'),
                                        'available_time'=> strtoupper($this->input->post('available_time')),
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('management',$data);
                                        $id = $this->db->insert_id();
                                         $msg = 'New Management Member Added in Society..!';
                                        $this->send_note($msg,'Management',$id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Management Added Successfully.');
					redirect(base_url().'Superuser/management');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/management');
                        } 
             }
             
             if($task == 'editManagement'){
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Date', 'required');
			$this->form_validation->set_rules('role', 'Role', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
                        $this->form_validation->set_rules('available_time', 'Available Time', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array(
	        			'first_name'=> ucwords(strtolower($this->input->post('first_name'))),
	        			'last_name'=>ucwords(strtolower($this->input->post('last_name'))),
                                        'role'=>ucwords(strtolower($this->input->post('role'))),
	        			'mobile'=>$this->input->post('mobile'),
                                        'available_time'=> strtoupper($this->input->post('available_time'))        			
                                        );                                
                                        $where =array('management_id'=>$management_id);
					$banners=$this->admin->records_update('management',$data,$where);
                                        
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Management Updated Successfully.');
					redirect(base_url().'Superuser/management');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/management');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('management_id'=>$management_id);
                        $this->admin->delete_record('management',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/management');
             }             
            $this->db->order_by("management_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1);
            $data['management_info']=$this->admin->record_list('management',$where);
            $data['page_title']='Management';
            $this->load->view('superuser/management',$data);
        }
        
        
        /**********emergency******/
        public function emergency($task='',$contact_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addEmergency'){
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('contact_for', 'For', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
	        			'name'=>ucwords(strtolower($this->input->post('name'))),
	        			'contact_for'=>$this->input->post('contact_for'),
	        			'mobile'=>$this->input->post('mobile'),
                                        'alternate_mobile'=>$this->input->post('alternate_mobile'),
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('emergency_contact',$data);
                                        $id = $this->db->insert_id();
                                         $msg = 'New Emergency Contact Added in Society..!';
                                        $this->send_note($msg,'Contact',$id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Emergency Contact Added Successfully.');
					redirect(base_url().'Superuser/emergency');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/emergency');
                        } 
             }
             
             if($task == 'editEmergency'){
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('contact_for', 'For', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array(
	        			'name'=>ucwords(strtolower($this->input->post('name'))),
	        			'contact_for'=>$this->input->post('contact_for'),
	        			'mobile'=>$this->input->post('mobile'),
                                        'alternate_mobile'=>$this->input->post('alternate_mobile')	        			
                                        );                                
                                        $where =array('contact_id'=>$contact_id);
					$banners=$this->admin->records_update('emergency_contact',$data,$where);
                                         $msg = 'Emergency Contact Updated in Society..!';
                                        $this->send_note($msg,'Contact',$contact_id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Emergency Contact Updated Successfully.');
					redirect(base_url().'Superuser/emergency');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/emergency');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('contact_id'=>$contact_id);
                        $this->admin->delete_record('emergency_contact',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/emergency');
             }             
            $this->db->order_by("contact_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1);
            $data['emergency_info']=$this->admin->record_list('emergency_contact',$where);
            $data['page_title']='Emergency Contact';
            $this->load->view('superuser/emergency',$data);
        }
        
        
         /**********events******/
        public function events($task='',$event_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addEvents'){
                        $society_id = $this->session->userdata('log_admin_id');
                        $summary = $this->input->post('summary');
                        $where =array('society_id'=>$society_id,'summary'=>$summary,'is_active'=>1);
                        $avail=$this->admin->record_list('society_events',$where);
                        if($avail){
                            $this->session->set_flashdata('err_msg','Event Name Already Exist..!');
                             redirect(base_url().'Superuser/events');
                        }else{
			$this->form_validation->set_rules('date', 'Date', 'required');
			$this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                              if($_FILES['image']['name']!= "")
                                {
                                    $img_name='image';
                                    $img_path='events';
                                    $profile=$this->admin->upload_image($img_name,$img_path);  
                                }
                                else{
                                    $profile='';
                                }
                            $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
	        			'date'=>$this->input->post('date'),
	        			'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'image'=>$profile,
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('society_events',$data);
                                        $id = $this->db->insert_id();
                                        $msg = 'New Event Added in Society..!';
                                        $this->send_note($msg,'SocietyEvent',$id);
                                       
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Society Event Added Successfully.');
					redirect(base_url().'Superuser/events');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/events');
                        } 
                    }
             }
             
             if($task == 'editEvents'){
			$this->form_validation->set_rules('date', 'Date', 'required');
			$this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                             if($_FILES['image']['name']!= "")
                                {
                                    $img_name='image';
                                    $img_path='events';
                                    $profile=$this->admin->upload_image($img_name,$img_path); 
                                      $data=array(
	        			'date'=>$this->input->post('date'),
	        			'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'image'=>$profile
                                        );   
                                }else{
                                    $data=array(
	        			'date'=>$this->input->post('date'),
	        			'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'image'=>''	        			
                                        );  
                                }
                                                               
                                        $where =array('event_id'=>$event_id);
					$banners=$this->admin->records_update('society_events',$data,$where);
                                        $msg = 'Event Details Updated in Society..!';
                                        $this->send_note($msg,'SocietyEvent',$event_id);
                                         
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Society Event Updated Successfully.');
					redirect(base_url().'Superuser/events');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/events');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('event_id'=>$event_id);
                        $this->admin->delete_record('society_events',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/events');
             }
            $today = date('Y-m-d');             
            $this->db->order_by("date");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1,'date >='=>$today);
            $data['event_info']=$this->admin->record_list('society_events',$where);
            $data['page_title']='Society Events';
            $this->load->view('superuser/events',$data);
        }
        
        
         /**********nearbyevents******/
        public function nearbyevents($task='',$nearbyevent_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addNearEvents'){
                        $society_id = $this->session->userdata('log_admin_id');
                        $summary = $this->input->post('summary');
                        $where =array('society_id'=>$society_id,'summary'=>$summary,'is_active'=>1);
                        $avail=$this->admin->record_list('nearbyevents',$where);
                        if($avail){
                            $this->session->set_flashdata('err_msg','Event Name Already Exist..!');
                             redirect(base_url().'Superuser/nearbyevents');
                        }else{
			$this->form_validation->set_rules('date', 'Date', 'required');
			$this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                             if($_FILES['image']['name']!= "")
                                {
                                    $img_name='image';
                                    $img_path='nearbyevents';
                                    $profile=$this->admin->upload_image($img_name,$img_path);  
                                }
                                else{
                                    $profile='';
                                }
                                $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
	        			'date'=>$this->input->post('date'),
	        			'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'image'=>$profile,
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('nearbyevents',$data);
                                        $id = $this->db->insert_id();
                                        $msg = 'New NearBy Event Added in Society..!';
                                        $this->send_note($msg,'NearBySocietyEvent',$id);                                        
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Near By Event Added Successfully.');
					redirect(base_url().'Superuser/nearbyevents');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/nearbyevents');
                        }
                    }    
             }
             
             if($task == 'editNearEvents'){
			$this->form_validation->set_rules('date', 'Date', 'required');
			$this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                            if($_FILES['image']['name']!= "")
                                {
                                    $img_name='image';
                                    $img_path='nearbyevents';
                                    $profile=$this->admin->upload_image($img_name,$img_path); 
                                      $data=array(
	        			'date'=>$this->input->post('date'),
	        			'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'image'=>$profile
                                        );   
                                }else{
                                    $data=array(
	        			'date'=>$this->input->post('date'),
	        			'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'image'=>''	        			
                                        );  
                                }
                                                               
                                        $where =array('nearbyevent_id'=>$nearbyevent_id);
					$banners=$this->admin->records_update('nearbyevents',$data,$where);
                                        $msg = 'NearBy Event Updated in Society..!';
                                        $this->send_note($msg,'NearBySocietyEvent',$nearbyevent_id);                                        
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Near By Event Updated Successfully.');
					redirect(base_url().'Superuser/nearbyevents');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/nearbyevents');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('nearbyevent_id'=>$nearbyevent_id);
                        $this->admin->delete_record('nearbyevents',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/nearbyevents');
             }             
            $today = date('Y-m-d');             
            $this->db->order_by("date");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1,'date >='=>$today);
            $data['event_info']=$this->admin->record_list('nearbyevents',$where);
            $data['page_title']='Near By Events';
            $this->load->view('superuser/nearbyevent',$data);
        }
        
        
          /**********gallery******/
        public function gallery($task='',$gallery_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addGallery'){
                //$this->form_validation->set_rules('event_id', 'Event Name', 'required');
                $this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                              $cpt1 = count ($_FILES['gallery']['name']);                              
                                if($cpt1 > 0){
                                        $img = array(); 
                                         $entry = array();
                                        for($i = 0; $i < $cpt1; $i++) {
                                       
                                            if($_FILES['gallery']['name'][$i]!= "")
                                            {
                                                $img_name='gallery';
                                                $img_path='gallery';
                                                 $profile=$this->admin->uploadmult_image($img_name,$img_path,$i);
                                                //$img['img']=$profile; 
                                                                                                  
                                            }
                                            array_push($img, array('img'=>$profile));
                                        }
                                }
                              
                                if($img){
                                     $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
                                        //'event_id'=>$this->input->post('event_id'),
                                         'summary'=>$this->input->post('summary'),
                                        'media_path'=>json_encode($img), 
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('gallery',$data);
                                        $id = $this->db->insert_id();
                                        $msg = 'New Gallery Added in Society..!';
                                        $this->send_note($msg,'Gallery',$id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Gallery Added Successfully.');
					redirect(base_url().'Superuser/gallery');
                                }
                                else
                                {
                                        $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                        redirect(base_url() .'Superuser/gallery');
                                }
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/gallery');
                        } 
             }
             
             if($task == 'editGallery'){
			$this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array(
	        			'summary'=>$this->input->post('summary')	        			
                                        );                                
                                        $where =array('gallery_id'=>$gallery_id);
					$banners=$this->admin->records_update('gallery',$data,$where);
                                        $msg = 'Gallery Updated in Society..!';
                                        $this->send_note($msg,'Gallery',$gallery_id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Gallery Updated Successfully.');
					redirect(base_url().'Superuser/gallery');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/gallery');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('gallery_id'=>$gallery_id);
                        $this->admin->delete_record('gallery',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/gallery');
             }             
            $this->db->order_by("gallery_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1);
            $data['gallery_info']=$this->admin->record_list('gallery',$where);
            $data['page_title']='Gallery';
            $this->load->view('superuser/gallery',$data);
        }
        
        
         /**********complaints******/
        public function complaints($task='',$suggestion_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addComplaint'){
			$this->form_validation->set_rules('subject', 'Subject', 'required');
                        $this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                             $show_for = $this->input->post('show_for');
                             $mem = $this->input->post('members');
                             $memcount = sizeof($mem);
                             if($memcount > 0){
                                  $members=array();   
                             for($i=0;$i<$memcount;$i++){
                                  $new_entry = array('member_id' => $mem[$i]);
                                    array_push($members, $new_entry);
                             }
                              $members = json_encode($members);
                             }else{
                                 $members='';
                             }
                             
                             $wing = $this->input->post('wings');
                             $wingcount = sizeof($wing);
                             if($wingcount > 0){
                                 $wings=array(); 
                             for($j=0;$j<$wingcount;$j++){
                                  $new = array('wing' => $wing[$j]);
                                    array_push($wings, $new);
                             }
                             $wings = json_encode($wings);
                             }else{
                                 $wings='';
                             }
                             
                            $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
	        			'subject'=>$this->input->post('subject'),
                                        'summary'=>$this->input->post('summary'),
                                        'show_for'=>$this->input->post('show_for'),
                                        'members'=>$members,
                                        'wings'=>$wings,
                                        'complaint_status'=>'Open',
                                        'reported_by'=>$this->session->userdata('log_admin_name'),
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('suggestion',$data);
                                        $id = $this->db->insert_id();
                                        $msg = 'New Complaint Added in Society..!';
                                         
                                        $this->send_note($msg,'SocietyComplaints',$id);
                                        
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Complaint Added Successfully.');
					redirect(base_url().'Superuser/complaints');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/complaints');
                        } 
             }
             
             if($task == 'editComplaint'){
			$this->form_validation->set_rules('subject', 'Subject', 'required');
                        $this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                                                     
                             $mem = $this->input->post('members');
                             $memcount = sizeof($mem);
                             if($memcount > 0){
                                  $members=array();   
                             for($i=0;$i<$memcount;$i++){
                                  $new_entry = array('member_id' => $mem[$i]);
                                    array_push($members, $new_entry);
                             }
                              $members = json_encode($members);
                             }else{
                                 $members='';
                             }
                             
                             $wing = $this->input->post('wings');
                             $wingcount = sizeof($wing);
                             if($wingcount > 0){
                                 $wings=array(); 
                             for($j=0;$j<$wingcount;$j++){
                                  $new = array('wing' => $wing[$j]);
                                    array_push($wings, $new);
                             }
                             $wings = json_encode($wings);
                             }else{
                                 $wings='';
                             }
                             
                            $data=array(
	        			'subject'=>$this->input->post('subject'),
                                        'summary'=>$this->input->post('summary'),
                                        'show_for'=>$this->input->post('show_for'),
                                        //'members'=> ($members),
                                        //'wings'=>($wings),
                                        'complaint_status'=>$this->input->post('complaint_status'),
                                        'note'=>$this->input->post('note')
                                        ); 
                            $datt=array(
                                'member_id'=>'',
                                'suggestion_id'=>$suggestion_id,
                                'status'=>$this->input->post('complaint_status'),
                                'note'=>$this->input->post('note')                               
                                   ); 
                                        $this->db->insert('notes',$datt);
                                        $where =array('suggestion_id'=>$suggestion_id);
					$banners=$this->admin->records_update('suggestion',$data,$where);
                                        $msg = 'Complaint Updated in Society..!';
                                        $this->send_note($msg,'SocietyComplaints',$suggestion_id);
                                        
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Complaint Updated Successfully.');
					redirect(base_url().'Superuser/complaints');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/complaints');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('suggestion_id'=>$suggestion_id);
                        $this->admin->delete_record('suggestion',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/complaints');
             }             
            $this->db->order_by("suggestion_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1);
            $data['suggestion_info']=$this->admin->record_list('suggestion',$where);
            $data['page_title']='Complaints';
            $this->load->view('superuser/complaints',$data);
        }
        
        
        
         /**********polls******/
        public function polls($task='',$poll_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addPoll'){
                        $this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                             $answers=array(); 
                              $ans1 = $this->input->post('anwsers');
                               $count = sizeof($ans1);
                                $ans = array_unique($ans1,SORT_REGULAR);
                             for($i=0;$i<$count;$i++){
                                 if(!empty($ans[$i])){
                                    array_push($answers, ucwords(strtolower($ans[$i])));
                                 }
                             }
                             $anrs=array();
                             $cont = sizeof($answers);
                             $answers = array_unique($answers,SORT_REGULAR);
                             for($j=0;$j<$cont;$j++){
                                 if(!empty($answers[$j])){
                                  $new_entry = array('radio' => $answers[$j]);
                                    array_push($anrs, $new_entry);
                                 }
                             }
                            $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
                                        'summary'=>$this->input->post('summary'),
                                        'start_date'=>$this->input->post('start_date'),
                                        'end_date'=>$this->input->post('end_date'),
                                        'answers'=>json_encode($anrs),
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('polls',$data);
                                        $id = $this->db->insert_id();
                                        $msg = 'New Opinion Poll Added in Society..!';
                                        $this->send_note($msg,'Poll',$id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Polls Added Successfully.');
					redirect(base_url().'Superuser/polls');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/polls');
                        } 
             }
             
             if($task == 'editPoll'){
                        $this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array(
                                        'summary'=>$this->input->post('summary'),
                                        'for_role'=>$this->input->post('for_role'),
                                        'for_wing'=>$this->input->post('for_wing'),
                                        'for_flatType'=>$this->input->post('for_flatType')	        			
                                        );                                
                                        $where =array('poll_id'=>$poll_id);
					$banners=$this->admin->records_update('polls',$data,$where);
                                        $msg = 'Opinion Poll Updated in Society..!';
                                        $this->send_note($msg,'Poll',$poll_id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Polls Updated Successfully.');
					redirect(base_url().'Superuser/polls');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/polls');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('poll_id'=>$poll_id);
                        $this->admin->delete_record('polls',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/polls');
             }             
            $this->db->order_by("poll_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1);
            $data['poll_info']=$this->admin->record_list('polls',$where);
            $data['page_title']='Polls';
            $this->load->view('superuser/polls',$data);
        }
        
        
        
        
         /**********Buy/Sell******/
        public function sell($task='',$selling_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addSell'){
                        $this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{ 
                             $date = date('Y-m-d');
                             $day = $this->input->post('days');
                             if($_FILES['image']['name']!= "")
                                {
                                    $img_name='image';
                                    $img_path='selling';
                                   $allowed_extensions = array("image/png", "image/jpg","image/jpeg", "image/gif");
                                    if ( !in_array( $_FILES["image"]["type"], $allowed_extensions ) ){
                                       $this->session->set_flashdata('err_msg','Upload Image Only..!');
                                        redirect(base_url().'Superuser/sell');
                                    }else{
                                    $profile=$this->admin->upload_only_image($img_name,$img_path); 
                                    }
                                }
                                else{
                                    $profile='';
                                }
                           
                            $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
                                        'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'type'=>$this->input->post('type'),
                                        'posted_on'=>$date,
                                        'days'=>$day,
                                        'posted_till'=>date('Y-m-d', strtotime($date. ' + '.$day.' days')),
                                        'image'=>$profile,
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('selling',$data);
                                        $id = $this->db->insert_id();
                                        $msg = 'New Sell & Buy Added in Society..!';
                                        $this->send_note($msg,'Selling',$id);                                         
                                        
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Sell Added Successfully.');
					redirect(base_url().'Superuser/sell');	
                            
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/sell');
                        } 
             }
             
             if($task == 'editSell'){
                        $this->form_validation->set_rules('summary', 'Summary', 'required');
			 if ($this->form_validation->run())
			{
                             if($_FILES['image']['name']!= "")
                                {
                                    $img_name='image';
                                    $img_path='selling';
                                   $allowed_extensions = array("image/png", "image/jpg","image/jpeg", "image/gif");
                                    if ( !in_array( $_FILES["image"]["type"], $allowed_extensions ) ){
                                       $this->session->set_flashdata('err_msg','Upload Image Only..!');
                                        redirect(base_url().'Superuser/sell');
                                    }else{
                                    $profile=$this->admin->upload_only_image($img_name,$img_path); 
                                    }
                                      $data=array(
	        			'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'type'=>$this->input->post('type'),
                                        'image'=>$profile
                                        );   
                                }else{
                                    $data=array(
	        			'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'type'=>$this->input->post('type')	        			
                                        );  
                                }
                                
                                                         
                                        $where =array('selling_id'=>$selling_id);
					$banners=$this->admin->records_update('selling',$data,$where);
                                        $msg = 'Selling Entry Updated in Society..!';
                                        $this->send_note($msg,'Selling',$selling_id);
                                        
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Sell Updated Successfully.');
					redirect(base_url().'Superuser/sell');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/sell');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('selling_id'=>$selling_id);
                        $this->admin->delete_record('selling',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/sell');
             }             
            $this->db->order_by("selling_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $date = date('Y-m-d');
            $where =array('society_id'=>$society_id,'posted_till >='=>$date,'is_active'=>1);
            $data['selling_info']=$this->admin->record_list('selling',$where);
            $data['page_title']='Buy/Sell';
            $this->load->view('superuser/sell',$data);
        }
        
        
        
         /**********payments******/
        public function payments($task='',$payment_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addPayment'){
                        $this->form_validation->set_rules('name', 'Holder Name', 'required');
                        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
                        $this->form_validation->set_rules('account_no', 'Account No', 'required');
                        $this->form_validation->set_rules('IFSC', 'IFSC', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
                                        'name'=> ucwords(strtolower($this->input->post('name'))),
                                        'bank_name'=>ucwords(strtolower($this->input->post('bank_name'))),
                                        'account_no'=>$this->input->post('account_no'),
                                        'address'=>$this->input->post('address'),
                                        'IFSC'=> strtoupper($this->input->post('IFSC')),
                                        'MICR'=>$this->input->post('MICR'),
                                        'UPI'=>$this->input->post('UPI'),
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('payments',$data);
                                        $id = $this->db->insert_id();
                                        $msg = 'New Payment Added in Society..!';
                                        $this->send_note($msg,'Payment',$id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Payment Info Added Successfully.');
					redirect(base_url().'Superuser/payments');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/payments');
                        } 
             }
             
             if($task == 'editPayment'){
                        $this->form_validation->set_rules('name', 'Holder Name', 'required');
                        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
                        $this->form_validation->set_rules('account_no', 'Account No', 'required');
                        $this->form_validation->set_rules('IFSC', 'IFSC', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array(
	        			'name'=> ucwords(strtolower($this->input->post('name'))),
                                        'bank_name'=>ucwords(strtolower($this->input->post('bank_name'))),
                                        'account_no'=>$this->input->post('account_no'),
                                        'address'=>$this->input->post('address'),
                                        'IFSC'=> strtoupper($this->input->post('IFSC')),
                                        'MICR'=>$this->input->post('MICR'),
                                        'UPI'=>$this->input->post('UPI')	        			
                                        );                                
                                        $where =array('payment_id'=>$payment_id);
					$banners=$this->admin->records_update('payments',$data,$where);
                                        $msg = 'Payment Info Updated in Society..!';
                                        $this->send_note($msg,'Payment',$payment_id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Payment Info Updated Successfully.');
					redirect(base_url().'Superuser/payments');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/payments');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('payment_id'=>$payment_id);
                        $this->admin->delete_record('payments',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/payments');
             }             
            $this->db->order_by("payment_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1);
            $data['payment_info']=$this->admin->record_list('payments',$where);
            $data['page_title']='Payments';
            $this->load->view('superuser/payments',$data);
        }
        
        
        
        /********financials*********/
        
	public function financials($task='',$financial_id='')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addFinance'){
			$this->form_validation->set_rules('month', 'Month', 'required');
			$this->form_validation->set_rules('year', 'Year', 'required');
                        $this->form_validation->set_rules('type', 'Type', 'required');
			 if ($this->form_validation->run())
			{
                             if($_FILES['financials']['name']!= "")
                                {
                                    $img_name='financials';
                                    $img_path='financials';
                                    $profile=$this->admin->upload_image($img_name,$img_path);  
                                }
                           if($profile)
                            {
                                    $data=array( 
                                        'society_id'=>$this->session->userdata('log_admin_id'),
	        			'date'=>date('Y-m-d'),
	        			'month'=>$this->input->post('month'),
                                        'year'=>$this->input->post('year'),
                                        'type'=>$this->input->post('type'),
                                        'file'=>$profile,
	        			'is_active'=>1
	        			);
                                        $details=$this->admin->record_insert('financials',$data);
                                        $id = $this->db->insert_id();
                                        $msg = 'New Financial Data Added in Society..!';
                                        $this->send_note($msg,'Financial',$id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Financial data Added Successfully.');
					redirect(base_url().'Superuser/financials');
                                        }
                            else
                            {
                                    $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                    redirect(base_url() .'Superuser/financials');
                            }
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/financials');
                        } 
             }
             
             if($task == 'editFinance'){
			$this->form_validation->set_rules('month', 'Month', 'required');
			$this->form_validation->set_rules('year', 'Year', 'required');
                        $this->form_validation->set_rules('type', 'Type', 'required');
			 if ($this->form_validation->run())
			{
                             if($_FILES['financials']['name']!= "")
                                {
                                    $img_name='financials';
                                    $img_path='financials';
                                    $profile=$this->admin->upload_image($img_name,$img_path); 
                                     $data=array(
					'month'=>$this->input->post('month'),
                                        'year'=>$this->input->post('year'),
                                         'type'=>$this->input->post('type'),
                                        'file'=>$profile	        			
                                        );   
                                }else{
                                    $data=array(
					'month'=>$this->input->post('month'),
                                        'year'=>$this->input->post('year'),
                                        'type'=>$this->input->post('type')
                                        );   
                                }
                                                        
                                        $where =array('financial_id'=>$financial_id);
					$banners=$this->admin->records_update('financials',$data,$where);
                                        $msg = 'Financial Info Updated in Society..!';
                                        $this->send_note($msg,'Financial',$financial_id);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Financial Data Updated Successfully.');
					redirect(base_url().'Superuser/financials');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/financials');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('financial_id'=>$financial_id);
                        $this->admin->delete_record('financials',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Superuser/financials');
             }             
            $this->db->order_by("financial_id","desc");
            $society_id = $this->session->userdata('log_admin_id');
            $where =array('society_id'=>$society_id,'is_active'=>1);
            $data['financial_info']=$this->admin->record_list('financials',$where);
            $data['page_title']='Financials';
            $this->load->view('superuser/financial',$data);
        }
        
        
        /*******profile*******/
        
       
        
        public function profile($task = '',$society_id = '')
        {
            if ($this->session->userdata('superuser_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'updateLogo'){
                if($_FILES['userfile']['name']!= ""){
                      $img_name='userfile';
                      $img_path='logo';
                      $old_img=$this->input->post('old_admin_profile');
                      $profile=$this->admin->upload_image($img_name,$img_path,$old_img);  
                }
                        if($profile)
                        {
                                $data=array('logo'=>$profile);                            
                                $where =array('society_id'=>$society_id);
                                $subadmin=$this->admin->records_update('society',$data,$where);
                                $this->session->set_userdata('log_image', $profile);
                                $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Profile Image Updated Successfully.');
                                redirect(base_url().'Superuser/profile');

                        }
                        else
                        {
                                    $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                    redirect(base_url() .'Superuser/profile');

                        }
            }
            
            if($task == 'updateSuperuserProfile'){
                        $this->form_validation->set_rules('society_name', 'Society Name', 'required');
                        $this->form_validation->set_rules('user_name', 'User Name', 'required');
                         if ($this->form_validation->run())
			{
                            $data=array(
					'society_name'=>ucwords(strtolower($this->input->post('society_name'))),
                                        'user_name'=>ucwords(strtolower($this->input->post('user_name'))),
	        			'space_allotted'=>$this->input->post('space_allotted'),
	        			'no_of_users'=>$this->input->post('no_of_users'),
                                        'address'=>$this->input->post('address'),
	        			'is_active'=>1);
                            
                                        $where =array('society_id'=>$society_id);
					$subadmin=$this->admin->records_update('society',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Profile Updated Successfully.');
					redirect(base_url().'Superuser/profile');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Superuser/profile');
                        }
            }
            
            if($task =='updateSuperuserPassword'){
                
                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE)
                {
                       $this->session->set_flashdata('err_msg', validation_errors());
                        redirect(base_url() . 'Superuser/profile');
                }
                else
                {
                    $where =array('society_id'=>$society_id);
                    $query = $this->tadmin_model->checkOldPassword($this->input->post('old_password'),'society',$where);

                            if($query)
                                    {
                                      $data=array('password'=> strrev(sha1(md5($this->input->post('password')))));
                                            $where =array('society_id'=>$society_id);
                                            $subadmin=$this->admin->records_update('society',$data,$where);
                                            $this->session->sess_destroy();
                                            $this->session->set_flashdata('msg_ok', ('Password Updated Successfully'));
                                            redirect(base_url() . 'Superuser/profile');
                                    }
                                    else
                                    {
                                         $this->session->set_flashdata('err_msg', 'Please Enter the correct password');
                                            redirect(base_url() . 'Superuser/profile');
                                    }

				 
		}
                
            }
            $society_id = $this->session->userdata('log_admin_id');           
            $where =array('society_id'=> $society_id );
            $data['admin_info']=$this->admin->record_list('society',$where);
            $data['page_title']='Profile Setting';
            $this->load->view('superuser/myprofile',$data);
        }
        
        
         // import excel data
    public function save() {
        $this->load->library('excel');
        
        if ($this->input->post('importfile')) {
            $path = './assets/uploads/import/';

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
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
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = array('Wing', 'Floor-No', 'Flat-No', 'Flat-Type','First-Name','Last-Name','Mobile','Email','Owner','Tenant-Name','Tenant-Email','Tenant-Mobile','Since',
                'Police-Verified','Agreement','Parking','Parking-No','Vehicles','Two-Wheeler-1','Two-Wheeler-2','Two-Wheeler-3','Two-Wheeler-4',
                'Four-Wheeler-1','Four-Wheeler-2','Four-Wheeler-3','Bicycle-1','Bicycle-2','Bicycle-3');
            $makeArray = array('Wing' => 'Wing','Floor-No' => 'Floor-No', 'Flat-No' => 'Flat-No', 'Flat-Type' => 'Flat-Type',
                'First-Name' => 'First-Name','Last-Name' =>'Last-Name','Mobile' => 'Mobile','Email' => 'Email','Owner'=> 'Owner',
                'Tenant-Name'=>'Tenant-Name','Tenant-Email'=>'Tenant-Email','Tenant-Mobile'=>'Tenant-Mobile','Since' =>'Since','Police-Verified'=>'Police-Verified','Agreement'=>'Agreement',
                'Parking'=>'Parking','Parking-No'=>'Parking-No','Vehicles'=>'Vehicles','Two-Wheeler-1'=>'Two-Wheeler-1',
                'Two-Wheeler-2'=>'Two-Wheeler-2','Two-Wheeler-3'=>'Two-Wheeler-3','Two-Wheeler-4'=>'Two-Wheeler-4','Four-Wheeler-1'=>'Four-Wheeler-1',
                'Four-Wheeler-2'=>'Four-Wheeler-2','Four-Wheeler-3'=>'Four-Wheeler-3','Bicycle-1'=> 'Bicycle-1','Bicycle-2'=> 'Bicycle-2','Bicycle-3'=> 'Bicycle-3');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
            }
            $data = array_diff_key($makeArray, $SheetDataKey);
           
            if (empty($data)) {
                $flag = 1;
            }
            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {
                    $addresses = array();
                    $wing = $SheetDataKey['Wing'];
                    $floor_no = $SheetDataKey['Floor-No'];
                    $flat_no= $SheetDataKey['Flat-No'];
                    $flat_type = $SheetDataKey['Flat-Type'];
                    $first_name = $SheetDataKey['First-Name'];
                    $last_name = $SheetDataKey['Last-Name'];
                    $mobile = $SheetDataKey['Mobile'];
                    $email = $SheetDataKey['Email'];
                    $owner = $SheetDataKey['Owner'];
                    $tenant_name = $SheetDataKey['Tenant-Name'];
                    $tenant_email = $SheetDataKey['Tenant-Email'];
                    $tenant_mobile = $SheetDataKey['Tenant-Mobile'];
                    $since = $SheetDataKey['Since'];
                    $police_verified = $SheetDataKey['Police-Verified'];
                    $agreement = $SheetDataKey['Agreement'];
                    $parking_allotted = $SheetDataKey['Parking'];
                    $parking_no = $SheetDataKey['Parking-No'];
                    $vehicles = $SheetDataKey['Vehicles'];
                    $two_wheeler_1 = $SheetDataKey['Two-Wheeler-1'];
                    $two_wheeler_2 = $SheetDataKey['Two-Wheeler-2'];
                    $two_wheeler_3 = $SheetDataKey['Two-Wheeler-3'];
                    $two_wheeler_4 = $SheetDataKey['Two-Wheeler-4'];
                    $four_wheeler_1 = $SheetDataKey['Four-Wheeler-1'];
                    $four_wheeler_2 = $SheetDataKey['Four-Wheeler-2'];
                    $four_wheeler_3 = $SheetDataKey['Four-Wheeler-3'];
                    $bicycle_1 = $SheetDataKey['Bicycle-1'];
                    $bicycle_2 = $SheetDataKey['Bicycle-2'];
                    $bicycle_3 = $SheetDataKey['Bicycle-3'];
                    
                    $wing = filter_var(trim($allDataInSheet[$i][$wing]), FILTER_SANITIZE_STRING);
                    $floor_no = filter_var(trim($allDataInSheet[$i][$floor_no]), FILTER_SANITIZE_STRING);
                    $flat_no = filter_var(trim($allDataInSheet[$i][$flat_no]), FILTER_SANITIZE_EMAIL);
                    $flat_type = filter_var(trim($allDataInSheet[$i][$flat_type]), FILTER_SANITIZE_STRING);
                    $first_name = filter_var(trim($allDataInSheet[$i][$first_name]), FILTER_SANITIZE_STRING);
                    $last_name = filter_var(trim($allDataInSheet[$i][$last_name]), FILTER_SANITIZE_STRING);
                    $mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);
                    $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_STRING);
                    $owner = filter_var(trim($allDataInSheet[$i][$owner]), FILTER_SANITIZE_STRING);
                    $tenant_name = filter_var(trim($allDataInSheet[$i][$tenant_name]), FILTER_SANITIZE_STRING);
                    $tenant_email = filter_var(trim($allDataInSheet[$i][$tenant_email]), FILTER_SANITIZE_STRING);
                    $tenant_mobile = filter_var(trim($allDataInSheet[$i][$tenant_mobile]), FILTER_SANITIZE_STRING);
                    $since = filter_var(trim($allDataInSheet[$i][$since]), FILTER_SANITIZE_STRING);
                    $police_verified = filter_var(trim($allDataInSheet[$i][$police_verified]), FILTER_SANITIZE_STRING);
                    $agreement = filter_var(trim($allDataInSheet[$i][$agreement]), FILTER_SANITIZE_STRING);
                    $parking_allotted = filter_var(trim($allDataInSheet[$i][$parking_allotted]), FILTER_SANITIZE_STRING);
                    $parking_no = filter_var(trim($allDataInSheet[$i][$parking_no]), FILTER_SANITIZE_STRING);
                    $vehicles = filter_var(trim($allDataInSheet[$i][$vehicles]), FILTER_SANITIZE_STRING);
                    $two_wheeler_1 = filter_var(trim($allDataInSheet[$i][$two_wheeler_1]), FILTER_SANITIZE_STRING);
                    $two_wheeler_2 = filter_var(trim($allDataInSheet[$i][$two_wheeler_2]), FILTER_SANITIZE_STRING);
                    $two_wheeler_3 = filter_var(trim($allDataInSheet[$i][$two_wheeler_3]), FILTER_SANITIZE_STRING);
                    $two_wheeler_4 = filter_var(trim($allDataInSheet[$i][$two_wheeler_4]), FILTER_SANITIZE_STRING);
                    $four_wheeler_1 = filter_var(trim($allDataInSheet[$i][$four_wheeler_1]), FILTER_SANITIZE_STRING);
                    $four_wheeler_2 = filter_var(trim($allDataInSheet[$i][$four_wheeler_2]), FILTER_SANITIZE_STRING);
                    $four_wheeler_3 = filter_var(trim($allDataInSheet[$i][$four_wheeler_3]), FILTER_SANITIZE_STRING);
                    $bicycle_1 = filter_var(trim($allDataInSheet[$i][$bicycle_1]), FILTER_SANITIZE_STRING);
                    $bicycle_2 = filter_var(trim($allDataInSheet[$i][$bicycle_2]), FILTER_SANITIZE_STRING);
                    $bicycle_3 = filter_var(trim($allDataInSheet[$i][$bicycle_3]), FILTER_SANITIZE_STRING);
                    
                     $society_id = $this->session->userdata('log_admin_id');
                     $password = '123456';
                     if(!empty($wing) && !empty($floor_no) && !empty($flat_no) && !empty($email) && !empty($mobile) && !empty($first_name) && !empty($last_name) && !empty($owner))
                     {
                         $this->db->where('email',$email);
                         $this->db->or_where('mobile',$mobile);
                        $count = $this->db->get('members')->result();
                        if($count){

                        }else{
                            $fetchData[] = array('society_id'=>$society_id,'wing' => $wing, 'floor_no' => $floor_no, 'flat_no' => $flat_no, 'flat_type' => $flat_type, 'first_name' => $first_name,'last_name'=>$last_name,'mobile'=>$mobile,'email'=>$email,'password'=>strrev(sha1(md5($password))),'owner'=>$owner,'tenant_name'=>$tenant_name,'tenant_email'=>$tenant_email,'tenant_mobile'=>$tenant_mobile,'since'=>$since,'police_verified'=>$police_verified,'agreement'=>$agreement,'parking_allotted'=>$parking_allotted,'parking_no'=>$parking_no,'vehicles'=>$vehicles,'two_wheeler_1'=>$two_wheeler_1,'two_wheeler_2'=>$two_wheeler_2,'two_wheeler_3'=>$two_wheeler_3,'two_wheeler_4'=>$two_wheeler_4,'four_wheeler_1'=>$four_wheeler_1,'four_wheeler_2'=>$four_wheeler_2,'four_wheeler_3'=>$four_wheeler_3,'bicycle_1'=>$bicycle_1,'bicycle_2'=>$bicycle_2,'bicycle_3'=>$bicycle_3,'is_active'=>1);
                        }
                     }
                   }   
                   if($fetchData){
                   $data['employeeInfo'] = $fetchData;
                   $this->import->setBatchImport($fetchData);
                   $this->import->importData();
                   }else{
                        $this->session->set_flashdata('err_msg', 'Please Import the Valid and Required File Data');
                        redirect(base_url() . 'Superuser/members');
                   }
                
            } else {
                $this->session->set_flashdata('err_msg', 'Please Import the correct File');
                redirect(base_url() . 'Superuser/members');
                //echo "Please import correct file";
            }
        }
        
        $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Member List Uploaded Successfully.');
	redirect(base_url().'Superuser/members');
        
    }
    function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				 $highestRow = $worksheet->getHighestRow();
                                
				$highestColumn = $worksheet->getHighestColumn();
                                $SheetDataKey = array();
				for($row=2; $row<=$highestRow; $row++)
				{					
                    $wing = $worksheet->getCellByColumnAndRow(0, $row)->getValue();                    
                    $floor_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $flat_no= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $flat_type = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $first_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $last_name = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $mobile = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $owner = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $since = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $police_verified = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $agreement = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $parking_allotted = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $parking_no = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                        $parking_no = !empty($parking_no) ?$parking_no: "";
                    $two_wheeler_1 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                        $two_wheeler_1 = !empty($two_wheeler_1) ?$two_wheeler_1: "";
                    $two_wheeler_2 = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                        $two_wheeler_2 = !empty($two_wheeler_2) ?$two_wheeler_2: "";
                    $two_wheeler_3 = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                        $two_wheeler_3 = !empty($two_wheeler_3) ?$two_wheeler_3: "";
                    $two_wheeler_4 = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                        $two_wheeler_4 = !empty($two_wheeler_4) ?$two_wheeler_4: "";
                    $four_wheeler_1 = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                        $four_wheeler_1 = !empty($four_wheeler_1) ?$four_wheeler_1: "";
                    $four_wheeler_2 = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                        $four_wheeler_2 = !empty($four_wheeler_2) ?$four_wheeler_2: "";
                    $four_wheeler_3 = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                        $four_wheeler_3 = !empty($four_wheeler_3) ?$four_wheeler_3: "";
                    $bicycle_1 = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                        $bicycle_1 = !empty($bicycle_1) ?$bicycle_1: "";
                    $bicycle_2 = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                        $bicycle_2 = !empty($bicycle_2) ?$bicycle_2: "";
                    $bicycle_3 = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                        $bicycle_3 = !empty($bicycle_3) ?$bicycle_3: "";
                                       
                     $society_id = 32;//$this->session->userdata('log_admin_id');
                     $password = '123456';
                     if(!empty($wing) && !empty($floor_no) && !empty($flat_no) && !empty($email) && !empty($mobile) && !empty($first_name) && !empty($last_name) && !empty($owner))
                     {
                         $this->db->where('email',$email);
                         $this->db->or_where('mobile',$mobile);
                        $count = $this->db->get('members')->result();
                        if($count){

                        }else{
                            $data[] = array('society_id'=>$society_id,'wing' => $wing, 'floor_no' => $floor_no, 'flat_no' => $flat_no, 'flat_type' => $flat_type, 'first_name' => $first_name,'last_name'=>$last_name,'mobile'=>$mobile,'email'=>$email,'password'=>strrev(sha1(md5($password))),'owner'=>$owner,'since'=>$since,'police_verified'=>$police_verified,'agreement'=>$agreement,'parking_allotted'=>$parking_allotted,'parking_no'=>$parking_no,'two_wheeler_1'=>$two_wheeler_1,'two_wheeler_2'=>$two_wheeler_2,'two_wheeler_3'=>$two_wheeler_3,'two_wheeler_4'=>$two_wheeler_4,'four_wheeler_1'=>$four_wheeler_1,'four_wheeler_2'=>$four_wheeler_2,'four_wheeler_3'=>$four_wheeler_3,'bicycle_1'=>$bicycle_1,'bicycle_2'=>$bicycle_2,'bicycle_3'=>$bicycle_3,'is_active'=>1);
                        }
                     }   
                  
		}           
			}
                        if(!empty($data)){
			$this->admin->insert($data);                        
                            $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Member List Uploaded Successfully.');
                            redirect(base_url().'Superuser/members');
                        }else{
                            $this->session->set_flashdata('err_msg', 'Please Import the Valid and Required File Data');
                        redirect(base_url() . 'Superuser/members');
                        }
		}	
	}
    
        
        public function login()
        {
            if ($this->session->userdata('superuser_login') == 1) {
                 $this->session->set_userdata('last_page', current_url());                 
                 redirect(base_url());
			
            }else{
                    $data['page_title'] = 'Login';
                    $this->load->view('myadmin/login',$data);
		}
        }
        
        
        public function logout()
	{
		$this->session->sess_destroy();	
		redirect(base_url());
	}
        
        
        /******POPUP MODEL******/
        
        public function popup($account_type = '', $page_name = '', $param2 = '')
	{
                //$account_type               =	$this->session->userdata('login_type');
		$page_data['param2']		=	$param2;		
		//echo "hello";
		$this->load->view($account_type.'/'.$page_name,$page_data);		
	}
        
        /*********END POPUP MODEL*********/        
        
        
        //Validating login from ajax request
        function validateLogin() {
             $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            echo validation_errors();
                    }
                    else
                     {
                            $email= $this->input->post('email');
                            $password = $this->input->post('password');

                            $credential = array('email' => $email, 'password' => $password);
                            echo $this->tadmin_model->validate_login_info($email,$password);
                    }
                
                            
        }
        
        function error(){
            $data['page_title'] = 'Page Not Found';
            $this->load->view('superuser/error',$data);
            
        }
        public function send_note($msg,$type,$id){
            //$msg='Bulk Msg from Aasif..!';
            $society_id = $this->session->userdata('log_admin_id');
            $user = $this->db->get_where('members', array('society_id'=>$society_id,'is_active'=>1))->result();	
             foreach ($user as $row){
                    $this->sendNotification($row->token,$msg,$type,$id);
             }
                        
        }
        public function sendNotification($token,$msg,$type,$id) {
                 define( 'API_ACCESS_KEY', 'AAAAQ8l6-UY:APA91bHN-uYgP8H72yDhqN9heSrptieASZ2yC5GB2nCcH7S0YN_srsMjH4lH37PHN7EsoMOP-xs-OSdaVPaqTm2uxjpmp07hxJqdreCuLZUXdKMG2w7_YGtGqdjilw6xA_scOSD73iDK' );
                //$registrationIds = $this->input->post('token');
               $msg = array ( 'title' => $msg,
                            'vibrate'       => 1,
                            'sound'         => 'default',
                            'largeIcon'     => 'large_icon',
                            'smallIcon'     => 'small_icon',
                            'body'          =>$message,
                            'click_action' =>$type,                            
                            'type' => $type, // type like notice, complain, billing, etc
                            'id' => $id //
                            );
                $headers = array
                (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                );
                $fields = array('to' =>$token,'data'=>$msg,'priority'=>'high');
               
                $ch = curl_init();
                curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                curl_setopt( $ch,CURLOPT_POST, true );
                curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                $result = curl_exec($ch );
                curl_close( $ch );
               // echo $result;
                                // echo json_encode($result);
              
            }
       

}
