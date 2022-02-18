<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tadmin_model extends CI_Model {
	
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->library('email');
        $this->load->helper('file');
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    /*****login funtionality start********/
    
	function validate_login_info($email,$password){
		
		
		 // Checking login credential for admin
		$password = strrev(sha1(md5($password)));
                $admin = $this->db->get_where('admin', array('email' => $email,'password' => $password));
		$society = $this->db->get_where('society', array('email' => $email,'password' => $password));		
		if($admin->num_rows() > 0) {
                        $row = $admin->row();
                        $this->session->set_userdata('admin_login', '1');
                        $this->session->set_userdata('log_admin_id', $row->admin_id);
                        $this->session->set_userdata('log_email_id', $row->email);
                        $this->session->set_userdata('log_admin_name', $row->first_name.' '.$row->last_name);
                        $this->session->set_userdata('log_image', $row->profile_pic);
                        $this->session->set_userdata('log_address', $row->address);
                        $this->session->set_userdata('log_type', 'admin');
                        echo '1';
                }elseif($society->num_rows() > 0) {
                        $row = $society->row();
                        $this->session->set_userdata('superuser_login', '1');
                        $this->session->set_userdata('log_admin_id', $row->society_id);
                        $this->session->set_userdata('login_email_id', $row->email);
                        $this->session->set_userdata('log_society_name', $row->society_name);
                        $this->session->set_userdata('log_admin_name', $row->user_name);
                        $this->session->set_userdata('log_image', $row->logo);
                        $this->session->set_userdata('log_address', $row->address);
                        $this->session->set_userdata('login_type', 'superuser');
                        echo '1';
                }
                else{
			echo 'Invalid Login Details.';
		}
		
		
	}
	 /*****login funtionality end********/
	
        public function checkOldPassword($oldPassword,$table,$where)
{
	$oldPassword= strrev(sha1(md5($oldPassword)));
		
	$password = $this->db->get_where($table , $where)->row()->password;

	if($oldPassword == $password)
        {
            return true;
        }
        else
        {
            return false;
        }
    
}
/*********get data**********/
      

        public function getVendorName($vendor_id){
            
            return $this->db->get_where('tbl_vendor',array('vendor_id' => $vendor_id))->row()->vendor_name;
            
        }
        
       

	
}
