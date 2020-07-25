<div class="table-wrapper">
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
                    <i class="material-icons">&#xE147;</i> <span>新增商品</span>
                </a>
                <a href="#deleteEmployeeModal_all" class="btn btn-danger" data-toggle="modal">
                    <i class="material-icons">&#xE15C;</i> <span>刪除</span>
                </a>
            </div>
        </div>
    </div>
    <!-- <div id="chart" class="chart" data-aos="fade-down"></div> -->

    <div id="app"></div>

    <table class="table table-striped table-hover" id="dt-table" data-aos="fade-up">
        <thead>
            <!-- 標頭 -->
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>編號</th>
                <th>名稱</th>
                <th>型號</th>
                <th>圖片</th>
                <th>顏色</th>
                <th>類型</th>
                <!-- <th>P價錢/.NT</th>
                <th>數量</th>
                <th>評分</th>
                <th>銷售數量</th>
                <th>擁有者編號</th>
                <th>擁有者名字</th> -->
                <th>創建時間</th>
                <th>編輯/刪除</th>
                
            </tr>
        </thead>
        <tbody>
            <!-- 模板 start-->
            <?php 
                $sql = "SELECT `itemId`,`itemsNumber`,`itemName`, `itemImg`, `colorid`, `itemstype`, `items`.`created_at`,
                        `items_color`.`coid`, `items_color`.`colorname`, `items_color`.`colorunicode`,
                        `items_type`.`typename`
                        -- `users`.`username`, `users`.`name`
                        FROM `items`
                        INNER JOIN `items_color`
                        ON `items`.`colorid` = `items_color`.`coid`
                        INNER JOIN `items_type`
                        ON `items`.`itemstype` = `items_type`.`typeid`
                        -- LEFT JOIN `users`
                        -- ON `items`.`itemstoreNumber` = `users`.`id`
                        ORDER BY `itemId` ASC";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(); 

                // echo "<pre>";
                // print_r( $stmt->fetchAll(PDO::FETCH_ASSOC));
                // exit();
                
                if($stmt->rowCount() > 0):
                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    for($i = 0; $i < count($arr); $i++):
                    // echo "<pre>";
                    // print_r($arr[58]['itemId']);
                    // exit();
            ?>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" class="checkboxValue" id="checkbox<?= $arr[$i]['itemId']; ?>" name="options[]" value="<?= $arr[$i]['itemId']; ?>">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td><?= $arr[$i]['itemId']; ?></td>
                <td class="itemName<?= $arr[$i]['itemId']; ?>"><?= $arr[$i]['itemName']; ?></td>
                <td class="itemsNumber<?= $arr[$i]['itemId']; ?>"><?= $arr[$i]['itemsNumber']; ?></td>
                <!-- 图片 -->
                <td class="itemImg<?= $arr[$i]['itemId']; ?>">
                    <?php if($arr[$i]['itemImg'] !== ""): ?>
                        <img src="../../asset/file_img/<?= $arr[$i]['itemImg'];?>">
                    <?php else: ?>
                        <img src="../../asset/img/404.jpg">
                    <?php endif; ?>
                </td>
                <td class="colorid<?= $arr[$i]['itemId']; ?>" id="<?= $arr[$i]['colorid']; ?>" data-color="<?= $arr[$i]['colorunicode']; ?>">
                    <div style="background-color:<?= $arr[$i]['colorunicode']; ?>;width: 34px; height: 34px; border-radius: 4px;"></div>
                </td>
                <td class="itemstype<?= $arr[$i]['itemId']; ?>"><?= $arr[$i]['typename']; ?></td>
                
                <td><?= $arr[$i]['created_at']; ?></td>
                <td>
                    <a href="#" class="AddImages" data-toggle="modal">
                        <i class="fas fa-file-alt" data-toggle="tooltip" title="AddImages"></i>
                    </a>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Edit" onClick="Edit_click(<?= $arr[$i]['itemId']; ?>)">&#xE254;</i>
                    </a>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Delete" onClick="Delete_click(<?= $arr[$i]['itemId']; ?>)">&#xE872;</i>
                    </a>
                </td>
            </tr>
            <?php endfor;?>
            <?php endif;?>
            <!-- 模板 end-->
        </tbody>
    </table>
</div>