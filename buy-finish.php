<?php require __DIR__ . '/__connect_db.php';
$pageName = 'buy-finish';

// 抓到合計總金額
$totalPrice = 0;
foreach ($_SESSION['cart_w'] as $k => $v) {
    $totalPrice += $v['total_price'];
}


// 將表格抓到的資料寫入 orders 資料庫
$sql = "INSERT INTO `orders`(
    `member_id`, `total_amount`, `email`, 
    `phone`, `payment`, `cardNumber`, `month`, 
    `year`, `securityCode`, `taxIDnumber`, 
    `create_at`) VALUES (
        ?, ?, ?,
        ? , ? , ? , ? ,
        ? , ? , ? , NOW())";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_SESSION['members']['id'],
    $totalPrice,
    $_SESSION['orders']['email'],

    $_SESSION['orders']['phone'],
    $_SESSION['orders']['payment'],
    $_SESSION['orders']['cardNumber'],
    $_SESSION['orders']['month'],

    $_SESSION['orders']['year'],
    $_SESSION['orders']['securityCode'],
    $_SESSION['orders']['taxIDnumber'],
    // $_SESSION['orders']['invoiceEmail']
]);

$order_sid = $pdo->lastInsertId();  // 訂單流水號


// 寫入 order_details
$sql2 = "INSERT INTO `order_detail`(`order_sid`, `product_id`, `adult_qty`, `child_qty`, `date`, `time`) VALUES (?,?,?,?,NOW(),?)";
$stmt2 = $pdo->prepare($sql2);

foreach ($_SESSION['cart_w'] as $i) {
    $stmt2->execute([
        $order_sid, $i['sid'], $i['adult_qty'], $i['child_qty'],  $i['time']
    ]);
}

// 清除購物車內容
unset($_SESSION['cart_w']);


?>

<?php include __DIR__ . '/__html_head.php' ?>


<!-- 自己的樣式寫這邊 -->
<!-- 購物車頁面樣式 -->
<link rel="stylesheet" href="css/cart-general.css">
<link rel="stylesheet" href="css/buy-finish.css">
<style>
    @media screen and (max-width:768px) {

        .cart-mobile-h3 {
            font-size: 1.5rem;
        }
</style>

<?php include __DIR__ . '/__navbar.php' ?>

<!-- body內容寫這邊 -->

<!-- 頁面主視覺 -->
<div class="member-kv"><img class="kv-wave" src="img/wave-animate.png" alt=""></div>
<!-- 購物步驟流程圖 -->
<div class="cart-step"><img class="cart-step-img" src="svg/cart-flow-3.svg" alt=""></div>



<main class="webcontainer-page03">
    <!-- 購物車內容（開始） -->
    <div class="cart-list-content d-flex align-items-center flex-column">
        <table class="table table-borderless">
            <img class="cart-mike-greenGogo" src="svg/cart-mike-greenGogo.svg" alt="">
            <h3 class="cart-h3 cart-h3-mikeUP">恭喜您！您已經訂購成功</h3>
            <h3 class="cart-mobile-h3 cart-h3-mikeUP">恭喜您！您已經訂購成功</h3>
        </table>
    </div>
    <!-- 購物車內容（結束） -->
</main>


<!--   內容開始     -->
<aside class="webcontainer-page03 d-flex flex-column cart-mike-BgSize">
    <div class="d-flex flex-row cart-mike-rwd1" data-order_sid="<?= $order_sid; ?>">
        <h5 class="cart-mike-H5title">訂單編號</h5>
        <ul class="cart-mike-Ptitle2">
            <li><?= $order_sid; ?></li>
        </ul>
    </div>
    <!-- <div class="d-flex flex-row cart-mike-rwd2">
            <h5 class="cart-mike-H5title">轉帳資訊</h5>
            <ul class="cart-mike-Ptitle2">
                <li>銀行代碼：013 (國泰世華銀行)</li>
                <li>轉帳帳號：6633-0719-0993-88</li>
                <li>轉帳金額：NTD 450</li>
                <li>繳款期限：2020-07-19 (日) 09:59 AM</li>
            </ul>
        </div> -->
    <div class="d-flex flex-column cart-mike">
        <div>
            <h5 class="cart-mike-H5title">溫馨提醒</h5>
        </div>
        <ul class="cart-mike-Ptitle1">
            <li>
                此轉帳帳號僅限一人一次使用，每筆訂單會有不同轉帳帳號，如果逾時未轉
                帳，此訂單與帳號將失效，需要請您重新購買。
            </li>
            <li>
                當完成轉帳，您不需要回填任何資料，系統將在半小時內自動對帳並寄信通
                知您。若轉帳金額不符或超過期限，您將無法轉帳。
            </li>
            <li>
                我們沒提供郵局與臨櫃匯款服務喔。
            </li>
        </ul>
    </div>

</aside>

<?php include __DIR__ . '/__footer.php' ?>
<?php include __DIR__ . '/__scripts.php' ?>

<!-- 自己的script寫這邊 -->
<script>

</script>

<?php require __DIR__ . '/__html_foot.php' ?>