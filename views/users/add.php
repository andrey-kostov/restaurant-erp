<h2 class="card-title"> <?php echo $textAddUser; ?> </h2>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputFirstName"><?php echo $textInputFirstName;?></label>
        <input type="text" id="inputFirstName" class="form-control" placeholder="<?php echo $textInputFirstName;?>">
    </div>
    <div class="form-group col-md-6">
        <label for="inputLastName"><?php echo $textInputLastName;?></label>
        <input type="text" id="inputLastName" class="form-control" placeholder="<?php echo $textInputLastName;?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail"><?php echo $textInputEmail;?></label>
        <input type="email" class="form-control" id="inputEmail" placeholder="<?php echo $textInputEmail;?>">
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword"><?php echo $textInputPassword;?></label>
        <input type="password" class="form-control" id="inputPassword" placeholder="<?php echo $textInputPassword;?>">
    </div>
  </div>
</form>