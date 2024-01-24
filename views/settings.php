<div class="container-fluid">
        <div class="row mb-3">
            <h2 class="card-title"> <?php echo $textSettings; ?> </h2>
            <form id="settingsForm" action="settingsCategories" method="post" enctype="multipart/form-data" class="row mb-3 g-1">
                <!-- Number of tables start -->
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="inputTablesCount"><?php echo $textTablesCount; ?></label>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <input 
                                type="number" 
                                class="form-control setting" 
                                <?php 
                                foreach ($allSettings as $setting => $value){
                                    if($setting == 'inputTablesCount'){?>
                                        placeholder="<?php echo $value['setting_value']; ?>" 
                                        value="<?php echo $value['setting_value']; ?>"
                                    <?php } else{ ?> 
                                        placeholder="<?php echo $textTablesCount; ?>" 
                                    <?php }} ?>
                               
                                id="inputTablesCount" 
                                name="inputTablesCount" 
                                required>
                        </div>
                    </div>
                </div>
                <!-- Number of tables end -->
                <hr>                            
                <!-- Product status start -->

                 <div class="row mb-3">
                    <?php foreach($allStatuses as $status){ ?>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="inputCmsName"><?php echo $textStatusStage.' '.$status['id']; ?></label>
                            </div>
                            <div class="col-6">
                            <div class="input-group">
                                <input 
                                    type="text" 
                                    class="form-control status" 
                                    value="<?php echo $status['name']; ?>"
                                    id="product_status_<?php echo $status['id']; ?>" 
                                    data-status-id="<?php echo $status['id']; ?>" 
                                    required>
                            </div>
                        </div>
                        </div>
                    <?php } ?> 
                 </div>

                <!-- Product status end -->
                <hr>
                <!-- CMS Name start -->
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="inputCmsName"><?php echo $textCmsName; ?></label>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <input 
                                type="text" 
                                class="form-control setting" 
                                <?php 
                                foreach ($allSettings as $setting => $value){
                                    if($setting == 'inputCmsName'){?>
                                        placeholder="<?php echo $value['setting_value']; ?>" 
                                        value="<?php echo $value['setting_value']; ?>"
                                    <?php } else{ ?> 
                                        placeholder="<?php echo $textCmsName; ?>" 
                                    <?php }} ?>
                               
                                id="inputCmsName" 
                                name="inputCmsName" 
                                required>
                        </div>
                    </div>
                </div>
                <!-- CMS Name end -->
                <!-- CMS Logo start -->
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="inputCmsLogo"><?php echo $textCmsLogo; ?></label>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <input 
                                class="form-control setting" 
                                type="file" 
                                id="inputCmsLogo" 
                                name="inputCmsLogo"
                                <?php 
                                    foreach ($allSettings as $setting => $value){
                                        if($setting == 'inputCmsLogo'){?>
                                            placeholder="<?php echo $value['setting_value']; ?>" 
                                            value="<?php echo $value['setting_value']; ?>"
                                        <?php } else{ ?> 
                                            placeholder="<?php echo $textCmsLogo; ?>" 
                                        <?php }} ?> 
                            >     
                        </div>
                    </div>
                </div>
                <!-- CMS Logo end -->
                <hr>
                <!-- CMS Colors start -->
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="inputCmsPrimaryColor"><?php echo $textCmsPrimaryColor; ?></label>
                    </div>
                    <div class="col-1">
                        <div class="input-group">
                            <input 
                                class="form-control setting" 
                                type="color" 
                                id="inputCmsPrimaryColor" 
                                name="inputCmsPrimaryColor"
                                <?php 
                                    foreach ($allSettings as $setting => $value){
                                        if($setting == 'inputCmsPrimaryColor'){?>
                                            placeholder="<?php echo $value['setting_value']; ?>" 
                                            value="<?php echo $value['setting_value']; ?>"
                                        <?php } else{ ?> 
                                            placeholder="<?php echo $textCmsPrimaryColor; ?>" 
                                        <?php }} ?> 
                            >     
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="inputCmsSecondaryColor"><?php echo $textCmsSecondaryColor; ?></label>
                    </div>
                    <div class="col-1">
                        <div class="input-group">
                            <input 
                                class="form-control setting" 
                                type="color" 
                                id="inputCmsSecondaryColor" 
                                name="inputCmsSecondaryColor"
                                <?php 
                                    foreach ($allSettings as $setting => $value){
                                        if($setting == 'inputCmsSecondaryColor'){?>
                                            placeholder="<?php echo $value['setting_value']; ?>" 
                                            value="<?php echo $value['setting_value']; ?>"
                                        <?php } else{ ?> 
                                            placeholder="<?php echo $textCmsSecondaryColor; ?>" 
                                        <?php }} ?> 
                            >     
                        </div>
                    </div>
                </div>
                <!-- CMS Colors end -->
                <hr>
                <div class="row mb-3">
                    <div class="col-2">
                        <button class="btn btn-primary"><?php echo $textSaveSettings; ?></button>
                    </div>
                </div>
            </form>
        </div>
</div>

<script>
    //Update settings
    $("form .btn-primary").click(function(event) {
           
        event.preventDefault();
           
        var settingsArray = {};
        $.each($('.form-control.setting'),function(){
            var thisName = $(this).attr('name');
            var thisVal = $(this).val();
            settingsArray[thisName] = thisVal;
        });
         
        var statusArray = {};
        $.each($('.form-control.status'),function(){
            var thisName = $(this).attr('data-status-id');
            var thisVal = $(this).val();
            statusArray[thisName] = thisVal;
        });

        $.ajax({
            type: "POST",
            url: "settings",
            data: {
                action: "updateSettings",
                statusArray: JSON.stringify(statusArray),
                settingsArray: JSON.stringify(settingsArray)
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