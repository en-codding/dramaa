<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width" />
<?php $metac = get_option('themecolor'); if($metac==''){$metac='#0c70de';} ?>
<meta name="theme-color" content="<?php echo $metac; ?>">
<meta name="msapplication-navbutton-color" content="<?php echo $metac; ?>">
<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo $metac; ?>">
<?php wp_head(); ?>
</head>
<?php 
$genstyle = get_option('genstyle');
if($genstyle == '2'){
	$dftheme = 'darkmode';
} else {
	$dftheme = get_option('defaulttheme');
} ?>
<body class="<?php echo $dftheme; if ($genstyle == '2') { echo ' styletwo'; } ?>" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php if ($genstyle !== '2') { ?>
<script>
			if (localStorage.getItem("thememode") == null){
				if (defaultTheme == "lightmode"){
					jQuery("body").addClass("lightmode");
					jQuery("body").removeClass("darkmode");
				}else{
					jQuery("body").addClass("darkmode");
					jQuery("body").removeClass("lightmode");
				}
			}else if (localStorage.getItem("thememode") == "lightmode"){
				jQuery("body").addClass("lightmode");
				jQuery("body").removeClass("darkmode");
			}else{
				jQuery("body").addClass("darkmode");
				jQuery("body").removeClass("lightmode");
			}
	</script>
<?php } ?>
<div id='shadow'></div>

<?php if (get_option('genstyle') == '2') {
	get_template_part('template-parts/header/header','2');
} else {
	get_template_part('template-parts/header/header','1');
} ?>

<?php if(is_home()){ $kln = get_option('toprec'); if($kln) { ?><div class="blox mlb kln"><?php echo $kln; ?></div><br/><?php } } ?>

<div id="content">
	<div class="wrapper">
		<?php $ann = get_option('anngeneral'); if($ann) { ?><div class="announ"><?php echo $ann; ?></div><?php } ?>