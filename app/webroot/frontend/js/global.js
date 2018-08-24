var Menu = {
    hoverMenu: function() {
        var listGroup = $('.menu .dropdown');
        listGroup.each(function() {
            $(this).hover(function() {
                $(this).addClass('open');
            });
            $(this).mouseleave(function() {
                $(this).removeClass('open');
            })
        })
    },
    aFix:function() {
        $('.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            })
        });
        $(window).scroll(function() {
            if ($(window).scrollTop() > 0) {
                $('.header').addClass('menuFixed');
                $('.menu-top').addClass('fixed');
            } else {
                $('.header').removeClass('menuFixed');
                $('.menu-top').removeClass('fixed');
            }
            if ($(window).scrollTop() >= 300) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        })
    },
    categories: function() {
        var listGroup = $('.list-group-item');
        listGroup.each(function() {
            var subMenu = $(this).find('.sub-categories');
            $(this).hover(function() {
                if (subMenu.is(':visible')) {
                    return false;
                }
                $('.sub-categories').hide();
                $(this).find('.sub-categories').show();
            });
            $(this).mouseleave(function() {
                if (!subMenu.is(':visible')) {
                    return false;
                }
                $(this).find('.sub-categories').hide();
            })
        })
    }
};

var Product =
{
    hoverImage: function(){
        if ($('.zoomImage').length) {
            $('.zoomImage').elevateZoom({
                tint:true,
                tintColour:'#F90',
                tintOpacity:0.5,
                cursor: 'pointer',
                gallery:'gallery',
                galleryActiveClass: 'active',
                imageCrossfade: true,
                loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif',
                responsive: true,
                scrollZoom: true,
                zoomWindowWidth: 400,
                zoomWindowHeight: 400,
                zoomWindowOffety: -50,
                zoomWindowOffetx: 10,
                borderSize: 2
            });
            $(".zoomImage").bind("click", function(e) {
                var ez =   $('.fancybox').data('elevateZoom');
                $.fancybox(ez.getGalleryList());
                return false;
            });
        }
    }
};

var Register =
{
    date: function() {
        $('.datePicker').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            yearRange: "1920:2015"
        });
    }
};

$(document).ready(function() {
    Menu.hoverMenu();
    Menu.aFix();
    Menu.categories();
    Product.hoverImage();
    Register.date();

    // $('.showDetail').click(function() {
    //     $('.detail-product').removeClass('hide');
    //     $('.comment-facebook').addClass('hide');
    // });

    // $('.showComment').click(function() {
    //     $('.comment-facebook').removeClass('hide').removeClass('overlay');
    //     $('.detail-product').addClass('hide');
    // })
});