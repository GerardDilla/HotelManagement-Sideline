<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	function auth($email, $password, $remember=false)
    {
        // make sure the username doesn't go into the query as false or 0
        if(!$email)
        {
            return false;
        }
		
        $this->db->select('*');
       // $this->db->where('active', 1);
		$this->db->where('email', $email);
        $this->db->where('password',  sha1($password));
        $this->db->limit(1);
        $result = array();
        $result = $this->db->get('guests');
        $result = $result->row_array();
        //echo json_encode($result);
        if ($result)
        {
            $admin = array();
            $admin['front_user'] = array();
            $admin['front_user']['id'] = $result['id'];
            $admin['front_user']['firstname'] = $result['firstname'];
			$admin['front_user']['lastname'] = $result['lastname'];
            $admin['front_user']['email'] = $result['email'];
			$admin['front_user']['mobile'] = $result['mobile'];
            

            if($remember)
            {
                $username = $email;
                $loginCred = json_encode(array('username'=>$username, 'password'=>$password));
                $loginCred = base64_encode($loginCred);
                //remember the user for 6 months
                $this->generateCookie($loginCred, strtotime('+6 months'));
            }

           
            
            return $admin;
        }
        else
        {
            //echo 'NO LOGIN';
            return false;
        }
    }

    private function generateCookie($data, $expire)
    {
        setcookie('Admin', $data, $expire, '/', $_SERVER['HTTP_HOST']);
    }

	
	 function logout($staff = true)
    {
            $this->session->unset_userdata('front_user');
       	// $this->session->sess_destroy();
    }
    
}
