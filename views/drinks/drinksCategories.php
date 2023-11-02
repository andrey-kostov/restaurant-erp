
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

<script>
    $(document).ready(function(){
        console.log(123);
    });
</script>

<hr>

<h2> <?php echo $textDrinksCategoriesTitle; ?> </h2>