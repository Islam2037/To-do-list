<?php
namespace Route\TO_DO_LIST\class\validation;
require_once "Validator.php";
use Route\TO_DO_LIST\class\validation\Validator;
class Str implements Validator{
    public function check($key,$value){
        return is_numeric($value)?"$key must be string":false;
            
    }

}