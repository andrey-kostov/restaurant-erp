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
                            <input 
                                type="number" 
                                class="form-control" 
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
                <!-- CMS Name start -->
                <div class="row">
                    <div class="col-3">
                        <label for="inputCmsName"><?php echo $textCmsName; ?></label>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <input 
                                type="text" 
                                class="form-control" 
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
                <div class="row">
                    <div class="col-3">
                        <label for="inputCmsLogo"><?php echo $textCmsName; ?></label>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <input 
                                type="text" 
                                class="form-control" 
                                <?php 
                                foreach ($allSettings as $setting => $value){
                                    if($setting == 'inputCmsLogo'){?>
                                        placeholder="<?php echo $value['setting_value']; ?>" 
                                        value="<?php echo $value['setting_value']; ?>"
                                    <?php } else{ ?> 
                                        placeholder="<?php echo $textCmsLogo; ?>" 
                                    <?php }} ?>
                               
                                id="inputCmsName" 
                                name="inputCmsLogo" 
                                required>
                        </div>
                    </div>
                </div>
                <!-- CMS Logo end -->
                <hr>
                <div class="row">
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
           $.each($('.form-control'),function(){
            var thisName = $(this).attr('name');
            var thisVal = $(this).val();
            settingsArray[thisName] = thisVal;
        });
        console.log(settingsArray);
        $.ajax({
            type: "POST",
            url: "settings",
            data: {
                action: "updateSettings",
                settingsArray: JSON.stringify(settingsArray)
            },
            success: function(response) {
                // setTimeout(window.location.reload(),1000);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Request Error:", status, error);
            }
        });
       });
</script>