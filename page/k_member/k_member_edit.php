<?php
require_once('../../checkSession.php');
require_once('../../db.inc.php');
?>
<div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
            <?php
    //SQL 敘述
        $sql = "SELECT `id`, `username`, `pwd`, `name`, `gender`,`userlogo`,
                        `phoneNumber`, `card`, `birthday`,`address`
            FROM `users` 
            WHERE `id` = ?";
    //設定繫結值
    $arrParam = [(int)$_GET['editId']];
    //查詢
    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);
        if($stmt->rowCount() > 0){
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        }
    ?>
                <form method="POST" action="./updateEdit.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit ?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>使用者名稱</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $arr['username']; ?>" maxlength="20" />
                        </div>
                        <div class="form-group">
                            <label>使用者密碼</label>
                            <input type="text" class="form-control" name="pwd" value="<?php echo $arr['pwd']; ?>" maxlength="20" />
                        </div>
                        <div class="form-group">
                            <label>姓名</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $arr['name']; ?>" maxlength="20" />
                        </div>
                        <div class="form-group">
                            <label>性別</label>
                            <select name="gender" class="form-control">
                                <option value="<?php echo $arr['gender']; ?>" selected><?php echo $arr['gender']; ?></option>
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>手機號碼</label>
                            <input type="text" class="form-control" name="phoneNumber" value="<?php echo $arr['phoneNumber']; ?>" maxlength="10" />
                        </div>
                        <div class="form-group">
                            <label>信用卡號碼</label>
                            <input type="text" class="form-control" name="card" value="<?php echo $arr['card']; ?>" maxlength="" />
                        </div>
                        <div class="form-group">
                            <label>出生年月日</label>
                            <input type="date" class="form-control" name="birthday" value="<?php echo $arr['birthday']; ?>" maxlength="10" />
                        </div>
                        <div class="form-group">
                            <label>地址</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $arr['address']; ?>" maxlength="10" />
                        </div>
                        <div class="form-group">
                            <label>使用者頭像</label>
                            <?php if($arr['userlogo'] !== NULL) { ?>
                                <img class="w200px" src="./files/<?php echo $arr['userlogo']; ?>" />
                            <?php } ?>
                            <input class="form-control-file" type="file" name="userlogo" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                    <input type="hidden" name="editId" value="<?php echo (int)$_GET['editId']; ?>">
                </form>
               
            </div>
        </div>
    </div>
