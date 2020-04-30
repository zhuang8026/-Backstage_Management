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
                    <i class="material-icons">&#xE147;</i> <span>Add</span>
                </a>
                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                    <i class="material-icons">&#xE15C;</i> <span>Delete</span>
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
                <!-- 修改th內容_雅芳 -->
                <th>訂單編號</th>
                <th>買家帳號</th>
                <th>付款方式</th>
                <th>付款狀態</th>
                <th>配送狀態</th>
                <th>備註事項</th>
                <th>新增時間</th>
                <th>更新時間</th>
                <th>編輯/刪除</th>
            </tr>
        </thead>
        <tbody>
            <!-- 模板 start -->
            <?php
            // 修改sql語法_雅芳
            $sql = "SELECT `dssn`,`username`,`paymentTypeName`,`payment`,`delivery`,`orderRemark`,`created_at`,`updated_at` 
                FROM `orders` 
                ORDER BY `dssn`";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < count($arr); $i++) {
            ?>
                    <tr>
                        <td>
                            <!-- 這邊刪除了value裡面的值 -->
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <!-- 雅芳:修改class名稱 & td顯示內容 -->
                        <td><?= $arr[$i]["dssn"]; ?></td>
                        <td class="username<?= $arr[$i]['dssn']; ?>"><?= $arr[$i]["username"] ?></td>
                        <td class="paymentTypeName<?= $arr[$i]['dssn']; ?>"><?= $arr[$i]["paymentTypeName"] ?></td>
                        <td><?= $arr[$i]["payment"] ?></td>
                        <td><?= $arr[$i]["delivery"] ?></td>
                        <td class="orderRemark<?= $arr[$i]['dssn']; ?>"><?= $arr[$i]["orderRemark"] ?></td>
                        <td><?= $arr[$i]["created_at"] ?></td>
                        <td><?= $arr[$i]["updated_at"] ?></td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit" onClick="h_Edit_click(<?= $arr[$i]['dssn']; ?>)">&#xE254;</i>
                            </a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete" onClick="h_Delete_click(<?= $arr[$i]['dssn']; ?>)">&#xE872;</i>
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