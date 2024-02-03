
<table class="table">
  <thead>
    <tr>
        <th scope="col"><?php echo $textStatisticsDish;?></th>
        <th scope="col"><?php echo $textStatisticsQuantity;?></th>
        <th scope="col"><?php echo $textStatisticsPrice."(".$storeCurrency.")";?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allDishes as $dish){ ?>
        <tr>
            <td><?php echo $dish['dish_name']; ?></td>
            <td><?php echo $dish['dish_quantity']; ?></td>
            <td><?php echo $dish['dish_price']." ".$storeCurrency; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>