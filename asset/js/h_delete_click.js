// JQUERY --- william --- 修改
// 把#itemId_input改成#dssn_input _雅芳
function h_Delete_click(id) {
    console.log(id);
    $('#dssn_input').val(id); // hiiden id
};

//上下二選一都有成功

JAVASCRIPT --- william --- 修改
function h_Delete_click(id) {
    console.log(id);
    document.querySelectorAll("input#input_delete_id_h")[0].value = id;
}