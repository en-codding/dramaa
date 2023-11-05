<?php 
defined('ABSPATH') || die();
$target = $_POST["id"]; 
if(! is_numeric($target)) die();
GOV_cache::fragment_cache("tooltip_cache_{$target}", 3600 * 24 * 30, function() use ($target){ ?>
	<div class="ingfo">
		<div class="iftitle">
			<?php echo get_the_title($target); ?>
		</div>
		<div class="minginfo">
			<?php $trating = get_option('tsrating',1); $score = get_post_meta( $target, 'ero_skor', true ); if($trating && $score) { ?>
			<span class="l"><i class="fa fa-star" aria-hidden="true"></i> <?php echo $score; ?></span>
			<?php } ?>
			<?php $duration = get_post_meta( $target, 'ero_durasi', true ); if($duration){ ?>
			<span class="l"><?php echo $duration; ?></span>
			<?php } ?>
			<?php $type = get_post_meta( $target, 'ero_type', true ); if($type){ ?>
			<span class="r <?php echo $type; ?>"><?php echo $type; ?></span>
			<?php } ?>
		</div>
		<div class="ingdesc">
			<div class="contexcerpt"><?php echo get_the_excerpt($target); ?></div>
		</div>
		<div class="linginfo">
			<?php $meta = get_post_meta( $target, 'ero_status', true ); if($meta){ ?>
			<span><b><?php echo GOV_lang::get('series_info_status_label');?>:</b> <?php rwmb_the_value( 'ero_status', '', $target ); ?></span>
			<?php } ?>
			<?php echo get_the_term_list( $target, 'genres', '<span><b>'. GOV_lang::get('series_info_genres_label').':</b> ', ', ', '</span>' ); ?>
			<?php echo get_the_term_list( $target, 'studio', '<span><b>'. GOV_lang::get('series_info_studio_label').':</b> ', ', ', '</span>' ); ?>
		</div>
		<div class="bungton">
			<a href="<?php echo get_permalink($target); ?>">
				<i class="fas fa-info-circle"></i> <?php echo GOV_lang::get('tooltip_more');?>
			</a>
		</div>
	</div>
<?php }); ?>