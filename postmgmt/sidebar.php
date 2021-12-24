


<link rel="stylesheet" href="<?=baseUrl('dist/css/ContentSection_temp.css'); ?>" />
<div class="content-aside">
  <?php
  $sql = "SELECT DISTINCT(province) FROM post";
  $province_query = mysqli_query($con,$sql);
  ?>
  <p>Find By Province.</p>
  <?php while($province = mysqli_fetch_assoc($province_query)): ?>
    <?php
    $pro = $province['province'];
    $sql = "SELECT COUNT(province) as count_province FROM post WHERE province = '$pro'";
    $count_province_query = mysqli_query($con,$sql);
    $province_count = mysqli_fetch_assoc($count_province_query);
    ?>
    <a class="aside-link" href="<?=baseUrl('postmgmt/province.php?pr='.$province['province'])?>">
      <?php echo ucfirst($province['province'])."&nbsp;&nbsp;"."(".$province_count['count_province'].")"; ?>
    </a>
  <?php endwhile; ?>
</div>
<div class="content-aside">
  <?php
  $sql3 = "SELECT * FROM post GROUP BY location";
  $locationquery = mysqli_query($con,$sql3);

   ?>
  <p>Search by locations</p>
  <?php while($location = mysqli_fetch_assoc($locationquery)): ?>
    <?php
    //count posts by location.
    $loc = $location['location'];
    $sql = "SELECT COUNT(location) as location FROM post WHERE location = '$loc'";
    $query = mysqli_query($con,$sql);
    $location_count = mysqli_fetch_assoc($query);
    ?>
    <a class="aside-link" href="<?=baseUrl('postmgmt/locations.php?lc='.$location['location'])?>">
      <?php echo $location['location']."&nbsp;&nbsp;(".$location_count['location'].")"; ?>
    </a>
<?php endwhile; ?>
</div>
<div class="content-aside">
  <?php
  ///////////////////////////////////////////////////////////////////////////////////
  //fetching apartment category.
  $sql3 = "SELECT * FROM post WHERE category = 'apartment'";
  $ap_query = mysqli_query($con,$sql3);
  $apartment = mysqli_fetch_assoc($ap_query);
  //count apartment category.
  $sql = "SELECT COUNT(category) as apartment from post WHERE category = 'apartment'";
  $ap_count_query = mysqli_query($con,$sql);
  $apartment_count = mysqli_fetch_assoc($ap_count_query);
  ///////////////////////////////////////////////////////////////////////////////////
  //fetching house category.
  $sql3 = "SELECT * FROM post WHERE category = 'house'";
  $ho_query = mysqli_query($con,$sql3);
  $house = mysqli_fetch_assoc($ho_query);
  //count house category.
  $sql = "SELECT COUNT(category) as house FROM post WHERE category = 'house'";
  $ho_count_query = mysqli_query($con,$sql);
  $house_count = mysqli_fetch_assoc($ho_count_query);
  ///////////////////////////////////////////////////////////////////////////////////
  //fetching land category.
  $sql3 = "SELECT * FROM post WHERE category = 'land'";
  $ld_query = mysqli_query($con,$sql3);
  $land = mysqli_fetch_assoc($ld_query);
  //count land category.
  $sql = "SELECT COUNT(category) as land FROM post WHERE category = 'land'";
  $ld_count_query = mysqli_query($con,$sql);
  $land_count = mysqli_fetch_assoc($ld_count_query);
  /////////////////////////////////////////////
   ?>
  <p>Property Categories</p>
  <a class="aside-link" href="<?=baseUrl('postmgmt/apartments.php');?> ">
    <?php echo ucfirst($apartment['category'])."&nbsp;&nbsp;"."(".$apartment_count['apartment'].")"; ?>
  </a>
  <a class="aside-link" href="<?=baseUrl('postmgmt/category.php?ct='.$house['category'])?>">
    <?php echo ucfirst($house['category'])."&nbsp;&nbsp;"."(".$house_count['house'].")"; ?>
  </a>
  <a class="aside-link" href="<?=baseUrl('postmgmt/category.php?ct='.$land['category'])?>">
    <?php echo ucfirst($land['category'])."&nbsp;&nbsp;"."(".$land_count['land'].")"; ?>
  </a>
</div>
<div class="content-aside">
  <?php
  $sql3 = "SELECT * FROM post GROUP BY deal_type";
  $dealtypes_query = mysqli_query($con,$sql3);
   ?>
  <p>Browse By Types</p>
  <?php while($dealtypes = mysqli_fetch_assoc($dealtypes_query)): ?>
    <?php
    $deal_type = $dealtypes['deal_type'];
    $sql = "SELECT COUNT(deal_type) as deal_type FROM post WHERE deal_type = '$deal_type'";
    $dealtype_query = mysqli_query($con,$sql);
    $dealtype_count = mysqli_fetch_assoc($dealtype_query);
    ?>
  <a class="aside-link" href="<?=baseUrl('postmgmt/dealtypes.php?dt='.$dealtypes['deal_type'])?>">
    <?php echo ucfirst($dealtypes['deal_type'])."&nbsp;&nbsp;(".$dealtype_count['deal_type'].")"; ?></a>
<?php endwhile; ?>
</div>
