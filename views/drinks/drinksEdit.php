<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?php echo $textEditDrinkTitle; ?> </h2>
        <form id="drinkAddForm" action="drinksList" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-4">
                <div class="input-group">
                    <input 
                        type="text" 
                        placeholder="<?php echo $textDrinkName; ?>" 
                        class="form-control" 
                        id="inputDrinkName" 
                        name="inputDrinkName" 
                        value="<?php echo $drinkToEdit[0]['drink_name']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <select class="form-select" name="inputDrinkCategory">
                    <?php if(isset($drinksCategories)){ ?>
                        <?php foreach ($drinksCategories as $category){ 
                            if($drinkToEdit[0]['drink_category'] == $category['category_id']){ ?>
                                <option selected value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
                            <?php } ?>
                              
                        <?php } ?>   
                    <?php } ?>
                </select>
            </div>
            <div class="col-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><?php echo $storeCurrency; ?></span>
                    <input 
                        type="text" 
                        placeholder="<?php echo $textDrinkHousePrice; ?>" 
                        class="form-control" 
                        id="inputDrinkHousePrice" 
                        name="inputDrinkHousePrice" 
                        aria-describedby="basic-addon1" 
                        value="<?php echo $drinkToEdit[0]['drink_home_price']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><?php echo $storeCurrency; ?></span>
                    <input 
                        type="text" 
                        placeholder="<?php echo $textDrinkClientPrice; ?>" 
                        class="form-control" 
                        id="inputDrinkClientPrice" 
                        name="inputDrinkClientPrice" 
                        aria-describedby="basic-addon2" 
                        value="<?php echo $drinkToEdit[0]['drink_category']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit"><?php echo $textDrinksEditSubmit; ?></button>
            </div>
        </form>
    </div>
</div>