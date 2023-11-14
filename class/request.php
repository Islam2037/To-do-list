<?php
namespace Route\TO_DO_LIST\class;
class Request{
    public function checkGet($key)
    {
        return isset($_GET["$key"])?True:false;
    }
    public function get($key)
    {
        return $_GET["$key"];
    }
    public function checkPost($key)
    {
        return isset($_POST["$key"])?True:false;
    }
    public function post($key)
    {
        return $_POST["$key"];
    }
    public function exist($value)
    {
        return !empty($value)?true:false;
    }
    public function header($path)
    {
        return header("location:$path");
    }
    

}