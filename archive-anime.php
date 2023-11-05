<?php get_header(); ?>
<div class="postbody">
<div class="bixbox bixboxarc bbnofrm">
	<div class="releases"><h1><span><?php echo GOV_lang::get('anime_list_archive');?></span></h1></div>
		   <div class="mrgn">
			<?php echo do_shortcode('[lists]'); ?>
</div>
<div class="clear"></div>
</div>
<?php get_sidebar(); ?>
<script>$(".section .quickfilter").parent().remove()</script>
<?php get_footer(); ?>