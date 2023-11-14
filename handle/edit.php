<?php
require_once "../App.php";
if($request->checkPost('submit') && $request->checkGet('id'))
{
    $id=$request->get('id');
    $title=$request->post('title');
    $stm=$conn->prepare("SELECT * from `todo` where id=:id ");
   $stm->bindParam(':id',$id);
  $stm->execute();
   if($stm->rowCount()==1)
   {
    $stm=$conn->prepare("UPDATE `todo` set title=:title where id=:id");
   $stm->bindParam(':title',$title);
   $stm->bindParam(':id',$id);
   if($stm->execute())
   {
    $session->setSession('succsess','update is succsessfully');
    $request->header("../index.php");
   }
   else
   {
    $session->setSession('errors',['update is failed']);
    $request->header("../index.php");
   }

   }
   else
   {
    $session->setSession('errors',['update is failed']);
    $request->header("../index.php");

   }
   
}
else
{
    $request->header("../index.php");
}
