<h2 class="card-title"> <?php echo $textActiveTables; ?> </h2>
<div id="activeTables">
<?php foreach($tablesList as $table){
        if($table['active'] === 1){?>
            <div class="resto-table">   
                <div class="row">
                    <?php echo $textTableId.$table['id'];?>
                    <br>
                </div>
                <div class="row">
                    <?php echo $textCapacity.$table['capacity'];?>
                    <br>
                </div>
                <div class="row">
                    <span href="#"><?php echo $textOrderModal;?></span>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<hr>
<h2 class="card-title"> <?php echo $textFreeTables; ?> </h2>
<div id="tablesList">
    <?php foreach($tablesList as $table){
        if($table['active'] === 0){?>
        <div class="resto-table">   
            <div class="row">
                <?php echo $textTableId.$table['id'];?>
                <br>
            </div>
            <div class="row">
                <?php echo $textCapacity.$table['capacity'];?>
                <br>
            </div>
            <div class="row">
                <div class="form-check form-switch">
                    <label class="form-check-label"><?php echo $textIsActive;?></label>
                    <input class="form-check-input" type="checkbox" id="<?php echo $table['id'];?>">
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } ?>
</div>


<hr>

<div id="newTable">
    <div class="row mb-3 mt-3">
        <div class="col-12">
            <div class="col-10">
                <label for="inputNewTable"><?php echo $textNewTable; ?></label>
                <div class="col-3">
                    <div class="input-group">
                        <input 
                            class="form-control" 
                            type="number" 
                            id="inputNewTable" 
                            name="inputNewTable"
                            placeholder="<?php echo $textTableCapacity; ?>" 
                        >     
                    </div>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary"><?php echo $textAddTable; ?></button>
            </div>
        </div>
        
    </div>
</div>

<script>
    //Add table
    $("#newTable .btn-primary").click(function() {
        let newTableCapacity = $('#inputNewTable').val();
        $.ajax({
            type: "POST",
            url: "tables",
            data: {
                action: "newTable",
                newTableCapacity: newTableCapacity
            },
            success: function(response) {
                setTimeout(window.location.reload(),1000);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Request Error:", status, error);
            }
        });
    });

    //Make table active
    $("#tablesList .form-check-input").click(function() {
        $.ajax({
            type: "POST",
            url: "tables",
            data: {
                action: "updateTable",
                tableId: $(this).attr('id')
            },
            success: function(response) {
                console.log(response);
                // setTimeout(window.location.reload(),1000);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Request Error:", status, error);
            }
        });
    });

    
</script>