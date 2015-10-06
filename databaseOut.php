<?php
    require_once('app/templater.php');
    $view = new templater('views/databaseOut-view.php');
    $view->render();
?>