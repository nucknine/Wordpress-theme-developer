<!-- Blog Item -->
<div class="post-box animate-box">
<a class="post-box__link" href="<?php the_permalink(); ?>">
<?php if(get_the_post_thumbnail($post->ID,''))

echo get_the_post_thumbnail($post->ID,'','style=max-width:100%;height:auto;'); else { ?>
<img class="post-box__image" src="/wp-content/themes/schoolpresshome/css/img/project-3.jpg" alt="" role="presentation"/>
<?php }?>
</a>
    <div class="post-box__text-container">
    <h3 class="post-box__title"><?php the_title();?>
    </h3>
    <div class="post-box__date"><?php echo get_the_date(); ?>
    <div class="post-box__date"><?php echo get_the_author(); ?></div>
    <div class="post-box__date">tags:
    <?php $tags = get_the_tags($post->ID);
     if($tags) {
        foreach($tags as $tag) :
        echo "$tag->name".' ';
        endforeach;
     } ?>
    </div>
    <div class="post-box__comments"><?php comments_number( 'ноль комментов', 'один коммент', '% комментариев' ); ?>
    </div>
    </div>
    <div class="post-box__text"><?php echo get_the_excerpt(); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="post-box__btn post-box__btn_red"><?php _e('Читать далее', 'aletheme'); ?></a>
    </div>
</div>