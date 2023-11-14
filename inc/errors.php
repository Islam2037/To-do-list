<?php
if ($request->exist($session->getSession('errors'))) {
    foreach ($session->getSession('errors') as $error) {

?>
        <div class=" alert-danger col-md-4 p-2 m-2 text-center"><?php echo $error;
         $session->removeSession('errors'); ?></div>
<?php

    }
}
?>