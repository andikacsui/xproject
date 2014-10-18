<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class akun extends CI_Controller {
    
    public function index(){
        $this->form();
    }

    //--------------------------- REGISTRASI ----------------------------------
    /**
     * Membuka halaman pendaftaran user
     */
    public function form_registrasi() {
        $this->load->view("akun/registrasi");
    }
    
    /**
     * Menangani pendaftaran secara manual
     */
    public function regstrasi_manual() {
    }
    
    /**
     * Menangani pendaftaran menggunakan file excel
     */
    public function registrasi_excel(){
        
    }
    
    /**
     * Menghapus seorang pengguna
     */
    public function hapus(){
        
    }
    
    //--------------------------- LOGIN&LOGOUT ---------------------------------
    
    /**
     * membuka halaman login
     */
    public function form_login() {
        $this->load->view("akun/login");
    }
    
    /**
     * login
     */
    public function login() {
        
    }
    
    /**
     * logout
     */
    public function logout(){
        
    }
    
    //--------------------------- PROIL ---------------------------------
    
    /**
     * Menampilkan profil lengkap seorang pengguna
     * @param type $id id user yang ingin dilihat profilnya
     */
    public function lihat_profil($id) {
        
    }
    
    /**
     * Membuka halaman ubah profil
     * @param type $id id user yang ingin diubah profilnya
     */
    public function ubah_profil($id){
        
    }
    
    /**
     * Menyimpan perubahan profil
     */
    public function ubah_profil_profil(){
        
    }
    
    //------------------------- MANAJEMEN ROLE ---------------------------------
    /**
     * Membuka halaman tambah role
     */
    public function tambah_role($id) {
        
    }
    
    /**
     * Menangani proses tambah role
     */
    public function tambah_role_post(){
        
    }
    
    /**
     * Mengganti role pengguna
     */
    public function ganti_role(){
        
    }
    
    //------------------------- MANAJEMEN SANDI --------------------------------
    /**
     * Membuka halaman untuk mengubah sandi
     */
    public function ubah_sandi() {
        
    }
    
    /**
     * Memproses perubahan sandi
     */
    public function ubah_sandi_post(){
        
    }
    
    /**
     * Membuka halaman lupa sandi
     */
    public function lupa_sandi(){
        
    }
    
    /**
     * Memproses form lupa sandi
     */
    public function lupa_sandi_post(){
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */