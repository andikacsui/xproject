<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <style>
        #content{
            border: thin solid #ccc;
            padding: 10px;
            margin-left: 20%;
            width: 60%;
        }
    </style>
</head>
<body>
    <h2><?php echo $title; ?></h2>
    <div>Anda login sebagai <?php echo $user['name'] ?></div>
    <div id="sidebar">
        <?php
        switch ($user['role']) {
            case ROLE_ADMIN:
                require_once 'menu_admin.php';
                break;
            case ROLE_PBKD:
                include_once 'menu_pbkd.php';
                break;
            case ROLE_MENTOR:
                include_once 'menu_mentor.php';
                break;
        }
        ?>
    </div>
    <div id="container">
        <div id="content">
            <?php content($data); ?>
        </div>
    </div>

</body>
</html>