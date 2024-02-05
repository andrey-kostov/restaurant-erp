
<table class="table">
  <thead>
    <tr>
        <th scope="col"><?php echo $textStatisticsDish;?></th>
        <th scope="col"><?php echo $textStatisticsQuantity;?></th>
        <th scope="col"><?php echo $textStatisticsPrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?php echo $textStatisticsHomePrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?php echo $textStatisticsProfit."(".$storeCurrency.")";?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allDishes as $dish){ ?>
        <tr>
            <td><?php echo $dish['dish_name']; ?></td>
            <td><?php echo $dish['dish_quantity']; ?></td>
            <td><?php echo $dish['dish_price']." ".$storeCurrency; ?></td>
            <td><?php echo $dish['dish_cost']." ".$storeCurrency; ?></td>
            <td><?php echo $dish['dish_profit']." ".$storeCurrency; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>