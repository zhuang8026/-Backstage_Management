<!--  以下為點擊出現的畫面  -->
    <!-- 增加 -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="myForm" method="POST" action="../../api/add_api.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">新增訂單</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>使用者名稱</label>
                            <input type="text" class="form-control" required name="itemName" value="" placeholder="買家帳號">
                        </div>
                        <div class="form-group">
                            <label>付款方式</label>
                            <input type="text" class="form-control" required name="itemName" value="" placeholder="信用卡/ATM">
                        </div>
                        <div class="form-group">
                            <label>colorid</label>
                            <input type="text" class="form-control" required name="colorid" value="" placeholder="商品顏色">
                        </div>
                        <div class="form-group">
                            <label>itemsbrand</label>
                            <input type="text" class="form-control" required name="itemsbrand" value="" placeholder="商品品牌">
                        </div>
                        <div class="form-group">
                            <label>itemstype</label>
                            <input type="text" class="form-control" required name="itemstype" value="" placeholder="商品類型">
                        </div>
                        <div class="form-group">
                            <label>itemPrice</label>
                            <input type="text" class="form-control" required name="itemPrice" value="" placeholder="商品價格">
                        </div>
                        <div class="form-group">
                            <label>itemQty</label>
                            <input type="text" class="form-control" required name="itemQty" value="" placeholder="商品數量">
                        </div>
                        
                        <div class="form-group">
                            <label>itemscontent</label>
                            <textarea class="form-control" required name="itemscontent" value="" placeholder="商品備註"></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label>itemsstar</label>
                            <input type="text" class="form-control" required name="name3" value="" maxlength="10">
                        </div> -->
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
                <form name="updateForm" enctype="multipart/form-data" method="POST" action="update.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit ?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>itemName</label>
                            <input type="text" class="form-control" required name="itemName" id="itemName" value="" placeholder="商品名稱">
                        </div>
                        <!-- <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" id="btn_submit" value="Save">
                    </div>
                    <!-- <input type="hidden" name="itemId" value="<?/*= (int)$_GET['itemId']; */?>"> -->
                    <input type="hidden" name="itemId" value="1">
                </form>
            </div>
        </div>
    </div>

    <!-- 刪除 -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
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
                </form>
            </div>
        </div>
    </div>