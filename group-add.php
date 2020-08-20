
<?php
require __DIR__. '/__connect_db.php';
$pageName = 'group-add';

// --- 匯入全部課程名稱
$product_id = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql= "SELECT * FROM `product-test` WHERE 1";
$rows = $pdo->query($sql)->fetchAll();

// --- 課程名稱相對應的地區和項目
$t_sql = "SELECT * FROM `categories`";
$t_rows = $pdo->query($t_sql)->fetchAll();

?>

<?php include __DIR__. '/__html_head.php' ?>

<!-- 自己的樣式寫這邊 -->
<link rel="stylesheet" href="css/group-add.css">
<link rel="stylesheet" href="css/bootstrap-datetimepicker.css">

<!-- <link rel="stylesheet" href="css/xxxxxx.css"> -->
<style>

</style>

<?php include __DIR__. '/__navbar.php' ?>

<!-- body內容寫這邊 -->
<div class="member-kv">
    <img class="kv-wave" src="img/wave-animate.png" alt="">

</div>

<!-- 表格 -->
<article class="member-form wrapper">
    <section class="group-info">
        <h3 class="main-color">關於揪團</h3>
        <p>如何揪團呢?請先選擇喜愛的課程，和日期及時段。身為一個優秀的團主，
            別忘了取一個團名唷!最後最後，告訴大家你嚮往怎樣的體驗型態，
            留言給你未來的團員吧!詳細的揪團內容能幫助你找到適合的夥伴，並且增加成團的機率，
            希望你們有一趟美好的揪團體驗!出發吧，夥伴們！</p>
    </section>


    <form name="addGroup" method="post" onsubmit="return formCheck()">
        <section class="member-info">
            <h3 class="main-color">選擇課程</h3>
            <input type="hidden" name="courseName" id="courseName">
            <div class="member-form-group">
                <label for="groupClass-name">課程名稱</label><br>
                <select name="groupClass-name" class="input-100" id="groupClass-name" required>
                    <option value="" selected disabled>請選擇</option>
                    <?php foreach($rows as $r): ?>
                        <option value="<?= $r['sid'] ?>"><?= $r['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="member-form-flex">
                <div class="member-form-group input-48">
                    <label for="groupClass-locate">地區</label><br>
                    <input type="text" name="groupClass-locate" class="form-list" id="groupClass-locate">


                </div>
                <div class="member-form-group input-48">
                    <label for="groupClass-type">項目</label><br>
                    <input type="text" name="groupClass-type" class="form-list" id="groupClass-type" >

                </div>
            </div>
            <div class="member-form-flex">
                <div class="member-form-group input-48">
                    <label for="group-date">日期</label><br>
                    <input class="form_datetime" type="date" id="group-date" name="group-date"><br>

                </div>

                <div class="member-form-group input-48">
                    <label for="group-time">時段</label><br>
                    <select name="group-time" class="form-list " id="group-time" required>
                        <option class="op-selected" value="" selected disabled>請選擇</option>
                        <option>6:00-9:30</option>
                        <option>8:30-11:00</option>
                        <option>15:00-18:30</option>
                    </select>
                </div>
            </div>


        </section>

        <section class="member-pw">

            <h3 class="main-color">主題敘述</h3>
            <div class="member-form-group">
                <label for="group-theme">揪團主題</label><br>
                <input type="text" id="group-theme" name="group-theme" class="input-100"
                       placeholder="請輸入10個字以內的主題名稱"><br>

            </div>

            <div class="member-form-group">
                <label for="group-type">主題分類</label><br>
                <select name="group-type" class="input-100" id="group-type" required>
                    <option value="" selected disabled>請選擇</option>
                    <option>挑戰冒險團</option>
                    <option>輕鬆休閒團</option>

                </select>
            </div>

            <div class="member-form-group">
                <label for="group-message">主揪留言</label><br>
                <textarea type="text" id="group-message" name="group-message" class="input-100 group-message"
                          placeholder="請輸入100個字以內的主題敘述。"></textarea><br>

            </div>

            <div class="form-btns">
                <a id="add-btn" type="submit" role="button" class="btns btn-blue" href="gd_product-old.php">送出</a>
            </div>


        </section>
    </form>
</article>
<!-- 表格end -->


<?php include __DIR__. '/__footer.php' ?>
<?php include __DIR__. '/__scripts.php' ?>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
<!-- 自己的script寫這邊 -->
<script>









    <!-- 主題名稱change之後地區和項目自動更新 -->
    $("#groupClass-name").change(function(){
        let val=$(this).val();
        console.log(val)
        course = courseData.find(element => element.sid == val);
        console.log(course)
        $('#groupClass-locate').val(course.locate)
        $('#groupClass-type').val(course.type)
        $("#courseName").val(course.name)
    })

    <!-- 提交表單 -->
    const add_btn = $('#add-btn');
    const courseData=<?=json_encode($rows)?>;

    add_btn.click(function () {
        $.post('group-add-api.php', $(document.addGroup).serialize(), function(data){
            console.log(data);
            location.href='gd_product.php';
        }, 'json');
        return false;
    });

</script>
<script type="text/javascript">

    function convert2digi(n){
        n = n + '';
        return n.length<2 ? '0'+n : n
    }

    const now = new Date(Date.now() + 30*24*60*60000);
    const today = now.getFullYear()+'-' + convert2digi(now.getMonth()+1) + '-' + convert2digi(now.getDate());

    // alert(today);
    $('.form_datetime').attr('min', today);
</script>

<?php require __DIR__. '/__html_foot.php'?>