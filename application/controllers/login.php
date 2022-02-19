<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();

                //echo $this->session->userdata('admin_email');die();

                if ($this->session->userdata('admin_name') && $this->session->userdata('admin_mobile') && $this->session->userdata('admin_id')) {
                        redirect(base_url() . 'dashboard');
                }
        }

        public function index()
        {
                if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        $this->load->view('login');
                } else {
                        redirect(base_url() . 'dashboard');
                }
        }


        public function validatelogin()
        {
                $this->form_validation->set_rules('mobile', 'मोबाईल', 'required');
                $this->form_validation->set_rules('password', 'पासवर्ड', 'required|min_length[4]');
                if ($this->form_validation->run()) {
                        $mobile =        $this->input->post('mobile');
                        $password = strrev(sha1(md5($this->input->post('password'))));


                        $admin = $this->db->get_where('admin', array('mobile' => $mobile, 'password' => $password));
                        // $supervisor = $this->db->get_where('tbl_supervisor', array('supervisor_email' => $email, 'password' => $password));
                        // $vendors = $this->db->get_where('tbl_vendor', array('vendor_email' => $email, 'password' => $password));
                        // $subadmin = $this->db->get_where('tbl_subadmin', array('subadmin_email' => $email, 'password' => $password));

                        if ($admin->num_rows() > 0) {

                                $row = $admin->row();
                                $this->session->set_userdata('admin_id', $row->id);
                                $this->session->set_userdata('admin_email', $row->email);
                                $this->session->set_userdata('admin_name', $row->firstname . ' ' . $row->lasrname);
                                $this->session->set_userdata('admin_login', 1);
                                echo '1';
                                //redirect(base_url() . 'admin');
                        }
                        //  elseif ($supervisor->num_rows() > 0) {

                        //         $row = $supervisor->row();
                        //         $this->session->set_userdata('supervisor_id', $row->supervisor_id);
                        //         $this->session->set_userdata('supervisor_email', $row->supervisor_email);
                        //         $this->session->set_userdata('supervisor_mobile_no', $row->supervisor_contact);
                        //         $this->session->set_userdata('supervisor_name', $row->supervisor_name);
                        //         $this->session->set_userdata('supervisor_profile', $row->profile_pic);

                        //         redirect(base_url() . 'Supervisor');;
                        // } elseif ($vendors->num_rows() > 0) {

                        //         $row = $vendors->row();
                        //         $this->session->set_userdata('vendor_id', $row->vendor_id);
                        //         $this->session->set_userdata('vendor_email', $row->vendor_email);
                        //         $this->session->set_userdata('vendor_contact', $row->vendor_contact);
                        //         $this->session->set_userdata('vendor_name', $row->vendor_name);
                        //         redirect(base_url() . 'Vendor');
                        // } elseif ($subadmin->num_rows() > 0) {
                        //         $row = $subadmin->row();

                        //         $this->session->set_userdata('subadmin_id', $row->subadmin_id);
                        //         $this->session->set_userdata('subadmin_email', $row->subadmin_email);
                        //         $this->session->set_userdata('subadmin_name', $row->subadmin_name);

                        //         redirect(base_url() . 'Subadmin');
                        // }
                        else {

                                echo '0';
                        }
                } else {
                        echo validation_errors();
                }
        }
}
