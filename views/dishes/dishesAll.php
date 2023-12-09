<div class="row">
<h2 class="card-title"> <?php echo $textDishList; ?> </h2>
    <table class="table col-12 mb-3" id="ingredientsWrapper">
        <thead>
            <tr>
                <th scope="col"><?php echo $textDishName; ?></th>
                <th scope="col"><?php echo $textDishCategory; ?></th>
                <th scope="col"><?php echo $textDishRecepie; ?></th>
                <th scope="col"><?php echo $textDishIngredients; ?></th>
                <th scope="col"><?php echo $textDishPrice; ?></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allDishes as $dish){?>
                <tr>
                    <td><?php echo $dish['dish_name']; ?></td>
                    <td><?php echo $dish['dish_category']; ?></td>
                    <td class="col-5"><?php echo $dish['dish_recepie'];?></td>
                    <td>
                        <ol>
                            <?php foreach ($dish['dish_ingredients'] as $ingredient){?>
                                <li>
                                    <?php echo $ingredient['ingredientName'],' : ',$ingredient['ingredientQtyGrams'],' grams'; ?>
                                </li>
                            <?php } ?>
                        </ol>
                    </td>
                    <td><?php echo $dish['dish_price']; ?></td>
                    <td>
                        <!-- <a href="dishesCategories/edit?dishesCategoryId=<?php echo $dish['dish_id'] ?>" type="button" class="btn btn-sm btn-warning"><?php echo $textActionEditBtn; ?></a> -->
                        <button data-dishId="<?php echo $dish['dish_id'] ?>" type="button" class="btn btn-sm btn-danger"><?php echo $textActionDeleteBtn; ?></button>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        //Delete category
        $(".btn-sm.btn-danger").click(function() {
            let dishId = $(this).attr('data-dishId');
            $.ajax({
                type: "POST",
                url: "dishesAll",
                data: {
                    action: "deleteDish",
                    dishId: dishId
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





