<div class="container-fluid">
        <div class="row">
            <h2 class="card-title"> <?php echo $textSettings; ?> </h2>
            <form id="settingsForm" action="settingsCategories" method="post" enctype="multipart/form-data" class="row g-1">
                <!-- Number of tables start -->
                <div class="row">
                    <div class="col-3">
                        <label for="inputTablesCount"><?php echo $textTablesCount; ?></label>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="<?php echo $textTablesCount; ?>" id="inputTablesCount" name="inputTablesCount" required>
                        </div>
                    </div>
                </div>
                <!-- Number of tables end -->
            </form>
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
                <button class="btn btn-primary"><?php echo $textSaveSettings; ?></button>
            </div>
        </div>
</div>