<!--  以下為點擊出現的畫面  -->
    <!-- 增加 -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="./alice_seller_insert.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">新增會員</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label >password</label>
                        <input type="text" name="pwd" id="pwd" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <select name="gender" id="gender" class="form-control">
                                <option value="男" class="form-control" selected>男</option>
                                <option value="女" class="form-control">女</option>
                        </div>
                        <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="userlogo" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phoneNumber" id="phoneNumber" value="" maxlength="10" class="form-control" required>
                        </div>
                        <!-- <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required>
                        </div> -->
                        <div class="form-group">
                        <label>Card</label>
                        <input type="text" name="card" id="card" value="" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" name="birthday" value="" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Address</label>
                        <textarea  name="address" id="address" value="" maxlength="50" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                        <label>isActivated</label>
                        <select name="isActivated" class="form-control">
                            <option value="0" class="form-control" selected>0</option>
                            <option value="1"class="form-control">1</option>
                        </select>
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
            <?php
            //SQL 敘述
                $sql = "SELECT `id`, `username`, `pwd`, `name`, `gender`,`userlogo`,
                                `phoneNumber`, `card`, `birthday`,`address`,`isActivated`
                    FROM `users` 
                    WHERE `id` = ?";
            //設定繫結值
            $arrParam = [(int)$_GET['id']];
            // print_r($arrParam);
            // exit();
            //查詢
            $stmt = $pdo->prepare($sql);
            $stmt->execute($arrParam);
                if($stmt->rowCount() > 0){
                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
                }
            ?>
                <form method="POST" action="./alice_seller_updateEdit.php" enctype="multipart/form-data">
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
                                <input type="datetime-local" class="form-control" name="birthday" value="<?php echo $arr['birthday']; ?>" maxlength="10" />
                            </div>
                            <div class="form-group">
                                <label>地址</label>
                                <input type="text" class="form-control" name="address" value="<?php echo $arr['address']; ?>" maxlength="10" />
                            </div>
                            <div class="form-group">
                                <label>開通狀況</label>
                                <select name="isActivated" class="form-control">
                                    <option value="<?php echo $arr['isActivated']; ?>" selected><?php echo $arr['isActivated']; ?></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>使用者頭像</label>
                                <?php if($arr['userlogo'] !== NULL) { ?>
                                    <img class="w200px" src="./files/<?php echo $arr['userlogo']; ?>" />
                                <?php } ?>
                                <input class="form-control-file" type="file" name="userlogo" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
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