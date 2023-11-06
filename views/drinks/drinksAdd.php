<div class="container-fluid">
    <div class="row">
        <h2 class="card-title"> <?php echo $textAddDrinkTitle; ?> </h2>
        <form id="drinkAddForm" action="drinksAdd" method="post" enctype="multipart/form-data" class="row g-1">
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
</div>