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
                $this->load->view('users/signup_success');
            }
            else
                $this->load->view('users/login', array('login_failed' => true));
        }
    }
    public function signup_success(){
        $this->load->view('users/signup_success');
    }


    public function signup($id=-1)
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

       if($this->input->post('userId') <= 0){
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_info.email]');
        }

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->model('usersmodel');
            //$this->form_validation->
            if($this->input->post('userId') > 0){
                $id = $this->input->post('userId');
            }
            $data['user_info'] = $this->usersmodel->getUserInfoById($id);
            $this->load->view('users/sign_up', $data);// I need to pass id value through url
        }
        else
        {
            $this->load->model('usersmodel');
            $data = $this->usersmodel->setUserInfoFromForm();
            $usersId = $this->usersmodel->saveUserInfo($data);

            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'userId'=> $usersId
            );

            $this->usersmodel->saveUsers($data);
            $this->load->view('users/signup_success');
        }
    }


}
