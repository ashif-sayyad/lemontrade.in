<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminity extends CI_Controller {
	public function __construct()  
	{
		parent::__construct();
                $this->load->model('tadmin_model');
                 $this->load->model('admin');
                $this->load->library('session');
                date_default_timezone_set("Asia/Kolkata");
                $this->load->library('form_validation');
                $this->load->helper(array('form','url','file'));	
	 
	}
	public function index()
	{
             if ($this->session->userdata('admin_login') == 1) {
                 $this->session->set_userdata('last_page', current_url());                  
                 $data['page_title'] = 'Dashboard'; 
                 $this->load->view('myadmin/index',$data);			
            }
            elseif($this->session->userdata('superuser_login') == 1){
                 redirect(base_url().'Superuser');
                
            }else{
                   $this->load->view('landing/index');
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

        /********GENERATE OTP END******/
        
      
     
        /*************Society*********/
        public function society($task='',$society_id='')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'addSociety'){
                         $this->form_validation->set_rules('society_name', 'Society Name', 'required|is_unique[society.society_name]');
			 $this->form_validation->set_rules('start_date','Start Date','required');
			 $this->form_validation->set_rules('end_date', 'End Date', 'required');
			 $this->form_validation->set_rules('address', 'Address', 'required');
                         $this->form_validation->set_rules('user_name', 'Super User Name', 'required');
                         $this->form_validation->set_rules('mobile', 'Mobile', 'required');
                         $this->form_validation->set_rules('email', 'Email', 'required','required|is_unique[society.email]');
                         $this->form_validation->set_rules('password', 'Password', 'required');                         
			 $this->form_validation->set_rules('confirm_cpass', 'Confirm Password', 'required|matches[password]');
			 $email=strtolower($this->input->post('email'));
			 $password=$this->input->post('password');
                          $static_str='AM';
			$currenttimeseconds = date("mdY_His");
                        $TOKEN = md5($static_str.$currenttimeseconds);
			 if ($this->form_validation->run())
			{
                                if($_FILES['logo']['name']!= "")
                                {
                                    $img_name='logo';
                                    $img_path='logo';
                                    //$old_img=$this->input->post('old_admin_profile');
                                    $profile=$this->admin->upload_image($img_name,$img_path);  
                                }
                            if($profile)
                            {
                                $data=array( 	  
	        			'society_name'=>ucwords(strtolower($this->input->post('society_name'))),
                                        'start_date'=>$this->input->post('start_date'),
                                        'end_date'=>$this->input->post('end_date'),
                                        'space_allotted'=>$this->input->post('space_allotted'),
                                        'no_of_users'=>$this->input->post('no_of_users'),
                                        'address'=>$this->input->post('address'),
                                        'logo'=>$profile,
                                        'user_name'=>ucwords(strtolower($this->input->post('user_name'))),                               
	        			'mobile'=>$this->input->post('mobile'),
	        			'email'=>$email,
	        			'password'=>strrev(sha1(md5($this->input->post('password')))),
	        			'token'=>$TOKEN,
	        			'is_active'=>1
	        			);
					$details=$this->admin->record_insert('society',$data);
					$findemail = $this->admin->Sendmail($email,$password);

					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Society Added Successfully.');
					redirect(base_url().'Adminity/society');
                            }
                            else
                            {
                                    $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                    redirect(base_url() .'Adminity/society');
                            }
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/society');
                        }
           }
             if($task == 'editSociety'){
                          $this->form_validation->set_rules('society_name', 'Society Name', 'required');
			 $this->form_validation->set_rules('start_date','Start Date','required');
			 $this->form_validation->set_rules('end_date', 'End Date', 'required');
			 $this->form_validation->set_rules('address', 'Address', 'required');
                         $this->form_validation->set_rules('user_name', 'Super User Name', 'required');
                         $this->form_validation->set_rules('mobile', 'Mobile', 'required');			 
			 if ($this->form_validation->run())
			{
                             $data=array(
					'society_name'=>ucwords(strtolower($this->input->post('society_name'))),
                                        'start_date'=>$this->input->post('start_date'),
                                        'end_date'=>$this->input->post('end_date'),
                                        'space_allotted'=>$this->input->post('space_allotted'),
                                        'no_of_users'=>$this->input->post('no_of_users'),
                                        'address'=>$this->input->post('address'),
                                        'user_name'=>ucwords(strtolower($this->input->post('user_name'))),                                
	        			'mobile'=>$this->input->post('mobile')
                                 );
                                
                                        $where =array('society_id'=>$society_id);
					$vendors=$this->admin->records_update('society',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Society Updated Successfully.');
					redirect(base_url().'Adminity/society');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/society');
                        }                 
             }
             if($task == 'updateImage'){
                if($_FILES['logo']['name']!= ""){
                      $img_name='logo';
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
                                $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Logo Updated Successfully.');
                                redirect(base_url().'Adminity/society');

                        }
                        else
                        {
                                    $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                    redirect(base_url() .'Adminity/society');

                        }
            }
            
             if($task == 'delete'){
                        $where =array('society_id'=>$society_id);
                        $this->admin->delete_record('society',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/society');
             }
             
            $this->db->order_by("society_id","desc");
             $where =array('is_active'=> 1);
            $data['society_info']=$this->admin->record_list('society');
            $data['page_title']='Society';
            $this->load->view('myadmin/society',$data);
        }
        
        
	/********banners*********/
        
	public function banners($task='',$banner_id='')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }   
                 if($task == 'loadaddBanner'){
                      $data['society_info']=$this->admin->record_list('society');
                      $data['page_title']='Add Banner';
                      $this->load->view('myadmin/addBanner',$data);
                 }       
            if($task == 'addBanner'){
                        $this->form_validation->set_rules('banner_name', 'Banner Name', 'required');
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');			
			 if ($this->form_validation->run())
			{
                            $data=array( 	  
	        			'banner_name'=>ucwords(strtolower($this->input->post('banner_name'))),
	        			'start_date'=>$this->input->post('start_date'),
	        			'end_date'=>$this->input->post('end_date'),
	        			'description'=>$this->input->post('description'),
                                        'is_active'=>1,
	        			'status'=>1
	        			);
                                        $details=$this->admin->record_insert('banners',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Banner Added Successfully.');
					redirect(base_url().'Adminity/banners');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/banners');
                        } 
             }
             
             if($task == 'editBanner'){
                        $this->form_validation->set_rules('banner_name', 'Banner Name', 'required');
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array(
					'banner_name'=>ucwords(strtolower($this->input->post('banner_name'))),
	        			'start_date'=>$this->input->post('start_date'),
	        			'end_date'=>$this->input->post('end_date'),
	        			'description'=>$this->input->post('description'),
                                        'is_active'=>1,
	        			'status'=>1
                                        );                                
                                        $where =array('banner_id'=>$banner_id);
					$banners=$this->admin->records_update('banners',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Banner Updated Successfully.');
					redirect(base_url().'Adminity/banners');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/banners');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('banner_id'=>$banner_id,'is_active'=>1);
                        $this->admin->delete_record('banners',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/banners');
             }             
            $this->db->order_by("banner_id","desc");
            $where =array('is_active'=> 1);
            $data['banners_info']=$this->admin->record_list('banners');
            $data['page_title']='Manage Banners';
            $this->load->view('myadmin/banners',$data);
        }
        
        /*******ads*********/
        
        public function ads($task='',$ads_id='')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }                       
            if($task == 'addAds'){
                        $this->form_validation->set_rules('ad_name', 'Ad Name', 'required');
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');			
			 if ($this->form_validation->run())
			{
                            if($_FILES['logo']['name']!= "")
                                {
                                    $img_name='logo';
                                    $img_path='ads';
                                    //$old_img=$this->input->post('old_admin_profile');
                                    $profile=$this->admin->upload_image($img_name,$img_path);  
                                }
                            if($profile)
                            {   
                                $data=array( 	  
	        			'ad_name'=>ucwords(strtolower($this->input->post('ad_name'))),
	        			'start_date'=>$this->input->post('start_date'),
	        			'end_date'=>$this->input->post('end_date'),
                                        'logo'=>$profile,
	        			'description'=>$this->input->post('description'),
                                        'is_active'=>1,
	        			'status'=>1
	        			);
                                        $details=$this->admin->record_insert('ads',$data);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Ads Added Successfully.');
					redirect(base_url().'Adminity/ads');
                             }
                            else
                            {
                                    $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                    redirect(base_url() .'Adminity/ads');
                            }
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/ads');
                        } 
             }
             
             if($task == 'editAds'){
                        $this->form_validation->set_rules('ad_name', 'Ads Name', 'required');
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			 if ($this->form_validation->run())
			{
                            $data=array(
					'ad_name'=>ucwords(strtolower($this->input->post('ad_name'))),
	        			'start_date'=>$this->input->post('start_date'),
	        			'end_date'=>$this->input->post('end_date'),
	        			'description'=>$this->input->post('description'),
                                        'is_active'=>1,
	        			'status'=>1
                                        );                                
                                        $where =array('ads_id'=>$ads_id);
					$banners=$this->admin->records_update('ads',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Ads Updated Successfully.');
					redirect(base_url().'Adminity/ads');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/ads');
                        } 
             }             
            if($task == 'delete'){
                        $where =array('ads_id'=>$ads_id,'is_active'=>1);
                        $this->admin->delete_record('ads',$where);
                        $this->session->set_flashdata('msg_ok', ('<i class="ti-check-box"></i> Record Removed Successfully.'));
                        redirect(base_url() .'Adminity/ads');
             }             
            $this->db->order_by("ads_id","desc");
             $where =array('is_active'=> 1);
            $data['ads_info']=$this->admin->record_list('ads');
            $data['page_title']='Manage Ads';
            $this->load->view('myadmin/ads',$data);
        }
       
        
        public function profile($task = '',$admin_id = '')
        {
            if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       }
                       
            if($task == 'updateImage'){
                if($_FILES['userfile']['name']!= ""){
                      $img_name='userfile';
                      $img_path='profile';
                      $old_img=$this->input->post('old_admin_profile');
                      $profile=$this->admin->upload_image($img_name,$img_path,$old_img);  
                }
                        if($profile)
                        {
                                $data=array('profile_pic'=>$profile);                            
                                $where =array('admin_id'=>$admin_id);
                                $subadmin=$this->admin->records_update('admin',$data,$where);
                                $this->session->set_userdata('log_image', $profile);
                                $this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Profile Image Updated Successfully.');
                                redirect(base_url().'Adminity/profile');

                        }
                        else
                        {
                                    $this->session->set_flashdata('err_msg',$this->upload->display_errors());
                                    redirect(base_url() .'Adminity/profile');

                        }
            }
            
            if($task == 'updateAdminProfile'){
                        $this->form_validation->set_rules('first_name', 'First Name', 'required');
                        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('admin_email','Email ID','required|valid_email');
			$this->form_validation->set_rules('admin_mobile_no', 'Mobile', 'required|numeric');
                         if ($this->form_validation->run())
			{
                            $data=array(
					'first_name'=>ucwords(strtolower($this->input->post('first_name'))),
                                        'last_name'=>ucwords(strtolower($this->input->post('last_name'))),
	        			'email'=>strtolower($this->input->post('admin_email')),
	        			'mobile'=>$this->input->post('admin_mobile_no'),
	        			'DOB'=>$this->input->post('DOB'),
                                        'gender'=>$this->input->post('gender'),
                                        'state'=>$this->input->post('state'),
                                        'city'=>$this->input->post('city'),
                                        'address'=>$this->input->post('admin_address'),
                                        'pincode'=>$this->input->post('pincode'),
                                        'website'=>$this->input->post('website'),
                                        'skype_id'=>$this->input->post('skype_id'),
	        			'is_active'=>1);
                            
                                        $where =array('admin_id'=>$admin_id);
					$subadmin=$this->admin->records_update('admin',$data,$where);
					$this->session->set_flashdata('msg_ok','<i class="ti-check-box"></i> Admin Profile Updated Successfully.');
					redirect(base_url().'Adminity/profile');		
			}else {
                            $this->session->set_flashdata('err_msg',validation_errors());
                             redirect(base_url().'Adminity/profile');
                        }
            }
            
            if($task =='updateAdminPassword'){
                
                $this->form_validation->set_rules('old_password', 'Old Password', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE)
                {
                       $this->session->set_flashdata('err_msg', validation_errors());
                        redirect(base_url() . 'Adminity/profile');
                }
                else
                {
                    $where =array('admin_id'=>$admin_id);
                    $query = $this->tadmin_model->checkOldPassword($this->input->post('old_password'),'admin',$where);

                            if($query)
                                    {
                                      $data=array('password'=> strrev(sha1(md5($this->input->post('password')))));
                                            $where =array('admin_id'=>$admin_id);
                                            $subadmin=$this->admin->records_update('admin',$data,$where);
                                            $this->session->sess_destroy();
                                            $this->session->set_flashdata('msg_ok', ('Password Updated Successfully'));
                                            redirect(base_url() . 'Adminity/profile');
                                    }
                                    else
                                    {
                                         $this->session->set_flashdata('err_msg', 'Please Enter the correct password');
                                            redirect(base_url() . 'Adminity/profile');
                                    }

				 
		}
                
            }
            $admin_id = $this->session->userdata('log_admin_id');
           
            $where =array('admin_id'=> $admin_id );
            $data['admin_info']=$this->admin->record_list('admin',$where);
            $data['page_title']='Profile Setting';
            $this->load->view('myadmin/myprofile',$data);
        }
        
        
        public function login()
        {
            if ($this->session->userdata('admin_login') == 1) {
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

}
