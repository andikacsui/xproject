<?php

$config = array(
    'regis' => array(
        
		 array(
            'field' => 'nama',
            'label' => 'nama',
            'rules' => 'required|min_length[4]'
        ),
		
		array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|min_length[5]|cekname'
        ),
		
		array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[tb_user.email]'
        ),
		
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[5]|'
        ),
        array(
            'field' => 'con_password',
            'label' => 'Konfirmasi Password',
            'rules' => 'required|matches[password]'
        ),
		
    ),
	
);



?>