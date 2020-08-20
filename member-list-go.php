<?php require __DIR__. '/__connect_db.php';
$pageName = 'member-list-go';

$member_id= $_SESSION['members']['id'];
$sql = "SELECT * FROM `orders` WHERE member_id=? ";
$stmt = $pdo->prepare($sql);
$stmt ->execute([$member_id]);
$rows = $stmt->fetchAll();

$order_sids = array_column($rows, 'sid');

// print_r($order_sids)

$d_sql = sprintf("SELECT * FROM `order_detail` d 
JOIN `product-test` p 
ON d.product_id = p.sid 
WHERE d.order_sid IN (%s)", implode(',', $order_sids));

$d_rows = $pdo->query($d_sql)->fetchAll();


//like function
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
<link rel="stylesheet" href="css/waveland.css">


<style>
   


    /*card*/
    .member-list-card {
        border: 1px solid #CECECE;
        margin-bottom: 20px;
    }

    .member-list-card>img {
        width: 40%;
        object-fit: cover;
    }

    .member-list-card-content {
        border-bottom: 7px solid #043F98;
        padding: 30px 10px;
        flex-grow: 1;
        position: relative;
    }

    .member-list-card-content .card-btns {
        position: absolute;
        right: 10px;
        top: 10px;
        letter-spacing: 10px;
        display: flex;
        flex-direction: row;
        align-content: center;
        justify-content: space-between;
    }
    .member-list-card-content .card-btns svg{
        padding-right: 5px;
    }
    .member-list-card-content .card-btns i{
        margin-left: 5px;
    }

    .member-list-card-content .activity-num {
        margin-bottom: 10px;
        margin-top: 5px;
    }

    .member-list-card-content .activity-name {
        font-size: 18px;
        font-weight: 300;
        margin-bottom: 30px;
    }

    .activity-info {
        line-height: 28px;
        display: flex;
    }

    .activity-info div img {
        height: 18px;
        margin-right: 5px;
        margin-top: -4px;
    }

    .activity-info div{
        margin-right: 14px
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

    .member-notice{
        margin-bottom: 100px;
    }

    .member-notice h5{
        margin-bottom: 10px;
    }

    
</style>

<?php include __DIR__. '/__navbar.php' ?>

<!-- body內容寫這邊 -->
<?php include __DIR__. '/__member_bar.php' ?>

    <article class="member-list wrapper">
        <h3 class="main-color">即將出發</h3>
        <div class="d-flex">
            <aside>
                <ul>
                    <li><a href="member-list-go.php">即將出發</a></li>
                    <li><a href="member-list-unpaid.php">未付款訂單</a></li>
                    <li><a href="member-list-history.php">歷史訂單</a></li>
                    <li><a href="member-list-cancel.php">已取消訂單</a></li>
                </ul>
            </aside>
            <section>

            <?php foreach($d_rows as $d): ?>

                <div class="member-list-card d-flex" data-sid="<?= $d['product_id'] ?>">

                    <img src="img/<?= $d['kv_img'] ?>.jpg" alt="">
                    <div class="member-list-card-content">
                        <div class="card-btns">
                        <svg type="button" class="Heart like-btn" width="25px"  xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 25.93 23.27">
                                    <g id="Heart">

                                        <path class="cls-1 <?=in_array($d['product_id'],$likes) ?'active':'' ?>"
                                              d="M649.46,374.45a6.71,6.71,0,0,0-9.5-.06l-.07.06-.94.94-.94-.94a6.76,6.76,0,0,0-9.56,9.56l10.5,10.5,10.5-10.5a6.72,6.72,0,0,0,.07-9.5l-.07-.06"
                                              transform="translate(-626.02 -371.95)" />

                                    </g>
                                </svg>
                        </div>
                        <p class="activity-num">訂單編號 <?= $d['order_sid']?></p>
                        <p class="activity-name"><?= $d['name']?></p>
                        <div class="activity-info">
                            <div><img src="svg/svg-calendar.svg" alt=""><?=$d['date']?></div>
                            <div><img src="svg/svg-locat.svg" alt=""><?=$d['locate']?></div>
                        </div>
                        <p class="activity-info">成人 x <?=$d['adult_qty']?> 小孩 x <?=$d['child_qty']?></p>
                    </div>

                </div>
            <?php endforeach; ?>

            
            </section>
        </div>

    </article>


    <article class="member-notice wrapper">
        <hr>
        <h5>注意事項</h5>
        <p>收到您的款項後，才能替您確認訂單名額。當您完成繳費後，才會收到 waveland 憑證。未完成繳費前，不代表訂單名額已被保留。</p>

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
        const like_btns = $('.like-btn');
        like_btns.click(function () {
        $(this).find('.cls-1').toggleClass('active');
        const card = $(this).closest('.member-list-card');
        const sid = card.attr('data-sid');
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