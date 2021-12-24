<?php
  require_once '../config/dbconnection.php';
  require_once '../config/path.php';
  require_once '../templates/header_temp.php';

  ////////////////////////////////////////////
  $sql = "SELECT * FROM post
            INNER JOIN images
              ON post.pid = images.pid
              WHERE category = 'apartment' GROUP BY post.pid";
  $query = mysqli_query($con,$sql);

  $uploads = 'uploads/';

?>
<link rel="stylesheet" href="<?=baseUrl('dist/css/ContentSection_temp.css'); ?>" />
    <!--################################################################ -->
    <div class="ContentSection">
      <div class="content">
        <?php require 'posts.php'; ?>
      </div>
      <div class="aside">
        <?php require_once 'sidebar.php'; ?>
      </div>
    </div>


<?php require_once '../templates/footer_temp.php'; ?>
