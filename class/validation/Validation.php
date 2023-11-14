<?php
namespace Route\TO_DO_LIST\class\validation;
require_once "Required.php";
require_once "Str.php";
class Validation{
    private $errors=[];
    public function validate($key,$value,$rules)
    {
        foreach ($rules as $rule)
        {
            $rule='Route\TO_DO_LIST\class\validation\\'.$rule;
            $object=new $rule;
            $error=$object->check($key,$value);
            if($error!=false)
            {
                $this->errors[]=$error;
            }
        }

    }
    public function getErrors()
    {
        return $this->errors;
    }

}