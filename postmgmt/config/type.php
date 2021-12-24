<?php

  $sql = "SELECT DISTINCT(deal_type) FROM post";
  $query = mysqli_query($con,$sql);
?>

  <?php while($row = mysqli_fetch_assoc($query)): ?>
    <a class="links" href="href="<?=baseUrl('postmgmt/dealtypes.php?dt='.$row['deal_type'])?>">
      <?php echo $row['deal_type']; ?>
    </a>
  <?php endwhile; ?>
