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
        if(!empty($_POST)) {
            // when user manually login
            $typedEmail = Input_h::get('email');
            $typedPass = Input_h::get('password');
            $remember = Input_h::get('remember');

            $resultObject = $this->get('users', array('email', '=', $typedEmail))->first();
            if ($resultObject) {
                if ($resultObject->password === $typedPass) {
                    Session_h::set('logged', $resultObject->id);
                    $this->loggedIn = true;
                    $this->userDataObject = $resultObject;
                    if ($remember) {
                        $hash = Hash_h::hash();
                        $this->insert('session', array('id' => $this->userDataObject->id, 'hash' => $hash));
                        Cookie_h::setCookie('remember', $hash);
                    }
                    return true;
                }
            }
            Session_h::flash('info', Info_h::getLabel("Login wasted", 'danger'));
            return false;
            //END
        }else{
            $sessionObjects = $this->get('session', array('hash', '=', Cookie_h::getCookie('remember')));
            $sessionObject = $sessionObjects->first();
            Session_h::set("logged",$sessionObject->id);
            $this->loggedIn = true;
        }
    }

    public function logOut(){
        Cookie_h::unSetCookie('remember');
        $this->delete('session',array('id',"=",$this->userDataObject->id));
        session_destroy();
    }

    public function getLogged()
    {
        return ($this->loggedIn) ? true : false;
    }

    public function changePassword()
    {
        if ($this->validatorObject->isValid()) {
            $resultObject = $this->update('users',
                array('password' => Input_h::get('new_password')),
                array('login', '=', $this->userDataObject->login));
            if ($resultObject) {
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