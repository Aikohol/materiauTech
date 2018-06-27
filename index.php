<?php
session_start();

include_once 'router/CheckViews.php';
include_once 'model/models.php';
include_once 'view/views.php';

$view = new View();
$model = new Model();
// $controler = new Controler();

My_Router::Index_Check($view, $model);

?>
