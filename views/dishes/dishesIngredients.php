<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?php echo $textDishesIngredientsAdd; ?> </h2>
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

<hr>

<div class="row">
    <h2 class="card-title"> <?php echo $textIngredients; ?> </h2>
        <table class="table table-sm">
            <thead>
                <tr>
                <th scope="col-1"><?php echo $textDishesIngredientId; ?></th>
                <th scope="col-4"><?php echo $textIngredientName; ?></th>
                <th scope="col-2"><?php echo $textDishesCategoriesName; ?></th>
                <th scope="col-1"><?php echo $textIngredientPrice; ?></th>
                <th scope="col-2"><?php echo $textDishesCategoriesActions; ?></th>
                </tr>
            </thead>
            <?php if(isset($allIngredients)){ ?>
                <tbody>
                    <?php foreach ($allIngredients as $ingredient){ ?>   
                        <tr>
                            <th scope="row"><?php echo $ingredient['ingredient_id'] ?></th>
                            <td><?php echo $ingredient['ingredient_name'] ?></td>
                            <td><?php echo $ingredient['ingredient_category'] ?></td>
                            <td><strong><?php echo $ingredient['ingredient_price'].' </strong><small>'.$storeCurrency ?></small></td>
                            <td>
                                <a href="dishesIngredients/edit?drinkId=<?php echo $ingredient['id'] ?>" type="button" class="btn btn-sm btn-warning"><?php echo $textActionEditBtn; ?></a>
                                <button data-ingredientId="<?php echo $ingredient['id'] ?>" type="button" class="btn btn-sm btn-danger"><?php echo $textActionDeleteBtn; ?></button>
                            </td>
                        </tr>
                        <?php } ?>   
                    </tbody>
            <?php } ?>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        //Delete dish
        $(".btn-sm.btn-danger").click(function() {
            let ingredientId = $(this).attr('data-ingredientId');
            $.ajax({
                type: "POST",
                url: "dishesIngredients",
                data: {
                    action: "deleteDishesIngredients",
                    ingredientId: ingredientId
                },
                success: function() {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Request Error:", status, error);
                }
            });
        });
        
        //Add dish
        $("form .btn-primary").click(function(event) {
           
            event.preventDefault();
            let ingredientName = $('#inputDishesIngredientsName').val();
            let ingredientCategoryName = $('#dishesIngredientsCategory option:selected').val();
            let ingredientsPricePerKilo = $('#inputDishesIngredientsPricePerKilo').val();
            $.ajax({
                type: "POST",
                url: "dishesIngredients",
                data: {
                    action: "addDishesIngredients",
                    ingredientName: ingredientName,
                    ingredientCategoryName: ingredientCategoryName,
                    ingredientsPricePerKilo: ingredientsPricePerKilo
                },
                success: function() {
                    setTimeout(window.location.reload(),1000);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Request Error:", status, error);
                }
            });
        });
    });
</script>