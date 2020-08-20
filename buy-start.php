<?php require __DIR__ . '/__connect_db.php';
$pageName = '';

// 如果購物車是空的 or 沒有登入 ，就不要進來到此頁面，就會跳轉到購物車cart02
if (empty($_SESSION['cart_w']) or empty($_SESSION['members'])) {
    header('Location: cart.php');
    exit;
}
?>

<?php include __DIR__ . '/__html_head.php' ?>

<!-- 自己的樣式寫這邊 -->
<!-- 購物車頁面樣式 -->
<link rel="stylesheet" href="css/cart-general.css">
<link rel="stylesheet" href="css/buy-start.css">

<style>
    /* -----------------  商品小卡  ----------------- */
    .ad-4 {
        width: 100%;
        height: 800px;
        position: relative;
        /* padding-top: 80px; */
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

    /* --------揪團列表頁 card3 商品小卡--------*/

    .card3 {
        max-width: 328px;
        width: 33%;
        background-color: white;
        margin-bottom: 20px;
        box-shadow: 1px 1px 3px #aaa;
    }

    .card3Top {
        width: 100%;
        height: 219px;
        background: url("img/public-product-2.jpg") center center no-repeat;
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

    /* -------------card3 CSS結束 ---------------*/

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







    /* --------購物清單頁 card7 商品長卡--------*/
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
        /* align-items: center; */
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

    /* -------------card7 CSS結束 ---------------*/

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

    .cart-btn {
        display: flex;
        justify-content: center;
    }

    a:not([href]):not([tabindex]) {
        color: white;

    }

    a:not([href]):not([tabindex]):hover {
        color: #043f98;
    }

    @media screen and (max-width:768px) {
        .member-kv .kv-wave {
            bottom: -20px;
        }
    }
</style>

<?php include __DIR__ . '/__navbar.php' ?>

<!-- body內容寫這邊 -->
<!-- 頁面主視覺 -->
<div class="member-kv"><img class="kv-wave" src="img/wave-animate.png" alt=""></div>

<!-- 購物步驟流程圖 -->
<div class="cart-step"><img class="cart-step-img" src="svg/cart-flow-2.svg" alt=""></div>


<main class="webcontainer-page03">
    <!-- 購物車內容（開始） -->
    <div class="cart-list-content">
        <table class="table table-borderless">
            <h3 class="cart-h3">付款明細</h3>
            <h3 class="mobile-h3">付款明細</h3>

            <tbody>

                <?php foreach ($_SESSION['cart_w'] as $i) : ?>
                    <tr class="p-item" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-adult_qty="<?= $i['adult_qty'] ?>" data-child_qty="<?= $i['child_qty'] ?>" data-total_price="<?= $i['total_price'] ?>">

                        <td style="padding: 12px 0px;">
                            <!-- 購物車卡片(checkbox＋商品明細卡片)開始 -->
                            <div class="cart-card">

                                <!--  --------揪團列表頁 card7 熱門活動-------- -->

                                <!-- 商品圖片 -->
                                <div class="card7">
                                    <div class="card7Left">
                                        <img src="img/<?= $i['kv_img'] ?>.jpg">
                                    </div>

                                    <div class="card7Right">
                                        <div class="card7RightBox">

                                            <div class="card7CG">
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
                                            </div><!-- card7IntroIconALL結束 -->

                                            <div class="card7Price">
                                                <p>TWD</p>

                                                <!-- <p class='price'>4000</p> -->
                                                <p class='price course-price' value="<?= $i['total_price'] ?>"><?= $i['total_price'] ?></p>

                                            </div>
                                        </div> <!-- card7RightBox結束 -->

                                    </div>
                                </div>
                                <!-- -----------card7結束------------------ -->
                            </div>
                            <!-- 購物車卡片(checkbox＋商品明細卡片)結束 -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- 購物車內容（結束） -->



    <!-- 結算區塊（開始） -->
    <div class="cart-total">
        <div class="cart-info1">
            <a type="button" class="cart-return-btn2" role="button" href="cart.php"> <img class="icon-arrow-left-gray" src="svg/svg-arrow-left-gray.svg" alt="">返回購物車
            </a>
        </div>


        <div class="cart-info2">

            <p class="cart-info2-p" id="total-amount"> 2 件商品</p>
            <p class="cart-info2-p"><span class="cart-subtotal"> </span> </p>
            <p class="cart-info2-p">優惠折抵 -$ <span id="discount_amount"> 100 </span></p>
            <p class="cart-twd-p">合計金額 <span class="cart-TWD">TWD</span> </p>



        </div>
    </div>

    <!-- 結帳區塊（結束） -->



    <!-- 填寫資料區塊（開始） -->

    <div class="cart-orderInfo">

        <form id="checkout-form" name="form1" method="post" novalidate>
            <h3 class="cart-h3">填寫訂購人資料</h3>
            <h3 class="mobile-h3">填寫訂購人資料</h3>

            <div class="orderInfo-container">

                <div class="member-form-group">
                    <label for="member-name">姓名</label><br>
                    <input class="required" type="text" id="member-name" name="name" placeholder="請填寫姓名" style="outline:none">
                    <small id="nickname" class="loginErrorFont form-text"></small>
                </div>


                <div class="member-form-group">
                    <label for="member-phone">電話</label><br>
                    <input class="required" type="tel" id="member-phone" name="phone" placeholder="請填寫電話" style="outline:none">
                    <small id="emailHelp" class="loginErrorFont form-text"></small>
                </div>

                <div class="member-form-group">
                    <label for="member-email">電子信箱</label><br>
                    <input class="required" type="email" id="member-email" name="email" class="input-100" placeholder="請填寫電子信箱" style="outline:none">
                    <small id="emailHelp" class="loginErrorFont form-text"></small>
                </div>

                <!-- 地址 -->
                <!-- <div class="member-form-group">
                    <label for="member-address">地址</label><br>

                    <div class="member-group">
                        <select class="member-city" type="city" id="member-city" name="city">
                            <option value="">縣市</option>
                            <option value="">台北市</option>
                            <option value="">新北市</option>
                            <option value="">桃園市</option>
                        </select>

                        <select class="member-area" type="area" id="member-area" name="area">
                            <option value="">鄉區縣市</option>
                            <option value="">中正區</option>
                            <option value="">中山區</option>
                            <option value="">大安區</option>
                        </select>
                    </div>

                    <input type="address" id="member-address" name="address" class="input-200" placeholder="道路街名">

                    <div class="form-check">
                        <input type="checkbox" id="member-updata" name="updata">
                        <label for="member-updata"> 同時更新會員資料</label><br>
                    </div>


                </div> -->
            </div>


            <!-- 付款方式(開始) -->

            <h3 class="cart-h3">付款方式</h3>
            <h3 class="mobile-h3">付款方式</h3>


            <div class="orderInfo-container">

                <div class="cart-payment-radio1">
                    <div>
                        <input class="cart-payment1 required" type="radio" name="payment" value="transfer"> <label>轉帳</label>
                    </div>

                    <div>
                        <input class="cart-payment1 required" type="radio" name="payment" value="creditCard"> <label>信用卡</label>
                    </div>
                </div>


                <div class="member-form-group">
                    <label for="member-cardNumber">信用卡號碼</label><br>
                    <input class="required" type="text" id="member-cardNumber" name="cardNumber" placeholder="0000-0000-0000-0000" style="outline:none">
                </div>


                <div class="member-form-group">

                    <label for="member-EXP">有效年月日 / 背面末三碼</label><br>
                    <div class="member-group">
                        <select class="member-month required" type="month" id="member-month" name="month" style="outline:none">
                            <option value="">月份</option>
                            <option value="一月">一月</option>
                            <option value="二月">二月</option>
                            <option value="二月">三月</option>
                            <option value="二月">四月</option>
                            <option value="二月">五月</option>
                            <option value="二月">六月</option>
                            <option value="二月">七月</option>
                            <option value="二月">八月</option>
                            <option value="二月">九月</option>
                            <option value="二月">十月</option>
                            <option value="二月">十一月</option>
                            <option value="二月">十二月</option>

                        </select>

                        <select class="member-year required" type="year" id="member-year" name="year" style="outline:none">
                            <option value="">年份</option>
                            <option value="2020">2020</option>
                            <option value="2020">2021</option>
                            <option value="2020">2022</option>
                            <option value="2020">2023</option>
                            <option value="2020">2024</option>
                            <option value="2020">2025</option>
                            <option value="2020">2026</option>
                            <option value="2020">2027</option>

                        </select>

                        <div class="member-form-group2">
                            <input class=" required" type="text" id="member-securityCode" class="securityCode" name="securityCode" placeholder="CVC/CVV" style="outline:none">
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="cart-h3">電子發票</h3>
            <h3 class="mobile-h3">電子發票</h3>

            <div class="orderInfo-container">
                <div class="cart-payment-radio2">
                    <!-- <div>
                    <input class="cart-invoice" type="radio" name="invoice" value=""> 旅行業代收轉付電子收據寄至訂購人E-mail
                </div> -->

                    <div class="cart-invoice">
                        <!-- <input class="cart-taxID" type="radio" name="invoice" value=""> 需要開立統編 -->
                        <label for="">旅行業代收轉付電子發票寄至訂購人E-mail<br>若有統編需求填入下方欄位</label><br>

                    </div>


                </div>

                <div class="member-group">

                    <div class="member-form-group3">
                        <label for="member-taxIDnumber">統一編號</label><br>
                        <input type="text" id="member-taxIDnumber" name="taxIDnumber" class="member-taxIDnumber" placeholder="請輸入統一編號" style="outline:none">
                    </div>
                    <!-- <div class="member-form-group4">
                        <label for="member-purchaser">抬頭(買受人)</label><br>
                        <input type="text" id="member-purchaser" name="purchaser" class="member-purchaser"
                            placeholder="請輸入抬頭">
                    </div> -->
                </div>

                <!-- <div class="member-form-group">
                    <label for="member-email">寄送信箱</label><br>
                    <input type="email" id="member-email" name="invoiceEmail" class="input-100" placeholder="請填寫電子信箱">
                </div> -->
            </div>

            <div class="cart-btn">
                <a type="button" class="btns btn-blue cart-Btn check-out" role="button">確認付款</a>
            </div>
        </form>



        <!-- 付款方式(結束) -->
</main>

<?php include __DIR__ . '/__footer.php' ?>
<?php include __DIR__ . '/__scripts.php' ?>

<!-- 自己的script寫這邊 -->
<script>
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




    const qty_sel = $('.qty');

    // 顯數目前數量功能
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






    // 表單警示功能
    const name = $('#name'),
        nameHelp = $("#nameHelp");
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    $(".check-out").on('click', function() {
        var result = formCheck();
    });

    function formCheck() {
        var required = $(".required");
        var isPass = true;
        var message = '請填寫以下資訊 ';
        $.each(required, function(index, val) {
            if ($(val).val() == '' || $(val).val() == null) {
                console.log('null');
                isPass = false;
                if ($(val).parent().children("label").html() != undefined) {
                    message += $(val).parent().children("label").html();
                    message += ' ';
                }
            }
        });
        if (!isPass) {
            alert(message);
            return false;
        }



        //vvvvvv原本沒有用if包住，要使用警告字時再包，裡面再包if增加新增成功與新增失敗的流程
        else {
            $.post('buy-start-api.php', $(document.form1).serialize(), function(data) {

            }, 'json').done(function() {
                location.href = 'buy-finish.php';
            });
            // 這是json標籤
        }
        return true;
    }
</script>

<?php require __DIR__ . '/__html_foot.php' ?>