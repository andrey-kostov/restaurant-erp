$(document).ready(function(){
    //Table Modal More Button
    $(document).on('click','.qty-more',function(){
        startingQtyMore = $(this).parent('.input-group-append').siblings('input').val();
        startingQtyMore++;      
        $(this).parent('.input-group-append').siblings('input').val(startingQtyMore);

        //Type of product and product id
        var thisName = $(this).parent('.input-group-append').siblings('input').attr('name');

        var thisSplitId = thisName.split('_');
        var thisProductType = thisSplitId[1];
        var thisProductId = thisSplitId[2];

        updateProductAjax('more',startingQtyMore,thisProductType,thisProductId);
    });

    //Table Modal Less Button
    $(document).on('click','.qty-less',function(){
        startingQtyLess = $(this).parent('.input-group-append').siblings('input').val();
        if(startingQtyLess <= 0){
            startingQtyLess = 0;
            $(this).parent('.input-group-append').siblings('input').val(startingQtyLess);
        }else{
            startingQtyLess--;
            $(this).parent('.input-group-append').siblings('input').val(startingQtyLess);

            //Type of product and product id
            var thisName = $(this).parent('.input-group-append').siblings('input').attr('name');
    
            var thisSplitId = thisName.split('_');
            var thisProductType = thisSplitId[1];
            var thisProductId = thisSplitId[2];
    
        }
        updateProductAjax('less',startingQtyLess,thisProductType,thisProductId);
    });

    // Table Modal Order Products
    function updateProductAjax(action,quantity,productType,productId){

        //Order information
        var tableId = $('#tableId .info-value').text().trim();
        var orderId = $('#orderId .info-value').text().trim();

        $.ajax({
            type: "POST",
            url: "tables/ajaxTableUpdate",
            data: {
                action:action,
                quantity:quantity,
                productType:productType,
                productId:productId,
                tableId:tableId,
                orderId:orderId
            },
            success: function(response) {
               console.log(response);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Request Error:", status, error);
            }
        });
    }

    //Statistics All Orders
    $(document).on('click','.btn.filter-button',function(){
        if($(this).hasClass('today')){
            getOrdersButtons('update',1);
        }else if($(this).hasClass('day')){
            getOrdersButtons('update',2);
        }else if($(this).hasClass('week')){
            getOrdersButtons('update',7);
        }else if($(this).hasClass('month')){
            getOrdersButtons('update',30);
        }
    });

    function getOrdersButtons(action,period){
        $.ajax({
            type: "POST",
            url: "ajaxOrdersButton",
            data: {
                action:action,
                period:period
            },
            success: function(response) {
                var jsonResponse = JSON.parse(response);
                $('.container.order-results tbody').empty();
                $.each(jsonResponse,function(){
                    
                    var tableRow = "<tr>";
                            tableRow += "<td>"+this.order_id+"</td>";
                            tableRow += "<td>"+this.order_table+"</td>";
                            tableRow += "<td>"+this.order_date+"</td>";
                            tableRow += "<td>";
                                if((this.ordered_dishes).length > 0){
                                    $.each(this.ordered_dishes,function(){
                                        tableRow += this.qty+" x <strong>"+this.dish_name+"</strong> <small>("+(this.dish_price).toFixed(2)+")</small> = "+(this.dish_total_price).toFixed(2)+"<br>";
                                    });
                                }else{
                                    tableRow += "---";
                                }
                            tableRow += "</td>";
                            tableRow += "<td>";
                                if((this.ordered_drinks).length > 0){
                                    $.each(this.ordered_drinks,function(){
                                        tableRow += this.qty+" x <strong>"+this.drink_name+"</strong> <small>("+(this.drink_price).toFixed(2)+")</small> = "+(this.drink_total_price).toFixed(2)+"<br>";
                                    });
                                }else{
                                    tableRow += "---";
                                }
                            tableRow += "</td>";
                            tableRow += "<td>"+(this.order_total).toFixed(2)+"</td>";
                            tableRow += "<td>"+(this.order_total_profit).toFixed(2)+"</td>";
                        tableRow += "</tr>";
                    $('.container.order-results tbody').append(tableRow);
                });
               
            },
            error: function(xhr, status, error) {
                console.error("AJAX Request Error:", status, error);
            }
        });
    }
});