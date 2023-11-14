<?php
require_once "../App.php";
if($request->checkGet('id') && $request->checkGet('status'))
{
    $id=$request->get('id');
    $status=$request->get('status');
    $stm=$conn->prepare("SELECT * from `todo` where id=:id ");
   $stm->bindParam(':id',$id);
  $stm->execute();
   if($stm->rowCount()==1)
   {
    $stm=$conn->prepare("UPDATE `todo` set `status`=:statu where id=:id");
   $stm->bindParam(':statu',$status);
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
