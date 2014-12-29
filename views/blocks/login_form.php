<div class="col-md-5">
    <form class="navbar-form navbar-right" method="post" role="form"
          action="<?= Config_h::get('baseUrl'); ?>user/login">
        <div class="form-group input-group-sm col-sm-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group input-group-sm col-sm-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group input-group-sm col-sm-6">
            <label for="remember">Remember</label>
            <input type="checkbox" checked class="" name="remember" placeholder="Password">
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-default btn-sm">Sign In</button>
        </div>
    </form>
</div>