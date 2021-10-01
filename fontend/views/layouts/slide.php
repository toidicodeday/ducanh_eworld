<style>
	<?php foreach($slides as $slide) : ?>
		.bg-<?php echo $slide['id'] ?> {
			background: url('<?php echo "../backend/assets/images/slides/" . $slide['avatar']; ?>');
            /*width: 1200px;*/
            height: 350px;
		}
	<?php endforeach ?>
</style>
<?php foreach($slides as $slide) : ?>
<!-- Begin Single Slide Area -->
<div class="single-slide align-center-left  animation-style-01 bg-<?php echo $slide['id'] ?>">
    <div class="slider-progress"></div>
    <div class="slider-content">
        <div class="default-btn slide-btn">
            <a class="links mt-40" href="#">Shopping Now</a>
        </div>
    </div>
</div>
<!-- Single Slide Area End Here -->
<?php endforeach ?>