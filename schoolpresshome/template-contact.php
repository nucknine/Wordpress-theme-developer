<?php
/**
 * Template Name: Contact Page
 */
// send contact
if (isset($_POST['contact'])) {
	$error = ale_send_contact($_POST['contact']);
}
get_header();
?>
<section class="Contacts">
      <div class="wrapper">
        <div class="contacts-container">
          <div class="contacts">
            <div class="contacts__contact-info animate-box">
              <div class="contacts__title">Контактная информация
              </div>
              <div class="contacts__desc contacts__desc_gray"><?php echo ale_get_meta('contacts_address') ?>
                <div class="contacts__icon">
                  <svg class="icon icon-location ">
                    <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#location"></use>
                  </svg>
                </div>
              </div>
              <div class="contacts__desc contacts__desc_red"><?php echo ale_get_option('callnumber'); ?>
                <div class="contacts__icon">
                  <svg class="icon icon-phone ">
                    <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#phone"></use>
                  </svg>
                </div>
              </div>
              <div class="contacts__desc contacts__desc_red"><?php echo ale_get_meta('contacts_mail') ?>
                <div class="contacts__icon">
                  <svg class="icon icon-envelop ">
                    <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#envelop"></use>
                  </svg>
                </div>
              </div>
              <div class="contacts__desc contacts__desc_red"><?php echo ale_get_meta('contacts_site') ?>
                <div class="contacts__icon">
                  <svg class="icon icon-earth ">
                    <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#earth"></use>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="feedback-form animate-box">
            <div class="feedback-form__title">Свяжись с нами
            </div>
            <!-- <form class="feedback-form__form" action="<?php the_permalink();?>">
              <div class="feedback-form__name-box">

              <input class="feedback-form__text feedback-form__text_name" type="text" placeholder="Ваше имя"/>

              <input class="feedback-form__text feedback-form__text_name" type="text" placeholder="Ваша фамилия"/>

              </div>

              <input class="feedback-form__text" type="text" placeholder="Ваш почтовый адрес"/>

              <input class="feedback-form__text" type="text" placeholder="Тема сообщения"/>

              <textarea class="feedback-form__text feedback-form__text_message" type="text" placeholder="Оставить отзыв"></textarea>

              <a class="feedback-form__btn feedback-form__btn_red">отправить сообщение</a>
            </form> -->

                <form class="feedback-form__form" action="<?php the_permalink();?>">
                  <div class="feedback-form__name-box">

                  <input name="contact[name]" class="feedback-form__text feedback-form__text_name" type="text" value="<?php echo isset($_POST['contact']['name']) ? $_POST['contact']['name'] : ''?>" placeholder="Ваше имя" required="required" id="contact-form-name" />

                  <input name="contact[surname]" class="feedback-form__text feedback-form__text_name" type="text" placeholder="Ваша фамилия"/>
                  </div>

                  <input name="contact[email]" type="email" class="feedback-form__text" type="text" placeholder="Ваш почтовый адрес" value="<?php echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''?>" required="required" id="contact-form-email" />

                  <input name="contact[theme]" class="feedback-form__text" type="text" placeholder="Тема сообщения"/>

                  <textarea class="feedback-form__text feedback-form__text_message" type="text" placeholder="Оставить отзыв" name="contact[message]" id="contact-form-message" required="required" value="<?php echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''?>"></textarea>



                  <input class="feedback-form__btn feedback-form__btn_red" type="submit" class="submit" value="<?php _e('отправить сообщение', 'aletheme')?>"/>

                </form>
            </div>
        </div>
        <div class="content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
      </div>
    </section>
    <?php if (ale_get_meta('contacts_address')) { ?>
    <section class="ourlocation">
        <div class="map-box">
        <div class="map-box__map" id="map">
        <?php echo do_shortcode('[ale_map address="'.ale_get_meta('contacts_address').'" width="100%" height="500px"]') ?>
        </div>
    </div>
    </section>
    <?php } ?>
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


<!-- Content
    <div class="contacts-center">
        <div class="content">

            <div class="h2" ><?php the_title(); ?></div>

            <div class="contact-content">
                <div class="left">
                    <div class="contacts">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                    </div>
                </div>

                <div class="right">
                    <form method="post" action="<?php the_permalink();?>">
                        <?php if (isset($_GET['success'])) : ?>
                            <p class="success"><?php _e('Thank you for your message!', 'aletheme')?></p>
                        <?php endif; ?>
                        <?php if (isset($error) && isset($error['msg'])) : ?>
                            <p class="error"><?php echo $error['msg']?></p>
                        <?php endif; ?>

                        <div class="form">
                            <input name="contact[name]" type="text" placeholder="Your Name (required)" value="<?php echo isset($_POST['contact']['name']) ? $_POST['contact']['name'] : ''?>" required="required" id="contact-form-name" />
                            <input name="contact[email]" type="email" placeholder="Email (required)" value="<?php echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''?>" required="required" id="contact-form-email" />
                            <input name="contact[phone]" type="text" placeholder="Phone (required)" value="<?php echo isset($_POST['contact']['phone']) ? $_POST['contact']['phone'] : ''?>" required="required" id="contact-form-phone" />
                            <input name="contact[genre]" type="text" placeholder="Genre (required)" value="<?php echo isset($_POST['contact']['genre']) ? $_POST['contact']['genre'] : ''?>" required="required" id="contact-form-genre" />

                            <textarea name="contact[message]"  placeholder="Your Message (required)"id="contact-form-message" required="required"><?php echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''?></textarea>
                            <input type="submit" class="submit" value="<?php _e('Submit', 'aletheme')?>"/>
                        </div>
                        <?php wp_nonce_field() ?>
                    </form>
                </div>
            </div>

        </div>
    </div>
-->

<?php get_footer(); ?>