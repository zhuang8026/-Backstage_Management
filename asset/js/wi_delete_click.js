// JQUERY --- william --- 修改
function Delete_click(id){
    console.log(id);
    $('#itemId_input').val(id); // hiiden id
};

// JAVASCRIPT --- william --- 修改
function Delete_click(id){
    console.log(id);
    document.querySelectorAll("input#input_delete_id")[0].value = id;
}