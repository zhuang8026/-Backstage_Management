// JQUERY --- 雅芳修改中
function h_Edit_click(id) {
    console.log($('.username' + id).eq(0).html());
    $('#dssn_input').val(id); // hiiden id
    $('input#username_h').val($('.username' + id).eq(0).html());
    $('input#paymentTypeName_h').val($('.paymentTypeName' + id).eq(0).html());
    $('textarea#orderRemark_h').val($('.orderRemark' + id).eq(0).html());
};