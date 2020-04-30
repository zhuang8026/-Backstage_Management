<!--  以下為點擊出現的畫面  -->
<!-- 雅芳:修改action路徑 & 欄位顯示內容 -->
<!-- 增加 -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <form name="myForm" method="POST" action="../../api/h_add_api.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">新增訂單</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>買家帳號</label>
                        <input type="text" class="form-control" required name="username" value="" placeholder="帳號">
                    </div>
                    <div class="form-group">
                        <label>付款方式</label>
                        <input type="text" class="form-control" required name="paymentTypeName" value="" placeholder="信用卡/ATM...">
                    </div>
                    <div class="form-group">
                        <label>訂單備註</label>
                        <textarea class="form-control" name="orderRemark" value="" placeholder="備註"></textarea>
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
                    <h4 class="modal-title">修改訂單</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>買家帳號</label>
                        <input type="text" class="form-control" id="username_h" name="username_h" value="" placeholder="帳號">
                    </div>
                    <div class="form-group">
                        <label>付款方式</label>
                        <input type="text" class="form-control" id="paymentTypeName_h" name="paymentTypeName_h" value="" placeholder="信用卡/ATM...">
                    </div>
                    <div class="form-group">
                        <label>訂單備註</label>
                        <textarea class="form-control" id="orderRemark_h" name="orderRemark_h" value="" placeholder="備註"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" id="btn_submit" value="Save">
                </div>
                <!-- <input type="hidden" name="itemId" value="<?/*= (int)$_GET['itemId']; */ ?>"> -->
                <!-- 除錯完成後 請將下面的type改成hidden -->
                <input type="hidden" name="dssn_input" id="dssn_input" value="">
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
                    <h4 class="modal-title">Delete ?</h4>
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
                <!-- 除錯完成後 請將下面的type改成hidden -->
                <input type="text" name="input_delete_id_h" id="input_delete_id_h" value="">
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
                    <input type="hidden" name="h_input_delete_all_id[]" id="h_input_delete_all_id" value="">
                </form>
            </div>
        </div>
    </div>