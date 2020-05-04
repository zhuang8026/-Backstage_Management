var checkAllInputValue = [];
var checkOneInputValue =[];
var checkOneUserName =[];
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
                let delete_username = $(this).parent('.custom-checkbox').parents('td').nextAll('.storeusername'+this.value).html();
                checkAllInputValue.push(this.value);
                checkOneUserName.push(delete_username)
            });
        } else{
            checkbox.each(function(){
                this.checked = false;   
                checkAllInputValue =[];  
                checkOneUserName = [];                          
            });
        }
        // console.log(checkAllInputValue);
        // console.log(checkAllInputValue.length);
        $('#yy_input_delete_all_id').val(checkAllInputValue);       // checkbox ID  送入 api 
        $('#yy_input_delete_all_username').val(checkOneUserName);   // username 送入 api 

    });

    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });

    $(".checkboxValue").click(function(){
        // console.log(this); // 20200504 - william
        // console.log($(this).parent('.custom-checkbox').parents('td').nextAll('.storeusername'+this.value).html()); // 20200504 - william
        let delete_username = $(this).parent('.custom-checkbox').parents('td').nextAll('.storeusername'+this.value).html();
        if(this.checked){
            checkOneInputValue.push(this.value);
            checkOneUserName.push(delete_username)
        } else{
            this.checked = false;   
            checkOneInputValue =[];   
            checkOneUserName = [];                  
        }
        $('#yy_input_delete_all_id').val(checkOneInputValue);       // checkbox ID  送入 api 
        $('#yy_input_delete_all_username').val(checkOneUserName);   // username 送入 api 
    });
});
