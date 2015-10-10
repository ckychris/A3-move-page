<?php
    require_once('app/templater.php');
    $view = new templater('views/databaseOut-View.php');
    $view->render();
?>