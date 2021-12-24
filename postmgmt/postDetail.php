 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <?php
    require '../config/loader.php';
    require '../templates/header1_temp.php';
    require '../config/updatePost.php';

    if(!isset($_GET['PostID']) || $_GET['PostID']=='' ){
      header('location: '.baseUrl('postmgmt/searchPost.php'));
    }
    // if(isset($_GET['PostID'])){
    //   echo "<script>alert('Record Updated Successfully.')</script>";
    // }

    require '../config/dbconnection.php';
    $uid = $_SESSION['uid'];
    $pid = $_GET['PostID'];
    $sql = "
    SELECT * FROM post
    INNER JOIN images
    ON post.pid = images.pid WHERE user_id = '$uid' AND images.pid = '$pid'";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    // echo "<pre>";
    // print_r($row);
    // exit();
    $images = "SELECT * FROM images WHERE pid = '$pid'";
    $img = mysqli_query($con,$images);

    ?>
    <head>
      <title>
        <?php echo $row['title']; ?>
      </title>
    </head>
<link rel="stylesheet" href="<?=baseUrl('dist/css/postdetails.css');?>">
  <div class="section">
    <div class="sub-section">
      <div class="EditDelete">

        <div class="option">
          <a class="edit-back" href="addNewPost.php?edit=<?php echo $row['pid']; ?>"><i class="far fa-edit"> Edit</i></a>
        </div>
        <div class="option">
          <a class="del" href="../config/del.php?del=<?php echo $row['pid']; ?>"><i class="far fa-trash-alt"></i> Delete</a>
        </div>
        <div class="option">
          <a class="edit-back" href="searchPost.php">Back to List</a>
        </div>
      </div>

      <div class="title">
        <h1><?php echo $row['title']; ?></h1>
      </div>

      <div class="images">
        <div class="coverimg">
        <?php  $uploads = 'uploads/'; ?>
          <img id="coverimg" src="<?php echo $uploads.$row['img_name']; ?>" alt="<?php echo $row['img_name']; ?>" />
        </div>
        <div class="other-img">
        <?php while($rel = mysqli_fetch_assoc($img)){ ?>
          <div class="post-img">

            <button onclick="document.getElementById('coverimg').src='<?php echo $uploads.$rel['img_name']; ?>'"
              id="button"><img src="<?php echo $uploads.$rel['img_name']; ?>" /></button>
            <?php //echo $rel['img_name']."<br>"; ?>
          </div>
        <?php } ?>
        </div>
      </div>
      <hr>
      <div class="post-info">

        <table>
          <tr>
            <td id="first-row" colspan="2"><h3>Post Description</h3></td>
          </tr>
          <tr>
            <td class="titles"><strong>Title</strong></td>
            <td><?php echo $row['title']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Content</strong></td>
            <td><?php echo $row['content']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Category</strong></td>
            <td><?php echo $row['category']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Deal Type</strong></td>
            <td><?php echo $row['deal_type']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Floor No</strong></td>
            <td><?php echo $row['floor']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Number Of Rooms</strong></td>
            <td><?php echo $row['rooms']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Kitchens</strong></td>
            <td><?php echo $row['kitchen']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>bathrooms<strong></td>
            <td><?php echo $row['bathrooms']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Sun Side</strong></td>
            <td><?php echo $row['sun_side']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Garage<strong></td>
            <td><?php echo $row['garage']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Province<strong></td>
            <td><?php echo $row['province']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Location</strong></td>
            <td><?php echo $row['location']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Address<strong></td>
            <td><?php echo $row['address']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Phone<strong></td>
            <td><?php echo $row['phone']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Area</strong></td>
            <td><?php echo $row['area']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Contract Duration</strong></td>
            <td><?php echo $row['contract_duration']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Currency</strong></td>
            <td><?php echo $row['currency']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Price</strong></td>
            <td><?php echo $row['price']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Montdly Rent</strong></td>
            <td><?php echo $row['monthly_rent']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Negotiable</strong></td>
            <td><?php echo $row['negotiable']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>Published Date</strong></td>
            <td><?php echo $row['create_date']; ?></td>
          </tr>
          <tr>
            <td class="titles"><strong>End Date</strong></td>
            <td><?php echo $row['end_date']; ?></td>
          </tr>


        </table>
      </div>
      <div class="EditDelete">

        <div class="option">
          <a class="edit-back" href="addNewPost.php?edit=<?php echo $row['pid']; ?>"><i class="far fa-edit"></i> Edit</a>
        </div>
        <div class="option">
          <a class="del" href="../config/del.php?del=<?php echo $row['pid']; ?>"><i class="far fa-trash-alt"></i> Delete</a>
        </div>
        <div class="option">
          <a class="edit-back" href="searchPost.php">Back to List</a>
        </div>
      </div>

    </div>
  </div>

<?php require '../templates/footer_temp.php';?>
