    <!-- cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/no-data-to-display.js"></script>
    
    <!-- common -->
    <script src="../../asset/js/wi_items_javascript.js"></script>

    <script>
        function data_text(id){
            console.log($('.itemName'+id).eq(0).html());
            // $('.itemName1').eq(0).html();
            // console.log($('.itemName'+id));
            $('#itemName').val( $('.itemName'+id).eq(0).html() )
        };
        
        $(".modal-footer input#btn_submit").on("click", function(){
            $.ajax({
                method: "PSOT",
                url: "../../api/update_api.php",
                dataType: "json",
                data: { 
                    name: $("input[name='itemName']").val(),
                    // itemId: $("input#itemId[type='hidden']").val(), 
                    // content: $("textarea[name='content']").val(), 
                    // rating: $("input[name='rating']").val()
                }
            })
            .done(function( json ) {
                alert(json.info);
                
            })
            .fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        });
        
    </script>
</body>
</html>