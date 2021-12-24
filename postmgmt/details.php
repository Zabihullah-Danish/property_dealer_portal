<?php
  require '../config/path.php';
  require '../config/dbconnection.php';
?>
<?php require '../templates/header_temp.php'; ?>
<link rel="stylesheet" href="<?=baseUrl('dist/css/ContentSection_temp.css'); ?>" />
<link rel="stylesheet" href="<?=baseUrl('dist/css/details.css'); ?>" />

<?php if(!isset($_GET['pstid'])){
  header("location:../index.php");
}

  $pid = $_GET['pstid'];
  $sql = "SELECT * FROM post
            INNER JOIN images
              ON post.pid = images.pid WHERE post.pid = '$pid'";
  $query = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($query);
  $location = $row['location'];
  $category = $row['category'];
  $deal_type = $row['deal_type'];
  // echo "<pre>";
  // print_r($row);

  //fetching images related to the post ID.
  $uploads = 'uploads/';
  $s = "SELECT * FROM images WHERE pid = '$pid'";
  $images = mysqli_query($con,$s);
  //$rel = mysqli_fetch_assoc($images);

?>
  <head>
    <title><?php echo $row['title']; ?></title>
  </head>

<div class="section">
  <div class="sub-section1">
      <div class="back">
        <a id="back" href="<?=baseUrl('index.php');?>">Back</a>
      </div>
      <div class="title1">
        <h2 class="post-title"><?php echo $row['title']; ?></h2>
        <span><strong><u>Published Date:</u></strong> <?php echo $row['create_date']; ?></span>
        <span><strong><u>End Date:</u></strong> <?php echo $row['end_date']; ?></span><br>
        <p><strong>Location: </strong><?php echo $row['location']; ?></p>
      </div>
      <div class="images">
        <div class="post-cover">
          <img id="cover" src="<?php echo $uploads.$row['img_name']; ?>" >
        </div>
        <div class="all-images">
          <?php while($rel = mysqli_fetch_assoc($images)): ?>
            <div class="img-divs">
              <button onclick="document.getElementById('cover').src='<?php echo $uploads.$rel['img_name']; ?>'">
                <img id="all-images" src="<?php echo $uploads.$rel['img_name'];  ?>" /></button>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <div class="post-info">
        <table>
            <tr>
              <td colspan="2"><h2 class="post-title"><?php echo $row['title']; ?></h2></td>
            </tr>
            <tr>
              <td class="left"><span>Location</span></td>
              <td class="right"><span><?php echo $row['location']; ?></span></td>
            </tr>
            <tr>
              <td class="left">Category</td>
              <td class="right"><?php echo $row['category']; ?></td>
            </tr>
            <tr>
              <td class="left">Deal Type</td>
              <td class="right"><?php echo $row['deal_type']; ?></td>
            </tr>
            <tr>
              <td class="left">Content</td>
              <td class="right"><?php echo $row['content']; ?></td>
            </tr>
            <tr>
              <td class="left">Floor</td>
              <td class="right"><?php echo $row['floor']; ?></td>
            </tr>
            <tr>
              <td class="left">Rooms</td>
              <td class="right"><?php echo $row['rooms']; ?></td>
            </tr>
            <tr>
              <td class="left">Kitchens</td>
              <td class="right"><?php echo $row['kitchen']; ?></td>
            </tr>
            <tr>
              <td class="left">Bathrooms</td>
              <td class="right"><?php echo $row['bathrooms']; ?></td>
            </tr>
            <tr>
              <td class="left">Sun Side</td>
              <td class="right"><?php echo $row['sun_side']; ?></td>
            </tr>
            <tr>
              <td class="left">Garage</td>
              <td class="right"><?php echo $row['garage']; ?></td>
            </tr>
            <tr>
              <td class="left">Province</td>
              <td class="right"><?php echo $row['province']; ?></td>
            </tr>
            <tr>
              <td class="left">Location</td>
              <td class="right"><?php echo $row['location']; ?></td>
            </tr>
            <tr>
              <td class="left">Address</td>
              <td class="right"><?php echo $row['address']; ?></td>
            </tr>
            <tr>
              <td class="left">Phone</td>
              <td class="right"><?php echo $row['phone']; ?></td>
            </tr>
            <tr>
              <td class="left">Area</td>
              <td class="right"><?php echo $row['area']; ?></td>
            </tr>
            <tr>
              <td class="left">Contract Duration</td>
              <td class="right"><?php echo $row['contract_duration']; ?></td>
            </tr>
            <tr>
              <td class="left">Currency</td>
              <td class="right"><?php echo $row['currency']; ?></td>
            </tr>
            <tr>
              <td class="left">Price</td>
              <td class="right"><?php echo $row['price']; ?></td>
            </tr>
            <tr>
              <td class="left">Monthly Rent</td>
              <td class="right"><?php echo $row['monthly_rent']; ?></td>
            </tr>
            <tr>
              <td class="left">Negotiable</td>
              <td class="right"><?php echo $row['negotiable']; ?></td>
            </tr>
            <tr>
              <td class="left">Published Date</td>
              <td class="right"><?php echo $row['create_date']; ?></td>
            </tr>
            <tr>
              <td class="left">End Date</td>
              <td class="right"><?php echo $row['end_date']; ?></td>
            </tr>

        </table>
      </div>
      <hr>
      <?php
      $sql = "SELECT * FROM post
              INNER JOIN images ON post.pid = images.pid
              WHERE location = '$location' AND category = '$category'
              AND deal_type = '$deal_type' GROUP BY post.pid";
      $query = mysqli_query($con,$sql);
      ?>
      <h3>Also See Below Matched Properties.</h3>
      <div class="content">
        <?php require_once 'posts.php'; ?>
      </div>

  </div>
  <div class="sub-section2">
    <div class="aside1">
      <?php
      $sql2 = "SELECT * FROM post WHERE location = '$location'";
      $runquery = mysqli_query($con,$sql2) or die(mysqli_error($con));
      // while($loc = mysqli_fetch_assoc($runquery)){
      //   echo "pre>";
      //   print_r($loc);
      //   exit();
      // }
       ?>
      <h3>Also see similar properties</h3>
      <?php while($loc = mysqli_fetch_assoc($runquery)): ?>
        <div class="loc">
          <a id="loc" href="<?=baseUrl('postmgmt/details.php?pstid='.$pid=$loc['pid']); ?>"><?php echo $loc['title'] ?></a>
          <p id="p"><?php echo $loc['category']; ?></p>
          <p id="p">&#10161;<u><?php echo $loc['location']; ?></u></p>
        </div>
        <br>
      <?php endwhile; ?>
    </div>
  </div>

</div>

<?php require '../templates/footer_temp.php'; ?>
