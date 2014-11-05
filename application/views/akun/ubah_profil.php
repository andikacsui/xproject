<?php
$us = ""; // $user;
function content($data) {
    ?>
    <div>
        <table>
            <?php foreach ($data as $k => $v) { ?>
                <tr><td><?php echo $k; ?></td><td><input value="<?php echo $v; ?>" /></td></tr>
            <?php } ?>
        </table>
    </div>
    <?php
}
$title = "Ubah Profil";
require_once APPPATH . 'views/layout_normal.php';
?>
