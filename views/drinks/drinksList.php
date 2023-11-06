<div class="row">
    <h2 class="card-title"> <?php echo $textDrinkTitle; ?> </h2>
    <div class="container-fluid">
        <div class="row">
                <table class="table table-sm">
                    <thead>
                        <tr>
                        <th scope="col"><?php echo $textDrinkId; ?></th>
                        <th scope="col"><?php echo $textDrinkName; ?></th>
                        <th scope="col"><?php echo $textDrinkCategory; ?></th>
                        <th scope="col"><?php echo $textDrinkPrice; ?></th>
                        <th scope="col"><?php echo $textDrinksCategoriesActions; ?></th>
                        </tr>
                    </thead>
                    <?php if(isset($drinks)){ ?>
                        <tbody>
                            <?php foreach ($drinksCategories as $category){ ?>   
                                <tr>
                                    <th scope="row"><?php echo $category['id'] ?></th>
                                    <td><?php echo $category['category_name'] ?></td>
                                    <td><?php echo $category['category_id'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger"><?php echo $textDrinksCategoriesEditBtn; ?></button>
                                        <button type="button" class="btn btn-sm btn-warning"><?php echo $textDrinksCategoriesRemoveBtn; ?></button>
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