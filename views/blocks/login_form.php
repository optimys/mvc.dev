<div class="col-md-5">
    <form class="navbar-form navbar-right" method="post" role="form" action="<?=Config_h::get('baseUrl');?>user/login">
        <div class="form-group input-group-sm">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group input-group-sm">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-default btn-sm">Sign In</button>
    </form>
</div>