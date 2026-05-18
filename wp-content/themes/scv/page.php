<?php get_header(); ?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
    remove_filter('the_content', 'wpautop');
    the_content();
endwhile;
else :
    echo '<p class="no-post">お探しの記事、ページは見つかりませんでした。</p>';
endif;
?>

<script>
$('input[name="category"]').prop('checked', false);
</script>

<?php get_footer(); ?>

<script>

	function getUrlParameter(name) {
		name = name.replace(/[\[\]]/g, "\\$&");
		const regex = new RegExp("[?&]" + name + "=([^&#]*)");
		const results = regex.exec(window.location.href);
		return results ? decodeURIComponent(results[1].replace(/\+/g, " ")) : null;
	}

	window.onload = function() {
		setTimeout(function() {
			const contactService = sessionStorage.getItem('contactService');
			if(contactService && contactService === "no-service"){
				$('input[name="category"]').prop('checked', false);
			} else{
				const services = getUrlParameter('services');
				if(services === "technical-training"){
					$('input[name="category"]').first().prop('checked', true);
				} else if(services === "hr"){
					$('[data-name="category"] .wpcf7-list-item:nth-child(2) input[name="category"]').prop('checked', true);
				} else if(services === "bpo"){
					$('[data-name="category"] .wpcf7-list-item:nth-child(3) input[name="category"]').prop('checked', true);
				} else if(services === "web"){
					$('[data-name="category"] .wpcf7-list-item:nth-child(4) input[name="category"]').prop('checked', true);
				}else if(services === "fdi-support"){
					$('[data-name="category"] .wpcf7-list-item:nth-child(5) input[name="category"]').prop('checked', true);
				} else{
					var dataServices = sessionStorage.getItem('dataServices');
					if(dataServices && dataServices !== ""){
						$('input[name="category"]').each(function(){
							var valService = $(this).val();
							if(valService == dataServices){
								$(this).prop('checked', true);
							}
						})
					} else{
						$('input[name="category"]').last().prop('checked', true);
					}			
				}
			}
			sessionStorage.removeItem('contactService');
		}, 500); 
	};

</script>