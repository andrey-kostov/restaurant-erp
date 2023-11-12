<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?php echo $textDishesIngredientsAddCategory; ?> </h2>
        <form id="dishesIngredientsCategoriesForm" action="dishesIngredientsCategories" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-10">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="<?php echo $textDishesCategoriesName; ?>" id="inputDishesIngredientsCategoryName" name="inputDishesIngredientsCategoryName" required>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary"><?php echo $textActionSubmit; ?></button>
            </div>
        </form>
    </div>

    <hr>

    <div class="row">
        <h2 class="card-title"> <?php echo $textDishesIngredientsCategoriesTitle; ?> </h2>
        <div class="container-fluid">
            <div class="row">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col"><?php echo $textDishesCategoriesNumber; ?></th>
                            <th scope="col"><?php echo $textDishesCategoriesName; ?></th>
                            <th scope="col"><?php echo $textDishesCategoriesId; ?></th>
                            <th scope="col"><?php echo $textDishesCategoriesActions; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($dishesIngredientsCategories)){foreach ($dishesIngredientsCategories as $category) { ?>
                            <tr>
                                <th scope="row"><?php echo $category['id'] ?></th>
                                <td><?php echo $category['category_name'] ?></td>
                                <td><?php echo $category['category_id'] ?></td>
                                <td>
                                    <a href="dishesIngredientsCategories/edit?dishesIngredientsCategoryId=<?php echo $category['category_id'] ?>" type="button" class="btn btn-sm btn-warning"><?php echo $textActionEditBtn; ?></a>
                                    <button data-dishesIngredientsCategoryId="<?php echo $category['category_id'] ?>" type="button" class="btn btn-sm btn-danger"><?php echo $textActionDeleteBtn; ?></button>
                                </td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //Delete category
        $(".btn-sm.btn-danger").click(function() {
            let dishesIngredientsCategoryId = $(this).attr('data-dishesIngredientsCategoryId');
            $.ajax({
                type: "POST",
                url: "dishesIngredientsCategories",
                data: {
                    action: "deleteDishesIngredientsCategory",
                    dishesIngredientsCategoryId: dishesIngredientsCategoryId
                },
                success: function() {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Request Error:", status, error);
                }
            });
        });
        
        //Add category
        $("form .btn-primary").click(function() {
            let dishesIngredientsCategoryName = $('#inputDishesIngredientsCategoryName').val();
            $.ajax({
                type: "POST",
                url: "dishesIngredientsCategories",
                data: {
                    action: "addDishesIngredientsCategory",
                    dishesIngredientsCategoryName: dishesIngredientsCategoryName
                },
                success: function() {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Request Error:", status, error);
                }
            });
        });
    });
</script>