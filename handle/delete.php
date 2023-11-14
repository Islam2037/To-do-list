<?php
require_once "../App.php";
if($request->checkGet('id'))
{
    $id=$request->get('id');
    $stm=$conn->prepare("SELECT * from `todo` where id=:id ");
   $stm->bindParam(':id',$id);
  $stm->execute();
   if($stm->rowCount()==1)
   {
    $stm=$conn->prepare("DELETE FROM `todo` where id=:id");
   $stm->bindParam(':id',$id);
   if($stm->execute())
   {
    $session->setSession('succsess','Delete is succsessfully');
    $request->header("../index.php");
   }
   else
   {
    $session->setSession('errors',['Delete is failed']);
    $request->header("../index.php");
   }

   }
   else
   {
    $session->setSession('errors',['Delete is failed']);
    $request->header("../index.php");

   }
   
}
else
{
    $request->header("../index.php");
}