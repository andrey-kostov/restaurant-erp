<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?php echo $textDishesIngredientsAddCategory; ?> </h2>
        <form id="dishesIngredientsForm" action="dishesIngredients" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-5">
                <div class="input-group">
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="<?php echo $textIngredientName;?>" 
                        id="inputDishesIngredientsName" 
                        name="inputDishesIngredientsName" required>

                </div>
            </div>
            <div class="col-3">
                <select required class="form-select" id="dishesIngredientsCategory" name="dishesIngredientsCategory">
                    <?php if(isset($ingredientsCategories)){ ?>
                        <?php foreach ($ingredientsCategories as $category){ ?>   
                            <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
                        <?php } ?>   
                    <?php } ?>
                </select>
            </div>
            <div class="col-2">
                <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><?php echo $storeCurrency; ?></span>
                <input 
                    type="number"
                    step="0.01" 
                    aria-describedby="basic-addon1"
                    class="form-control" 
                    placeholder="<?php echo $textIngredientPrice; ?>" 
                    id="inputDishesIngredientsPricePerKilo" 
                    name="inputDishesIngredientsPricePerKilo" required>

                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary"><?php echo $textActionSubmit; ?></button>
            </div>
        </form>
    </div>
</div>