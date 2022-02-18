<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class CannyWorksApi extends CI_Controller {
	public function __construct()  
	{
		parent::__construct();	
                 $this->load->database();
                 $this->load->model('admin');
		 date_default_timezone_set("Asia/Kolkata");		 
	}
        
/*********APP API'S********/
        
        /******MEMBER LOGIN********/        
       
        public function memberLogin() {
             $this->form_validation->set_rules('email', 'email', 'required|valid_email');
             $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg'] = 'All Fields Required.!';
                            $data['success'] = 0;
                    }
                    else
                     {
                            $email= $this->input->post('email');
                            $password =$this->input->post('password');

                            $credential = array('email' => $email,'password' => $password);
                            $data = $this->validate_login_info($email,$password);
                    }
                 echo json_encode($data);
                            
        }
        
        public function validate_login_info($email,$password){
		$password = strrev(sha1(md5($password)));                
                $this->db->where('is_active', 1);
                $this->db->where('email', $email);
                //$this->db->or_where('tenant_email =', $email);
                $this->db->where('password', $password);
		//$user = $this->db->get_where('members', array('email' => $email,'is_active'=>1,'password' => $password));		
                $user = $this->db->get('members');		
		//echo $sql = $this->db->last_query();
                if($user->num_rows() > 0) {
                        $row = $user->row();
                        $data['member_id'] = $row->member_id;
                        $data['token'] = $row->token;
                        $data['society_id']= $row->society_id;
                        $society = $this->db->get_where('society',array('society_id' => $row->society_id))->row();
                        $data['society_name']= $society->society_name;  
                        $data['society_logo']= base_url().'assets/uploads/logo/'.$society->logo;
                        $data['email'] = $row->email;
                        $data['first_name'] =  $row->first_name;
                        $data['last_name'] =  $row->last_name;
                        $data['mobile'] =  $row->mobile;  
                        if(empty($row->profile_pic)){ $img = 'noimg.png';}else{ $img = $row->profile_pic; }
                         $data['profile_pic'] = base_url().'assets/uploads/member/'.$img;                        
                        $data['wing'] =  $row->wing;
                        $data['floor_no'] = $row->floor_no;
                        $data['flat_no'] = $row->flat_no;
                        $data['flat_type'] = $row->flat_type;
                        $data['owner'] = $row->owner;
                        if($row->owner=='Yes'){
                        $data['owner_name'] = $row->first_name.' '.$row->last_name;                        
                        $ref_mem = $this->db->get_where('members',array('ref_member_id' => $row->member_id))->result();
                        if($this->db->affected_rows() == true){
                        foreach($ref_mem as $ref){
                            $tnt['first_name'] =  $ref->first_name;
                            $tnt['last_name'] =  $ref->last_name;                            
                            $tnt['email'] = $ref->email;
                            $tnt['mobile'] =  $ref->mobile;  
                            $tnt['since'] = $ref->since;
                            $tnt['police_verified'] = $ref->police_verified;
                            $tnt['agreement'] = $ref->agreement;
                            $tnt['end_period'] = $ref->end_period;
                        }
                        }else{
                            //$tnt[]
                        } 
                        }
                        else if($row->owner=='No'){
                            $refmem = $this->db->get_where('members',array('member_id' => $row->ref_member_id))->row()->full_name;
                            //echo $this->db->last_query();
                             $data['owner_name'] = $refmem;
                        }
//                            $tnt['tenant_name'] = $row->tenant_name;
//                            $tnt['tenant_email'] = $row->tenant_email;
//                            $tnt['tenant_mobile'] = $row->tenant_mobile;
                           if(!empty($tnt)){
                        $data['tenant'] =array($tnt);
                           }else{ $data['tenant']= array(); }
                        $data['parking_allotted'] = $row->parking_allotted;
                        $data['parking_no'] = $row->parking_no;
                        //$data['parking_type'] = $row->parking_type;
                            $veh['vehicles'] = $row->vehicles;
                            $veh['two_wheeler_1'] = $row->two_wheeler_1;
                            $veh['two_wheeler_2'] = $row->two_wheeler_2;
                            $veh['two_wheeler_3'] = $row->two_wheeler_3;
                            $veh['two_wheeler_4'] = $row->two_wheeler_4;
                            $veh['four_wheeler_1'] = $row->four_wheeler_1;
                            $veh['four_wheeler_2'] = $row->four_wheeler_2;
                            $veh['four_wheeler_3'] = $row->four_wheeler_3;
                            $veh['bicycle_1'] = $row->bicycle_1;
                            $veh['bicycle_2'] = $row->bicycle_2;
                            $veh['bicycle_3'] = $row->bicycle_3;
                        $data['vehicles'] = array($veh);
                        $msg["success"]=1;
                        $msg['msg'] = 'Login Successful.!';
                        $data = array('msg'=>$msg,'member'=>array($data));
                }else{
			$msg["success"]=0;
                        $msg['msg'] = 'Authentication Failed..!';
                        $data = $msg;
		}
                
                return $data;
		
	}
	
	
	
	
	
	public function validateMember(){
             $this->form_validation->set_rules('member_id', 'Member ID', 'required');
             $this->form_validation->set_rules('token', 'TOKEN', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                             $data['success'] = 0;
                             $data['msg'] = 'Validation Failed..!';                           
                    }
                    else{
                        $member_id= $this->input->post('member_id');
                        $token= $this->input->post('token');
                        $user = $this->db->get_where('members', array('member_id' => $member_id,'is_active'=>1));		
                       
                        if($user->num_rows() > 0) {
                                $row = $user->row();
                                $dat=array('token'=>$token);     
                                $this->db->where('is_active',1);              
                                $this->db->where('member_id',$member_id);
                                $this->db->update('members',$dat);
                                    $data["success"]='1';
                                    $data['msg'] = 'Validation Successful.!';
                                

                            }else{
                                    $data["success"]='0';
                                    $data['msg'] = 'Validation Failed..!';
                            }
                    }
                echo json_encode($data);
		
	}
        /*******SUPERVISOR LOGIN END*******/
        
        /******SUPERVISOR FORGOT PASSWORD********/
        
        public function forgotMemberPass(){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            //$this->form_validation->set_rules('owner', 'owner');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg'] = 'Valid Email Required.!';
                            $data['success'] = 0;
                    }
                    else{
                         $email= $this->input->post('email');
                         $this->db->where('is_active',1);
                         $this->db->where('email',$email);
                         //$this->db->where('owner','Yes');                        
                         $members = $this->db->get('members');
                         //echo $this->db->last_query();
                          $this->db->where('is_active',1);
                         $this->db->where('tenant_email',$email);
                         //$this->db->where('owner','No');                        
                         $tenant = $this->db->get('members');
                         if($members->num_rows() > 0) {
                            $code = rand(1000,9999);
                            $row = $members->row(); 
                            $member_id = $row->member_id;
                                $mob = $row->mobile;
                               //$mob = $row->tenant_mobile;                              
                           $sms = $this->sendOTP($mob,$code);
                             if($sms==1){
                                 $dat['key_code']    = $code;
                                 $this->db->where('member_id',$member_id);
                                 $this->db->update('members',$dat);
                                 
                                 $data['msg'] = 'OTP sent to your Mobile.';
                                 $data['member_id'] = $member_id;
                                 $data['OTP'] = $code;
                                 $data['success'] = 1;
                             }
                             else{
                                 $data['msg'] = 'OTP Not Send..!';
                                 $data['success'] = 0;
                             }
                         }elseif($tenant->num_rows() > 0) {
                            $code = rand(1000,9999);
                            $row = $tenant->row(); 
                            $member_id = $row->member_id;
                                //$mob = $row->mobile;
                               $mob = $row->tenant_mobile;                              
                           $sms = $this->sendOTP($mob,$code);
                             if($sms==1){
                                 $dat['key_code']    = $code;
                                 $this->db->where('member_id',$member_id);
                                 $this->db->update('members',$dat);
                                 
                                 $data['msg'] = 'OTP sent to your Mobile.';
                                 $data['member_id'] = $member_id;
                                 $data['OTP'] = $code;
                                 $data['success'] = 1;
                             }
                             else{
                                 $data['msg'] = 'OTP Not Send..!';
                                 $data['success'] = 0;
                             }
                         }else{
                             $data['msg'] = 'Authentication Failed..!';
                             $data['success'] = 0;
                         }
                         
                    }
                echo json_encode($data);
        }
        
        /******Member FORGOT PASSWORD END********/
        
        /********SET MEMBER NEW PASSWORD ********/
        public function setMemberPass(){                   
            $this->form_validation->set_rules('member_id', 'Member id', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('otp', 'OTP', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $cur_otp = $this->input->post('otp');
                            $this->db->where('member_id',$this->input->post('member_id'));
                            $this->db->limit(1);
                        $ex_otp = $this->db->get('members')->row()->key_code;
                       if($ex_otp == $cur_otp){                           
                           $dat['key_code']    = '';
                           $dat['password']    = strrev(sha1(md5($this->input->post('password'))));
                           
                           $this->db->where('member_id',$this->input->post('member_id'));
                           $this->db->update('members',$dat);                           
                           $data['msg']= 'Password Reset Successfully..!';
                           $data['success'] = 1;
                       }
                       else{
                           $data['msg']= 'Something Went Wrong..!';
                           $data['success'] = 0;
                       }
                        
                    }
             echo json_encode($data);
        }
        
        /******SET MEMBER NEW PASSWORD END ******/
        
      /********UPDATE MEMBER PROFILE PHOTO****/
        public function memberProfilePhoto(){
            $this->form_validation->set_rules('member_id', 'Member id', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                          if($_FILES['profile_img']['name']!= "")
                                {
                                    $img_name='profile_img';
                                    $img_path='member';
                                    $fileName=$this->admin->upload_image($img_name,$img_path);  
                                }else{
                                   $data['msg']= 'All Fields Required..!';
                                   $data['success'] = 0; 
                                }
                                if($fileName){
                                    $dat=array('profile_pic'=>$fileName);                   
                                    $this->db->where('member_id',$this->input->post('member_id'));
                                    $this->db->where('is_active',1);
                                    $this->db->update('members',$dat);
                                    if($this->db->affected_rows() == true){
                                        $data['member_id'] = $this->input->post('member_id');
                                        $data['profile_pic'] = base_url().'assets/uploads/member/'.$fileName;
                                        $data['msg']= 'Profile Photo Updated Successfully..!';
                                        $data['success'] = 1;
                                    }else{
                                        $data['msg']= 'Unable to Update..!';
                                        $data['success'] = 0;
                                    }
                                }else{
                                    $data['msg']= 'Something Went Wrong..!';
                                    $data['success'] = 0;
                                }
                    }  
                    echo json_encode($data);  
            
        }
        
        
     /********UPDATE MEMBER PROFILE PHOTO****/
        
        /****UPDATE MEMBER PROPERTY INFO****/
        
         public function memberPropertyInfo(){
            $this->form_validation->set_rules('member_id', 'Member id', 'required');
            $this->form_validation->set_rules('wing', 'Wing', 'required');
            $this->form_validation->set_rules('floor_no', 'Floor No', 'required');
            $this->form_validation->set_rules('flat_no', 'flat_no', 'required');
            $this->form_validation->set_rules('flat_type', 'flat_type', 'required');
             $this->form_validation->set_rules('parking_allotted', 'parking_allotted', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'All Fields Required..!';
                            $data['success'] = 0;
                     }
                    else
                     {

                            $dat=array(
                                'wing'=>$this->input->post('wing'),
                                'floor_no'=>$this->input->post('floor_no'),
                                'flat_no'=>$this->input->post('flat_no'),
                                'flat_type'=>$this->input->post('flat_type'),
                                'parking_allotted'=>$this->input->post('parking_allotted'),
                                'parking_no'=>$this->input->post('parking_no'),
                                'parking_type'=>$this->input->post('parking_type'),
                                    );                   
                            $this->db->where('member_id',$this->input->post('member_id'));
                            $this->db->where('is_active',1);
                            $this->db->update('members',$dat);
                            if($this->db->affected_rows() == true){
                                $data['member_id'] = $this->input->post('member_id');
                                $data['msg']= 'Property Updated Successfully..!';
                                $data['success'] = 1;
                            }else{
                                $data['msg']= 'Unable to Update..!';
                                $data['success'] = 0;
                            }
                                
                    }  
                    echo json_encode($data);  
            
        }
        
        
        /****UPDATE MEMBER PROPERTY INFO END****/
        
        /****UPDATE MEMBER VEHICLE INFO****/
        
         public function memberVehicleInfo(){
            $this->form_validation->set_rules('member_id', 'Member id', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {

                            $dat=array(
                                'vehicles'=>$this->input->post('vehicles'),
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
                            $this->db->where('member_id',$this->input->post('member_id'));
                            $this->db->where('is_active',1);
                            $this->db->update('members',$dat);
                            if($this->db->affected_rows() == true){
                                $data['member_id'] = $this->input->post('member_id');
                                $data['msg']= 'Vehicle Updated Successfully..!';
                                $data['success'] = 1;
                            }else{
                                $data['msg']= 'Unable to Update..!';
                                $data['success'] = 0;
                            }
                                
                    }  
                    echo json_encode($data);  
            
        }
        
        
        /****UPDATE VEHICLE INFO END****/
        
         /****UPDATE TENANT INFO****/
        
         public function updateTenantInfo(){
            $this->form_validation->set_rules('member_id', 'Member id', 'required');
            $this->form_validation->set_rules('first_name', 'first_name', 'required');
            $this->form_validation->set_rules('last_name', 'last_name', 'required');
            //$this->form_validation->set_rules('email', 'Member id', 'required');
            $this->form_validation->set_rules('mobile', 'mobile', 'required');
            $this->form_validation->set_rules('since', 'since', 'required');
            $this->form_validation->set_rules('police_verified', 'police_verified', 'required');
            $this->form_validation->set_rules('agreement', 'agreement', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {

                            $dat=array(
                                'first_name'=>ucwords(strtolower($this->input->post('first_name'))),
                                'last_name'=>ucwords(strtolower($this->input->post('last_name'))),
                                'full_name'=>ucwords(strtolower($this->input->post('first_name')))." ".ucwords(strtolower($this->input->post('last_name'))),
                                'mobile'=>$this->input->post('mobile'),
                                'since'=>$this->input->post('since'),
                                'police_verified'=>$this->input->post('police_verified'),
                                'agreement'=>$this->input->post('agreement')                                
                                   ); 
                            $this->db->where('is_active',1);
                            $this->db->where('ref_member_id',$this->input->post('member_id'));                            
                            $this->db->update('members',$dat);
                            //echo $this->db->last_query();
                            if($this->db->affected_rows() == true){
                                $data['member_id'] = $this->input->post('member_id');
                                $data['msg']= 'Profile Updated Successfully..!';
                                $data['success'] = 1;
                            }else{
                                $data['msg']= 'Unable to Update..!';
                                $data['success'] = 0;
                            }
                                
                    }  
                    echo json_encode($data);  
            
        }
        
        
        /****UPDATE TENANT INFO END****/
        
        
        /*********Get Society Notice******/
        
        public function societyNoticeBorad($society_id){
            $today = date('Y-m-d');
             $this->db->order_by("start_date");
            $notice = $this->db->get_where('noticeboard', array('society_id' => $society_id,'is_active'=>1,'end_date >='=>$today))->result();		
		//echo $sql = $this->db->last_query();
                if($notice) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['notice_data']=array();                        
                        foreach($notice as $row){
                            if(!empty($row->file)){ $file= base_url().'assets/uploads/notice/'.$row->file; } else{ $file =''; }
                        $entry = array('id'=>$row->notice_id,'notice_no'=>$row->notice_no,'summary'=>$row->summary,'description'=>$row->description,'start_date'=>$row->start_date,'end_date'=>$row->end_date,'file'=>$file); 
                        array_push($data['notice_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Notice Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 
        }

        /*******Get Society Notice End********/
        
         /*********Get Society Management******/
        
        public function societyManagementInfo($society_id){
            $this->db->order_by("management_id","desc");
            $mgt = $this->db->get_where('management', array('society_id' => $society_id,'is_active'=>1))->result();		
		//echo $sql = $this->db->last_query();
                if($mgt) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['mgt_data']=array();                        
                        foreach($mgt as $row){
                        $entry = array('id'=>$row->management_id,'first_name'=>$row->first_name,'last_name'=>$row->last_name,'mobile'=>$row->mobile,'role'=>$row->role,'available_time'=>$row->available_time); 
                        array_push($data['mgt_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 
        }

        /*******Get Society Management End********/
        
         /*********Get Emergency Contact******/
        
        public function societyEmergencyContacts($society_id){
            $this->db->order_by("contact_for","desc");
            $contact = $this->db->get_where('emergency_contact', array('society_id' => $society_id,'is_active'=>1))->result();		
		//echo $sql = $this->db->last_query();
                if($contact) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['contact_data']=array();                        
                        foreach($contact as $row){
                        $entry = array('id'=>$row->contact_id,'name'=>$row->name,'contact_for'=>$row->contact_for,'mobile'=>$row->mobile,'alternate_mobile'=>$row->alternate_mobile); 
                        array_push($data['contact_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 
        }

        /*******Get Emergency Contact End********/
        
         /*********Get payment info******/
        
        public function societyPaymentInfo($society_id){
            $this->db->order_by("payment_id","desc");
            $payment = $this->db->get_where('payments', array('society_id' => $society_id,'is_active'=>1))->result();		
		//echo $sql = $this->db->last_query();
                if($payment) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['payment_data']=array();                        
                        foreach($payment as $row){
                        $entry = array('name'=>$row->name,'bank_name'=>$row->bank_name,'account_no'=>$row->account_no,'IFSC'=>$row->IFSC,'MICR'=>$row->MICR,'UPI'=>$row->UPI,'branch_address'=>$row->address); 
                        array_push($data['payment_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 
        }

        /*******Get payment info End********/
        
        /*********Get Events info******/
        
        public function societyEventsInfo($society_id){
            $today = date('Y-m-d');
            $this->db->order_by("date");
            $events = $this->db->get_where('society_events', array('society_id' => $society_id,'is_active'=>1,'date >='=>$today))->result();		
		//echo $sql = $this->db->last_query();
                if($events) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['event_data']=array();                        
                        foreach($events as $row){
                            if(!empty($row->image)){ $file= base_url().'assets/uploads/events/'.$row->image; } else{ $file =''; }
                        $entry = array('id'=>$row->event_id,'date'=>$row->date,'summary'=>$row->summary,'description'=>$row->description,'image'=>$file); 
                        array_push($data['event_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 
        }

        /*******Get Events info End********/
        
        /*********Get Nearby Events info******/
        
        public function societyNearbyEventsInfo($society_id){
            $today = date('Y-m-d');
            $this->db->order_by("date");
            $events = $this->db->get_where('nearbyevents', array('society_id' => $society_id,'is_active'=>1,'date >='=>$today))->result();		
		//echo $sql = $this->db->last_query();
                if($events) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['nearbyevent_data']=array();                        
                        foreach($events as $row){
                            if(!empty($row->image)){ $file= base_url().'assets/uploads/nearbyevents/'.$row->image; } else{ $file =''; }
                        $entry = array('id'=>$row->nearbyevent_id,'date'=>$row->date,'summary'=>$row->summary,'description'=>$row->description,'image'=>$file); 
                        array_push($data['nearbyevent_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 
        }

        /*******Get Nearby Events info End********/
        
        /*********Get Society Complaint info******/
        
        public function societyComplaintInfo(){
             $this->form_validation->set_rules('society_id', 'Society id', 'required');
             $this->form_validation->set_rules('member_id', 'Member id', 'required'); 
             $this->form_validation->set_rules('wing', 'Wing', 'required'); 
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $society_id =$this->input->post('society_id');
                        $member_id = $this->input->post('member_id');
                        $wingm = strtoupper($this->input->post('wing'));

                        $this->db->order_by("suggestion_id","desc");
                        $events = $this->db->get_where('suggestion', array('society_id' => $society_id,'member_id !=' => $member_id,'is_active'=>1))->result();		
                            //echo $sql = $this->db->last_query();
                            if($events) {
                                    $data['society_id'] = $society_id;
                                    $society = $this->db->get_where('society',array('society_id' => $society_id))->row();
                                    $data['society_name']= $society->society_name;  
                                    $data['success'] = 1;
                                    $data['complaint_data']=array(); 
                                   
                                    foreach($events as $row){
                                        $this->db->order_by('note_id','desc');
                                        $ns = $this->db->get_where('notes', array('suggestion_id' => $row->suggestion_id))->result();
                                        $nots = array();
                                        foreach($ns as $nts){
                                            //$n['note'] =$nts->notes;                                           
                                            if($nts->member_id > 0){
                                            $mems = $this->db->get_where('members', array('member_id' => $nts->member_id))->result();
                                             if($mems) {
                                            foreach($mems as $met){
                                                 $name =$met->first_name." ".$met->last_name;
                                                }
                                              }                                       
                                            }else{
                                                $name =$society->society_name;
                                            }
                                            $nn=array('note'=>$nts->note,'status'=>$nts->status,'name'=>$name,'date_time'=>$nts->createdAt);
                                             array_push($nots, $nn);                                        
                                        }
                                    if($row->member_id > 0){
                                       $members = $this->db->get_where('members', array('member_id' => $row->member_id))->result();
                                       if($members) {
                                            foreach($members as $mem){
                                                $first_name = $mem->first_name;
                                                $last_name = $mem->last_name;
                                                $wing = $mem->wing;
                                                $flat_no = $mem->flat_no;
                                                
                                            }                                           
                                       }
                                    }else {
                                               $first_name = $society->society_name;
                                               $last_name = '';
                                               $wing = '';
                                               $flat_no = '';
                                    }
                                        $data_type ='OTHER'; // }
                                    if($row->show_for=='All'){
                                        $entry = array('data_type'=>$data_type,'complaint_id'=>$row->suggestion_id,'subject'=>$row->subject,'summary'=>$row->summary,'show_for'=>$row->show_for,'complaint_status'=>$row->complaint_status,'current_note'=>$row->note,'all_notes'=>$nots,'first_name'=>$first_name,'last_name'=>$last_name,'wing'=>$wing,'flat_no'=>$flat_no,'date'=>substr($row->createdAt,0,10)); 
                                        array_push($data['complaint_data'], $entry);
                                        }                                    
                                    if($row->show_for=='Wing'){
                                        $wing_entries   = json_decode($row->wings);
                                        foreach ($wing_entries as $w)
                                        { 
                                           if($w->wing ==$wingm){
                                               $entry = array('data_type'=>$data_type,'complaint_id'=>$row->suggestion_id,'subject'=>$row->subject,'summary'=>$row->summary,'show_for'=>$row->show_for,'complaint_status'=>$row->complaint_status,'current_note'=>$row->note,'all_notes'=>$nots,'first_name'=>$first_name,'last_name'=>$last_name,'wing'=>$wing,'flat_no'=>$flat_no,'date'=>substr($row->createdAt,0,10)); 
                                                array_push($data['complaint_data'], $entry);
                                               
                                           }

                                        }	
                                    }
                                     if($row->show_for=='Personal'){
                                        $mem_entries   = json_decode($row->members);
                                        foreach ($mem_entries as $m)
                                        { 
                                           if($m->member_id ==$member_id){
                                                $data_type ='MY';
                                               $entry = array('data_type'=>$data_type,'complaint_id'=>$row->suggestion_id,'subject'=>$row->subject,'summary'=>$row->summary,'show_for'=>$row->show_for,'complaint_status'=>$row->complaint_status,'current_note'=>$row->note,'all_notes'=>$nots,'first_name'=>$first_name,'last_name'=>$last_name,'wing'=>$wing,'flat_no'=>$flat_no,'date'=>substr($row->createdAt,0,10)); 
                                                array_push($data['complaint_data'], $entry);
                                               
                                           }

                                        }	
                                    }
                                    if($row->show_for=='Self' || $row->show_for=='Booking Request'){
                                    if($row->member_id ==$member_id){
                                                $data_type ='MY';                                                            
                                                   $entry = array('data_type'=>$data_type,'complaint_id'=>$row->suggestion_id,'subject'=>$row->subject,'summary'=>$row->summary,'show_for'=>$row->show_for,'complaint_status'=>$row->complaint_status,'current_note'=>$row->note,'all_notes'=>$nots,'first_name'=>$first_name,'last_name'=>$last_name,'wing'=>$wing,'flat_no'=>$flat_no,'date'=>substr($row->createdAt,0,10)); 
                                                   array_push($data['complaint_data'], $entry);
                                                   }
                                                }
                                }
                                    
                            }else{
                                 $data['msg']= 'Data Not Available..!';
                                 $data['success'] = 0;
                            }
                     }
             echo json_encode($data); 
        }

        /*******Get Society Complaint info End********/
        
         /*********Get Member Complaint info******/
        
        public function memberComplaintInfo($member_id){
            $this->db->order_by("suggestion_id","desc");
            $events = $this->db->get_where('suggestion', array('member_id' => $member_id,'is_active'=>1))->result();		
		//echo $sql = $this->db->last_query();
                if($events) {
                        $data['member_id'] = $member_id;
                        $data['success'] = 1;
                        $data['complaint_data']=array();                        
                        foreach($events as $row){
                            $this->db->order_by('note_id','desc');
                            $ns = $this->db->get_where('notes', array('suggestion_id' => $row->suggestion_id))->result();
                                        $nots = array();
                                        foreach($ns as $nts){
                                            //$n['note'] =$nts->notes;                                           
                                            if($nts->member_id > 0){
                                                
                                            $mems = $this->db->get_where('members', array('member_id' => $nts->member_id))->result();
                                             if($mems) {
                                            foreach($mems as $met){
                                                 $name =$met->first_name." ".$met->last_name;
                                                }
                                              }                                       
                                            }else{
                                                $name ="";
                                            }
                                            $nn=array('note'=>$nts->note,'status'=>$nts->status,'name'=>$name,'date_time'=>$nts->createdAt);
                                             array_push($nots, $nn);                                        
                                        }
                                        
                        $entry = array('complaint_id'=>$row->suggestion_id,'subject'=>$row->subject,'summary'=>$row->summary,'show_for'=>$row->show_for,'complaint_status'=>$row->complaint_status,'current_note'=>$row->note,'all_notes'=>$nots,'date'=>substr($row->createdAt,0,10)); 
                        array_push($data['complaint_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 
        }
        
        public function updateComplaintStatus(){
            $this->form_validation->set_rules('member_id', 'member_id', 'required');
            $this->form_validation->set_rules('complaint_id', 'complaint_id', 'required');
            $this->form_validation->set_rules('status', 'complaint_status', 'required');
            $this->form_validation->set_rules('note', 'note', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $member_id = $this->input->post('member_id');
                         $complaint_id = $this->input->post('complaint_id');
                         $status = $this->input->post('status');
                         $note = $this->input->post('note');
                            $dat=array(
                                'complaint_status'=>$status,
                                'note'=>$note                               
                                   );  
                            $datt=array(
                                'member_id'=>$member_id,
                                'suggestion_id'=>$complaint_id,
                                'status'=>$status,
                                'note'=>$note                               
                                   ); 
                            $this->db->insert('notes',$datt);
                            $this->db->where('suggestion_id',$complaint_id);
                            $this->db->update('suggestion',$dat);
                                
                            $data['msg']= 'Status Updated Successfully..!';
                                $data['success'] = 1;
                            
                                
                    }  
                    echo json_encode($data);  
            
        }
        

        /*******Get Member Complaint info End********/
        
        public function postComplaint(){
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('summary', 'Summary', 'required');
            $this->form_validation->set_rules('member_id', 'Member id', 'required');
            $this->form_validation->set_rules('society_id', 'Society id', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                         $show_for = $this->input->post('show_for');
                         $society_id = $this->input->post('society_id');
                         $wing = $this->input->post('wings');
                          //$data['passed_wing']= $wing;
                           //echo json_encode($data);
                            // die();
                         /*$mem = $this->input->post('members');
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
                             }*/                           
                            $wing = explode(",", $wing);
                             $wingcount = count($wing);
                              //$wingcount = sizeof($wing);                              
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
                              //$data['actual_wing']= $wings;
                            
                        $dat=array( 
                                    'society_id'=>$society_id,
                                    'member_id'=>$this->input->post('member_id'),
                                    'subject'=>$this->input->post('subject'),
                                    'summary'=>$this->input->post('summary'),
                                    'show_for'=>$this->input->post('show_for'),
                                    'members'=>'',
                                    'wings'=>$wings,
                                    'complaint_status'=>'Open',
                                    'reported_by'=>'member',
                                    'is_active'=>1
                                    );
                        $this->db->insert('suggestion',$dat);
                        $id = $this->db->insert_id();
                        if($this->db->affected_rows() == true){
                            $data['msg']= 'Complaint Posted Successfully..!';
                            $data['success'] = 1;
                             $msg = 'New Complaint Added in Society..!';
//                             if($show_for=='All' && $show_for=='Wing'){
//                             $this->send_note($msg,$society_id,'SocityComplaints',$id);
//                             }
                             $this->send_note($msg,$society_id,'MemberComplaints',$id);   
                             //}
                        }else{
                            $data['msg']= 'Unable to post..!';
                            $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);		
            
        }
        
        /***get personal value*****/
        
        public function getPersonalValue($society_id){            
            $members_info = $this->db->get_where('members', array('society_id' => $society_id,'is_active'=>1))->result();
             if($members_info) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['member_data']=array();                        
                        foreach($members_info as $row){
                       $entry = array('member_id'=>$row->member_id,'value'=>$row->first_name." ".$row->last_name); 
                        array_push($data['member_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 

        }
        
         public function getWingValue($society_id){ 
             $this->db->group_by('wing');
            $members_info = $this->db->get_where('members', array('society_id' => $society_id,'is_active'=>1))->result();
             if($members_info) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['wing_data']=array();                        
                        foreach($members_info as $row){
                       $entry = array('wing'=>$row->wing,'value'=>$row->wing); 
                        array_push($data['wing_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 

        }
         /*********Get Society Financial******/
        
        public function societyFinancialInfo($society_id){
            $this->db->order_by("financial_id","desc");
            $notice = $this->db->get_where('financials', array('society_id' => $society_id,'is_active'=>1))->result();		
		//echo $sql = $this->db->last_query();
                if($notice) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['financial_data']=array();                        
                        foreach($notice as $row){
                            if(!empty($row->file)){ $file= base_url().'assets/uploads/financials/'.$row->file; } else{ $file =''; }
                        $entry = array('id'=>$row->financial_id,'month'=>$row->month,'type'=>$row->type,'year'=>$row->year,'file'=>$file); 
                        array_push($data['financial_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 
        }

        /*******Get Society Financial End********/
        
         /*********Get Society Financial******/
        
        public function getFinancialInfo(){                   
         $this->form_validation->set_rules('month', 'Month', 'required');
         $this->form_validation->set_rules('year', 'Year', 'required');
	 $this->form_validation->set_rules('society_id', 'society', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                                $month = $this->input->post('month');
                                $year = $this->input->post('year');
                                $society_id = $this->input->post('society_id');
                                $notice = $this->db->get_where('financials', array('society_id' => $society_id,'year'=>$year,'month'=>$month,'is_active'=>1))->result();		
                                if($notice) {
                                $data['society_id'] = $society_id;
                                $data['success'] = 1;
                                $data['financial_data']=array();                        
                                foreach($notice as $row){
                                    if(!empty($row->file)){ $file= base_url().'assets/uploads/financials/'.$row->file; } else{ $file =''; }
                                $entry = array('financial_id'=>$row->financial_id,'month'=>$row->month,'year'=>$row->year,'file'=>$file); 
                                array_push($data['financial_data'], $entry);
                                }                        
                        }else{
                             $data['msg']= 'Data Not Available..!';
                             $data['success'] = 0;
                        }
                    }  
                    echo json_encode($data);            
        }
        

        /*******Get Society Financial End********/
        
        
         /*********Get Society Gallery******/
        
        public function societyGalleryInfo($society_id){
            $this->db->order_by("gallery_id","desc");
            $notice = $this->db->get_where('gallery', array('society_id' => $society_id,'is_active'=>1))->result();		
		//echo $sql = $this->db->last_query();
                if($notice) {
                        $data['society_id'] = $society_id;
                        $data['success'] = 1;
                        $data['gallery_data']=array();                        
                        foreach($notice as $row){
                            //$entry['event_id']=$row->event_id;
                            //$entry['event_name']= $this->db->get_where('society_events',array('event_id' => $row->event_id))->row()->summary;
                            $entry['event_name']=$row->summary;
                            $entry['img']=array();
                             $img_entries   = json_decode($row->media_path);

                                    foreach ($img_entries as $img)
                                    { 
                                            array_push($entry['img'], array('img' => base_url().'assets/uploads/gallery/'.$img->img));

                                    }						
                           
                        array_push($data['gallery_data'], $entry);
                        }                        
                }else{
                     $data['msg']= 'Data Not Available..!';
                     $data['success'] = 0;
                }
             echo json_encode($data); 
        }

        /*******Get Society Gallery End********/
       
	   
	   /*********Get Society Polls******/
        
        public function societyPollsInfo(){            
            $this->form_validation->set_rules('member_id', 'Member id', 'required');
            $this->form_validation->set_rules('society_id', 'Society id', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $society_id = $this->input->post('society_id');
                        $member_id = $this->input->post('member_id');
                        $this->db->order_by("end_date");
                        $this->db->limit(10);
                        $date = date('Y-m-d');
                        $notice = $this->db->get_where('polls', array('society_id' => $society_id,'end_date >='=>$date,'is_active'=>1))->result();		
                            //echo $sql = $this->db->last_query();
                            if($notice) {
                                    $data['society_id'] = $society_id;
                                    $data['success'] = 1;
                                    $data['poll_data']=array();                        
                                    foreach($notice as $row){
                                    $entry['poll_id']=$row->poll_id;
                                    $vote = $this->db->get_where('poll_count', array('poll_id' => $row->poll_id,'member_id '=> $member_id))->result();		
                                    if($vote){ $entry['vote'] = 1; } else{ $entry['vote'] = 0; }
                                    $entry['summary']=$row->summary;
                                    $entry['start_date']=$row->start_date;
                                    $entry['end_date']=$row->end_date;
                                        $cnt = $this->db->get_where('poll_count', array('poll_id' => $row->poll_id))->result();
                                        $entry['chart_count'] = count($cnt);
                                            $this->db->group_by('vote'); 
                                        $count = $this->db->get_where('poll_count', array('poll_id' => $row->poll_id))->result();                                       
                                        $entry['chart']=array();
                                        foreach ($count as $pls)
                                        {
                                            array_push($entry['chart'], array('name' => $pls->vote,'value' => $this->admin->get_poll_vote_count($pls->poll_id,$pls->vote)));
                                        } 
                                    $entry['answers']=array();
                                    $ans_entries   = json_decode($row->answers);

                                    foreach ($ans_entries as $ans)
                                    { 
                                            array_push($entry['answers'], array('radio' => $ans->radio));

                                    }					

                                    array_push($data['poll_data'], $entry);
                                    }                        
                            }else{
                                 $data['msg']= 'Data Not Available..!';
                                 $data['success'] = 0;
                            }
                     }
             echo json_encode($data); 
        }

        /*******Get Society Polls End********/
		
        public function postPollOpinion(){
            $this->form_validation->set_rules('member_id', 'Member id', 'required');
            $this->form_validation->set_rules('poll_id', 'Poll id', 'required');
            $this->form_validation->set_rules('vote', 'Vote', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $poll_id = $this->input->post('poll_id');
                        $member_id = $this->input->post('member_id');
                        $poll_count = $this->db->get_where('poll_count', array('poll_id' => $poll_id,'member_id'=>$member_id))->result();		
                                if($poll_count) {
                                                $data['msg']= 'Opinion Already Posted..!';
                                                $data['success'] = 1;	
                                }else{
                                        $dat=array( 
                                                    'poll_id'=>$poll_id,
                                                    'member_id'=>$member_id,
                                                    'vote'=>$this->input->post('vote')
                                                    );
                                            $this->db->insert('poll_count',$dat);
                                            if($this->db->affected_rows() == true){
                                                    $data['msg']= 'Opinion Posted Successfully..!';
                                                    $data['success'] = 1;
                                            }else{
                                                    $data['msg']= 'Unable to Post..!';
                                                    $data['success'] = 0;
                                            }
                                    }
                    }  
                    echo json_encode($data);
            
        }
        /*********POST Selling Info*********/
        
         public function postSellingInfo(){
            $this->form_validation->set_rules('society_id', 'Society id', 'required');
            $this->form_validation->set_rules('member_id', 'Member id', 'required');           
            $this->form_validation->set_rules('summary', 'Summary', 'required');
            $this->form_validation->set_rules('days', 'Days', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                            $date = date('Y-m-d');
                            $society_id = $this->input->post('society_id');
                            $day = $this->input->post('days');
                            if($_FILES['image']['name']!= "")
                                {
                                    $img_name='image';
                                    $img_path='selling';
//                                    $allowed_extensions = array("image/png", "image/jpg","image/jpeg", "image/gif");
//
//                                    if ( !in_array($_FILES["image"]["type"], $allowed_extensions ) ){
//                                        $data['msg']= 'Only Image Allowed..!';
//                                        $data['success'] = 0;
//                                    }else{
                                    $profile=$this->admin->upload_image($img_name,$img_path); 
                                   // }
                                }else{
                                   $profile = '';
                                }
                            $dat=array( 
                                        'society_id'=>$society_id,
                                        'member_id'=>$this->input->post('member_id'),
                                        'summary'=>$this->input->post('summary'),
                                        'description'=>$this->input->post('description'),
                                        'type'=>$this->input->post('type'),
                                        'posted_on'=>$date,
                                        'days'=>$day,
                                        'posted_till'=>date('Y-m-d', strtotime($date. ' + '.$day.' days')),
                                        'image'=>$profile,
	        			'is_active'=>1
	        			);                            
                                $this->db->insert('selling',$dat);
                                $id = $this->db->insert_id();
                                if($this->db->affected_rows() == true){
                                        $data['msg']= 'Selling Data Posted Successfully..!';
                                        $data['success'] = 1;
                                        $msg = 'New Sell & Buy Added in Society..!';
                                        $this->send_note($msg,$society_id,'selling',$id);
                                }else{
                                        $data['msg']= 'Unable to Post..!';
                                        $data['success'] = 0;
                                }
                                
                                   
                    }  
                    echo json_encode($data);
            
        }
        
       /********post selling info end****/ 
        
        /*********GET Selling Info*********/
        
         public function societySellingInfo(){
            $this->form_validation->set_rules('society_id', 'Society id', 'required');
            $this->form_validation->set_rules('member_id', 'Member id', 'required'); 
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                    $this->db->order_by("posted_till");
                    $member_id = $this->input->post('member_id');
                    $society_id =$this->input->post('society_id');
                    $date = date('Y-m-d');
                    $sell = $this->db->get_where('selling', array('society_id' => $society_id,'posted_till >='=>$date,'is_active'=>1))->result();		
                        //echo $sql = $this->db->last_query();
                        if($sell) {
                                $data['society_id'] = $society_id;
                                $data['success'] = 1;
                                $data['sell_data']=array();                        
                                foreach($sell as $row){
                                if($member_id==$row->member_id){
                                    $data_type = 'MY'; 
                                    $selling_id=$row->selling_id;
                                }else{
                                     $data_type = 'OTHER';
                                     $selling_id='';
                                }                                
                                    $entry['data_type']=$data_type;
                                    $entry['selling_id']=$selling_id;
                                    if(!empty($row->member_id)){
                                         $ref_mem = $this->db->get_where('members',array('member_id' => $row->member_id))->row();
                                        $entry['posted_by'] = $ref_mem->first_name.' '.$ref_mem->last_name;  
                                    }else{
                                        $society = $this->db->get_where('society',array('society_id' => $society_id))->row();
                                        $entry['posted_by']= $society->society_name; 
                                    }
                                    $entry['id']=$row->selling_id; 
                                    $entry['summary']=$row->summary;   
                                    $entry['type']=$row->type;
                                    $entry['description']=$row->description;
                                    $entry['posted_on']=$row->posted_on;   
                                    $entry['days']=$row->days;   
                                    $entry['posted_till']=$row->posted_till;  
                                     if(empty($row->image)){
                                         $img = '';                                         
                                     }else{
                                         $img = base_url().'assets/uploads/selling/'.$row->image;
                                         }
                                    $entry['image']=$img;   

                                array_push($data['sell_data'], $entry);
                                }                        
                        }else{
                             $data['msg']= 'Data Not Available..!';
                             $data['success'] = 0;
                        }
                }
                     echo json_encode($data); 
            
        }
        
       /********get selling info end****/ 
       public function removeSell(){
            $this->form_validation->set_rules('member_id', 'Member Id', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Unauthorised User..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $selling_id = $this->input->post('selling_id');
                        $member_id = $this->input->post('member_id'); 
                        if(!empty($selling_id)){                                                                 
                             $this->db->where('selling_id',$selling_id);
                             $this->db->where('member_id',$member_id);
                            $this->db->delete('selling');
                           
                                $data['msg']= 'Data Removed..!';
                                $data['success'] = 1;
                           
                        }else{
                                $data['msg']= 'Unauthorised User..!';
                                $data['success'] = 0;
                            }
                                
                    }  
                    echo json_encode($data);  
       }

              public function searchMemberData(){
            $this->form_validation->set_rules('society_id', 'society_id', 'required');      
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('key', 'Key', 'required');
             if ($this->form_validation->run() == FALSE)
                     {
                            $data['msg']= 'Something Went Wrong..!';
                            $data['success'] = 0;
                     }
                    else
                     {
                        $society_id = $this->input->post('society_id');
                        $type = $this->input->post('type');
                        $key = $this->input->post('key');
                        if($type=='Wing'){
                            $key = strtoupper($key);
                            $this->db->order_by('flat_no');
                            $this->db->where('wing',$key);
                            $user = $this->db->get_where('members', array('society_id'=>$society_id,'is_active'=>1))->result();		
                        }elseif($type=='Flat No'){
                             $this->db->order_by('flat_no');
                            $this->db->where('flat_no',$key);
                            $user = $this->db->get_where('members', array('society_id'=>$society_id,'is_active'=>1))->result();			
                        }elseif($type=='Name'){
                             $this->db->order_by('flat_no');
                             $this->db->where('is_active',1);
                             $this->db->where('society_id',$society_id);
                            $this->db->like('full_name',$key);
                            //$this->db->or_like('last_name',$key);
                            $user = $this->db->get('members')->result();	
                        }elseif($type=='Vehicle'){
                            $this->db->order_by('flat_no');
                             $this->db->where('is_active',1);
                             $this->db->where('society_id',$society_id);
                            $this->db->like('two_wheeler_1',$key);
                            $this->db->or_like('two_wheeler_2',$key);
                            $this->db->or_like('two_wheeler_3',$key);
                            $this->db->or_like('two_wheeler_4',$key);
                            $this->db->or_like('four_wheeler_1',$key);
                            $this->db->or_like('four_wheeler_2',$key);
                            $this->db->or_like('four_wheeler_3',$key);
                            $user = $this->db->get('members')->result();	
                        }		
//		echo $sql = $this->db->last_query();
//                die();
                
                if($user) {
                        $msg["success"]=1;
                        $msg['msg'] = 'Member List';
                        $dat['member_data']=array();
                    foreach ($user as $row){
                        $data['member_id'] = $row->member_id;
                        $data['token'] = $row->token;
                        $data['society_id']= $row->society_id;
                        $data['wing'] =  $row->wing;
                        $data['floor_no'] = $row->floor_no;
                        $data['flat_no'] = $row->flat_no;
                        $data['flat_type'] = $row->flat_type;
                        $data['first_name'] =  $row->first_name;
                        $data['last_name'] =  $row->last_name;
                        $data['mobile'] =  $row->mobile;                        
                        $data['email'] = $row->email;                        
                        $data['owner'] = $row->owner;
                       if($row->owner=='Yes'){
                        $data['owner_name'] = $row->first_name.' '.$row->last_name;                        
                        $ref_mem = $this->db->get_where('members',array('ref_member_id' => $row->member_id))->result();
                        if($this->db->affected_rows() == true){
                        foreach($ref_mem as $ref){
                            $tnt['first_name'] =  $ref->first_name;
                            $tnt['last_name'] =  $ref->last_name;                            
                            $tnt['email'] = $ref->email;
                            $tnt['mobile'] =  $ref->mobile;  
                            $tnt['since'] = $ref->since;
                            $tnt['police_verified'] = $ref->police_verified;
                            $tnt['agreement'] = $ref->agreement;
                            $tnt['end_period'] = $ref->end_period;
                        }
                        }else{
                            //$tnt[]
                        } 
                        }
                        else{
                            $ref_mem = $this->db->get_where('members',array('member_id' => $row->ref_member_id))->result();
                             $data['owner_name'] = $ref_mem->first_name.' '.$ref_mem->last_name;
                        }
//                            $tnt['tenant_name'] = $row->tenant_name;
//                            $tnt['tenant_email'] = $row->tenant_email;
//                            $tnt['tenant_mobile'] = $row->tenant_mobile;
                           if(!empty($tnt)){
                        $data['tenant'] =array($tnt);
                           }else{ $data['tenant']= array(); }
                        $data['two_wheeler_1'] = $row->two_wheeler_1;
                        $data['two_wheeler_2'] = $row->two_wheeler_2;
                        $data['two_wheeler_3'] = $row->two_wheeler_3;
                        $data['two_wheeler_4'] = $row->two_wheeler_4;
                        $data['four_wheeler_1'] = $row->four_wheeler_1;
                        $data['four_wheeler_2'] = $row->four_wheeler_2;
                        $data['four_wheeler_3'] = $row->four_wheeler_3;
                        if(empty($row->profile_pic)){ $img = 'noimg.png';}else{ $img = $row->profile_pic; }
                        $data['profile_pic'] = base_url().'assets/uploads/member/'.$img;
                        array_push($dat['member_data'], $data);
                    }
                    $data = array('msg'=>$msg,'member'=>array($dat));
                }else{
                    $data['msg']= 'No Member Found..!';
                    $data['success'] = 0;
                }
                
           }  
            echo json_encode($data);		
            
        }
		
		
    public function sendNotification() {
    $this->form_validation->set_rules('token', 'TOKEN', 'required');
    $this->form_validation->set_rules('message', 'message', 'required');
    $this->form_validation->set_rules('type', 'type', 'required');
    $this->form_validation->set_rules('id', 'id', 'required');
    if ($this->form_validation->run() == FALSE)
            {
                   $data['msg']= 'Something Went Wrong..!';
                   $data['success'] = 0;
            }
           else
            {
                define( 'API_ACCESS_KEY', 'AAAAQ8l6-UY:APA91bHN-uYgP8H72yDhqN9heSrptieASZ2yC5GB2nCcH7S0YN_srsMjH4lH37PHN7EsoMOP-xs-OSdaVPaqTm2uxjpmp07hxJqdreCuLZUXdKMG2w7_YGtGqdjilw6xA_scOSD73iDK' );
                //$registrationIds = array( $_GET['id'] );
                // prep the bundle
                $token = $this->input->post('token');
                $message =$this->input->post('message');
                $type =$this->input->post('type');
                $id =$this->input->post('id');
                $msg = array ( 'title' => $message,
                            'vibrate'       => 1,
                            'sound'         => 'default',
                            'largeIcon'     => 'large_icon',
                            'smallIcon'     => 'small_icon',
                            'body'          =>$message,
                            'click_action' =>$type,
                            'type' => $type, // type like notice, complain, billing, etc
                            'id' => $id //
                            );
                
                $data = array('click_action' =>$type,'type'=>$type,'id'=>$id,'msg'=>$message);
                $headers = array
                (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                );
                  $fields = array('to' =>$token,'data'=>$msg, 'priority'=>'high');
                //$fields = array('to' =>$token,'notification'=>$msg, 'priority'=>'high','data'=>$data);

                $ch = curl_init();
                curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                curl_setopt( $ch,CURLOPT_POST, true );
                curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                $result = curl_exec($ch );
                curl_close( $ch );
                echo $result;
                                // echo json_encode($result);

                }
       }
       public function senddd(){
           $msg = "Test Notification";
           $token = "f7AXJUH_aAE:APA91bFJLVbJ7COADxUJvXgB-GhzKBk_nUC-AITv1QvyQy8YDt5xnQd2QYzqu8dXMsHk-OM2HBdC0Y-Xs-MiNlS0jCkKy-QcpajXV0U8lCmJdrBUUjU8y553LEA5CXiqS57WjmuItL9u";
           echo $this->sendNotificationApi($token,$msg);
       }
       public function send_note($msg,$society_id,$type,$id){
            //$msg='Bulk Msg from Aasif..!';
            //$society_id = $this->session->userdata('log_admin_id');
            $user = $this->db->get_where('members', array('society_id'=>$society_id,'is_active'=>1))->result();		
             foreach ($user as $row){
                    $this->sendNotificationApi($row->token,$msg,$type,$id);
             }
                        
        }
        public function sendNotificationApi($token,$msg,$type,$id) {
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
               $data = array('type'=>$type,'id'=>$id,'msg'=>$message);
                $headers = array
                (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                );
                  $fields = array('to' =>$token,'data'=>$msg, 'priority'=>'high');
                //$fields = array('to' =>$token,'notification'=>$msg, 'priority'=>'high','data'=>$data);
               
              /* $msg = array
              (
        'body'  => 'New event is here',
        'title' => 'lessSuperstars',
        );
      $fields = array(
            'to'    => $token,
            'data' => array(
              'body'  => 'New blog is here',
              'title' => 'lessSuperstars',
              'type' => '', // type like notice, complain, billing, etc
              'id' => $id // id for that notice , complain, etc 
                ),
            'priority'=>'high'
            );*/
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
       


         public function sendDotp(){
             $contact = 9922031316;
             $code = 12458;
             echo $this->sendOTP($contact,$code);
         }
         /**********SEND OTP FUNCTION***************/
	public function sendOTP($mobile,$code){
				$data= array();			
				$authKey = "202419AysxxqW2gX1Y5aa76974";
				$mobileNumber = $mobile;
				$senderId = "CANNYW";
				$rndno=$code;
				$message = "Use this Activation code $rndno to reset your Password.";
				$route = "route=4";
				$email = "message.tirupatitravels@gmail.com";
				$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'message' => $message,
				'otp' => $rndno,
				'sender' => $senderId,
				'route' => $route,
				'email' => $email
				);
				//API URL
				$url="http://control.msg91.com/api/sendotp.php";

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => $url,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $postData,
				  CURLOPT_SSL_VERIFYHOST => 0,
				  CURLOPT_SSL_VERIFYPEER => 0,
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  return 0;
				  //$data['err'];
				} 
				else {		
                                     return 1;                               
				}
				
			//echo json_encode($data);	
		}
		
		public function validateOTP(){
			$data= array();
			$cur_otp = $this->input->post('otp'); 
			$mobileNumber = $this->input->post('driver_contact'); 
				$authKey = "186319AETWcdPo5a213238";
				$url = "https://control.msg91.com/api/verifyRequestOTP.php";	
				$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'otp' => $cur_otp
				);	
				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => $url,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $postData,
				  CURLOPT_SSL_VERIFYHOST => 0,
				  CURLOPT_SSL_VERIFYPEER => 0,
				  CURLOPT_HTTPHEADER => array(
					"content-type: application/x-www-form-urlencoded"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				   $data["msg"]= $err;
				   $data['success'] = 0;
				}else{
				    $data['msg']= $response;
                           	    $data['success'] = 1;
				}
				
				echo json_encode($data);			
		}
		
	
	
	/*****OTP FUNCTION END*******************/
	
	
		
             public function sms(){
            $code=123;
            $name = "Sayyad";
            $vehicle_no = "MH 12 EJ 9700";
            $cost = 1000;
            $driver = "Kiran";
            $contact = 9922031316;
            //$msg ="Hello $name , Vehicle $vehicle_no is assigned to fuel with cost Rs $cost Driver $driver and Contact $contact";
            //$msg ="Use this Password Activation Code $code . This verification is important for the reset your password.";
            //$msg = "Hello $name, Vehicle $vehicle_no is assigned to fuel with cost Rs$cost . Driver $driver and Contact $contact";
            //$msg ="Hello <variable> , Use <variable> for Approval of Fuel Filling to Vehicle <variable> and Cost Rs <variable>";
              //$msg ="Hello $name, Vehicle $vehicle_no is assigned to fuel with cost Rs<variable>. Driver <variable> and Contact <variable>";
             //$msg = "Use this Password Activation Code <variable> . This verification is important for the reset your password.";
            $msg ="Hello $name , Vehicle $vehicle_no is Successfully filled Fuel with cost Rs $cost Driver $driver and Contact $contact";
            $mob=9225732186;
            $data = $this->send_message($mob,$msg);   
            echo $data;
        }
        
          public function send_message($mob,$msg)
	{
               $web_url = "http://www.sms123.in/QuickSend.aspx?";
                $url = $web_url.http_build_query(array('username'=> "tirupati",'password' => "tirupati",
                    'mob' => $mob,'msg' => $msg,'sender' => "TRTRVL"));	
                
	 	// $url = $web_url.http_build_query(array('username'=> "tirupati",'password' => "tirupati",
                 //   'mob' => $mob,'msg' => $msg,'sender' => "TRTRVL"));	
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
        
        
        /*********SEND OTP TO DRIVER FOR FUEL APPROVAL*****/
      
        
/*******APP API'S END************/        




}
