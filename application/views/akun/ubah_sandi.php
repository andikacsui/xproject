<?php
function content($data) { ?>
    <form method="POST" action="<?php echo base_url("akun/ubah_sandi_post"); ?>">
        Password Lama
        <br/>
        <input name="old_pass" type="password"/>
        <br/>
        Password Baru
        <br/>
        <input name="new_pass" type="password"/>
        <br/>
        Konfirmasi Password Baru
        <br/>
        <input  type="password"/>
        <br/>
        <input type="submit" value="Simpan" />
    </form>
    <?php
}
$title = "Ubah Sandi";
require_once APPPATH . 'views/layout_login.php';
?>
