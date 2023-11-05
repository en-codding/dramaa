<div class="clear"></div>
</div>
</div>

<?php $gensty = get_option('genstyle'); 
	if($gensty=='2') { 
		get_template_part('template-parts/footer/footer','2'); 
	} else { 
		get_template_part('template-parts/footer/footer','1'); 
} ?>

<?php wp_footer(); ?>
<?php if(is_home()) { if (get_option('genstyle') == '2') { ?>
<script>
      var swiper = new Swiper(".swiper-container", {
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
		loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".paging .next",
          prevEl: ".paging .prev",
        },
      });
</script>
<?php } } ?>
</body>
</html>