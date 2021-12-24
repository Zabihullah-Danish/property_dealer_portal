<?php
  require '../config/loader.php';
  require '../config/updatePost.php';
//  require_once '../config/uploadimg.php';

  //initialilze array for geting errros.
  $errors = array();
  $rel = 0;

  if(isset($_POST['submit'])){

    /////////////////////////////////////////////////////////////////
    //Checking form validation //////////////////////////////////////

    if(empty($_POST['title']) OR ctype_space($_POST['title'])){
      $errors[1] = "Please Enter title";
    }else{
      $title = mysqli_real_escape_string($con,trim($_POST['title'])); //// 1
    }

    if(empty($_POST['content']) OR ctype_space($_POST['content'])){
      $errors[2] = "Please enter post content.";
    }else{
      $content = mysqli_real_escape_string($con,trim($_POST['content'])); //// 2
    }

    if($_POST['category'] == $category_update){
      $errors[3] = "Please Select property category.";
    }else{
      $category = $_POST['category']; //// 3
    }

    if($_POST['deal_type'] == $deal_type_update){
      $errors[4] = "Please select deal type for property.";
    }else{
      $deal_type = $_POST['deal_type']; //// 4
    }

    if($_POST['floor'] == $floor_update){
      $errors[5] = "Please select floor number for the property.";
    }else{
      $floor = $_POST['floor']; //// 5
    }

    if($_POST['rooms'] == $rooms_update){
      $errors[6] = "Please select rooms No";
    }else{
      $rooms = $_POST['rooms']; //// 6
    }

    if($_POST['kitchen'] == $kitchen_update){
      $errors[23] = "Please Select Kitchen";
    }

    if($_POST['bathrooms'] == $bathrooms_update){
      $errors[18] ="Please select bathrooms";
    }else{
      $bathrooms = $_POST['bathrooms'];
    }

    if($_POST['sun_side'] == $sun_side_update){
      $errors[7] = "Please select sun side";
    }else{
      $sun_side = $_POST['sun_side']; //// 7
    }

    if($_POST['garage'] == $garage_update){
      $errors[19] = "Select garage capacity";
    }else{
      $garage = $_POST['garage'];
    }

    if($_POST['province'] == $province_update){
      $errors[20] = "Please select province";
    }else{
      $province = $_POST['province'];
    }

    if($_POST['location'] == $location_update){
      $errors[8] = "Please select property location.";
    }else{
      $location = mysqli_real_escape_string($con,trim($_POST['location'])); //// 8
    }

    if(empty($_POST['address']) or ctype_space($_POST['address'])){
      $errors[21] = "Enter post address";
    }else{
      $address = mysqli_real_escape_string($con,trim($_POST['address']));
    }

    if(empty($_POST['phone']) OR ctype_space($_POST['phone'])){
      $errors[22] = "Please enter phone";
    }else{
      $phone = mysqli_real_escape_string($con,trim($_POST['phone']));
    }

    if(empty($_POST['area']) OR ctype_space($_POST['area'])){
      $errors[9] = "Please enter complete area of the property";
    }else{
      $area = mysqli_real_escape_string($con,trim($_POST['area'])); //// 9
    }

    if($_POST['contract_duration'] == $contract_duration_update){
      $errors[10] = "Please Select contract duration.";
    }else{
      $cduration = $_POST['contract_duration']; //// 10$cduration = $_POST['contract_duration']; //// 10
    }

    if($_POST['currency'] == $currency_update){
      $errors['11'] = "Please select currency type for the property.";
    }else{
      $currency = $_POST['currency']; //// 11
    }


    if(empty($_POST['price'])){
      $errors[12] = "Please enter price related to select currency";
    }else{
      $price = $_POST['price']; //// 12
    }

    if(empty($_POST['monthly_rent'])){
      $errors[13] = "Please enter monthly rent.";
    }else{
      $monthly_rent = $_POST['monthly_rent']; //// 13
    }

    if($_POST['negotiable'] == $negotiable_update){
      $errors['14'] = "Didn't say it is nogotiable or not.";
    }else{
      $negotiable = $_POST['negotiable']; //// 14
    }


    if(!empty($_FILES['files'])){
      if(count($_FILES['files']['name']) > 7 ){
        $errors[15] = "You can upload less or maximum upto 8 image for any post.";
      }

    }
    if(empty($_FILES['files'])){
      $errors[16] = "Didn't select any images, must select up to 6 image ";
    }

    $current_date = date('y-m-d'); //// 15
    //$end_date = $_POST['end_date'];

    if(empty($_POST['end_date'])){

      $errors[17] = "Please select end date";

    }else{
      $end_date = $_POST['end_date']; //// 16
    }

    $user_id = $_SESSION['uid']; //// 17
    $status = 1;

    //check if any error exist then display it.
    if(count($errors) == 0){

      //write here insert query to database.
      $query = "INSERT INTO post (title,content,category,deal_type,floor,rooms,kitchen,bathrooms,sun_side,
        garage,province,location,address,phone,area, contract_duration,currency,price,monthly_rent,negotiable,
        create_date,end_date,user_id,status) VALUES('$title','$content','$category','$deal_type','$floor','$rooms',
        '$kitchen','$bathrooms','$sun_side','$garage','$province','$location','$address','$phone'
        ,'$area','$cduration','$currency','$price','$monthly_rent','$negotiable',
        '$current_date','$end_date','$user_id','$status')";
      $rel = mysqli_query($con,$query) OR die(mysqli_error($con));

      if(count($errors) == 0){

        $last_id = mysqli_insert_id($con);
         $_SESSION['last_id'] = $last_id;

         $targetDir = "uploads/";
         $allowTypes = array('jpg','png','jpeg','gif');

         $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
         $fileNames = array_filter($_FILES['files']['name']);

         if(!empty($fileNames)){
           foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            if(in_array($fileType, $allowTypes)){
               $fileNewName = date('Ymdhms').$fileName;
               $targetFilePath = $targetDir.$fileNewName;
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileNewName."', NOW(),'".$last_id."'),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].' | ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].' | ';
                 }
               }

        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database
            $insert = 0;
            $insert = $con->query("INSERT INTO images (img_name, uploaded_on,pid) VALUES $insertValuesSQL");
            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;

                $_SESSION['success'] = $insert;
              }
            else{
                $statusMsg = "Sorry, there was an error uploading your file.";
              }
          }
        }//end of !empty(filename) condation.
         else{
           $statusMsg = 'Please select a file to upload.';
         }

        // Display status
       if($_SESSION['success'] == 1){
        // echo "<script>alert('$statusMsg')</script>";
        header("location:".baseUrl('postmgmt/searchPost.php'));
       }

      }// end of this -> if($rel == 1){

    }


  }// end of main if block.

 ?>
  <head>

    <title>
      Add New Post
    </title>
    <link rel="stylesheet" href="<?=baseUrl('dist/css/addNewPost.css'); ?>">
  </head>

