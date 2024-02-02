
<table class="table">
  <thead>
    <tr>
        <th scope="col"><?php echo $textDrinkName;?></th>
        <th scope="col"><?php echo $textDrinkQuantity;?></th>
        <th scope="col"><?php echo $textDrinkHomePrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?php echo $textDrinkPrice."(".$storeCurrency.")";?></th>
        <th scope="col"><?php echo $textDrinkProfit."(".$storeCurrency.")";?></th>
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