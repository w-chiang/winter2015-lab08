<?php

class Auth extends Application 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->helper('url');
    }
    
    function index() 
    {
        $this->data['pagebody'] = 'login';
        $this->render();
    }
    
    function submit()
    {
        $key = $_POST['userid'];
        $user = $this->users->get($key);
        if (password_verify($this->input->post('password'),$user->password)) {
            $this->session->set_userdata('userID',$key);
            $this->session->set_userdata('userName',$user->name);
            $this->session->set_userdata('userRole',$user->role);
            }
        redirect('/');
    }
    
    function logout() 
    {
        $this->session->sess_destroy();
        redirect('/');
    }
} 