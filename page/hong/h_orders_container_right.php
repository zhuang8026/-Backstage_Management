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
                    <i class="material-icons">&#xE147;</i> <span>Add New Employee</span>
                </a>
                <a href="#deleteEmployeeModal_all" class="btn btn-danger" data-toggle="modal">
                    <i class="material-icons" onClick="Delete_click_all()">&#xE15C;</i> <span>Delete</span>
                </a>
            </div>
        </div>
    </div>
    <!-- <div id="chart"></div> -->
    <table class="table table-striped table-hover" id="dt-table">
        <thead>
            <!-- 標頭 -->
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <!-- 修改th內容_雅芳 -->
                <th>訂單編號</th>
                <th>賣場名稱</th>
                <th>賣場頭像</th>
                <th>商品名稱</th>
                <th>商品價格</th>
                <th>買家帳號</th>
                <th>付款方式</th>
                <th>付款狀態</th>
                <th>配送狀態</th>
                <th>備註事項</th>
                <th>更新時間</th>
                <th>編輯/刪除</th>
            </tr>
        </thead>
        <tbody>
            <!-- 模板 start -->
            <?php
            // 修改sql語法_雅芳
            $sql = "SELECT `orders`.`orderId`,
            `stores`.`storeName`,
            `stores`.`storeLogo`,
            `items`.`itemName`,
            `items`.`itemPrice`,
            `orders`.`username`,
            `payment_types`.`paymentTypeName`,
            `orders`.`payment`,
            `orders`.`delivery`,
            `orders`.`orderRemark`,
            `orders`.`updated_at`
            FROM `orders`
            LEFT JOIN `items`
            ON `orders`.`itemId` = `items`.`itemId`
            LEFT JOIN `stores`
            ON `stores`.`storeItemsId` = `items`.`itemstoreNumber`
            LEFT JOIN `payment_types`
            ON `orders`.`paymentTypeId` = `payment_types`.`paymentTypeId`
            ORDER BY `orders`.`orderId` ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < count($arr); $i++) {
            ?>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" class="checkboxValue" id="checkbox<?= $arr[$i]['orderId']; ?>" name="options[]" value="<?= $arr[$i]['orderId']; ?>">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <!-- 雅芳:修改class名稱 & td顯示內容 -->
                        <td><?= $arr[$i]["orderId"]; ?></td>
                        <td><?= $arr[$i]['storeName']; ?></td>
                        <!-- 圖片 -->
                        <td>
                            <?php if ($arr[$i]['storeLogo'] !== "") : ?>
                                <img src="../../asset/file_img/<?= $arr[$i]['storeLogo']; ?>">
                            <?php else : ?>
                                <img src="../../asset/img/404.jpg">
                            <?php endif; ?>
                        </td>
                        <td><?= $arr[$i]["itemName"] ?></td>
                        <td><?= $arr[$i]["itemPrice"] ?></td>
                        <td><?= $arr[$i]["username"] ?></td>
                        <td class="paymentTypeName<?= $arr[$i]['orderId']; ?>"><?= $arr[$i]["paymentTypeName"] ?></td>
                        <td class="payment<?= $arr[$i]['orderId']; ?>"><?= $arr[$i]["payment"] ?></td>
                        <td class="delivery<?= $arr[$i]['orderId']; ?>"><?= $arr[$i]["delivery"] ?></td>
                        <td class="orderRemark<?= $arr[$i]['orderId']; ?>"><?= $arr[$i]["orderRemark"] ?></td>
                        <td><?= $arr[$i]["updated_at"] ?></td>

                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit" onClick="h_Edit_click(<?= $arr[$i]['orderId']; ?>)">&#xE254;</i>
                            </a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete" onClick="h_Delete_click(<?= $arr[$i]['orderId']; ?>)">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
            <!-- 模板 end-->
        </tbody>
    </table>
</div>
</div>