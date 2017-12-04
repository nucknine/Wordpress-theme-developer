<footer class="footer">
      <div class="wrapper">
        <div class="footer-menu">
          <div class="footer-menu__about animate-box">
            <h4 class="footer-menu__title">Об обучении
            </h4>
            <div class="footer-menu__text">Новая модель организационной деятельности представляет собой интересный эксперимент проверки систем массового участия.
            </div>
          </div>
          <div class="footer-menu__items">
            <div class="footer-menu__menu-block animate-box">
              <h4 class="footer-menu__title">Обучение
              </h4>
              <ul class="footer-menu__list">
                <li class="footer-menu__item"><a class="footer-menu__link" href="courses.html">Курсы</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="blog.html">Блог</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="contacts.html">Контакты</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Условия</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Встречи</a>
                </li>
              </ul>
            </div>
            <div class="footer-menu__menu-block animate-box">
              <h4 class="footer-menu__title">Учись и расти
              </h4>
              <ul class="footer-menu__list">
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Конфиденциальность</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="blog.html">Блог</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Отзывы</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Книги</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Стол помощи</a>
                </li>
              </ul>
            </div>
            <div class="footer-menu__menu-block animate-box">
              <h4 class="footer-menu__title">Присоединяйся
              </h4>
              <ul class="footer-menu__list">
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Маркетинг</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Визуальный помощник</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Системный аналитик</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Реклама</a>
                </li>
              </ul>
            </div>
            <div class="footer-menu__menu-block animate-box">
              <h4 class="footer-menu__title">Права
              </h4>
              <ul class="footer-menu__list">
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Найти дизайнер</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Найти разработчика</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Команды</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">Реклама</a>
                </li>
                <li class="footer-menu__item"><a class="footer-menu__link" href="#">API</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-info animate-box">
            <?php if (ale_get_option('copyrights')) : ?>
                <p class="footer-info__rights"><?php echo ale_option('copyrights'); ?></p>
            <?php else: ?>
                <p class="footer-info__rights">&copy; <?php _e('2017 All rights resirved, nucknine', 'aletheme')?></p>
                <p class="footer-info__author">Made by Oleg Maximov</p>
            <?php endif; ?>
          <!-- <p class="footer-info__rights">&copy; 2016 Nucknine. All Rights Reserved.
          </p>
          <p class="footer-info__author">Made by Oleg Maximov
          </p> -->
          <div class="footer-info__image-holder">
            <?php if(ale_get_option('twi')) { ?>
                <a class="footer-info__img" target="_blank" href="<?php echo ale_get_option('twi'); ?>">
                <svg class="icon icon-twitter ">
                    <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#twitter"></use>
                </svg></a>
            <?php } ?>
            <?php if(ale_get_option('fb')) { ?>
            <a class="footer-info__img" target="_blank" href="<?php echo ale_get_option('fb'); ?>">
            <svg class="icon icon-facebook ">
              <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#facebook"></use>
            </svg></a>
            <?php } ?>
            <?php if(ale_get_option('linked')) { ?>
            <a class="footer-info__img" target="_blank" href="<?php echo ale_get_option('linked'); ?>">
            <svg class="icon icon-linkedin ">
              <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#linkedin"></use>
            </svg></a>
            <?php } ?>
            <?php if(ale_get_option('dri')) { ?>
            <a class="footer-info__img" target="_blank" href="<?php echo ale_get_option('dri'); ?>">
            <svg class="icon icon-dribbble ">
              <use xlink:href="/wp-content/themes/schoolpresshome/css/img/icons/svg/sprite/sprite.svg#dribbble"></use>
            </svg></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php wp_footer(); ?>
</footer>
<!-- Scripts -->

</body>
</html>