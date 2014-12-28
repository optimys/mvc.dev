<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:28
 */

class Validator_h {
    private $error = array();
    private $conditions =array();
    private $formType;
    private $dbRequest;

    public function __construct(){
        //Load all conditions for login/register/change/etc...
        $this->conditions = require_once('validForm_h.php');
        $this->formType = explode("/",$_GET['url'])[1];
        $this->dbRequest = new Model();
    }

    /**
     * @param $type
     * @return array
     * TO DO: need to add "check compare" for input field data with data that stores in DB
     */
    private  function checkForm($type){
        if($this->checkInput($type)){
            $formSettings = $this->conditions[$this->formType];
            foreach($formSettings as $field => $rules){
                foreach($rules as $rule => $ruleValue) {
                    $inputValue = Input_h::get($field);
                    switch ($rule) {
                        case 'min':
                            (strlen($inputValue) < $ruleValue) ? $this->setError("Minimum {$ruleValue} for {$field} field") : true;
                            break;
                        case 'max':
                            (strlen($inputValue) > $ruleValue) ? $this->setError("Maximum {$ruleValue} for {$field} field") : true ;
                            break;
                        case 'match':
                            ($inputValue === Input_h::get($ruleValue)) ? true : $this->setError("{$field} must match {$ruleValue}");
                            break;
                        case 'require':
                            ($ruleValue && empty($inputValue)) ? $this->setError("{$field} is required {$inputValue}") : true;
                            break;
                        case 'unique':
                            $check = $this->dbRequest->get("users", array($field, "=", $inputValue))->first();
                            ($check) ? $this->setError("Value of {$field} must be unique") : true ;
                            break;
                        case 'helper':
                            unset($_POST[$field]);
                            break;
                        default:
                            break;
                    }
                }
            }

        }else{
            $this->setError("no data was send");
        }
        return $this->error;
    }

    /**
     * Check if button "submit" was pressed, and not just through type "http://mvc.dev/register/newuser"
     *
     * @return bool|string
     */
    private function checkInput($type){
        return empty($type) ? false : true;
    }

    private  function setError($message){
        $message = Info_h::getLabel($message, 'warning');
        $this->error[] = $message;
    }

    public function getError(){
        return $this->error;
    }

    public function isValid(){
        $this->checkForm($_POST);
        if (empty($this->error)){
            return true;
        }
        Session_h::set('info', $this->error);
        //dump(Session_h::get('info'));
        return false;
    }

} 