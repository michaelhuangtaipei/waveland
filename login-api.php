<?php
require __DIR__ . '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

if(empty($_POST['email']) or empty($_POST['password'])){
    //一定要設定成空字串，才會掉出警示原本是 ! isset
    $output['error'] = '資料不足';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};
//^^^^^^^^發送設定

$email = strtolower(trim($_POST['email']));
//宣告email限制小寫


//vvvvvvvv資料傳送類型設定
$sql = "SELECT `id`, `email`, `nickname` FROM members WHERE email=? AND password=?";
                                    //SHA1要設定的畫就要打亂碼結構的
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $email,
//  上面宣告email限制小寫後在這邊執行
    $_POST['password'],
]);

$row = $stmt->fetch();

if(! empty($row)){
    $output['success'] = true;
    unset($row['password']);
    $_SESSION['members'] = $row;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
