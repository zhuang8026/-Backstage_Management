// JQUERY ---
function h_Edit_click(id){
    console.log(id);
    $('#order_input').val(id); // hiiden id
    $('input#paymentTypeId_h').val( $('.paymentTypeId'+id).eq(0).html() );
    $('input#payment_h').val( $('.payment'+id).eq(0).html() );
    $('input#delivery_h').val( $('.delivery'+id).eq(0).html() );
    $('textarea#orderRemark_h').val( $('.orderRemark'+id).eq(0).html() );
};
