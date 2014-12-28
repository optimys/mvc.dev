<div class="col-md-6">
    <form action="<?=Config_h::get('baseUrl')?>user/update_user_info/change" class="" method="post" enctype="multipart/form-data">
        <div class="row">
            <label class="col-md-3" for="name">Name</label>
            <div class="col-md-7">
                <input class="form-control" name="name" id="name" type="text"/>
            </div>
        </div>
        <hr/>
        <div class="row">
            <label class="col-md-3" for="about">User info</label>
            <div class="col-md-7">
                <textarea name="user_info" id="about" cols="41" rows="5"><? $user->getInfo('user_info')?></textarea>
            </div>
        </div>
        <hr/>
        <div class="row">
            <label class="col-md-3" for="avatar">Avatar</label>
            <div class="col-md-7">
                <input type="file" name="avatar" class="form-control" id="avatar" value="">
            </div>
        </div>
        <input hidden="hidden" name="last_changed" value="<?=date("Y-m-d H:i:s")?>"/>
        <hr/>
        <div class="row">
            <div class="col-md-4 col-md-offset-5">
                <input type="submit" value="Update" class="btn btn-success"/>
            </div>
        </div>
    </form>
</div>