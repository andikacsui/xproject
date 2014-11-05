<?php
function content($data) { ?>
    <form method="POST" action="<?php echo base_url("akun/lupa_sandi_reset"); ?>">
        Password Baru
        <br/>
        <input name="password"/>
        <br/>
        Ulangi Password Baru
        <br/>
        <input/>
        <br/>
        <input type="hidden" name="key" value="<?php echo $data['key']; ?>"/>
        <input type="submit" value="Ganti" />
    </form>
    <?php
}
$title = "Lupa Sandi";
require_once APPPATH . 'views/layout_login.php';
?>
