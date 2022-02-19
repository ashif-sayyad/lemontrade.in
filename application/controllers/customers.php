<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customers extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();

                //echo $this->session->userdata('admin_email');die();

                // if ($this->session->userdata('admin_login') && $this->session->userdata('admin_name') && $this->session->userdata('admin_id')) {
                //         redirect(base_url() . 'admin');
                // }
        }

        public function index()
        {
                if ($this->session->userdata('admin_login') != 1) {
                        $this->session->set_userdata('last_page', current_url());
                        redirect(base_url() . 'login');
                } else {
                        $this->load->view('admin/customers');
                }
        }


        
}
