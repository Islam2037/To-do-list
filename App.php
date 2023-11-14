<?php

require_once "class/request.php";
require_once "class/session.php";
require_once "class/validation/Validation.php";


use Route\TO_DO_LIST\class\Request;
use Route\TO_DO_LIST\class\Session;
use Route\TO_DO_LIST\class\validation\Validation;
$request=new Request;
$session=new Session;
$validation=new Validation;
$conn=new PDO("mysql:host=localhost;port=3307;dbname=To_Do_List","root","");
?>



