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
            <?php foreach($drinksByCategory as $drinkCategory){ ?> 
                <div class="drinks-row row">
                    <p><strong><?php echo $drinkCategory['category_name'];?></strong></p>
                    <div class="drinks-container container">
                        <?php if(!empty($drinkCategory['drinks'])){ 
                            foreach($drinkCategory['drinks'] as $drink){ ?>
                            <div class="drink container">
                                <p><?php echo $drink['drink_name'] ?></p>
                                <p><?php echo $drink['drink_price'] ?></p>
                            </div>                            
                        <?php }} else { ?>
                            <p><?php echo $textNoProducts; ?></p>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        
        <div class="container" id="addDishesTable">
            
        </div>
    </div>

</div>