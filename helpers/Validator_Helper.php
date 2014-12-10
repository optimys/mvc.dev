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

    public function __construct(){
        //Load all conditions for login/register/change/etc...
        $this->conditions = require_once('valid_conditions.php');
        $this->formType = explode("/",$_GET['url'])[1];
    }

    public  function checkForm($type){
        $inputCheck = $this->checkInput();
        if($inputCheck === true){
            $formSettings = $this->conditions[$this->formType];
            foreach($formSettings as $field=>$rules){
                foreach($rules as $rule => $ruleValue) {
                    $inputValue = Input_helper::get($type,$field)."<br>";
                    echo "{$field} = {$inputValue} and {$rule}= {$ruleValue}<br>";
                    switch ($rule) {
                        case 'min':
                            ($inputValue < $ruleValue) ? true : $this->setError("Minimum {$ruleValue} for {$field} field");
                            break;
                        case 'max':
                            ($inputValue > $ruleValue) ? true : $this->setError("Maximum {$ruleValue} for {$field} field");
                            break;
                        case 'match':
                            ($inputValue === Input_helper::get($type, $ruleValue)) ? true : $this->setError("{$field} must match {$ruleValue}");
                            break;
                        case 'require':
                            (isset($inputValue)) ? true : $this->setError("{$field} is required");
                            break;
                        case 'unique':
                            $check = Model::exist("users", array($field, "=", $inputValue));
                            ($check) ? true : $this->setError("Value of {$field} must be unique");
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
            return Errors_helper::getBeckGroundParagraph("No data was send", 'danger');
        }
    }

    public  function setError($message){
        $message = Errors_helper::getLabel($message, 'warning');
        $this->error[] = $message;
    }

    public function getError(){
        if(!empty($this->error)){
            return $this->error;
        }else{
            return false;
        }
    }

    public function test(){
        var_dump($this->conditions);
    }
} 