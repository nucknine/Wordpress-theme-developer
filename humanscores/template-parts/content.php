<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Humanscores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(has_post_thumbnail()) : ?>
        <figure class="featured-image index-image">
            <a href="<?=esc_url( get_permalink() )?>" rel="bookmark">
            <?php the_post_thumbnail('humanscores-index-img');?>
            </a>
        </figure>
    <?php endif; ?>
    <div class="post-content">
        <header class="entry-header">
            <?php humanscores_get_category_list(); ?>
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;

            if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php
                humanscores_posted_on();
                ?>
            </div><!-- .entry-meta -->
            <?php
            endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
                $length_setting = get_theme_mod('length_setting');

                if( $length_setting === 'excerpt')
                    the_excerpt();
                else the_content();
            ?>
            <div class="continue-reading">
                <?php
                $read_more_link = sprintf(
                    wp_kses(
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'humanscores' ),
                        array('span' => array('class' => array(),))
                    ),
                    get_the_title()
                );
                ?>
                <a href="<?=esc_url( get_permalink() )?>" rel="bookmark">
                    <?=$read_more_link?>
                </a>
            </div>
        </div><!-- .entry-content -->


    </div><!-- .post-content -->
</article><!-- #post-the_ID() -->
