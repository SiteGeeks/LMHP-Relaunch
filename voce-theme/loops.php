<?php
/*
* Conditional statements that declare what loops will be used in what location
*/
if ( ! function_exists( 'voce_content' )) {
// voce_content() BEGINS here - This sets up the content loop system
	function voce_content() {
		global $options;
		?>
		<div id="content" class="site-content border-box clearfix">
			<?php
			if (!dynamic_loop()) :
				if (have_posts()) {

					if (is_home()) {

						voce_before_content_column_home_output();

						while (have_posts()) {
							the_post();
							get_template_part('templates/content', get_post_format());
						}

						voce_pagination_type();

						voce_after_content_column_home_output();
					
					} elseif (is_singular() && !is_attachment()) {

						voce_before_content_column_posts_output();

						//$postformat = (get_post_format() ? get_post_format() : 'single');

						while (have_posts()) {
							the_post();
							if (has_post_format()){
								get_template_part('templates/content', get_post_format());
							} else {
								get_template_part('templates/content', get_post_type());
							}
						}

						voce_after_content_column_post_output();
					
					} /*elseif (is_page()) {

						while (have_posts()) {
							the_post();
							get_template_part('templates/content', 'page');
						}

					} */elseif (is_search()) {

						get_template_part('templates/content', 'search');

					} elseif (is_archive()) {

						voce_before_content_column_archive_output();

						get_template_part('templates/content', 'archive');

						voce_after_content_column_archive_output();

					} elseif (is_attachment()) {

						while (have_posts()) {
							the_post();
							get_template_part('templates/content', 'attachment');
						}

					} else {

						while (have_posts()) {
							the_post();
							get_template_part('templates/content', get_post_format());
						}
					}
				} else {
					get_template_part('templates/no-results', 'index');
				}
			?>
		</div>
	<?php
		endif;
	}
// voce_content() ENDS here
}