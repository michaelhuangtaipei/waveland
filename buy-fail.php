<?php require __DIR__. '/__connect_db.php';
$pageName = 'buy-fail ';
?>

<?php include __DIR__. '/__html_head.php' ?>


<!-- 自己的樣式寫這邊 --><!-- 購物車頁面樣式 -->
<link rel="stylesheet" href="css/cart-general.css">
<link rel="stylesheet" href="css/buy-finish.css">

<style>

</style>

<?php include __DIR__. '/__navbar.php' ?>

<!-- body內容寫這邊 -->
    <!-- 頁面主視覺 -->
    <div class="member-kv"><img class="kv-wave" src="img/wave-animate.png" alt=""></div>
    <!-- 購物步驟流程圖 -->
<!--    <div class="cart-step"><img class="cart-step-img" src="svg/cart-flow-3.svg" alt=""></div>-->


    <main class="webcontainer-page03">
        <!-- 購物車內容（開始） -->
        <div class="cart-list-content d-flex align-items-center flex-column">
            <table class="table table-borderless">
                <img class="cart-mike-greenGogo" src="svg/cart-mike-redChaCha.svg" alt="">
                <h3 class="cart-h3 cart-h3-mikeUP-Cha">付款失敗</h3>
                <h3 class="cart-mobile-h3-Cha cart-h3-mikeUP-Cha">付款失敗</h3>
            </table>
        </div>
        <!-- 購物車內容（結束） -->
    </main>

    <!--   內容開始     -->
    <aside class="webcontainer-page03 d-flex flex-column cart-mike-BgSize">
        <div class="d-flex flex-row cart-mike-rwd1">
            <div class="cart-mike-Ptitle3">
                <li>
                    很抱歉，本次交易付款失敗！<br>
                    請前往會員中心的【訂單管理】選擇該筆訂單再次付款。
                </li>
            </div>
        </div>
    </aside>


<?php include __DIR__. '/__footer.php' ?>
<?php include __DIR__. '/__scripts.php' ?>

<!-- 自己的script寫這邊 -->
<script>

</script>

<?php require __DIR__. '/__html_foot.php'?>