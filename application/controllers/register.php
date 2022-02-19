<?php
defined('BASEPATH') or exit('No direct script access allowed');

class register extends CI_Controller
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
                        $this->load->view('register');
                } else {
                        redirect(base_url() . 'dashboard');
                }
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
                } else {
                        echo validation_errors();
                }
        }
}
