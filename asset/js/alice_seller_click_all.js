var checkAllSellerInputValue = [];
var checkOneSellerInputValue =[];
var i;
// 全選功能
$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();
    
    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;
                // console.log(this.value); 
                // jq->push === js->pop 
                checkAllSellerInputValue.push(this.value);
            });
        } else{
            checkbox.each(function(){
                this.checked = false;   
                checkAllSellerInputValue =[];                     
            });
        }
        console.log(checkAllSellerInputValue);
        console.log(checkAllSellerInputValue.length);
        $('#sellerinput_delete_all_id').val(checkAllSellerInputValue);
    });

    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });

    $(".checkboxValue").click(function(){
        console.log(this.value)
        if(this.checked){
            checkOneSellerInputValue.push(this.value);
        } else{
            this.checked = false;   
            checkOneSellerInputValue =[];                     
        }
        console.log(checkOneSellerInputValue);
        console.log(checkOneSellerInputValue.length);
        $('#sellerinput_delete_all_id').val(checkOneSellerInputValue);
    });
});

// JQUERY 
// function Delete_click_all(id){
//     console.log(id);
//     $('#itemId_input').val(id); // hiiden id
// };

// JAVASCRIPT 
// function Delete_click_all(){
//     let de_data = document.getElementById("input_delete_all_id_2").value;
//     let de_split = de_data.split(",");
//     for(let s; )
//     document.getElementById("input_delete_all_id").value.pop;
// }