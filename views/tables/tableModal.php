<div id="modalBtns">
    <span data-id="<?php echo $tableId; ?>" id="closeTable">
        <?php echo $textCloseTable; ?>
    </span>
    <span id="closeModal">X</span>
</div>

<div class="container">

    <div class="row mb-6" id="tableInformation">
        <div class="container">
            <span>
                <?php echo $textTableId .$tableId; ?>
            </span>
        </div>    
    </div>

    <hr>

    <div class="row mb-6" id="tableOrderedProducts">
        <div class="container">
           Order Summary
        </div>    
    </div>

    <hr>

    <div class="row mb-6" id="tableAddProducts">
        <div class="container" id="addDrinksTable">
            <h5><?php echo $textDrinksSelection; ?></h5>
            <?php foreach($drinksByCategory as $drinkCategory){ ?> 
                <?php if(!empty($drinkCategory['drinks'])){ ?>
                <div class="drinks-row row"> 
                    <p><strong><?php echo $drinkCategory['category_name'];?></strong></p>
                    <div class="drinks-container container">
                            <?php foreach($drinkCategory['drinks'] as $drink){ ?>
                            <div class="drink container">
                                <p><?php echo $drink['drink_name'] ?></p>
                                <p><?php echo $drink['drink_price'] ?></p>
                                <div class="input-group">
                                    <input type="number" 
                                            class="form-control"
                                            name="qty_drink_<?php echo $drink['drink_id'] ?>"
                                            value=0
                                            min=0>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary qty-more" type="button">+</button>
                                        <button class="btn btn-outline-secondary qty-less" type="button">-</button>
                                    </div>
                                </div>
                            </div>                            
                            <?php } ?>
                    </div>
                </div>
            <?php }} ?>
        </div>

        <hr>
        
        <div class="container" id="addDishesTable">
            <h5><?php echo $textDishesSelection; ?></h5>
            <?php foreach($dishesByCategory as $dishCategory){ ?> 
                <?php if(!empty($dishCategory['dishes'])){ ?>
                <div class="dishes-row row"> 
                    <p><strong><?php echo $dishCategory['category_name'];?></strong></p>
                    <div class="dishes-container container">
                            <?php foreach($dishCategory['dishes'] as $dish){ ?>
                            <div class="drink container">
                                <p><?php echo $dish['dish_name'] ?></p>
                                <p><?php echo $dish['dish_price'] ?></p>

                                <div class="input-group">
                                    <input type="number" 
                                            class="form-control"
                                            name="qty_dish_<?php echo $dish['dish_id'] ?>"
                                            value=0
                                            min=0>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary qty-more" type="button">+</button>
                                        <button class="btn btn-outline-secondary qty-less" type="button">-</button>
                                    </div>
                                </div>
                            </div>                            
                            <?php } ?>
                    </div>
                </div>
            <?php }} ?>
        </div>
    </div>

</div>

<script>

    $(document).on('click','.qty-more',function(){
        var startingQtyMore = $(this).parent('.input-group-append').siblings('input').val();
        startingQtyMore++;      
        $(this).parent('.input-group-append').siblings('input').val(startingQtyMore);
    });

    $(document).on('click','.qty-less',function(){
        var startingQtyLess = $(this).parent('.input-group-append').siblings('input').val();

        if(startingQtyLess <= 0){
            startingQtyLess = 0;
        }else{
            startingQtyLess--;
        }
        
        $(this).parent('.input-group-append').siblings('input').val(startingQtyLess);
    });
</script>