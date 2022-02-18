<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{

    public function record_insert($tbl_name, $data_array)
    {
        $insert_id = $this->db->insert($tbl_name, $data_array);
        //echo $insert_id;die;
        if ($insert_id) {
            return $insert_id;
        }
        return false;
    }
    function insert($data)
    {
        $this->db->insert_batch('members', $data);
    }
    public function record_count($tbl_name, $where1 = null)
    {
        if ($where1 != null) {
            $this->db->where($where1);
        }

        $count = $this->db->get($tbl_name)->num_rows();

        if ($count) {
            return $count;
        }
        return false;
    }


    public function get_society_name($society_id)
    {
        echo $society_name = $this->db->get_where('society', array('society_id' => $society_id))->row()->society_name;
    }

    public function get_event_name($event_id)
    {
        echo $summary = $this->db->get_where('society_events', array('event_id' => $event_id))->row()->summary;
    }
    function get_poll_count($poll_id)
    {
        $this->db->group_by('vote');
        return $this->db->get_where('poll_count', array('poll_id' => $poll_id))->result_array();
    }
    function get_poll_vote_count($id, $vote)
    {
        $this->db->from('poll_count');
        $this->db->where('poll_id', $id);
        $this->db->where('vote', $vote);
        return $this->db->count_all_results();
        //return $this->db->count_all_results('application' , array('application_id' => $id ,'company_id' => $company_id))->row()->application_name;
    }




    public function record_list($tbl_name, $where1 = null)
    {
        if ($where1 != null) {
            $this->db->where($where1);
        }

        $details = $this->db->get($tbl_name)->result();

        if ($details) {
            return $details;
        }
        return false;
    }
    public function records_update($tbl_name, $data, $where1)
    {
        $this->db->where($where1);
        $details = $this->db->update($tbl_name, $data);
        //echo "<pre>";print_r($details);die;
        if ($details) {
            return $details;
        }
        return false;
    }

    public function delete_record($tbl_name, $where)
    {
        $this->db->where($where);
        $data = array('is_active' => 0);
        //$details= $this->db->delete($tbl_name);
        //$this->db->where($where1);
        $details = $this->db->update($tbl_name, $data);
        //echo "<pre>";print_r($details);die;
        if ($details) {
            return $details;
        }
        return false;
    }

    public function Sendmail($data)
    {
        // echo ($data['Firstname']); 
        $username = "info.asbspl@gmail.com";
        $pass = "asbsplshop@123";
        $name = $data['firstname'] . " " . $data['lastname'];
        $sub = "लेमन ट्रेडिंग कंपनीत आपले स्वागत आहे";
        $host_name = "ssl://smtp.googlemail.com";
        $port = "465";
        $protocol = "smtp";

        //$forgot_user_id = $row->society_id;
        $forgot_email_id = $data['email'];
        $forgot_name = $name;
        $forgot_password = $data['password'];
        $forgot_type = 'Register';
        $body = $this->getBody($forgot_email_id, $forgot_name, $forgot_password, $forgot_type);
        $this->activate_mail($forgot_email_id, $username, $pass, $name, $sub, $body, $host_name, $port, $protocol);

        echo 1;
    }

    function getBody($email, $name, $password, $type)
    {

        return $body = "<body>
            <div class='row'>
                    <div class='col-sm-4'></div>
                            <div class='col-sm-4 center' style='border: 2px solid #EC971F;padding-bottom:10px;background-color: rgb(254, 250, 249);'>
                                    <div id='nediv' style='float: left;
                                        align-content: center;
                                        width: 90%;
                                        margin-left: 20%;

                                        font-family: cursive;
                                        margin-top: 1%;'>
                                        <h2>लेमन ट्रेडिंग कंपनीत आपले स्वागत आहे</h2></div>
                                            <hr style='width:70%;
                                                border: 0;
                                                height: 1px;
                                                background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));'>

                                        <div id='mbody' style='width: 70%;
                                        margin-left: 20%;
                                        text-align: justify;
                                        font-family: cursive;
                                            line-height: 20px;
                                            margin-bottom:3%;'>
                                           
                                          <center style='text-align: left;margin-left: 5%;'>
                                          <b>नमस्कार $name,</b><br>
                                          तुम्ही लेमन ट्रेडिंग कंपनीत यशस्वीरित्या नोंदणीकृत आहात.<br/>
                                          लॉग इन करण्यासाठी खालील तपशील वापरा.<br/>
                                            तुमचा ईमेल आहे: $email <br/>
                                            
                                              </center>
                                          </div>
                                          <hr style='width:70%;
                                                border: 0;
                                                height: 1px;
                                                margin-bottom:3%;
                                                background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));'>
                                 
                                         <div style='font-family: cursive;
                                            line-height: 22px;
                                                margin-left: 30%;'>

                                          <h5>टीम लेमन ट्रेडिंग कंपनी</h5>


                                        </div>

                            </div>
                    <div class='col-sm-4'></div>
            </div>
    </body>";
    }



    function activate_mail($email, $username, $pass, $name, $sub, $body, $host_name = "ssl://smtp.googlemail.com", $port = "465", $protocol = "smtp")
    {

        //         $config = array();
        //                $config['protocol'] = 'sendmail';
        //                $config['mailpath'] = '/usr/sbin/sendmail';
        //                $config['charset'] = 'utf-8';
        //                $config['mailtype'] = 'html';
        //
        //                $this->load->library('email');
        //                $this->email->initialize($config);
        //
        //                $this->email->set_newline("\r\n");
        //
        //                $this->email->from($username, $name);
        //                $this->email->to($email);
        //                $this->email->subject($sub);
        //                $this->email->message($body);
        //                $this->email->send();

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        //$config['smtp_user'] = "teamautoit@gmail.com";
        //$config['smtp_pass'] = "P@ssword1!";
        $config['smtp_user'] = $username;
        $config['smtp_pass'] = $pass;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->load->library('email');

        $this->email->initialize($config);
        $this->email->from($username, $name);
        $this->email->to($email);
        $this->email->subject($sub);
        $this->email->message($body);

        $this->email->send();
    }




    public function records_delete($tbl_name, $where1)
    {
        $this->db->where($where1);
        $details = $this->db->delete($tbl_name);

        if ($details) {
            return $details;
        }
        return false;
    }

    public function upload_image($img_name, $img_path, $old_img = '')
    {

        $filename1      = $_FILES[$img_name]['name'];
        $filename1 = str_replace(' ', '_', $filename1);
        $filename1 = str_replace('-', '_', $filename1);
        $filename2      = explode(".", $filename1);
        $new_filename2  = date('M-Y') . "_" . ($filename1);
        $thumb2 = $new_filename2;
        $_FILES['imag']['name']         = $new_filename2;
        $_FILES['imag']['type']         = $_FILES[$img_name]['type'];
        $_FILES['imag']['tmp_name']    = $_FILES[$img_name]['tmp_name'];
        $_FILES['imag']['error'] = $_FILES[$img_name]['error'];
        $_FILES['imag']['size']  = $_FILES[$img_name]['size'];

        $config = array();
        $config['upload_path'] = './assets/uploads/' . $img_path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|xls|xlsx|ppt';
        //$config['max_size']      = '0';             
        $config['overwrite']     = FALSE;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('imag')) {

            $imagedata2 = $this->upload->data();
            $newimagename2 = $imagedata2["file_name"];
            $newimagename2 = str_replace(" ", "", $newimagename2);
            $this->load->library("image_lib");
            $config['image_library'] = 'gd2';
            $config['source_image'] = $imagedata2["full_path"];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = TRUE;
            $config['new_image'] = './assets/uploads/' . $img_path . '/100X100';
            $config['width']  = 180;
            $config['height'] = 200;
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
        }

        if ($old_img != "") {
            $filename = 'assets/uploads/' . $img_path . '/' . $old_img;

            if (file_exists($filename)) {
                unlink('assets/uploads/' . $img_path . '/' . $old_img);
                unlink('assets/uploads/' . $img_path . '/100X100/' . $old_img);
            }
        }
        //echo $new_filename2;die;        
        return $new_filename2;
    }



    public function upload_only_image($img_name, $img_path, $old_img = '')
    {

        $filename1      = $_FILES[$img_name]['name'];
        $filename1 = str_replace(' ', '_', $filename1);
        $filename1 = str_replace('-', '_', $filename1);
        $filename2      = explode(".", $filename1);
        $new_filename2  = date('M-Y') . "_" . ($filename1);
        $thumb2 = $new_filename2;
        $_FILES['imag']['name']         = $new_filename2;
        $_FILES['imag']['type']         = $_FILES[$img_name]['type'];
        $_FILES['imag']['tmp_name']    = $_FILES[$img_name]['tmp_name'];
        $_FILES['imag']['error'] = $_FILES[$img_name]['error'];
        $_FILES['imag']['size']  = $_FILES[$img_name]['size'];

        $config = array();
        $config['upload_path'] = './assets/uploads/' . $img_path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        //$config['max_size']      = '0';             
        $config['overwrite']     = FALSE;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('imag')) {

            $imagedata2 = $this->upload->data();
            $newimagename2 = $imagedata2["file_name"];
            $newimagename2 = str_replace(" ", "", $newimagename2);
            $this->load->library("image_lib");
            $config['image_library'] = 'gd2';
            $config['source_image'] = $imagedata2["full_path"];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = TRUE;
            $config['new_image'] = './assets/uploads/' . $img_path . '/100X100';
            $config['width']  = 180;
            $config['height'] = 200;
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
        }

        if ($old_img != "") {
            $filename = 'assets/uploads/' . $img_path . '/' . $old_img;

            if (file_exists($filename)) {
                unlink('assets/uploads/' . $img_path . '/' . $old_img);
                unlink('assets/uploads/' . $img_path . '/100X100/' . $old_img);
            }
        }
        //echo $new_filename2;die;        
        return $new_filename2;
    }





    public function uploadmult_image($img_name, $img_path, $i)
    {

        $filename2      = $_FILES[$img_name]['name'][$i];
        $filename2      = explode(".", $filename2);
        $new_filename2  = substr(md5($img_name . $i), 15) . "_" . date('Ymd') . time() . "." . end($filename2);
        $thumb2 = $new_filename2;
        $_FILES['imag']['name']         = $new_filename2;
        $_FILES['imag']['type']         = $_FILES[$img_name]['type'][$i];
        $_FILES['imag']['tmp_name']    = $_FILES[$img_name]['tmp_name'][$i];
        $_FILES['imag']['error'] = $_FILES[$img_name]['error'][$i];
        $_FILES['imag']['size']  = $_FILES[$img_name]['size'][$i];

        $config = array();
        $config['upload_path'] = './assets/uploads/' . $img_path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
        //$config['max_size']      = '0';             
        $config['overwrite']     = FALSE;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('imag')) {

            $imagedata2 = $this->upload->data();
            $newimagename2 = $imagedata2["file_name"];
            $newimagename2 = str_replace(" ", "", $newimagename2);
            $this->load->library("image_lib");
            $config['image_library'] = 'gd2';
            $config['source_image'] = $imagedata2["full_path"];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = TRUE;
            $config['new_image'] = './assets/uploads/' . $img_path . '/100X100';
            $config['width']  = 180;
            $config['height'] = 200;
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
        }


        //echo $new_filename2;die;        
        return $new_filename2;
    }
}
