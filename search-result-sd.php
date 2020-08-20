<?php
require __DIR__. '/__connect_db.php';
$pageName = 'search-result';


$locate_id= isset($_GET['地區']) ? intval($_GET['地區']) : 3;
$type_id= isset($_GET['項目']) ? intval($_GET['項目']) : 8;

// --- 分類資料
$t_sql = "SELECT * FROM `categories`";
$t_rows = $pdo->query($t_sql)->fetchAll();


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <link rel="stylesheet" href="css/search-result.css">
    <!-- <link rel="stylesheet" href="css/xxxxxx.css"> -->
    <style>

    </style>

<?php include __DIR__. '/__navbar.php' ?>

    <!-- body內容寫這邊 -->
    <div class="kv">
        <svg class="kv-wave-bottom" xmlns="http://www.w3.org/2000/svg">
            <path id="wave" d="M0 120 Q360 60 720 120 T 2000 120 V240 H0 Z"></path>
            <img class="kv-wave-top" src="img/wave-animate.png" alt="">
            <img class="kv-logo-1" src="svg/svg-kv-logo-l.svg" alt="">
            <div class="webcontainer1">
                <div class="search-text">立即搜尋課程:</div>
                <form action="search-result-sd.php" method="" id="search-form" onsubmit="return false">
                    <div class="productList-search">

                        <div class="themeS themeDiv">
                            <div class="productlist-selecter">
                                <div class="selecter-topTitle"></div>

                                <select name="地區" class="form-list" id="form-list-1">
                                    <option value="" selected>選擇地區</option>

                                    <?php foreach ($t_rows as $t):
                                        if($t['parent_sid']==1):
                                            ?>
                                            <option class="form-list-locate" value="<?= $t['sid'] ?>" <?= $t['sid']==$locate_id ? 'selected' : '' ?>>
                                               <?= $t['name'] ?>
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
                                            <option value="<?= $t['sid'] ?>" <?= $t['sid']==$type_id ? 'selected' : '' ?>>
                                                <p><?= $t['name'] ?></p>
                                            </option>
                                        <?php
                                        endif;
                                    endforeach; ?>
                                </select>

                            </div>
                        </div>

                        <?php /*
                    <?php foreach ($types as $c): ?>
                        <div class="themeS themeDiv">
                            <div class="productlist-selecter">
                                <div class="selecter-topTitle"></div>

                                <select name="<?= $c['sid'] ?>" class="form-list" id="form-list-<?= $c['name'] ?>">
                                    <option value="" selected>選擇<?= $c['name'] ?></option>

                                    <?php foreach ($c['children'] as $c2): ?>
                                        <option value="<?= $c2['sid'] ?>"><p><?= $c2['name'] ?></p></option>
                                    <?php endforeach ?>

                                </select>

                            </div>
                        </div>
                    <?php endforeach ?>
 */ ?>
                        <a id="search-btn" href="javascript: getData()" role="button" class="S-btn">
                            <img src="svg/svg-search-white.svg" alt="">
                        </a>

                    </div>
                </form>
            </div>

            <div class="bread">
                <h6>課程列表></h6>
            </div>
        </svg>
    </div>
    <div class="ad-1">
    </div>
    <div class="ad-4">
        <img class="svg-wave-bottom" src="svg/svg-wave-bottom.svg" alt="">
        <div class="h1-bg">
            <div class="h1-text webcontainer">
<!--                <h1 class="h1-blue">搜尋"-->
<!--                    --><?php //foreach ($t_rows as $t):
//                        if($t['sid']==$locate_id or $t['sid']==$type_id):
//                            ?>
<!--                            --><?//= $t['name'] ?>
<!--                        --><?php
//                        endif;
//                    endforeach; ?>
<!--                    "的結果為...</h1>-->
                <h1 class="h1-blue" id="test"></h1>

            </div>
        </div>
        <div class="list-wrapper-big">
            <div class="webcontainer">
                <div class="list-selecter">

                    <div class="list-selecter-title">排序:</div>
                    <select class="form-list" id="select">
                        <option value="" class="searchList"><p>熱門主題</p></option>
                        <option value="price" class="searchList" ><p>價錢由低至高</p></option>
                        <option value="score" class="searchList"><p>評價由低至高</p></option>
                    </select>
                </div>
            </div>
                <div id="content" class="webcontainer">

                </div>

        </div>
    </div>

