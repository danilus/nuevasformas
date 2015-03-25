<?php $modulo= $sf_context->getModuleName(); ?>

<div id="general-menu">
  <div class="item"><?php echo link_to('Home', '@homepage', array('class' => ($modulo=='home')?'active':'')); ?></div>
  <div class="item"><?php echo link_to('Muebles', '@muebles', array('class' => ($modulo=='muebles')?'active':'')); ?></div>
  <div class="item"><?php echo link_to('Qué hacemos', '@que_hacemos', array('class' => ($modulo=='que_hacemos')?'active':'')); ?></div>
  <div class="item"><?php echo link_to('Contacto', '@contacto', array('class' => ($modulo=='contacto')?'active':'')); ?></div>
  <div id="data-fiscal">
		<img src="/images/data_fiscal_w110.png">
	</div>
</div>