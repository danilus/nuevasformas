<?php foreach ($sections as $section_tmp): ?>
  <div class="item"><?php echo link_to($section_tmp->getTitle(), '@muebles?section='.$section_tmp->getUrl_name(), array('class' => ($act_section==$section_tmp->getTitle())?'active':'')); ?></div>  
<?php endforeach; ?>