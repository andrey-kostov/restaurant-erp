<div class="row">
    <div class="container-fluid">
        <div class="row">
            <h2 class="card-title"> <?= $textAddDrinkTitle; ?> </h2>
            <form id="drinkAddForm" action="drinksList" method="post" enctype="multipart/form-data" class="row g-1">
                <div class="col-4">
                    <div class="input-group">
                        <input 
                            type="text" 
                            placeholder="<?= $textDrinkName; ?>" 
                            class="form-control" 
                            id="inputDrinkName" 
                            name="inputDrinkName" required>
                    </div>
                </div>
                <div class="col-2">
                    <select class="form-select" id="inputDrinkCategory" name="inputDrinkCategory">
                        <option><?= $textCategoriesName; ?></option>
                        <?php if(isset($drinksCategories)){ ?>
                            <?php foreach ($drinksCategories as $category){ ?>   
                                <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                            <?php } ?>   
                        <?php } ?>
                    </select>
                </div>
                <div class="col-2">
                    <div class="input-group">
                         <span class="input-group-text" id="basic-addon1"><?= $storeCurrency; ?></span>
                        <input 
                            type="number"
                            step="0.01" 
                            placeholder="<?= $textDrinkHousePrice; ?>" 
                            class="form-control" id="inputDrinkHousePrice" 
                            name="inputDrinkHousePrice" 
                            aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group">
                         <span class="input-group-text" id="basic-addon2"><?= $storeCurrency; ?></span>
                        <input 
                            type="number"
                            step="0.01" 
                            placeholder="<?= $textDrinkClientPrice; ?>" 
                            class="form-control" id="inputDrinkClientPrice" 
                            name="inputDrinkClientPrice" 
                            aria-describedby="basic-addon2" required>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary"><?= $textActionSubmit; ?></button>
                </div>
            </form>
        </div>
        <hr>
        <div class="row">
            <h2 class="card-title"> <?= $textDrinkTitle; ?> </h2>
                <table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col-1"><?= $textDrinkId; ?></th>
                        <th scope="col-4"><?= $textDrinkName; ?></th>
                        <th scope="col-2"><?= $textCategoriesName; ?></th>
                        <th scope="col-1"><?= $textDrinkHousePrice; ?></th>
                        <th scope="col-1"><?= $textDrinkClientPrice; ?></th>
                        <th scope="col-2"><?= $textDrinksCategoriesActions; ?></th>
                        </tr>
                    </thead>
                    <?php if(isset($allDrinks)){ ?>
                        <tbody>
                            <?php foreach ($allDrinks as $drink){ ?>   
                                <tr>
                                    <th scope="row"><?= $drink['id'] ?></th>
                                    <td><?= $drink['drink_name'] ?></td>
                                    <td><?= $drink['drink_category'] ?></td>
                                    <td><strong><?= $drink['drink_home_price'].' </strong><small>'.$storeCurrency ?></small></td>
                                    <td><strong><?= $drink['drink_price'].' </strong><small>'.$storeCurrency ?></small></td>
                                    <td>
                                        <a href="drinksList/edit?drinkId=<?= $drink['id'] ?>" type="button" class="btn btn-sm btn-warning"><?= $textActionEditBtn; ?></a>
                                        <button data-drinkId="<?= $drink['id'] ?>" type="button" class="btn btn-sm btn-danger"><?= $textActionDeleteBtn; ?></button>
                                    </td>
                                </tr>
                                <?php } ?>   
                            </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        //Delete drink
        $(".btn-sm.btn-danger").click(function() {
            let drinkId = $(this).attr('data-drinkId');
            $.ajax({
                type: "POST",
                url: "drinksList",
                data: {
                    action: "deleteDrink",
                    drinkId:drinkId
                },
                success: function() {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Request Error:", status, error);
                }
            });
        });

        //Add drink
        $("#drinkAddForm .btn-primary").click(function(event) {
            event.preventDefault();
            let drinkName = $('#inputDrinkName').val();
            let drinksCategoriesName = $('#inputDrinkCategory option:selected').val();
            let drinkHousePrice = $('#inputDrinkHousePrice').val();
            let drinkClientPrice = $('#inputDrinkClientPrice').val();
            $.ajax({
                type: "POST",
                url: "drinksList",
                data: {
                    action: "addNewDrink",
                    drinkName:drinkName,
                    drinksCategoriesName:drinksCategoriesName,
                    drinkHousePrice:drinkHousePrice,
                    drinkClientPrice:drinkClientPrice
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