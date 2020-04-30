<body>
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
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                            <i class="material-icons">&#xE15C;</i> <span>Delete</span>
                        </a>
                    </div>
                </div>
            </div>
          
            <table id="dt-table" class="table table-striped table-hover">
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
                            WHERE `isActivated` = 1
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
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td><?php echo $arr[$i]['storeId']; ?></td>
                        <td><?php echo $arr[$i]['username']; ?></td>
                        <td><?php echo $arr[$i]['storeName']; ?></td>
                        <td><img style="width:150px" src="images/<?php echo $arr[$i]['storeImg']; ?>"></td>
                        <td><img src="<?php echo $arr[$i]['userlogo']; ?>"></td>
                        <td><?php echo $arr[$i]['storePhone']; ?></td>
                        <td><?php echo $arr[$i]['storeEmail']; ?></td>
                        <td><?php echo $arr[$i]['storeDescription']; ?></td>
                        <td><?php echo $arr[$i]['storeAddress']; ?></td>                  
                        <td>
                            <a href="./updateshop.php?editId=<?php echo $arr[$i]['storeId']; ?>" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="./delete.php?deleteId=<?php echo $arr[$i]['storeId']; ?>" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    <?php	}
                    } ?>
                </tbody>
            </table>
                
            <!-- 這是 頁碼 -->
            <!-- <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>

                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>

                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div> -->

        </div>
    </div>