<?php require __DIR__ . '/__connect_db.php';
$search = isset($_GET['地區']) ? $_GET['地區'] : '';

//$locate_id= isset($_GET['地區']) ? intval($_GET['地區']) : ' ';
//$type_id= isset($_GET['項目']) ? intval($_GET['項目']) : ' ';

?>
<?php include __DIR__ . '/index__html_head.php' ?>
<?php include __DIR__ . '/__navbar_index.php' ?>
<style>
    .btns:hover {
        text-decoration: none;
        background: #ffffff;
        color: #043f98;
        border: 1px solid #043f98;
    }

    ::placeholder {
        color: #ffffff;
        font-weight: 300;
    }

    .npd-fixedbtn {
        width: 30px;
        height: auto;
        position: absolute;
        position: fixed;
        bottom: 20px;
        right: 10px;
        transition: 0.5s;
        z-index: 98;
    }

    .card3 {
        max-width: 328px;
        width: 33%;
        background-color: white;
        margin-bottom: 20px;
        transition: all 0.4s ease-in-out;
    }

    .card3:hover {
        transform: translate(0, -10px);
        box-shadow: 0 5px 15px #e5e5e5;
    }

    .indexFinishText{
        margin-top: 10px;
    }





    @media screen and (max-width: 800px) {
        .ad-4 {
            padding: 40px 0;
            min-height: 700px;
        }

        .h1-bg {
            /*background: #DFF1FB;*/
            margin-bottom: 0;
            background: url("../svg/svg-h2-1.svg") center center no-repeat;

        }

        .ad-4 .webcontainer2 {
            padding: 0 15px;
        }
        .indexFinishText{
            padding: 20px;
        }

    }

    @media screen and (max-width: 800px) {
        .card3 {
            width: 100%;
            margin: 0 auto 15px;
            display: flex;
            min-height: 120px;

        }

        .card3_date_GroupGo {
            padding-top: 0;
            width: 60px;
            height: 60px;
        }

        .card3_date_GroupGo .card3mon {
            font-size: 12px;
            line-height: 1.5;

        }

        .card3_date_GroupGo .card3date {
            margin-bottom: 0px;
            letter-spacing: 0.6px;
            line-height: 0.56;
            font-size: 18px;
            font-weight: 900;
        }

        .card3Down {
            width: 70%;
            margin-top: 0;
            position: relative;
            padding: 0;
            align-items: flex-start;
            padding: 10px;
        }

        .card3title {
            font-size: 16px;
            font-weight: 500;
        }

        .card3name p {
            margin: auto auto;
        }

        .card3IntroText p {
            line-height: 1.5rem;
            color: #3f464d;
            font-size: 12px;

        }

        .card3IntroIcon img {
            margin-right: 5px;
        }

        .card3IntroIcon p {
            font-size: 12px;
            color: #3f464d;
            line-height: 1.5;

        }

        .card3Price .price {
            font-size: 20px;
            font-weight: bold;
            margin-left: 5px;
            line-height: 1.5;
        }

        .card2star {
            height: 10px;
        }

        .card3titleSmall {
            font-size: 12px;
            font-weight: 500;
            width: 100%;
            color: #2186c4;
            margin-top: 5px;
        }
    }

    @media screen and (max-width:375px) {
        .h1-bg {
            padding-top: 50px;
        }

        .indexInsideText {
            max-width: 90px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .indexInsideTextP {
            max-width: 160px;
            overflow:hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            white-space: normal;
        }

        .card3 {
            width: 100%;
            height: 150px;
            margin: 0 auto 15px;
            display: flex;
            min-height: 120px;

        }
    }

</style>

<!------- 錨點按鈕 ------->
<a href="#npd-fixedbtn"> <img class="npd-fixedbtn" src="svg/svg-top.svg" alt=""></a>

<section id="npd-fixedbtn" class="indexFun">
    <div class="indexTopimg">
        <aside class="webcontainer indexTopWidth d-flex align-items-center">
            <div class="indexTextOne">
                Down to Start Your Advanture
            </div>
            <div class="indexLogofonet">
                <figure class="indexLogoOutside">
                    <img class="indexLogoWhite" src="svg/logoWhite.svg" alt="">
                    <h5 class="indexLogoTextInsde">
                        暢遊島嶼山水，<br>
                        以最美的角度與姿態
                    </h5>
                </figure>
            </div>
            <div class="indexSearch">
                <form action="search-result-sd.php" method="GET">
                    <div class="d-flex justify-content-between">
                        <input name="地區" class="input2" type="地區" placeholder="搜尋地名、景點與活動名稱" aria-label="地區">
                        <a type="submit" href=""><img src="svg/search.svg" alt=""></a>
                    </div>
                    <div class="indexdownLine"></div>
                    <a style="outline: none" class="btns btn-blue" role="button" href="search-result-sd.php?地區=&項目=8">帶我去冒險</a>
                </form>
            </div>
        </aside>
        <img class="indexSandBG2" src="img/index-kv-2.png" alt="">
        <img class="indexSandBG" src="img/index-kv-1.png" alt="">
    </div>
    <div class="rwdSandSet">
        <h5 class="indexSandText element3">
            嶼浪之間致力打造優質的水上活動平台，體驗水上活動的無窮樂趣。
            我們慎選合作教練、把你的安全視作最重要的一切。同時，讓您用最經濟實惠的價格購買到屬意的行程!
        </h5>

        <div class="indexSafeIcon d-flex justify-content-around">
            <div class="element2 indexSafeIconSpace d-flex flex-column align-items-center">
                <img class="indexSafeIconSize" src="svg/index-safe-icon.svg" alt="">
                <h6 class="indexSafeIconText">水上安全嚴格把關</h6>
            </div>
            <div class="element2 indexSafeIconSpace d-flex flex-column align-items-center">
                <img class="indexSafeIconSize" src="svg/index-safe-icon2.svg" alt="">
                <h6 class="indexSafeIconText">優惠價格保證</h6>
            </div>
            <div class="element2 d-flex flex-column align-items-center">
                <img class="indexSafeIconSize" src="svg/index-safe-icon3.svg" alt="">
                <h6 class="indexSafeIconText">快速預定快速出團</h6>
            </div>
        </div>
    </div>
    <aside class="oceanBody">
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
    </aside>
</section>

<section>
    <div class="indexSandSpace"></div>
</section>

<section>
    <div class="indexFiveIconCont webcontainer d-flex flex-column justify-content-center align-items-center">
        <h1 class="indexFiveIconH1">
            #質感夏日生活提案
        </h1>
        <div class="indexFiveIconRwd indexWebcontainer d-flex align-content-center">
            <!-- 1024以上內容 -->
            <div class="d-flex flex-column">
                <a class="indexFiveIconSize1" href="">
                    <!-- <img class="indexFiveIcon" src="svg/icon-sup.svg" alt=""> -->
                    <div class="indexFiveIconSize1Hover"></div>
                </a>
                <h4 class="indexFiveIconFont">立槳</h4>
            </div>

            <div class="d-flex flex-column">
                <a class="indexFiveIconSize2" href="">
                    <!-- <img class="indexFiveIcon" src="svg/icon-diving.svg" alt=""> -->
                </a>
                <h4 class="indexFiveIconFont">潛水</h4>
            </div>

            <div class="d-flex flex-column">
                <a class="indexFiveIconSize3" href="">
                    <!-- <img class="indexFiveIcon" src="svg/icon-rafting.svg" alt=""> -->
                </a>
                <h4 class="indexFiveIconFont">泛舟</h4>
            </div>

            <div class="d-flex flex-column">
                <a class="indexFiveIconSize4" href="">
                    <!-- <img class="indexFiveIcon" src="svg/icon-canoe.svg" alt=""> -->
                </a>
                <h4 class="indexFiveIconFont">獨木舟</h4>
            </div>

            <div class="d-flex flex-column">
                <a class="indexFiveIconSize5" href="">
                    <!-- <img class="indexFiveIcon" src="svg/icon-sailing.svg" alt=""> -->
                </a>
                <h4 class="indexFiveIconFont">風帆</h4>
            </div>
        </div>

        <!-- 1024以下內容 -->
        <div id="carouselExampleFade" class="webcontainer carousel" data-ride="carousel">
            <div class="carousel-inner d-flex justify-content-center">
                <div class="carousel-item active">
                    <a class="indexFiveIconSize" href="">
                        <img class="indexFiveIcon" src="svg/icon-sup.svg" alt="">
                        <h4 class="indexFiveIconFont2">立槳</h4>
                    </a>
                </div>
                <div class="carousel-item">
                    <a class="indexFiveIconSize" href="">
                        <img class="indexFiveIcon" src="svg/icon-diving.svg" alt="">
                        <h4 class="indexFiveIconFont2">潛水</h4>
                    </a>
                </div>
                <div class="carousel-item">
                    <a class="indexFiveIconSize" href="">
                        <img class="indexFiveIcon" src="svg/icon-rafting.svg" alt="">
                        <h4 class="indexFiveIconFont2">泛舟</h4>
                    </a>
                </div>
                <div class="carousel-item">
                    <a class="indexFiveIconSize" href="">
                        <img class="indexFiveIcon" src="svg/icon-canoe.svg" alt="">
                        <h4 class="indexFiveIconFont2">獨木舟</h4>
                    </a>
                </div>
                <div class="carousel-item">
                    <a class="indexFiveIconSize" href="">
                        <img class="indexFiveIcon" src="svg/icon-sailing.svg" alt="">
                        <h4 class="indexFiveIconFont2">風帆</h4>
                    </a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<section>
    <div id="indexSlideTall" class="indexSlideTall d-flex flex-column justify-content-between">
        <img class="indexSlideSpaceTop" src="img/index-spaceTop.png" alt="">
        <div>
            <img class="indexSlideText" src="svg/index-slide-text.svg" alt="">
        </div>
        <img class="indexSlideSpaceDown" src="img/index-spaceDown.png" alt="">
    </div>
</section>

<section>
    <div class="webcontainer indexOneCardTall d-flex align-items-center justify-content-between">
        <div class="element">
            <h4 class="indexOneCardFontH4">//每日出團</h4>
            <img class="indexFontSize" src="svg/index-font-2.svg" alt="">
            <p class="indexOneCardFontP">
                拋開生活的日復一日，來一場與海的約會。放慢腳步、放空自己，盡情擁抱未知的冒險。手握船漿、腳乘踏板，從岸邊出發的那一刻起，一點一滴喚醒身體裡無所畏懼的靈魂。經過海水的洗禮，我們再一次想起從前的勇敢和熱情。
            </p>
            <a class="btns btn-blue" href="" role="button">前往活動列表</a>
        </div>
        <img class="element1 indexOneCardPicOne" src="img/index-kv-11.png" alt="">
        <img class="element1 indexOneCardPicTwo" src="img/index-kv-12.png" alt="">
    </div>
</section>

<section>
    <div class="webcontainer indexTwoCardTall d-flex align-items-center justify-content-end">
        <img class="element indexTwoCardPicOne" src="img/index-kv-13.png" alt="">
        <img class="element indexTwoCardPicTwo" src="img/index-kv-14.png" alt="">
        <div class="element1">
            <h4 class="indexOneCardFontH4">//揪團行動</h4>
            <img class="indexFontSize" src="svg/index-font-1.svg" alt="">
            <p class="indexOneCardFontP">
                在生命裡，我們常常被迫接受各種安排、應付自己不想要的生活。在嶼浪之間，找到和頻率相近的朋友，陪你一起天南地北話家常。虛偽的社交對話不存在，這裡只留真誠的笑容。
            </p>
            <a class="btns btn-blue" href="" role="button">前往揪團列表</a>
        </div>
    </div>
</section>

<div class="indexPicDownTall">
    <div class="list-wrapper-big"></div>
</div>

<section class="ad-4 list-body">
    <img class="svg-wave-bottom" src="svg/svg-wave-botton.svg" alt="">
    <div class="h1-bg">
        <div class="h1-text element">
            <h1 class="h1-blue">會員商品評價</h1>
            <p class="indexFinishText">想知道其他人怎麼玩的嗎? 有體驗過最知道，觀看優質體驗內容</p>
        </div>
    </div>
    <div class="list-wrapper-big-big">
        <div class="webcontainer2">


            <div class="card3">

                <a href="nd_product.php?sid=1 #prolist01" style="text-decoration: none">
                    <div class="card3Top">
                        <div class="card3_date_GroupGo">
                            <p class="card3date">4.2</p>
                            <p class="card3mon"><img class="card2star" src="svg/index-card3-star.svg" alt=""></p>
                        </div>
                    </div>
                </a>



                <div class="card3Down">
                    <div class="card3DownBox">
                        <div class="d-flex align-items-center">
                            <img src="img/index-card3-girl2.png" alt="">
                            <div class="card3MikeMGtitle ">
                                <h4 class="card3title">方小文</h4>
                                <h5 class="card3titleSmall indexInsideText">SUP體驗-福隆古道團</h5>
                            </div>
                        </div>

                        <div class="card3IntroText">
                            <p class="indexInsideTextP">
                                初體驗事實上感覺不錯的，不過有些可惜的事，像是集合、著裝與環裝備程序有點混亂。但傍晚依然很熱、人多沒辦法，而更衣間沒置物架間數少真心覺得可惜。
                            </p>
                        </div>
                    </div> <!-- card3DownBox結束 -->
                </div><!-- card3Down結束 -->
            </div>


            <div class="card3">
                <a href="" style="text-decoration: none">
                    <div class="card3TopTwo">
                        <div class="card3_date_GroupGo">
                            <p class="card3date">4.7</p>
                            <p class="card3mon"><img class="card2star" src="svg/index-card3-star.svg" alt=""></p>
                        </div>
                    </div>
                </a>

                <div class="card3Down">
                    <div class="card3DownBox">
                        <div class="d-flex align-items-center">
                            <img src="img/index-card3-girl.png" alt="">
                            <div class="card3MikeMGtitle ">
                                <h4 class="card3title">Amy</h4>
                                <h5 class="card3titleSmall indexInsideText">珊瑚復育區生態浮潛</h5>
                            </div>
                        </div>

                        <div class="card3IntroText">
                            <p class="indexInsideTextP">
                                這次參加的是日出團，集合著裝後到伸手不見五指的沙灘，抬頭就是滿片天空的星星。聽完教練仔細講解，順利的在海上划出自己的第一步，看到日出的那一刻真的非常感動。
                            </p>
                        </div>

                    </div> <!-- card3DownBox結束 -->
                </div><!-- card3Down結束 -->
            </div>

            <div class="card3">
                <a href="" style="text-decoration: none">
                    <div class="card3TopThree">
                        <div class="card3_date_GroupGo">
                            <p class="card3date">4.8</p>
                            <p class="card3mon"><img class="card2star" src="svg/index-card3-star.svg" alt=""></p>
                        </div>
                    </div>
                </a>

                <div class="card3Down">
                    <div class="card3DownBox">
                        <div class="d-flex align-items-center">
                            <img src="img/index-card3-man2.png" alt="">
                            <div class="card3MikeMGtitle ">
                                <h4 class="card3title">Mark Yang</h4>
                                <h5 class="card3titleSmall indexInsideText">日月潭SUP體驗</h5>
                            </div>
                        </div>

                        <div class="card3IntroText">
                            <p class="indexInsideTextP">
                                這次參加的是日出團，集合著裝後到伸手不見五指的沙灘，抬頭就是滿片天空的星星。聽完教練仔細講解，順利的在海上划出自己的第一步，看到日出的那一刻真的非常感動。
                            </p>
                        </div>
                    </div> <!-- card3DownBox結束 -->
                </div><!-- card3Down結束 -->
            </div>

        </div>
    </div>
</section>
<?php require __DIR__ . '/__footer_white.php' ?>
<?php require __DIR__ . '/__scripts.php' ?>
<script src="js/vegas.js"></script>
<script src="js/skroll.min.js"></script>
<script>

    // slide 大圖
    $("#indexSlideTall").vegas({
        timer: false,
        transition: "swirlRight2",
        transitionDuration: 1200,
        delay: 4000,
        slides: [
            {src: "img/index-kv-7.jpg"},
            {src: "img/index-kv-3.jpg", transition: 'flash'},
            {src: "img/index-kv-10.jpg", transition: 'zoomOut'},
            {src: "img/index-kv-9.jpg", transition: 'flash'},
            {src: "img/index-kv-6.jpg", transition: 'zoomOut'},
        ],
    });

    //DIV滾動
    new Skroll()
        .add(".element1", {
            animation: "fadeInRight",
            mobile: true,
            delay: 200,
            duration: 1000,
            easing: "ease",
            wait: 0,
            triggerTop: .3,
            triggerBottom: .6

        })
        .init();


    new Skroll()
        .add(".element", {
            animation: "fadeInLeft",
            mobile: true,
            delay: 200,
            duration: 1000,
            easing: "ease",
            wait: 0,
            triggerTop: .3,
            triggerBottom: .6

        })
        .init();

    new Skroll()
        .add(".element2", {
            animation: "growInRight",
            mobile: true,
            delay: 50,
            duration: 600,
            easing: "ease",
            wait: 0,
            triggerTop: .3,
            triggerBottom: .6

        })
        .init();

    new Skroll()
        .add(".element3", {
            animation: "growInLeft",
            mobile: true,
            delay: 50,
            duration: 800,
            easing: "ease",
            wait: 0,
            triggerTop: .3,
            triggerBottom: .6

        })
        .init();

</script>
<?php require __DIR__ . '/__html_foot.php' ?>

<!--require 的置入方式是一定要有檔案  找不到檔案會報錯-->
<!--include 限制沒這麼高-->
