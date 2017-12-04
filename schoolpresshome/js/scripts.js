jQuery(function($) {
    "use strict";

//---------------------------------------------------------
// Internet Explorer 6-11
//---------------------------------------------------------

    var isIE = /*@cc_on!@*/false || !!document.documentMode;
//---------------------------------------------------------
//is mobile
//---------------------------------------------------------
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
            BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
            iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
            Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
            Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
            any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

//---------------------------------------------------------
//burger-menu
//---------------------------------------------------------

    $('.burger-icon').click(function(){
        $('.burger-icon__line_line1').toggleClass('burger-icon__line_line-open1');
        $('.burger-icon__line_line2').toggleClass('burger-icon__line_line-open2');
        $('.burger-icon__line_line3').toggleClass('burger-icon__line_line-open3');
        $('.burger-menu').toggleClass('burger-menu_visible');
        $('.page-overlay').toggleClass('page-overlay_visible');
        $('body').toggleClass('overflow');
    });

    $('.page-overlay').click(function(){
        $('.burger-icon__line_line1, .burger-icon__line_line2, .burger-icon__line_line3, .burger-menu, .page-overlay, body, .burger-icon, .video').removeClass('burger-icon__line_line-open1 burger-icon__line_line-open2 burger-icon__line_line-open3 burger-menu_visible page-overlay_visible overflow burger-icon_hide video_visible');
    });

    $('#js-watch-video-head, #js-watch-video-content').click(function(){
        $('.video').addClass('video_visible');
        $('.page-overlay').addClass('page-overlay_visible');
        $('.burger-icon').toggleClass('burger-icon_hide');
    });

//---------------------------------------------------------
// waypoints v2
//---------------------------------------------------------

var contentWayPoint = function() {
        var i = 0;
        $('.animate-box').waypoint( function( direction ) {

            if( direction === 'down' && !$(this.element).hasClass('animated') ) {

                i++;

                $(this.element).addClass('item-animate');
                setTimeout(function(){

                    $('body .animate-box.item-animate').each(function(k){
                        var el = $(this);
                        setTimeout( function () {
                            var effect = el.data('animate-effect');
                            if ( effect === 'fadeIn') {
                                el.addClass('fadeIn animated');
                            } else if ( effect === 'fadeInLeft') {
                                el.addClass('fadeInLeft animated');
                            } else if ( effect === 'fadeInRight') {
                                el.addClass('fadeInRight animated');
                            } else {
                                el.addClass('fadeInUp animated');
                            }

                            el.removeClass('item-animate');
                        },  k * 200, 'easeInOutExpo' );
                    });

                }, 100);

            }

        } , { offset: '85%' } );
    };


//---------------------------------------------------------
// waypoints v1
//---------------------------------------------
//  $('.showcase-title, .showcase-box, .description-box').css('opacity',0);
//  //delay function
//  var itemQueue = []
//      var delay = 200
//      var queueTimer

//  function processItemQueue () {
//     if (queueTimer) return // We're already processing the queue
//     queueTimer = window.setInterval(function () {
//       if (itemQueue.length) {
//         $(itemQueue.shift()).addClass('animated fadeInUp');
//         processItemQueue();
//          } else {
//         window.clearInterval(queueTimer);
//         queueTimer = null;
//          }
//      }, delay)
//      }

//      $(".description-box").waypoint(function () {
//     itemQueue.push(this.element);
//     processItemQueue();
//      }, {
//     offset: '80%'
//      })




//---------------------------------------------------------
// Loading page
//---------------------------------------------------------

    var loaderPage = function () {
        $(window).on('load', function () {
        var $preloader = $('#preloader-page'),
            $dots   = $preloader.find('.preloader-dots');
        $dots.fadeOut();
        $preloader.delay(150).fadeOut('slow');
        });
    };

//---------------------------------------------------------
//stellar parallax
//---------------------------------------------------------

    var parallax = function() {

        if ( !isMobile.any() || !isIE) {
            $(window).stellar({
                horizontalScrolling: false,
                hideDistantElements: false,
                responsive: false

            });
        }
    };

//---------------------------------------------------------
//testimonialCarousel
//---------------------------------------------------------
    var testimonialCarousel = function(){

        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            smartSpeed: 800,
            autoHeight: true
        });

    };

