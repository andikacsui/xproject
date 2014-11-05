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
        //dummy
        $this->load->library('session');
        $this->view_data["user"] = array("role" => $this->session->userdata('usr_role'), "name" => $this->session->userdata('usr_name'));
    }
    /**
     * Arahkan ke halaman tertentu sesuai dengan role
     */
    public function index() {
        echo 'seharusnya redirect ke suatu halaman';
    }
    //--------------------------- REGISTRASI ----------------------------------
    /**
     * Membuka halaman pendaftaran user
     */
    public function form_registrasi() {
        $myrole = $this->view_data['user']['role'];
        if ($myrole == ROLE_ADMIN || $myrole == ROLE_MENTOR || $myrole == ROLE_PBKD) {
            $this->view_data['data']['user'] = $this->view_data['user'];
            $this->load->view("akun/form_registrasi", $this->view_data);
        }else redirect('/akun/form_login?return_url=/akun/form_registrasi');
    }
    /**
     * Menangani pendaftaran secara manual
     */
    public function registrasi_manual() {
        $users = $this->input->post("users", true);
        if ($users) {
            $myrole = $this->view_data['user']['role'];
            print_r($users);
            foreach ($users as $uk => $uv) {
                $name = $uv["name"];
                $email = $uv["email"];
                $role = $uv["role"];
                //hanya bisa memasukkan orang dengan role lebih rendah (nilai role>role dia)
                if ($role > $myrole) {
                    //simpan user
                }
            }
        }
        //arahkan ke halaman awal
        redirect(base_url("akun/index"));
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
     * Membuka halaman login.
     */
    public function form_login() {
        $return_url = $this->input->get("return_url");
        $this->view_data['data']['ret_url'] = $return_url;
        $this->load->view("akun/form_login", $this->view_data);
    }
    /**
     * login
     */
    public function login() {
        $return_url = $this->input->post("ret_url", true);
        $username = $this->input->post("username", true);
        $password = $this->input->post("password", true);
        
        $this->session->set_userdata(array('usr_role' => $password, 'usr_name' => $username));
        redirect($return_url);
    }
    /**
     * logout
     */
    public function logout() {
        $this->session->sess_destroy();
        $this->index();
    }
    //--------------------------- PROIL ---------------------------------
    /**
     * Menampilkan profil lengkap seorang pengguna
     * @param type $id id user yang ingin dilihat profilnya
     */
    public function lihat_profil($id) {
        $this->view_data['data'] = array(
            "Nama" => "Budi"
            , "Angkatan" => "1998"
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
        $this->view_data['data'] = array(
            "Nama" => "Budi"
            , "Angkatan" => "1998"
            , "TTL" => "Bandung, 20 September 1990"
            , "HP" => "-"
        );
        $this->load->view("akun/ubah_profil", $this->view_data);
    }
    /**
     * Menyimpan perubahan profil
     */
    public function ubah_profil_post() {
        
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
     * @param type $role Peran role user yang baru
     */
    public function ganti_role($role) {
        
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
     * @param type $key security key untuk reset password
     */
    public function lupa_sandi($key = null) {
        if ($key == null) {
            //jika belum ada key, masukkan email
            $this->load->view("akun/lupa_sandi", $this->view_data);
        } else {
            //jika sudah ada key, arahkan ke reset password
            $this->view_data['data']['key'] = $key;
            $this->load->view("akun/lupa_sandi", $this->view_data);
        }
    }
    /**
     * Memproses form masukkan email saat lupa sandi 
     */
    public function lupa_sandi_email() {
        $email = $this->input->post("email", true);
        //generate key untuk reset password
        $key = "";
        //kirim email
    }
    /**
     * Mereset password
     */
    public function lupa_sandi_reset() {
        $key = $this->input->post("key", true);
        $password = $this->input->post("password", true);
        //reset password
        //arahkan ke halaman login
        redirect(base_url("akun/form_login"));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */