<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class materi extends CI_Controller {

    /**
     * 
     */
    public function index() {
        $this->load->view('welcome_message');
    }
    
    /**
     * Melihat semua daftar
     * @param type $kelas
     */
    public function daftar($kelas){
        
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */