<nav class="navbar navbar-default " role="navigation">
    <div class="container">
        <div class="col-md-6">
            <ul class="nav navbar-nav">
                <li><a href="<?=Config_h::get('baseUrl') ?>home">home</a></li>
                <?if(Session_h::exist('logged')):?>
                    <li><a href="<?=Config_h::get('baseUrl'); ?>user">user</a></li>
                    <?else:?>
                    <li><a href="<?=Config_h::get('baseUrl'); ?>register">registration</a></li>
                <?endif?>
                <li><a href="<?=Config_h::get('baseUrl'); ?>about">about</a></li>
                <li><a href="<?=Config_h::get('baseUrl'); ?>contacts">contact</a></li>
                <li><a></a></li>
            </ul>
        </div>
        <?php
            if(Session_h::exist('logged')){
                require_once('nav_profile_info.php');
            }else{
                require_once('login_form.php');
            }
        ?>
    </div>
</nav>