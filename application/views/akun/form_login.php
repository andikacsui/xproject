<?php
function content($data) { ?>
    <input type="hidden" name="ret_url" value="<?php echo $data['ret_url']; ?>"/>
    Email
    <br/>
    <input name="username"/>
    <br/>
    Password
    <br/>
    <input name="password"/>
    <br/>
    <input id="test" type="button" value="coba" />

    <div id="role-pad">

    </div>
    <script>
        $("#test").click(function() {
            var username = $("input[name=username]").val();
            var password = $("input[name=password]").val();
            $.post("<?php echo base_url("akun/daftar_role"); ?>", {username: username, password: password},
            function(data) {
                var result = $.parseJSON(data);
                for (var i = 0; i < result.length; i++) {
                    var d = result[i];
                    $("#role-pad").append("<a href=\"<?php echo base_url('akun/pilih_role'); ?>/" + d.role_id + "?ret_url=<?php echo $data['ret_url']; ?>\">" + d.role_name + "</a>");
                }
            });
        });
    </script>
    <?php
}
$title = "Halaman Login";
require_once APPPATH . 'views/layout_login.php';
?>
