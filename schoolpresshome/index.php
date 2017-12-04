<?php get_header(); ?>

<section class="recent-post">
    <div class="wrapper">
    <?php echo get_breadcrumbs(); ?>
        <div class="recent-post-title animate-box">
          <h2 class="recent-post-title__title">Последние публикации
          </h2>
          <p class="recent-post-title__text">Задача организации, в особенности же реализация намеченных плановых заданий представляет собой интересный эксперимент проверки форм развития.
          </p>
        </div>
        <div class="post-container">
            <!-- Blog Content -->
            <div class="blog-content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php ale_part('postpreview' );?>
                <?php endwhile; else: ?>
                    <?php ale_part('notfound')?>
                <?php endif; ?>
            </div>
        </div>
        <div class="pagination">
            <div class="pagination-left">
                <?php //echo get_previous_posts_link();
                if(get_previous_posts_link()) {
                    echo get_previous_posts_link();
                } else {
                    echo "<a class='inactive-left'></a>";
                }
                ?>
                <!-- <a class="pagination-leftlink" href="#"></a> -->
            </div>
            <div class="pagination-numbers">
            <?php ale_page_links();?>
            </div>
            <div class="pagination-right">
                <?php //echo get_next_posts_link();
                if(get_next_posts_link()) {
                    echo get_next_posts_link();
                } else {
                    echo "<a class='inactive-right'></a>";
                }
                ?>
                <!-- <a class="pagination-rightlink" href="#"></a> -->
            </div>
        </div>
    </div>
</section>
    <section class="get-started">
      <div class="get-started__overlay">
      </div>
      <div class="wrapper">
        <div class="get-started-title animate-box">
          <h2 class="get-started-title__title">Давайте приступим
          </h2>
          <p class="get-started-title__text">новая модель организационной деятельности представляет собой интересный эксперимент проверки систем массового участия.
          </p><a class="get-started-title__btn get-started-title__btn_red" href="#">Создать курс бесплатно</a>
        </div>
      </div>
    </section>

<?php get_footer(); ?>