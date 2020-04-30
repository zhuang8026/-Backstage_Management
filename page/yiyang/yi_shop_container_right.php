<div class="table-wrapper">
    
    <div class="table-title">
        <div class="row">

            <div class="col-sm-6">
                <h2>以揚 <b>管理的區域</b></h2>
            </div>
            
            <!-- 刪除 與 新增 -->
            <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                    <i class="material-icons">&#xE147;</i> <span>Add New shop</span>
                </a>
                <a href="#deleteEmployeeModal_all" class="btn btn-danger" data-toggle="modal">
                    <i class="material-icons">&#xE15C;</i> <span>Delete</span>
                </a>
            </div>
        </div>
    </div>
        
    <table id="myTable" class="table table-striped table-hover">
        <thead>
            <!-- 標頭 -->
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>賣家ID</th>
                <th>賣家所屬人</th>
                <th>商場名</th>
                <th>商家圖</th>
                <th>賣家圖</th>
                <th>Phone</th>
                <th>Email</th>
                <th>商場描述</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT `storeId`,`username`,`storeName`,`userlogo`,`storeEmail`,`storeImg`,`storePhone`,`storeAddress`,`storeDescription`,`sellerId`,`id` 	
                    FROM `store` INNER JOIN `users`
                    ON  `store`.`sellerId` = `users`.`id`
                    -- WHERE `isActivated` = 1
                    ORDER BY `storeId` ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                for($i = 0 ; $i < count($arr) ; $i++){
        ?>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" class="checkboxValue" id="checkbox<?= $arr[$i]['storeId']; ?>" name="options[]" value="<?= $arr[$i]['storeId']; ?>">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td class="storeId<?php echo $arr[$i]['storeId']?>"><?= $arr[$i]["storeId"]; ?></td>
                <td class="username<?php echo $arr[$i]['id']?>"><?php echo $arr[$i]['username']; ?></td>
                <td class="storeName<?php echo $arr[$i]['storeId']; ?>"><?php echo $arr[$i]['storeName']; ?></td>
                <td class="storeImg<?php echo $arr[$i]['storeId']; ?>"><img style="width:150px" src="images/<?php echo $arr[$i]['storeImg']; ?>"></td>
                <td class="userlogo<?php echo $arr[$i]['id']?>"><img src="<?php echo $arr[$i]['userlogo']; ?>"></td>

                <td class="userlogo<?= $arr[$i]['id']; ?>">
                    <?php if($arr[$i]['userlogo'] !== ""): ?>
                        <img src="./files/<?= $arr[$i]['userlogo'];?>">
                    <?php else: ?>
                        <img src="../files/404.png">
                    <?php endif; ?>
                </td>

                <td class="storePhone<?php echo $arr[$i]['storeId']; ?>"><?php echo $arr[$i]['storePhone']; ?></td>
                <td class="storeEmail<?php echo $arr[$i]['storeId']; ?>"><?php echo $arr[$i]['storeEmail']; ?></td>
                <td class="storeDescription<?php echo $arr[$i]['storeId']; ?>"><?php echo $arr[$i]['storeDescription']; ?></td>
                <td class="storeAddress<?php echo $arr[$i]['storeId']; ?>"><?php echo $arr[$i]['storeAddress']; ?></td>                  
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                        <!-- <i class="material-icons" data-toggle="tooltip" title="Edit" onClick="Editshop(<?= $arr[$i]['storeId']; ?>)">&#xE254;</i> -->
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Delete" onClick="f_Delete_click(<?= $arr[$i]['storeId']; ?>)">&#xE872;</i>
                    </a>
                </td>
            </tr>
            <?php	}
            } ?>
        </tbody>
    </table>


    </div>
</div>