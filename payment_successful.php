<?php
$data = json_decode(file_get_contents("php://input"), true);
file_put_contents("payment_logs.txt", print_r($data, true), FILE_APPEND);
?>
