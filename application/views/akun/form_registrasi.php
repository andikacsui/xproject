<?php
$us = ""; // $user;
function content($data) {
    ?>
    <div>
        <form method="POST" action="<?php echo base_url(); ?>akun/registrasi_manual">
            <div class="il-cont">
                <ol class="il-list">
                    <li>
                        <input name="users[$][name]" value="nama$"/>
                        <input name="users[$][email]" value="email$"/>
                        <select name="users[$][role]">
                            <?php if ($data['user']['role'] == ROLE_ADMIN) { ?>
                                <option value="<?php echo ROLE_PBKD; ?>">pbkd</option>
                            <?php } ?>
                            <option value="<?php echo ROLE_MENTOR; ?>">mentor</option>
                        </select>
                        <input type="button" class="il-remove" value="Hapus" />
                    </li>
                </ol>
                <input type="button" class="il-add" value="Tambah" />
            </div>
            <input type="submit" value="submit" />
        </form>
    </div>
    <script src="<?php echo base_url() ?>js/input_list.min.js" ></script>
    <?php
}
$title = "Halaman Pendaftaran";
require_once APPPATH . 'views/layout_normal.php';
?>
