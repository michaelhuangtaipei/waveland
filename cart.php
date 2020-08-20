<?php require __DIR__ . '/__connect_db.php';
$pageName = 'cart';

?>

<?php include __DIR__ . '/__html_head.php' ?>

<!-- 自己的樣式寫這邊 -->
<!-- 購物車頁面樣式 -->
<link rel="stylesheet" href="css/cart-general.css">
<link rel="stylesheet" href="css/cart.css">

<style>
    /* ----------多數人推薦商品小卡 card3---------- */
    .ad-4 {
        width: 100%;
        height: 800px;
        position: relative;
    }

    .ad-4 .h1-bg {
        background: url("svg/svg-h2-3.svg") center center no-repeat;
        padding-bottom: 50px;
    }

    .ad-4 .list-wrapper-big {
        background: url(svg/svg-bg-string.svg)center top;
        background-size: cover;
        margin: 0 auto;
        padding-bottom: 100px;
    }

    .ad-4 .webcontainer {
        max-width: 1024px;
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    @media screen and (max-width:800px) {
        .ad-4 {
            padding: 40px 0;
        }

        .ad-4 .h1-bg {
            background: #DFF1FB;
            margin-bottom: 0;
        }

        .ad-4 .webcontainer {
            padding: 0 15px;
        }

    }

    .card3 {
        max-width: 328px;
        width: 33%;
        background-color: white;
        margin-bottom: 20px;
        box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.16);
        transition: all 0.4s ease-in-out;
    }

    .card3:hover {
        transform: translate(0, -10px);
        box-shadow: 0 5px 15px #e5e5e5;
    }

    .card3Top {
        width: 100%;
        height: 219px;
        background: url("img/public-product-1.jpg") center center no-repeat;
        background-size: cover;
    }

    .card3Top02 {
        background: url("img/1-fake-1.jpg") center center no-repeat;
        background-size: cover;
    }

    .card3Top03 {
        background: url("img/3-fake-1.jpg") center center no-repeat;
        background-size: cover;
    }



    .card3Down {
        width: 100%;
        padding: 20px;
    }

    .card3DownBox {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .card3title {
        font-size: 18px;
        font-weight: 100;
        width: 100%;
    }

    .card3IntroText p {
        padding-top: 15px;
        font-size: 12px;
        text-align: left;
        color: #707070;
        font-weight: 100;
    }

    .card3IntroIcon {
        display: flex;
        flex-direction: column;
        font-size: 12px;
        max-width: 300px;
    }

    .card3Icon {
        display: flex;
        color: #707070;
        padding-top: 6px;
        padding-right: 30px;
    }

    .card3Icon img {
        margin-right: 8px;
    }

    .card3Price {
        display: flex;
        align-items: center;
    }

    .card3Price p {
        color: #043F98;
        font-size: 12px;
        font-weight: normal;
        line-height: 1.5;
        text-align: end;
    }

    .card3Price .price {
        font-size: 18px;
        font-weight: bold;
        margin-left: 5px;
    }

    @media screen and (max-width:800px) {
        .card3 {
            width: 100%;
            max-width: 800px;
            margin: 0 auto 15px;
            display: flex;
            min-height: 140px;
        }

        .card3_date_GroupGo .card3mon {
            font-size: 12px;
            line-height: 1.5;
        }

        .card3_date_GroupGo .card3date {
            margin-bottom: 5px;
            letter-spacing: 0.6px;
            line-height: 0.56;
            font-size: 18px;
            font-weight: 900;
        }

        .card3Top {
            width: 35%;
            height: 100%;
            min-width: 140px;
        }

        .card3Down {
            width: 70%;
            padding: 10px;
        }

        .card3DownBox {
            width: 100%;
            height: 100%;
            justify-content: space-between;
        }

        .card3title {
            font-size: 16px;
            font-weight: 100;
        }

        .card3name p {
            margin: auto auto;
        }

        .card3IntroText p {
            line-height: 1.5rem;
            color: #3f464d;
            font-size: 12px;
            padding-top: 6px;
        }

        .card3IntroIcon {
            flex-direction: row;
            flex-wrap: wrap;
            max-width: 260px;
        }

        .card3IntroIcon img {
            margin-right: 5px;
        }

        .card3IntroIcon p {
            font-size: 12px;
            color: #3f464d;
            line-height: 1.5;
        }

        .card3Price {
            font-size: 14px;
            font-weight: normal;
            align-self: flex-end;
        }

        .card3Price .price {
            font-size: 20px;
            font-weight: bold;
            margin-left: 5px;
            line-height: 1.5;
        }
    }

    .priceNheart {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .cls-1 {
        fill: none;
        stroke: #afafaf;
        stroke-miterlimit: 10;
    }

    .Heart:hover .cls-1 {
        fill: indianred;
        stroke: none;
    }

    /* --------------------------------------------- */


    /* ----------購物清單頁 card7 商品長卡---------- */
    .card7 {
        display: flex;
        max-width: 957px;
        max-height: 230px;
        box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.16);
        background-color: white;
    }

    .card7Left {
        width: 474px;
        height: 230px;
        /* background-image: url("img/public-product-8.jpg"); */
    }

    .card7Left img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card7Right {
        border-bottom: 7px solid #043F98;
        width: 550px;
        height: 230px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
    }

    .card7CG {
        width: 500px;
        justify-content: flex-end;
        display: flex;
        align-items: center;
    }

    .card7heart {
        margin-right: 20px;
    }

    .card7heart svg,
    .card7heart-img {
        height: 25px;
    }

    .card7-cls-1 {
        fill: none;
        stroke: #043f98;
        stroke-miterlimit: 10;
    }

    .card7heart:hover .card7-cls-1 {
        fill: indianred;
        stroke: none;
    }

    .card7RightBox {
        max-width: 500px;
        max-height: 400px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: space-around;
    }

    .card7name p {
        margin-top: 20px;
        font-size: 18px;
        font-weight: 100;
        line-height: 1.11;
        color: #262626;
        margin-left: 38px;
    }

    .card7IntroIconALL {
        display: flex;
        flex-direction: column;
        margin-top: 23px;
        margin-left: 40px;
    }

    .card7Icon {
        display: flex;
        color: #262626;
        margin-right: 14px;
        line-height: 1.67;
    }

    .card7IntroIconRow1 {
        display: flex;
    }

    .card7IntroIconRow1 p,
    .card7IntroIconRow2 p,
    .card7People p {
        font-size: 12px;
        line-height: 2;
        font-weight: 100;
    }

    .card7Place {
        margin-right: 25px;
    }

    .card7Icon img {
        margin-right: 8px;
    }

    .card7IntroIconRow2 {
        display: flex;
        font-size: 12px;
        line-height: 1.67;
        font-weight: 100;
    }

    .card7Price {
        width: 500px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-top: 15px;
    }

    .card7Price p {
        color: #043F98;
        font-size: 12px;
        font-weight: 500;
        line-height: 1.5;
        text-align: center;
    }

    .card7Price .price {
        font-size: 18px;
        font-weight: bold;
        margin-left: 5px;
    }


    @media screen and (max-width:375px) {
        .card7 {
            width: 375px;
            height: 114px;
            display: flex;
        }

        .card7Left {
            width: 120px;
            height: 120px;
            background-position: center;
            background-size: cover;
        }

        .card7Right {
            width: 255px;
            height: 120px;
            position: relative;
        }

        .card7RightBox {
            max-width: 255px;
            max-height: 120px;
        }

        .card7CG {
            width: 255px;
            height: 16px;
            justify-content: flex-end;
            align-items: center;
            order: 10;
            z-index: 5;
            position: absolute;
            bottom: 9%;
            right: 9%;
        }

        .card7heart svg {
            height: 17px;
            margin-bottom: 3px;
        }

        .card7heart svg,
        img {
            height: 17px;
        }

        .card7name p {
            font-size: 14px;
            margin: 12px 0 0 15px;
        }

        .card7IntroIconALL {
            flex-direction: row;
            margin-top: 7px;
            margin-left: 17px;
            font-size: 12px;
        }

        .card7Date img {
            margin-top: 3px;
        }

        .card7Place,
        .card7Time {
            display: none;
        }

        .card7Price {
            width: 255px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-top: 15px;

        }

        .card7Price p {
            color: #043F98;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.5;
            text-align: center;
            margin-left: 15px;
            margin-right: 6px;
        }

        .card7Price .price {
            font-size: 18px;
            font-weight: bold;
            margin-left: 5px;
        }

    }

    /* --------------------------------------------- */


    /* ----------cart.php頁面樣式更改---------- */
    .cart-p1 {
        margin: 60px auto 0;
        text-align: center;
        font-size: 2.25rem;
        color: #AFAFAF;
    }

    .cart-return-btn,
    .cart-return-btn2 {
        font-size: 1.5rem;
        color: #AFAFAF;
    }

    .cart-return-btn:hover,
    .cart-return-btn2:hover {
        color: #043f98;
        text-decoration: none;
    }

    .cart-Btn {
        display: block;
        margin: 60px auto;
    }

    /* 折扣碼送出按鈕 */

    .cart-discount-btn {
        padding: 5px 15px;
        background-color: #043f98;
        color: #fff;
        text-decoration: none;
        font-size: 0.875rem;
        border: 1px solid #043f98;
    }

    .cart-discount-btn:hover {
        background-color: #ffffff;
        color: #043f98;
        text-decoration: none;
        border: 1px solid #043f98;
    }


    @media screen and (max-width:768px) {
        .member-kv .kv-wave {
            bottom: -20px;
        }
    }



    /* --------------------------------------------- */
</style>


<?php include __DIR__ . '/__navbar.php' ?>

<!-- body內容寫這邊 -->
<!-- 頁面主視覺 -->
<div class="member-kv"><img class="kv-wave" src="img/wave-animate.png" alt=""></div>

<!-- 購物步驟流程圖 -->
<div class="cart-step"><img class="cart-step-img" src="svg/cart-flow-1.svg" alt=""></div>

<!-- 購物車內容（開始） -->
<main class="webcontainer-page02">

    <!-- 手機版標題 -->
    <h3 class="mobile-h3">購物車</h3>


    <!-- ********判斷：如果購物車是空的，將會顯示下方區塊 -->
    <?php if (empty($_SESSION['cart_w'])) : ?>

        <div class="cart-list-content02">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>
                            <div class="cart-list02">
                                <div class="cart-list-title02">
                                    <input type="checkbox" class="cart-checkbox" id="clickAll" name="clickAll">
                                    <!-- <a class="checked-all " href="#">全選</a>
                                    <p class="checked-all">｜</p> -->
                                    <a class="checked-all remove-checkbox" href="#">刪除已選項目</a>
                                </div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <div class="cart-empty">
                                <p class="cart-p1">您的購物車沒有商品</p>
                                <div class="cart-btn">
                                    <!-- <a class="btns btn-blue cart-Btn" href="" role="button">來去逛逛</a> -->
                                    <a class="btns btn-blue cart-Btn" href="<?= WEB_ROOT ?>/product-list.php" role="button">來去逛逛</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ********判斷：如果購物車有商品，將會顯示下方區塊 -->
    <?php else : ?>
        <div class="cart-list-content02">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>
                            <div class="cart-list02">
                                <div class="cart-list-title02">
                                    <input type="checkbox" class="cart-checkbox" id="clickAll" name="clickAll">
                                    <!-- <a class="checked-all" href="#">全選</a>
                                    <p class="checked-all">｜</p> -->
                                    <a class="checked-all" id="remove-checkbox" href="#">刪除已選項目</a>
                                </div>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <!-- 卡片生成迴圈（開始） -->
                    <?php foreach ($_SESSION['cart_w'] as $i) : ?>

                        <tr class="p-item" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['total_price'] ?>" data-adult_qty="<?= $i['adult_qty'] ?>" data-child_qty="<?= $i['child_qty'] ?>" data-total_price="<?= $i['total_price'] ?>">


                            <td style="padding: 12px 0px;">

                                <div class="cart-card">

                                    <!-- checkbox -->
                                    <input type="checkbox" class="cart-checkbox item-checkbox" name="user_active_col[]" value="<?= $i['sid'] ?>">

                                    <div class="card7">
                                        <div class="card7Left">
                                            <img src="img/<?= $i['kv_img'] ?>.jpg">
                                        </div>

                                        <div class="card7Right">
                                            <div class="card7RightBox">

                                                <div class="card7CG">

                                                    <!-- 收藏功能 -->
                                                    <div class=card7heart>

                                                        <a href="javascript:" class="add-card7heart">
                                                            <svg class="card7heart-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.93 23.27">
                                                                <g id="card7-Heart">
                                                                    <path id="card7-Heart-2" class="card7-cls-1" d="M649.46,374.45a6.71,6.71,0,0,0-9.5-.06l-.07.06-.94.94-.94-.94a6.76,6.76,0,0,0-9.56,9.56l10.5,10.5,10.5-10.5a6.72,6.72,0,0,0,.07-9.5l-.07-.06" transform="translate(-626.02 -371.95)" />
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    </div>

                                                    <!-- 刪除功能 --> <a href="javascript:" class="remove-item"> <img class="card7heart-img" src="svg/svg-trash.svg" alt=""></a>

                                                </div>

                                                <div class="card7name">
                                                    <!-- <p>烏岩角海蝕洞獨木舟體驗</p> -->
                                                    <p><?= $i['name'] ?></p>
                                                </div>

                                                <div class="card7IntroIconALL">
                                                    <div class="card7IntroIconRow1">
                                                        <div class="card7Place card7Icon">
                                                            <img class="card7heart-img" src="svg/svg-locat.svg" alt="" width="12px">

                                                            <!-- <p>宜蘭，東澳</p> -->
                                                            <p><?= $i['locate'] ?></p>

                                                        </div>
                                                        <div class="card7Time card7Icon">
                                                            <img class="card7heart-img" src="svg/svg-time.svg" alt="" width="12px">
                                                            <!-- <p>3.5Hrs</p> -->
                                                            <p><?= $i['time'] ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="card7IntroIconRow2">
                                                        <div class="card7Date card7Icon">
                                                            <img class="card7heart-img" src="svg/svg-calendar.svg" alt="" width="12px">

                                                            <!-- <p>2020 / 09 / 20</p> -->
                                                            <p><?= $i['date'] ?></p>

                                                        </div>
                                                    </div>

                                                    <div class="card7IntroIconRow3">
                                                        <div class="card7People card7Icon">

                                                            <!-- 人數：資料庫沒有 -->
                                                            <p class=>成人 x <?= $i['adult_qty'] ?> &emsp; </p>
                                                            <span></span>
                                                            <p class=>兒童 x <?= $i['child_qty'] ?></p>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card7Price">
                                                    <p>TWD</p>
                                                    <!-- <p class='price'>4000</p> -->
                                                    <p class='price course-price' value="<?= $i['total_price'] ?>">
                                                        <?= $i['total_price'] ?></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- 卡片生成迴圈（結束）-->
                </tbody>
            </table>
        </div>
        <!-- 購物車內容（結束） -->


        <!-- 結算區塊（開始） -->
        <div class="cart-total">

            <div class="cart-info1">
                <a type="button" class="cart-return-btn" role="button" href="product-list.php"> <img class="icon-arrow-left-gray" src="svg/svg-arrow-left-gray.svg" alt="">繼續購物
                </a>

                <div class="cart-discount">
                    <p class="cart-discount-p">使用折扣</p>
                    <input type="text" class="cart-discount-code" placeholder="請輸入折扣碼" style="outline:none">
                    <a class="cart-discount-btn" href="" onclick="return false;">送出</a>
                </div>
            </div>

            <div class="cart-info2">
                <p class="cart-info2-p" id="total-amount"> 2 件商品</p>
                <p class="cart-info2-p"><span class="cart-subtotal"> </span> </p>
                <p class="cart-info2-p">優惠折抵 -$ <span id="discount_amount"> 0 </span></p>
                <p class="cart-twd-p">合計金額 <span class="cart-TWD">TWD</span> </p>


                <!-- 結帳前的判斷式:是否有登入會員（開始） -->
                <div class="cart-btn">

                    <?php if (isset($_SESSION['members'])) : ?>
                        <a type="button" class="btns btn-blue" href="<?= WEB_ROOT ?>/buy-start.php" role="button">前往結帳</a>

                    <?php else : ?>
                        <a type="button" class="btns btn-blue" href="<?= WEB_ROOT ?>/login.php" role="button">請先登入會員</a>
                    <?php endif; ?>

                </div>

                <!-- 結帳前的判斷式:是否有登入會員（結束） -->

            </div>
        </div>
        <!-- 結帳區塊（結束） -->


        <!-- ********判斷結束 -->
    <?php endif; ?>

    <!-- cart-slider：多數多數旅客還體驗了以下活動區塊（開始）  -->
    <div class="cart-slider">
        <p class="cart-p2">多數旅客還體驗了以下活動</p>


        <p class="mobile-p">多數旅客還體驗了以下活動>></p>

        <div class="ad-4">

            <div class="list-wrapper-big">
                <div class="webcontainer">

                    <div class="card3">
                        <div class="card3Top card3Top01"></div>

                        <div class="card3Down">
                            <div class="card3DownBox">
                                <div class="card3title">
                                    烏岩角獨木舟體驗
                                </div>

                                <div class="card3IntroIcon">
                                    <div class="card3Place card3Icon">
                                        <img src="svg/svg-locat.svg" alt="" width="12px">
                                        <p>宜蘭-東澳</p>
                                    </div>
                                    <div class="card3Time card3Icon">
                                        <img src="svg/svg-time.svg" alt="" width="12px">
                                        <p>3.5Hrs</p>
                                    </div>
                                    <div class="card3Signed card3Icon">
                                        <img src="svg/svg-star.svg" alt="" width="12px">
                                        <p>4.8</p>
                                    </div>
                                </div>

                                <div class="priceNheart">
                                    <div class="card3Price">
                                        <p>TWD</p>
                                        <p class='price'>2000</p>
                                    </div>

                                    <svg class="Heart" width="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.93 23.27">
                                        <g id="Heart">
                                            <path id="Heart-2" class="cls-1" d="M649.46,374.45a6.71,6.71,0,0,0-9.5-.06l-.07.06-.94.94-.94-.94a6.76,6.76,0,0,0-9.56,9.56l10.5,10.5,10.5-10.5a6.72,6.72,0,0,0,.07-9.5l-.07-.06" transform="translate(-626.02 -371.95)" />
                                        </g>
                                    </svg>
                                </div>


                            </div> <!-- card3DownBox結束 -->
                        </div><!-- card3Down結束 -->
                    </div>


                    <div class="card3">
                        <div class="card3Top card3Top02"></div>

                        <div class="card3Down">
                            <div class="card3DownBox">
                                <div class="card3title">
                                    台東都蘭 SUP 立槳
                                </div>

                                <div class="card3IntroIcon">
                                    <div class="card3Place card3Icon">
                                        <img src="svg/svg-locat.svg" alt="" width="12px">
                                        <p>台東-都蘭</p>
                                    </div>
                                    <div class="card3Time card3Icon">
                                        <img src="svg/svg-time.svg" alt="" width="12px">
                                        <p>3.5Hrs</p>
                                    </div>
                                    <div class="card3Signed card3Icon">
                                        <img src="svg/svg-star.svg" alt="" width="12px">
                                        <p>4.3</p>
                                    </div>
                                </div>

                                <div class="priceNheart">
                                    <div class="card3Price">
                                        <p>TWD</p>
                                        <p class='price'>1500</p>
                                    </div>

                                    <svg class="Heart" width="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.93 23.27">
                                        <g id="Heart">
                                            <path id="Heart-2" class="cls-1" d="M649.46,374.45a6.71,6.71,0,0,0-9.5-.06l-.07.06-.94.94-.94-.94a6.76,6.76,0,0,0-9.56,9.56l10.5,10.5,10.5-10.5a6.72,6.72,0,0,0,.07-9.5l-.07-.06" transform="translate(-626.02 -371.95)" />
                                        </g>
                                    </svg>
                                </div>


                            </div> <!-- card3DownBox結束 -->
                        </div><!-- card3Down結束 -->
                    </div>


                    <div class="card3">
                        <div class="card3Top card3Top03"></div>

                        <div class="card3Down">
                            <div class="card3DownBox">
                                <div class="card3title">
                                    東北角龍洞灣SUP體驗
                                </div>

                                <div class="card3IntroIcon">
                                    <div class="card3Place card3Icon">
                                        <img src="svg/svg-locat.svg" alt="" width="12px">
                                        <p>新北-貢寮</p>
                                    </div>
                                    <div class="card3Time card3Icon">
                                        <img src="svg/svg-time.svg" alt="" width="12px">
                                        <p>3.5Hrs</p>
                                    </div>
                                    <div class="card3Signed card3Icon">
                                        <img src="svg/svg-star.svg" alt="" width="12px">
                                        <p>4.8</p>
                                    </div>
                                </div>

                                <div class="priceNheart">
                                    <div class="card3Price">
                                        <p>TWD</p>
                                        <p class='price'>2000</p>
                                    </div>

                                    <svg class="Heart" width="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.93 23.27">
                                        <g id="Heart">
                                            <path id="Heart-2" class="cls-1" d="M649.46,374.45a6.71,6.71,0,0,0-9.5-.06l-.07.06-.94.94-.94-.94a6.76,6.76,0,0,0-9.56,9.56l10.5,10.5,10.5-10.5a6.72,6.72,0,0,0,.07-9.5l-.07-.06" transform="translate(-626.02 -371.95)" />
                                        </g>
                                    </svg>
                                </div>


                            </div> <!-- card3DownBox結束 -->
                        </div><!-- card3Down結束 -->
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>
<!-- 購物車內容（結束） -->



<?php include __DIR__ . '/__footer.php' ?>
<?php include __DIR__ . '/__scripts.php' ?>


<!-- 自己的script寫這邊 -->
<script>
    $(".cart-discount-btn").click(function() {
        $("#discount_amount").html('100')
        amount_action();
    });


    amount_action();

    function amount_action() {
        // ----------金額計算（開始）----------
        var prices = $(".course-price");
        var total = 0;

        $.each(prices, function(index, val) {
            total += parseInt($(val).attr('value'));
            console.log(index + ':', $(val).attr('value'), total);
            $(".cart-subtotal").html('小計 <span class="cart-subtotal"></span>' + dallorCommas(total) + '');
        });

        total -= parseInt($("#discount_amount").html());

        $(".cart-twd-p").html('合計金額 <span class="cart-TWD">TWD</span>' + dallorCommas(total) + '');
        // ----------------------------------

        //----------數量----------------------
        var goods = $(".p-item").length;
        $("#total-amount").html(goods + ' 件商品');
        // ----------------------------------
    }



    // ----------金額逗點（開始）----------
    function dallorCommas(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    // ----------------------------------


    function prepareCartTable() {
        const $p_items = $('.p-item');

        //如果購物車已經清空並且還有金額的狀況，就會直接重轉頁面
        if (!$p_items.length && $('.cart-TWD').length) {
            // location.href = location.href;
            location.reload();
            return;
        }

        let total = 0;
        $p_items.each(function() {
            const sid = $(this).attr('data-sid');
            const price = $(this).attr('data-price');
            const quantity = $(this).attr('data-quantity');

            $(this).find('.price').text('$ ' + dallorCommas(price));
            $(this).find('.qty').val(quantity);
            $(this).find('.sub-total').text('$ ' + dallorCommas(quantity * price));
            total += quantity * price;
            $('#total-price').text('$ ' + dallorCommas(total));
        });
    }


    const qty_sel = $('.qty');


    // 顯數目前商品件數
    qty_sel.on('change', function() {
        const p_item = $(this).closest('.p-item');
        const sid = p_item.attr('data-sid');
        // alert(sid +', '+ $(this).val() )

        const sendObj = {
            action: 'add',
            sid: sid,
            quantity: $(this).val()
        }
        $.get('handle-cart.php', sendObj, function(data) {
            setCartCount(data); // navbar
            p_item.attr('data-quantity', sendObj.quantity);
            prepareCartTable();
        }, 'json');
    });



    //全選功能
    $("#clickAll").click(function() {
        $("input[name='user_active_col[]']").prop("checked", $("#clickAll").prop("checked"));
    });


    // 移除商品功能
    $('.remove-item').on('click', function() {
        const p_item = $(this).closest('.p-item');
        const sid = p_item.attr('data-sid');
        $.get('handle-cart.php', {
                action: 'remove',
                sid: sid
            }, function(data) {
                // setCartCount(data); // navbar
                p_item.remove();
                prepareCartTable();
            }, 'json')
            .done(function() {
                amount_action();
            });
    });


    // 移除已選商品功能
    $('#remove-checkbox').on('click', function() {
        var removeItems = $(".item-checkbox");
        $.each(removeItems, function(index, val) {
            if ($(val).prop("checked")) {
                $.get('handle-cart.php', {
                        action: 'remove',
                        sid: $(val).val()
                    })
                    .done(function() {
                        location.reload();
                    });
            }
        });

    });
</script>

<?php require __DIR__ . '/__html_foot.php' ?>