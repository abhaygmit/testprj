<?php

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('accountmodel');
        $this->load->model('common_model');
    }

    function change_password() {
        if (!$this->session->userdata('id')) {
            redirect(base_url() . 'admin/index');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/change_password');
        } else {
            if (!empty($_POST)) {
                //$old_password = $_POST['old_password'];
                $result = $this->accountmodel->getOldPassword($_POST);
                if ($result) {
                    $suc = $this->accountmodel->updateUserPassword($_POST);
                    if ($suc) {
                        $data['msg'] = 'Password Updated Successfully.';
                        $this->load->view('admin/change_password', $data);
                    }
                } else {
                    $data['msg'] = 'Old Password is not Correct.';
                    $this->load->view('admin/change_password', $data);
                }
            }
        }
    }

}

?>