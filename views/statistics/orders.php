<div class="row">
    <div class="container filter-buttons">
        <button class="btn btn-outline-primary filter-button today">
            <?= $textStatisticsToday;?>
        </button>
        <button class="btn btn-outline-primary filter-button day">
            <?= $textStatisticsDay;?>
        </button>
        <button class="btn btn-outline-primary filter-button week">
            <?= $textStatisticsWeek;?>
        </button>
        <button class="btn btn-outline-primary filter-button month">
            <?= $textStatisticsMonth;?>
        </button>
    </div>
</div>

<hr>

<div class="row">
    <div class="container filter-dates">
        <div class="input-group from-date">
            <label for="fromDate"><?= $textStatisticsFromD;?></label>
            <input id="fromDate" type="date">
        </div>
        <div class="input-group to-date">
            <label for="toDate"><?= $textStatisticsToD;?></label>
            <input id="toDate" type="date">
        </div>
        <button class="btn btn-outline-primary filter-button" id="filterByDate">
            <?= $textFilter; ?>
        </button>
    </div>
</div>

<hr>

<div class="row">
    <div class="container">
        <h2 class="card-title"><?= $textStatisticsOrdersPeriod; ?></h2>
    </div>
    <div class="container order-results">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $textStatisticsOrderId;?></th>
                <th scope="col"><?= $textStatisticsTableId;?></th>
                <th scope="col"><?= $textStatisticsOrderDate;?></th>
                <th scope="col"><?= $textStatisticsOrderedDishes;?></th>
                <th scope="col"><?= $textStatisticsOrderedDrinks;?></th>
                <th scope="col"><?= $textStatisticsOrderSum."(".$storeCurrency.")";?></th>
                <th scope="col"><?= $textStatisticsOrderProfit."(".$storeCurrency.")";?></th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
        </table>
    </div>
</div>



