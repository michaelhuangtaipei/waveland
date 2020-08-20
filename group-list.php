<?php
require __DIR__. '/__connect_db.php';
$pageName = 'group-list';

//把揪團活動都拿出來
$sql= "SELECT * FROM `group-add` WHERE 1";
$rows =$pdo->query($sql)->fetchAll();

//抓最新揪團活動
$sql= "SELECT `sid`, `groupClass-name`, `courseName`, `groupClass-locate`, `groupClass-type`, `group-date`, `group-time`, `group-theme`, `group-type`, `group-message` FROM `group-add` ORDER BY `sid` DESC";
$n=$pdo->query($sql)->fetch();

?>

<?php include __DIR__. '/__html_head.php' ?>

<!-- 自己的樣式寫這邊 -->
    <link rel="stylesheet" href="css/group-list.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
<!-- <link rel="stylesheet" href="css/xxxxxx.css"> -->
<style>
    a {
        color: rgba(0,0,0,.9);
        text-decoration: none;
        background-color: transparent;
    }
    .card1title a {
        color: rgba(0,0,0,.9);
        text-decoration: none;
        background-color: transparent;
    }

</style>

<?php include __DIR__. '/__navbar.php' ?>

<!-- body內容寫這邊 -->
    <div class="kv" id="npd-fixedbtn">
        <svg class="kv-wave-bottom" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120 Q360 60 720 120 T 2000 120 V240 H0 Z"></path>
            <img class="kv-wave-top" src="img/wave-animate.png" alt="">
            <img class="kv-logo-1" src="svg/svg-kv-logo-l.svg" alt="">
            <div class="bread">
                <a>首頁>揪團列表</a>
            </div>
        </svg>
    </div>
    <!------- 錨點按鈕 ------->
    <a href="#npd-fixedbtn"> <img class="npd-fixedbtn" src="svg/svg-top.svg" alt=""></a>
    <a href="group-add.php"><img class="npd-fixedbtn2" src="svg/svg-bulidgroup.svg" alt=""></a>
    <!------- 主內容開始------->
    <div class="ad-1">
        <div class="left">
        </div>
        <div class="right">
            <img class="slogen-8" src="svg/svg-slogen-8.svg" alt="">
            <div class="ad-slogen">這個夏天，揪要和你在一起。</div>
            <a class="btns btn-blue" href="group-add.php" role="button">建立揪團>>></a>
        </div>

    </div>
    <div class="ad-2">
        <img class="svg-wave-bottom" src="svg/svg-wave-bottom.svg" alt="">
        <div class="h1-bg">
            <div class="h1-text">
                <h1><span class="h1-blue">"最新揪團"</span></h1>
                <h4>來場說走就走的冒險吧</h4>
            </div>
        </div>
        <div class="card1">
            <div class="card1Left">