//---------------------------------------------------------
//counter
//---------------------------------------------------------

    var counter = function() {
        $('.counter__digit').countTo({
             formatter: function (value, options) {
          return value.toFixed(options.decimals);
        }
        });
    };

//---------------------------------------------------------
//goToTop
//---------------------------------------------------------

    var goToTop = function() {

        $('.js-top').on('click', function(event){
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $('html').offset().top
            }, 2000 , 'easeOutExpo');
            return false;
        });

        $(window).scroll(function(){

            var $win = $(window);
            if ($win.scrollTop() > 300) {
                $('.js-top').addClass('js-top_active');
            } else {
                $('.js-top').removeClass('js-top_active');
            }

        });

    };


//---------------------------------------------------------
//svg sprites
//---------------------------------------------------------
  var svg = function () {
    svg4everybody({});
    };


//---------------------------------------------------------
//function launch
//---------------------------------------------------------

    $(function(){
        contentWayPoint();
        svg();
        loaderPage();
        parallax();
        testimonialCarousel();
        counter();
        goToTop();
    });

    // Custom jQuery Code Here

    // $('.portfolioslider').flexslider({
    //     animation:'slide',
    //     smoothHeight:true,
    //     controlNav: false
    // });

    // $('.newhomeslider').flexslider({
    //     animation:'slide',
    //     smoothHeight:true,
    //     controlNav: false
    // });

});

Modernizr.addTest('ipad', function () {
    return !!navigator.userAgent.match(/iPad/i);
});

Modernizr.addTest('iphone', function () {
    return !!navigator.userAgent.match(/iPhone/i);
});

Modernizr.addTest('ipod', function () {
    return !!navigator.userAgent.match(/iPod/i);
});

Modernizr.addTest('appleios', function () {
    return (Modernizr.ipad || Modernizr.ipod || Modernizr.iphone);
});

Modernizr.addTest('positionfixed', function () {
    var test    = document.createElement('div'),
        control = test.cloneNode(false),
        fake = false,
        root = document.body || (function () {
            fake = true;
            return document.documentElement.appendChild(document.createElement('body'));
        }());

    var oldCssText = root.style.cssText;
    root.style.cssText = 'padding:0;margin:0';
    test.style.cssText = 'position:fixed;top:42px';
    root.appendChild(test);
    root.appendChild(control);

    var ret = test.offsetTop !== control.offsetTop;

    root.removeChild(test);
    root.removeChild(control);
    root.style.cssText = oldCssText;

    if (fake) {
        document.documentElement.removeChild(root);
    }

    /* Uh-oh. iOS would return a false positive here.
     * If it's about to return true, we'll explicitly test for known iOS User Agent strings.
     * "UA Sniffing is bad practice" you say. Agreeable, but sadly this feature has made it to
     * Modernizr's list of undectables, so we're reduced to having to use this. */
    return ret && !Modernizr.appleios;
});


// Modernizr.load loading the right scripts only if you need them
Modernizr.load([
    {
        // Let's see if we need to load selectivizr
        test : Modernizr.borderradius,
        // Modernizr.load loads selectivizr and Respond.js for IE6-8
        nope : [ale.template_dir + '/js/libs/selectivizr.min.js', ale.template_dir + '/js/libs/respond.min.js']
    },{
        test: Modernizr.touch,
        yep:ale.template_dir + '/css/touch.css'
    }
]);



