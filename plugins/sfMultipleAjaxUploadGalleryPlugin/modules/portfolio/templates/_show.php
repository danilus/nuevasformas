<style type="text/css">
.slideshow img{
        max-width: 650px;
        max-height: 500px;
}
#controls{
    margin:-480px auto;
    text-align:center;
    width:160px;
    display: none;
}
#controls .ss-controls .play,#controls .ss-controls .pause,#controls .nav-controls .next,#controls .nav-controls .prev{
    background:url("/sfMultipleAjaxUploadGalleryPlugin/images/controls/play.png") no-repeat scroll 0 0 transparent;
    display:block;
    height:50px;
    width:50px;
    margin:0px 100px;
    position:absolute;
}
#controls .ss-controls .pause{
    background:url("/sfMultipleAjaxUploadGalleryPlugin/images/controls/pause.png") no-repeat scroll 0 0 transparent;
}
#controls .nav-controls .next{
    margin-left:160px;
    background:url("/sfMultipleAjaxUploadGalleryPlugin/images/controls/next.png") no-repeat scroll 0 0 transparent;
}
#controls .nav-controls .prev{
    margin-left:40px;
    background:url("/sfMultipleAjaxUploadGalleryPlugin/images/controls/previous.png") no-repeat scroll 0 0 transparent;
}
#controls .ss-controls .play:hover{
    background:url("/sfMultipleAjaxUploadGalleryPlugin/images/controls/play-hover.png") no-repeat scroll 0 0 transparent;
}
#controls .ss-controls .pause:hover{
    background:url("/sfMultipleAjaxUploadGalleryPlugin/images/controls/pause-hover.png") no-repeat scroll 0 0 transparent;
}
#controls .nav-controls .next:hover{
    background:url("/sfMultipleAjaxUploadGalleryPlugin/images/controls/next-hover.png") no-repeat scroll 0 0 transparent;
}
#controls .nav-controls .prev:hover{
    background:url("/sfMultipleAjaxUploadGalleryPlugin/images/controls/previous-hover.png") no-repeat scroll 0 0 transparent;
}
</style>

<div class="slideshow-container" onmouseover="$('#controls').show();"  onmouseout="$('#controls').hide();">
        <div id="loading" class="loader"></div>
        <div id="slideshow" class="slideshow"></div>
    </div>
<div id="thumbs" class="navigation">
        <ul class="thumbs noscript">
            <?php foreach ($gallery->getPhotos() as $photo) {?>
                <li>
                        <a class="thumb" name="<?php echo $photo->getTitle() ?>" href="../uploads/gallery/thumbnail/300_<?php echo $photo->getPicPath() ?>" title="<?php echo $photo->getTitle() ?>">
                                <img src="../uploads/gallery/thumbnail/50_<?php echo $photo->getPicPath() ?>" alt="<?php echo $photo->getTitle() ?>" />
                        </a>
                        <div class="capti on">
                                <div class="download">
                                        <a href="../uploads/gallery/<?php echo $photo->getPicPath() ?>">Télécharger la photo</a>
                                </div>
                                <div class="image-desc"><?php echo $photo->getTitle() ?></div>
                        </div>
                </li>
<?php } ?>
        </ul>
</div>

<div class="clear"></div>

<div id="gallery" class="content mainContent">
    <div id="controls" class="controls"  onmouseover="$('#controls').show();"  onmouseout="$('#controls').hide();"></div>
    
    <div id="caption" class="caption-container"></div>
</div>