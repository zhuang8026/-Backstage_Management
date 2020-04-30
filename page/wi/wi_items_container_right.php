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
        <div id="chart"></div>
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
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Color</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Price/.NT</th>
                    <th>Quantity</th>
                    <th>Star</th>
                    <th>sales</th>
                    <!-- <th>CategoryId</th> -->
                    <!-- <th>Content</th> -->
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>Function</th>
                    
                </tr>
            </thead>
            <tbody>
                <!-- 模板 start-->
                <?php 
                    $sql = "SELECT `itemId`,`itemName`, `itemImg`, `colorid`,`itemsbrand`, `itemstype`, 
                            `itemPrice`, `itemQty`, `itemsstar`, `itemsales`, `itemCategoryId`, `itemscontent`, `created_at`, `updated_at`,
                            `items_color`.`coid`, `items_color`.`colorname`, `items_color`.`colorunicode`,
                            `items_type`.`typename`
                            FROM `items`
                            INNER JOIN `items_color`
                            ON `items`.`colorid` = `items_color`.`coid`
                            INNER JOIN `items_type`
                            ON `items`.`itemstype` = `items_type`.`typeid`
                            ORDER BY `itemId` ASC";
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
                            <input type="checkbox" class="checkboxValue" id="checkbox<?= $arr[$i]['itemId']; ?>" name="options[]" value="<?= $arr[$i]['itemId']; ?>">
                            <label for="checkbox1"></label>
                        </span>
                    </td>
                    <td><?= $arr[$i]['itemId']; ?></td>
                    <td class="itemName<?= $arr[$i]['itemId']; ?>"><?= $arr[$i]['itemName']; ?></td>
                    <!-- 图片 -->
                    <td class="itemImg<?= $arr[$i]['itemId']; ?>">
                        <?php if($arr[$i]['itemImg'] !== ""): ?>
                            <img src="../../asset/file_img/<?= $arr[$i]['itemImg'];?>">
                        <?php else: ?>
                            <img src="../../asset/img/404.png">
                        <?php endif; ?>
                    </td>
                    <td class="colorid<?= $arr[$i]['itemId']; ?>"><div style="background-color:<?= $arr[$i]['colorunicode']; ?>;height: 34px; border-radius: 4px;"></div></td>
                    <td class="itemsbrand<?= $arr[$i]['itemId']; ?>"><?= $arr[$i]['itemsbrand']; ?></td>
                    <td class="itemstype<?= $arr[$i]['itemId']; ?>"><?= $arr[$i]['typename']; ?></td>
                    <td class="itemPrice<?= $arr[$i]['itemId']; ?>"><?= $arr[$i]['itemPrice']; ?></td>
                    <td class="itemQty<?= $arr[$i]['itemId']; ?>"><?= $arr[$i]['itemQty']; ?></td>
                    <td><?= $arr[$i]['itemsstar']; ?></td>
                    <td><?= $arr[$i]['itemsales']; ?></td>
                    <!-- <td><?/*= $arr[$i]['itemCategoryId']; */?></td> -->
                    <!-- <td><?/*= $arr[$i]['itemscontent']; */?></td> -->
                    <td><?= $arr[$i]['created_at']; ?></td>
                    <td><?= $arr[$i]['updated_at']; ?></td>
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
</div>