<div class="row">
    <div class="container-fluid">
        <div class="row">
            <h2 class="card-title"> <?php echo $textAddDrinkTitle; ?> </h2>
            <form id="drinkAddForm" action="drinksList" method="post" enctype="multipart/form-data" class="row g-1">
                <div class="col-4">
                    <div class="input-group">
                        <input type="text" placeholder="<?php echo $textDrinkName; ?>" class="form-control" id="inputDrinkName" name="inputDrinkName" required>
                    </div>
                </div>
                <div class="col-2">
                    <select class="form-select" name="inputDrinkCategory">
                        <option selected><?php echo $textDrinksCategoriesName; ?></option>
                        <?php if(isset($drinksCategories)){ ?>
                            <?php foreach ($drinksCategories as $category){ ?>   
                                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
                            <?php } ?>   
                        <?php } ?>
                    </select>
                </div>
                <div class="col-2">
                    <div class="input-group">
                         <span class="input-group-text" id="basic-addon1"><?php echo $storeCurrency; ?></span>
                        <input type="text" placeholder="<?php echo $textDrinkHousePrice; ?>" class="form-control" id="inputDrinkHousePrice" name="inputDrinkHousePrice" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group">
                         <span class="input-group-text" id="basic-addon2"><?php echo $storeCurrency; ?></span>
                        <input type="text" placeholder="<?php echo $textDrinkClientPrice; ?>" class="form-control" id="inputDrinkClientPrice" name="inputDrinkClientPrice" aria-describedby="basic-addon2" required>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" type="submit"><?php echo $textDrinksCategoriesSubmit; ?></button>
                </div>
            </form>
        </div>
        <hr>
        <div class="row">
            <h2 class="card-title"> <?php echo $textDrinkTitle; ?> </h2>
                <table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col-1"><?php echo $textDrinkId; ?></th>
                        <th scope="col-4"><?php echo $textDrinkName; ?></th>
                        <th scope="col-2"><?php echo $textDrinkCategory; ?></th>
                        <th scope="col-1"><?php echo $textDrinkHousePrice; ?></th>
                        <th scope="col-1"><?php echo $textDrinkClientPrice; ?></th>
                        <th scope="col-2"><?php echo $textDrinksCategoriesActions; ?></th>
                        </tr>
                    </thead>
                    <?php if(isset($allDrinks)){ ?>
                        <tbody>
                            <?php foreach ($allDrinks as $drink){ ?>   
                                <tr>
                                    <th scope="row"><?php echo $drink['id'] ?></th>
                                    <td><?php echo $drink['drink_name'] ?></td>
                                    <td><?php echo $drink['drink_category'] ?></td>
                                    <td><?php echo $drink['drink_home_price'].' '.$storeCurrency ?></td>
                                    <td><?php echo $drink['drink_price'].' '.$storeCurrency ?></td>
                                    <td>
                                        <a href="drinksList/edit?drinkId=<?php echo $drink['id'] ?>" type="button" class="btn btn-sm btn-warning"><?php echo $textDrinksCategoriesEditBtn; ?></a>
                                        <button data-drinkId="<?php echo $drink['id'] ?>" type="button" class="btn btn-sm btn-danger"><?php echo $textDrinksCategoriesDeleteBtn; ?></button>
                                    </td>
                                </tr>
                                <?php } ?>   
                            </tbody>
                    <?php } ?>
                </table>
                <script>
                    $(document).ready(function() {
                        $(".btn-sm.btn-danger").click(function() {
                            let drinkId = $(this).attr('data-drinkId');
                            console.log(drinkId);   
                            $.ajax({
                                type: "POST",
                                url: "drinksList", // Replace with the correct path to your PHP controller
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
                    });
                </script>
            </div>
        </div>
    </div>
</div>