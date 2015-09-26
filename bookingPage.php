<?php
    require_once('app/templater.php');
    $view = new templater('views/bookingPage-view.php');
    $view->render();
?>