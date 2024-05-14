<div id="modalBtns">
    <span data-id="<?= $tableId; ?>" id="closeTable">
        <?= $textCloseTable; ?>
    </span>
    <span id="closeModal">X</span>
</div>

<div class="container">

    <div class="row mb-6" id="tableInformation">
        <div class="container">
            <span id="tableId">
                <?= $textTableId;?>
                <strong class="info-value">
                    <?= $tableId; ?>
                </strong>    
            </span>
            <span id="orderId">
                <?= $textOrderId;?>
                <strong class="info-value">
                    <?= $orderInformation[0]; ?>
                </strong>    
            </span>
        </div>    
    </div>


    <hr>

    <div class="row mb-6" id="tableAddProducts">
        <div class="container" id="addDrinksTable">
            <h5><?= $textDrinksSelection; ?></h5>
            <?php foreach($drinksByCategory as $drinkCategory){ ?> 
                <?php if(!empty($drinkCategory['drinks'])){ ?>
                <div class="drinks-row row"> 
                    <p><strong><?= $drinkCategory['category_name'];?></strong></p>
                    <div class="drinks-container container">
                            <?php foreach($drinkCategory['drinks'] as $drink){ ?>
                            <div class="drink container">
                                <p><?= $drink['drink_name'] ?></p>
                                <p><?= $drink['drink_price'] ?></p>
                                <div class="input-group">
                                    <input type="number" 
                                            class="form-control"
                                            name="qty_drink_<?= $drink['drink_id'] ?>"
                                            value=<?= $drink['quantity'] ?>
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
            <h5><?= $textDishesSelection; ?></h5>
            <?php foreach($dishesByCategory as $dishCategory){ ?> 
                <?php if(!empty($dishCategory['dishes'])){ ?>
                <div class="dishes-row row"> 
                    <p><strong><?= $dishCategory['category_name'];?></strong></p>
                    <div class="dishes-container container">
                            <?php foreach($dishCategory['dishes'] as $dish){ ?>
                            <div class="drink container">
                                <p><?= $dish['dish_name'] ?></p>
                                <p><?= $dish['dish_price'] ?></p>

                                <div class="input-group">
                                    <input type="number" 
                                            class="form-control"
                                            name="qty_dish_<?= $dish['dish_id'] ?>"
                                            value=<?= $dish['quantity'] ?>
                                            min=0>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary qty-btn qty-more" type="button">+</button>
                                        <button class="btn btn-outline-secondary qty-btn qty-less" type="button">-</button>
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
