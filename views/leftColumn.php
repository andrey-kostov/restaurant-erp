        <div class="container-fluid">
        <div class="row">
        
        <!-- Left Column -->
        <div class="col-md-2">
            <ul class="nav flex-column">
                <li class="accordion" id="accordion_wrapper">
                    <div class="accordion-item">
                        <a class="nav-link " href="<?= $root; ?>tables"> <?= $textDasboardDashboard;?></a>
                    </div>
                    <div class="accordion-item">
                        <a class="nav-link " href="<?= $root; ?>settings"> <?= $textDasboardSettings;?></a>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <?= $textDasboardDrinks;?>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="<?= $root; ?>drinksList"><?= $textDasboardDrinksList;?></a>
                            <a class="nav-link" href="<?= $root; ?>drinksCategories"><?= $textDasboardDrinksCategories;?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 <?= $textDasboardDishes;?>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="<?= $root; ?>dishesList"><?= $textDasboardDishesAdd;?></a>
                            <a class="nav-link" href="<?= $root; ?>dishesAll"><?= $textDasboardDishesList;?></a>
                            <a class="nav-link" href="<?= $root; ?>dishesCategories"><?= $textDasboardDishesCategories;?></a>
                            <a class="nav-link" href="<?= $root; ?>dishesIngredients"><?= $textDasboardDishesIngredients;?></a>
                            <a class="nav-link" href="<?= $root; ?>dishesIngredientsCategories"><?= $textDasboardDishesIngredientsCategories;?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 <?= $textDasboardUsers;?>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="<?= $root; ?>users/userAdd"><?= $textDasboardUserAdd;?></a>
                            <a class="nav-link" href="<?= $root; ?>users/userList"><?= $textDasboardUserList;?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <?= $textDasboardStatistics;?>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="<?= $root; ?>statistics/orders"><?= $textDasboardStatisticsOrders;?></a>
                            <a class="nav-link" href="<?= $root; ?>statistics/drinks"><?= $textDasboardStatisticsDrinks;?></a>
                            <a class="nav-link" href="<?= $root; ?>statistics/dishes"><?= $textDasboardStatisticsDishes;?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <a class="nav-link" href="<?= $root; ?>about"> <?= $textDasboardAbout;?></a>
                    </div>
                </li>
            </ul>
        </div>
