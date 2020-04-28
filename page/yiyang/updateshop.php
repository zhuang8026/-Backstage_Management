<?php
require_once('../../db.inc.php');
require_once("./shopheader.php");
?>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>以揚 <b>管理的區域</b></h2>
                </div>
            </div>
        </div>
        <form method="POST" action="./updates.php" enctype="multipart/form-data">
        <?php
            $sql = "SELECT  `storeId`,`storeName`,`storeImg`,`storeEmail`,`storePhone`,`storeAddress`,`storeDescription`	
                    From `store`
                    WHERE `storeId` = ? ";
            $arrparam = [$_GET['editId']];
            $stmt = $pdo->prepare($sql);
            $stmt->execute($arrparam);
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
            if(count($arr) > 0) {
        ?>
        <div class="modal-header">
            <h4 class="modal-title">Edit ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="">
                <div class="form-group">
                    <label>賣場名</label>
                    <input type="text" name="storeName" class="form-control" value="<?php echo $arr['storeName'];?>" required>
                </div>
                <div class="form-group">
                    <label>賣場圖</label>
                    <img style="width:150px" id="blah" alt="">
                    <input type="file" name="storeImg" class="form-control"  value="<?php echo $arr['storeImg'];?>"
                    accept="image/*" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group">
                    <label>賣場電話</label>
                    <input type="text" name="storePhone" class="form-control"  value="<?php echo $arr['storePhone'];?>" required>
                <div class="form-group">
                    <label>賣場Email</label>
                    <input type="text" name="storeEmail" class="form-control" value="<?php echo $arr['storeEmail'];?>" required>
                <div class="form-group">
                    <label>賣場描述</label>
                    <input type="text" name="storeDescription" class="form-control" value="<?php echo $arr['storeDescription'];?>"  required>
                </div>
                <div class="form-group">
                    <label>賣場地址</label>
                    <input type="text" name="storeAddress" class="form-control"  value="<?php echo $arr['storeAddress'];?>" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        <?php
        }
        ?>
        <input type="hidden" name="editId" value="<?php echo $_GET['editId']; ?>">
    </form>
    </div>
    
        </div>
</div>
<?php
require_once("./shopfooter.php");
?>