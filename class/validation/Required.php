<?php
namespace Route\TO_DO_LIST\class\validation;
require_once "Validator.php";
use Route\TO_DO_LIST\class\validation\Validator;
class Required implements Validator{
    public function check($key,$value){
        return empty($value)?"$key is required":false;
            
    }

}
