<?php
  require '../config/dbconnection.php';
 ?>
<?//=baseUrl('dist/css/searchPost_temp.css');?>
<link rel="stylesheet" href="<?=baseUrl('dist/css/searchPost_temp.css');?>" />
<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
 <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
 <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

  <div class="content-box">
    <div class="content">
      <div class="search-area">
        <form class="" action="" method="POST">
          <table class="search">
            <?php
            $uid = $_SESSION['uid'];
            //fetching all location for the current loged in user.
            $sql = "SELECT DISTINCT(location) FROM post WHERE user_id = '$uid'";
            $location_query = mysqli_query($con,$sql);
            //fetching all categories for the current user.
            $sql = "SELECT DISTINCT(category) FROM post WHERE user_id = '$uid'";
            $category_query = mysqli_query($con,$sql);
            //fetching all deal types for the current user.
            $sql = "SELECT DISTINCT(deal_type) FROM post WHERE user_id = '$uid'";
            $deal_query = mysqli_query($con,$sql);
            //fetching all rooms for the current user.
            $sql = "SELECT DISTINCT(rooms) FROM post WHERE user_id = '$uid'";
            $rooms_query = mysqli_query($con,$sql);
            //fetching all garage info for the current user.
            $sql = "SELECT DISTINCT(garage) FROM post WHERE user_id = '$uid'";
            $garage_query = mysqli_query($con,$sql);
            //fetching all sun side info for current user.
            $sql = "SELECT DISTINCT(sun_side) FROM post WHERE user_id = '$uid'";
            $sun_query = mysqli_query($con,$sql);
            //fetching all currency info for the current user.
            $sql = "SELECT DISTINCT(currency) FROM post WHERE user_id = '$uid'";
            $currency_query = mysqli_query($con,$sql);
            ?>

            <tr>
              <td>
                <input type="number" name="id" placeholder="Enter Post ID" />
              </td>
              <td>
                <select name="location">
                  <option value="" selected>Select Location</option>
                  <?php while($row = mysqli_fetch_assoc($location_query)){ ?>
                  <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <select name="category">
                  <option value="" selected>Select Category</option>
              <?php while($row = mysqli_fetch_assoc($category_query)){ ?>
                  <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
              <?php } ?>
              </select>
              </td>
              <td>
                <select name="type">
                  <option value="" selected>Select Deal Type</option>
                  <?php while($row = mysqli_fetch_assoc($deal_query)): ?>
                    <option value="<?php echo $row['deal_type']; ?>"><?php echo $row['deal_type']; ?></option>
                  <?php endwhile; ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <select name="rooms">
                  <option value="" selected>Select Rooms</option>
                  <?php while($row = mysqli_fetch_assoc($rooms_query)): ?>
                    <option value="<?php echo $row['rooms']; ?>"><?php echo $row['rooms']; ?></option>
                  <?php endwhile; ?>
                </select>
              </td>
              <td>
                <select name="garage">
                  <option value="" selected>Select Garage Capacity</option>
                  <?php while($row = mysqli_fetch_assoc($garage_query)): ?>
                    <option value="<?php echo $row['garage']; ?>"><?php echo $row['garage']; ?></option>
                  <?php endwhile; ?>
                </select>
              </td>
              <td>
                <select name="sun_side">
                  <option value="" selected>Select Sun Side</option>
                  <?php while($row = mysqli_fetch_assoc($sun_query)): ?>
                    <option value="<?php echo $row['sun_side']; ?>"><?php echo $row['sun_side']; ?></option>
                  <?php endwhile; ?>
                </select>
              </td>
              <td>
                <select class="" name="currency">
                  <option value="" selected>Select Currency</option>
                  <?php while($row = mysqli_fetch_assoc($currency_query)): ?>
                    <option value="<?php echo $row['currency']; ?>"><?php echo $row['currency']; ?></option>
                  <?php endwhile; ?>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <input id="reset" type="reset" name="reset" value="Clear">
                <input id="submit" type="submit" name="search" value="Search">
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="list-posts">
        <?php if(isset($_POST['search'])): ?>
          <?php
          // SEARCH POST DATA
          $POSTVALUE = array(
            'pid'       => $_POST['id'],
            'location'  => $_POST['location'],
            'category'  => $_POST['category'],
            'deal_type' => $_POST['type'],
            'rooms'     => $_POST['rooms'],
            'garage'    => $_POST['garage'],
            'sun_side'  => $_POST['sun_side'],
            'currency'  => $_POST['currency']
          );



          $WHEREDATA = '';
          $CONDITION = '';
          $num = 1;

          if(
            $_POST['location'] == '' && $_POST['category'] == '' &&
            $_POST['type'] == '' && $_POST['rooms'] == '' && $_POST['garage'] == '' &&
            $_POST['sun_side'] == '' && $_POST['currency'] == '' && $_POST['id'] == ''
            ){
            echo 'You need to define value to search items.';
          }else{

          foreach($POSTVALUE as $POSTKEY=>$POSTDATA){
             if(!empty($POSTDATA)){

               if($num != 1){
                 $CONDITION = ' AND ';
               }else{
                 $CONDITION = '';
               }

               $WHEREDATA .= $CONDITION.$POSTKEY." = '".$POSTDATA."'";

               $num++;
             }

          }

          //Query to search the specified data.
          $sql = "SELECT COUNT(pid) AS countpost FROM post WHERE user_id = '$uid' AND $WHEREDATA";
          $count_query = mysqli_query($con,$sql) OR die(mysqli_error($con));
          $countsearch = mysqli_fetch_assoc($count_query);
          ?>
          <span id="recordfound">Record Found&nbsp;&nbsp;<?php echo "(".$countsearch['countpost'].")"; ?></span>
            <?php }?>
        <?php else: ?>
          <?php

          $sql = "SELECT COUNT(pid) as totalpost FROM post WHERE user_id = '$uid' AND status = 1";
          $totalpost = mysqli_query($con,$sql);
          $row = mysqli_fetch_assoc($totalpost);
          ?>
          <span id="recordfound">Total Record&nbsp;&nbsp;<?php echo "(".$row['totalpost'].")"; ?></span>

        <?php endif; ?>
        <table class="list-table" border='1'>
          <tr>
            <th id="id"><span>Post ID</span></th>
            <th id="title"><span>Title</span></th>
            <th id="category"><span>Category</span></th>
            <th id="view"><span>Action</span></th>
          </tr>
          <?php if(isset($_POST['search'])): ?>
            <?php
            if(
              $_POST['location'] == '' && $_POST['category'] == '' &&
              $_POST['type'] == '' && $_POST['rooms'] == '' && $_POST['garage'] == '' &&
              $_POST['sun_side'] == '' && $_POST['currency'] == '' && $_POST['id'] == ''
              ){
              echo 'You need to define value to search items.';
            }else{
            //Query to search the specified data.
            $sql = "SELECT * FROM post WHERE user_id = '$uid' AND $WHEREDATA";
            $search_query = mysqli_query($con,$sql) OR die(mysqli_error($con));

            ?>
            <?php while($row = mysqli_fetch_assoc($search_query)): ?>
              <tr>
                <td class="viewbtn"><?php echo $row['pid']; ?></td>
                <td><?php echo ucfirst($row['title']); ?></td>
                <td class="viewbtn"><?php echo ucfirst($row['category']); ?></td>
                <td class="viewbtn">
                  <a class="view" href="<?=baseUrl('postmgmt/postDetail.php?PostID='.$row['pid'])?>">view</a>
                  <a title="Edit" class="edit" href="<?=baseUrl('postmgmt/addNewPost.php?edit='.$row['pid'])?>">edit</a>
                  <a title="Delete" class="del" href="<?=baseUrl('config/del.php?del='.$row['pid'])?>">del</a>
                </td>
              </tr>
            <?php endwhile; ?>
            <?php }?>
          <?php else: ?>
            <?php
            $sql = "SELECT * FROM post WHERE user_id = '$uid' AND status = '1'";
            $allpost = mysqli_query($con,$sql);
            ?>
            <?php while($row = mysqli_fetch_assoc($allpost)): ?>
              <tr>
                <td class="viewbtn"><?php echo $row['pid']; ?></td>
                <td><?php echo ucfirst($row['title']); ?></td>
                <td class="viewbtn"><?php echo ucfirst($row['category']); ?></td>
                <td class="viewbtn">
                  <a class="view" href="<?=baseUrl('postmgmt/postDetail.php?PostID='.$row['pid'])?>">view</a>
                  <a title="Edit" class="edit" href="<?=baseUrl('postmgmt/addNewPost.php?edit='.$row['pid'])?>">edit</a>
                  <a title="Delete" class="del" href="<?=baseUrl('config/del.php?del='.$row['pid'])?>">del</a>
                </td>
              </tr>
            <?php endwhile; ?>

          <?php endif; ?>

        </table>
      </div>
      </div>
    </div>
