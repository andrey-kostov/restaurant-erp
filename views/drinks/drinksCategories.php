
<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?php echo $textDrinksCategoriesAddCategory; ?> </h2>
        <form id="drinksCategoriesForm" action="drinksCategories" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-6">
                <label for="inputCategoryName" class="form-label"><?php echo $textDrinksCategoriesName; ?></label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputCategoryName" name="inputCategoryName" required>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit"><?php echo $textDrinksCategoriesSubmit; ?></button>
            </div>
        </form>
    </div>

    <hr>
        
    <div class="row">
        <h2 class="card-title"> <?php echo $textDrinksCategoriesTitle; ?> </h2>
        <div class="container-fluid">
            <div class="row">
                <table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col"><?php echo $textDrinksCategoriesNumber; ?></th>
                        <th scope="col"><?php echo $textDrinksCategoriesName; ?></th>
                        <th scope="col"><?php echo $textDrinksCategoriesId; ?></th>
                        <th scope="col"><?php echo $textDrinksCategoriesActions; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($drinksCategories as $category){ ?>   
                            <tr>
                                <th scope="row"><?php echo $category['id'] ?></th>
                                <td><?php echo $category['category_name'] ?></td>
                                <td><?php echo $category['category_id'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger"><?php echo $textDrinksCategoriesEditBtn; ?></button>
                                    <button type="button" class="btn btn-sm btn-warning"><?php echo $textDrinksCategoriesDeleteBtn; ?></button>
                                </td>
                            </tr>
                        <?php } ?>   
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
