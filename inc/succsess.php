<?php
if ($request->exist($session->getSession('succsess'))) {
?>
    <div class=" alert-success col-md-4 p-2 m-2 text-center"><?php echo $session->getSession('succsess');
     $session->removeSession('succsess'); ?></div>
<?php

}
?>