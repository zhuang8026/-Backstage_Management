<!-- add -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="./INSERTshop.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <label>SellerId</label>
                    <input type="text" name="sellerId" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>賣場名</label>
                    <input type="text" name="storeName" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>賣場圖</label>
                    <img style="width:150px" id="blah" alt="">
                    <input type="file" name="storeImg" class="form-control" accept="image/*" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="form-group">
                    <label>賣場電話</label>
                    <input type="text" name="storePhone" class="form-control" required>
                    <div class="form-group">
                    <label>賣場Email</label>
                    <input type="text" name="storeEmail" class="form-control" required>
                    <label>賣場描述</label>
                    <input type="text" name="storeDescription" class="form-control" required>
                    <label>賣場地址</label>
                    <input type="text" name="storeAddress" class="form-control" required>
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

<!-- edit -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="updateForm" enctype="multipart/form-data" method="POST" action="./updatesapi.php">
                <div class="modal-header">
                    <h4 class="modal-title">編輯</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>賣場名</label>
                        <input type="text" class="form-control" required name="storeName_f" id="storeName_f" value="" >
                    </div>
                    <div class="form-group">
                        <label>賣場圖</label>
                        <img id="storeImg_d_img" src=""/>
                        <input type="file" class="form-control" name="storeImg_d" value=""  id="storeImg_d">
                    </div>
                    <div class="form-group">
                        <label>賣場電話</label>
                        <input type="text" class="form-control" required name="storePhone_f" id="storePhone_f" value="">
                    </div>
                    <div class="form-group">
                        <label>賣場Email</label>
                        <input type="text" class="form-control" name="storeEmail_f" value=""  id="storeEmail_f">
                    </div>
                    <div class="form-group">
                        <label>賣場描述</label>
                        <input type="text" class="form-control" name="storeDescription_f" value="" id="storeDescription_f">
                    </div>
                    <div class="form-group">
                        <label>賣場地址</label>
                        <input type="text" class="form-control" name="storeAddress_f" value=""  id="storeAddress_f">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" id="btn_submit" value="Save">
                </div>
                <!-- <input type="hidden" name="itemId" value="<?/*= (int)$_GET['itemId']; */?>"> -->
                <input type="text" name="storeId_input" id="storeId_input" value="">
            </form>
        </div>
    </div>
</div>

<!-- 刪除 -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="deleteForm" method="POST" action="./deleteapi.php" enctype="multipart/form-data">
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
                <input type="test" name="input_delete_id_f" id="input_delete_id_f" value="">
            </form>
        </div>
    </div>
</div>