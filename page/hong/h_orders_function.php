<!--  以下為點擊出現的畫面  -->
<!-- 雅芳:修改action路徑 & 欄位顯示內容 -->
<!-- 增加 -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <form name="myForm" method="POST" action="../../api/h_add_api.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">新增</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- 選擇買家帳號 -->
                    <div class="form-group">
                        <label>Users / 買家帳號</label>
                        <select name="username" required class="form-control">
                            <option value="0" class="form-control" class="form-control">選擇買家</option>
                            <?php
                            $sql = "SELECT `username`, `name`
                                        FROM `users`
                                        ORDER BY `username` ASC";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) :
                                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                for ($i = 0; $i < count($arr); $i++) :
                            ?>
                                    <option value="<?= $arr[$i]['username']; ?>" class="form-control" class="form-control">帳號: <?= $arr[$i]['username'] ?>｜姓名: <?= $arr[$i]['name'] ?></option>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <!-- 選擇商品名稱 -->
                    <div class="form-group">
                        <label>Products / 商品名稱</label>
                        <select name="itemId" required class="form-control">
                            <option value="0" class="form-control" class="form-control">選擇商品</option>
                            <?php
                            $sql = "SELECT `itemId`, `itemName`
                                        FROM `items`
                                        ORDER BY `itemId` ASC";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) :
                                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                for ($i = 0; $i < count($arr); $i++) :
                            ?>
                                    <option value="<?= $arr[$i]['itemId']; ?>" class="form-control">編號: <?= $arr[$i]['itemId'] ?>｜名稱: <?= $arr[$i]['itemName'] ?></option>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <!-- 選擇付款方式 -->
                    <div class="form-group">
                        <label>Pay / 付款方式</label>
                        <select name="paymentTypeId" required class="form-control">
                            <option value="0" class="form-control" class="form-control">選擇付款方式</option>
                            <?php
                            $sql = "SELECT `paymentTypeId`, `paymentTypeName`
                                        FROM `payment_types`
                                        ORDER BY `paymentTypeId` ";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) :
                                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                for ($i = 0; $i < count($arr); $i++) :
                            ?>
                                    <option value="<?= $arr[$i]['paymentTypeId']; ?>" class="form-control" class="form-control">編號: <?= $arr[$i]['paymentTypeId'] ?>｜名稱: <?= $arr[$i]['paymentTypeName'] ?></option>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <!-- 訂單備註 -->
                    <div class="form-group">
                        <label>Content / 訂單備註</label>
                        <textarea class="form-control" name="orderRemark" value="" placeholder=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 修改 -->
<!-- 雅芳:修改 class / id / 顯示內容 -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="updateForm" enctype="multipart/form-data" method="POST" action="../../api/h_updateEdit_api.php">
                <div class="modal-header">
                    <h4 class="modal-title">修改 ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- 修改:選擇付款方式 -->
                    <div class="form-group">
                        <label>Pay / 付款方式</label>
                        <select name="paymentTypeId_h" required class="form-control" id="paymentTypeId_h">
                            <!-- <option value="0" class="form-control" class="form-control">選擇付款方式</option> -->
                            <?php
                            $sql = "SELECT `paymentTypeId`, `paymentTypeName`
                                        FROM `payment_types`
                                        ORDER BY `paymentTypeId` ";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) :
                                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                for ($i = 0; $i < count($arr); $i++) :
                            ?>
                                    <option value="<?= $arr[$i]['paymentTypeId']; ?>" class="form-control" class="form-control">編號: <?= $arr[$i]['paymentTypeId'] ?>｜名稱: <?= $arr[$i]['paymentTypeName'] ?></option>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <!-- 修改:選擇付款狀態 -->
                    <div class="form-group">
                        <label>Status / 付款狀態</label>
                        <select name="payment_h" id="payment_h" class="form-control">
                            <option value="等待付款" class="form-control" selected>等待付款</option>
                            <option value="已付款" class="form-control">已付款</option>
                            <option value="貨到付款" class="form-control">貨到付款</option>
                        </select>
                    </div>
                    <!-- 修改:選擇配送狀態 -->
                    <div class="form-group">
                        <label>Status / 配送狀態</label>
                        <select name="delivery_h" id="delivery_h" class="form-control">
                            <option value="未出貨" class="form-control" selected>未出貨</option>
                            <option value="配送中" class="form-control">配送中</option>
                            <option value="已送達" class="form-control">已送達</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Content / 訂單備註</label>
                        <textarea class="form-control" id="orderRemark_h" name="orderRemark_h" value="" placeholder="備註"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" id="btn_submit" value="Save">
                </div>
                <input type="hidden" name="order_input" id="order_input" value="">
            </form>
        </div>
    </div>
</div>

<!-- 刪除 -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="deleteForm" method="POST" action="../../api/h_delete_api.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">刪除 ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>您確定要刪除這些記錄嗎 ？</p>
                    <p class="text-warning"><small>此操作無法取消</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
                <!-- 除錯完成後 請將下面的type改成hidden -->
                <input type="hidden" name="input_delete_id_h" id="input_delete_id_h" value="">
            </form>
        </div>
    </div>
</div>

<!-- 刪除 全部 -->
<div id="deleteEmployeeModal_all" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="deleteAllForm" method="POST" action="../../api/h_delete_all_api.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">刪除所有選擇 ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>您確定要刪除這些記錄嗎 ？</p>
                    <p class="text-warning"><small>此操作無法取消</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
                <!-- 除錯完成後 請將下面的type改成hidden -->
                <input type="hidden" name="h_input_delete_all_id[]" id="h_input_delete_all_id" value="">
            </form>
        </div>
    </div>
</div>