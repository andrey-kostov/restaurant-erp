
<table class="table">
  <thead>
    <tr>
        <th scope="col"><?= $textStatisticsDish;?></th>
        <th scope="col"><?= $textStatisticsQuantity;?></th>
        <th scope="col"><?= $textStatisticsPrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?= $textStatisticsHomePrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?= $textStatisticsProfit."(".$storeCurrency.")";?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allDishes as $dish){ ?>
        <tr>
            <td><?= $dish['dish_name']; ?></td>
            <td><?= $dish['dish_quantity']; ?></td>
            <td><?= $dish['dish_price']." ".$storeCurrency; ?></td>
            <td><?= $dish['dish_cost']." ".$storeCurrency; ?></td>
            <td><?= $dish['dish_profit']." ".$storeCurrency; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>