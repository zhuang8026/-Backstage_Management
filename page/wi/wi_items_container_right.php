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
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Color</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Star</th>
                    <th>sales</th>
                    <!-- <th>CategoryId</th> -->
                    <!-- <th>Content</th> -->
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>Function</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT `itemId`,`itemName`, `itemImg`, `colorid`,`itemsbrand`, `itemstype`, 
                            `itemPrice`, `itemQty`, `itemsstar`, `itemsales`, `itemCategoryId`, `itemscontent`, `created_at`, `updated_at`
                            FROM `items` 
                            ORDER BY `itemId` ASC";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(); 

                    // echo "<pre>";
                    // print_r( $stmt->fetchAll(PDO::FETCH_ASSOC));
                    // exit();
                    
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
                    <td><?= $arr[$i]['itemId']; ?></td>
                    <td class="itemName<?= $arr[$i]['itemId']; ?>"><?= $arr[$i]['itemName']; ?></td>
                    <!-- 图片 -->
                    <td>
                        <?php if($arr[$i]['itemImg'] !== NULL): ?>
                            <img src="../../asset/file_img/<?= $arr[$i]['itemImg'];?>">
                            <?/*= $arr[$i]['studentImg']; */?>
                        <?php endif; ?>
                    </td>
                    <td><?= $arr[$i]['colorid']; ?></td>
                    <td><?= $arr[$i]['itemsbrand']; ?></td>
                    <td><?= $arr[$i]['itemstype']; ?></td>
                    <td><?= $arr[$i]['itemPrice']; ?></td>
                    <td><?= $arr[$i]['itemQty']; ?></td>
                    <td><?= $arr[$i]['itemsstar']; ?></td>
                    <td><?= $arr[$i]['itemsales']; ?></td>
                    <!-- <td><?/*= $arr[$i]['itemCategoryId']; */?></td> -->
                    <!-- <td><?/*= $arr[$i]['itemscontent']; */?></td> -->
                    <td><?= $arr[$i]['created_at']; ?></td>
                    <td><?= $arr[$i]['updated_at']; ?></td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit" onClick="data_text(<?= $arr[$i]['itemId']; ?>)">&#xE254;</i>
                            <script>
                                function data_text(id){
                                    alert($('.itemName'+id).eq(0).html());
                                    // $('.itemName1').eq(0).html();
                                    // console.log($('.itemName'+id));
                                    $('#fun_name').val( $('.itemName'+id).eq(0).html() )
                                };
                            </script>
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