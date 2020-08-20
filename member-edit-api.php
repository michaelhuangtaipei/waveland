<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

if(empty($_POST['name'])){
    $output['error'] = '沒有姓名資料';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
// TODO: 檢查欄位

$mobile = $_POST['mobile'];
$mobile = implode('', explode('-', $mobile));

$sql = "UPDATE `members` SET 
            `name`=?,
            `email`=?,
            `mobile`=?,
            `birthday`=?,
            `gender`=?
             WHERE `id`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $mobile,
        $_POST['birthday'],
        $_POST['gender'],
        $_POST['id'],
]);

if($stmt->rowCount()){
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
