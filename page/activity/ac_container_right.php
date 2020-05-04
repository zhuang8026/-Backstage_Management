<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6 user_btn">
                <img style="width: 47px; margin-right: 10px; border-radius: 2px;" src="../../asset/img/manangeicon.png" alt="管理者頭像">
                <h2>
                    <b>平台管理者 : <?= $_SESSION['username'] ?></b>
                </h2>
                <button>
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="../../api/logout_api.php?logout=1">logout</a>
                </button>
            </div>
            
            <!-- 刪除 與 新增 -->
            <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                    <i class="material-icons">&#xE147;</i> <span>Add New Employee</span>
                </a>
                <a href="#deleteEmployeeModal_all" class="btn btn-danger" data-toggle="modal">
                    <i class="material-icons" onClick="Delete_click_all()">&#xE15C;</i> <span>Delete</span>
                </a>
            </div>
        </div>
    </div>
    <!-- <div id="chart" class="chart" data-aos="fade-down"></div> -->
    <table class="table table-striped table-hover" id="dt-table" data-aos="fade-up">
        <thead>
            <!-- 標頭 -->
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>acId</th>
                <th>acName</th>
                <th>acDescription</th>
                <th>acImg</th>
                <th>username</th>
                <th>founder</th>
                <th>storeId</th>
                <th>storeName</th>
                <th>newTime</th>
                <th>updTime</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- 模板 start-->
            <?php 
                $sql = "SELECT `acId`, `acName`, `acDescription`, `acImg`,`sellerId`,`newTime`, `updTime`,
                                `users`.`username`, `users`.`name`, 
                                `stores`.`storeId`, `stores`.`storeName`,`stores`.`storeLogo`
                        FROM `marketing`
                        LEFT JOIN `users`
                        ON `marketing`.`sellerId` = `users`.`id`
                        LEFT JOIN `stores`
                        ON `marketing`.`strId` = `stores`.`storeId`
                        WHERE `users`.`isActivated` = 1
                        AND `users`.`shopopen` = 1
                        ORDER BY `acId` ASC";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(); 

                // echo "<pre>";
                // print_r( $stmt->fetchAll(PDO::FETCH_ASSOC));
                // exit();
                
                if($stmt->rowCount() > 0):
                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    for($i = 0; $i < count($arr); $i++):
            ?>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" class="checkboxValue" id="checkbox<?= $arr[$i]['acId']; ?>" name="options[]" value="<?= $arr[$i]['acId']; ?>">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td class= "acId<?= $arr[$i]['acId']; ?>"><?= $arr[$i]['acId']; ?></td>
                <td class= "acName<?= $arr[$i]['acId']; ?> style_acName"><?= $arr[$i]['acName']; ?></td>
                <td class= "acDescription<?= $arr[$i]['acId']; ?> style"><?= $arr[$i]['acDescription']; ?></td>
                <td class="acImg<?= $arr[$i]['acId']; ?>">
                <?php if($arr[$i]['acImg'] !== ""): ?>
                    <img src="../../asset/file_img/<?= $arr[$i]['acImg'];?>">
                <?php else: ?>
                    <img src="../../asset/img/404.jpg">
                <?php endif; ?>
            </td>
                <td class= "username<?= $arr[$i]['acId']; ?>"><?= $arr[$i]['username']; ?></td>
                <td class= "founder<?= $arr[$i]['acId']; ?>"><?= $arr[$i]['name']; ?></td>
                <td class="storeLogo<?= $arr[$i]['acId']; ?>">
                    <?php if($arr[$i]['storeLogo'] !== ""): ?>
                        <img src="../../asset/file_img/<?= $arr[$i]['storeLogo'];?>">
                    <?php else: ?>
                        <img src="../../asset/img/404.jpg">
                    <?php endif; ?>
                </td>>
                <td class= "storeName<?= $arr[$i]['acId']; ?>"><?= $arr[$i]['storeName']; ?></td>
                <td><?= $arr[$i]['newTime']; ?></td>
                <td><?= $arr[$i]['updTime']; ?></td>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Edit" onClick="ac_edit(<?= $arr[$i]['acId']; ?>)">&#xE254;</i>
                    </a>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Delete" onClick="Delete_ac(<?= $arr[$i]['acId']; ?>)">&#xE872;</i>
                    </a>
                </td>
            </tr>
            <?php endfor;?>
            <?php endif;?>
            <!-- 模板 end-->
        </tbody>
    </table>
</div>