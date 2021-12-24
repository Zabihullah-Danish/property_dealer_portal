<?php  ?>
<link rel="stylesheet" href="<?=baseUrl('dist/css/footer_temp.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <div class="footer-top">
    <div class="footer-mid">
      <div class="footer">
        <div class="footer-section">
          <p><strong>Categories</strong></p>
          <a class="links" href="<?=baseUrl('postmgmt/apartments.php');?>">Apartment</a>
          <a class="links" href="<?=baseUrl('postmgmt/houses.php');?>">House</a>
          <a class="links" href="<?=baseUrl('postmgmt/lands.php');?>">Land</a>
          <p><strong>Info</strong></p>
          <a class="links" href="">About</a>
          <a class="links" href="">Contact</a>
        </div>
        <div class="footer-section">
          <p><strong>Property Types</strong></p>
          <a class="links" href="<?=baseUrl('postmgmt/mortgage.php');?>">Mortgage</a>
          <a class="links" href="<?=baseUrl('postmgmt/rent.php');?>">Rental</a>
          <a class="links" href="<?=baseUrl('postmgmt/sale.php');?>">For Sale</a>
          <div class="social-app">
          <p><strong>Reach Us</strong></p>
            <a class="social" href="#"><i id="fb" class="fab fa-facebook"></i></a>
            <a class="social" href="#"><i class="fab fa-whatsapp"></i></a>
            <a class="social" href="#"><i class="fab fa-twitter"></i></a>
          </div>
        </div>
        <div class="footer-section">
          <?php

          //require 'config/dbconnection.php';

          $sql = "SELECT DISTINCT(province) FROM post";
          $query = mysqli_query($con,$sql);
          ?>
          <p><strong>Provinces</strong></p>
          <?php while($row = mysqli_fetch_assoc($query)): ?>
            <?php
            $province = $row['province'];
            $sql = "SELECT COUNT(province) AS PROVINCES FROM post WHERE province = '$province'";
            $count_query = mysqli_query($con,$sql);
            $pro = mysqli_fetch_assoc($count_query);
            ?>
            <a class="links" href="<?=baseUrl('postmgmt/province.php?pr='.$row['province'])?>"><?php echo ucfirst($row['province']); ?></a>
          <?php endwhile; ?>
        </div>
        <div class="footer-section">
          <p><strong>Locations</strong></p>
          <?php //require 'postmgmt/config/locations.php'; ?>
          <?php
          $sql = "SELECT location FROM post GROUP BY location LIMIT 8";
          $QUERY = mysqli_query($con,$sql);
          ?>
          <?php while($row = mysqli_fetch_assoc($QUERY)): ?>
            <a class="links" href="<?=baseUrl('postmgmt/locations.php?lc='.$row['location'])?>">
              <?php echo ucfirst($row['location']); ?>
            </a>
          <?php endwhile; ?>
        </div>

      </div>
    </div>
    <div class="footer-bottom">
      <div class="footer-label">
        <p>Khana.af &copy; Copyright <?php echo date('Y'); ?> All Rights Reserved</p>
      </div>
    </div>
  </div>
