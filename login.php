<?php
    require_once('app/templater.php');
    $view = new templater('views/login-view.php');
    $view->render();
?>