<!--                列表card點出去會到該筆揪團的資料-->
                <a href="gd_product_get.php?sid=<?= $n['sid'] ?>" style="text-decoration:none;">
                    <img src="img/<?= $n['groupClass-name'] ?>-kv.jpg" class="cards-img-top" alt="" >
                </a>
                <div class="card1_date_GroupGo">

                    <p class="card1mon"><?php
                        $day = date('M', strtotime($n['group-date']));
                        print_r($day)
                        ?></p>

                    <p class="card1date"><?php
                        $day = date('d', strtotime($n['group-date']));
                        print_r($day)
                        ?></p>
                </div>
            </div>

            <div class="card1Right">
                <div class="card1RightBox">
                    <a class="card1title" href="gd_product_get.php?sid=<?= $n['sid'] ?>" style="text-decoration:none">
                        <div class="card1cate">
                            <h3>【揪團】</h3>
                        </div>
                        <div class="card1name">
                            <p><?= $n['courseName'] ?></p>
                        </div>

                    </a>
                    <div class="card1IntroText">
                        <p><?= $n['group-type'] ?> - <?= $n['group-theme'] ?></p>
                    </div>
                    <div class="card1IntroIcon">
                        <div class="card1Place card1Icon">
                            <img src="svg/svg-locat.svg" alt="" width="12px">
                            <p><?= $n['groupClass-locate'] ?></p>
                        </div>
                        <div class="card1Time card1Icon">
                            <img src="svg/svg-time.svg" alt="" width="12px">
                            <p>3.5Hrs</p>
                        </div>
                        <div class="card1Signed card1Icon">
                            <img src="svg/svg-mem.svg" alt="" width="12px">
                            <p>已有0人報名</p>
                        </div>

                    </div>
                    <div class="card1Price">
                        <p>TWD</p>
                        <p class='price'>2000</p>
                    </div>
                </div> <!-- card1RightBox結束 -->

                <div class="card1RightDown">
                    JOIN NOW
                </div>
            </div>
        </div>
        <!-- -----------card1結束------------------ -->
    </div>
    <div class="ad-3">
        <img class="svg-wave-bottom" src="svg/svg-wave-bottom-blue.svg" alt="">
        <div class="h1-bg">
            <div class="h1-text">
                <h1><span class="h1-blue">"熱門體驗"</span></h1>
                <h4>時間是不等人的，馬上卡位才是真的。</h4>
            </div>
        </div>
        <!--  --------揪團列表頁 card2 熱門活動-------- -->

        <div class="cardOutside d-flex justify-content-between">
            <div class="card2 d-flex align-items-end">
                <div class="card2Inside">
                    <div class="insideText">
                        <div class="card2cate">
                            <p>【揪團】</p>
                        </div>
                        <div class="card2name">
                            <p>象鼻岩獨木舟體驗</p>
                        </div>
                        <div class="card2IntroText">
                            <p>挑戰團 - 高手們划起來!!</p>
                        </div>
                        <div class="card2IntroIcon">
                            <div class="card2Place card2Icon">
                                <img src="svg/svg-locat.svg" alt="" width="12px">
                                <p>宜蘭-東澳</p>
                            </div>
                            <div class="card2Time card2Icon">
                                <img src="svg/svg-time.svg" alt="" width="12px">
                                <p>3.5Hrs</p>
                            </div>
                            <div class="card2Signed card2Icon">
                                <img src="svg/svg-mem.svg" alt="" width="12px">
                                <p>已有10人報名</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card2Right d-flex flex-column justify-content-between">
                <div class="card2top">

                        <div class="insideTextR">
                            <div class="card2cate">
                                <p>【揪團】</p>
                            </div>
                            <div class="card2name">
                                <p>東澳獨木舟體驗</p>
                            </div>
                            <div class="card2IntroText">
                                <p>挑戰團 - 夏日一起玩!</p>
                            </div>
                        </div>
                    <div class="card2top-inside"></div>

                    </div>


                <div class="card2down">
                    <div class="insideTextR">
                        <div class="card2cate">
                            <p>【揪團】</p>
                        </div>
                        <div class="card2name">
                            <p>烏岩角海蝕洞獨木舟體驗</p>
                        </div>
                        <div class="card2IntroText">
                            <p>休閒團 - 相約享受愜意午後時光</p>
                        </div>
                    </div>
                    <div class="card2top-inside"></div>


                </div>
                </div>

            </div>
        </div>
        <!-- -----------card2結束------------------ -->
    </div>
    <div class="ad-4">
        <img class="svg-wave-bottom" src="svg/svg-wave-bottom.svg" alt="">
        <div class="h1-bg">
            <div class="h1-text">
                <h1 class="h1-blue">體驗列表</h1>
                <h4>出發吧!原來探索世界可以這麼簡單!</h4>
            </div>
        </div>
        <div class="list-wrapper-big">
            <div class="webcontainer">
                <div class="list-selecter">

                    <div class="list-selecter-title">排序:</div>
                    <select class="form-list" id="exampleFormControlSelect1">
                        <option><p>熱門揪團</p></option>
                        <option><p>地區</p></option>
                        <option><p>時間</p></option>
                    </select>
                </div>
                <?php foreach($rows as $r): ?>
                    <div class="card3">
                        <div class="card3Top" >
                            <a href="gd_product_get.php?sid=<?= $r['sid'] ?>" style="text-decoration:none;">
                                <img src="img/<?= $r['groupClass-name']?>-kv.jpg" class="cards-img-top" alt="" >?>
                            </a>
                            <div class="card3_date_GroupGo">
                                <p class="card3mon"><?php
                                    $day = date('M', strtotime($r['group-date']));
                                    print_r($day)
                                    ?></p>

                                <p class="card3date"><?php
                                    $day = date('d', strtotime($r['group-date']));
                                    print_r($day)
                                    ?></p>
                            </div>

                        </div>

                        <div class="card3Down">
                            <div class="card3DownBox">
                                <a class="card3title" href="gd_product_get.php?sid=<?= $r['sid'] ?>">
                                    【揪團】<?= $r['courseName'] ?>
                                </a>

                                <div class="card3IntroText">
                                    <p><?= $r['group-type'] ."-".$r['group-theme'] ?></p>
                                </div>

                                <div class="card3IntroIcon">
                                    <div class="card3Place card3Icon">
                                        <img src="svg/svg-locat.svg" alt="" width="12px" >
                                        <p><?= $r['groupClass-locate'] ?></p>
                                    </div>
                                    <div class="card3Time card3Icon">
                                        <img src="svg/svg-time.svg" alt="" width="12px" >
                                        <p>3.5Hrs</p>
                                    </div>
                                    <div class="card3Signed card3Icon">
                                        <img src="svg/svg-mem.svg" alt="" width="12px" >
                                        <p><?= $r['join_count'] ?>人報名</p>
                                    </div>
                                </div>

                                <div class="card3Price">
                                    <p>TWD</p>
                                    <p class='price'>2000</p>
                                </div>

                            </div> <!-- card3DownBox結束 -->
                        </div><!-- card3Down結束 -->
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

<?php include __DIR__. '/__footer_white.php' ?>
<?php include __DIR__. '/__scripts.php' ?>

<!-- 自己的script寫這邊 -->
<script>
    TweenMax.to("path", 2, {
        attr: {
            d: "M0 120 Q360 180 720 120 T 2000 120 V240 H0 Z"
        },
        ease: Power1.easeInOut,
        repeat: -1,
        yoyo: true
    })
</script>

<?php require __DIR__. '/__html_foot.php'?>