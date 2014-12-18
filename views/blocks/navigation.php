<nav class="navbar navbar-default " role="navigation">
    <div class="container">
        <div class="col-md-6">
            <ul class="nav navbar-nav">
                <li><a href="<?=$baseUrl; ?>home">home</a></li>
                <?if(Session_helper::exist('logged')):?>
                    <li><a href="<?=$baseUrl; ?>user">user</a></li>
                    <?else:?>
                    <li><a href="<?=$baseUrl; ?>register">registration</a></li>
                <?endif?>
                <li><a href="<?=$baseUrl; ?>about">about</a></li>
                <li><a href="<?=$baseUrl; ?>contacts">contact</a></li>
                <li><a><?=$data['errors'];?></a></li>
            </ul>
        </div>
        <?php
            if(Session_helper::exist('logged')){
                require_once('nav_profile_info.php');
            }else{
                require_once('login_form.php');
            }
        ?>
    </div>
</nav>