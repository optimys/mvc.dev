<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:26
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link type="test/css" rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li><a href="home">home</a></li>
                    <li><a href="register">registration</a></li>
                    <li><a href="about">about</a></li>
                    <li><a href="contacts">contact</a></li>
                    <li><a href="user">user</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="jumbotron col-md-5 col-md-offset-3">
            <h1><?= $data['Title']; ?></h1>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>