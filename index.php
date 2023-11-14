<?php 
require_once 'inc/header.php';
require_once 'App.php';

?>
<body>
    
    <div class="container my-3 ">    
   
        <div class="row d-flex justify-content-center">
            <?php require_once "inc/errors.php" ; require_once "inc/succsess.php" ?>
          

             
             
                <div class="container mb-5 d-flex justify-content-center">
               
               
                    <div class="col-md-4">
                        <form action="handle/addToDo.php" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Add To Do</button>
                        </div>
                        </form>
                    </div>
                </div>
               

        </div>
        <div class="row d-flex justify-content-between">   
            <!-- all -->
            <div class="col-md-3 "> 

                <h4 class="text-white">All Notes</h4>
                <?php
            
                $conn=new PDO("mysql:host=localhost;port=3307;dbname=To_Do_List","root","");
                $run_query=$conn->query("SELECT * from `todo` where `status`='all' ORDER BY id desc  ");
                if($run_query->execute())
                {
                    $all=$run_query->fetchAll(PDO::FETCH_ASSOC);
                    // print_r($all);
                }




                ?>

                
                <div class="m-2  py-3">
                    <div class="show-to-do">
                       <?php
                       if($request->exist($all))
                       {
                        foreach($all as $note)
                        {
                            ?>
                             <div class="alert alert-info p-2">
                                <h4 ><?php echo $note['title'] ?></h4>
                                <h5><?php echo $note['created_at'] ?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="edit.php?id=<?php echo $note['id'] ?>"class="btn btn-info p-1 text-white" >edit</a>
                                   
                                    <a href="handle/goto.php?id=<?php echo $note['id'] ?>&status=doing"class="btn btn-info p-1 text-white" >doing</a>
                                </div>
                            
                        </div>



                            <?php

                        }
                       
                       }
                       else 
                       {
                        ?>
                          <div class="item">
                                <div class="alert-info text-center ">
                                 empty to do
                                </div>
                            </div>

                        <?php
                       }
                       ?>
                          
                    
                       
                    </div>
                </div>

            </div>

            <!-- doing -->
            <div class="col-md-3 ">
            
                <h4 class="text-white">Doing</h4>
                <?php
                $run_query=$conn->query("SELECT * from `todo` where `status`='doing' ");
                if($run_query->execute())
                {
                    $alldonig=$run_query->fetchAll(PDO::FETCH_ASSOC);
                }
                ?>

                
                <div class="m-2 py-3">
                    <div class="show-to-do">

                    <?php
                    if($request->exist($alldonig))
                    {
                        foreach($alldonig as $doing)
                        {
                            ?>
                                <div class="alert alert-success p-2">
                                <h4 ><?php echo $doing['title'] ?></h4>
                                <h5><?php echo $doing['created_at'] ?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                <a></a>
                                <a href="handle/goto.php?id=<?php echo $doing['id'] ?>&status=done"class="btn btn-success p-1 text-white" >Done</a>
                                </div>
                            
                        </div>

                            <?php
                            
                        }
                    }
                    else
                    {
                        ?>


                        <div class="item">
                                <div class="alert-success text-center ">
                                 empty to do
                                </div>
                            </div>



                        <?php
                        
                    }
                    ?>

                   
                           
                    

                    </div>
                </div>
            
            </div>
           
            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>
                <?php
                $run_query=$conn->query("SELECT * from `todo` where `status`='done' ");
                if($run_query->execute())
                {
                    $alldone=$run_query->fetchAll();
                }
                ?>

                <div class="m-2 py-3">
                    <div class="show-to-do">

                    <?php
                    if($request->exist($alldone))
                    {
                        foreach($alldone as $done)
                        {
                            ?>
                                 <div class="alert alert-warning p-2">
                            <a href="handle/delete.php?id=<?php echo $done['id'] ?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end "><i class="fa fa-close" style="font-size:16px;"></i></a>
                                                                                            
                                <h4 ><?php echo $done['title'] ?></h4>
                               <h5><?php echo $done['created_at'] ?></h5>
                               
                            
                        </div>
                            
                      

                            <?php
                            
                        }
                    }
                    else
                    {
                        ?>


                        <div class="item">
                                <div class="alert-warning text-center ">
                                 empty to do
                                </div>
                            </div>
                            </div>


                        <?php
                        
                    }
                    ?>

                            
                    
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>