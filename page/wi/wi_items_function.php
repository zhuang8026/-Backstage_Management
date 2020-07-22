<!--  以下為點擊出現的畫面  -->
    <!-- 增加 -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="myForm" id="uploadForm" method="POST" enctype="multipart/form-data">
                <!-- <form name="myForm" method="POST" action="../../api/wi_add_api.php" enctype="multipart/form-data"> -->
                    <div class="modal-header">
                        <h4 class="modal-title">新增商品</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- 選擇賣家 -->
                        <!-- <div class="form-group">
                            <label>Sellers / 擁有者</label>
                            <select name="sellersId" required class="form-control" id="sellersId">
                                <option value="0" class="form-control" class="form-control">平台所有</option>
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
                        </div> -->

                        <div class="form-group">
                            <label>Name / 商品名稱</label>
                            <input type="text" class="form-control" required name="itemName" value="" placeholder="商品名稱">
                        </div>
                        <div class="form-group">
                            <label>Image / 商品圖片</label>
                            <input type="file" class="form-control" name="itemImg" value="" placeholder="商品圖片">
                        </div>
                        <!-- 顏色 -->
                        <div class="form-group">
                            <label>Color / 商品顏色</label>
                            <ul id="colorAll">
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="1">
                                    <span style="background-color: #AB3B3A;">真朱红</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="2">
                                    <span style="background-color: #F05E1C;">黄丹橘</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="3">
                                    <span style="background-color: #FFC408;">花葉黃</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="4">
                                    <span style="background-color: #516E41;">青丹綠</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="5">
                                    <span style="background-color: #255359;">千草藍</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="6">
                                    <span style="background-color: #6A4C9C;">桔梗紫</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="7">
                                    <span style="background-color: #BDC0BA;">胡粉白</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="8">
                                    <span style="background-color: #0C0C0C;">碳呂黑</span>
                                    <i class="fas fa-check"></i>
                                </li>
                            </ul>
                            <!-- <input type="text" class="form-control" required name="colorid" value="" placeholder="商品顏色"> -->
                        </div>
                        <div class="form-group">
                            <label>Number / 型號</label>
                            <input type="text" class="form-control" required name="itemsNumber" value="" placeholder="商品型號">
                        </div>
                        <!-- 類型 -->
                        <div class="form-group">
                            <label>Type / 類型</label>
                            <select name="itemstype" required class="form-control" id="itemstype">
                                    <option value="1" class="form-control" selected>運動服</option>
                                    <option value="2" class="form-control">校園制服</option>
                                    <option value="3" class="form-control">書包</option>
                                    <option value="4" class="form-control">帽子</option>
                                    <option value="5" class="form-control">口罩</option>
                                    <option value="6" class="form-control">圍兜</option>
                                    <option value="7" class="form-control">圍裙</option>
                            </select>
                            <!-- <input type="text" class="form-control" required name="itemstype" value="" placeholder="商品類型"> -->
                        </div>
                        <!-- <div class="form-group">
                            <label>Price / 價格</label>
                            <input type="text" class="form-control" required name="itemPrice" value="" placeholder="商品價格">
                        </div>
                        <div class="form-group">
                            <label>Quantity / 數量</label>
                            <input type="text" class="form-control" required name="itemQty" value="" placeholder="商品數量">
                        </div>
                        
                        <div class="form-group">
                            <label>Content / 內容</label>
                            <textarea class="form-control" required name="itemscontent" value="" placeholder="商品備註"></textarea>
                        </div> -->
                        <!-- <div class="form-group">
                            <label>itemsstar</label>
                            <input type="text" class="form-control" required name="name3" value="" maxlength="10">
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" id="axiosItemsClick" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 修改 -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="updateForm" enctype="multipart/form-data" method="POST" action="../../api/wi_updateEdit_api.php">
                    <div class="modal-header">
                        <h4 class="modal-title">編輯 ?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <!-- 選擇賣家 -->
                        <!-- <div class="form-group">
                            <label>Sellers / 擁有者</label>
                            <select name="sellersId" required class="form-control" id="sellersId">
                            <option value="0" class="form-control" class="form-control">平台所有</option>
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
                        </div> -->
                        
                        <div class="form-group">
                            <label>Name / 商品名稱</label>
                            <input type="text" class="form-control" name="itemName_d" value="" placeholder="商品名稱" id="itemName_d">
                        </div>
                        <div class="form-group">
                            <label style="display: block;">Image / 原始</label>
                            <img id="itemImg_d_img" src=""/>
                            <label style="display: block;" for="itemImg_d">Image / 修改</label>
                            <input type="file" class="form-control" name="itemImg_d" value="" id="itemImg_d">
                            <label style="display: block;" for="itemImg_more">Image / 細節圖上傳</label>
                            <input type="file" class="form-control" name="itemImg_more" value="" id="itemImg_more" multiple>
                        </div>
                        <div class="form-group">
                            <label>Color / 原始</label>
                                <div>
                                    <input type="radio" name="colorid" id="colorid_d" value="" checked>
                                    <span id="colorid_span"></span>
                                </div>
                            <label>Color / 修改</label>
                            <ul id="colorAll">
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="1">
                                    <span style="background-color: #AB3B3A;">真朱红</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="2">
                                    <span style="background-color: #F05E1C;">黄丹橘</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="3">
                                    <span style="background-color: #FFC408;">花葉黃</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="4">
                                    <span style="background-color: #516E41;">青丹綠</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="5">
                                    <span style="background-color: #255359;">千草藍</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="6">
                                    <span style="background-color: #6A4C9C;">桔梗紫</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="7">
                                    <span style="background-color: #BDC0BA;">胡粉白</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="colorname">
                                    <input type="radio" name="colorid" value="8">
                                    <span style="background-color: #0C0C0C;">碳呂黑</span>
                                    <i class="fas fa-check"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label>Model / 型號</label>
                            <input type="text" class="form-control" name="itemsNumber_d" value="" placeholder="商品品牌" id="itemsNumber_d">
                        </div>
                        <div class="form-group">
                            <label>Type / 類型</label>
                            <select name="itemstype_d" id="itemstype_d" class="form-control">
                                    <option value="1" class="form-control" selected>運動服</option>
                                    <option value="2" class="form-control">校園制服</option>
                                    <option value="3" class="form-control">書包</option>
                                    <option value="4" class="form-control">帽子</option>
                                    <option value="5" class="form-control">口罩</option>
                                    <option value="6" class="form-control">圍兜</option>
                                    <option value="7" class="form-control">圍裙</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label>Price / 價格</label>
                            <input type="text" class="form-control" name="itemPrice_d" value="" placeholder="商品價格" id="itemPrice_d">
                        </div>
                        <div class="form-group">
                            <label>Quantity / 數量</label>
                            <input type="text" class="form-control" name="itemQty_d" value="" placeholder="商品數量" id="itemQty_d">
                        </div> -->
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" id="btn_submit" value="Save">
                    </div>
                    <!-- <input type="hidden" name="itemId" value="<?/*= (int)$_GET['itemId']; */?>"> -->
                    <input type="hidden" name="itemId_input" id="itemId_input" value="">
                </form>
            </div>
        </div>
    </div>

    <!-- 刪除 -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="deleteForm" method="POST" action="../../api/wi_delete_api.php" enctype="multipart/form-data">
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
                    <input type="hidden" name="input_delete_id" id="input_delete_id" value="">
                </form>
            </div>
        </div>
    </div>

    <!-- 刪除 全部 -->
    <div id="deleteEmployeeModal_all" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="deleteAllForm" method="POST" action="../../api/wi_delete_all_api.php" enctype="multipart/form-data">
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
                    <input type="hidden" name="input_delete_all_id[]" id="input_delete_all_id" value="">
                </form>
            </div>
        </div>
    </div>