<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav class="load_more btn d-block w-100 btn-light text-upercase mb-4">
		<?php next_posts_link('Ver mais'); ?>
	</nav>
<?php endif;  ?>

<script type="text/javascript">
function vermaisClick (e)  {
    e.preventDefault();
    var link = jQuery('.load_more a').attr('href');
    jQuery('.load_more').html('<span class="loader">Carregando postagens...</span>');
    $.get(link, function(data) {
       var post = $(".list .col-12 ", data);
       $('.list').append(post);
       jQuery('.load_more').load(link + ' .load_more a', null, function(){
          jQuery('.load_more a').on('click', vermaisClick);
       });
    });
}
                
jQuery(document).ready(function() {
    jQuery('.load_more a').on('click', vermaisClick);
});

</script>

<style>
	.load_more a {
		color: black;
	}
</style>
