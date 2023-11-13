<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?php echo $textDrinksCategoriesAddCategory; ?> </h2>
        <form id="drinksCategoriesForm" action="drinksCategories" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-10">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="<?php echo $textCategoriesName; ?>" id="inputCategoryName" name="inputCategoryName" required>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit"><?php echo $textActionSubmit; ?></button>
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
                            <th scope="col"><?php echo $textCategoriesName; ?></th>
                            <th scope="col"><?php echo $textDrinksCategoriesId; ?></th>
                            <th scope="col"><?php echo $textDrinksCategoriesActions; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($drinksCategories as $category) { ?>
                            <tr>
                                <th scope="row"><?php echo $category['id'] ?></th>
                                <td><?php echo $category['category_name'] ?></td>
                                <td><?php echo $category['category_id'] ?></td>
                                <td>
                                    <a href="drinksCategories/edit?drinkCategoryId=<?php echo $category['category_id'] ?>" type="button" class="btn btn-sm btn-warning"><?php echo $textActionEditBtn; ?></a>
                                    <button data-drinkCategoryId="<?php echo $category['category_id'] ?>" type="button" class="btn btn-sm btn-danger"><?php echo $textActionDeleteBtn; ?></button>
                                </td>
                            </tr>
                        <?php } ?>
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
            let drinkCategoryId = $(this).attr('data-drinkCategoryId');
            $('#inputCategoryName').val('');
            $.ajax({
                type: "POST",
                url: "drinksCategories",
                data: {
                    action: "deleteDrinkCategory",
                    drinkCategoryId: drinkCategoryId
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
            let drinksCategoryName = $('#inputCategoryName').val();
            $.ajax({
                type: "POST",
                url: "drinksCategories",
                data: {
                    action: "addDrinksCategory",
                    drinksCategoryName: drinksCategoryName
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