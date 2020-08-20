<?php require __DIR__. '/__connect_db.php';
$pageName = '';
?>

<?php include __DIR__. '/__html_head.php' ?>

<!-- 自己的樣式寫這邊 -->
<!-- <link rel="stylesheet" href="css/xxxxxx.css"> -->
<link rel="stylesheet" href="css/waveland.css">
<style>
       /*card*/
       .member-list-card {
            border: 1px solid #CECECE;
            flex-wrap: wrap;
            height: auto;

        }
        .npd-cancel-card{
            height: 250px;
            width: 100%;
            background: url("img/public-product-1.jpg") no-repeat center center;
        }

        .member-list-card>img {
            width: 100%;
            object-fit: cover;
        }

        .member-list-card-content {
            border-bottom: 7px solid #043F98;
            padding: 30px;
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
        }

        .member-list-card-content .activity-name {
            font-size: 18px;
            font-weight: 300;
            margin-bottom: 10px;
           
        }

        .activity-info img {
            height: 18px;
            vertical-align: middle;
            margin-top: -4px;
            margin-right: 10px;
        }

        .activity-info {
            line-height: 28px;
           
        }

        .activity-price{
            position: absolute;
            right: 20px;
            bottom: 20px;
            font-weight: 500;
        }

        .activity-price span{
            font-size: 18px;
        }

        .cancel-reason{
            height: 60px;
            width: 100%;
            padding:10px;
            position: relative;
            /* display: flex; */
        }
        .cancel-reason p{
            display: flex;
            flex-direction: column;
        }

        .cancel-reason a {
            position: absolute;
            right: 10px;
            bottom: 10px;
        }
        .npd-cancel-card{
            cursor: pointer;
        }
</style>

<?php include __DIR__. '/__navbar.php' ?>

<!-- body內容寫這邊 -->
<?php include __DIR__. '/__member_bar.php' ?>
<article class="member-list wrapper">
        <h3 class="main-color">已取消訂單</h3>
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
                <div class="member-list-card d-flex">
                    <!-- <img src="img/public-product-1.jpg" alt=""> -->

                    <div class="npd-cancel-card"></div>
                    <div class="member-list-card-content">
                        <div class="card-btns">
                            <svg class="Heart" width="25px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.93 23.27">
                            <g id="Heart"><path id="Heart-2" class="cls-1" d="M649.46,374.45a6.71,6.71,0,0,0-9.5-.06l-.07.06-.94.94-.94-.94a6.76,6.76,0,0,0-9.56,9.56l10.5,10.5,10.5-10.5a6.72,6.72,0,0,0,.07-9.5l-.07-.06"
                            transform="translate(-626.02 -371.95)" /></g></svg>
                        </div>
                        <p class="activity-num">訂單編號 0000000</p>
                        <p class="activity-name">【基隆象鼻岩】用最夯 SUP 立槳探訪
                            海上大象！</p>
                        <p class="activity-info"><img src="svg/svg-locat.svg" alt=""> 宜蘭-東澳</p>
                        <p class="activity-info"><img src="svg/svg-calendar.svg" alt=""> 2020/09/20</p>
                        <p class="activity-info"><img src="svg/svg-time.svg" alt=""> 3.5Hrs</p>
                        <p class="activity-price main-color">TWD <span>4000</span></p>
                    </div>
                    <div class="cancel-reason">
                        <p>取消原因：<span>超過付款時間</span></p> 
                        <a href="" class="btns btn-blue">加入購物車</a></div>

                </div>
            </section>
        </div>

    </article>

<?php include __DIR__. '/__footer.php' ?>
<?php include __DIR__. '/__scripts.php' ?>

<!-- 自己的script寫這邊 -->
<script>

</script>

<?php require __DIR__. '/__html_foot.php'?>