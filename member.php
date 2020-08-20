<?php require __DIR__. '/__connect_db.php';
$pageName = 'member-info';

$member_sid = $_SESSION['members']['id'];

$sql = "SELECT * FROM `members` WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$member_sid]);


$r = $stmt->fetch();

?>

<?php include __DIR__. '/__html_head.php' ?>

<!-- 自己的樣式寫這邊 -->
<!-- <link rel="stylesheet" href="css/xxxxxx.css"> -->
<link rel="stylesheet" href="css/waveland.css">
<style>
        /* 表格 */
        ::placeholder {
            color: #CECECE;
            font-weight: 300;
        }

        small {
            color: #FF8066;
            display: none;
        }


        .member-form {
            max-width: 800px;
            margin: 80px auto 300px;

        }

        .member-form section {
            margin-bottom: 150px;
        }

        .member-form h3 {
            text-align: center;
            margin-bottom: 40px;
        }

        .member-pw h3 {
            margin-bottom: 65px;
        }

        .member-form-group {
            margin: 25px 0;
        }

        .member-form-flex {
            display: flex;
            justify-content: space-between;
        }

        .member-form-group label {
            font-size: 18px;
        }

        .member-form-group label.member-gender {
            line-height: 50px;
            margin-right: 25px;
        }

        .member-form-group input:focus {
            outline: none;
            border: 2px solid #043f98;
            border-radius: 5px;

        }

        .member-form-group input[type=text]:focus {
            outline: none;
            border: 2px solid #043f98;
            border-radius: 5px;

        }

        .member-form-group input[type=text],
        input[type=date],
        input[type=email],
        input[type=tel],
        input[type=password] {
            height: 50px;
            width: 380px;
            border: 1px solid #CECECE;
            border-radius: 4px;
            padding: 10px;
            color: #000000;
        }

        .member-form-group input.input-100 {
            width: 100%;
        }

        .member-form-group input[type=radio] {
            line-height: 50px;
            margin-right: 10px;
            width: 20px;
            height: 20px;

        }

        @media screen and (max-width:768px) {

            .member-form-flex {
                flex-direction: column
            }

            .member-form-group input {
                width: 100%;
            }

            .member-form-group input[type=text] {
                width: 100%;
            }

            .member-form section {
                margin-bottom: 100px;
            }



        }

        .alert{
            position: fixed;
            top: 60px;
            display: none;
            width: 100%;

        }
</style>

<?php include __DIR__. '/__navbar.php' ?>

<!-- body內容寫這邊 -->
 
<?php include __DIR__. '/__member_bar.php' ?>

<div id="info-bar" class="alert alert-success" role="alert"></div>

    <!-- 表格 -->
    <article class="member-form wrapper">
        <section class="member-info">
            <form id="editMember" action="" method="POST" onsubmit="return formCheck()" novalidate>
                <h3 class="main-color">會員資料</h3>
                <input type="hidden" name="id" value="<?= $r['id'] ?>">

                <div class="member-form-flex">
                    <div class="member-form-group">
                        <label for="member-name">姓名</label><br>
                        <input type="text" id="member-name" name="name" placeholder="請填寫姓名" value="<?= $r['name']?>" ><br>
                        <small>錯誤訊息</small>
                    </div>
                    <div class="member-form-group">
                        <label for="member-birth">生日</label><br>
                        <input type="date" id="member-birth" name="birthday" value="<?= $r['birthday']?>"><br>
                        <small>錯誤訊息</small>
                    </div>
                </div>

                <div class="member-form-flex">
                    <div class="member-form-group">
                        <label>性別</label><br>
                        <input type="radio" name="gender" value="F" id="female" <?= $r['gender']== 'F' ? 'checked':''?> ><label
                            class="member-gender" for="female">女性</label>
                        <input type="radio" name="gender" value="M" id="male" <?= $r['gender']== 'M' ? 'checked':''?> ><label class="member-gender"
                            for="male">男性</label>
                        <input type="radio" name="gender" value="Other" id="other" <?= $r['gender']== 'Other' ? 'checked':''?>><label class="member-gender"
                            for="other">其他</label>
                    </div>

                    <div class="member-form-group">
                        <label for="member-phone">電話</label><br>
                        <input type="tel" id="member-phone" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" placeholder="請填寫電話" value="<?= $r['mobile'] ?>"><br>
                        <small>錯誤訊息</small>
                    </div>
                </div>


                <div class="member-form-group">
                    <label for="member-email">電子信箱</label><br>
                    <input type="email" id="member-email" name="email" class="input-100" placeholder="請填寫電子信箱" value="<?=$r['email']?>"><br>
                    <small>錯誤訊息</small>
                </div>

                <div class="form-btns">
                <a href="javascript:" role="button" class="btns btn-blue" id="submitBtn-info">儲存</a>
                </div>



            </form>
        </section>


        <section class="member-pw">
            <form action="">
                <h3 class="main-color">修改密碼</h3>
                <div class="member-form-group">
                    <label for="old-pw">輸入原密碼</label><br>
                    <input type="password" id="old-pw" name="old-pw" class="input-100" placeholder="請輸入原密碼"><br>
                    <small>錯誤訊息</small>
                </div>
                <div class="member-form-group">
                    <label for="new-pw">輸入新密碼</label><br>
                    <input type="password" id="new-pw" name="new-pw" class="input-100" placeholder="請輸入新密碼"><br>
                    <small>錯誤訊息</small>
                </div>
                <div class="member-form-group">
                    <label for="confirm-pw">確認新密碼</label><br>
                    <input type="password" id="confirm-pw" name="confirm-pw" class="input-100"
                        placeholder="請再次輸入新密碼"><br>
                    <small>錯誤訊息</small>
                </div>

                <div class="form-btns">
                    <a href="javascript:" role="button" class="btns btn-blue">送出</a>
                </div>

                <div class="member-webfooterH"></div>
            </form>

        </section>

    </article>
    <!-- 表格end -->

<?php include __DIR__. '/__footer.php' ?>
<?php include __DIR__. '/__scripts.php' ?>

<!-- 自己的script寫這邊 -->
<script>
    //    $("#checkMore").click(function () {
    //         $(".toggle-area, .member-card, .member-float-card").toggleClass("active")

    //     })

    $("#checkMore").click(function () {
            $('.member-card-lightbox').addClass("active")

    })

    $("#closeBtn").click(function () {
            $('.member-card-lightbox').removeClass("active")

    })

        $(".seeMore").click(function (){
            $(this).closest(".comment-content").find(".comment-text").toggleClass("active")
        })

        // $('#editBtn').click(function (){
        //     $(this).closest('.form-btns').html('<a href="javascript:" role="button" class="btns btn-blue" id="submitBtn-info">儲存</a>')
        //     $('#editMember :input').prop('disabled',false)
        // })






        const info_bar = $('#info-bar');



    const submit_btn = $('#submitBtn-info');

    submit_btn.on('click',function(){
        $.post('member-edit-api.php', $('#editMember').serialize(), function(data){
            console.log(data);
            if(data.success){
                    info_bar.removeClass('alert-danger')
                        .addClass('alert-success')
                        .html('修改成功');
                } else {
                    info_bar.removeClass('alert-success')
                        .addClass('alert-danger')
                        .html(data.error || '資料沒有修改');
                }
                info_bar.slideDown();

                setTimeout(function(){
                    info_bar.slideUp();
                }, 3000);
        }, 'json');
        return false;
    })

</script>

<?php require __DIR__. '/__html_foot.php'?>