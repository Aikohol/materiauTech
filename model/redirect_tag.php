<?php
include 'models.php';
$tag = $_POST['tag'];
header('Content-Type: application/json');
echo json_encode(Model::TagVerif($tag));
?>
