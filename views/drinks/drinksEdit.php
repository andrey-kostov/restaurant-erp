<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?= $textEditDrinkTitle; ?> </h2>
        <form id="drinkUpdateForm" action="<?= $root;?>drinksList" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-1 d-none">
                <div class="input-group">
                    <input 
                        type="text" 
                        placeholder="<?= $textDrinkId; ?>" 
                        class="form-control" 
                        id="inputUpdateDrinkId" 
                        name="inputUpdateDrinkId" 
                        value="<?= $drinkToEdit[0]['drink_id']?>"
                        required>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group">
                    <input 
                        type="text" 
                        placeholder="<?= $textDrinkName; ?>" 
                        class="form-control" 
                        id="inputUpdateDrinkName" 
                        name="inputUpdateDrinkName" 
                        value="<?= $drinkToEdit[0]['drink_name']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <select class="form-select" name="inputUpdateDrinkCategory">
                    <?php if(isset($drinksCategories)){ ?>
                        <?php foreach ($drinksCategories as $category){ 
                            if($drinkToEdit[0]['drink_category'] == $category['category_id']){ ?>
                                <option selected value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                            <?php } ?>
                              
                        <?php } ?>   
                    <?php } ?>
                </select>
            </div>
            <div class="col-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><?= $storeCurrency; ?></span>
                    <input 
                        type="number" 
                        placeholder="<?= $textDrinkHousePrice; ?>" 
                        class="form-control" 
                        step="0.01"
                        id="inputUpdateDrinkHousePrice" 
                        name="inputUpdateDrinkHousePrice" 
                        aria-describedby="basic-addon1" 
                        value="<?= $drinkToEdit[0]['drink_home_price']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><?= $storeCurrency; ?></span>
                    <input 
                        type="number" 
                        placeholder="<?= $textDrinkClientPrice; ?>" 
                        class="form-control" 
                        step="0.01"
                        id="inputUpdateDrinkClientPrice" 
                        name="inputUpdateDrinkClientPrice" 
                        aria-describedby="basic-addon2" 
                        value="<?= $drinkToEdit[0]['drink_price']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit"><?= $textActionUpdate; ?></button>
            </div>
        </form>
    </div>
</div>