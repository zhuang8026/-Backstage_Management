<div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>歡迎回來！<?= $_SESSION['username'] ?></b></h2>
                    </div>
                    
                    <!-- 刪除 與 新增 -->
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">&#xE147;</i> <span>新增訂單</span>
                        </a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                            <i class="material-icons">&#xE15C;</i> <span>Delete</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- <div id="chart"></div> -->
             <table class="table table-striped table-hover" id="dt-table">
                <thead><!-- 標頭 -->
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
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
                <?php
                    $sqlOrder = "SELECT `dssn`,`username`,`paymentTypeName`,`payment`,`delivery`,`orderRemark`,`created_at`,`updated_at` 
                    FROM `orders` 
                    ORDER BY `dssn`";
                    $stmtOrder = $pdo->prepare($sqlOrder);
                    $stmtOrder->execute();
                    if ($stmtOrder->rowCount() > 0) {
                        $arrOrders = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);
                        for ($i = 0; $i < count($arrOrders); $i++) {
                            ?>    
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td><?php echo $arrOrders[$i]["dssn"] ?></td>
                        <td><?php echo $arrOrders[$i]["username"] ?></td>
                        <td><?php echo $arrOrders[$i]["paymentTypeName"] ?></td>
                        <td><?php echo $arrOrders[$i]["payment"] ?></td>
                        <td><?php echo $arrOrders[$i]["delivery"] ?></td>
                        <td><?php echo $arrOrders[$i]["orderRemark"] ?></td>
                        <td><?php echo $arrOrders[$i]["created_at"] ?></td>
                        <td><?php echo $arrOrders[$i]["updated_at"] ?></td>
                       
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
    </div>