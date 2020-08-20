
<?php require __DIR__. '/__connect_db.php';
$pageName = 'product-list';
$perPage = 9;


// --- 分類資料
$t_sql = "SELECT * FROM `categories`";
$t_rows = $pdo->query($t_sql)->fetchAll();
$types= [];
foreach ($t_rows as $i){
    if($i['parent_sid']==0){
        $types[] = $i;
    }
}
foreach ($types as $k=>$c){

    foreach ($t_rows as $i){
        if ($i['parent_sid']==$c['sid']){
            $types[$k]['children'][]=$i;
        }
    }
}
$sql= "SELECT * FROM `product-test` WHERE 1";
$rows = $pdo->query($sql)->fetchAll();

$member_sid=$_SESSION['members']['id'];
$l_sql = "SELECT `product_sid` FROM `likes` WHERE `member_sid`=?";
$l_stmt = $pdo->prepare($l_sql);
$l_stmt->execute([

        $member_sid
    ]
);
$l_rows=$l_stmt->fetchAll();
$likes=array_column($l_rows, 'product_sid');

?>

<?php include __DIR__. '/__html_head.php' ?>

<!-- 自己的樣式寫這邊 -->
<!-- <link rel="stylesheet" href="css/xxxxxx.css"> -->
<link rel="stylesheet" href="css/product-list.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>

<style>

</style>

<?php include __DIR__. '/__navbar.php' ?>

<!-- body內容寫這邊 -->
<div class="kv">
    <svg class="kv-wave-bottom" xmlns="http://www.w3.org/2000/svg">
        <path id="wave" d="M0 120 Q360 60 720 120 T 2000 120 V240 H0 Z"></path>
        <img class="kv-wave-top" src="img/wave-animate-new2.png" alt="">
        <img class="kv-logo-1" src="svg/svg-kv-logo-l.svg" alt="">
        <div class="webcontainer1">
            <div class="search-text">立即搜尋課程:</div>
            <form action="search-result-sd.php" method="" id="search-form">
                <div class="productList-search">

                    <div class="themeS themeDiv">
                        <div class="productlist-selecter">
                            <div class="selecter-topTitle"></div>

                            <select name="地區" class="form-list" id="form-list-1">
                                <option value="" selected>選擇地區</option>

                                <?php foreach ($t_rows as $t):
                                    if($t['parent_sid']==1):
                                        ?>
                                        <option value="<?= $t['sid'] ?>">
                                            <p><?= $t['name'] ?></p>
                                        </option>
                                    <?php
                                    endif;
                                endforeach; ?>
                            </select>

                        </div>
                    </div>
                    <div class="themeS themeDiv">
                        <div class="productlist-selecter">
                            <div class="selecter-topTitle"></div>

                            <select name="項目" class="form-list" id="form-list-2">
                                <option value="" selected>選擇項目</option>

                                <?php foreach ($t_rows as $t):
                                    if($t['parent_sid']==2):
                                        ?>
                                        <option value="<?= $t['sid'] ?>">
                                            <p><?= $t['name'] ?></p>
                                        </option>
                                    <?php
                                    endif;
                                endforeach; ?>
                            </select>

                        </div>
                    </div>

                    <a id="search-btn" type="submit" role="button" class="S-btn"><img src="svg/svg-search-white.svg" alt=""></a>

                </div>
            </form>
        </div>

        <div class="bread">
            <a>首頁>課程列表</a>
        </div>
    </svg>
