<div class="row">
    <div class="container filter-buttons">
        <button class="btn btn-outline-primary filter-button today">
            <?php echo $textStatisticsToday;?>
        </button>
        <button class="btn btn-outline-primary filter-button day">
            <?php echo $textStatisticsDay;?>
        </button>
        <button class="btn btn-outline-primary filter-button week">
            <?php echo $textStatisticsWeek;?>
        </button>
        <button class="btn btn-outline-primary filter-button month">
            <?php echo $textStatisticsMonth;?>
        </button>
    </div>
</div>

<hr>

<div class="row">
    <div class="container filter-dates">
        <div class="input-group from-date">
            <label for="fromDate"><?php echo $textStatisticsFromD;?></label>
            <input id="fromDate" type="date">
        </div>
        <div class="input-group to-date">
            <label for="toDate"><?php echo $textStatisticsToD;?></label>
            <input id="toDate" type="date">
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="container results"></div>
</div>



