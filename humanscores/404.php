<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Humanscores
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'humanscores' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'humanscores' ); ?></p>

					<?php
						get_search_form();
					?>
				</div><!-- .page-content -->

                <?php if (is_404() || is_search()) : ?>
                    <h2 class="page-title secondary-title">
                        <?php esc_html_e('Most recent posts', 'humanscores'); ?>
                    </h2>
                    <?php
                    $args = array(
                        'posts_per_page' => 3
                    );

                    $latest_posts_query = new WP_Query($args);
                    //the loop
                    if ($latest_posts_query->have_posts()) {
                        while ($latest_posts_query->have_posts()){
                            $latest_posts_query->the_post();
                            //Get the standard index page content
                            get_template_part('template-parts/content', get_post_format());
                        }
                        /*restore original Post Data*/
                        wp_reset_postdata();
                    } //endif
                endif; ?>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