</div>
<div class="ad-1">
</div>
<div class="ad-2">
    <img class="svg-wave-bottom" src="svg/svg-wave-bottom.svg" alt="">
    <div class="h1-bg">
        <div class="h1-text">
            <h1><span class="h1-blue">"熱門"</span>景點，新視角</h1>
            <h4>不盡興，直到筋疲力盡。</h4>
        </div>
    </div>
    <div class="card1">
        <div class="card1Left"></div>

        <div class="card1Right">
            <div class="card1RightBox">
                <div class="card1title">
                    <div class="card1cate">

                    </div>
                    <div class="card1name">
                        <p>東澳粉鳥林獨木舟體驗</p>
                    </div>

                </div>

                <div class="card1IntroIcon">
                    <div class="card1Place card1Icon">
                        <img src="svg/svg-locat.svg" alt="" width="12px">
                        <p>宜蘭-東澳</p>
                    </div>
                    <div class="card1Time card1Icon">
                        <img src="svg/svg-time.svg" alt="" width="12px">
                        <p>3.5Hrs</p>
                    </div>
                </div>
                <div class="card1Star">
                    <div class="card1Place card1Icon">
                        <img src="svg/svg-star.svg" alt="" width="12px">
                        <p>4.8</p>
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
            <h1><span class="h1-blue">"私藏體驗"</span></h1>
            <h4>時間是不等人的，馬上卡位才是真的。</h4>
        </div>
    </div>
    <!--  --------揪團列表頁 card2 熱門活動-------- -->

    <div class="cardOutside d-flex justify-content-between">
        <div class="card2 d-flex align-items-end">
            <div class="card2Inside">
                <div class="insideText">
                    <div class="card2cate">

                    </div>
                    <div class="card2name">
                        <p>烏岩角海蝕洞獨木舟體驗</p>
                    </div>
                    <div class="card2IntroText">
                        <p>挑戰團 - 高手高手高高手一起玩!</p>
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

                    </div>
                </div>
            </div>
        </div>
        <div class="card2Right d-flex flex-column justify-content-between">
            <div class="card2top"></div>
            <div class="card2down"></div>
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
                    <option><p>熱門主題</p></option>
                    <option><p>地區</p></option>
                    <option><p>項目</p></option>
                </select>
            </div>
            <?php foreach($rows as $r): ?>
                <div class="card3" data-sid="<?= $r['sid'] ?>">
                    <div class="card3Top">
                        <a href="nd_product.php?sid=<?= $r['sid'] ?>">
                            <img src="img/<?= $r['kv_img']?>.jpg" class="card-img-top" alt="" >
                        </a>
                    </div>

                    <div class="card3Down">
                        <div class="card3DownBox">
                            <a class="card3title" href="nd_product.php?sid=<?= $r['sid'] ?>">
                                <?= $r['name'] ?>
                            </a>

                            <div class="card3IntroIcon">
                                <div class="card3Place card3Icon">
                                    <img src="svg/svg-locat.svg" alt="" width="12px">
                                    <p><?= $r['locate'] ?></p>
                                </div>
                                <div class="card3Time card3Icon">
                                    <img src="svg/svg-time.svg" alt="" width="12px">
                                    <p><?= $r['time'] ?></p>
                                </div>
                                <div class="card3Signed card3Icon">
                                    <img src="svg/svg-star.svg" alt="" width="12px">
                                    <p><?= $r['score'] ?></p>
                                </div>
                            </div>

                            <div class="priceNheart">
                                <div class="card3Price">
                                    <p>TWD</p><p class='price'><?= $r['price'] ?></p>
                                </div>

                                <svg type="button" class="Heart like-btn" width="25px"  xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 25.93 23.27">
                                    <g id="Heart">

                                        <path class="cls-1 <?=in_array($r['sid'],$likes) ?'active':'' ?>"
                                              d="M649.46,374.45a6.71,6.71,0,0,0-9.5-.06l-.07.06-.94.94-.94-.94a6.76,6.76,0,0,0-9.56,9.56l10.5,10.5,10.5-10.5a6.72,6.72,0,0,0,.07-9.5l-.07-.06"
                                              transform="translate(-626.02 -371.95)" />

                                    </g>
                                </svg>
                            </div>


                        </div> <!-- card3DownBox結束 -->
                    </div><!-- card3Down結束 -->
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<!-- body內容寫這邊 -->


<?php include __DIR__. '/__footer_white.php' ?>
<?php include __DIR__. '/__scripts.php' ?>

<!-- 自己的script寫這邊 -->

<script>
    <!-- kv動畫 -->
    TweenMax.to("#wave", 2, {
        attr: {
            d: "M0 120 Q360 180 720 120 T 2000 120 V240 H0 Z"
        },
        ease: Power1.easeInOut,
        repeat: -1,
        yoyo: true
    })
</script>
<script>
    <!-- 收藏愛心功能 -->
    const $l_rows = <?= json_encode($l_rows) ?>;
    $("#search-btn").click(function () {
        $("#search-form").submit();
    })

    const like_btns = $('.like-btn');
    like_btns.click(function () {
        $(this).find('.cls-1').toggleClass('active');
        const card3 = $(this).closest('.card3');
        const sid = card3.attr('data-sid');
        const sendObj = {
            action: 'like',
            sid: sid,
        }
        console.log(sendObj)
        $.get('likes.php', sendObj, function(data){
            console.log(data);
        }, 'json');
    });

</script>

<?php require __DIR__. '/__html_foot.php'?>