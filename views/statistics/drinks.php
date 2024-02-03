
<table class="table">
  <thead>
    <tr>
        <th scope="col"><?php echo $textStatisticsDrink;?></th>
        <th scope="col"><?php echo $textStatisticsQuantity;?></th>
        <th scope="col"><?php echo $textStatisticsHomePrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?php echo $textStatisticsPrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?php echo $textStatisticsProfit."(".$storeCurrency.")";?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allDrinks as $drink){ ?>
        <tr>
            <td><?php echo $drink['drink_name']; ?></td>
            <td><?php echo $drink['drink_quantity']; ?></td>
            <td><?php echo $drink['drink_home_price']." ".$storeCurrency; ?></td>
            <td><?php echo $drink['drink_price']." ".$storeCurrency; ?></td>
            <td><?php echo $drink['drink_profit']." ".$storeCurrency; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>