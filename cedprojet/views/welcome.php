<?php ob_start() ?>
<div class="container">
  <img src="images/nouvauté.gif" alt="new" style="width: 10%; display: block; margin-left: auto; margin-right: auto">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/figurines/dva.jpg" alt="dva" style="width: 43%; margin-left: auto; margin-right: auto;">
      </div>

      <div class="item">
        <img src="images/figurines/black_panther.jpg" alt="black_panther" style="width: 40%; margin-left: auto; margin-right: auto;">
      </div>

      <div class="item">
        <img src="images/figurines/iron_man.jpg" alt="iron_man" style="width: 40%; margin-left: auto; margin-right: auto;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<?php
$title = '';
$content = ob_get_clean();
include 'includes/layout.php';
?>
