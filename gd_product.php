<?php
require __DIR__. '/__connect_db.php';
$pageName = 'gd_product';

$sql= "SELECT `groupClass-name`, `groupClass-locate`, `groupClass-type`, `group-date`, `group-time`, `group-theme`, `group-type`, `group-message` FROM `group-add` ORDER BY `sid` DESC";
$r=$pdo->query($sql)->fetch();

//先知道這個揪團的課程號碼是幾號(:2)
$class_num=$r['groupClass-name'];
//把一般課程拿出來
$c_sql = "SELECT * FROM `product-test` WHERE sid=? ";
$stmt=$pdo->prepare($c_sql);
$stmt->execute([$class_num]);
$c=$stmt->fetch();

?>

<?php include __DIR__. '/__html_head.php' ?>

    <!-- 自己的樣式寫這邊 -->

    <!-- animated css外掛 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <!----- kv線條外掛 ----->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>

    <link rel="stylesheet" href="css/nd_product.css">
    <link rel="stylesheet" href="css/gd_product.css">

    <!-- <link rel="stylesheet" href="css/xxxxxx.css"> -->
    <style>
    .npd-area2-title {
        text-indent: -23px;
    }
    .npd-area2-info h5{
        padding-left: 5px;
        border-left: 3px solid #043f98;
        margin-right: 10px;
    }

    </style>

