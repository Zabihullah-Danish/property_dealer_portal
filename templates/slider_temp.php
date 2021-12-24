<?php// require 'config/config.php'?>
<link rel="stylesheet" href="<?=baseUrl('dist/css/slider.css'); ?>" />
      <div class="slider">
          <div class="pic">

              <div class="slideshow-container">

                <div class="mySlides fade">
                  <div class="numbertext">1 / 4</div>
                  <img class="slide-img" src="<?=baseUrl('dist/images/apartment.jpg');?>" style="width:100%;height:350px;">
                  <div class="text"><h1>Apartment</h1></div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">2 / 4</div>
                  <img class="slide-img" src="<?=baseUrl('dist/images/house.jpg');?>" style="width:100%;height:350px;">
                  <div class="text"><h1>House</h1></div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">3 / 4</div>
                  <img class="slide-img" src="<?=baseUrl('dist/images/office.jpg');?>" style="width:100%;height:350px;">
                  <div class="text"><h1>Office</h1></div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">4 / 4</div>
                  <img class="slide-img" src="<?=baseUrl('dist/images/land.jpg');?>" style="width:100%;height:350px;">
                  <div class="text"><h1>Lands</h1></div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

              </div>
                <br>
                <!-- <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span>
                  <span class="dot" onclick="currentSlide(2)"></span>
                  <span class="dot" onclick="currentSlide(3)"></span>
                </div> -->
          </div>
        </div>
<script src="<?=baseUrl('dist/js/slider.js');?>"></script>
