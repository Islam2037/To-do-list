<?php
namespace Route\TO_DO_LIST\class;
class Session{
    public function __construct()
    {
        session_start();
    }
    public function setSession($key,$value)
    {
        $_SESSION["$key"]=$value;
        
    }
    public function getSession($key)
    {
       return isset($_SESSION["$key"])?$_SESSION["$key"]:null;
        
    }
    public function removeSession($key)
    {
       $_SESSION["$key"]=[];
        
    }
  
   

}