<div class="col-md-6">
    <form class="navbar-form navbar form-inline" method="post" role="form"
          action="<?= Config_h::get('baseUrl'); ?>user/login">
        <div class="row">
            <div class="input-group input-group-sm">
                <span class="input-group-addon" id="email">
                    <i class="fa fa-save"></i> <input type="checkbox" checked class="checkbox-inline" name="remember" /> Email
                </span>
                <input type="email" class="form-control" name="email" placeholder="Email" aria-describedby="sizing-addon3">
            </div>
            <div class="input-group input-group-sm">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="input-group-btn">
                    <button class="btn btn-success" type="submit">Login</button>
                </span>
            </div>
                <a href="<?=$user->getLoginUrl('facebook');?>">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x"></i>
                    </span>
                </a>
        </div>
    </form>

</div>