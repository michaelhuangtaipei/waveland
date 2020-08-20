<?php require __DIR__ . '/__connect_db.php' ?>
<?php include __DIR__ . '/login__html_head.php' ?>
<?php include __DIR__ . '/__navbar.php' ?>
<style>
    .btns:hover{
        text-decoration: none;
        background: #ffffff;
        color: #043f98;
        border: 1px solid #043f98;
    }

    .loginContainer{
        min-height: 800px;
    }

    .loginSpaceRight{
        min-height: 800px;
    }
</style>
<section>
    <div class="loginBgImg">
        <div class="d-flex align-items-center justify-content-between loginContainer ">
            <img class="loginFontSize" src="svg/login-kv-font.svg" alt="">
            <div class="elementDown loginSpaceRight d-flex flex-wrap align-content-center">
                <aside class="loginSpaceInside">

                    <div class="d-flex flex-row loginMemberTop">
                        <img class="loginMemberSize" src="svg/svg-member-blue.svg" alt="">
                        <h3 class="loginFontBlue">會員登入</h3>
                    </div>

                    <div id="info-bar" class="alert alert-primary" role="alert" style="display: none"></div>

                    <form name="form1" method="post" onsubmit="return formCheck()" novalidate>
                        <div class="loginAccountDown form-group">
                            <p for="email" class="loginTextSize">帳號:</p>
                            <input class="input2" type="email" id="email" name="email" placeholder="請輸入e-mail">
                            <small id="emailHelp" class="loginErrorFont form-text"></small>
                        </div>

                        <div class="loginPasswordDown form-group">
                            <p for="password" class="loginTextSize">密碼:</p>
                            <input class="input2" type="password" id="password" name="password" placeholder="請輸入密碼">
                            <small id="passwordHelp" class="loginErrorFont form-text"></small>
                        </div>

                        <div class="d-flex flex-row loginButtonDown">
                            <button style="outline: none" type="submit" class="btns btn-blue" role="button">登入</button>
                            <div class="form-check d-flex flex-row align-items-center">
<!--                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">-->
<!--                                <label class="form-check-label" for="defaultCheck1">-->
<!--                                    保持登入狀態-->
<!--                                </label>-->
                            </div>
                        </div>

                    </form>

                    <div class="d-flex flex-row">
                        <a href="<?= WEB_ROOT ?>/register.php">
                            <p class="loginFontSmell">會員註冊</p>
                        </a>
                        <a href="">
                            <p class="loginFontSmell">忘記密碼?</p>
                        </a>
                    </div>

                    <div class="d-flex flex-row">
                        <a class="loginComRight" href="">
                            <img src="svg/login-kv-facebook.svg" alt="">
                        </a>
                        <a class="loginComRight" href="">
                            <img src="svg/login-kv-google.svg" alt="">
                        </a>
                        <a class="loginComRight" href="">
                            <img src="svg/login-kv-line.svg" alt="">
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/__footerLogin.php' ?>
<?php require __DIR__ . '/__scripts.php' ?>
<script src="js/skroll.min.js"></script>

<script>
    const email = $('#email'), password = $("#password"), info_bar = $('#info-bar'), emailHelp = $('#emailHelp'), passwordHelp=$('#passwordHelp');
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    function formCheck() {
        email.next().text('');
        password.next().text('');
        // email.css('border-color', '#CCCCCC');
        // password.css('border-color', '#CCCCCC');
        //^^^^設空值讓警告消失
        //檢查欄位
        // vvvvvv以下是輸入內容錯誤的警示文字設定
        let isPass = true;

        if (!email_re.test(email.val())) {
            isPass = false;
            email.css('border-color', '#FF8066');
            emailHelp .text('請填寫正確的 email 格式');
            emailHelp.css('color', '#FF8066');
        }

        if (password.val().length < 6) {
            isPass = false;
            password.css('border-color', '#FF8066');
            passwordHelp.text('密碼長度太短');
            passwordHelp.css('color', '#FF8066');
        }


        //vvvvvv原本沒有用if包住，要使用警告字時再包，裡面再包if增加新增成功與新增失敗的流程
        if (isPass) {
            $.post('login-api.php', $(document.form1).serialize(), function (data) {
                // console.log(data);
                if (data.success) {
                    info_bar.removeClass('alert-danger')
                        .addClass('alert-primary')
                        .html('登入成功');
                        setTimeout(function () {
                        location.href = 'index_.php';
                    }, 2000);
                } else {
                    info_bar.removeClass('alert-primary')
                        .addClass('alert-danger')
                        .html('帳號或密碼錯誤');
                }

                info_bar.fadeIn();
                // 滑下來的動作

                setTimeout(function () {
                    info_bar.fadeOut();
                }, 1000);
                // 設定滑下來後收回的時間

            }, 'json');
            // 這是json標籤
        }
        return false;
    }

    new Skroll()
        .add(".elementDown", {
            animation: "fadeInDown",
            mobile: true,
            delay: 200,
            duration: 1000,
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








