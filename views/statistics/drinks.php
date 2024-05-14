
<table class="table">
  <thead>
    <tr>
        <th scope="col"><?= $textStatisticsDrink;?></th>
        <th scope="col"><?= $textStatisticsQuantity;?></th>
        <th scope="col"><?= $textStatisticsHomePrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?= $textStatisticsPrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?= $textStatisticsProfit."(".$storeCurrency.")";?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allDrinks as $drink){ ?>
        <tr>
            <td><?= $drink['drink_name']; ?></td>
            <td><?= $drink['drink_quantity']; ?></td>
            <td><?= $drink['drink_home_price']." ".$storeCurrency; ?></td>
            <td><?= $drink['drink_price']." ".$storeCurrency; ?></td>
            <td><?= $drink['drink_profit']." ".$storeCurrency; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>