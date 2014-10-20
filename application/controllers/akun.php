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
        $this->view_data["data"] = null;
        $this->view_data["user"] = array("role" => ROLE_ADMIN, "name" => "ADMIN");
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
        $this->view_data['data']['user'] = $this->view_data['user'];
        $this->load->view("akun/form_registrasi", $this->view_data);
    }
    /**
     * Menangani pendaftaran secara manual
     */
    public function registrasi_manual() {
        $users = $this->input->post("users", true);
        $myrole = $this->view_data['user']['role'];
        foreach ($users as $uk => $uv) {
            $name = $uv["name"];
            $email = $uv["email"];
            $roles = $uv["roles"];
            //hanya bisa memasukkan orang dengan role lebih rendah (nilai role>tinggi)
            if ($roles > $myrole) {
                //simpan user
            }
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
        $this->load->view("akun/form_login", $this->view_data);
    }
    /**
     * login
     */
    public function login() {
        $email = $this->input->post("email", true);
        $password = $this->input->post("password", true);
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
        $this->view_data['data'] = array(
            "Nama" => "Budi"
            , "Andkatan" => "1998"
            , "TTL" => "Bandung, 20 September 1990"
            , "HP" => "-"
        );
        $this->load->view("akun/lihat_profil", $this->view_data);
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
        $this->load->view("akun/ubah_sandi", $this->view_data);
    }
    /**
     * Memproses perubahan sandi
     */
    public function ubah_sandi_post() {
        $old = $this->input->post("old_pass", true);
        $new = $this->input->post("new_pass", true);
    }
    /**
     * Membuka halaman lupa sandi
     */
    public function lupa_sandi() {
        $this->load->view("akun/lupa_sandi", $this->view_data);
    }
    /**
     * Memproses form lupa sandi
     */
    public function lupa_sandi_post() {
        $email = $this->input->post("email", true);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */