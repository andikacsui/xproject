<?php
function content() { ?>
    <script>
    </script>
    <div>
        <form method="POST" action="<?php echo base_url(); ?>akun/registrasi_manual">
            <div class="il-cont">
                <ol class="il-list">
                    <li>
                        <input name="users[$][name]" value="nama$"/>
                        <input name="users[$][email]" value="email$"/>
                        <select name="users[$][roles]">
                            <option value="<?php echo ROLE_PBKD; ?>">pbkd</option>
                            <option value="<?php echo ROLE_MENTOR; ?>">mentor</option>
                        </select>
                        <input type="button" class="il-remove" value="Hapus" />
                    </li>
                </ol>
                <input type="button" class="il-add" value="Tambah" />
            </div>
            <input type="submit" value="submit" />
        </form>
        <p id="test">hello</p>
    </div>
    <script src="<?php echo base_url() ?>js/input_list.min.js" ></script>
    <?php
}
$title = "Halaman Pendaftaran";
require_once APPPATH . 'views/layout_normal.php';
?>
