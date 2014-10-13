<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class registrasi extends CI_Controller {

    /**
     * Membuka halaman pendaftaran user
     */
    public function form() {
        $this->load->view();
    }
    
    /**
     * Menangani pendaftaran manual
     */
    public function form_post() {
    }
    
    /**
     * Menangani pendaftaran menggunakan file excel
     */
    public function upload_excel(){
        
    }
    
    /**
     * Menghapus seorang pengguna
     */
    public function hapus(){
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */