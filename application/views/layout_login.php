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
    <div id="container">
        <div id="content">
            <?php content($data); ?>
        </div>
    </div>

</body>
</html>