<?php include __DIR__. '/__navbar.php' ?>

    <!-- body內容寫這邊 -->
    <!---------------------- 次選單    html開始 -------------------->

    <section class="npd-sec-nav-area ">
        <div class="npd-area0 webcontainer npd-rwdcontainer">
            <nav class="npd-sec-nav">
                <ul class="list-unstyled">
                    <li><a href="">揪團詳情</a></li>
                    <li><a href="">行程安排</a></li>
                    <li><a href="">集合資訊</a></li>
                    <li class="m-0"><a href="">購買須知</a></li>
                </ul>
            </nav>

            <div class="npd-sec-nav-cta">
                <div class="npd-sec-nav-price">
                    <h4>TWD</h4>
                    <h4>2000</h4>
                    <p style="font-size: 0.625rem;">/人</p>
                </div><!-- npd-sec-nav-price價格 -->

                <a class="btns btn-blue" href="#" role="button">直接結帳</a>
            </div>
        </div>
    </section>

    <!---------------------- 次選單    html結束 -------------------->

    <!---------------------- area1 kv   html開始 -------------------->
    <div class="kv" id="npd-fixedbtn">

        <svg class="kv-wave-bottom" xmlns="http://www.w3.org/2000/svg">
            <path id="wave" d="M0 120 Q360 60 720 120 T 2000 120 V240 H0 Z"></path>
            <img class="kv-wave-top" src="img/wave-animate-new2.png" alt="">
            <img class="kv-logo-1" src="svg/svg-kv-logo-l.svg" alt="">
            <img src="img/<?= $c['sid'] ?>-kv.jpg" alt="" class="npd-kv01">
        </svg>
    </div>

    <!---------------------- area1 kv    html結束 -------------------->

    <!------- 錨點按鈕 ------->
    <a href="#npd-fixedbtn"> <img class="npd-fixedbtn" src="svg/svg-top.svg" alt=""></a>
    <a href="group-add.php"><img class="npd-fixedbtn2" src="svg/svg-bulidgroup.svg" alt=""></a>

    <!---------------------- area2 商品名稱   html開始 -------------------->
    <div class="npd-area2 webcontainer npd-rwdcontainer">
        <!------- 麵包屑 ------->
        <div class="npd-bread">
            <a href="">首頁</a><span> > </span>
            <a href=""> 我要揪團 商品頁</a>
        </div><!--npd-bread結束--->

        <h1 class="npd-area2-title" style="font-weight: 100;">【揪團】<?= $c['name'] ?></h1>

        <div class="npd-area2-downRWD">
            <div class="npd-area2-info">
                <div class="npd-area2-icon">
                    <div class="gdp-area2-icon-date">
                        <h5>2020/7/25(六) 6:00 – 9:30</h5>
                    </div>

                    <div class="npd-area2-icon-place">
                        <img src="svg/svg-share.svg" alt="">
                    </div>
                </div> <!-- npd-area2-icon 結束 -->

                <div class="gd-area2-price">
                    <h6 class="gd-area2-price-space">TWD</h6>
                    <h2>2000</h2>
                    <p style="font-size: 0.625rem;">/人</p>
                </div><!-- npd-sec-nav-price價格 -->

            </div> <!-- npd-area2-info 結束 -->
        </div><!-- npd-area2-downRWD 結束 -->
    </div> <!-- npd-area2 結束 -->
    <!---------------------- area2 商品名稱    html結束 -------------------->

    <div class="webcontainer npd-biggestBOX npd-rwdcontainer">
        <div class="npd-biggestBOX-insetBlank gd-cta1">

            <!---------------------- area13 揪團詳情    html開始 -------------------->
            <div class="npd-area13">
                <!------------頁籤------------->
                <div class="npd-tab01-black">
                    <h3 class="npd-tab01-text">揪團詳情</h3>
                </div>

                <!----------資訊區------------->
                <div class="npd-area6-box container-md">
                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">揪團主題</h5>
                        <p class="col-md-10 col-sm-10 "><?= $r['group-theme'] ?></p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">主揪留言</h5>
                        <p class="col-md-10 col-sm-10"><?= $r['group-message'] ?></p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">活動時間</h5>
                        <p class="col-md-10 col-sm-10"><?php
                            $days = ['0'=>'日', '1'=>'一', '2'=>'二', '3'=>'三', '4'=>'四', '5'=>'五', '6'=>'六'];
                            $day = date('w', strtotime($r['group-date']));
                            printf('%s (%s)， %s', $r['group-date'], $days[$day], $r['group-time']);
                            ?></p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">活動地點</h5>
                        <p class="col-md-10 col-sm-10"><?= $r['groupClass-locate'] ?></p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">成團條件</h5>
                        <p class="col-md-10 col-sm-10">8人成團，20人額滿</p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">目前成員</h5>

                        <div class="gpd-area6-attent col-md-10 col-sm-10">
                            <p class="">0位</p>



                        </div><!-- gpd-area6-attent結束 -->
                    </div>
                    <!------- hover出現個人小簡介 --------->

                </div><!-- npd-area13-box(揪團詳情) 結束 -->
            </div><!-- npd-area13(揪團詳情) 結束 -->
            <!---------------------- area13 集合資訊    html結束 -------------------->





            <!---------------------- area4 行程安排照片區    html開始 -------------------->
            <div class="npd-area4">
                <!------------頁籤------------->
                <div class="npd-tab01-black">
                    <h3 class="npd-tab01-text">行程安排</h3>
                </div>

                <!------------圖片區------------>
                <div class="npd-area4-album">
                    <div class="npd-area4-album1">

                    </div>
                    <div class="npd-area4-album2">

                    </div>

                    <div class="npd-area4-album3">

                    </div>

                    <div class="npd-area4-album4">

                    </div>

                    <div class="npd-area4-album-more">
                        <div class="npd-area4-album-more-mask">
                            <h3>More +</h3>
                        </div>

                    </div>
                </div>
            </div><!-- npd-area4 結束 -->
            <!---------------------- area4 行程安排照片區    html結束 -------------------->


            <!---------------------- area5 行程安排時間軸    html開始 -------------------->
            <div class="npd-area5">
                <!------------- 第一段時間軸 start------------>
                <div class="npd-area5-box">
                    <!--  時間軸  -->
                    <div class="npd-area5-box-timeline">
                        <div class="npd-area5-box-timeline-circle"></div>
                        <div class="npd-area5-box-timeline-line"></div>
                    </div>

                    <div class="npd-area5-box-right">
                        <!--進行時段-->
                        <div class="npd-area5-box-schedule">
                            <h5>0-60mins</h5>
                        </div>

                        <!--文字說明-->
                        <div class="npd-area5-box-text">
                            <div class="npd-area5-box-blank"></div>
                            <div class="npd-area5-box-textTitle">
                                <h5>集合暖身</h5>
                            </div>

                            <div class="npd-area5-box-textWords">
                                <p>
                                    <br>烏石港集合，由領隊帶隊換裝、暖身，講解基本漿語。<br><br><br>
                                </p>
                            </div>
                        </div>
                    </div><!-- npd-area5-box-right 結束 -->
                </div><!-- npd-area5-box 結束 -->
                <!------------- 第一段時間軸 end------------>

                <!------------- 第二段時間軸 start------------>
                <div class="npd-area5-box">
                    <!--  時間軸  -->
                    <div class="npd-area5-box-timeline">
                        <div class="npd-area5-box-timeline-circle"></div>
                        <div class="npd-area5-box-timeline-line"></div>
                    </div>

                    <div class="npd-area5-box-right">
                        <!--進行時段-->
                        <div class="npd-area5-box-schedule">
                            <h5>60mins-120mins</h5>
                        </div>

                        <!--文字說明-->
                        <div class="npd-area5-box-text">
                            <div class="npd-area5-box-textTitle">
                                <h5>搭乘帆船出航</h5>
                            </div>

                            <div class="npd-area5-box-textWords">
                                <p>
                                    <br>乘坐帆船探索今年最夯的龜山島仙境，度過悠閒奢華的輕旅行時光。<br><br><br>
                                </p>
                            </div>
                        </div>

                    </div><!-- npd-area5-box-right 結束 -->
                </div><!-- npd-area5-box 結束 -->
                <!------------- 第二段時間軸 end------------>

                <!------------- 第三段時間軸 start------------>
                <div class="npd-area5-box">
                    <!--  時間軸  -->
                    <div class="npd-area5-box-timeline">
                        <div class="npd-area5-box-timeline-circle"></div>
                        <div class="npd-area5-box-timeline-line"></div>
                    </div>

                    <div class="npd-area5-box-right">
                        <!--進行時段-->
                        <div class="npd-area5-box-schedule">
                            <h5>120mins-150mins</h5>
                        </div>

                        <!--文字說明-->
                        <div class="npd-area5-box-text">
                            <div class="npd-area5-box-textTitle">
                                <h5>抵達牛奶海，SUP體驗</h5>
                            </div>

                            <div class="npd-area5-box-textWords">
                                <p>
                                    <br>全世界僅有絕美Tiffany藍牛奶海～挑戰自己掌舵航向龜山島！<br><br><br>
                                </p>
                            </div>
                        </div>

                    </div><!-- npd-area5-box-right 結束 -->
                </div><!-- npd-area5-box 結束 -->
                <!------------- 第三段時間軸 end------------>

                <!------------- 第四段時間軸 start------------>
                <div class="npd-area5-box">
                    <!--  時間軸  -->
                    <div class="npd-area5-box-timeline">
                        <div class="npd-area5-box-timeline-circle"></div>
                        <div class="npd-area5-box-timeline-line"></div>
                    </div>

                    <div class="npd-area5-box-right">
                        <!--進行時段-->
                        <div class="npd-area5-box-schedule">
                            <h5>150mins-180mins</h5>
                        </div>

                        <!--文字說明-->
                        <div class="npd-area5-box-text">
                            <div class="npd-area5-box-textTitle">
                                <h5>返回烏石港</h5>
                            </div>

                            <div class="npd-area5-box-textWords">
                                <p>
                                    <br>魚群海鷗伴遊，享受帆船小點心。<br><br><br>
                                </p>
                            </div>
                        </div>

                    </div><!-- npd-area5-box-right 結束 -->
                </div><!-- npd-area5-box 結束 -->
                <!------------- 第四段時間軸 end------------>

                <!-------- 第五段時間軸-活動結束 start------->
                <div class="npd-area5-box">
                    <!--  時間軸  -->
                    <div class="npd-area5-box-timeline">
                        <div class="npd-area5-box-timeline-circle"></div>
                    </div>
                    <div class="npd-area5-box-right">
                        <!--進行時段-->
                        <div class="npd-area5-box-schedule">
                            <h5>活動結束</h5>
                        </div>
                    </div><!-- npd-area5-box-right 結束 -->
                </div><!-- npd-area5-box 結束 -->
                <!-------- 第五段時間軸-活動結束 end------->
            </div><!-- npd-area5 結束 -->

            <!---------------------- area5 行程安排時間軸    html結束 -------------------->





            <!---------------------- area6 集合資訊    html開始 -------------------->
            <div class="npd-area6">
                <!------------頁籤------------->
                <div class="npd-tab01-black">
                    <h3 class="npd-tab01-text">集合資訊</h3>
                </div>

                <!----------資訊區------------->
                <div class="npd-area6-box container-md">
                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">集合時間</h5>
                        <p class="col-md-10 col-sm-10 ">出發前半小時</p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">集合地點</h5>
                        <p class="col-md-10 col-sm-10">烏石港遊艇碼頭集合宮</p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">集合地址</h5>
                        <p class="col-md-10 col-sm-10">宜蘭縣頭城鎮港口路</p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">如何抵達</h5>
                        <p class="col-md-10 col-sm-10">【自行開車】<br>
                            從台北出發，沿著 2 丙公路行駛，車程約 1 到 1.5 小時<br><br>

                            【大眾運輸】<br>
                            台北圓山捷運站搭乘國光客運1877號，在烏石港轉運站下車。</p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">攜帶物品</h5>
                        <p class="col-md-10 col-sm-10">建議攜帶防水背包、水、簡易零食、毛巾、換洗衣物、盥洗用具、防曬乳、暈船藥
                            備註：請盡量輕裝簡便，上船前有投幣式置物櫃讓大家放東西。</p>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">體驗地點</h5>
                        <p class="col-md-10 col-sm-10">牛奶海<br>
                            請準時抵達集合地點，全體學員下水後，不再另外安排下水
                        </p>
                    </div>
                </div><!-- npd-area6-box 結束 -->
            </div><!-- npd-area6 結束 -->
            <!---------------------- area6 集合資訊    html結束 -------------------->





            <!---------------------- area7 購買須知    html開始 -------------------->
            <div class="npd-area6">
                <!------------頁籤(area7購買須知)------------->
                <div class="npd-tab01-black">
                    <h3 class="npd-tab01-text">購買須知</h3>
                </div>

                <!----------資訊區(area7購買須知)------------->
                <div class="npd-area6-box container-md">
                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">溫馨提醒</h5>
                        <div class="col-md-10 col-sm-10 ">
                            <li>請準時抵達，逾時不候</li>
                            <li>下訂前請確定個人身體健康良好，有心臟病、高血壓、或突發性疾病者及孕婦，請勿報名參加</li>
                        </div>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">注意事項</h5>
                        <div class="col-md-10 col-sm-10">
                            <li>最晚在出發前10日確定是否成團，如未成團，費用全額退回。</li>
                            <li>本行程最晚在出發前5日發行前通知。</li>
                            <li>因交通、天氣等不可抗力因素所引起的時間延誤或行程取消時，我們將會為您辦理部分退款。</li>
                        </div>
                    </div>

                    <div class="npd-area6-boxText row">
                        <h5 class="col-md-2 col-sm-2">取消政策</h5>
                        <div class="col-md-10 col-sm-10">
                            <li>所選日期 8 天（含）之前取消，收取手續費 0%</li>
                            <li>所選日期 3 ~ 7 天之間取消，收取手續費 30%</li>
                            <li>所選日期 0 ~ 2 天之間取消，收取手續費 100%</li>
                        </div>
                    </div>

                </div><!-- npd-area6-box(area7購買須知) 結束 -->
            </div><!-- npd-area6(area7購買須知) 結束 -->

        </div><!-- npd-biggestBOX-insetBlank 結束 -->
    </div><!-- webcontainer npd-biggestBOX 結束 -->
    <!---------------------- area7 購買須知    html結束 -------------------->


    <!---------------------- area8 活動訂購/加購商品    html開始 -------------------->
    <div class="webcontainer npd-rwdcontainer ">
        <div class="npd-DownBOX gd-area8-pb">
            <form action="" method="POST">
                <div class="npd-area8 container-md gd-area8-pt">

                    <!------------------------------------ 活動訂購 ----------------------------->

                    <!-------- 送出按鈕 ----- -->
                    <div class="row gd-area8-m npd-form-group  d-flex justify-content-center">
                        <a class="btns btn-blue  btns2-npd" href="#" role="button">放入購物車</a>
                        <div class="npd-area8-btnblank col-1"></div>
                        <a class="btns btn-white  btns2-npd" href="#" role="button">直接結帳</a>
                    </div>

                </div><!-- npd-area8   container-md結束 -->
            </form><!-- form 結束 -->
        </div><!--活動訂購以後的npd-DownBOX結束 -->
    </div><!--活動訂購以後的webcontainer 結束 -->




<?php include __DIR__. '/__footer.php' ?>
<?php include __DIR__. '/__scripts.php' ?>

    <!-- 自己的script寫這邊 -->
    <script>
        TweenMax.to("#wave", 2, {
            attr: {
                d: "M0 120 Q360 180 720 120 T 2000 120 V240 H0 Z"
            },
            ease: Power1.easeInOut,
            repeat: -1,
            yoyo: true
        })
    </script>

    <!-------------   成員介紹   ---------------->
    <script>
        $(".gpd-area6-attentimgbox figure img").click(function(){
            $('.member-card').removeClass("gpd-hide")
        })

    </script>


<?php require __DIR__. '/__html_foot.php'?>