<?php require '../templates/header1_temp.php';?>
  <div class="section">
    <div class="sub-section">
      <form name="add_post" action="#" method="POST" enctype="multipart/form-data">
        <table class="addpost_table">
          <tr>
            <td class="table_title" colspan="2"><h2>Adding Post</h2></td>
          </tr>
          <tr>
            <td colspan="2"><input type="hidden" name="id" value="<?php echo $pid; ?>" /></td>
          </tr>
          <tr>
            <td><label for="title">Title</label></td>
            <td><input style="<?php if(!empty($errors[1])) echo "border:1px solid red;" ?>" type="text" name="title" placeholder="Enter post title." value="<?php if(isset($_POST['title'])) echo $_POST['title'];echo $title_update; ?>" required /></td>
          </tr>
          <tr>
            <td><label for="content">Content</label></td>
            <td><textarea style="<?php if(!empty($errors[2])) echo "border:1px solid red; "; ?>" name="content" rows="4" cols="80" placeholder="Enter complete information for the post"><?php if(isset($_POST['content'])) echo $_POST['content'];echo $content_update; ?></textarea></td>
          </tr>
          <tr>
            <td><label for="category">Property Category</label></td>
            <td><select style="<?php if(!empty($errors['3'])) echo "border:1px solid red;" ?>" class="category" name="category"">
                <?php
                if(isset($_POST['category'])) echo "<option>".ucfirst($_POST['category'])."</option>";
                echo "<option>".ucfirst($category_update)."</option>";
                 ?>
                <option value="apartment">Apartment</option>
                <option value="house">House</option>
                <option value="land">Land</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="dtype">Deal Type</label></td>
            <td><select style="<?php if(!empty($errors['4'])) echo "border:1px solid red;" ?>" name="deal_type">
                <?php
                if(isset($_POST['deal_type'])) echo "<option>".ucfirst($_POST['deal_type'])."</option>";
                echo "<option>".ucfirst($deal_type_update)."</option>";
                ?>
                <option value="mortgage">Mortgage</option>
                <option value="rental">Rental</option>
                <option value="sale">For Sale</option>
            </select></td>
          </tr>
          <tr>
            <td><label for="floor">Floor No</label></td>
            <td>
              <select style="<?php if(!empty($errors['5'])) echo "border:1px solid red;" ?>" name="floor">
                  <?php
                  if(isset($_POST['floor'])) echo "<option>".ucfirst($_POST['floor'])."</option>";
                  echo "<option>".ucfirst($floor_update)."</option>";
                  ?>
                  <option value="none">None</option>
                  <option value="basement">Basement</option>
                  <option value="first floor">First Floor</option>
                  <option value="second floor">Second Floor</option>
                  <option value="third floor">Third Floor</option>
                  <option value="fourth floor">Fourth Floor</option>
                  <option value="fith floor">Fith Floor</option>
                  <option value="sixth floor">Sixth Floor</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="rooms">Rooms</label></td>
            <td>
              <select style="<?php if(!empty($errors['6'])) echo "border:1px solid red;" ?>" class="" name="rooms">
                <?php
                if(isset($_POST['rooms'])) echo "<option>".$_POST['rooms']."</option>";
                echo "<option>".$rooms_update."</option>";
                ?>
                <option value="none">None</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="kitchen">Kitchen</label></td>
            <td>
              <select style="<?php if(!empty($errors[23])) echo "border:1px solid red;"; ?>" name="kitchen">
                <?php if(isset($_POST['kitchen'])) echo "<option>".$_POST['kitchen']."<option>"; ?>
                  <?php echo "<option>".$kitchen_update."</option>"; ?>
                <option value="none">None</optio>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="bathrooms">Bathrooms</label></td>
            <td>
              <select style="<?php if(!empty($errors[18])) echo "border:1px solid red;"; ?>" name="bathrooms">
                <?php if(isset($_POST['bathrooms'])) echo  "<option>".$_POST['bathrooms']."</option";
                echo "<option>".$bathrooms_update."</option>";
                ?>
                <option value="none">None</option>
                <option vaue="1">1</option>
                <option vaue="2">2</option>
                <option vaue="3">3</option>
                <option vaue="4">4</option>
                <option vaue="5">5</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="sun_side">Sun Side</label>
            </td>
            <td>
              <select style="<?php if(!empty($errors['7'])) echo "border:1px solid red;" ?>" name="sun_side">
                  <?php
                  if(isset($_POST['sun_side'])) echo "<option>".ucfirst($_POST['sun_side'])."</option>";
                  echo "<option>".ucfirst($sun_side_update)."</option>";
                  ?>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                  <option value="half day morning">Half day morning</option>
                  <option value="half day evening">Half day evening</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="garage">Garage</label></td>
            <td>
              <select style="<?php if(!empty($errors[19])) echo "border:1px solid red;"; ?>" name="garage">
                <?php if(isset($_POST['garage'])) echo "<option>".$_POST['garage']."</option>";
                echo "<option>".ucfirst($garage_update)."</option>";
                ?>
                <option value="none">None</option>
                <option value="1 car capacity">1 Car Capacity</option>
                <option value="2 car capacity">2 Car Capacity</option>
                <option value="3 car capacity">3 Car Capacity</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="province">Province</label></td>
            <td>
              <select style="<?php if(!empty($errors[20])) echo "border:1px solid red;"; ?>" name="province">
                <?php
                if(isset($_POST['province'])) echo "<option>".ucfirst($_POST['province'])."</option>";
                  echo "<option>".ucfirst($province_update)."</option>";
                 ?>
                <option value="kabul">Kabul</option>
                <option value="herat">Herat</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="location">Select Location</td>
            <td>
              <select style="<?php if(!empty($errors[8])) echo "border:1px solid red;" ?>" name="location">
                <?php
                if(isset($_POST['location'])) echo "<option>".$_POST['location']."</option>";
                echo "<option>".$location_update."</option>";
                 ?>
                <option value="karte Now First Street">karte Now first Street</option>
                <option value="karte Now Second Street">karte Now Second Street</option>
                <option value="karte Now Third Street">karte Now Third Street</option>
                <option value="Shashaheed First Street">karte Now first street</option>
                <option value="Shahshaheed Second Street">Shahshaheed Second Street</option>
                <option value="Shahshaheed Third Street">Shahshaheed Third Street</option>
                <option value="Bagrami">Bagrami</option>
                <option value="Karte Now Saretapa">Karte Now Saretapa</option>
                <option value="Hewadual Blocks">Hewadual Blocks</option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="address">Address</label></td>
            <td>
              <input style="<?php if(!empty($errors[21])) echo "border:1px solid red;"; ?>" value="<?php if(isset($_POST['address'])) echo $_POST['address'];echo $address_update; ?>" type="text" name="address" placeholder="Enter Address" />
            </td>
          </tr>
          <tr>
            <td><label for="phone">Phone</label></td>
            <td><input style="<?php if(!empty($errors[22])) echo "border:1px solid red;"; ?>" type="number" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];echo $phone_update; ?>" placeholder="Enter Phone number"></td>
          </tr>
          <tr>
            <td><label for="area">Area</label></td>
            <td><textarea style="<?php if(!empty($errors[9])) echo "border:1px solid red;" ?>" name="area" rows="4" cols="80" placeholder="Enter from four side srounded by..."><?php if(isset($_POST['area'])) echo $_POST['area'];echo $area_update; ?></textarea></td>
          </tr>
          <tr>
            <td><label for="contract_duration">Contract Duration</label></td>
            <td>
              <select style="<?php if(!empty($errors[10])) echo "border:1px solid red;" ?>" name="contract_duration">
                  <?php if(isset($_POST['contract_duration'])): ?>
                  <option><?php echo $_POST['contract_duration']; ?></option>
                <?php endif; ?>
                  <option><?php echo $contract_duration_update; ?></option>
                  <option value="None">None</option>
                  <option value="6 month">6 Months</option>
                  <option value="1 year">1 Year</option>
                  <option value="2 year">2 Year</option>
                  <option value="5 year">5 Year</option>
                  <option value="10 year">10 Year</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="currency">Currency</label></td>
            <td>
              <select style="<?php if(!empty($errors[11])) echo "border:1px solid red;" ?>" class="currency" name="currency">
                  <?php if(isset($_POST['currency'])): ?>
                  <option><?php echo $_POST['currency']; ?>
                  <?php endif; ?>
                  <option><?php echo $currency_update; ?></option>
                  <option value="af">Afg</option>
                  <option value="$">&dollar;</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="price">Price</label></td>
            <td><input style="<?php if(!empty($errors[12])) echo "border:1px solid red;" ?>" type="number" name="price" value="<?php
            if(isset($_POST['price'])) echo $_POST['price'];
            echo $price_update;
             ?>" placeholder="Enter price..." /></td>
          </tr>
          <tr>
            <td><label for="monthly_rent">Monthly Rent</label></td>
            <td><input style="<?php if(!empty($errors[13])) echo "border:1px solid red;" ?>" type="number" name="monthly_rent" value="<?php
            if(isset($_POST['monthly_rent'])) echo $_POST['monthly_rent'];
            echo $monthly_rent_update;
            ?>" placeholder="Enter rent..." /></td>
          </tr>
          <tr>
            <td><label for="negotiable">Negotiable</label></td>
            <td>
              <select style="<?php if(!empty($errors[14])) echo "border:1px solid red;" ?>" name="negotiable">
                  <?php if(isset($_POST['negotiable'])): ?>
                    <option><?php echo $_POST['negotiable']; ?></option>
                  <?php endif; ?>
                  <option><?php echo $negotiable_update; ?></option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="img">Upload Images</label></td>
            <td><input style="<?php
            if(!empty($errors[16])){
              echo "border:1px solid red;";
            }
            if(!empty($errors[15])){
              echo "border:1px solid red;";
            }
            ?>" type="file" name="files[]" <?php if($pid == 0){

            }else{
              echo "disabled";
            }
            ?> multiple />
            <?php if($pid == 0){

            }else{
              echo "<span style='color:red;'>Access deneid edit images.</span>";
            }
            ?>
            </td>
          </tr>
          <tr>
            <td colspan = "2" style="padding-left:20%;"><span style="text-align:center;color:orange;font-size:12px;"><strong>Note:</strong>You can upload up to 7 images in (jpeg,jpg,png,gif) formats for any post. Exceed 7 will not publish your post.</span></td>
          </tr>
          <tr>
            <td><label for="end_date">End Date</label></td>
            <td><input style="<?php if(!empty($errors[17])) echo "border:1px solid red;"; ?>" type="date" name="end_date"
              value="<?php
            if(isset($_POST['end_date'])) echo $_POST['end_date'];
            echo $end_date_update;
             ?>" /></td>
          </tr>
          <tr>
            <td id="submit" colspan="2">
              <input class="submit" type="reset" name="cancel" value="Cancel" />
              <?php if($update == true): ?>
              <input class="submit" type="submit" name="update" value="Update">
              <?php else: ?>
              <input class="submit" type="submit" name="submit" value="Post" />
            <?php endif; ?>
            </td>
          </tr>
        </table>
      </form>
    </div><!--end of sub section -->
  </div><!-- end of section -->
  <?php require '../templates/footer_temp.php';?>
