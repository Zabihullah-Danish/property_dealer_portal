<?php require '../templates/header1_temp.php'; ?>



  <head>
    <style>
    .add-images{
      width:1000px;
      margin:auto;
    }
    </style>
  </head>

  <div class="add-images">
    <form action="#" method="POST" enctype="mutipart/form-data">
      <label for="files[]">Select Images</label>
      <input type="file" name="files[]" multiple /><br>
      <input type="submit" name="upload" value="Upload" />
    </form>
  </div>
