<?php 
defined("ABSPATH") || die("!");
get_header(); 
$casts = new TS_Cast(get_the_ID());
?>

<div class="postbody">
<article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> hentry" itemscope="itemscope" itemtype="http://schema.org/CreativeWorkSeries">
	<?php breadcrumb_ts(); ?>	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php 
	$latestx = get_post_meta(get_the_ID(),'ero_latestid',true); 
	$score = get_post_meta( get_the_ID(), 'ero_skor', true );
	$images = rwmb_meta( 'ero_cover','type=image&size=full' );
	$trating = get_option('tsrating',1);
	?>
	<div class="bixbox animefull">
		
		<?php 
			if (is_array($images) && sizeof($images)) {
			$image = end($images); ?>
			<div class="bigcover">
				<div class="ime">
					<a href="#/" class="lnk"></a>
					<img src="<?php echo esc_url( $image['url'] ); ?>"  alt="<?php echo esc_attr( $image['alt'] ); ?>"/>
				</div>
				<a href="#/" class="gp"><i class="far fa-play-circle" aria-hidden="true"></i></a>
			</div>
		<?php } ?>
		
		<div class="bigcontent<?php if(!$score){echo ' noscr';} if(!$images){echo ' nobigcv'; } ?>">
			<div class="thumbook">
			<div class="thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<?php echo GOV_anime::get_post_thumbnail(get_the_ID(), "medium_large", 350, 247, array('itemprop'=>'image')); ?>
			</div>
			<div class="rt">
				<?php if($trating && $score) { ?>
				<div class="rating">
					<?php
					if(!$score || ! is_numeric($score)){ $score = '0.0';}
					$scorepros = $score * 10;
					if($score){ ?>
					<strong><?php echo GOV_lang::get('series_info_rating_label', ["rating" => $score]);?></strong>
					<div class="rating-prc" itemscope="itemscope" itemprop="aggregateRating" itemtype="//schema.org/AggregateRating">
						<meta itemprop="ratingValue" content="<?php echo $score; ?>">
						<meta itemprop="worstRating" content="1">
						<meta itemprop="bestRating" content="10">
						<meta itemprop="ratingCount" content="10">
						<div class="rtp">
							<div class="rtb"><span style="width:<?php echo $scorepros; ?>%"></span></div>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if(get_option('traileranime')){ $trailer = get_post_meta(get_the_ID(),'ero_trailer',true); if($trailer){ ?>
					<a data-fancybox href="https://www.youtube.com/watch?v=<?php echo $trailer; ?>" class="trailerbutton">
					<i class="fab fa-youtube"></i> <?php echo GOV_lang::get('series_trailer_label'); ?>
					</a>
				<?php } } ?>
				<?php if (GOV_bookmark::is_enabled()) { ?>
					<div data-id="<?php echo get_the_ID();?>" class="bookmark">
						<i class="far fa-bookmark" aria-hidden="true"></i> Bookmark
					</div>
					<?php $bc = get_post_meta(get_the_ID(),'ero_bookmark_count',true); if($bc){ ?>
						<div class="bmc"><?php echo GOV_lang::get('series_bookmarked_by', ['count' => $bc]);?></div>
					<?php } ?>
				<?php } ?>
			</div>
			</div>
			<div class="infox">
				<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>

				<div <?php if($post->post_content == '') { echo 'class="entry-content" itemprop="description"'; } else { echo 'class="ninfo"'; } ?>>
				<div class="mindesc">
					<?php echo GOV_lang::get("series_bottom_keyword_text", ["post_title" => get_the_title(get_the_ID()),"sitename"=>get_bloginfo('name')]); ?>
				</div>
				<?php $meta = get_post_meta( get_the_ID(), 'ero_japanese', true ); if($meta){ ?><span class="alter"><?php echo $meta; ?></span><?php } ?>
				<div class="info-content">
				<div class="spe">
					<?php $meta = get_post_meta( get_the_ID(), 'ero_status', true ); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_status_label');?>:</b> <?php rwmb_the_value('ero_status'); ?></span><?php } ?>
					<?php echo get_the_term_list( get_the_ID(), 'network', '<span><b>'. GOV_lang::get('series_info_network_label') .':</b> ', ', ', '</span>' ); ?>
					<?php echo get_the_term_list( get_the_ID(), 'studio', '<span><b>'. GOV_lang::get('series_info_studio_label') .':</b> ', ', ', '</span>' ); ?>
					<?php $meta = get_post_meta( get_the_ID(), 'ero_tayang', true ); if($meta){ ?><span class="split"><b><?php echo GOV_lang::get('series_info_released_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php $meta = get_post_meta( get_the_ID(), 'ero_durasi', true ); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_duration_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php echo get_the_term_list( get_the_ID(), 'season', '<span><b>' . GOV_lang::get('series_info_season_label') . ':</b> ', ', ', '</span>' ); ?>
					<?php echo get_the_term_list( get_the_ID(), 'country', '<span><b>'. GOV_lang::get('series_info_country_label') .':</b> ', ', ', '</span>' ); ?>
					<?php $meta = get_post_meta( get_the_ID(), 'ero_type', true ); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_type_label');?>:</b> <?php rwmb_the_value('ero_type'); ?></span><?php } ?>
					<?php $meta = get_post_meta( get_the_ID(), 'ero_episode', true ); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_total_episodes_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php $meta = get_post_meta( get_the_ID(), 'ero_fansub', true ); if($meta){ ?><span class="split"><b><?php echo GOV_lang::get('series_info_fansub_label');?>:</b> <?php echo $meta; ?></span><?php } ?>
					<?php $cenxor = get_option('censorx'); if($cenxor=='1'){ $meta = get_post_meta( get_the_ID(), 'ero_censor', true ); if($meta){ ?><span><b><?php echo GOV_lang::get('series_info_censor_label');?>:</b> <?php rwmb_the_value('ero_censor'); ?></span><?php } } ?>
					<?php echo get_the_term_list( get_the_ID(), 'director', '<span class="split"><b>'. GOV_lang::get('series_info_director_label') .':</b> ', ', ', '</span>' ); ?>
					<?php $vochar = get_option('charvoice'); if($vochar!='1'){ echo $casts->get_casts_list('<span class="split"><b>'. GOV_lang::get('series_info_casts_label') .':</b> ', '</span>', '<a class="casts" href="{{link}}">{{name}}</a>', ', '); } ?>
					<?php //$vochar = get_option('charvoice'); if($vochar!='1'){ echo get_the_term_list( get_the_ID(), 'cast', '<span><b>' . GOV_lang::get('series_info_casts_label') . ':</b> ', ', ', '</span>' ); } ?>
					<span class="author vcard"><b><?php echo GOV_lang::get('series_info_posted_by_label')?>:</b> <i class="fn"><?php $author_id = get_post_field( 'post_author', get_the_ID() ); echo get_the_author_meta('display_name', $author_id); ?></i></span>
					<span class="split"><b><?php echo GOV_lang::get('series_info_posted_on_label');?>:</b> <time itemprop="datePublished" datetime="<?php the_time('c'); ?>" class="updated"><?php the_time('F j, Y'); ?></time></span>
				<span class="split"><b><?php echo GOV_lang::get('series_info_updated_on_label');?>:</b> <time itemprop="dateModified" datetime="<?php the_modified_date('c'); ?>"><?php the_modified_date('F j, Y'); ?></time></span>
				</div>
				<?php echo get_the_term_list( get_the_ID(), 'genres', '<div class="genxed">', ' ', '</div>' ); ?>
				<div class="desc">
					<?php echo GOV_lang::get("series_new_bottom_keyword_text", ["post_title" => get_the_title(get_the_ID()),"sitename"=>get_bloginfo('name')]); ?>
				</div>
				</div>
				</div>
			</div>
		</div>
		<?php echo get_the_term_list( get_the_ID(), 'post_tag', '<div class="bottom tags">', ' ', '</div>' ); ?>
	</div>
	
	<?php if(get_option('seriessocial')=='1'){ get_template_part('template-parts/general/social-share'); } ?>
	
	<?php $warning = get_post_meta(get_the_ID(),'ero_mature',true); if($warning=='Yes'){ ?>
	<div class="warning">
		<?php echo GOV_lang::get('series_warning');?>
	</div>
	<?php } ?>
	<?php if($post->post_content) { ?>
	<div class="bixbox synp">
		<div class="releases"><h2><?php echo GOV_lang::get('series_info_synopsis_label', ["title" => get_the_title()]);?></h2></div>
		<div class="entry-content" itemprop="description">
			<?php the_content(); ?>
		</div>
	</div>
	<?php } endwhile; endif; ?>
	<?php if(get_option('galleryanime')=='1'){ $images = rwmb_meta('ero_gallery'); if($images){ ?>
	<div class="bixbox image-list">
		<div class="releases"><h2><?php echo GOV_lang::get('series_gallery_label', ["post_title" => get_the_title()]);?></h2></div>
		<div id="gallery"  class="owl-carousel">
			<?php
				foreach ( $images as $image ) {
					echo '<a href="', $image['full_url'], '"><img src="', $image['full_url'], '"></a>';
				} ?>
		</div>
	</div>
	<?php } } ?>
	
	<?php if(get_option('charvoice')!=='0'){ if($casts->get_meta()){ ?>
	<div class="bixbox charvoice">
		<div class="releases"><h2><?php echo GOV_lang::get('char_voice');?></h2></div>
		<div class="cvlist">
			<?php foreach($casts->get() as $k => $v){
				$char = $v->character();
				$va = $v->voiceactor();
				if ( ! $char->name()) continue;
				?>
				<div class="cvitem">
					<div class="cvitempad">
						<div class="cvsubitem cvchar">
							<div class="cvcover">
								<img onerror="return ts_cast_img_onerror(this);" src="<?php echo $char->image();?>" width="45" height="70" />
							</div>
							<div class="cvcontent">
								<span class="charname"><?php echo $char->name();?></span>
								<span class="charrole"><?php echo $char->role();?></span>
							</div>
						</div>

						<?php if ($va->name()){ ?>
						<div class="cvsubitem cvactor">
							<div class="cvcover">
								<?php if ($va->link()) { ?>
									<a href="<?php echo $va->link(); ?>"><img onerror="return ts_cast_img_onerror(this);" src="<?php echo $va->image();?>" width="45" height="65" /></a>
								<?php } else { ?>
									<img onerror="return ts_cast_img_onerror(this);" src="<?php echo $va->image();?>" width="45" height="70" />
								<?php } ?>
							</div>
							<div class="cvcontent">
								<span class="charname">
									<?php if ($va->link()) { ?>
										<a href="<?php echo $va->link(); ?>"><?php echo $va->name();?></a>
									<?php } else { ?>
										<?php echo $va->name();?>
									<?php } ?>
								</span>
								<span class="charrole"><?php echo $va->role();?></span>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php } } ?>
	
	<?php series_batch_links(get_the_ID()); ?>
	<?php 
		$epid = get_post_meta(get_the_ID(),'ero_latestid',true);
		$epl = get_post_meta(get_the_ID(),'ero_latest',true);
	?>
	<div class="bixbox bxcl epcheck">
		<div class="releases"><h2><?php echo GOV_lang::get('series_episode_list', ["post_title" => get_the_title()]);?></h2></div>
		<?php if(get_option('firstnewepisode')=='1'){ ?>
		<div class="lastend">
				<div class="inepcx">
					<a href="#">
						<span><?php echo GOV_lang::get('series_first_episode_label'); ?></span>
						<span class="epcur epcurfirst"><?php echo GOV_lang::get('series_first_last_label'); ?> 1</span>
					</a>
				</div>
				<div class="inepcx">
					<a href="<?php echo get_permalink($epid); ?>">
						<span><?php echo GOV_lang::get('series_new_episode_label'); ?></span>
						<span class="epcur epcurlast"><?php echo GOV_lang::get('series_first_last_label'); ?> <?php echo $epl; ?></span>
					</a>
				</div>
		</div>
		<?php } ?>
		<div class="eplister">
		<div class="ephead">
			<div class="eph-num"><?php echo GOV_lang::get('series_episode_number'); ?></div>
			<div class="eph-title"><?php echo GOV_lang::get('series_episode_title'); ?></div>
			<?php if(get_option('eplsub')=='1'){ ?><div class="eph-sub"><?php echo GOV_lang::get('series_episode_sub'); ?></div><?php } ?>
			<div class="eph-date"><?php echo GOV_lang::get('series_episode_date'); ?></div>
		</div>
		<ul>
			<?php 
			GOV_cache::fragment_cache("anime-eplist-" . get_the_ID(), (3600 *  24 * 1), function(){
				epls(basename(get_permalink()), 'DESC', 5000, 'F j, Y'); 
			});
			?>
		</ul>
		</div>
	</div>
	<script>
		if(jQuery('.epcheck li').length < 1) jQuery('.epcheck').hide();

	</script>
	
	<?php if (comments_open()) { ?>
	<div class="bixbox">
		<div class="releases"><h3><span><?php echo GOV_lang::get('comment_label');?></span></h3></div>
		<div class="cmt commentx">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php echo get_post_meta($post->ID, "anime", true); ?>
			<?php comments_template(); ?>
			<?php endwhile; endif; ?>
		 </div>
	</div>
	<?php } ?>

	<?php
	if(get_option('relatedseriesanime')=='1'){
	$terms = get_the_terms( $post->ID , 'genres', 'string');
	if($terms){ ?>
	<?php
	$metas = get_the_ID();
	$term_ids = wp_list_pluck($terms,'term_id');
	$term_ids = array_slice($term_ids, 0, 2);
	$args=array(
	'post_type' => 'anime',
	'tax_query' => array(
                    array(
                        'taxonomy' => 'genres',
                        'field' => 'id',
                        'terms' => $term_ids,
                        'operator'=> 'AND'
                     )),
	'post__not_in' => array($metas),
	'posts_per_page'=> 5,
	'orderby' => 'rand',
	'ignore_sticky_posts'=>1
	);
	$my_query = new wp_query( $args );
	?>
	<?php if( $my_query->have_posts() ) { ?>
	<div class="bixbox">
		<div class="releases"><h3><span><?php echo GOV_lang::get('recommended_series');?></span></h3></div>
		<div class="listupd">
			<?php while( $my_query->have_posts() ) { $my_query->the_post(); get_template_part('template-parts/general/main'); } ?>
		</div>
	</div>
	<?php } wp_reset_query(); ?>
	<?php } } ?>
	</article>
	</div>
<?php if (GOV_bookmark::is_enabled()){ ?>
<script>
BOOKMARK.check();
BOOKMARK.listener();
</script> 
<?php } ?>
<script>ts_set_first_ep();</script>
<script>tsUpdateView(<?php echo get_the_ID(); ?>);</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>