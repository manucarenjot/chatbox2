<?php
require_once(dirname(__DIR__) . '/models/Message.php');

$model = new Message();
$sql = $model->selectMessage();

echo json_encode($sql->fetchAll());