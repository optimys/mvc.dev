<form method="post" action="<?=$baseUrl?>user/change_password/change" name="new_pass">
    <div class="col-md-6">
        <h3>New password</h3>

        <div class="form-group col-lg-7">
            <label for="old_password">Old password</label>
            <input type="password" name="old_password" class="form-control" id="old_password" value="">
        </div>

        <div class="form-group col-lg-7">
            <label for="new_password"> New password</label>
            <input type="password" name="new_password" class="form-control" id="new_password" value="">
        </div>

        <div class="form-group col-lg-7">
            <label for="new_password_again">New password again</label>
            <input type="password" name="new_password_again" class="form-control" id="new_password_again" value="">
        </div>

        <div class="form-group col-lg-7">
            <button type="submit" class="btn btn-primary pull-right" id="register">Change</button>
        </div>
    </div>
</form>