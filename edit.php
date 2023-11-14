<?php
require_once 'inc/header.php';
require_once "App.php";
 
if($request->checkGet('id')&&$request->get('id'))
{
    $id=$request->get('id');
    $stm=$conn->prepare("SELECT * FROM todo where id=:id");
    $stm->bindParam(':id',$id);
    if($stm->execute())
    {
        $note=$stm->fetch(PDO::FETCH_ASSOC);
        $title=$note['title'];
        $id=$note['id'];
   
    }
}
else
{
    $request->header("index.php");
}



?>


<body class="container w-50 mt-5">
    <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"><?php  echo $title; ?></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>