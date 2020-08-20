<?php require __DIR__. '/__connect_db.php';
$pageName = 'member-group';

$member_id= $_SESSION['members']['id'];
$sql = "SELECT * FROM `group-add` WHERE member_id=? ";
$stmt = $pdo->prepare($sql);
$stmt ->execute([$member_id]);
$rows = $stmt->fetchAll();


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
            position: relative;
        }

        .activity-date{
            background: #043f98;
            position: absolute;
            top: 0;
            left: 0;
            color: #fff;
            text-align: center;
            line-height: 1;
            padding: 10px;
        
        }

        .activity-date .month{
            font-size: 16px;
            font-weight: 900;
        }

        .activity-date .day {
            font-size: 42px;
            font-weight: 900;

        }

        .member-list-card>img {
            width: 40%;
            object-fit: cover;
        }

        .member-list-card-content {
            border-bottom: 7px solid #043F98;
            padding: 30px 15px 10px 15px;
            flex-grow: 1;
            position: relative;

        }
        .activity-comment p{
            position: absolute;
            bottom: 10px;
            right: 15px; 
        }
        @media screen and (max-width:576px){
        .activity-comment p{
            position: unset;

        }
        }
        .member-list-card-content .card-btns {
            position: absolute;
            right: 10px;
            top: 10px;
            letter-spacing: 10px;
        }


        .member-list-card-content .activity-num {
            margin-bottom: 10px;
        }

        .member-list-card-content .activity-name {
            font-size: 18px;
            font-weight: 300;
            margin-bottom: 10px;

        }

        .activity-info img {
            width: 18px;
            height: 18px;
            vertical-align: middle;
            margin-top: -4px;
            margin-right: 10px;
        }

        .activity-info {
            line-height: 28px;

        }

        .activity-comment {
   
            text-align: end;
        }

        .activity-comment i {
            font-size: 10px;
        }

        .activity-comment p {
            font-size: 14px;
            margin-top: 5px;
            font-weight: 500;
            color: #7AC943;
        }

        .activity-comment .small {
            font-size: 12px;
            margin-bottom: 5px;
            font-weight: 300;
            color: #AFAFAF;
        }
</style>

<?php include __DIR__. '/__navbar.php' ?>

<!-- body內容寫這邊 -->
<?php include __DIR__. '/__member_bar.php' ?>


    <article class="member-list wrapper">
        <h3 class="main-color">我建立的揪團</h3>
      
        
            <section>
                <?php foreach($rows as $r): ?>
                <div class="member-list-card d-flex">
                    <div class="activity-date">
                        <p class="month"><?php
                        $day = date('M', strtotime($r['group-date']));
                        print_r($day)
                        ?></p>
                        <p class="day"><?php
                        $day = date('d', strtotime($r['group-date']));
                        print_r($day)
                        ?></p>
                    </div>
                    <img src="img/<?= $r['groupClass-name']?>-kv.jpg" alt="">
                    <div class="member-list-card-content">
                        <div class="card-btns">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <p class="activity-num">揪團編號 <?= $r['sid'] ?></p>
                        <p class="activity-name"><?= $r['courseName'] ?></p>
                        <p><?= $r['group-theme'] ?></p>
                        <p class="activity-info"><img src="svg/svg-locat.svg" alt=""> <?= $r['groupClass-locate'] ?></p>
                        <p class="activity-info"><img src="svg/svg-time.svg" alt=""> <?= $r['group-time'] ?></p>
                        <p class="activity-info"><img src="svg/svg-mem.svg" alt=""> 已有<?= $r['join_count'] ?>人報名 </p>
                        <div class="activity-comment"><p>揪團截止日 <?php
                        $deadline = $r['group-date'];
                        $deadline = date("Y-m-d", strtotime($deadline."-1 week"));
                        print_r($deadline)
                        ?></p>
                            <!-- <p>還差 3 人滿團</p> -->
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>





            </section>
       

    </article>

    <article class="member-list wrapper">
        <h3 class="main-color">過去揪團</h3>
        <div class="d-flex">
        
            <section>
                <div class="member-list-card d-flex">
                    <img src="img/public-product-1.jpg" alt="">
                    <div class="member-list-card-content">
                    
                        <p class="activity-num">揪團編號 0000000</p>
                        <p class="activity-name">【基隆象鼻岩】用最夯 SUP 立槳探訪
                            海上大象！</p>
                        <p class="activity-info"><img src="svg/svg-locat.svg" alt=""> 宜蘭-東澳</p>
                        <p class="activity-info"><img src="svg/svg-calendar.svg" alt=""> 2020/09/20 04:00AM </p>
                        <p class="activity-info"><img src="svg/svg-time.svg" alt=""> 3.5Hrs</p>
                        <div class="activity-comment"><a href="" class="btns btn-blue">再揪一次</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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



</script>

<?php require __DIR__. '/__html_foot.php'?>