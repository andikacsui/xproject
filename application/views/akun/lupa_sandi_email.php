<?php
function content($data) { ?>
    <form method="POST" action="<?php echo base_url("akun/lupa_sandi_email"); ?>">
        Email
        <br/>
        <input name="email"/>
        <br/>
        <input type="submit" value="Lanjut" />
    </form>
    <?php
}
$title = "Lupa Sandi";
require_once APPPATH . 'views/layout_login.php';
?>
