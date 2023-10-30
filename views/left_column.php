
        <!-- Left Column -->
        <div class="col-md-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#"> <?php echo 'Dashboard';?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> <?php echo 'Settings';?></a>
                </li>
                <li class="accordion" id="accordion_wrapper">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <?php echo 'Drinks';?>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="#"><?php echo 'Drinks List';?></a>
                            <a class="nav-link" href="#"><?php echo 'Add Drink';?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 <?php echo 'Dishes';?>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="#"><?php echo 'Dishes List';?></a>
                            <a class="nav-link" href="#"><?php echo 'Add Dish';?></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 <?php echo 'Users';?>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordion_wrapper">
                        <div class="accordion-body">
                            <a class="nav-link" href="#"><?php echo 'User List';?></a>
                            <a class="nav-link" href="#"><?php echo 'User Type';?></a>
                        </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo'Completed Tables';?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> <?php echo 'Statistics';?></a>
                </li>
            </ul>
        </div>
