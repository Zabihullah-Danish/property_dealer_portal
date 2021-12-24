<?php
  $pid = 0;
  $update = false;
  $title_update = "";
  $content_update = "";
  $category_update = "Select Category";
  $deal_type_update = "Select Deal Type";
  $floor_update = "Select Floor No";
  $rooms_update = "Select Rooms";
  $kitchen_update = "Select Kitchen";
  $bathrooms_update = "Select Bathrooms";
  $sun_side_update = "Select sun side";
  $garage_update = "Select Garage Capacity";
  $province_update = "Select Province";
  $location_update = "Select Location";
  $address_update = "";
  $phone_update = "";
  $area_update = "";
  $contract_duration_update = "Select duration";
  $currency_update = "Select Currency";
  $price_update = "";
  $monthly_rent_update = "";
  $negotiable_update = "Is Negotiable?";
  $create_date_update = "";
  $end_date_update = "";
  $images = "";

  if(isset($_GET['edit'])){
    $pid = $_GET['edit'];
    $update = true;
    $sql = "SELECT * FROM post WHERE pid = $pid";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    // echo "<pre>";
    // print_r($result);
    // exit();
    $title_update = $row['title'];
    $content_update = $row['content'];
    $category_update = $row['category'];
    $deal_type_update = $row['deal_type'];
    $floor_update = $row['floor'];
    $rooms_update = $row['rooms'];
    $kitchen_update = $row['kitchen'];
    $bathrooms_update = $row['bathrooms'];
    $sun_side_update = $row['sun_side'];
    $garage_update = $row['garage'];
    $province_update = $row['province'];
    $location_update = $row['location'];
    $address_update = $row['address'];
    $phone_update = $row['phone'];
    $area_update = $row['area'];
    $contract_duration_update = $row['contract_duration'];
    $currency_update = $row['currency'];
    $price_update = $row['price'];
    $monthly_rent_update = $row['monthly_rent'];
    $negotiable_update = $row['negotiable'];
    $create_date_update = $row['create_date'];
    $end_date_update = $row['end_date'];
    $user_id = $row['user_id'];
    //fetching images from images table for editing.
    $sql1 = "SELECT * FROM images WHERE pid = $pid";
    $qry = mysqli_query($con,$sql1);
    while($rel = mysqli_fetch_assoc($qry)){
      $images = $rel['img_name']."<br>";
    }
  }
  //update query for edit post.
  if(isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $deal_type = $_POST['deal_type'];
    $floor = $_POST['floor'];
    $rooms = $_POST['rooms'];
    $kitchen = $_POST['kitchen'];
    $bathrooms = $_POST['bathrooms'];
    $sun_side = $_POST['sun_side'];
    $garage = $_POST['garage'];
    $province = $_POST['province'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $area = $_POST['area'];
    $contract_duration = $_POST['contract_duration'];
    $currency = $_POST['currency'];
    $price = $_POST['price'];
    $monthly_rent = $_POST['monthly_rent'];
    $negotiable = $_POST['negotiable'];
    //$create_date = $_POST['create_date'];
    $end_date = $_POST['end_date'];
    $status = 1;
    $update = "UPDATE post SET title = '$title', content = '$content', category = '$category',
     deal_type = '$deal_type', floor = '$floor', rooms = '$rooms',kitchen = '$kitchen',bathrooms = '$bathrooms', sun_side = '$sun_side',
     garage = '$garage', province = '$province', location = '$location', address = '$address',phone = '$phone',location = '$location',
      area = '$area', contract_duration = '$contract_duration',currency = '$currency', price = '$price',
       monthly_rent = '$monthly_rent', negotiable = '$negotiable',end_date = '$end_date' WHERE pid = '$pid'";


    if($query = mysqli_query($con,$update)or die(mysqli_error($con))){
      $update = 1;
      header("location:".baseUrl('postmgmt/searchPost.php?ud='.$update));
    }else{
      echo "Problem accured.";
    }

  }



 ?>
