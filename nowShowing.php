<?php
    require_once('app/templater.php');
    $view = new templater('views/nowShowing-view.php');
    $view->render();
?>