<div class="row">
<h2 class="card-title"> <?= $textDishList; ?> </h2>
    <table class="table col-12 mb-3" id="ingredientsWrapper">
        <thead>
            <tr>
                <th scope="col"><?= $textDishName; ?></th>
                <th scope="col"><?= $textDishCategory; ?></th>
                <th scope="col"><?= $textDishRecepie; ?></th>
                <th scope="col"><?= $textDishIngredients; ?></th>
                <th scope="col"><?= $textDishPrice; ?></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allDishes as $dish){?>
                <tr>
                    <td><?= $dish['dish_name']; ?></td>
                    <td><?= $dish['dish_category']; ?></td>
                    <td class="col-5"><?= $dish['dish_recepie'];?></td>
                    <td>
                        <ol>
                            <?php foreach ($dish['dish_ingredients'] as $ingredient){?>
                                <li>
                                    <?= $ingredient['ingredientName'],' : ',$ingredient['ingredientQtyGrams'],' grams'; ?>
                                </li>
                            <?php } ?>
                        </ol>
                    </td>
                    <td><?= $dish['dish_price']; ?></td>
                    <td>
                        <!-- <a href="dishesCategories/edit?dishesCategoryId=<?= $dish['dish_id'] ?>" type="button" class="btn btn-sm btn-warning"><?= $textActionEditBtn; ?></a> -->
                        <button data-dishId="<?= $dish['dish_id'] ?>" type="button" class="btn btn-sm btn-danger"><?= $textActionDeleteBtn; ?></button>
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





