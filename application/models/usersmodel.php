<?php

class usersmodel extends CI_Model
{
     public function save($data){

         $user_info = array(
                        'lastName'=>$data['lastname'],
                        'country'=>$data['country'],
                        'email'=>$data['email']
                    );
         $this->db->insert('user_info', $user_info);
         $id = $this->db->insert_id();
         $users = array(
             'username'=>$data['username'],
             'password'=>$data['password'],
             'userId'=>$id
         );

         $this->db->insert('users', $users);


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



