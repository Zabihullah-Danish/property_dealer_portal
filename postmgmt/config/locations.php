<?php

  //require '../dbconnection.php';

  $sql = "SELECT DISTINCT(location) FROM post LIMIT 8";
  $query = mysqli_query($con,$sql);

?>

  <?php while($row = mysqli_fetch_assoc($query)): ?>
    <a class="links" href="#"><?php echo $row['location']; ?></a>
  <?php endwhile; ?>
