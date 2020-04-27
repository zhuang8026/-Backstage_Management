<div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>歡迎回來！<?= $_SESSION['username'] ?></b></h2>
                    </div>
                    
                    <!-- 刪除 與 新增 -->
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">&#xE147;</i> <span>新增會員</span>
                        </a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                            <i class="material-icons">&#xE15C;</i> <span>Delete</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- <div id="chart"></div> -->
            <table class="table table-striped table-hover" id="dt-table">
                <thead>
                    <!-- 標頭 -->
                    <tr>
                        <th>選擇
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <!-- <th></th> -->
                        <th>使用者名稱</th>
                        <th>使用者密碼</th>
                        <th>姓名</th>
                        <th>性別</th>
                        <th>使用者頭像</th>
                        <th>手機號碼</th>
                        <th>信用卡號碼</th>
                        <th>出生年月日</th>
                        <th>地址</th>
                        <th>編輯刪除</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT `id`, `username`, `pwd`,
                    `name`, `gender`,`userlogo`, `phoneNumber`,`card`,`birthday`,`address`
                            FROM `users` 
                            ORDER BY `id` ASC";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    if($stmt->rowCount() > 0) {
                        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        for($i = 0; $i < count($arr); $i++) {
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['id']; ?>" />
                        </td>
                        <td><?php echo $arr[$i]['username']; ?></td>
                        <td><?php echo $arr[$i]['pwd']; ?></td>
                        <td><?php echo $arr[$i]['name']; ?></td>
                        <td><?php echo $arr[$i]['gender']; ?></td>
                        <td>
                        <?php if($arr[$i]['userlogo'] !== NULL) { ?>
                            <img class="w200px" src="./files/<?php echo $arr[$i]['userlogo']; ?>">
                        <?php } ?>
                        </td>
                        <td><?php echo $arr[$i]['phoneNumber']; ?></td>
                        <td><?php echo $arr[$i]['card']; ?></td>
                        <td><?php echo $arr[$i]['birthday']; ?></td>
                        <td><?php echo $arr[$i]['address']; ?></td>
                        <td>
                            <a href="./k_member_edit.php?editId=<?php echo $arr[$i]['id']; ?>" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="./delete.php?deleteId=<?php echo $arr[$i]['id'];?>" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    <!-- william -  -->
                    <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="10">沒有資料</td>
                        </tr>
                    <?php
                    }
                    ?>
                
                </tbody>
            </table>
        </div>
        
    </div>