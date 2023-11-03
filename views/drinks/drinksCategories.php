
<div class="container-fluid">
    <div class="row">
        <h2> <?php echo $textDrinksCategoriesAddCategory; ?> </h2>
        <form action="drinksCategoriesController.php" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="col-6">
                <label for="inputCategoryName" class="form-label">Category name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputCategoryName" required>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
    </div>
        
    <div class="row">
        <h2> <?php echo $textDrinksCategoriesTitle; ?> </h2>
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($drinksCategories as $category){ ?>   
                    <div class="category-row">
                        <p><?php echo $drinksCategories['category_name'] ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
    

<script>
    $(document).ready(function(){
        console.log(123);
    });
</script>