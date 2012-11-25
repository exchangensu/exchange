<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nowshad
 * Date: 11/24/12
 * Time: 10:46 AM
 * To change this template use File | Settings | File Templates.
 */
class users extends CI_Controller
{
    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('users/login', array('login_failed' => false));
        }
        else
        {
            $this->load->model('usersmodel');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $correctAuthentication = $this->usersmodel->checkAuthentication($username, $password);

            if($correctAuthentication){
                $this->load->view('users/formsuccess');
            }
            else
                $this->load->view('users/login', array('login_failed' => true));//need to show error msg that login failed
        }
    }


    public function signup()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_info.email]');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|callback_compare_passwords');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('users/sign_up');
        }
        else
        {
             $data = array(
                'lastName' => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'country' => $this->input->post('country')
            );

            $this->load->model('usersmodel');
            $usersId = $this->usersmodel->saveUserInfo ($data);

            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'userId'=>$usersId
            );

            $this->usersmodel->saveUsers($data);
            $this->load->view('users/signup_success');
        }
    }
    public function compare_passwords($str){
        if(strcmp($str, $this->input->post('password')) == 0)
            return true;
        $this->form_validation->set_message('compare_passwords', 'The password and %s field did not match');
        return false;
    }
    public function username_check($str)
    {
        if ($str == 'test')
        {
            $this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
