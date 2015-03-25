<div class="model-details">

  <div class="anchor-titles">
    <h2 class="category"><?php echo $selected_model->getCategory()->getName(); ?></h2>
    <span class="separator"> > </span>
    <h3 class="model"><?php echo $selected_model; ?></h3>
  </div>
  
  <div class="data">
    <img src="/uploads/gallery/thumbnail/500_<?php echo $image->getPicpath(); ?>" height="<?php echo $img->getHeight(); ?>" width="<?php echo $img->getWidth(); ?>" />
<!--    <div class="description" style="width:<?//=$img->getWidth()?>px;"><?//=$selected_model->getDescription()?></div>-->
    <div class="info">
      <div class="description"><?php echo nl2br($selected_model->getDescription()); ?></div>
<!--      <div class="price">Precio: $<?=$selected_model->getPrice()?></div> -->
    </div>
  </div>
  
</div>