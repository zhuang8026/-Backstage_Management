var checkAllInputValueH = [];
var checkOneInputValueH =[];
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
                checkAllInputValueH.push(this.value);
            });
        } else{
            checkbox.each(function(){
                this.checked = false;   
                checkAllInputValueH =[];                     
            });
        }
        console.log(checkAllInputValueH);
        console.log(checkAllInputValueH.length);
        $('#h_input_delete_all_id').val(checkAllInputValueH);
    });

    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });

    $(".checkboxValue").click(function(){
        console.log(this.value)
        if(this.checked){
            checkOneInputValueH.push(this.value);
        } else{
            this.checked = false;   
            checkOneInputValueH =[];                     
        }
        console.log(checkOneInputValueH);
        console.log(checkOneInputValueH.length);
        $('#h_input_delete_all_id').val(checkOneInputValueH);
    });
});

// JQUERY --- william --- 删除
// function Delete_click_all(id){
//     console.log(id);
//     $('#itemId_input').val(id); // hiiden id
// };

// JAVASCRIPT --- william --- 删除
// function Delete_click_all(){
//     let de_data = document.getElementById("input_delete_all_id_2").value;
//     let de_split = de_data.split(",");
//     for(let s; )
//     document.getElementById("input_delete_all_id").value.pop;
// }