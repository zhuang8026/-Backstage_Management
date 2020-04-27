<div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>歡迎回來！<?= $_SESSION['username'] ?></b></h2>
                </div>
                
                <!-- 刪除 與 新增 -->
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                        <i class="material-icons">&#xE147;</i> <span>Add New Employee</span>
                    </a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                        <i class="material-icons">&#xE15C;</i> <span>Delete</span>
                    </a>
                </div>
            </div>
        </div>
        <div id="chart"></div>
        <table class="table table-striped table-hover" id="dt-table">
            <thead>
                <!-- 標頭 -->
                <tr>
                    <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    <th>number</th>
                    <th>庫存量</th>
                    <th>銷售量</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT `itemId`,`itemName`, `itemImg`, `colorid`,`itemsbrand`, `itemstype`, 
                            `itemPrice`, `itemQty`, `itemsstar`, `itemCategoryId`, `itemscontent`, `created_at`, `updated_at`
                            FROM `items` 
                            ORDER BY `itemId` ASC";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(); 

                    
                    if($stmt->rowCount() > 0):
                        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                        for($i = 0; $i < count($arr); $i++):
                ?>
                <!-- 模板 start-->
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox1" name="options[]" value="1">
                            <label for="checkbox1"></label>
                        </span>
                    </td>
                    <td>1</td>
                    <td>50</td>
                    <td>500</td>
                    <td>Thomas Hardy</td>
                    <td>thomashardy@mail.com</td>
                    <td>89 Chiaroscuro Rd, Portland, USA</td>
                    <td>(171) 555-2222</td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                        </a>
                    </td>
                </tr>
                <!-- 模板 end-->
                <?php endfor;?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
    
</div>