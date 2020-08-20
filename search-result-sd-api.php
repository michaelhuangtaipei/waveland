<?php
require __DIR__. '/__connect_db.php';
$pageName = 'search-result';

$locate_id= isset($_GET['地區']) ? intval($_GET['地區']) : 3;
$type_id= isset($_GET['項目']) ? intval($_GET['項目']) : 8;
// ---搜尋結果
$where= ' WHERE 1 ';

if(!empty($locate_id)) {
    $where .= " AND `locate_id`=$locate_id ";
}
if(!empty($type_id)) {
    $where .= " AND `type_id`=$type_id ";
}

$sql= "SELECT * FROM `product-test` $where";
$rows = $pdo->query($sql)->fetchAll();

echo json_encode([
        'rows' => $rows
], JSON_UNESCAPED_UNICODE);