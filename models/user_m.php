<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:23
 */
class User_m extends Model
{
    private $validatorObject;
    private $loggedIn = false;
    private $userAvatar = 'uploads/users/pictures/avatar/';
    public function __construct()
    {
        parent::__construct();
        $this->validatorObject = new Validator_H();
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
            $this->userAvatar .= Input_h::get($_POST,'login').'_avatar.jpeg';
            copy($_FILES['avatar']['tmp_name'], $this->userAvatar);
        }else{
            $this->userAvatar .="default_avatar.jpeg";
        }
        $this->insert('users', array(
            'login' => Input_h::get($_POST, 'login'),
            'password' => Input_h::get($_POST, 'password'),
            'email' => Input_h::get($_POST, 'email'),
            'avatar_url'=>$this->userAvatar,
            'user_info'=>Input_h::get($_POST, 'about')
        ));
    }

    public function updateUserInfo(){
        if (isset($_FILES['avatar'])) {
            $this->userAvatar .= $this->get('users',array('id','=',Session_h::get('id')));
            copy($_FILES['avatar']['tmp_name'], $this->userAvatar);
        }
        $fieldsToChange=array();
        //To do: Check if No data was input!
        $this->update('users', array(
            'name' => Input_h::get($_POST, 'name'),
            'avatar_url'=>$this->userAvatar,
            'user_info'=>Input_h::get($_POST, 'about')
        ),array('login','=',Session_h::get('logged')['login']));
    }

    public function getErrors()
    {
        return $this->validatorObject->getError();
    }

    public function login()
    {
        $result = $this->get('users', array('email', '=', Input_h::get($_POST, 'email')))->first();
        if ($result) {
            if ($result['password'] === Input_h::get($_POST, 'password')) {
                Session_h::set('logged', $result);
                $this->loggedIn = true;
                return;
            }
        }
        $this->loggedIn = false;
        Session_h::set('errors', Info_h::getLabel("Login wasted", 'danger'));
        return;
    }

    public function getLogged()
    {
        return $this->loggedIn;
    }

    public function changePassword(){
        //Need add check for if result is false
        $result = $this->update('users',
            array('password'=>Input_h::get($_POST,'new_password')),
            array('login', '=', Session_h::get('logged')['login']));
    }


}