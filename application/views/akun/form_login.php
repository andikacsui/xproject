<?php
function content($data) { ?>
    <form method="POST" action="<?php echo base_url("akun/login"); ?>">
        <input type="hidden" name="ret_url" value="<?php echo $data['ret_url'];?>"/>
        Email
        <br/>
        <input name="username"/>
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
