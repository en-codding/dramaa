<?php defined("ABSPATH") || die("!"); ?>
<li data-index="<?php echo $count; ?>">
    <a href="<?php echo $permalink;?>">
        <div class="epl-num"><?php echo $episode_number; ?></div>
        <div class="epl-title"><?php echo $episode_title; ?></div>
        <?php if ($show_sub) {?><div class="epl-sub"><span class="status <?php echo $episode_sub; ?>"><?php echo $episode_sub_ln; ?></span></div><?php }?>
        <div class="epl-date"><?php echo $episode_date;?></div>
    </a>
</li>