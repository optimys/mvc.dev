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
    private $userDataObject;

    public function __construct()
    {
        parent::__construct();
        if (Session_h::exist('logged')) {
            $this->userDataObject = $this->get('users', array('id', '=', Session_h::get('logged')))->first();
            $this->loggedIn = true;
        }
        $this->validatorObject = new Validator_h();
    }

    /**
     * To do
     * Need add file type and size checking for avatar
     * Need add hashing password
     * Need add if inserting is false
     */
    public function newUser()
    {
        $validatorObject = new Validator_H();
        if ($validatorObject->isValid()) {
            $this->insert('users', array(
                'login' => Input_h::get('login'),
                'password' => Input_h::get('password'),
                'email' => Input_h::get('email'),
                'avatar_url' => FileUpload_m::getPathToFile('avatar'),
                'user_info' => Input_h::get('about')
            ));
            Session_h::set('success', Info_h::getLabel("You registered success!", "success"));
            return true;
        } else {
            Session_h::set('errors', $validatorObject->getError());
            return false;
        }
    }

    public function updateUserInfo()
    {
        if (isset($_FILES['avatar'])) {
            $this->userAvatar .= $this->get('users', array('id', '=', Session_h::get('id')));
            copy($_FILES['avatar']['tmp_name'], $this->userAvatar);
        }
        //To do: Check if No data was input!
        $this->update('users', array(
            'name' => Input_h::get('name'),
            'avatar_url' => $this->userAvatar,
            'user_info' => Input_h::get('about')
        ), array('login', '=', Session_h::get('logged')['login']));
    }

    public function login()
    {
        $typedEmail = Input_h::get('email');
        $typedPass = Input_h::get('password');

        $result = $this->get('users', array('email', '=', $typedEmail))->first();
        if ($result) {
            if ($result->password === $typedPass) {
                Session_h::set('logged', $result->id);
                $this->loggedIn = true;
                $this->userDataObject = $result;
                return;
            }
        }
        Session_h::set('errors', Info_h::getLabel("Login wasted", 'danger'));
        return;
    }

    public function getLogged()
    {
        return ($this->loggedIn) ? true : false;
    }

    public function changePassword()
    {
        if ($this->validatorObject->isValid()) {
            $result = $this->update('users',
                array('password' => Input_h::get('new_password')),
                array('login', '=', $this->userDataObject->login));
            if ($result) {
                $this->setFlash("Password Changed", "success");
                return true;
            } else {
                $this->setFlash('Update password wasted');
            }
        } else {
            Session_h::set('errors', $this->validatorObject->getError());
        }
        return false;
    }

    public function getInfo($field)
    {

//        if(property_exists($this->userDataObject, $this->userDataObject->$field)){
//            return $this->allData->$field;
//        }else{
//            echo "Wrong parameter!";
//        }
//        return false;
        return $this->userDataObject->$field;
    }

    private function setFlash($text, $level = "danger")
    {
        Session_h::set('errors', Info_h::getLabel($text, $level));
    }

}