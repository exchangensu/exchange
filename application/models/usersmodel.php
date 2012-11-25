<?php

class usersmodel extends CI_Model
{
     public function saveUserInfo($data)
     {
         $this->db->insert('user_info', $data);
         $id = $this->db->insert_id();
         return $id;
     }
    public function saveUsers($data){
        $this->db->insert('users', $data);

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



