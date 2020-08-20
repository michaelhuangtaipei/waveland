<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

$sql = "INSERT INTO `group-add`(
        `member_id`, `groupClass-name`, `courseName`, `groupClass-locate`, `groupClass-type`, `group-date`, `group-time`, `group-theme`, `group-type`, `group-message`
) VALUES (?,?,?,?,?,?,?,?,?,?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_SESSION['members']['id'],
    $_POST['groupClass-name'],
    $_POST['courseName'],
    $_POST['groupClass-locate'],
    $_POST['groupClass-type'],
    $_POST['group-date'],
    $_POST['group-time'],
    $_POST['group-theme'],
    $_POST['group-type'],
    $_POST['group-message']
]);

if($stmt->rowCount()){
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