<?php include __DIR__. '/__footer_white.php' ?>
<?php include __DIR__. '/__scripts.php' ?>

    <!-- 自己的script寫這邊 -->
    <script>

        const $content = $('#content');
        let searchList;


        const likes = <?= empty($likes) ? '[]' : json_encode($likes) ?>;
        function cardUnitTpl(obj) {
            let active = likes.indexOf(obj.sid)===-1 ? '' : 'active';

            return `<div class="card3" data-sid="${obj.sid}">
                        <div class="card3Top">
                            <a href="nd_product.php?sid=${obj.sid}">
                                <img src="img/${obj.kv_img}.jpg" class="card-img-top" alt="">
                            </a>
                        </div>

                        <div class="card3Down">
                            <div class="card3DownBox">
                                <a class="card3title" href="nd_product-old.php?sid=${obj.sid}">
                                    ${obj.name}                               </a>
                                <div class="card3IntroIcon">
                                    <div class="card3Place card3Icon">
                                        <img src="svg/svg-locat.svg" alt="" width="12px">
                                        <p>${obj.locate}</p>
                                    </div>
                                    <div class="card3Time card3Icon">
                                        <img src="svg/svg-time.svg" alt="" width="12px">
                                        <p>${obj.time}</p>
                                    </div>
                                    <div class="card3Signed card3Icon">
                                        <img src="svg/svg-star.svg" alt="" width="12px">
                                        <p>${obj.score}</p>
                                    </div>
                                </div>

                                <div class="priceNheart">
                                    <div class="card3Price">
                                        <p>TWD</p>
                                        <p class="price">${obj.price}</p>
                                    </div>

                                    <svg type="button" onclick="whenLikeClick(event)" class="Heart like-btn" width="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.93 23.27">
                                        <g id="Heart">

                                            <path class="cls-1 ${active}" d="M649.46,374.45a6.71,6.71,0,0,0-9.5-.06l-.07.06-.94.94-.94-.94a6.76,6.76,0,0,0-9.56,9.56l10.5,10.5,10.5-10.5a6.72,6.72,0,0,0,.07-9.5l-.07-.06" transform="translate(-626.02 -371.95)"></path>

                                        </g>
                                    </svg>
                                </div>
                            </div>
                </div>`;
        }

        TweenMax.to("#wave", 2, {
            attr: {
                d: "M0 120 Q360 180 720 120 T 2000 120 V240 H0 Z"
            },
            ease: Power1.easeInOut,
            repeat: -1,
            yoyo: true
        })


        // $("#search-btn").click(function () {
        //     $("#search-form").submit();
        //
        // })

        function getData(){
            let locate_id = $('#form-list-1').val();
            let type_id = $('#form-list-2').val();
            history.pushState({地區:locate_id, 項目: type_id}, "", `?地區=${locate_id}&項目=${type_id}`);
            $.get('search-result-sd-api.php', {地區:locate_id, 項目: type_id}, function(data){
                if(data && data.rows && data.rows.length){
                    searchList = data.rows;
                    renderSearchList();
                    $("#select").val('');
                }
            }, 'json');
        }
        function renderSearchList() {
            if(searchList && searchList.length){
                $content.empty();
                for(let i of searchList){
                    $content.append(cardUnitTpl(i));
                }
                console.log(searchList)
            }
        }
        getData();

        //select 排列條件
        $("#select").change(function(){

            switch($(this).val()){
                case 'price':
                    searchList.sort(function(a,b){return a.price-b.price})
                    break;
                case 'score':
                    searchList.sort((a, b) => a.score - b.score);
                    break;
                default:
            }
            renderSearchList();
        })

        // searchList.sort(function(a,b){return a.price-b.price})
        // searchList.sort(function(a,b){return b.price-a.price})


        //搜尋結果的文字
        function getResult(){
            let locate_S = $('#form-list-1').find("option:selected").text();
            let type_S = $('#form-list-2').find("option:selected").text();
            if(locate_S==="選擇地區"){
                $('#test').text('搜尋"'+type_S+'"結果為...');
            }
            else if(type_S==="選擇項目"){
                $('#test').text('搜尋"'+locate_S+'"結果為...');
            }
            else {
                $('#test').text('搜尋"'+locate_S+type_S+'"結果為...');
            }

        }
        getResult();

        $('#search-btn').click(function () {
            getResult();
        })


        const $l_rows = <?= json_encode($l_rows) ?>;
        const like_btns = $('.like-btn');
        function whenLikeClick(event) {
            $(event.target).find('.cls-1').toggleClass('active');
            const card3 = $(event.target).closest('.card3');
            const sid = card3.attr('data-sid');
            const sendObj = {
                action: 'like',
                sid: sid,
            }
            console.log(sendObj)
            $.get('likes.php', sendObj, function(data){
                console.log(data);
            }, 'json');
        }


    </script>

<?php require __DIR__. '/__html_foot.php'?>