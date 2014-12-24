<div class="col-md-3 pull-right">
    <div class="col-md-6  text-right">
        <img class="avatar img-thumbnail"
             src="<?=$baseUrl.$user->getInfo('avatar_url');?>"
             alt="avatar" id="avatar"/>
    </div>
    <div class="col-md-6 text-left">
        <p class=""><span
                class="label label-success">Hello <?=$user->getInfo('name')?></span></p>
        </p><a href="<?=$baseUrl?>user/logout"><span class="label label-danger">Logout</span></a></p>
    </div>
</div>