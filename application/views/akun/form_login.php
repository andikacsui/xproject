<?php
function content($data) { ?>
    <form method="POST" action="<?php echo base_url(); ?>akun/login">
        Email
        <br/>
        <input name="email"/>
        <br/>
        Password
        <br/>
        <input name="password"/>
        <br/>
        <input type="submit" value="Login" />
    </form>
    <?php
}
$title = "Halaman Login";
require_once APPPATH . 'views/layout_login.php';
?>
