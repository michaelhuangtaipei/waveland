<?php
require __DIR__ . '/__connect_db.php';

if (!isset($_SESSION['cart_w'])) {
    $_SESSION['cart_w'] = [];
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$date = isset($_GET['date']) ? $_GET['date'] : '';
$time = isset($_GET['time']) ? $_GET['time'] : '';
$adult_qty = isset($_GET['adult_qty']) ? intval($_GET['adult_qty']) : 0;
$child_qty = isset($_GET['child_qty']) ? intval($_GET['child_qty']) : 0;
$total_price = isset($_GET['total_price']) ? intval($_GET['total_price']) : 0;


$output = [
    'action' => $action,
    'code' => 0,
    'success' => true
];

/*
 * action:
 *   add (加入商品),
 *   remove (移除商品),
 *   empty (清空購物車)
 *   (預設) (查詢內容)
 */

switch ($action) {
    case 'add':
        if (empty($sid)) {
            // 不做任何事
            $output['code'] = 400;
        } else {
            $index = array_search($sid, array_column($_SESSION['cart_w'], 'sid'));
            if ($index === false) {
                // 原本沒有此項目

                $sql = "SELECT `sid`,`name`,`type`,`locate`,`kv_img` FROM `product-test` WHERE `sid`=$sid";
                $row = $pdo->query($sql)->fetch();

                if (empty($row)) {
                    // 找不到那項商品
                    $output['code'] = 240;
                } else {
                    $row['date'] = $date;
                    $row['time'] = $time;
                    $row['adult_qty'] = $adult_qty;
                    $row['child_qty'] = $child_qty;
                    $row['total_price'] = $total_price;
                    $_SESSION['cart_w'][] = $row;
                    $output['code'] = 260;
                }
            } else {
                // 已經有該項目
                $output['code'] = 210;
            }
        }
        break;

    case 'remove':
        $index = array_search($sid, array_column($_SESSION['cart_w'], 'sid'));
        if ($index === false) {
            $output['code'] = 300;
        } else {
            array_splice($_SESSION['cart_w'], $index, 1);
            $output['code'] = 310;
        }

        break;
    case 'empty':
        $_SESSION['cart_w'] = [];
        break;
}
$output['cart_w'] = $_SESSION['cart_w'];
echo json_encode($output, JSON_UNESCAPED_UNICODE);
