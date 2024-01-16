<div id="newTable">
    <div class="row mb-3 mt-3">
        <hr>
        <div class="col-10">
            <div class="col-3">
                <label for="inputNewTable"><?php echo $textNewTable; ?></label>
            </div>
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