<div class="col-md-3 pull-right">
    <div class="col-md-6  text-right">
        <img class="avatar img-thumbnail"
             src="<?= $data['baseUrl'] . Session_helper::get('logged')['avatar_url']; ?>"
             alt="avatar" id="avatar"/>
    </div>
    <div class="col-md-6 text-left">
        <p class=""><span
                class="label label-success">Hello <?= Session_helper::get('logged')['login']; ?></span></p>
        </p><a href="<?= $data['baseUrl'] ?>home/logout"><span class="label label-danger">Logout</span></a></p>
    </div>
</div>