jQuery(function($) {
    var is_single = $('#post').length;
    var posts = $('article.post');
    var is_mobile = parseInt(ale.is_mobile);

    var slider_settings = {
        animation: "slide",
        slideshow: false,
        controlNav: false
    }

    $(document).ajaxComplete(function(){
        try{
            if (!posts.length) {
                return;
            }
            FB.XFBML.parse();
            gapi.plusone.go();
            twttr.widgets.load();
            pin_load();
        }catch(ex){}
    });

    // open external links in new window
    $("a[rel$=external]").each(function(){
        $(this).attr('target', '_blank');
    });

    $.fn.init_posts = function() {
        var init_post = function(data) {
            // close other posts
            data.post.siblings('.open-post').find('a.toggle').trigger('click', {
                hide:true
            });

            var loading = data.post.find('span.loading');

            if (data.more.is(':empty')) {
                data.post.addClass('post-loading');
                loading.css('visibility', 'visible');
                data.more.load(ale.ajax_load_url, {
                    'action':'aletheme_load_post',
                    'id':data.post.data('post-id')
                }, function(){
                    loading.remove();
                    data.more.slideDown(400, function(){
                        data.post.addClass('open-post');
                        data.toggler.text('Close Post');
                        $('.video', data.more).fitVids();
                        if (data.scroll) {
                            data.scroll.scrollTo('fast');
                        }
                    });
                    init_comments(data.post);
                });
            } else {
                data.more.slideDown(400, function(){
                    data.post.addClass('open-post');
                    data.toggler.text('Close Post');
                    if (data.scroll) {
                        data.scroll.scrollTo('fast');
                    }
                });
            }
        }

        var load_post = function(e, _opts) {
            e.preventDefault();
            var data  = {
                toggler:$(this),
                scroll:false
            };
            var opts = $.extend({
                comments:false,
                hide:false,
                add_comment:false
            }, _opts);
            data.post = data.toggler.parents('article.post');
            data.more = data.post.find('.full');

            if (data.more.is(':visible')) {
                if (opts.hide == true) {
                    // quick hide for multiple posts
                    data.more.hide();
                } else {
                    data.more.slideUp(400);
                }
                data.toggler.text('Open Post');
                data.post.removeClass('open-post');
            } else {
                if (typeof(e.originalEvent) != 'undefined' ) {
                    data.scroll = data.post;
                }
                init_post(data);
            }
        }

        var init_comments = function(post) {
            var respond = $('section.respond', post);
            var respond_form = $('form', respond);
            var respond_form_error = $('p.error', respond_form);
            //var respond_cancel = $('.cancel-comment-reply a', respond);
            var comments = $('section.comments', post);

            /*$('a.comment-reply-link', post).on('click', function(e){
             e.preventDefault();
             var comment = $(this).parents('li.comment');
             comment.find('>div').append(respond);
             respond_cancel.show();
             respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
             respond.find('input[name=comment_parent]').val(comment.data('comment-id'));
             respond.find('input:first').focus();
             }).attr('onclick', '');

             respond_cancel.on('click', function(e){
             e.preventDefault();
             comments.after(respond);
             respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
             respond.find('input[name=comment_parent]').val(0);
             $(this).hide();
             });
             */
            respond_form.ajaxForm({
                'beforeSubmit':function(){
                    respond_form_error.text('').hide();
                },
                'success':function(_data){
                    var data = $.parseJSON(_data);
                    if (data.error) {
                        respond_form_error.html(data.msg).slideDown('fast');
                        return;
                    }
                    var comment_parent_id = respond.find('input[name=comment_parent]').val();
                    var _comment = $(data.html);
                    var list;
                    _comment.hide();

                    if (comment_parent_id == 0) {
                        list = comments.find('ol');
                        if (!list.length) {
                            list = $('<ol class="commentlist "></ol>');
                            comments.find('.scrollbox .jspContainer .jspPane').append(list);
                        }
                    } else {
                        list = $('#comment-' + comment_parent_id).parent().find('ul');
                        if (!list.length) {
                            list = $('<ul class="children"></ul>');
                            $('#comment-' + comment_parent_id).parent().append(list);
                        }
                        respond_cancel.trigger('click');
                    }
                    list.append(_comment);
                    _comment.fadeIn('fast');
                    //.scrollTo();

                    respond.find('textarea').clearFields();
                },
                'error':function(response){
                    var error = response.responseText.match(/\<p\>(.*)<\/p\>/)[1];
                    if (typeof(error) == 'undefined') {
                        error = 'Something went wrong. Please reload the page and try again.';
                    }
                    respond_form_error.html(error).slideDown('fast');
                }
            });
        }
        $(this).each(function(){
            var post = $(this);
            // init post galleries
            $(window).load(function(){
                $('.preview .flexslider', post).flexslider(slider_settings);
            });
            // do not init ajax posts & comments for mobile
            if (!is_mobile) {
                // ajax posts enabled
                if (ale.ajax_posts) {
                    $('a.toggle', post).click(load_post);
                    $('.video', post).fitVids();
                    $('.preview figure a', post).click(function(e){
                        e.preventDefault();
                        $(this).parents('article.post').find('a.toggle').trigger('click');
                    });
                }
            }
        });
        // init ajax comments on a single post if ajax comments are enabled
        if (is_single && parseInt(ale.ajax_comments)) {
            init_comments(posts);
        }
        // open single post on page
        if (parseInt(ale.ajax_open_single) && !is_single && posts.length == 1) {
            posts.find('a.toggle').trigger('click');
        }
    }
    posts.init_posts();

    $.fn.init_gallery = function() {
        $(this).each(function(){
            var gallery = $(this);
            $(window).load(function(){
                $('.flexslider', gallery).flexslider(slider_settings);
            });

        })
    }
    $('#gallery').init_gallery();

    $.fn.init_archives = function()
    {
        $(this).each(function(){
            var archives = $(this);
            var year = $('#archives-active-year');
            var months = $('div.months div.year-months', archives);
            var arrows = $('a.up, a.down', archives);
            var activeMonth;
            var current, active;
            var animated = false;
            if (months.length == 1) {
                arrows.remove();
                activeMonth = months.filter(':first').addClass('year-active').show();
                year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
                return;
            }
            arrows.click(function(e){
                e.preventDefault();
                if (animated) {
                    return;
                }
                var fn = $(this);
                animated = true;
                arrows.css('visibility', 'visible');
                var current = months.filter('.year-active');
                if (fn.hasClass('up')) {
                    active = current.prev();
                    if (!active.length) {
                        active = months.filter(':last');
                    }
                } else {
                    active = current.next();
                    if (!active.length) {
                        active = months.filter(':first');
                    }
                }
                current.removeClass('year-active').fadeOut(150, function(){
                    active.addClass('year-active').fadeIn(150, function(){
                        animated = false;
                    });
                    year.text(active.attr('id').replace(/[^0-9]*/, ''));

                    if (fn.hasClass('up')) {
                        if (!active.prev().length) {
                            arrows.filter('.up').css('visibility', 'hidden');
                        }
                    } else {
                        if (!active.next().length) {
                            arrows.filter('.down').css('visibility', 'hidden');
                        }
                    }
                });
            });
            activeMonth = months.filter(':first').addClass('year-active').show();
            year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
            arrows.filter('.up').css('visibility', 'hidden');
        });
    }
    $('#archives .ale-archives').init_archives();






});

// HTML5 Fallbacks for older browsers
jQuery(function($) {
    // check placeholder browser support
    if (!Modernizr.input.placeholder) {
        // set placeholder values
        $(this).find('[placeholder]').each(function() {
            $(this).val( $(this).attr('placeholder') );
        });

        // focus and blur of placeholders
        $('[placeholder]').focus(function() {
            if ($(this).val() == $(this).attr('placeholder')) {
                $(this).val('');
                $(this).removeClass('placeholder');
            }
        }).blur(function() {
                if ($(this).val() == '' || $(this).val() == $(this).attr('placeholder')) {
                    $(this).val($(this).attr('placeholder'));
                    $(this).addClass('placeholder');
                }
            });

        // remove placeholders on submit
        $('[placeholder]').closest('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                if ($(this).val() == $(this).attr('placeholder')) {
                    $(this).val('');
                }
            });
        });
    }
});

