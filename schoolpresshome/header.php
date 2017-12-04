<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php if(is_page_template('page-home.php')){
    body_class('home');
} if(is_page_template('template-contact.php')){
    body_class('contact');
} if(is_blog()){
    body_class('blog all');
} else {
    body_class();
} ?> >
  <div class="preloader-page" id="preloader-page">
    <div class="preloader-page__preloader-dots" id="preloader-dots">
      <div class="preloader-page__dot">
      </div>
      <div class="preloader-page__dot">
      </div>
      <div class="preloader-page__dot">
      </div>
      <div class="preloader-page__dot">
      </div>
      <div class="preloader-page__dot">
      </div>
    </div>
  </div>
  <div class="burger-icon"><span class="burger-icon__line burger-icon__line_line1"></span><span class="burger-icon__line burger-icon__line_line2"></span><span class="burger-icon__line burger-icon__line_line3"></span>
  </div>
  <div class="burger-menu">
    <div class="burger-menu__menu">
      <ul class="burger-menu__row">
        <li class="burger-menu__list"><a class="burger-menu__link" href="index.html">Домой</a>
        </li>
        <li class="burger-menu__list"><a class="burger-menu__link" href="courses.html">Курсы</a>
        </li>
        <li class="burger-menu__list"><a class="burger-menu__link" href="prices.html">Цены</a>
        </li>
        <li class="burger-menu__list burger-menu__list_nest"><a class="burger-menu__link burger-menu__link_nest" href="blog.html">Блог</a>
          <ul class="burger-menu__row-blog">
            <li class="burger-menu__list"><a class="burger-menu__link" href="#">Веб дизайн</a>
            </li>
            <li class="burger-menu__list"><a class="burger-menu__link" href="#">API</a>
            </li>
            <li class="burger-menu__list"><a class="burger-menu__link" href="#">Электронная коммерция</a>
            </li>
            <li class="burger-menu__list"><a class="burger-menu__link" href="#">Продвижение</a>
            </li>
          </ul>
        </li>
        <li class="burger-menu__list"><a class="burger-menu__link" href="contacts.html">Контакты</a>
        </li>
        <li class="burger-menu__list"><a class="burger-menu__link" href="#">Вход</a>
        </li>
        <li class="burger-menu__list"><a class="burger-menu__link" href="#">Создать курс</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="page-overlay">
    <div class="video">
      <iframe class="video__iframe" width="640" height="360" src="https://www.youtube.com/embed/qzMQza8xZCc" frameborder="0" allowfullscreen="allowfullscreen">
      </iframe>
    </div>
  </div>
  <div class="js-top">
    <svg class="icon icon-angle-thin-up ">
      <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#angle-thin-up"></use>
    </svg>
  </div>
  <header class="head" data-stellar-background-ratio="0.5">
    <div class="overlay">
    </div>
    <div class="wrapper <?php if(is_page_template('page-home.php')){
                              echo 'wrapper_header';
                              }
                        ?>">
      <div class="header">
        <div class="social"><span class="social__tel">Тел: <?php echo ale_get_option('callnumber'); ?></span>
          <ul class="social__row">
            <li class="social__list"><a class="social__link" href="#">
              <svg class="icon icon-twitter social-block">
                <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#twitter"></use>
              </svg></a>
            </li>
            <li class="social__list"><a class="social__link" href="#">
              <svg class="icon icon-dribbble social-block">
                <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#dribbble"></use>
              </svg></a>
            </li>
            <li class="social__list"><a class="social__link" href="#">
              <svg class="icon icon-github social-block">
                <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#github"></use>
              </svg></a>
            </li>
          </ul>
        </div>
        <nav class="top-nav">
            <?php if(ale_get_option('sitelogo')) { ?>
                <div class="main-logo_custom">
                    <a href="<?php echo home_url(); ?>" class="main-logo__link"><img class="main-logo__img" src="<?php echo ale_get_option('sitelogo'); ?>" ></a>
                </div>
            <?php } elseif (is_blog()) { ?>
                <div class="main-logo">
                    <a class="main-logo__link" href="<?php echo home_url(); ?>" >LOGO</a><span class="main-logo__dot">!</span>
                </div>
            <?php } ?>
          <div class="top-nav__menu">
          <?php if (has_nav_menu('header_left_menu')) {
            wp_nav_menu(array(
                'theme_location'=> 'header_left_menu',
                'menu'          => 'Header nav Menu',
                'menu_class'    => 'top-nav__row',
                'walker'        => new Aletheme_Nav_Walker(),
                'container'     => '',
              ));
          }
          ?>
          <?php if (has_nav_menu('header_right_menu')) {
            wp_nav_menu(array(
                'theme_location'=> 'header_right_menu',
                'menu'          => 'Header Register Menu',
                'menu_class'    => 'top-nav__row top-nav__row_register',
                'walker'        => new Aletheme_Nav_Walker(),
                'container'     => '',
              ));
          }
          ?>
            <!-- <ul class="top-nav__row">
              <li class="top-nav__list"><a class="top-nav__link" href="index.html">Домой</a>
              </li>
              <li class="top-nav__list"><a class="top-nav__link" href="courses.html">Курсы</a>
              </li>
              <li class="top-nav__list"><a class="top-nav__link" href="prices.html">Цены</a>
              </li>
              <li class="top-nav__list top-nav__list_nest"><a class="top-nav__link" href="blog.html">Блог</a>
                <ul class="top-nav__row-blog">
                  <li class="top-nav__list"><a class="top-nav__link top-nav__link_white" href="#">Веб дизайн</a>
                  </li>
                  <li class="top-nav__list top-nav__list_white"><a class="top-nav__link top-nav__link_white" href="#">Api</a>
                  </li>
                  <li class="top-nav__list"><a class="top-nav__link top-nav__link_white" href="#">eКоммерция</a>
                  </li>
                  <li class="top-nav__list"><a class="top-nav__link top-nav__link_white" href="#">Branding</a>
                  </li>
                </ul>
              </li>
              <li class="top-nav__list"><a class="top-nav__link" href="contacts.html">Контакты</a>
              </li>
              <li class="top-nav__list top-nav__list_register"><a class="top-nav__link top-nav__link_register" href="#">Вход</a>
              </li>
              <li class="top-nav__list top-nav__list_register"><a class="top-nav__link top-nav__link_register" href="#">Создать аккаунт</a>
              </li>
            </ul> -->
          </div>
        </nav>
      </div>
      <?php if(is_page_template('page-home.php')) { ?>
      <div class="page-title">
        <h1 class="page-title__big-text">Искусство обучения - помощь открытий
        </h1>
        <p class="page-title__small-text">не падайте духом
        </p>
        <div class="page-title__buttons" id="test"><a class="page-title__btn page-title__btn_red" href="">Выбрать курс</a><a class="page-title__btn page-title__btn_blue" id="js-watch-video-head">Смотреть Видео</a>
        </div>
      </div>
      <?php } elseif (is_blog()) { ?>
        <div class="page-title">
          <h1 class="page-title__big-text page-title__big-text_large"><?php _e('Блог', 'aletheme'); ?>
          </h1>
        </div>
      <?php } elseif (is_page_template('template-contact.php')) { ?>
        <div class="page-title">
          <h1 class="page-title__big-text page-title__big-text_large"><?php _e('Контакты', 'aletheme'); ?>
          </h1>
        </div>
      <?php } elseif (is_post_type_archive('courses')) { ?>
        <div class="page-title">
          <h1 class="page-title__big-text page-title__big-text_large"><?php _e('Создай свой курс', 'aletheme'); ?>
          </h1>
        </div>
      <?php } else {?>
        <div class="page-title">
          <h1 class="page-title__big-text page-title__big-text_large">sample
          </h1>
        </div>
      <?php } ?>
    </div>
  </header>