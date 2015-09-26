<?php
    require_once('app/templater.php');
    $view = new templater('views/schedule-view.php');
    $view->render();
?>