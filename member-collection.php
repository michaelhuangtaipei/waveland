<?php require __DIR__. '/__connect_db.php';
$pageName = 'member-collection';

$sql= "SELECT * FROM `product-test` WHERE 1";
$rows =$pdo->query($sql)->fetchAll();

$member_sid= intval($_SESSION['members']['id']);
$l_sql = "SELECT `product_sid` FROM `likes` WHERE `member_sid`=?";
$l_stmt = $pdo->prepare($l_sql);
$l_stmt->execute([$member_sid]);
$l_rows=$l_stmt->fetchAll();
$likes=array_column($l_rows, 'product_sid');


$d_sql = sprintf("SELECT * FROM `product-test` p 
JOIN `likes` l 
ON p.sid = l.product_sid 
WHERE l.`member_sid`=$member_sid AND p.sid IN (%s)", implode(',', $likes));

$d_rows = $pdo->query($d_sql)->fetchAll();


?>

<?php include __DIR__. '/__html_head.php' ?>

<!-- 自己的樣式寫這邊 -->
<!-- <link rel="stylesheet" href="css/xxxxxx.css"> -->
<link rel="stylesheet" href="css/waveland.css">


<style>
    
/* --------揪團列表頁 card3 商品小卡--------*/ 
.webcontainer {
    max-width: 1024px;
    margin: 0 auto;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
}


.card3 {
    max-width: 328px;
    width: 33%;
    background-color: white;
    margin-bottom: 20px;
    border: 1px solid #CECECE;
}

.card3Top {
    width: 100%;
    height: 219px;
    background: url("../img/2-kv.jpg") center center no-repeat;
    background-size: cover;
}
.card-img-top{
    height: 100%;
    object-fit: cover;
    border-radius: 0px;
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
a.card3title {
    text-decoration: none;
    color: black;
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
    .card3DownBox{
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

.cls-1 {
    fill: none;
    stroke: #afafaf;
    stroke-miterlimit: 10;
    }
    
    .cls-1.active {
    fill: #cd5c5c;
    stroke:none;
    }

/* -------------card3 CSS結束 ---------------*/

</style>

<?php include __DIR__. '/__navbar.php' ?>

<!-- body內容寫這邊 -->
<?php include __DIR__. '/__member_bar.php' ?>


    <article class="member-list wrapper">
        <h3 class="main-color">我的收藏</h3>
      
        <div class="list-wrapper-big">
        <div class="webcontainer">

            <?php foreach($d_rows as $d): ?>
                <div class="card3" data-sid="<?= $d['product_sid'] ?>">
                    <div class="card3Top">
                        <a href="nd_product.php?sid=<?= $d['product_sid'] ?>">
                            <img src="img/<?= $d['kv_img']?>.jpg" class="card-img-top" alt="" >
                        </a>
                    </div>

                    <div class="card3Down">
                        <div class="card3DownBox">
                            <a class="card3title" href="nd_product-old.php?sid=<?= $d['product_sid'] ?>">
                                <?= $d['name'] ?>
                            </a>

                            <div class="card3IntroIcon">
                                <div class="card3Place card3Icon">
                                    <img src="svg/svg-locat.svg" alt="" width="12px">
                                    <p><?= $d['locate'] ?></p>
                                </div>
                                <div class="card3Time card3Icon">
                                    <img src="svg/svg-time.svg" alt="" width="12px">
                                    <p><?= $d['time'] ?></p>
                                </div>
                                <div class="card3Signed card3Icon">
                                    <img src="svg/svg-star.svg" alt="" width="12px">
                                    <p><?= $d['score'] ?></p>
                                </div>
                            </div>

                            <div class="priceNheart">
                                <div class="card3Price">
                                    <p>TWD</p><p class='price'><?= $d['price'] ?></p>
                                </div>

                                <svg type="button" class="Heart like-btn" width="25px"  xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 25.93 23.27">
                                    <g id="Heart">

                                        <path class="cls-1 <?=in_array($d['product_sid'],$likes) ?'active':'' ?>"
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
        <?php print_r($d_rows)?>
   

    </article>


<?php include __DIR__. '/__footer.php' ?>
<?php include __DIR__. '/__scripts.php' ?>

<!-- 自己的script寫這邊 -->
<script>
    $("#checkMore").click(function () {
            $('.member-card-lightbox').addClass("active")

    })

    $("#closeBtn").click(function () {
            $('.member-card-lightbox').removeClass("active")

    })

        $(".seeMore").click(function (){
            $(this).closest(".comment-content").find(".comment-text").toggleClass("active")
        })


        // 收藏愛心
        const $l_rows = <?= json_encode($l_rows) ?>;
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

        setTimeout(function () {
            window.location.reload();
         }, 500);

        });
</script>

<?php require __DIR__. '/__html_foot.php'?>