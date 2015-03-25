<? include_partial('global/menu') ?>

<div id="central-display">
  <div id="models">
    <div class="anchor-titles">
      <h2 class="category"><?=$selected_category->getName()?></h2>
    </div>
    <div class="h-carousel" alt="3">
      <div class="control-container">
        <a class="control ant" href="javascript:void(0);" alt="1">ANT</a>
      </div>
      <div class="mascara" alt="188">
        <div class="contenedor" alt="3">
          <? foreach($selected_category->getSortedModels() as $model): ?>
            <div class="item">
              <a href="<?=url_for('@model_details?slug='.$model->getSlug())?>" class="ampliar<? if($model->id == $selected_model->id) echo " foreign-link" ?>" rel="galeria-<?=$model->id?>">
                <?=image_tag('/uploads/models/'.$model->getCoverImg(), array('class'=>'image'))?>
              </a>

              <? foreach($model->Photos as $k => $image): ?>
                <? if($k != 0): ?>
                  <a href="<?=url_for('@model_details?slug='.$model->getSlug().'&image_id='.$image->id)?>" class="ampliar" rel="galeria-<?=$model->id?>"></a>
                <? endif ?>
              <? endforeach ?>
            </div>
          <? endforeach ?>
        </div>
      </div>
      <div class="control-container">
        <a class="control sig" href="javascript:void(0);" alt="<?=count($selected_category->getModels())?>">SIG</a>
      </div>
    </div>
  </div>
</div>

<div id="bottom-display">
  <div id="categories">
    <div class="h-carousel" alt="7">
      <div class="control-container">
        <a class="control ant" href="javascript:void(0);" alt="1"></a>
      </div>
      <div class="mascara" alt="118">
        <div class="contenedor" alt="7">
          <? foreach($categories as $cat): ?>
            <div class="item">
              <h3 class="name"><?=$cat->getName()?></h3>
              <a href="<?=url_for('@category?slug='.$cat->getSlug())?>" class="<?=($cat->id==$selected_category->id)?'active':''?>">
                <?=image_tag('/uploads/categories/'.$cat->cover_img, array('class'=>'image'))?>
              </a>
            </div>
          <? endforeach; ?>
        </div>
      </div>
      <div class="control-container">
        <a class="control sig" href="javascript:void(0);" alt="<?=count($categories)?>"></a>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
	    function check_controls_to_activate(elem) {
	    	  var items_pass = parseInt(elem.parents(".h-carousel").attr("alt"));
	    	  var cant_items_shown = parseInt(elem.find(".contenedor").attr("alt"));
          var item_pointer = parseInt(elem.find(".ant").attr("alt"));
          var cant_items = parseInt(elem.find(".sig").attr("alt"));
          
          if(item_pointer==1 || cant_items<=cant_items_shown) {
        	    elem.find(".ant").addClass('inactive');
          } else {
        	    elem.find(".ant").removeClass('inactive');
          }
          
          if(cant_items<=item_pointer+cant_items_shown-1 || cant_items<=cant_items_shown) {
        	    elem.find(".sig").addClass('inactive');
          } else {
        	    elem.find(".sig").removeClass('inactive');
          }
      }

	    $(".h-carousel").each(function() {
	    	  check_controls_to_activate($(this));
	    })
      
      	    
      $(".ant").click(function(e) {
          e.preventDefault();
          e.stopPropagation();
          var items_pass = parseInt($(this).parents(".h-carousel").attr("alt"));
          var item_w = $(this).parents(".h-carousel").find(".mascara").attr("alt");
          if($(this).attr("alt") > 1) {
              $(this).parents(".h-carousel").find(".contenedor").animate({"left": "+="+item_w*items_pass+"px"}, 1500);
              $(this).attr("alt", $(this).attr("alt") - items_pass);
              check_controls_to_activate($(this).parents(".h-carousel"));
          }
      });
    
      $(".sig").click(function(e) {
          e.preventDefault();
          e.stopPropagation();
          var items_pass = parseInt($(this).parents(".h-carousel").attr("alt"));
          var item_w = $(this).parents(".h-carousel").find(".mascara").attr("alt");
          if(parseInt($(this).parents(".h-carousel").find(".ant").attr("alt")) + parseInt($(this).parents(".h-carousel").find(".contenedor").attr("alt")) < parseInt($(this).attr("alt")) + items_pass) {
          	  $(this).parents(".h-carousel").find(".contenedor").animate({"left": "-="+item_w*items_pass+"px"}, 1500);
          	  $(this).parents(".h-carousel").find(".ant").attr("alt", parseInt($(this).parents(".h-carousel").find(".ant").attr("alt")) + items_pass);
        	    check_controls_to_activate($(this).parents(".h-carousel"));
          }
      });

      <?// if(true): ?>
/*          $("a.foreign-link").click(); */
      <?// endif ?>
  })
</script>