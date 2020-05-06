<div class="table-wrapper" style="background: #2a2b3d;">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6 user_btn">
                <!-- <img style="width: 47px; margin-right: 10px; border-radius: 2px;" src="../../asset/img/manangeicon.png" alt="管理者頭像"> -->
                <h2>
                    <b>Admin : <?= $_SESSION['username'] ?></b>
                </h2>
                <!-- <button>
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="../../api/logout_api.php?logout=1">logout</a>
                </button> -->
            </div>
            
            <!-- 刪除 與 新增 -->
            <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                    <i class="material-icons">&#xE147;</i> <span>Add New Employee</span>
                </a>
                <a href="#deleteEmployeeModal_all" class="btn btn-danger" data-toggle="modal">
                    <i class="material-icons">&#xE15C;</i> <span>Delete</span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- right body -->
    <section id="contents">
        <div class="welcome">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h2>Welcome to the OTIS information homepage</h2>
                        <p>1. 開放性平台作業所衍生的資料庫及網路管理問題漸受重視，我們將重要資訊設備、資料庫之各類檢核、稽核及網路資安管控整合於單一管理平台，經由「資訊整合管理平台」所提供簡易圖形介面操作，達成安全性、方便性作業，大幅簡化 </p>
                        <p>2. 您擁有最高管理權限，可更改賣家權限及賣場權限，可立即查看訂購資訊及產品資料</p>
                        <p>3. 本處資料庫資料龐大且複雜，且多為納稅人財產資料，涉及機密及隱私，為維護資料庫安全、保密與防止遺失，避免資料遭竄改，需做積極有效的系統資源管理與稽核機制，以達成上開目的</p>
                        <p>4. 本處目前作業方式採 1 人 2 機制，內外網路全天候開放，故網路安全及資安事件管理相對重要，我們將網路封包管理、資安事件管控、及安全閘道器管理等三大網管項目納入資訊整合管理平台，以方便資訊管理者隨時掌握資訊</p>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- user & seller & store -->
        <section class="statistics">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-4">
                    <div class="box">
                    <!-- <i class="fa fa-envelope fa-fw bg-primary"></i> -->
                    <i class="fa fa-users fa-fw bg-primary"></i>
                    <div class="info">
                        <?php
                        $sql = "SELECT `id`, `username`, `pwd`, `name`, `gender`, IF(`gender` = 1,'男','女') AS`genderdata`, `userlogo`, `phoneNumber`,`card`,`birthday`,`address`,
                                IF(`isActivated` = 1,'開通','未開通') AS `isActivated`
                                FROM `users`";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        if($stmt->rowCount() > 0):
                            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                            <h3><?= $stmt->rowCount() ?></h3> <span>Users</span>
                        <?php endif; ?>
                        <p>會員數量顯示 - DATA</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                    <!-- <i class="fa fa-file fa-fw danger"></i> -->
                    <i class="fa fa-users fa-fw danger"></i>
                    <div class="info">
                        <?php
                        $sql = "SELECT `id`, `username`, `pwd`, `name`, `gender`, IF(`gender` = 1,'男','女') AS`genderdata`, `userlogo`, `phoneNumber`,`card`,`birthday`,`address`,
                                IF(`isActivated` = 1,'開通','未開通') AS `isActivated`
                                FROM `users`
                                WHERE `isActivated` = 1";
                        $stmts = $pdo->prepare($sql);
                        $stmts->execute();
                        if($stmts->rowCount() > 0):
                            $arr = $stmts->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <h3><?= $stmts->rowCount() ?></h3> <span>Sellers</span>
                        <?php endif; ?>
                        <p>賣家數量顯示 - DATA</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                    <!-- <i class="fa fa-users fa-fw success"></i> -->
                    <i class="fas fa-store fa-fw success"></i>
                    <div class="info">
                        <?php
                        $sql = "SELECT `itemId`,`itemName`, `itemImg`, `colorid`,`itemsbrand`, `itemstype`, `itemstoreNumber`,
                                `itemPrice`, `itemQty`, `itemsstar`, `itemsales`, `itemscontent`, `items`.`created_at`,
                                `items_color`.`coid`, `items_color`.`colorname`, `items_color`.`colorunicode`,
                                `items_type`.`typename`,
                                `users`.`username`, `users`.`name`
                                FROM `items`
                                INNER JOIN `items_color`
                                ON `items`.`colorid` = `items_color`.`coid`
                                INNER JOIN `items_type`
                                ON `items`.`itemstype` = `items_type`.`typeid`
                                LEFT JOIN `users`
                                ON `items`.`itemstoreNumber` = `users`.`id`
                                ORDER BY `itemId` ASC";
                        $stmtpro = $pdo->prepare($sql);
                        $stmtpro->execute();
                        if($stmtpro->rowCount() > 0):
                            $arr = $stmtpro->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <h3><?= $stmtpro->rowCount() ?></h3> <span>Projects</span>
                        <?php endif; ?>
                        <p>產品數量顯示 - DATA</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Chart -->
        <section class="charts">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6">
                    <div class="chart-container">
                    <h3>買家人數資訊</h3>
                    <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="chart-container">
                    <h3>平台訂單資訊</h3>
                    <canvas id="myChart2"></canvas>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Admins & Moderators -->
        <section class="admins">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <h3>Moderators:</h3>
                        <div class="admin">
                            <div class="img">
                            <img class="img-responsive" src="../../asset/img/manangeicon.png" alt="admin">
                        </div>
                            <div class="info">
                                <h3>William Chuang</h3>
                                <p>1. 技術講解</p>
                                <p>2. 登入功能講解</p>
                                <p>3. 首頁管理界面講解</p>
                                <p>4. 產品管理講解</p>
                                <p>5. 全部管理功能協助</p>
                                <p>6. 後台整合 & API串接</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                    <h3>Admins:</h3>
                    <div class="admin">
                        <div class="img">
                        <img class="img-responsive" src="../../asset/img/manangeicon.png" alt="admin">
                        </div>
                        <div class="info">
                        <h3>KJ Yang</h3>
                            <p>1. 會員功能講解</p>
                        </div>
                    </div>
                    <div class="admin">
                        <div class="img">
                        <img class="img-responsive" src="../../asset/img/manangeicon.png" alt="admin">
                        </div>
                        <div class="info">
                        <h3>Alice Pai</h3>
                            <p>1. 賣家功能講解</p>
                            <p>2. 行銷功能講解</p>
                        </div>
                    </div>

                    <div class="admin">
                        <div class="img">
                        <img class="img-responsive" src="../../asset/img/manangeicon.png" alt="admin">
                        </div>
                        <div class="info">
                            <h3>YY Zheng</h3>
                            <p>1. 賣場功能講解</p>
                        </div>
                    </div>
                    <div class="admin">
                        <div class="img">
                        <img class="img-responsive" src="../../asset/img/manangeicon.png" alt="admin">
                        </div>
                        <div class="info">
                            <h3>Ya Fang Hong</h3>
                            <p>1. 訂單功能講解</p>
                            <p>1. 行銷功能協助</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- product 顯示 -->
        <section class='statis text-center'>
            <div class="container-fluid">
                <div class="row">
                    
                    <!-- 本月收益 -->
                    <div class="col-md-3">
                        <div class="box bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                        <?php
                            // $sql = "SELECT `created_at`, SUM(`itemPrice`) FROM `items`";
                            $sql = "SELECT SUM(`items`.`itemPrice`)
                            FROM `orders`
                            LEFT JOIN `items`
                            ON `orders`.`itemId` = `items`.`itemId`
                            LEFT JOIN `stores`
                            ON `stores`.`storeItemsId` = `items`.`itemstoreNumber`
                            LEFT JOIN `payment_types`
                            ON `orders`.`paymentTypeId` = `payment_types`.`paymentTypeId`
                            WHERE `orders`.`payment` = '已付款'
                            AND `orders`.`delivery` = '已送達'";
                            $stmtpro = $pdo->prepare($sql);
                            $stmtpro->execute();
                            if($stmtpro->rowCount() > 0):
                                $stmtAll = $stmtpro->fetchAll(PDO::FETCH_ASSOC)[0]; 


                            // if( !(strtotime($stmtAlll['created_at']) ==  $cur_date) ):

                            //     $stmtAlll = $stmtpro->fetchAll(PDO::FETCH_ASSOC)[0]; 
                        ?>
                       <h3><?= number_format($stmtAll["SUM(`items`.`itemPrice`)"]); ?> / NT</h3>
                                
                            <?php endif; ?>
                        <p class="lead">Total cost / 本月收益</p>
                        </div>
                    </div>
                    
                    <!-- 今日收益 -->
                    <div class="col-md-3">
                        <div class="box danger">
                        <i class="fas fa-dollar-sign"></i>
                        <?php
                            // $sql = "SELECT SUM(`items`.`itemPrice`), `orders`.`created_at`
                            $sql = "SELECT `items`.`itemPrice`, `orders`.`created_at`
                            FROM `orders`
                            LEFT JOIN `items`
                            ON `orders`.`itemId` = `items`.`itemId`
                            LEFT JOIN `stores`
                            ON `stores`.`storeItemsId` = `items`.`itemstoreNumber`
                            LEFT JOIN `payment_types`
                            ON `orders`.`paymentTypeId` = `payment_types`.`paymentTypeId`
                            WHERE `orders`.`payment` = '已付款'
                            AND `orders`.`delivery` = '已送達'";
                            $stmtpro = $pdo->prepare($sql);
                            $stmtpro->execute();
                            if($stmtpro->rowCount() > 0):
                                $cur_date = date("Y/m/d");
                                $stmtAlls = $stmtpro->fetchAll(PDO::FETCH_ASSOC); 
                                // echo "<pre>";
                                // print_r ($cur_date);
                                // echo "<hr>";
                                // print_r( date("Y/m/d", strtotime($stmtAlls[0]['created_at'])) );
                                // echo "<hr>";
                                // print_r ($stmtAlls);
                                for ($i = 0; $i < count($stmtAlls); $i++):
                                    if( date("Y/m/d", strtotime($stmtAlls[$i]['created_at'])) ==  $cur_date ){
                                        $priceAll[] = $stmtAlls[$i]['itemPrice'];
                                    }else {
                                        $priceAll[] = 0;
                                    }
                        ?>
                                <?php endfor; ?>
                                <h3><?= number_format(array_sum($priceAll)); ?> / NT</h3>
                            <?php endif; ?>
                        <p class="lead">OTIS Income / 今日收益</p>
                        </div>
                    </div>

                    <!-- 訂單數量 -->
                    <div class="col-md-3">
                        <div class="box warning">
                        <i class="fa fa-shopping-cart"></i>
                        <?php
                            $sql = "SELECT COUNT(`orders`.`orderId`)
                            FROM `orders`
                            LEFT JOIN `items`
                            ON `orders`.`itemId` = `items`.`itemId`
                            LEFT JOIN `stores`
                            ON `stores`.`storeItemsId` = `items`.`itemstoreNumber`
                            LEFT JOIN `payment_types`
                            ON `orders`.`paymentTypeId` = `payment_types`.`paymentTypeId`
                            ORDER BY `orders`.`orderId` ASC";
                            $stmtpro = $pdo->prepare($sql);
                            $stmtpro->execute();
                            if($stmtpro->rowCount() > 0):
                                $stmtAll = $stmtpro->fetchAll(PDO::FETCH_ASSOC)[0]; 
                        ?>
                        <h3><?= number_format($stmtAll["COUNT(`orders`.`orderId`)"]); ?> / price</h3>
                        <?php endif; ?>
                        <p class="lead">Order quantity / 訂單數量</p>
                        </div>
                    </div>
                    
                    <!-- 已結帳數量 -->
                    <div class="col-md-3">
                        <div class="box success">
                        <i class="fa fa-handshake-o"></i>
                        <?php
                            $sql = " SELECT COUNT(`orders`.`orderId`)
                            FROM `orders`
                            LEFT JOIN `items`
                            ON `orders`.`itemId` = `items`.`itemId`
                            LEFT JOIN `stores`
                            ON `stores`.`storeItemsId` = `items`.`itemstoreNumber`
                            LEFT JOIN `payment_types`
                            ON `orders`.`paymentTypeId` = `payment_types`.`paymentTypeId`
                            WHERE `orders`.`payment` = '已付款'
                            AND `orders`.`delivery` = '已送達'";
                            $stmtpro = $pdo->prepare($sql);
                            $stmtpro->execute();
                            if($stmtpro->rowCount() > 0):
                                $stmtAll = $stmtpro->fetchAll(PDO::FETCH_ASSOC)[0]; 
                        ?>
                        <h3><?= number_format($stmtAll["COUNT(`orders`.`orderId`)"]); ?> / price</h3>
                        <?php endif; ?>
                        <p class="lead">paymented / 已結帳數量</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
</div>