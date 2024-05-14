<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?= $textDishesIngredientsEdit; ?> </h2>
        <form id="ingredientUpdateForm" action="<?= $root;?>dishesIngredients" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-1 d-none">
                <div class="input-group">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="inputUpdateIngredeintId" 
                        name="inputUpdateIngredeintId" 
                        value="<?= $ingredientToEdit[0]['ingredient_id']?>"
                        required>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="inputUpdateIngredientName" 
                        name="inputUpdateIngredientName" 
                        value="<?= $ingredientToEdit[0]['ingredient_name']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <select class="form-select" name="inputUpdateIngredientCategory">
                    <?php if(isset($ingredientsCategories)){ ?>
                        <?php foreach ($ingredientsCategories as $category){ 
                            if($ingredientToEdit[0]['ingredient_category'] == $category['category_id']){ ?>
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
                    <span class="input-group-text" id="basic-addon2"><?= $storeCurrency; ?></span>
                    <input 
                        type="number" 
                        class="form-control" 
                        step="0.01"
                        id="inputUpdateIngredientPrice" 
                        name="inputUpdateIngredientPrice" 
                        aria-describedby="basic-addon2" 
                        value="<?= $ingredientToEdit[0]['ingredient_price']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit"><?= $textActionUpdate; ?></button>
            </div>
        </form>
    </div>
</div>
