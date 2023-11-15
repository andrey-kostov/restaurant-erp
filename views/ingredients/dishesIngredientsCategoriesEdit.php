<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?php echo $textDishesCategoriesUpdateCategory; ?> </h2>
        <form id="dishesCategoriesUpdateForm" action="<?php echo $root;?>dishesIngredientsCategories" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-10">
                <div class="col-1 d-none">
                    <div class="input-group">
                        <input 
                            type="text" 
                            placeholder="<?php echo $textDrinkId; ?>" 
                            class="form-control" 
                            id="inputUpdateCategoryId" 
                            name="inputUpdateCategoryId" 
                            value="<?php echo $categoryToEdit[0]['category_id']?>"
                            required>
                    </div>
                </div>
                <div class="input-group">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="inputCategoryUpdateName" 
                        name="inputCategoryUpdateName" 
                        value="<?php echo $categoryToEdit[0]['category_name']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit"><?php echo $textActionUpdate; ?></button>
            </div>
        </form>
    </div>
</div>