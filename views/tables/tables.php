<h2 class="card-title"> <?=$textActiveTables; ?> </h2>
<div id="activeTables">
<?php foreach($tablesList as $table){
        if($table['active'] === 1){?>
            <div class="resto-table">   
                <div class="row">
                    <?= $textTableId.$table['id'];?>
                    <br>
                </div>
                <div class="row">
                    <?= $textCapacity.$table['capacity'];?>
                    <br>
                </div>
                <div class="row">
                    <span class="table-modal" id="tableModal-<?= $table['id'];?>" href="#"><?= $textOrderModal;?></span>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<hr>
<h2 class="card-title"> <?= $textFreeTables; ?> </h2>
<div id="tablesList">
    <?php foreach($tablesList as $table){
        if($table['active'] === 0){?>
        <div class="resto-table">   
            <div class="row">
                <?= $textTableId.$table['id'];?>
                <br>
            </div>
            <div class="row">
                <?= $textCapacity.$table['capacity'];?>
                <br>
            </div>
            <div class="row">
                <div class="form-check form-switch">
                    <label class="form-check-label"><?= $textIsActive;?></label>
                    <input class="form-check-input" type="checkbox" id="<?= $table['id'];?>">
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
                <label for="inputNewTable"><?= $textNewTable; ?></label>
                <div class="col-3">
                    <div class="input-group">
                        <input 
                            class="form-control" 
                            type="number" 
                            id="inputNewTable" 
                            name="inputNewTable"
                            placeholder="<?= $textTableCapacity; ?>" 
                        >     
                    </div>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary"><?= $textAddTable; ?></button>
            </div>
        </div>
        
    </div>
</div>

<div id="modalWrapper"></div>

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
                action: "openTable",
                tableId: $(this).attr('id')
            },
            success: function(response) {
                setTimeout(window.location.reload(),1000);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Request Error:", status, error);
            }
        });
    });

    //Open table modal
    $(".table-modal").click(function() {
        $tableIdText = $(this).attr('id').split('-');
        $tableId = $tableIdText[1];
        
        $.ajax({
            type: "POST",
            url: "tables/ajaxTableModal",
            data: {
                tableId: $tableId
            },
            success: function(response) {
                $('#modalWrapper').addClass('active');
                $('#modalWrapper').append(response);

            },
            error: function(xhr, status, error) {
                console.error("AJAX Request Error:", status, error);
            }
        });
    });

    //Close Table Modal
    $(document).on('click','#closeModal',function(){
        $('#modalWrapper').removeClass('active');
        $('#modalWrapper>*').detach();
    });

    //Close Table Modal
    $(document).on('click','#closeTable',function(){
        $.ajax({
            type: "POST",
            url: "tables",
            data: {
                action: "closeTable",
                tableId: $(this).attr('data-id')
            },
            success: function(response) {
                setTimeout(window.location.reload(),1000);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Request Error:", status, error);
            }
        });
    });
    
    
</script>