<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6 user_btn">
                <img style="width: 47px; margin-right: 10px; border-radius: 2px;" src="../../asset/img/manangeicon.png" alt="管理者頭像">
                <h2>
                    <b>平台管理者 : <?= $_SESSION['username'] ?></b>
                </h2>
                <button>
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="../../api/logout_api.php?logout=1">logout</a>
                </button>
            </div>
            
            <!-- 刪除 與 新增 -->
            <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                    <i class="material-icons">&#xE147;</i> <span>Add New Employee</span>
                </a>
                <a href="#deleteEmployeeModal_all" class="btn btn-danger" data-toggle="modal">
                    <i class="material-icons" onClick="Delete_click_all()">&#xE15C;</i> <span>Delete</span>
                </a>
            </div>
        </div>
    </div>
    <!-- <div id="chart" class="chart" data-aos="fade-down"></div> -->
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
                <th>賣場編號</th>
                <th>賣場名稱</th>
                <th>賣場頭像</th>
                <th>評價分數</th>
                <th>商品數量</th>
                <th>賣場描述</th>
                <th>擁有者ID</th>
                <th>擁有者名稱</th>
                <th>擁有者權限(測試)</th>
                <th>開通權限</th>
                <th>加入時間</th>
                <th>功能</th>
            </tr>
        </thead>
        <tbody>
            <!-- 模板 start-->
            <?php 
                $sql = "SELECT `storeId`, `storeName`, `storeLogo`, `storeDescription`,`storeItemsId`, `storeOpened`, `createTime`, 
                                `items`.`itemstoreNumber`, SUM(`items`.`itemsstar`),
                                `users`.`id`, `users`.`username`, `users`.`name`,
                                IF(`isActivated` = 1,'開通','未開通') AS `isActivated`,IF(`shopopen` = 1,'開通','未開通') AS `shopopen`,
                                COUNT(`storeId`)
                        FROM `stores`
                        LEFT JOIN `items`
                        ON `stores`.`storeItemsId` = `items`.`itemstoreNumber`
                        LEFT JOIN `users`
                        ON `items`.`itemstoreNumber` = `users`.`id`
                        WHERE `users`.`isActivated` = 1
                        GROUP BY `storeId`
                        ORDER BY `storeId` ASC";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(); 

                // echo "<pre>";
                // print_r( $stmt->fetchAll(PDO::FETCH_ASSOC));
                // exit();
                
                if($stmt->rowCount() > 0):
                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    for($i = 0; $i < count($arr); $i++):
            ?>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" class="checkboxValue" id="checkbox<?= $arr[$i]['storeId']; ?>" name="options[]" value="<?= $arr[$i]['storeId']; ?>">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td><?= $arr[$i]['storeId']; ?></td>
                <td class="itemName<?= $arr[$i]['storeId']; ?>"><?= $arr[$i]['storeName']; ?></td>
                <!-- 图片 -->
                <td class="itemImg<?= $arr[$i]['storeId']; ?>">
                    <?php if($arr[$i]['storeLogo'] !== ""): ?>
                        <img src="../../asset/file_img/<?= $arr[$i]['storeLogo'];?>">
                    <?php else: ?>
                        <img src="../../asset/img/404.png">
                    <?php endif; ?>
                </td>
                <td class="itemsbrand<?= $arr[$i]['storeId']; ?>"><?= round($arr[$i]["SUM(`items`.`itemsstar`)"] / $arr[$i]["COUNT(`storeId`)"], 2) ?></td>
                <td class="itemsbrand<?= $arr[$i]['storeId']; ?>"><?= $arr[$i]["COUNT(`storeId`)"]; ?></td>
                <td class="itemsbrand<?= $arr[$i]['storeId']; ?>"><?= $arr[$i]['storeDescription']; ?></td>
                <td class="itemsbrand<?= $arr[$i]['storeId']; ?>"><?= $arr[$i]["username"]; ?></td>
                <td class="itemsbrand<?= $arr[$i]['storeId']; ?>"><?= $arr[$i]['name']; ?></td>
                <td class="itemstype<?= $arr[$i]['storeId']; ?>"><?= $arr[$i]['isActivated']; ?></td>
                <td class="itemPrice<?= $arr[$i]['storeId']; ?>"><?= $arr[$i]['shopopen']; ?></td>
                <td class="itemQty<?= $arr[$i]['storeId']; ?>"><?= $arr[$i]['createTime']; ?></td>
                <td>
                    <a href="#" class="AddImages" data-toggle="modal">
                        <i class="fas fa-file-alt" data-toggle="tooltip" title="AddImages"></i>
                    </a>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Edit" onClick="Edit_click(<?= $arr[$i]['storeId']; ?>)">&#xE254;</i>
                    </a>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Delete" onClick="Delete_click(<?= $arr[$i]['storeId']; ?>)">&#xE872;</i>
                    </a>
                </td>
            </tr>
            <?php endfor;?>
            <?php endif;?>
            <!-- 模板 end-->
        </tbody>
    </table>
</div>