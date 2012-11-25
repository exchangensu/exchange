<?php

class usersmodel extends CI_Model
{
     public function saveUserInfo($data)
     {
         if(isset($data['userId']) && $this->getUserInfoById($data['userId'] != null)){
             $this->db->where('userId', $data['userId']);
             $this->db->update('user_info', $data);
             $id = $data['userId'];
        }else{
             $this->db->insert('user_info', $data);
             $id = $this->db->insert_id();
         }
         return $id;
     }
    public function saveUsers($data){
        if(isset($data['userId']) && $this->getUserInfoById($data['userId'] != null)){
            $this->db->where('userId', $data['userId']);
            $this->db->update('users', $data);
            $id = $data['userId'];
        }else{
            $this->db->insert('users', $data);
            $id = $this->db->insert_id();
        }
        return $id;

    }
    public function setUserInfoFromForm(){
        $data = array(
            'userId' => $this->input->post('userId'),
            'lastName' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'firstName' => $this->input->post('firstName'),
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'zip' => $this->input->post('zip'),
            'city' => $this->input->post('city'),
            'phone' => $this->input->post('phone')
        );
        return $data;
    }

    public function getUserInfoById($userId){
        $query = $this->db->get_where('user_info', array(
            'userId' => $userId,
        ),1);

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        return null;
    }

    public function getUsersById($userId){
        $query = $this->db->get_where('users', array(
            'userId' => $userId,
        ),1);

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        return null;
    }



    public function checkAuthentication($username, $password){

        $query = $this->db->get_where('users', array(
                                                    'username' => $username,
                                                    'password' => $password,
                                                ));
        if ($query->num_rows() > 0)
        {
            return true;

        }else{

            return false;
        }


    }
}



