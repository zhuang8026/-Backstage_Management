<!-- left menu -->
<aside class="side-nav" id="show-side-navigation1">
    <!-- <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i> -->
    <div class="heading">
        <img src="../../asset/img/logo.png" alt="LOGO">
        <div class="info">
            <h3><a href="../../page/wi_home/wi_items_index.php"><span class="main-color"><?= $_SESSION['username'] ?></span> Manager</a></h3>
            <p>Top authority manager</p>
            <p><a style="color: #EEE; border: 1px solid #eee; padding: 5px 10px;" href="../../api/logout_api.php?logout=1">logout</a></p>
        </div>
    </div>
    <div class="search">
        <input type="text" placeholder="Type here"><i class="fa fa-search"></i>
    </div>
    <ul class="categories">
        <!-- <li>
            <i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="javascript: void(0);"> Home / 首頁</a>
            <ul class="side-nav-dropdown">
                <li><a href="../wi_home/wi_items_index.php"> Home</a></li>
                <li><a href="https://treefonts.com/"> TreeFonts</a></li>
            </ul>
        </li>
        <li>
            <i class="fa fa-users fa-fw"></i><a href="javascript: void(0);"> members / 會員</a>
            <ul class="side-nav-dropdown">
                <li><a href="../k_member/k_member_index.php">Search / 查看</a></li>
            </ul>
        </li>
        <li>
        <i class="fa fa-users fa-fw"></i></i><a href="javascript: void(0);"> Sellers / 賣家</a>
            <ul class="side-nav-dropdown">
                <li><a href="../alice_seller/alice_seller_index.php">Search / 查看</a></li>
            </ul>
        </li>
        <li>
            <i class="fas fa-store"></i><a href="javascript: void(0);"> Stores / 賣場</a>
            <ul class="side-nav-dropdown">
                <li><a href="../yy/yy_items_index.php">Search / 查看</a></li>
            </ul>
        </li> -->
        <li>
            <i class="fas fa-store"></i><a href="javascript: void(0);"> Products / 產品</a>
            <ul class="side-nav-dropdown">
                <li><a href="../wi/wi_items_index.php">Search / 查看</a></li>
            </ul>
        </li>
        <!-- <li>
            <i class="fas fa-paste"></i><a href="javascript: void(0);"> Orders / 訂單</a>
            <ul class="side-nav-dropdown">
                <li><a href="../hong/h_orders_index.php">Search / 查看</a></li>
            </ul>
        </li>
        <li>
            <i class="fas fa-bullhorn"></i><a href="javascript: void(0);"> Marketing / 行銷</a>
            <ul class="side-nav-dropdown">
                <li><a href="../activity/ac_index.php">Search / 查看</a></li>
            </ul>
        </li> -->
        
        <!-- <p>Other:</p> -->
        <li><i class="fa fa-envelope-open-o fa-fw"></i><a href="#"> Messages <span class="num dang">0</span></a></li>
        <!-- <li>
            <i class="fa fa-wrench fa-fw"></i><a href="#"> Settings <span class="num prim">6</span></a>
            <ul class="side-nav-dropdown">
                <li><a href="#">Lorem ipsum</a></li>
            </ul>
        </li> -->
        <!-- <li><i class="fa fa-laptop fa-fw"></i><a href="#"> About UI &amp; UX <span class="num succ">3</span></a></li> -->
        <!-- <li><i class="fa fa-laptop fa-fw"></i><a href="#"> About F2E <span class="num succ">3</span></a></li> -->
        <!-- <li><i class="fa fa-comments-o fa-fw"></i><a href="#"> Something else</a></li> -->
    </ul>
</aside>