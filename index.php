<?php defined("ABSPATH") || die("!"); ?>
<?php get_header(); ?>

<div class="postbody">
	<?php $gensty = get_option('genstyle'); 
	if($gensty=='2') { 
		get_template_part('template-parts/slider/slider','2'); 
	} else { 
		ts_slider(); 
	} ?>
	<?php get_template_part('template-parts/home/home','hot'); ?>
	<?php get_template_part('template-parts/home/home','latest'); ?>
	<?php echo do_shortcode(get_option('schome')); ?>
	<?php get_template_part('template-parts/home/home','random-genres'); ?>
	<?php get_template_part('template-parts/home/home','blog'); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>