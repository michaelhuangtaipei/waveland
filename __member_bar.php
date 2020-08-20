<?php

$member_sid = $_SESSION['members']['id'];

$sql = "SELECT * FROM `members` WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$member_sid]);


$r = $stmt->fetch();

?>
 
   <!-- 頁面主視覺 -->

   <div class="member-kv">
        <img class="kv-wave" src="img/wave-animate.png" alt="">
    </div>

    <!-- 個人頁card -->
    <article class="member-float-card">
        <section class="member-card">
            <div class="member-card-area">
                <div class="member-photo">
                    <img src="img/0.jpeg" alt="">
                    <div class="icon-change-photo"><i class="fas fa-camera"></i>
                    </div>
                </div>
                <div class="straight-line"></div>
                <div class="member-card-info">
                    <div class="mem-card-infoBOX">
                      <h4><?= $r['nickname']?> <i class="fas fa-edit"></i></h4>
                      <div class="mem-card-medal mobile-hide ">
                        <img src="svg/icon-medal-1.png" alt="">
                        <img src="svg/icon-medal-2.png" alt="">
                        <img src="svg/icon-medal-3.png" alt="">

                      </div>
                    </div>

                    <p>大家好，我是馬克！平常最喜歡到郊外小旅行，找點新鮮事了！ <i class="fas fa-edit"></i></p>
 
                </div> <!-- member-card-info 結束 -->
            </div>
            

            
            <div class="member-seemore"><a href="javascript:" role="button" class="btns btn-white checkMore" id="checkMore"
                    >查看我的個人頁面 <i class="fas fa-caret-down"></i></a></div>

        </section>
    </article>

    <article class="member-card-lightbox">
        <section class="member-card">
            <div class="member-card-area">
                <div class="member-photo">
                    <img src="img/0.jpeg" alt="">
                    <div class="icon-change-photo"><i class="fas fa-camera"></i>
                    </div>
                </div>
                <div class="straight-line"></div>
                <div class="member-card-info">
                    <div class="mem-card-infoBOX">
                      <h4><?= $r['nickname']?> <i class="fas fa-edit"></i></h4>
                      <div class="mem-card-medal mobile-hide ">
                        <img src="svg/icon-medal-1.png" alt="">
                        <img src="svg/icon-medal-2.png" alt="">
                        <img src="svg/icon-medal-3.png" alt="">

                      </div>
                    </div>

                    <p>大家好，我是馬克！平常最喜歡到郊外小旅行，找點新鮮事了！ <i class="fas fa-edit"></i></p>
 
                </div> <!-- member-card-info 結束 -->
            </div>
            <div class="toggle-area">
                <div class="comment-card-group">
                    <h4>我的評價</h4>
                    <div class="comment-card">
                        <figure>
                            <img src="img/0.jpeg" alt="">
                            <p>方小文</p>
                        </figure>
                        <div class="comment-content">
                            <img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt="">
                            <h6>用最夯 SUP 立槳探訪海上大象！</h6>
                            <p class="comment-text">
                                前情提要，我是唬爛產生器出來的，超過180字就收合。如果仔細思考SUP立槳
                                新北福隆水上活動，會發現其中蘊含的深遠意義。我想，把SUP立槳新北福隆其中蘊含的深遠意義。我想，把SUP立槳新北新北福隆水上活動，會發現其中蘊含的深遠意義。我想，把SUP立槳新北福隆其中蘊含的深遠意義。我想，把SUP立槳新北
                            </p>
                            <a href="javascript:" class="seeMore" role="button">MORE+</a>
                            <p class="comment-date">體驗日期：2020/08/02</p>
                        </div>
                    </div>

                    <div class="comment-card">
                        <figure>
                            <img src="img/0.jpeg" alt="">
                            <p>方小文</p>
                        </figure>
                        <div class="comment-content">
                            <img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt="">
                            <h6>用最夯 SUP 立槳探訪海上大象！</h6>
                            <p class="comment-text">
                                前情提要，我是唬爛產生器出來的，超過180字就收合。如果仔細思考SUP立槳
                                新北福隆水上活動，會發現其中蘊含的深遠意義。我想，把SUP立槳新北福隆其中蘊含的深遠意義。我想，把SUP立槳新北新北福隆水上活動，會發現其中蘊含的深遠意義。我想，把SUP立槳新北福隆其中蘊含的深遠意義。我想，把SUP立槳新北新北福隆水上活動，會發現其中蘊含的深遠意義。我想，把SUP立槳新北福隆其中蘊含的深遠意義。我想，把SUP立槳新北
                            </p>
                            <a href="javascript:" class="seeMore" role="button">MORE+</a>
                            <p class="comment-date">體驗日期：2020/08/02</p>
                        </div>
                    </div>

                    <div class="comment-card">
                        <figure>
                            <img src="img/0.jpeg" alt="">
                            <p>方小文</p>
                        </figure>
                        <div class="comment-content">
                            <img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt=""><img src="svg/svg-star.svg" alt="">
                            <h6>用最夯 SUP 立槳探訪海上大象！</h6>
                            <p class="comment-text">
                                前情提要，我是唬爛產生器出來的，超過180字就收合。如果仔細思考SUP立槳
                                新北福隆水上活動，會發現其中蘊含的深遠意義。我想，把SUP立槳新北福隆其中蘊含的深遠意義。我想，把SUP立槳新北新北福隆水上活動，會發現其中蘊含的深遠意義。我想，把SUP立槳新北福隆其中蘊含的深遠意義。我想，把SUP立槳新北
                            </p>
                            <a href="javascript:" class="seeMore" role="button">MORE+</a>
                            <p class="comment-date">體驗日期：2020/08/02</p>
                        </div>
                    </div>
        
                </div>
                
            </div>
            <div class="closeBtn"><a href="javascript:" role="button" class="btns btn-white" id="closeBtn"
                    >關閉此頁面 <i class="fas fa-caret-up"></i></a></div>
            
        </section>
        
    </article>


    <article class="member-first wrapper">


        <section class="member-buttons">
            <a href="<?= WEB_ROOT ?>/member.php" class="mem-btn <?= $pageName == 'member-info' ? 'active' : ''?>">
                <i class="fas fa-user"></i>
                <p class="mem-tab-textdefult">會員資料</p>      <!-- 文修 -->
                <p class="mem-tab-textrwd">會員</p>             <!-- 文修 -->
            </a>
            <div class="btn-line"></div>
            <a href="<?= WEB_ROOT ?>/member-list-go.php" class="mem-btn <?= $pageName == 'member-list-go' ? 'active' : ''?>">
                <i class="fas fa-clipboard-list"></i>
                <p class="mem-tab-textdefult">訂單記錄</p>
                <p class="mem-tab-textrwd">訂單</p>             <!-- 文修 -->
            </a>
            <div class="btn-line"></div>
            <a href="<?= WEB_ROOT ?>/member-group.php" class="mem-btn <?= $pageName == 'member-group' ? 'active' : ''?>">
                <i class="fas fa-users"></i>
                <p class="mem-tab-textdefult">我的揪團</p>
                <p class="mem-tab-textrwd">揪團</p>             <!-- 文修 -->
            </a>
            <div class="btn-line"></div>
            <a href="<?= WEB_ROOT ?>/member-coupon.php" class="mem-btn <?= $pageName == 'member-coupon' ? 'active' : ''?>">
                <i class="fas fa-tags"></i>
                <p class="mem-tab-textdefult">折扣優惠</p>
                <p class="mem-tab-textrwd">優惠</p>             <!-- 文修 -->
            </a>
            <div class="btn-line mobile-hide"></div>
            <a href="<?= WEB_ROOT ?>/member-collection.php" class="mem-btn <?= $pageName == 'member-collection' ? 'active' : ''?>">
                <i class="fas fa-heart"></i>
                <p class="mem-tab-textdefult">我的收藏</p>
                <p class="mem-tab-textrwd">收藏</p>             <!-- 文修 -->
            </a>
        </section>
    </article>

