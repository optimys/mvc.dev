<div class="col-xs-12 col-sm-6 col-md-6">
    <div class="well well-sm">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <img src="<?=$user->getInfo('avatar_url') ?>" alt="avatar"
                     class="img-rounded img-responsive "/>
            </div>
            <div class="col-sm-6 col-md-8">
                <h4><?= $user->getInfo('name'); ?></h4>

                <p>
                    <i class="fa fa-envelope"></i>
                    <?= $user->getInfo('email'); ?>
                </p>
                <!-- Split button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">
                        Settings
                    </button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span><span class="sr-only">Social</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= Config_h::get('baseUrl') ?>user/change_password">Change Password</a></li>
                        <li><a href="<?= Config_h::get('baseUrl') ?>user/update_user_info">Update info</a></li>
                        <li><a href="#">Test</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Test</a></li>
                    </ul>
                </div>
                <p></p>
                <p><?=$user->getINfo('user_info')?></p>
            </div>
        </div>
    </div>
</div>