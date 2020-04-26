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

                    <!-- start -->
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox2" name="options[]" value="1">
                                <label for="checkbox2"></label>
                            </span>
                        </td>
                        <td>2</td>
                        <td>40</td>
                        <td>400</td>
                        <td>Dominique Perrier</td>
                        <td>dominiqueperrier@mail.com</td>
                        <td>Obere Str. 57, Berlin, Germany</td>
                        <td>(313) 555-5735</td>
                        <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                        </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox3" name="options[]" value="1">
                                <label for="checkbox3"></label>
                            </span>
                        </td>
                        <td>3</td>
                        <td>30</td>
                        <td>300</td>
                        <td>Maria Anders</td>
                        <td>mariaanders@mail.com</td>
                        <td>25, rue Lauriston, Paris, France</td>
                        <td>(503) 555-9931</td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox4" name="options[]" value="1">
                                <label for="checkbox4"></label>
                            </span>
                        </td>
                        <td>4</td>
                        <td>20</td>
                        <td>410</td>
                        <td>Fran Wilson</td>
                        <td>franwilson@mail.com</td>
                        <td>C/ Araquil, 67, Madrid, Spain</td>
                        <td>(204) 619-5731</td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox5" name="options[]" value="1">
                                <label for="checkbox5"></label>
                            </span>
                        </td>
                        <td>5</td>
                        <td>10</td>
                        <td>910</td>
                        <td>Martin Blank</td>
                        <td>martinblank@mail.com</td>
                        <td>Via Monte Bianco 34, Turin, Italy</td>
                        <td>(480) 631-2097</td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    <!-- end -->

                </tbody>
            </table>
        </div>
        
    </div>