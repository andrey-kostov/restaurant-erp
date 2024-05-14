<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?= $textDishesCategoriesAddCategory; ?> </h2>
        <form id="dishesCategoriesForm" action="dishesCategories" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-10">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="<?= $textDishesCategoriesName; ?>" id="inputDishesCategoryName" name="inputDishesCategoryName" required>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary"><?= $textActionSubmit; ?></button>
            </div>
        </form>
    </div>

    <hr>

    <div class="row">
        <h2 class="card-title"> <?= $textDishesCategoriesTitle; ?> </h2>
        <div class="container-fluid">
            <div class="row">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col"><?= $textDishesCategoriesNumber; ?></th>
                            <th scope="col"><?= $textDishesCategoriesName; ?></th>
                            <th scope="col"><?= $textDishesCategoriesId; ?></th>
                            <th scope="col"><?= $textDishesCategoriesActions; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($dishesCategories)){foreach ($dishesCategories as $category) { ?>
                            <tr>
                                <th scope="row"><?= $category['id'] ?></th>
                                <td><?= $category['category_name'] ?></td>
                                <td><?= $category['category_id'] ?></td>
                                <td>
                                    <a href="dishesCategories/edit?dishesCategoryId=<?= $category['category_id'] ?>" type="button" class="btn btn-sm btn-warning"><?= $textActionEditBtn; ?></a>
                                    <button data-dishesCategoryId="<?= $category['category_id'] ?>" type="button" class="btn btn-sm btn-danger"><?= $textActionDeleteBtn; ?></button>
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
            let dishesCategoryId = $(this).attr('data-dishesCategoryId');
            $.ajax({
                type: "POST",
                url: "dishesCategories",
                data: {
                    action: "deleteDishesCategory",
                    dishesCategoryId: dishesCategoryId
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
            let dishesCategoryName = $('#inputDishesCategoryName').val();
            console.log(dishesCategoryName);
            $.ajax({
                type: "POST",
                url: "dishesCategories",
                data: {
                    action: "addDishesCategory",
                    dishesCategoryName: dishesCategoryName
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