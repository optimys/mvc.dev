<form method="post" action="<?=Config_h::get('baseUrl')?>register/newUser" enctype="multipart/form-data" name="register_new">
            <div class="col-md-6">
                <div class="form-group col-lg-6">
                    <label for="login">Login</label>
                    <input type="" name="login" class="form-control" id="login" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label for="email"> Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label for="password_again">Repeat Password</label>
                    <input type="password" name="password_again" class="form-control" id="password_again" value="">
                </div>


                <div class="form-group col-lg-6">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label for="name">Full name</label>
                    <input type="text" name="name" class="form-control" id="name" value="">
                </div>

                <div class="form-group col-lg-6">
                    <button type="submit" class="btn btn-primary pull-right" id="register">Register</button>
                </div>
            </div>

            <div class="col-md-6">
                <label for="user_info">About you</label>
                <textarea  name="user_info" class="form-control" id="user_info" cols="50" rows="8"></textarea>
            </div>
            <input type="hidden" value="<?=date("Y-m-d H:i:s")?>" name="date_register"/>
</form>
