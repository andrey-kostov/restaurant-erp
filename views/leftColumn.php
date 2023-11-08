        <div class="container-fluid">
        <div class="row">
        
        <!-- Left Column -->
        <div class="col-md-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root; ?>activeTables"> <?php echo $textDasboardDashboard;?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root; ?>settings"> <?php echo $textDasboardSettings;?></a>
                </li>
                <li class="accordion" id="accordion_wrapper">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <?php echo $textDasboardDrinks;?>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="<?php echo $root; ?>drinksList"><?php echo $textDasboardDrinksList;?></a>
                            <a class="nav-link" href="<?php echo $root; ?>drinksCategories"><?php echo $textDasboardDrinksCategories;?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 <?php echo $textDasboardDishes;?>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="<?php echo $root; ?>dishesList"><?php echo $textDasboardDishesList;?></a>
                            <a class="nav-link" href="<?php echo $root; ?>dishesAdd"><?php echo $textDasboardAddDish;?></a>
                            <a class="nav-link" href="<?php echo $root; ?>dishesCategories"><?php echo $textDasboardDishesCategories;?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 <?php echo $textDasboardUsers;?>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="<?php echo $root; ?>userList"><?php echo $textDasboardUserList;?></a>
                            <a class="nav-link" href="<?php echo $root; ?>userType"><?php echo $textDasboardUserType;?></a>
                            <a class="nav-link" href="<?php echo $root; ?>userAdd"><?php echo $textDasboardUserAdd;?></a>
                        </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root; ?>completedTables"><?php echo $textDasboardCompletedTables;?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root; ?>statistics"> <?php echo $textDasboardStatistics;?></a>
                </li>
            </ul>
        </div>
