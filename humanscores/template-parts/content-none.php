<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Humanscores
 */

?>
	<header class="page-header">
        <h1 class="page-title">
        <?php
        if(is_404()) {
            esc_html_e('Page not available', 'humanscores');
        } else if ( is_search() ) {
            printf( esc_html__('Nothing found for &ldquo;%s&rdquo;', 'humescores'), get_search_query());
        } else {
            esc_html_e('Nothing Found', 'humanscores');
        }
		?>
        </h1>
	</header><!-- .page-header -->

    <section id="primary" class="content-area <?php if( is_404() ) { echo 'error 404'; } else { echo 'no-results'; } ?> not-found">
        <main id="main" class="site-main" role="main">
            <div class="page-content">
                <?php
                if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                    <p><?php
                        printf( wp_kses(
                            /* translators: 1: link to WP admin new post page. */
                                __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'humanscores' ),
                                array( 'a' => array( 'href' => array(), ), ) ), esc_url( admin_url( 'post-new.php' ) ) );
                        ?>
                    </p>

                <?php elseif ( is_search() ) : ?>

                    <p>
                        <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'humanscores' ); ?>
                    </p>
                    <?php get_search_form(); ?>

                <?php elseif ( is_404() ) : ?>

                    <p>
                        <?php esc_html_e( 'You seem to be lost. To find what you are looking for.', 'humanscores' ); ?>
                    </p>
                    <?php get_search_form(); ?>

                <?php else : ?>

                    <p>
                        <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'humanscores' ); ?>
                    </p>
                    <?php get_search_form(); ?>

                <?php endif; ?>
            </div><!-- .page-content -->

            <?php if (is_404() || is_search()) : ?>
                <h2 class="page-title secondary-title">
                    <?php esc_html_e('Most recent posts', 'humanscores'); ?>
                </h2>
            <?php
            $args = array(
                    'posts_per_page' => 6
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
        </main><!-- #main -->
    </section><!-- primary -->

<?php
get_sidebar();
get_footer();