<?php require __DIR__. '/__connect_db.php';
$pageName = 'member-coupon';
?>

<?php include __DIR__. '/__html_head.php' ?>

<!-- 自己的樣式寫這邊 -->
<!-- <link rel="stylesheet" href="css/xxxxxx.css"> -->
<link rel="stylesheet" href="css/waveland.css">
<style>
 .coupon-form {
            max-width: 1024px;
            margin: 80px auto;

        }

        .coupon-form section {
            margin-bottom: 150px;
        }

        .coupon-form h3 {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .mem-table-center{
        text-align: center;
         }
        .mem-table-head{
        background-color:#043f98;
        color: white;
         }
</style>

<?php include __DIR__. '/__navbar.php' ?>
<?php include __DIR__. '/__member_bar.php' ?>
<!-- body內容寫這邊 -->
<!-- 表格 -->
<article class="coupon-form wrapper">
        <section class="coupon-info">
            
                <h3 class="main-color">我的折價券</h3>
                <table class="table table-bordered mem-table-center">
                    <tr class="mem-table-head">
                        <th>折價券名稱</th>
                        <th>序號</th>
                        <th>面額</th>
                        <th>使用狀態</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>新會員見面禮</td>
                            <td>new100</td>
                            <td>TWD 100元</td>
                            <td class="mem-coupon-used">已使用</td>
                        </tr>
                        <tr>
                            <td>振興券加碼優惠</td>
                            <td>8881688</td>
                            <td>兩件9折</td>
                            <td class="mem-coupon-unused">未使用</td>
                        </tr>
                    </tbody>
                </table>

               
        </section>


        

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