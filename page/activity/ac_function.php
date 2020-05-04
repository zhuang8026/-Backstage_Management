<!--  以下為點擊出現的畫面  -->
    <!-- 增加 -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="../../api/ac_add_api.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">新增會員</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>賣家</label>
                            <select name="sellersId" required class="form-control" id="sellersId">
                            <?php
                                $sql = "SELECT `id`, `username`, `name`
                                        FROM `users` 
                                        LEFT JOIN `stores`
                                        ON `users`.`id` = `stores`.`storeId`
                                        WHERE `isActivated` = 1";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                if($stmt->rowCount() > 0):
                                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    for($i = 0; $i < count($arr); $i++):
                            ?>
                                <option value="<?= $arr[$i]['id']; ?>" class="form-control" class="form-control">ID: <?= $arr[$i]['username'] ?>｜名字: <?= $arr[$i]['name'] ?></option>
                                <?php endfor; ?>
                            <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>賣場</label>
                            <input type="text" name="storeName" id="storeName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>活動ID</label>
                            <input type="text" name="acId" id="acId" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label >活動名稱</label>
                            <input type="text" name="acName" id="acName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>活動文案</label>
                            <input type="text" name="acDescription" id="acDescription" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>活動圖片</label>
                        <input type="file" name="acImg" class="form-control" required>
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
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="updateForm" enctype="multipart/form-data" method="POST" action="../../api/ac_updateEdit.php">
                    <div class="modal-header">
                        <h4 class="modal-title">編輯</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>活動ID</label>
                            <input type="text" class="form-control" required name="acId_e" id="acId_e" value="">
                        </div>
                        <div class="form-group">
                            <label>活動名稱</label>
                            <input type="text" class="form-control" required name="acName_e" id="acName_e" value="" >
                        </div>
                        <div class="form-group">
                            <label>活動文案</label>
                            <input type="text" class="form-control" required name="acDescription_e" id="acDescription_e" value="" >
                        </div>
                        <div class="form-group">
                            <label>活動圖片</label>
                            <img id="acImg_d_img" src=""/>
                            <input type="file" class="form-control" name="acImg_e" value="" id="acImg_e">
                        </div>
                        <div class="form-group">
                            <label>賣家編號</label>
                            <input type="text" class="form-control" required name="sellerId_e" id="sellerId_e" value="" >
                        </div>
                        <div class="form-group">
                            <label>創建者</label>
                            <input type="text" class="form-control" required name="founder_e" id="founder_e" value="" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" id="btn_submit" value="Save">
                    </div>
                    <input type="test" name="acId_input" id="acId_input" value="">
                </form>
            </div>
        </div>
    </div>

    <!-- 刪除 -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="deleteForm" method="POST" action="../../api/ac_delete_api.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete ？</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                    <input type="test" name="input_delete_acid" id="input_delete_acid" value="">
                </form>
            </div>
        </div>
    </div>

    <!-- 刪除 全部 -->
    <div id="deleteEmployeeModal_all" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="deleteAllForm" method="POST" action="../../api/ac_delete_all_api.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete all choose?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records ?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                    <input type="test" name="acinput_delete_all_id[]" id="acinput_delete_all_id" value="">
                </form>
            </div>
        </div>
    </div>