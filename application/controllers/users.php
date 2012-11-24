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
            $this->load->view('users/login');
        }
        else
        {
            $this->load->model('usersmodel');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $correctAuthentication = $this->usersmodel->checkAuthentication($username, $password);
            if($correctAuthentication)
                $this->load->view('users/formsuccess');
            else
                $this->load->view('users/login');
        }
    }

    public function signup()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_info.email]');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('users/sign_up');
        }
        else
        {
            echo $this->input->post('username');
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'country' => $this->input->post('country')
            );

            $this->load->model('usersmodel');
            $this->usersmodel->save($data);
            $this->load->view('users/signup_success');
        }
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
