<?php include_partial('global/menu'); ?>

<div id="central-display">

<?php foreach($sections as $section): ?>
  <div class="home-module">
  <!-- <div class="home-module en-construccion"> -->
    <h2 class="title"><?php echo $section->getTitle(); ?></h2>
    <!-- <span class="aclaracion">(en construcción)</span> -->
    <?php echo link_to(image_tag('/uploads/sections/'.$section->getCover_img()), '@muebles?section='.$section->getUrl_name()); ?>
    <?php // echo image_tag('/uploads/sections/'.$section->getCover_img()); ?>
  </div>
<?php endforeach; ?>

</div>