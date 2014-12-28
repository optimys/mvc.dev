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
        if ($this->validatorObject->isValid()) {
            $this->insert('users', $this->getFilled());
            Session_h::flash('info', Info_h::getLabel("You registered success!", "success"));
            return true;
        }
        return false;
    }

    public function updateUserInfo()
    {
        if ($this->validatorObject->isValid()) {
            $this->update('users', $this->getFilled(), array('id', '=', Session_h::get('logged')));
            Session_h::flash('info', Info_h::getLabel('Info has been updated', 'info'));
            return true;
        }
        return false;
    }

    private function getFilled()
    {
        $filled = array();
        foreach ($_POST as $key => $value) {
            if (!empty($value)) {
                $filled[$key] = $value;
            }
        }
        if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            $filled["avatar_url"] = FileUpload_m::getPathToAvatar('avatar');
        }
        return $filled;

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
                return true;
            }
        }
        Session_h::flash('info', Info_h::getLabel("Login wasted", 'danger'));
        return false;
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
                Session_h::flash("info", "Password Changed");
                return true;
            } else {
                Session_h::flash('info', "Update password wasted");
            }
        }
        return false;
    }

    public function getInfo($field)
    {
        if (!is_null($this->userDataObject->$field)) {
            return $this->userDataObject->$field;
        } else {
            echo "no data";
        }
        return false;
    }


}