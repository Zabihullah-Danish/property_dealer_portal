<?php //require_once 'config/path.php'; ?>
<?php require_once 'config/dbconnection.php'; ?>
<link rel="stylesheet" href="<?=baseUrl('dist/css/ContentSection_temp.css'); ?>" />
      <div class="section">
        <h2>Listed All Properties From All Categories From Every Location In Afghanistan.</h2>
      </div>

      <div class="ContentSection">
        <div class="content">
          <?php
          $uploads = 'postmgmt/uploads/';
          // fetching all post
          $sql = "SELECT * FROM post
                   INNER JOIN images ON post.pid = images.pid
                   GROUP BY post.pid";
          $query = mysqli_query($con,$sql);
          ?>
          <?php require_once 'postmgmt/posts.php'; ?>
        </div>
        <div class="aside">
          <?php require_once 'postmgmt/sidebar.php'; ?>
        </div>
      </div>
