<?php
defined('BASEPATH') or exit('No direct script access allowed');

class register extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();

                //echo $this->session->userdata('admin_email');die();

                if ($this->session->userdata('admin_email') && $this->session->userdata('mobile_no') && $this->session->userdata('admin_id')) {
                        redirect(base_url() . 'home');
                }
        }

        public function index()
        {
                //echo "string";die();
                $this->form_validation->set_rules('email', 'Email Id', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
                if ($this->form_validation->run()) {
                        $email =        $this->input->post('email');
                        $password = strrev(sha1(md5($this->input->post('password'))));


                        $admin = $this->db->get_where('tbl_admin', array('admin_email' => $email, 'password' => $password));
                        $supervisor = $this->db->get_where('tbl_supervisor', array('supervisor_email' => $email, 'password' => $password));
                        $vendors = $this->db->get_where('tbl_vendor', array('vendor_email' => $email, 'password' => $password));
                        $subadmin = $this->db->get_where('tbl_subadmin', array('subadmin_email' => $email, 'password' => $password));

                        if ($admin->num_rows() > 0) {

                                $row = $admin->row();

                                $this->session->set_userdata('admin_id', $row->admin_id);
                                $this->session->set_userdata('admin_email', $row->admin_email);
                                $this->session->set_userdata('admin_name', $row->admin_name);
                                $this->session->set_userdata('admin_profile', $row->profile_pic);
                                redirect(base_url() . 'Home');
                        } elseif ($supervisor->num_rows() > 0) {

                                $row = $supervisor->row();
                                $this->session->set_userdata('supervisor_id', $row->supervisor_id);
                                $this->session->set_userdata('supervisor_email', $row->supervisor_email);
                                $this->session->set_userdata('supervisor_mobile_no', $row->supervisor_contact);
                                $this->session->set_userdata('supervisor_name', $row->supervisor_name);
                                $this->session->set_userdata('supervisor_profile', $row->profile_pic);

                                redirect(base_url() . 'Supervisor');;
                        } elseif ($vendors->num_rows() > 0) {

                                $row = $vendors->row();
                                $this->session->set_userdata('vendor_id', $row->vendor_id);
                                $this->session->set_userdata('vendor_email', $row->vendor_email);
                                $this->session->set_userdata('vendor_contact', $row->vendor_contact);
                                $this->session->set_userdata('vendor_name', $row->vendor_name);
                                redirect(base_url() . 'Vendor');
                        } elseif ($subadmin->num_rows() > 0) {


                                $row = $subadmin->row();

                                $this->session->set_userdata('subadmin_id', $row->subadmin_id);
                                $this->session->set_userdata('subadmin_email', $row->subadmin_email);
                                $this->session->set_userdata('subadmin_name', $row->subadmin_name);

                                redirect(base_url() . 'Subadmin');
                        } else {

                                $this->session->set_flashdata('failed_message', 'Email Id & Password Incorrect');
                                redirect(base_url() . 'login');
                        }
                } else {
                        //echo "byeeeeee";die();
                        $this->session->set_flashdata('failed_message', 'Email Id & Password Incorrect');
                }

                $this->load->view('register');
        }

        /** User Registration  start **/
        public function validateregister()
        {
                $this->form_validation->set_rules('firstname', 'First Name', 'required');
                $this->form_validation->set_rules('lastname', 'Last Name', 'required');
                $this->form_validation->set_rules('mobile', 'Mobile', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
                $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
                $email = strtolower($this->input->post('email'));
                $password = $this->input->post('password');
                $static_str = 'AM';
                $currenttimeseconds = date("mdY_His");
                $TOKEN = md5($static_str . $currenttimeseconds);
                if ($this->form_validation->run()) {
                        $data = array(
                                'firstname' => ucwords(strtolower($this->input->post('firstname'))),
                                'lastname' => ucwords(strtolower($this->input->post('lastname'))),
                                'mobile' => $this->input->post('mobile'),
                                'email' => $email,
                                'password' => strrev(sha1(md5($password))),
                                'token' => $TOKEN,
                                'verified' => 0
                        );
                        $details = $this->admin->record_insert('admin', $data);
                        $this->admin->Sendmail($data);
                       // print_r($details);

                        //echo '<i class="ti-check-box"></i> Vender Added Successfully.';
                } else {
                        echo validation_errors();
                }
        }
}