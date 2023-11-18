<div class="container-fluid">
    <div class="row">
        <h2><?php echo $textAddDishes; ?></h2>
        <form action="dishesList" id="addDishesForm" method="post" enctype="multipart/form-data" class="row g-1">
            <div class="row mb-3">
                <div class="col-8">
                    <div class="input-group">
                        <label for="inputDishName" class=" col-12 form-label"><?php echo $textDishName; ?></label>
                        <input 
                            type="text" 
                            placeholder="<?php echo $textDishName; ?>" 
                            class="form-control col-12" 
                            id="inputDishName" 
                            name="inputDishName" required>
                    </div>
                </div>
                <div class="col-4">
                    <label for="inputDishName" class=" col-12 form-label"><?php echo $textDishCategory; ?></label>
                    <select required class="form-select" id="dishCategory" name="dishCategory">
                        <?php if(isset($dishesCategories)){ ?>
                            <?php foreach ($dishesCategories as $category){ ?>   
                                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
                            <?php } ?>   
                        <?php } ?>
                    </select>
                </div>
                
            </div>

            <hr>

            <div class="row mb-3">
                <h3><?php echo $textDishRecepie ?></h3>
                <div class="col-12">
                    <div class="input-group">
                        <textarea 
                            class="form-control" 
                            id="inputDishRecepie" 
                            name="inputDishRecepie" required>
                        </textarea>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <h3><?php echo $textDishIngredients; ?></h3>
                <input id="ingredientSuggest" class="form-control col-12 mb-3" placeholder="<?php echo $textDishIngredientsFind; ?>">
                <table id="ingredientSuggestions" class="table col-12 mb-3">
                    <thead></thead>
                    <tbody></tbody>
                </table>
                <table class="table col-12 mb-3" id="ingredientsWrapper">
                <thead>
                    <tr>
                    <th scope="col"><?php echo $textIngredientName; ?></th>
                    <th scope="col"><?php echo $textDishesIngredientId; ?></th>
                    <th scope="col"><?php echo $textIngredientPrice; ?></th>
                    <th scope="col"><?php echo $textDishQuantity; ?></th>
                    <th scope="col"><?php echo $textDishPrice; ?></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody></tbody>
                </table>

            </div>

            <hr>

            <div class="row mb-3">
                <h3><?php echo $textDishPrice; ?></h3>
                <div class="col-2">
                    <label class=" col-12 form-label"><?php echo $textDishPriceSuggested; ?></label>
                    <span class="col-12" id="suggestedPrice">
                        <span id="suggestedPriceValue"></span>
                        <span id="suggestedPriceCurrency"><?php echo $storeCurrency; ?></span>
                    </span>
                </div>
                <div class="col-2">
                    <div class="col-12 input-group">
                        <label for="inputDishPrice" class=" col-12 form-label"><?php echo $textDishPriceEnd; ?></label>
                        <span class="input-group-text" id="basic-addon1"><?php echo $storeCurrency; ?></span>
                        <input 
                            type="number"
                            step="0.01" 
                            aria-describedby="basic-addon1"
                            class="form-control" 
                            placeholder="<?php echo $textDishPrice; ?>" 
                            id="inputDishPrice" 
                            name="inputDishPrice" required>

                    </div>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-2">
                    <button class="btn btn-primary"><?php echo $textActionSubmit; ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).on('change keyup paste','#ingredientSuggest',function(){
        var searchedVal = $(this).val();
        let suggestsHeader = '<tr>';
            suggestsHeader += '<th scope="col"><?php echo $textIngredientName; ?></th>';
            suggestsHeader += '<th scope="col"><?php echo $textDishesIngredientId; ?></th>';
            suggestsHeader += '<th scope="col"><?php echo $textIngredientPrice; ?></th>';
            suggestsHeader += '<th scope="col"></th>';
            suggestsHeader += '</tr>';
        
            $.ajax({
                type: "POST",
                url: "dishesList/ajaxSearchIngredients",
                data: {
                    action: "searchIngredients",
                    searchedVal: searchedVal
                },
                dataType:'text',
                success: function(response) {
                    

                    $('#ingredientSuggestions thead').html('');
                    $('#ingredientSuggestions tbody').html('');
                    $('#ingredientSuggestions thead').append(suggestsHeader);

                    var searchResults = JSON.parse(response);

                    $.each(searchResults,function(key,value){
                        $.each(value,function(){
                            let ingName = this.ingredient_name;
                            let ingId = this.ingredient_id;
                            let ingPrice = this.ingredient_price;
                            
                            let suggestsRow = '<tr>';
                                suggestsRow += '<td>'+ingName+'</td>';
                                suggestsRow += '<td>'+ingId+'</td>';
                                suggestsRow += '<td><strong>'+ingPrice+'</strong> <small><?php echo $storeCurrency; ?></small></td>';
                                suggestsRow += '<td><button ingName ="'+ingName+'" ingId = "'+ingId+'" ingPrice = "'+ingPrice+'" class="addIngredient btn btn-secondary"><?php echo $textAddIngredients; ?></button></td>';
                                suggestsRow += '</tr>';

                            $('#ingredientSuggestions tbody').append(suggestsRow);
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Request Error:", status, error);
                }
            });
    });

    $(document).on('click','.addIngredient',function(event){
        event.preventDefault();
        let ingredientName = $(this).attr('ingName'),
            ingredientId = $(this).attr('ingId'),
            ingredientPrice = $(this).attr('ingPrice');

        let ingredientRow = '<tr id="ingredient'+ingredientId+'">';
            ingredientRow += '<td>'+ingredientName+'</td>';
            ingredientRow += '<td>'+ingredientId+'</td>';
            ingredientRow += '<td><strong>'+ingredientPrice+'</strong> <small><?php echo $storeCurrency; ?></small></td>';
            ingredientRow += '<td><input type="number" step="5" class="form-control" placeholder="<?php echo $textDishQuantity; ?>" required></td>';
            ingredientRow += '<td><strong>0</strong> <small><?php echo $storeCurrency; ?></small></td>';
            ingredientRow += '<td><button class="btn btn-danger removeIngredient"><?php echo $textActionDeleteBtn; ?></button></td>';
            ingredientRow += '/<tr>';
        
        if($('#ingredient'+ingredientId).length > 0){
            alert('<?php echo $alertIngredientExists; ?>');
        }else{
            $('#ingredientsWrapper tbody').append(ingredientRow);
        }

    });
</script>