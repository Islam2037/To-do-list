<?php
require_once "../App.php";
if($request->checkPost('submit'))
{
    $title=$request->post('title');
    $validation->validate('title',$title,['Required','Str']);
    $errors=$validation->getErrors();
    if($request->exist($errors))
    {
        $session->setSession('errors',$errors);
        $request->header("../index.php");
    }
    else
    {
       $stm= $conn->prepare("INSERT INTO `todo`(`title`) VALUES (:title)");
       $stm->bindParam(":title",$title,PDO::PARAM_STR);
       if($stm->execute())
       {
         $session->setSession('succsess',"inserted is succsessfully");
         $request->header("../index.php");

       }
       else
       {

        $session->setSession('errors',["inserted is failed"]);
        $request->header("../index.php");

       }
        
    }
    
}
else
{
    $request->header("../index.php");
}