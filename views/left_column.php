        <div class="container-fluid">
        <div class="row">
        
        <!-- Left Column -->
        <div class="col-md-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard"> <?php echo $text_dasboard_dashboard;?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="settings"> <?php echo $text_dasboard_settings;?></a>
                </li>
                <li class="accordion" id="accordion_wrapper">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <?php echo $text_dasboard_drinks;?>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="drinksList"><?php echo $text_dasboard_drinks_list;?></a>
                            <a class="nav-link" href="addDrink"><?php echo $text_dasboard_add_drink;?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 <?php echo $text_dasboard_dishes;?>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="dishesList"><?php echo $text_dasboard_dishes_list;?></a>
                            <a class="nav-link" href="addDish"><?php echo $text_dasboard_add_dish;?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 <?php echo $text_dasboard_users;?>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="userList"><?php echo $text_dasboard_user_list;?></a>
                            <a class="nav-link" href="userType"><?php echo $text_dasboard_user_type;?></a>
                        </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="completedTables"><?php echo $text_dasboard_completed_tables;?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statistics"> <?php echo $text_dasboard_statistics;?></a>
                </li>
            </ul>
        </div>
