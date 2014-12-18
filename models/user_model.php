<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:23
 */
class User_model extends Model
{
    private $errors;
    private $loggedIn = false;
    private $userAvatar = 'uploads/users/pictures/avatar/';
    public function __construct()
    {
        parent::__construct();
        $this->errors = new Validator_Helper();
    }

    /**
     * To do
     * Need add file type and size checking for avatar
     * Need add hashing password
     * Need add if inserting is false
     */
    public function newUser()
    {
        if (isset($_FILES['avatar'])) {
            $this->userAvatar .= Input_helper::get($_POST,'login').'_avatar.jpeg';
            copy($_FILES['avatar']['tmp_name'], $this->userAvatar);
        }else{
            $this->userAvatar .="default_avatar.jpeg";
        }
        $this->insert('users', array(
            'login' => Input_helper::get($_POST, 'login'),
            'password' => Input_helper::get($_POST, 'password'),
            'email' => Input_helper::get($_POST, 'email'),
            'avatar_url'=>$this->userAvatar,
            'user_info'=>Input_helper::get($_POST, 'about')
        ));
    }

    public function getErrors()
    {
        return $this->errors->getError();
    }

    public function login()
    {
        $result = $this->get('users', array('email', '=', Input_helper::get($_POST, 'email')))->first();
        if ($result) {
            if ($result['password'] === Input_helper::get($_POST, 'password')) {
                Session_helper::set('logged', $result);
                $this->loggedIn = true;
                return;
            }
        }
        $this->loggedIn = false;
        Session_helper::set('errors', Info_helper::getLabel("Login wasted", 'danger'));
        return;
    }

    public function getLogged()
    {
        return $this->loggedIn;
    }

    public function changePassword(){
        //Need add check for if result is false
        $result = $this->update('users',
            array('password'=>Input_helper::get($_POST,'new_password')),
            array('login', '=', Session_helper::get('logged')['login']));
    }


}