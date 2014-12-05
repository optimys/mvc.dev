<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link type="test/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
</head>
<body>
    <div class="container">
        <?php require_once('views/blocks/navigation.php'); ?>

        <? if($blocks): ?>
            <?foreach($blocks as $block):?>
                <? require("views/blocks/{$block}.php");?>
                <? endforeach ?>
        <? endif ?>

    </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>