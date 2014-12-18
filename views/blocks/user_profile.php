<div class="col-xs-12 col-sm-6 col-md-6">
    <div class="well well-sm">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <img src="<?= $baseUrl.Session_helper::get('logged')['avatar_url']; ?>" alt="avatar"
                     class="img-rounded img-responsive "/>
            </div>
            <div class="col-sm-6 col-md-8">
                <h4><?= Session_helper::get('logged')['name']; ?></h4>
                <p>
                    <i class="fa fa-envelope"></i>
                    <?= Session_helper::get('logged')['email']; ?>
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
                        <li><a href="<?=$baseUrl?>user/change_password">Change Password</a></li>
                        <li><a href="<?=$baseUrl?>user/update_user_info">Update info</a></li>
                        <li><a href="#">Test</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Test</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>