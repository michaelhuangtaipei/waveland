<?php
require __DIR__. '/__connect_db.php';


// 從api收到資料，定轉為session
$_SESSION['orders'] = $_POST;


$output['orders'] = $_SESSION['orders'];
echo json_encode($output, JSON_UNESCAPED_UNICODE);


