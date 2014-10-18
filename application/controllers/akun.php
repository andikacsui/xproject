<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Mengurusi hal yang berkaitan dengan manajemen akun dan profil pengguna
 */
class akun extends CI_Controller {

    var $view_data = array();
    
    public function __construct() {
        parent::__construct();
        $this->view_data["user"] = array("role" => ROLE_ADMIN,"name"=>"ADMIN");
    }
    /**
     * Arahkan ke halaman tertentu sesuai dengan role
     */
    public function index() {
    }
    
    //--------------------------- REGISTRASI ----------------------------------
    /**
     * Membuka halaman pendaftaran user
     */
    public function form_registrasi() {
        $this->load->view("akun/registrasi", $this->view_data);
    }
    /**
     * Menangani pendaftaran secara manual
     */
    public function registrasi_manual() {
        $users = $this->input->post("users",true);
        foreach ($users as $uk => $uv) {
            $name = $uv["name"];
            $email = $uv["email"];
            $roles = $uv["roles"];
            //do something
            print_r($name . " has " . $email . " ask " . $roles . '<br/>');
        }
    }
    /**
     * Menangani pendaftaran menggunakan file excel
     */
    public function registrasi_excel() {
        
    }
    /**
     * Menghapus seorang pengguna
     */
    public function hapus() {
        
    }
    //--------------------------- LOGIN&LOGOUT ---------------------------------
    /**
     * membuka halaman login
     */
    public function form_login() {
        $this->load->view("akun/login",  $this->view_data);
    }
    /**
     * login
     */
    public function login() {
        $username = $this->input->post("username", true);
        $password = $this->input->post("username", true);
        $this->load->model('account_model');
        $this->account_model->get_admin_login($username,$password);
    }
    /**
     * logout
     */
    public function logout() {
        
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
    public function ubah_profil($id) {
        
    }
    /**
     * Menyimpan perubahan profil
     */
    public function ubah_profil_profil() {
        
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
    public function tambah_role_post() {
        
    }
    /**
     * Mengganti role pengguna
     */
    public function ganti_role() {
        
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
    public function ubah_sandi_post() {
        
    }
    /**
     * Membuka halaman lupa sandi
     */
    public function lupa_sandi() {
        
    }
    /**
     * Memproses form lupa sandi
     */
    public function lupa_sandi_post() {
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */