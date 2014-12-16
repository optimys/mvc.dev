<form method="post" action="<?=$data['baseUrl']?>register/newUser" enctype="multipart/form-data" name="register_new">
            <div class="col-md-6">
                <h3>Registration</h3>

                <div class="form-group col-lg-6">
                    <label for="login">Username</label>
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
                    <label class="col-md-12" for="register">Complete</label>
                    <button type="submit" class="btn btn-primary pull-right" id="register">Register</button>
                </div>
            </div>

            <div class="col-md-6">
                <h3 class="dark-grey">About you</h3>
                <textarea type="text" name="about" class="form-control" id="about" cols="50" rows="9"></textarea>
            </div>
</form>
