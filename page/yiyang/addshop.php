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