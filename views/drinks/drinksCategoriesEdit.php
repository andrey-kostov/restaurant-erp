<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?= $textDrinksCategoriesUpdateCategory; ?> </h2>
        <form id="drinksCategoriesUpdateForm" action="<?= $root;?>drinksCategories" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-10">
                <div class="col-1 d-none">
                    <div class="input-group">
                        <input 
                            type="text" 
                            placeholder="<?= $textDrinkId; ?>" 
                            class="form-control" 
                            id="inputUpdateCategoryId" 
                            name="inputUpdateCategoryId" 
                            value="<?= $categoryToEdit[0]['category_id']?>"
                            required>
                    </div>
                </div>
                <div class="input-group">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="inputCategoryUpdateName" 
                        name="inputCategoryUpdateName" 
                        value="<?= $categoryToEdit[0]['category_name']?>"
                        required>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit"><?= $textActionUpdate; ?></button>
            </div>
        </form>
    </div>
</div>