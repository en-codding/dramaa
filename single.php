<?php 
defined("ABSPATH") || die("!"); 
get_header(); ?>
<div class="pd-expand"></div>
<div class="postbody">
<article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> hentry" itemscope="itemscope" itemtype="http://schema.org/Episode">
	<?php breadcrumb_ts(); ?>
	<?php if(playable_mirror(get_the_ID())){
		get_template_part('template-parts/single/mode','video');
	} else {
		get_template_part('template-parts/single/mode','download');
	}?>
	<?php get_template_part('template-parts/single/series','info'); ?>
	<?php get_template_part('template-parts/single/related','episode'); ?>
	<?php get_template_part('template-parts/single/related','series'); ?>
	<?php if (comments_open()) { ?>
	<div class="bixbox">
		<div class="releases"><h3><span><?php echo GOV_lang::get('comment_label');?></span></h3></div>
		<div class="cmt commentx">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php echo get_post_meta($post->ID, "embed", true); ?>
			<?php comments_template(); ?>
			<?php endwhile; endif; ?>
		 </div>
	</div>
	<?php } ?>

	<meta itemprop="author" content="<?php the_author_meta('display_name', 1); ?>">
	<meta itemprop="datePublished" content="<?php the_time('c'); ?>">
	<meta itemprop="dateModified" content="<?php the_modified_date('c'); ?>">
	<span style="display: none;" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
		<span style="display: none;" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="<?php echo get_option('logo'); ?>">
		</span>
		<meta itemprop="name" content="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	</span>
	</article>
</div>
<script>tsUpdateView(<?php echo get_the_ID(); ?>);</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>