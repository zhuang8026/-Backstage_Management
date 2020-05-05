<!--  以下為點擊出現的畫面  -->
    <!-- 增加 -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="./insert.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">新增會員</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>使用者名稱</label>
                            <input type="text" name="username" id="username" class="form-control" maxlength="10" disabled="disabled" required>
                        </div>
                        <div class="form-group">
                            <label >使用者密碼</label>
                            <input type="password" name="pwd" id="pwd" class="form-control" maxlength="10" required>
                        </div>
                        <div class="form-group">
                            <label>姓名</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>性別</label>
                            <select name="gender" id="gender" class="form-control">
                            <option value="男" class="form-control" selected>男</option>
                            <option value="女" class="form-control">女</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>使用者頭像</label>
                            <input type="file" name="userlogo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>手機號碼</label>
                            <input type="text" name="phoneNumber" id="phoneNumber" value="" maxlength="10" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>信用卡號碼</label>
                            <input type="text" name="card" id="card" value="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>出生年月日</label>
                            <input type="date" name="birthday" value="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>地址</label>
                            <input type="text" name="address" id="address" value="" class="form-control" required>
                            <!-- <textarea  name="address" id="address" value="" maxlength="50" class="form-control" required></textarea> -->
                        </div>
                        <div class="form-group">
                            <label>賣家開通狀態</label>
                            <select name="isActivated" id="isActivated" class="form-control">
                            <option value="0" class="form-control" selected>未開通</option>
                            <option value="1" class="form-control">開通</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="取消">
                        <input type="submit" class="btn btn-success" value="新增">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 修改 -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="updateForm" enctype="multipart/form-data" method="POST" action="./updateEdit.php">
                    <div class="modal-header">
                        <h4 class="modal-title">編輯</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>使用者名稱</label>
                            <input type="text" class="form-control" required name="username_e" id="username_e" value="" placeholder="使用者名稱">
                        </div>
                        <div class="form-group">
                            <label>使用者密碼</label>
                            <input type="text" class="form-control" required name="pwd_e" id="pwd_e" value="" placeholder="使用者密碼">
                        </div>
                        <div class="form-group">
                            <label>姓名</label>
                            <input type="text" class="form-control" required name="name_e" id="name_e" value="" placeholder="姓名">
                        </div>
                        <!-- <div class="form-group">
                            <label>gender</label>
                            <select name="gender_e" id="gender_e" class="form-control">
                            <option value="男" class="form-control" selected>男</option>
                            <option value="女" class="form-control">女</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label>性別</label>
                            <select name="gender_e" class="form-control">
                                <option value="1" class="gender_e" id="gender_man">男</option>
                                <option value="2" class="gender_e" id="gender_girl">女</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label>使用者頭像</label>
                            <img id="memberImg_d_img" src=""/>
                            <input type="file" class="form-control" name="userlogo_e" value="" placeholder="會員圖片" id="userlogo_e">
                        </div>
                        <div class="form-group">
                            <label>手機號碼</label>
                            <input type="text" class="form-control" required name="phoneNumber_e" id="phoneNumber_e" value="" placeholder="電話">
                        </div>
                        <div class="form-group">
                            <label>信用卡號碼</label>
                            <input type="text" class="form-control" required name="card_e" id="card_e" value="" placeholder="信用卡">
                        </div>
                        <div class="form-group">
                            <label>出生年月日</label>
                            <input type="date" class="form-control" required name="birthday_e" id="birthday_e" value="" placeholder="出生年月日">
                        </div>
                        <div class="form-group">
                            <label>地址</label>
                            <input type="text" class="form-control" required name="address_e" id="address_e" value="" placeholder="地址">
                        </div>
                        <div class="form-group">
                            <label>賣家開通狀態</label>
                            <select name="isActivated_e" class="form-control">
                            <option value="0" class="form-control isActivated" selected>未開通</option>
                            <option value="1" class="form-control isActivated">開通</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="取消">
                        <input type="submit" class="btn btn-info" id="btn_submit" value="儲存">
                    </div>
                    <!-- <input type="hidden" name="itemId" value="<?/*= (int)$_GET['itemId']; */?>"> -->
                    <input type="hidden" name="memberId_input" id="memberId_input" value="">
                </form>
            </div>
        </div>
    </div>

    <!-- 刪除 -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="deleteForm" method="POST" action="./k_member_delete_api.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">刪除 ？</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>您確定要刪除這些記錄嗎？ </p>
                       
                        <p class="text-warning"><small>此操作無法取消</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="取消">
                        <input type="submit" class="btn btn-danger" value="刪除">
                    </div>
                    <input type="hidden" name="input_delete_member" id="input_delete_member" value="">
                
                </form>
            </div>
        </div>
    </div>

     <!-- 刪除 全部 -->
     <div id="deleteEmployeeModal_all" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="deleteAllForm" method="POST" action="./k_member_delete_all_api.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">刪除所有選擇?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>您確定要刪除這些記錄嗎？</p>
                        <p class="text-warning"><small>此操作無法取消</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="取消">
                        <input type="submit" class="btn btn-danger" value="刪除">
                    </div>
                    <input type="hidden" name="memberinput_delete_all_id[]" id="memberinput_delete_all_id" value="">
                </form>
            </div>
        </div>
    </div>