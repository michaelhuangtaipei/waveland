
<style>
    .dropdown-menu{
        top:0px !important;
        border: none !important;
        left: -25px !important;
    }

    .dropdown-item{
        color: #043f98 !important;
        margin-top: 20px;
    }

    .btnss:hover{
        text-decoration: none;
        color: #7AC943 !important;
    }

    .sidebarMenuInner-a:hover{
        text-decoration: none;
        color: #7AC943 !important;
    }

    .dropdown-item:hover{
        text-decoration: none;
        color: #7AC943 !important;
    }

    .dropdown-itemOut{
        font-size: 16px;
        color: #aaaaaa !important;
        margin-top: 30px;
    }
</style>
</head>

<body>
<!------- header區塊（開始） ------->
<header>
    <div class="headerContainer">
        <div class="header-grop">
            <!-- LOGO區塊 -->
            <a href="<?= WEB_ROOT ?>/index_.php"><img class=header-logo src="svg/svg-logo-header.svg" alt=""></a>
            <!-- 搜尋區塊 -->
            <div class="search-bar">
                <input type="text" class="search-content" placeholder="搜尋地名、景點與活動名稱">
                <button class="search-btn">
                    <a href=""><img class="header-img icon icon-search" src="svg/svg-search-blue.svg" alt=""></a>
                </button>
            </div>
        </div>

        <div class="header-icon-group">
            <?php if (isset($_SESSION['members'])): ?>
                <div class="dropdown">
                    <a style="color:#043f98" class="btnss dropdown-toggle" href="<?= WEB_ROOT ?>/login.php" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['members']['nickname'] ?>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?= WEB_ROOT ?>/member.php">會員資料</a>
                        <a class="dropdown-item" href="<?= WEB_ROOT ?>/member-group.php">我的揪團</a>
                        <a class="dropdown-item" href="<?= WEB_ROOT ?>/member-collection.php">我的收藏</a>
                        <a class="dropdown-item dropdown-itemOut" href="<?= WEB_ROOT ?>/logout.php">登出</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="<?= WEB_ROOT ?>/login.php"><img class="header-img icon icon-member" src="svg/svg-member-blue.svg" alt=""></a>   
            <?php endif; ?>
            <a href="<?= WEB_ROOT ?>/cart.php"><img class="header-img icon icon-cart" src="svg/svg-cart.svg" alt=""><span class="badge badge-pill badge-primary cart-count">0</span></a>

            <!-- 漢堡選單按鈕 -->
            <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
            <label for="openSidebarMenu" class="sidebarIconToggle">
                <div class="spinner diagonal part-1"></div>
                <div class="spinner horizontal"></div>
                <div class="spinner diagonal part-2"></div>
            </label>

            <!-- 選單內容 -->
            <div id="sidebarMenu">
                <ul class="sidebarMenuInner">


                    <li class="sidebarMenuInner-li">
                        <a class="sidebarMenuInner-a" href="product-list.php">
                            <img class="sidebarMenu-icon" src="svg/svg-locat.svg" alt="">行程探索
                        </a>
                    </li>

                    <li class="sidebarMenuInner-li">
                        <a class="sidebarMenuInner-a" href="group-list.php">
                            <img class="sidebarMenu-icon" src="svg/svg-map.svg" alt="">我要揪團
                        </a>
                    </li>

                    <li class="sidebarMenuInner-li">
                        <a class="sidebarMenuInner-a" href="#">
                            <img class="sidebarMenu-icon" src="svg/svg-aboutme.svg" alt="">認識我們
                        </a>
                    </li>

                    <li class="sidebarMenuInner-li">
                        <a class="sidebarMenuInner-a" href="#">
                            <img class="sidebarMenu-icon" src="svg/svg-webinfo.svg" alt="">網站資訊
                        </a>
                    </li>

                </ul>
                <div class="socialSoftware-icon-group">
                    <a href=""><img class="socialSoftware-icon" src="svg/svg-fb-blue.svg" alt=""></a>
                    <a href=""><img class="socialSoftware-icon" src="svg/svg-ig-blue.svg" alt=""></a>
                    <a href=""><img class="socialSoftware-icon" src="svg/svg-line-blue.svg" alt=""></a>
                </div>
            </div>

        </div>
    </div>

</header>

<!------- header區塊（結束） ------->