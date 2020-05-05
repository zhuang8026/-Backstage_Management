<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6 user_btn">
                <!-- <img style="width: 47px; margin-right: 10px; border-radius: 2px;" src="../../asset/img/manangeicon.png" alt="管理者頭像"> -->
                <h2>
                    <b>Admin : <?= $_SESSION['username'] ?></b>
                </h2>
                <!-- <button>
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="../../api/logout_api.php?logout=1">logout</a>
                </button> -->
            </div>
            
            <!-- 刪除 與 新增 -->
            <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                    <i class="material-icons">&#xE147;</i> <span>新增活動</span>
                </a>
                <a href="#deleteEmployeeModal_all" class="btn btn-danger" data-toggle="modal">
                    <i class="material-icons" onClick="Delete_click_all()">&#xE15C;</i> <span>刪除</span>
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
                <th>賣場圖示</th>
                <th>賣場名稱</th>
                <th>活動編號</th>
                <th>活動圖示</th>
                <th>活動名稱</th>
                <th>活動文案</th>
                <th>新增時間</th>
                <!-- <th>更新時間</th> -->
                <th>編輯/刪除</th>
            </tr>
        </thead>
        <tbody>
            <!-- 模板 start-->
            <?php 
                $sql = "SELECT `acId`, `stores`. `storeId`, `stores`.`storeName`,`stores`.`storeLogo`,`acName`, `acDescription`, `acImg`, `newTime`, `updTime` ,`strId`
                FROM `marketing` 
                LEFT JOIN `stores` 
                ON `marketing`.`strId` = `stores`.`storeId` 
                ORDER BY `acId` DESC";
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

                <td class="storeLogo<?= $arr[$i]['acId']; ?>">
                    <?php if($arr[$i]['strId'] < 1): ?>
                        <img src="../../asset/img/logo.png">
                    <?php elseif($arr[$i]['storeLogo'] == ""): ?>
                        <img src="../../asset/img/404.jpg">
                    <?php else: ?>
                        <img src="../../asset/file_img/<?= $arr[$i]['storeLogo'];?>">
                    <?php endif; ?>
                </td>

                <?php if($arr[$i]['strId'] < 1): ?>
                    <td class= "storeName0">OTIS 平台所有</td>
                <?php else: ?>
                    <td class= "storeName<?= $arr[$i]['acId']; ?>"><?= $arr[$i]['storeName']; ?></td>
                <?php endif; ?>

                <td class= "acId<?= $arr[$i]['acId']; ?>"><?= $arr[$i]['acId']; ?></td>

                <td class="acImg<?= $arr[$i]['acId']; ?>">
                    <?php if($arr[$i]['acImg'] == ""): ?>
                        <img src="../../asset/img/404.jpg">
                    <?php elseif($arr[$i]['acImg'] == 0): ?>
                        <img src="../../asset/img/logo.png">
                    <?php else: ?>
                        <img src="../../asset/file_img/<?= $arr[$i]['acImg'];?>">
                    <?php endif; ?>
                </td>
                <td class= "acName<?= $arr[$i]['acId']; ?> style_acName"><?= $arr[$i]['acName']; ?></td>
                <td class= "acDescription<?= $arr[$i]['acId']; ?> style"><?= $arr[$i]['acDescription']; ?></td>
                <td><?= $arr[$i]['newTime']; ?></td>
                <!-- <td><?/*= $arr[$i]['updTime']; */?></td> -->
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