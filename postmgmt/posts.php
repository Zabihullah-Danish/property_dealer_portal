<?php

  require "dbconnection.php";

  //$uploads = 'uploads/';

 ?>
<link rel="stylesheet" href="<?=baseUrl('dist/css/ContentSection_temp.css'); ?>" />


  <?php while($ap = (mysqli_fetch_assoc($query))): ?>

    <div class="posts">

      <a id="a" href="<?=baseUrl('postmgmt/details.php?pstid='.$ap['pid']);  ?>">
      <div id="img">
        <div class="deal">
          <div class="one"><span><?php echo ucfirst($ap['category']); ?></span></div>
          <div class="one"><span><?php echo ucfirst($ap['deal_type']); ?></span></div>
        </div>
        <img src="<?php echo $uploads.$ap['img_name']; ?>" />
      </div>
      </a>
      <div class="date">
        <p>Published On: <?php echo $ap['create_date']; ?></p>
        <p>Expired On: <?php echo $ap['end_date']; ?></p>
      </div>
      <a class="a" href="<?=baseUrl('postmgmt/details.php?pstid='.$ap['pid']);  ?>">
        <div class="title">
          <h4><?php echo ucfirst($ap['title']); ?></h4>
        </div>
      </a>

    </div>
  <?php endwhile; ?>
