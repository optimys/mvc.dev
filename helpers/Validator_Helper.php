<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:28
 */

class Validator_Helper {
    private $error = array();
    private $conditions =array();
    private $formType;
    private $dbRequest;

    public function __construct(){
        //Load all conditions for login/register/change/etc...
        $this->conditions = require_once('valid_conditions.php');
        $this->formType = explode("/",$_GET['url'])[1];
        $this->dbRequest = new Model();
        $this->checkForm($_POST);
    }

    private  function checkForm($type){
        if($this->checkInput()){
            $formSettings = $this->conditions[$this->formType];
            foreach($formSettings as $field => $rules){
                foreach($rules as $rule => $ruleValue) {
                    $inputValue = Input_helper::get($type,$field);
                    switch ($rule) {
                        case 'min':
                            (strlen($inputValue) < $ruleValue) ? $this->setError("Minimum {$ruleValue} for {$field} field") : true;
                            break;
                        case 'max':
                            (strlen($inputValue) > $ruleValue) ? $this->setError("Maximum {$ruleValue} for {$field} field") : true ;
                            break;
                        case 'match':
                            ($inputValue === Input_helper::get($type, $ruleValue)) ? true : $this->setError("{$field} must match {$ruleValue}");
                            break;
                        case 'require':
                            ($ruleValue && empty($inputValue)) ? $this->setError("{$field} is required") : true;
                            break;
                        case 'unique':
                            $check = $this->dbRequest->get("users", array($field, "=", $inputValue))->first();
                            ($check) ? $this->setError("Value of {$field} must be unique") : true ;
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
    private function checkInput(){
        if(!empty($_POST )){
            return true;
        }else{
            return false;
        }
    }

    private  function setError($message){
        $message = Info_helper::getLabel($message, 'warning');
        $this->error[] = $message;
    }

    public function getError(){
        if(!empty($this->error)){
            return $this->error;
        }else{
            return false;
        }
    }

} 