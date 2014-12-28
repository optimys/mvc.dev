<?php
require_once('config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link type="text/css" href="<?=Config_h::get('baseUrl')?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link type="text/css" href="<?=Config_h::get('baseUrl')?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link type="text/css" href="<?=Config_h::get('baseUrl')?>bower_components/jquery-ui/themes/dark-hive/jquery-ui.min.css" rel="stylesheet"/>
    <link type="text/css" href="<?=Config_h::get('baseUrl')?>css/style.css" rel="stylesheet" rel="stylesheet"/>

</head>
<body>
<div class="container">
    <?php
    require_once('views/blocks/navigation.php');

    if ($blocks) {
        foreach ($blocks as $block) {
            require("views/blocks/{$block}.php");
        }
    }
    ?>

</div>
<script type="text/javascript" src="<?=Config_h::get('baseUrl')?>bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?=Config_h::get('baseUrl')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=Config_h::get('baseUrl')?>bower_components/jquery-ui/jquery-ui.min.js"></script>
</body>
</html>